<?php

function doesExistInDB() {
    $db = dbconnect();
    $email = filter_input(INPUT_POST, 'Email');                                         //gather email
    $stmt = $db->prepare("SELECT email FROM users WHERE email LIKE '%$email%'");           //gather database emails like the one etered
    if ($stmt->execute() && $stmt->rowCount() > 0) {                                //set values based on results
        $result = TRUE;
    } else {
        $result = FALSE;
    }
    return $result;                     //return true if a result is found, return false if no result is found
}

function isValidEmail() {
    $email = filter_input(INPUT_POST, 'Email');                     //gather email
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == TRUE) {                //use php validation to test if email is valid
        $result = TRUE;
    } else {

        $result = false;
    }
    return $result;             //return wether the email was valid or not
}
