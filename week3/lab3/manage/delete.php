<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">    <!--include style sheet-->
        <title></title>
    </head>
    <body>
        <?php
        
            include '../includes/dbconnect.php';            //include database connection and functions
            include '../includes/functions.php';
            
            $db = getDatabase();
            $id = filter_input(INPUT_GET, 'id'); 
            
            $stmt = $db->prepare("DELETE FROM corps where id = :id");       //sql statement to delete the record with the specified id
            
            $binds = array(
                ":id" => $id            //setup asociative array
            );

       
        $isDeleted = false;
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {  //test if the record is deleted
            $isDeleted = true;
        }       
        
        ?>
        
        
        <h1> Record <?php echo $id; ?>
         <?php if ( !$isDeleted ): ?>           <!--record is not deleted-->
          Not
        <?php endif; ?>
        Deleted</h1>
        
        <p> <a href="../view/index.php">View page</a></p>
        
        
        
    </body>
</html>


