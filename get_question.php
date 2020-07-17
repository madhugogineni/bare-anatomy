<?php
require('db.php');
require('connection.php');
$answerId = $_GET['answerId'];
$questionId = $_GET['questionId'];

if (empty($answerId) && empty($questionId)) {
    $questionQuery = "SELECT q.id,q.question,q.type from questions as q where q.is_first_question = 1 and q.is_deleted = 0";
} else {
    $questionQuery = "SELECT q.id,q.question,q.type from questions as q where q.id in (select next_question_id from answers as a where a.id=" . $answerId . " and a.question_id=" . $questionId . ")";
}

$questionResponse = executeSqlQuery($con,$questionQuery);
if (!empty($questionResponse['id'])) {
    $answerQuery = "select a.id,a.answer,a.type,a.next_question_id,a.points from answers as a where a.is_deleted = 0 and a.question_id = " . $questionResponse['id'];
    $answerResponse = executeSqlQuery($con,$answerQuery);
}
$response = array('question' => $questionResponse, 'answers' => $answerResponse);
echo json_encode($response);
