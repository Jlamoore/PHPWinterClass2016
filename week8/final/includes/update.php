<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">    <!--include style sheet-->
        <title></title>
        
    </head>
    <body>
        <?php
        include '../functions/dbconnect.php';            //includ database connect and functions
        include '../functions/until.php';
        
        $db = dbconnect();            //connect to database
        $result = '';
        if (isPostRequest())    //if there is a post request set form input to variables
        {
            $id = filter_input(INPUT_POST, 'id');
            $fullname = filter_input(INPUT_POST, 'fullname');
            $phone = filter_input(INPUT_POST, 'phone');
            $email = filter_input(INPUT_POST, 'email');
            $address = filter_input(INPUT_POST, 'address');
            $website = filter_input(INPUT_POST, 'website');
            $birthday = filter_input(INPUT_POST, 'birthday');
            $stmt = $db->prepare("UPDATE address set fullname = :fullname, phone = :phone, email = :email, address = :address, website = :website, birthday= :birthday WHERE address_id =:id"); //use variables to update sql db
            
            $binds =array(              //setup an associative array
                ":id" => $id,
                ":fullname" => $fullname,
                ":phone" =>$phone,
                ":email" => $email,
                ":address" => $address,
                ":website" => $website,
                ":birthday" => $birthday);
            
           if ($stmt->execute($binds) && $stmt->rowCount() > 0) {       //test if the sql statment was sent, and if any rows were effected
                   $result = 'Record updated';  
                }
        }else
            {
             $id = filter_input(INPUT_GET, 'id');
             $stmt = $db->prepare("SELECT * FROM address WHERE address_id =:id");     //else try the sql again
             $binds = array(
                 ":id"=>$id
             );
             if ($stmt->execute($binds) && $stmt->rowCount() >0)
             {
                 $results =$stmt->fetch(PDO::FETCH_ASSOC);  //successful
             }
             if (!isset($id))
                 {
                 die('Record not found');       //end process record update failed
                 }
                 $fullname = $results['fullname'];
                 $phone = $results['phone'];
                 $email = $results['email'];
                 $address = $results['address'];
                 $website = $results['website'];
                 $birthday = $results['birthday'];
            }
              ?>  
        <h1><?php echo $result; ?></h1>             <!--html form for entering data-->
        <form method="post" action="#">
            Full-name <input type="text" value="<?php echo $fullname; ?>" name="fullname" />
            <br/>
            Phone <input type="text" value="<?php echo $phone; ?>" name="phone" />
            <br/>
            Email <input type="text" value="<?php echo $email; ?>" name="email" />
            <br/>
            Address <input type="text" value="<?php echo $address; ?>" name="address" />
            <br/>
            Web site <input type="text" value="<?php echo $website; ?>" name="website" />
            <br/>
            Birthday <input type="date" value="<?php echo $birthday; ?>" name="birthday" />
            <br/>
             <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
        </form>
        <form method="GET" action="../index.php"><br/><br/>
            <input type="submit" name="view" value='View-all'>
        </form>
    </body>
</html>