<?php

$resultAnswer = new result();
$answers = new answers();
$answersList = $answers->getAnswersList();

$questions = new question();
$questionsList = $questions->getQuestionsList();
$user = new users();


$pushedAnswers = array();
if (isset($_POST['validate'])) {
    $nbQuestion = count($_POST);
    $user->birthdate = $_SESSION['birthdate'];
    $user->username = $_SESSION['username'];
    $user->gender = $_SESSION['gender'];
    $user->addUser();
    $question = 1;
    $resultAnswer->id_user = $user->id;
    foreach ($_POST as $value) {
        if ($question <= $nbQuestion - 1) {
            $resultAnswer->id_question = $question;
            $resultAnswer->id_answers = $value;
            $resultAnswer->insertResultQuestion();
            $question ++;
        }
    }
}
