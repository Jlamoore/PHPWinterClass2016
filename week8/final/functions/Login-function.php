<?php

function isValidUser() {
    
    $email = filter_input(INPUT_POST, 'Email');                                         //gather variables
    $pass = filter_input(INPUT_POST, 'password');
    $db = dbconnect();
    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email and password = :password");      //prepare statment
    $pass = sha1($pass);                                //protect password
    $binds = array(
        ":email" => $email,                             //setup binds
        ":password" => $pass        
    );

    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {                  //success return true
        return true;
    }
     
    return false;               //failure return false
    
}
