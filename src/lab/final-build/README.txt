## Preamble 

This package is developed as an independent module for documentation of experiments of the Virtual lab project. We are currently working on integrating this module into moodle, but encourage its use at this time as a standalone utility. 



## Installation of the documentation module ##

        

	@@@ Hardware Requirements @@@
		Disk space: 10MB free (min).
		Memory: 256MB (min), 1GB (recommended).


	@@@ Software Requirements @@@@ (latest versions)
		Web server - Apache2
		PHP5
		MySQL5


	#### Installing Apache, PHP and MySQL  (if required) ####

		This document will explain how to install Apache, PHP and Mysql in Ubuntu 10.04. The procedure on other Linux/MacOS/Win servers would be reasonably similar. For assistance, please contact Shahid/Sushanth (cc to me; email IDs provided at the bottom) 
		I'm running all the steps in this tutorial with root privileges, so make sure you're logged in as root: 
		Open the terminal and run following command
		sudo su
		Enter the sudo password

	####  Installing MySQL 5  ####

		First we install MySQL 5 like this:
		aptitude install mysql-server mysql-client
		You will be asked to provide a password for the MySQL root user - this password is valid for the user root@localhost as well as root@yourwebserver.com,
		so we don't have to specify a MySQL root password manually later on: 
		New password for the MySQL "root" user: <-- yourrootsqlpassword
		Repeat password for the MySQL "root" user: <-- yourrootsqlpassword


	####  Installing Apache2  ####
		Apache2 is available as an Ubuntu package, therefore we can install it as follows:
		aptitude install apache2
		Now direct your browser to http://localhost, and you should see the Apache2 placeholder page (It works!): 
		Apache's default document root is /var/www on Ubuntu, and the configuration file is /etc/apache2/apache2.conf. 
		Additional configurations are stored in subdirectories of the /etc/apache2 directory such as /etc/apache2/mods-enabled (for Apache modules), 
                /etc/apache2/sites-enabled (for virtual hosts), and /etc/apache2/conf.d.
		Installing PHP5
		We can install PHP5 and the Apache PHP5 module as follows:
		aptitude install php5 libapache2-mod-php5
		We must restart Apache afterwards:
		/etc/init.d/apache2 restart



	$$ Extract and copy the documentor.tar.gz folder to the www or HTDOCS folder of your web server installation. (The precise
	path would depend on your web server)

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

