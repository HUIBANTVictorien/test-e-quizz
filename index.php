<?php
session_start();
include_once 'models/database.php';
include_once 'models/users.php';
include_once 'controllers/usersController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://bootswatch.com/4/united/bootstrap.css" />
        <link href="https://fonts.googleapis.com/css?family=Yeseva+One" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/master.css" />
        <title>Bienvenue</title>
    </head>
    <body class="bg-primary">
        <div class="container-fluid">
            <div class="row">
                <div class="w-100 mb-5">
                    <h1 class="w-100 text-center display-3">Quizz des droits de la femme</h1>
                </div>
            </div>
            <section class="autogrid">
                <section class="autogrid back">
                    <div class="row">
                        <div class="offset-sm-3 col-sm-6">
                            <form action="question.php" method="POST">
                                <div class = "card border-primary mb-3 visible" id="card-0">
                                    <div class = "card-header">
                                        <h2 class="h3">
                                            Inscription
                                        </h2>
                                    </div>
                                    <div class="card-body">
                                        <form-group>
                                            <div class="row">
                                                <div class="offset-sm-3 col-sm-3">
                                                    <label for="username" >Nom ou pseudo : </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="NOM PSEUDO" id="username" name="username" value="<?= $user->username != '' ? $user->username : ''; ?>"/>
                                                </div>
                                                <p><?= $textUsername ?></p>
                                            </div>
                                        </form-group>
                                        <br/><br/>
                                        <form-group>
                                            <div class="row">
                                                <div class="offset-sm-3 col-sm-3">
                                                    <label for="birthdate" >Date de naissance : </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="date" placeholder="TON AGE" name="birthdate" max="2001-01-01" value="<?= $user->birthdate != '' ? $user->birthdate : ''; ?>"/>
                                                </div>
                                                <p><?= $textBirthdate ?></p>
                                            </div>
                                        </form-group>
                                        <br/><br/>
                                        <form-group>
                                            <div class="row">
                                                <div class="offset-sm-3 col-sm-3">
                                                    <label for="" >Civilité : </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <ul class="is-unstyled">
                                                        <li>
                                                            <input type="radio" name="gender" value="man" <?= $user->gender == 1 && $checkGender ? 'checked' : ''; ?>>
                                                            <label for="m">Monsieur</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" name="gender" value="woman" <?= $user->gender == 0 && $checkGender ? 'checked' : ''; ?>>
                                                            <label for="gender">Madame</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form-group>
                                        <div class="d-flex justify-content-end button">
                                            <input class="btn btn-primary register hidden" type="submit" value="Valider" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                </section
            </section>
        </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="assets/js/index.js"></script>
    </body>
</html>