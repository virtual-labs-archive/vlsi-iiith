#!/bin/bash
# Proper header for a Bash script.

# usage: 
# Running from inside ui/scripts
# ./transfer.sh <devel-login-name> <optional-theme> <optional -F>
# The -F is meant to do the finalbuild for the deployment server

SRC_DIR=./src
BUILD_DIR=./build
FINAL_DIR=final-build
FINAL_FLAG=false

if [ $# = 0 ]
then 
	echo 'Enter the username on devel.virtual-labs.ac.in'
	exit 1 
fi

if [ $# = 1 ] # The first argument to the script is the username on the 
  		   # devel/test server
then
  username=$1
else
  username=$1
  if [ $2 = "-F" ]
  then
  FINAL_FLAG=true
  theme=$3
  elif [[ $# = 3 && $3 = "-F" ]]
  then 
  	FINAL_FLAG=true
	theme=$2
  else 
	theme=$2
  fi
fi  

#Move outside scripts
cd ../

echo $theme
#Set the run commands
#rsync from the local machine to test via devel.
run1='rsync -auvz -e "ssh -i /home/'$username'/.ssh/'$username'" '$SRC_DIR' '$username'@test:'

# clean the old build in public_html on test
subrun2='find public_html/build -mindepth 1 -maxdepth 1 ! -name js -print0 | xargs -0n1 rm -rf;'

# clean the old final-build in public_html on test
subrun_final='find public_html/'$FINAL_DIR' -mindepth 1 -maxdepth 1 ! -name js -print0 | xargs -0n1 rm -rf;'

# run make  on test and publish the build on public_html on test
if [ -n "$theme" ]
then
	run2='ssh -i /home/'$username'/.ssh/'$username' '$username'@test "cd src/ ; make -k theme="'$theme'" clean all; cd ../ ; '$subrun2' rsync -auvz build/ public_html/build;'
else
	run2='ssh -i /home/'$username'/.ssh/'$username' '$username'@test "cd src/ ; make -k clean all; cd ../ ; '$subrun2' rsync -auvz build/ public_html/build;'
fi

# if this is final, then publish final-build on public_html on test
run3=$subrun_final' rsync -auvz build/ public_html/'$FINAL_DIR

if [ $FINAL_FLAG = true ]
then
	run2=$run2' '$run3';"'
else
	run2=$run2'"'
fi

#echo $run2

# Making the build using the default maroon-grid theme
rsync -auvz -e "ssh -i /home/$USER/.ssh/$username" $SRC_DIR $username@devel.virtual-labs.ac.in:
ssh -i /home/$USER/.ssh/$username $username@devel.virtual-labs.ac.in $run1
ssh -i /home/$USER/.ssh/$username $username@devel.virtual-labs.ac.in $run2


exit 0 # The right and proper method of "exiting" from a script.
