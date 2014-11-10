## Preamble 

This package is developed as an independent module for documentation of experiments of the Virtual lab project. We are currently working on integrating this module into moodle, but encourage its use at this time as a standalone utility. 



## Installation of the documentation module ##

        

	@@@ Hardware Requirements @@@
		Disk space: 10MB free (min).
		Memory: 256MB (min), 1GB (recommended).


	@@@ Software Requirements @@@@
		Web server - Apache2
		PHP5
		MySQL5


	#### Installing Apache, PHP and MySQL  (if required) ####


		This document will explain how to install Apache, PHP and Mysql in Ubuntu 10.04. The procedure on other Linux/MacOS/Win servers would be reasonably similar. 	             For assistance, please contact Shahid/Sushanth (cc to me; email IDs provided at the bottom) 
		I'm running all the steps in this tutorial with root privileges, so make sure you're logged in as root: 
		Open the terminal and run following command
		sudo su
		Enter the sudo password

	$$    ############ XAMPP installation procedure for LINUX ############
	
		--> Go to http://sourceforge.net/projects/xampp/files/XAMPP%20Linux/

		--> Under the list of Browse Files for XAMPP click on 1.7.1 and under it click on xampp-linux-1.7.1.tar.gz to download the package.

		--> Once the package has been downloaded go to a Linux shell and login as the system administrator root: 
		    $ su

		--> Extract the downloaded archive file to /opt:
		    $ tar xvfz xampp-linux-1.7.1.tar.gz -C /opt

		Warning 1: Please use only this command to install XAMPP. DON'T use any Microsoft Windows tools to extract the archive, it won't work.
		Warning 2: already installed XAMPP versions get overwritten by this command.

		--> XAMPP is now installed below the /opt/lampp directory.

		--> To start XAMPP simply call this command:
		    $ /opt/lampp/lampp start

		--> You should now see something like this on your screen:

			Starting XAMPP 1.7.3a...
			LAMPP: Starting Apache...
			LAMPP: Starting MySQL...
			LAMPP started.
			Ready. Apache and MySQL are running

		--> To test go to the browser and type http://localhost and you should see the XAMPP page.

	$$ Extract and copy the documentor.tar.gz folder to the www or HTDOCS folder of your web server installation. (The precise
	path would depend on your web server) and set the required permissions.

	$$ Run the mysql.sql file to setup the database on Mysql

	$$ Enter the configuration details in the config.inc.php file.

	$$ To open the control panel page type http://localhost/documentor/mod_form.php on your web browser




## How to USE ##

* The main page mod_form.php contains the links to the different options available to make the documentation tabs and sections


* To add a new tab

Click on the Add a tab link on the main page.Then enter the name of the tab to be created and click on submit to create the tab.


* To add a new section 

Click on the Add a section link on the main page.Then select the tab under which you would like to add a section.Then enter the Section title, Author and the Content for the section to be created.The content can be created using the editor using which you can customize the look and feel of the section after which you can click on submit to create the section.


* To edit a tab

Click on the Edit a tab link on the main page. Then select the tab which you would like to edit.Then edit the name of the tab and click on submit to commit the changes.


* To edit a section

Click on the Edit a section link on the main page. Then select the tab under which you would like to edit. Then select the section under that tab which you would like to edit .Then edit the Section title, Author or the Content of the section and click on submit to commit the changes.


* To delete a tab

Click on the Delete a tab link on the main page. Then select the tab which you would like to delete.Then click on submit to commit the changes.


* To delete a section

Click on the Delete a section link on the main page. Then select the tab under which you would like to delete. Then select the section under that tab which you would like to delete. Then click on submit to commit the changes.


* To add a top menu tab

Click on the Add top menu tab link on the main page. Then enter the name of the tab to be created and click on submit to create the tab.


* To edit a top menu tab

Click on the edit top menu tab link on the main page. Then select the tab which you would like to edit.Then edit the name of the tab and click on submit to commit the changes.


* To delete a top menu tab

Click on the delete top menu tab link on the main page. Then select the tab which you would like to delete.Then click on submit to commit the changes.


* To view the documentation

You can use the View Page with new theme link on the control panel page. 

Using the Top Menu:-
There is a file named blank.php supplied with other. whenever a new top menu tab is added, the caption is also given a link under it. This link has a xxx.php fiel under it where 
the user is redirected when he clicks on tht link. for example, when a user clicks on home top menu tab, he is sent to blank.php. this php is blank & the information for home page can be added here. similarly whenever a new top menu tab is added,
the user has to create a new XXX.php naming it according to the link given under the tab while creating it. this php code for the file can be copied from blank.php

For further assistance email us at :
Prof Santosh B. Noronha  -  noronha@iitb.ac.in     
Sushanth Poojary         -  sushanth@iitb.ac.in   
Shahid Ali Farooqui      -  farooqui@iitb.ac.in
Gaurav Sharma            -  gsharma86.iitd@gmail.com

