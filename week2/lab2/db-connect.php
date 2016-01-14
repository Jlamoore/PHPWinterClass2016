<?php
/*function that attempts to connect to database.*/
function getDatabase()
{
    $config = array
            ('dbLocation' => 'mysql:host=localhost;port=3306;dbname=PHPClassWinter2016',
            'dbUser' => 'php',
            'dbPassword' => 'winter16'
        );
    /*Creates db connection stores it in variables.*/
    try{
        $db = new PDO($config['dbLocation'], $config['dbUser'], $config['dbPassword']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    } catch (Exception $ex) {
        /*setting the value to null closes the connection*/
        $db = null;
    }
    return $db;
}


