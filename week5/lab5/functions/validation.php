<?php

function validateUrl() {
    $url = filter_input(INPUT_POST, 'URL');                         //get url
    if (filter_var($url, FILTER_VALIDATE_URL) == TRUE) {            //us built in php functions to validate
        $message = TRUE;                                            //set return value to based on condition
    } else {
        $message = FALSE;                                            
    }
    return $message;
}

function doesExistInDB() {
    $db = dbconnect();
    $url = filter_input(INPUT_POST, 'URL');                                         //gather url
    $stmt = $db->prepare("SELECT * FROM sites WHERE site LIKE '%$url%'");           //gather database urls like the one in the variable
    if ($stmt->execute() && $stmt->rowCount() > 0) {                                //set values based on results
        $result = TRUE;
    } else {
        $result = FALSE;
    }
    return $result;
}
