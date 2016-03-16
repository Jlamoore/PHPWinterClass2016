<?php
function AddToDB()
{
    //session_start();
    $db = dbconnect();
    $user_id = $_SESSION['user_id'];
    $fullName = filter_input(INPUT_POST, 'fullName');
    $email = filter_input(INPUT_POST, 'Email');
    $address = filter_input(INPUT_POST, 'address');
    $phone = filter_input(INPUT_POST, 'phone');
    $website = filter_input(INPUT_POST, 'website');
    $birthday = filter_input(INPUT_POST, 'Email');
    $address_group_id = filter_input(INPUT_POST, 'addressGroup');
    $stmt = $db->prepare("INSERT INTO address SET user_id= :user_id, address_group_id = :address_group_id, fullname = :fullname,
             email = :email, address = :address, phone = :phone, website = :website, birthday = :birthday");          
    $binds = array(
                ":user_id" => $user_id,
                ":address_group_id" => $address_group_id,
                ":fullname" => $fullName,
                ":email" => $email,
                ":address" => $address,
                ":phone" => $phone,
                ":website" => $website,
                ":birthday"=> $birthday
            );

            /*
             * empty()
             * isset()
             */

            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = 'Data Added';
            }
    

return $results;
}