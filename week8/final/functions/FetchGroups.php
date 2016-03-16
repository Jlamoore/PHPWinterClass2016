<?php
function fetchGroups()
{
session_start();
    $db = dbconnect();
    $user_id = $_SESSION['user_id'];
    $stmt = $db->prepare("SELECT address_group, address_groups.address_group_id FROM address_groups JOIN address ON address_groups.address_group_id = address.address_group_id WHERE user_id = :user_id");
            $binds = array(
                ":user_id" => $user_id);
             if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
             }
             return $results;
}
    

