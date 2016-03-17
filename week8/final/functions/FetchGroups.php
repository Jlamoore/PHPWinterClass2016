<?php
function fetchGroups()                                              //connect to db aand pull from db all address groups. return
                                                                    //the results 
{
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * from address_groups");
             if ($stmt->execute() && $stmt->rowCount() > 0) {
                 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
             }
             return $results;
}
    

