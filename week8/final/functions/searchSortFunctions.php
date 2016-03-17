<?php
function sortfunction(){
session_start();
        $db = dbconnect();                                                  //connect to db, load variables and query for records in db that match the requirments
        $user_id = $_SESSION['user_id'];
        $group_id = filter_input(INPUT_POST, 'addressGroup');
        $stmt = $db->prepare("SELECT fullname, address_id FROM address JOIN address_groups ON address.address_group_id = address_groups.address_group_id WHERE user_id = :user_id AND address.address_group_id =:group_id ORDER BY fullname");
        $binds = array(
            ":user_id" => $user_id,             //setup binds
            ":group_id" => $group_id
        );

        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {                  //return results based on success
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
}
function searchfunction()
{
    
  session_start();
        $db = dbconnect();              //connect to db and build query based on entered fields. execute query and return results
        $user_id = $_SESSION['user_id'];
        $group = filter_input(INPUT_POST, 'addressGroup');
        $searchterm = filter_input(INPUT_POST, 'searchterm');
        $stmt = $db->prepare("SELECT fullname, address_id FROM address WHERE user_id = :user_id AND $group LIKE '%$searchterm%'");  //could not get db to play nice with these two binds. had to use variables
        $binds = array(
            ":user_id" => $user_id,
            //":group" => $group,
            //":searchterm" => $searchterm
        );

        $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;  
}

