<?php

/*
 * users
 * user_id
 * email
 * password
 */

function isValidUser() {
    
    $email = filter_input(INPUT_POST, 'Email');
    $pass = filter_input(INPUT_POST, 'password');
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");
    $pass = sha1($pass);
    $binds = array(
        ":email" => $email,
        ":password" => $pass        
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
     
    return false;
    
}
