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
    <link rel="stylesheet" href="assets/css/master.css" />
    <title>Test-e-quizz</title>
  <body>
    <div class="container-fluid">
      <div class="row">  
        <h1 class="w-100 text-center display-1">Quizz-in</h1>
      </div>
      <div class="row">
        <div class="offset-3 col-6">  
          <form method="POST">
            <div class = "card border-primary mb-3 visible">
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
                          ?>
                        <div class="col-12 d-flex justify-content-center button"> 
                          <img src="assets/img/imgQ8.jpg" class="img-fluid w-25 img-thumbnail" />
                        </div>
                        <?php
                    }
                    ?> 
                    <?php
                    foreach ($answersList as $answer) {
                        if ($answer->idQuestion == $question->id) {
                            ?>                                  
                            <p class="card-text">
                                <input type="radio" name="nbQuestion<?= $answer->id; ?>" value="<?= $answer->id; ?>">
                              <label data-iscorrect="<?=  $answer->isCorrect; ?>" class="pl-3" for="nbQuestion<?= $answer->idQuestion; ?>"><?= $answer->answer; ?></label>
                            </p>                          
                            <?php
                        }                        
                    }
                    ?>
                  </div>
                  <div class="alert alert-dismissible alert-info answer hidden">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4 class="alert-heading">Le saviez-vous ?</h4>
                    <p class="mb-0"><?= $question->description ?>.</p>
                    <div class="d-flex justify-content-end button">
                        <?php
                        if ($question->id == 10) {
                            ?>
                          <button type="submit" name="validate" class="btn btn-primary nextButton">Valider</button>          
                          <?php
                      } else {
                          ?> 
                          <button type="button" name="next" class="btn btn-primary nextButton" id="<?= $question->id ?>">Question suivante</button>
                        <?php
                      }
                      ?>
                    </div>
                  </div>                    
                </div>
                    <div class="alert  alert-info answer hidden" id="description-<?= $question->id; ?>">                    
                    <h3 class="alert-heading">Le saviez-vous ?</h3>
                    <p class="mb-0"><?= $question->description ?>.</p>                    
                  </div>
                <?php
            }
            ?>
        </div>
        </form>
      </div>
    </div>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="assets/js/master.js" type="text/javascript"></script>
</html>