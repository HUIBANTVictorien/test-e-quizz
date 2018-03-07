<?php
if(count($_POST) > 0){
    $user = new users();
    $user->username = $_SESSION['username'];
    $user->gender = $_SESSION['gender'];
    $user->currentDate = date();
    echo date('Y-m-d');
    $user->birthdate = $_SESSION['birthdate'];
    $user->addUser();
}
?>