<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', "root");
    define('DB_PASS', "1");
    define('DB_NAME', 'library_manager');

    try
    {
        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        echo "Connection Successfully";
    }
    catch (PDOException $e)
    {
        echo "Connection Fail: ". $e->getMessage();
    }
?>