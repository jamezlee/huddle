<?php

 // this will avoid mysql_connect() deprecation error.
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 // but I strongly suggest you to use PDO or MySQLi.
 
 define('DBHOST', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', 'root');
 define('DBNAME', 'upboxf1');
 
 // 1. Create a database connection
$connection = mysql_connect(DBHOST,DBUSER,DBPASS);
if (!$connection) {
    die("Database connection failed: " . mysql_error());
    echo"fail";
}


// 2. Select a database to use 
$db_select = mysql_select_db(DBNAME);
if (!$db_select) {
    die("Database selection failed: " . mysql_error());
}