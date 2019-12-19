# JAVAC=javac
# sources = $(EXP_1sep2010 *.java)
# classes = $(sources: .java=.class)

# all: $(classes)

# clean :
# 	rm -rf *.class
# %.class : %.java
# 	$(JAVAC) $<

# build-dir=../build
# lib-dir=lib
# build-js-dir=${build-dir}/js

# theme=green-icon


# all:  help-dir 

# help-dir:

# 	(touch ${build-dir}/theme-${theme}; rsync -avC --exclude ${mathjax}.zip lab/final-build/* lib/* help themes/${theme}/* ${build-dir})





# # don't remove the js directory, since copying it again with mathjax takes too long.
# # http://superuser.com/questions/168130/unix-delete-files-and-folders-excluding-pattern
# clean:
# 	(find ${build-dir} -mindepth 1 -maxdepth 1 ! -name js -print0 | xargs -0n1 rm -rf)



build-dir=../build
theme=green-icon

all:patch-analytics ${theme}

green-icon:
	mkdir ${build-dir};rsync -avC --progress lab/* themes/${theme}/* ${build-dir}
clean:
	rm -rf ${build-dir}

patch-analytics:
	git clone https://github.com/virtual-labs/vlabs-analytics.git
	cp vlabs-analytics/gtm-patcher.py ../scripts/.
	cp vlabs-analytics/patch-analytics.sh ../scripts/.
	chmod +x ../scripts/patch-analytics.sh 
	../scripts/patch-analytics.sh
	rm -rf vlabs-analytics
	rm -rf ../scripts/patch-analytics.sh
	rm -rf ../scripts/gtm-patcher.py
