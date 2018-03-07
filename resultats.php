<?php
session_start();
include_once 'models/database.php';
include_once 'models/question.php';
include_once 'models/answers.php';
include_once 'models/users.php';
include_once 'models/result.php';
include_once 'controllers/resultatsController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Statistiques</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/united/bootstrap.css" />
        <link rel="stylesheet" href="assets/css/master.css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    </head>
    <body>
        <h1 class="w-100 text-center display-1">Quizz-in</h1>

        <?php
        if ($resultAnswers->id_user != 0) {
            ?>
            <h3 class="h3 text-center"> Votre score est de : <?= $resultById->nbAnswers ?>/<?= $resultById->nbQuestion ?></h3>
            <?php
        }
        ?>
        <h2 class="h3 text-center">Les statistiques </h2>
        <table class="w-50 mx-auto">
            <caption>Résultats par catégories</caption>
            <thead>
                <tr class="table-light text-center">
                    <th class="p-3">Genre</th>
                    <th class="p-3">Taux de réussite</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>Masculin</td>
                    <td><?= ($percentageMen == 0) ? 'Non défini' : $percentageMen . '%' ?></td>
                </tr>
                <tr class="text-center">
                    <td>Féminin</td>
                    <td><?= ($percentageWomen == 0) ? 'Non défini' : $percentageWomen . '%' ?></td>
                </tr>
                <tr class="text-center">
                    <td>Moyenne</td>
                    <td><?= ($percentageTotal == 0) ? 'Non défini' : $percentageTotal . '%' ?></td>
                </tr>
            </tbody>
        </table>
        <table class="w-50 mx-auto">
            <caption>Résultats par catégories</caption>
            <thead>
                <tr class="table-light text-center">
                    <th class="p-3">Tranche d'âges</th>
                    <th class="p-3">Taux de réussite</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>-18</td>
                    <td><?= ($percentageByM18 == 0) ? 'Non défini' : $percentageByM18 . '%' ?></td>
                </tr>
                <tr class="text-center">
                    <td>18-25</td>
                    <td><?= ($percentageBy1825 == 0) ? 'Non défini' : $percentageBy1825 . '%' ?></td>
                </tr>
                <tr class="text-center">
                    <td>25-40</td>
                    <td><?= ($percentageBy2540 == 0) ? 'Non défini' : $percentageBy2540 . '%' ?></td>
                </tr>
                <tr class="text-center">
                    <td>+40</td>
                    <td><?= ($percentageBy40200 == 0) ? 'Non défini' : $percentageBy40200 . '%' ?></td>
                </tr>
            </tbody>
        </table>
        <script src="assets/js/jquery-3.2.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>