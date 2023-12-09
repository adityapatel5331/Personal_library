<?php
$hostname = "db.cs.dal.ca";
$username = "patel29";
$password = "nbwyQdUUMC34dvZnGcaWzdj5n";
$database = "patel29";

try {

    $conn = new PDO("mysql:host=db.cs.dal.ca;dbname=patel29", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec('SET NAMES "utf8"');

} catch (Exception $e) {

    echo 'Not connected to Database.' . $e->getMessage();

    exit();
}
echo "database connected"
    ?>