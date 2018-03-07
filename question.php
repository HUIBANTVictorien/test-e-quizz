<?php
session_start();
include_once 'models/database.php';
include_once 'models/question.php';
include_once 'models/answers.php';
include_once 'models/users.php';
include_once 'models/result.php';
include_once 'controllers/questionController.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://bootswatch.com/4/united/bootstrap.css" />

        <link href="https://fonts.googleapis.com/css?family=Yeseva+One" rel="stylesheet" /> 
        <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/master.css" />
        <title>Test-e-quizz</title>
    <body class="bg-primary">
        <div class="container-fluid">
            <div class="row mb-5">  
                <h1 class="w-100 text-center display-3">Quizz des droits de la femme</h1>    
            </div>
            <div class="row">
                <div class="offset-sm-3 col-sm-6">  
                    <form method="POST" action="resultats.php">
                        <div class = "card border-primary mb-3 visible" id="card-0">
                            <div class = "card-header">
                                <h2 class="h3">
                                    Vous êtes prêts ?
                                </h2>
                            </div>
                            <div class="card-body">
                                <p>Faîtes bien attention si vous cliquez sur une réponse elle sera validée !</p>
                                <div class="d-flex justify-content-end button">  
                                    <button type="button" name="next" class="btn btn-primary nextButton"  id="0">Valider</button>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($questionsList as $question) { ?>
                            <div class = "card border-primary mb-3 hidden question" id="card-<?= $question->id ?>">
                                <div class = "card-header">
                                    <h2 class="h3">
                                        <?= $question->id ?> / 10 -
                                        <?= $question->question; ?>
                                    </h2>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if ($question->picture) {
                                        <div class="col-12 d-flex justify-content-center button">
                                            <img src="assets/img/imgQ8.jpg" class="img-fluid w-25 img-thumbnail" />
                                        </div>
                                        <?php
                                    }
                                    foreach ($answersList as $answer) {
                                        if ($answer->idQuestion == $question->id) {
                                            ?>                                  
                                            <p class="card-text">
                                                <input data-answer="<?= $answer->isCorrect; ?>" type="radio" id="question<?= $answer->id; ?>" name="question<?= $answer->id; ?>" value="<?= $answer->id; ?>">
                                                <label data-iscorrect="<?= $answer->isCorrect; ?>" class="pl-3" for="question<?= $answer->id; ?>"><?= $answer->answer; ?></label>
                                            </p>                          
                                            <?php
                                        }
                                    }
                                    if ($question->id == 10) {
                                        ?>
                                        <div class="d-flex justify-content-end button"> 
                                            <button type="submit" name="validate" class="btn btn-primary nextButton" id="<?= $question->id ?>">Valider</button>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="d-flex justify-content-end button">  
                                            <button type="button" name="next" class="btn btn-primary nextButton" id="<?= $question->id ?>">Question suivante</button>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="alert  alert-info answer hidden" id="description-<?= $question->id; ?>">                    
                                <h3 class="alert-heading text-capitalize"><i class="fas fa-info-circle"></i> Le saviez-vous ?</h3>
                                <p class="mb-0"><?= $question->description ?>.</p>                    
                            </div>
                            <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/master.js" type="text/javascript"></script>
</html>