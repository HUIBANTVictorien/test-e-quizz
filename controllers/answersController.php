<?php

if (isset($_POST['idQuestion'])) {
    include_once '../models/database.php';
    include_once '../models/answers.php';
    $answers = new answers();
    $answers->id_question = $_POST['idQuestion'];
    $listAnswers = $answers->displayAnswers();
    echo json_encode($listAnswers);
}

