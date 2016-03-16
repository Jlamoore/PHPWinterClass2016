<?php

function createUser() {
    $db = dbconnect();
    $userId = filter_input(INPUT_POST, 'UserName');
    $email = filter_input(INPUT_POST, 'Email');
    $password = filter_input(INPUT_POST, 'password');
    $pass = sha1($password);
    $stmt = $db->prepare("INSERT INTO users SET user_id = :userId, email = :email, password = :password, created = now()");
    $binds = array(
                    ":userId" => $userId,
                    ":email" => $email,
                    ":password" => $pass
                );//gather database urls like the one in the variable
    if ($stmt->execute($binds) && $stmt->rowCount() > 0){                              //set values based on results
        $result = 'successfully created.';
    } else {
        $result = "Oops something went wrong, Please try again.";
    }
    return $result;
}
