<?php

function doesExistInDB() {
    $db = dbconnect();
    $email = filter_input(INPUT_POST, 'Email');                                         //gather url
    $stmt = $db->prepare("SELECT email FROM users WHERE email LIKE '%$email%'");           //gather database urls like the one in the variable
    if ($stmt->execute() && $stmt->rowCount() > 0) {                                //set values based on results
        $result = TRUE;
    } else {
        $result = FALSE;
    }
    return $result;
}

function isValidEmail() {
    $email = filter_input(INPUT_POST, 'Email');
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == TRUE) {
        $result = TRUE;
    } else {

        $result = false;
    }
    return $result;
}
