<?php

function getAllTestData(){
    $db = dbconnect();
           
    $stmt = $db->prepare("SELECT * FROM test");                     //did not use

     $results = array();
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
     }
    return $results;
}

/*
 * $stmt = $db->prepare("SELECT * FROM test ORDER BY $column $order");
 */
function searchTest($column, $search){
    $db = dbconnect();
           
    $stmt = $db->prepare("SELECT * FROM test WHERE $column LIKE :search");      //did not use

    $search = '%'.$search.'%';
    $binds = array(
        ":search" => $search
    );
    $results = array();
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}


function processAdd() {
     $action = filter_input(INPUT_POST, 'action');          //did not use
            
    if ( $action === 'insert' ) {
        //saveData();
    }
}