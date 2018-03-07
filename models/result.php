<?php

class result extends database {

// Attribut public
    public $id = 0;
    public $id_user = 0;
    public $id_question = 0;
    public $id_answers = 0;

    public function __construct() {
        parent::__construct();
    }
    
    public function getResultByUserId(){
        $query = 'SELECT COUNT(`id_pokfze_answers`) '
                . 'FROM `pokfze_result '
                . 'INNER JOIN `pokfze_answers` '
                . 'ON `pokfze_result`.`id_pokfze_answers` =  `pokfze_answers`.id '
                . 'WHERE `pokfze_answers`.`isCorrect` = 1 AND `pokfze_result`.`id_pokfze_user` = :idUser';
        $queryResult = $this->db->prepare($query);
        $queryResult->bindValue(':idUser', $this->id_user, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    /**
     * Insertion du résultat de la question par rapport au choix de l'utilisateur
     */
    public function insertResultQuestion() {
        $sql = 'INSERT INTO `pokfze_result`(`id_pokfze_user`, `id_pokfze_question`, `id_pokfze_answers`) '
                . 'VALUES (:resultUserId,:resultQuestionId,:resultAnswersId)';
        $result = $this->db->prepare($sql);
        $result->bindValue(':resultUserId', $this->id_user, PDO::PARAM_INT);
        $result->bindValue(':resultQuestionId', $this->id_question, PDO::PARAM_INT);
        $result->bindValue(':resultAnswersId', $this->id_answers, PDO::PARAM_INT);
        return $result->execute();
    }
    
    public function scoreRanking(){
        $query = 'SELECT COUNT(`id_pokfze_answers`) AS `score`, `id_pokfze_user`, `pokfze_user`.`username` '
                . 'FROM `pokfze_result` '
                . 'INNER JOIN `pokfze_answers` ON `pokfze_result`.`id_pokfze_answers` = `pokfze_answers`.`id` '
                . 'INNER JOIN `pokfze_user` ON `pokfze_result`.`id_pokfze_user` = `pokfze_user`.`id` '
                . 'WHERE `pokfze_answers`.`isCorrect` = 1 '
                . 'GROUP BY `pokfze_result`.`id_pokfze_user` '
                . 'ORDER BY `score` DESC '
                . 'LIMIT 10 OFFSET 0';
        $queryExecute = $this->db->query($query);
        return $queryExecute->fetch(PDO::FETCH_OBJ);
    }
    
    public function __destruct() {
        parent::__destruct();
    }

}
