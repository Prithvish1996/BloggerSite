******************************************************************
*******************************************************************
# Project Name : BloggerSite
*******************************************************************
*******************************************************************
# TECHNOLOGIES USED:
-------------------
1.Coding language - PHP core and advance

2.Front End - html/css and bootstrap

3.validations - php

4.text editor -sublime text

5.Operating System - Windows x64

6.Hosting -> Localhost- XAMPP SERVER and Cloudhost - Infinite[Free Version]

7.Database used - phpmyadmin

8.Database query language - MySqli

9.Cloudhost Link - http://bloggersite.42web.io/index.php

# BloggerSite :
---------------
 A simple blogging web application with basic and advance php

# Folder and File Structure:
-----------------------------
   ************************************************************************  
   # = NOTE:[FOLDER ARE MENTIONED BELOW WITH [FOLDER] and others are files]
   ************************************************************************
          || ---> main root
           | ---> sub root   
           Open in text editor to see all  the files and folders.
           
                      BloggerSite                                                    
                          ||
                          ||
                          ||
                          ||->assets[FOLDER]
                          ||      |
                          ||      |->featuredimages[FOLDER]
                          ||      |
                          ||      |->uploads[FOLDER]
                          ||
                          ||----->config[FOLDER]
                          ||               |
                          ||               |->db.php
                          ||
                          ||-------------->img[FOLDER]
                          ||                      |
                          ||                      |->default_profile.png
                          ||     
                          ||
                          ||---------------------->inc[FOLDER]
                          ||                           |
                          ||                           |->footer.php
                          ||                           |
                          ||                           |->header.php
                          ||
                          ||
                          ||--------------------------> index.php                                
                          ||                                 
                          ||--------------------------> dashboard.php                                
                          ||   
                          ||--------------------------> profile.php                                
                          ||  
                          ||--------------------------> prime.php                                
                          ||      
                          ||--------------------------> logout.php                                
                          ||
                          ||--------------------------> comment.php                                
                          ||    
                          ||--------------------------> post.php                                
                          ||      
                          ||--------------------------> view.php                                
                          ||   
                          ||--------------------------> edit.php                                
                          || 
                          ||--------------------------> update.php                                                             
                          ||      
                          ||--------------------------> like.php                                
                          || 
                          ||--------------------------> dislike.php                                                                                            
                          || 
                          ||--------------------------> delete.php                                


        
        
# ROLE OF EACH FOLDER :
----------------------
   1. assets- this folder contains all the profile and post related images.It contains two other folders i.e featuredimages & uploads.

   2. featuredimages- sub folder of assets folder it contains images,uploaded when you upload a post.It will also contain images when you post something.
                                  It contains dynamic type images i.e the images will be changed once you update image of a post.  
                               
   3.uploads-  sub folder of assets folder it contains images,uploaded when you upload a your profile picture.It will also contain images when
                             you upload your profile picture.Its contains dynamic type images i.e the images will be changed once you update your profile picture                            
   4. config- this folder contains all DATABASE CONNECTIVITY queries in php format.
   
   5. img- it contains your default profile picture when you login first time. Later you change it, its contains static file i.e [default_profile.png] which is 
              recommended not to delete. U can also store other images here to later development of project.
    
   6. inc- it contains include files which will be useful when you want to add something which is constatnt across whole application.  
 
 # ROLE OF EACH FILE : 
------------------------
      #1. db.php-               this file contains all the db connectivity query.
      #2. default_profile.php-  the default profile picture.
      #3. footer.php-           this contains footer section of the webpage. Include this using php [ include() ] function to add footer in webpage.
      #4. header.php-           this contains footer section of the webpage. Include this using php [ include() ] function to add footer in webpage.
      #5. index.php-            this is starting point of php in conatins homepage.Here login and register forms are present 
      #6. dashboard.php-        this is the page where you are redirected when you login succesfully. In this page you can enjoy various features.
      #7. profile.php-          once you log in you can upload your profile picture or change it. 
      #7. prime.php-            normal users are not allowed to post anything. So to post as a admin this page is designed. 
      #7. logout.php-           this php file doesnt have any visual importnace it helps to logout exsisting user. 
      #7. comment.php-          this php file uploads your comment, which can be viewed while you are on a post view button. 
      #7. post.php-             this php file helps to upload a post.
      #7. view.php-             it shows the post details.
      #8. comment.php-          this php file helps to edit a post.
      #8. update.php-           tracks all update operations.
      #8. like.php-             tracks all like operations.
      #8. dislike.php-          tracks all dislike operations.
      #8. delete.php-          tracks all delete operations i.e delete a post.
      
      
      
# DEPLOYING PROJECT AT LOCAL HOST
1. To deploy the project in your local machine first install xampp server by follwoing the link https://www.apachefriends.org/index.html . Download the version
   suitable for your desktop OS.

2. Now create a database by going through XAMPP documentation.

3. Now in top right corner you will find a option i.e 'import'. Now using that, import the 'blogger.sql' provided with the file.For any query go to https://www.inmotionhosting.com/support/website/databases/import-database-using-phpmyadmin/  .

4. Tables will be created automatically as soon import is succesfull. Note: Delete all the exsisting table details.

5. Now go to config/db/php and do the following:
                   $server ="localhost";  //localhost name
                   $user="root";
                   $password ="";
                   $dbname="databasename"; //enter your database name which project will access

6. Open XAMPP control panel.
7. Start APACHE AND MY SQL SERVER. If succesfull the background of the them will be turned to green. Note: ports that your are using should be free. No
   other hosting services should be using it.
8.Now store this project folder i.e BloggerSite folder inside ../xampp/htdocs/ . 
9.Now go to any browser and type url http://localhost/BloggerSite to deploy the project on your browser.


# NAVIGATION THROUGH PROJECT

NOTE: PLEASE READ THE USER MANUAL FOR THE WORKING OF THE WEB APPLICATION.

# DESIGNED BY
Name - Prithvish Chakraborty

Mail-id - prithvish.rishi@gmail.com

# IMPORTANT LINKS
  1. php ldocumentation - https://www.php.net/docs.php
  
  2.bootstrap documentation - https://getbootstrap.com/docs/4.1/getting-started/introduction/
  
  3.html documentation - https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5
 

             
    
       
          
          
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
