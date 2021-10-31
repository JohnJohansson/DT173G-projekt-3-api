<?php
// an installation file to install my database easily 
include("includes/config.php");

// databas anslutning
$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE); //Connects to the database
if ($db->connect_errno > 0) { //
    die("Fel vid anslutning: " . $db->connect_error);
}

// SQL-FRÅGA för att skapa tabel courses
$sql = "DROP TABLE IF EXISTS admin;
DROP TABLE IF EXISTS schools;
DROP TABLE IF EXISTS webbpage;
DROP TABLE IF EXISTS work;
   CREATE TABLE admin(id INT(11) PRIMARY KEY AUTO_INCREMENT, 
   username VARCHAR(255) NOT NULL, 
   password VARCHAR(255) NOT NULL, 
   date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
);
CREATE TABLE schools(id INT(11) PRIMARY KEY AUTO_INCREMENT, 
   school VARCHAR(255) NOT NULL, 
   course VARCHAR(255) NOT NULL, 
   startdate VARCHAR(255) NOT NULL,
   enddate VARCHAR(255) NOT NULL, 
   date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
);
CREATE TABLE webbpage(id INT(11) PRIMARY KEY AUTO_INCREMENT, 
created VARCHAR(255) NOT NULL,
title VARCHAR(255) NOT NULL, 
url VARCHAR(255) NOT NULL, 
body VARCHAR(255) NOT NULL,
date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
);
CREATE TABLE work(id INT(11) PRIMARY KEY AUTO_INCREMENT, 
title VARCHAR(255) NOT NULL, 
place VARCHAR(255) NOT NULL, 
startdate VARCHAR(255) NOT NULL,
enddate VARCHAR(255) NOT NULL,
date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
);

";
//hasshing the password to make it safe
//OBS change the password to whatever you want it to be and dont uplode this file with the live server
$password = 'pass';
$hash = password_hash($password, PASSWORD_DEFAULT);

$sql .= "
INSERT INTO admin(username,password) 
VALUES
('Admin',  '$hash');

INSERT INTO schools(school,course,startdate,enddate) 
VALUES
('Minum', 'webbprogrammering', '10/11-2020', '06/12-2022');

INSERT INTO webbpage(created,title,url,body) 
VALUES
('2019', 'kickis kondis', '#', 'kickis jätte bra kondis sida');

INSERT INTO work(title,place,startdate,enddate) 
VALUES
('Panda försäljare', 'zoo', '01/11-1920', '02/12-2020');  
";







echo "<pre>$sql</pre>";

if ($db->multi_query($sql)) {
    echo "<p>Tabbeller installerades</p>";
} else {
    echo "<p class='error'>Fel vid installation</p>";
}
