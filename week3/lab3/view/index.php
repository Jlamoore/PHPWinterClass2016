<!Doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">    <!--include style sheet-->
        <title></title>
    </head>
    <body>
       <?php
       include '../includes/dbconnect.php';     //include database connection and functions file.
       include '../includes/functions.php';
       
       $db = getDatabase();                     //connect to db
       $stmt = $db->prepare("SELECT corp, id FROM corps");  //sql statment to show the name of the corp and the id.
       
       $results = array();
       if ($stmt->execute() && $stmt->rowCount() > 0)       //if there is results, load the results in an array called results
       {$results = $stmt->fetchAll(PDO::FETCH_ASSOC);}
       ?>
        <table class="table table-striped">                 <!--css style-->
            <thead>
                <tr> 
                    <th>Corporation</th>
                </tr>
            </thead>
            <?php
            foreach ($results as $row): ?>          <!--loop through the results array and display all corps-->
            <tr>
                <td><?php echo $row['corp']; ?></td>
                <td><a href="../manage/read2.php?id=<?php echo $row['id']; ?>">Read</a></td>        <!--links to other pages with stored id's-->
                <td><a href="../manage/update.php?id=<?php echo $row['id']; ?>">Update</a></td>
                <td><a href="../manage/delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
            </tr>
            <?php                   endforeach; ?>
            <tr>
                <td>Add new corporation?</td>
                <td><a href="../manage/create.php">Create</a></td>
            </tr>
        </table>
    </body>
</html>


