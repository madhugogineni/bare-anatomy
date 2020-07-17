<?php 
$con = mysqli_connect("localhost", "madhu", "madhu", "bare_anatomy");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die(array(
        "success" => false,
        "message" => "Mysql Connection Issue"
    ));
}
?>