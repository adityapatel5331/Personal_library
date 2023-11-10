<?php
$hostname = "db.cs.dal.ca";
$username = "patel29";
$password = "CN7eRK9qzjBCsqhUUE7AQhoiX";
$database = "patel29";

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection to database works!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
<!-- <?php
//phpinfo();
?> -->