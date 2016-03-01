<?php

function getAllTestData(){                                              // connect to db then select all data from db
    $db = dbconnect();                                                  
                                                                          
    $stmt = $db->prepare("SELECT * FROM corps");

     $results = array();                                                 // load results of query into an array
     if ($stmt->execute() && $stmt->rowCount() > 0) {
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);                          //validate and return the array
     }
    return $results;
}


