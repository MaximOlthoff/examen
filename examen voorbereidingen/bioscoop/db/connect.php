<?php

        $dbhost		= "localhost";
        $dbname		= "db_bioscoop";
        $dbuser		= "db_pagebuilder";
        $dbpass		= "db_pass_pagebuilder";
        $conn		= "";                        // connection string
        $pdo;                                    // handler
        $charset = 'utf8mb4';


        // Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
        