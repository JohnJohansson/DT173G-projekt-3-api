# API

This is a CRUD-JSON application with suport for three API's.

They can be used to host a online resume for a webb developer with earlier work experainces, the name of the 

jobb, your title, start and end date, earlier educations, the name of the school, the course and start and

endate and earlier webbpages you have done, what date they where made, thier title, a description and a url 

to the page in question. With this file is an install file so you easily can get started.

**Install.php**

Start by cloning the repo, then when you have it go into the install file go to line 46 and change the line 

'pass'. This is what your looking for "//hasshing the password to make it safe
//OBS change the password to whatever you want it to be and dont uplode this file with the live server
$password = 'pass';
$hash = password_hash($password, PASSWORD_DEFAULT);"

The 'pass' will be your password, it will be encrypted by the install file when you run it, make sure if you 

use the code for a live server to remove the install file after using it to keep your password safe. 

This is meant to be used togheter with a Admin page I have done and a page for consuming the api's.

Ypu can find the Admin page here = https://github.com/JohnJohansson/DT173G-projekt-2-admin

And the page to read out the api for public use here = https://github.com/JohnJohansson/DT173G-projekt-1

