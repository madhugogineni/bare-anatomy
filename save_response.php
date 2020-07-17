<?php
require('db.php');
require('connection.php');
$email = $_POST['email'];
$answersObject = $_POST['answersObject'];
$score = $_POST['score'];
if (!empty($email) && !empty($answersObject) && !empty($answersObject)) {
    $sql = "insert into responses(email,response,score) values('" . $email . "','" . $answersObject . "'," . $score . ")";
}

$response = insertSqlQuery($con, $sql);
if ($response) {
    echo json_encode(array("success" => true, "message" => "Successfully saved your response"));
}else {
    echo json_encode(array("success" => false, "message" => "Please try again"));
}
echo json_encode($response);
