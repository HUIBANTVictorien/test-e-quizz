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
        <link rel="stylesheet" href="assets/css/master.css" />
        <title>Test-e-quizz</title>
    <body>
        <h1>Test-e-Quizz</h1>
        <?php
        if ($checkInsert) {
            ?>
            <a href="question.php">Passer au test </a>
            <?php
        } else {
            ?>
            <section class="autogrid">
                <section class="autogrid back">
                    <form action="#" method="POST">
                        <form-group>
                            <label for="username" >Nom ou pseudo : </label><br/>
                            <input type="text" placeholder="NOM PSEUDO" name="username" value="<?= $user->username != '' ? $user->username : ''; ?>"/>
                            <p><?= $textUsername ?></p>
                        </form-group>
                        <br/><br/>
                        <form-group>
                            <label for="birthdate" >Date de naissance : </label><br/>
                            <input type="date" placeholder="TON AGE" name="birthdate" max="2001-01-01" value="<?= $user->birthdate != '' ? $user->birthdate : ''; ?>"/>
                            <p><?= $textBirthdate ?></p>
                        </form-group>
                        <br/><br/>
                        <form-group>
                            <label for="" >Civilité : </label>
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
                        </form-group>
                        <input type="submit" />

                    </form>
                </section>
            </section>
        <?php } ?>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    </body>
</html>