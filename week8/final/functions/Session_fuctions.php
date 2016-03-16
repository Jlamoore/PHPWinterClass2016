<?php
function session_starter()
{
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
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        session_start();
        foreach ($results as $row)
        {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['created'] = $row['created'];
        }
    }
    
    
}

