<?php

function createUser() {
    $db = dbconnect();                                      //connect to db
    $userId = filter_input(INPUT_POST, 'UserName');                                                 //set variables
    $email = filter_input(INPUT_POST, 'Email');
    $password = filter_input(INPUT_POST, 'password');
    $pass = sha1($password);
    $stmt = $db->prepare("INSERT INTO users SET user_id = :userId, email = :email, password = :password, created = now()");     //prepare a query
    $binds = array(
                    ":userId" => $userId,
                    ":email" => $email,                             //setup binds
                    ":password" => $pass
                );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0){                              //execute query
        $result = 'successfully created.';                  //success
    } else {
        $result = "Oops something went wrong, Please try again.";       //failure
    }
    return $result;     //return results
}
