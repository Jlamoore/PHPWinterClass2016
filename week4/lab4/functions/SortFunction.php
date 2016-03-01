<?php
            function sortFunction()
            {
           $db = dbconnect();                                           //connect to db
           $column = filter_input(INPUT_GET, 'category');                       //get the column chosen from form
           $order = filter_input(INPUT_GET, 'order');                              // get the order chosen from form
           $stmt = $db->prepare("SELECT * FROM corps ORDER BY $column $order");     //order db by the column and either desc or asc

             $results = array();                                                    // load results into an array, validate,and return the array
             if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
             }
             return $results;
            }
        

