<?php
 
function getPDOLink($config) {
    try {
        $bdd = 'mysql:dbname='.$config['database'].';host='.$config['host'].';port='.$config['port'];
        return new PDO($bdd, $config['username'], $config['password']);
    } catch (PDOException $exception) {
        /*
         * Envoyez-vous un email en cas de problème de connexion sur votre site !
         */
        //mail('dmarlair@gmail.com', 'BDD Error', $exception->getMessage());
        exit('BDD Error Connection : '.$exception);
    }
}