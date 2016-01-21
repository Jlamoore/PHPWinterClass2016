<!Doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
       include '../includes/dbconnect.php';
       include '../includes/functions.php';
       
       $db = getDatabase();
       $stmt = $db->prepare("SELECT corp, id FROM corps");
       
       $results = array();
       if ($stmt->execute() && $stmt->rowCount() > 0)
       {$results = $stmt->fetchAll(PDO::FETCH_ASSOC);}
       ?>
        <table>
            <thead>
                <tr> 
                    <th>Corporation</th>
                </tr>
            </thead>
            <?php
            foreach ($results as $row): ?>
            <tr>
                <td><?php echo $row['corp']; ?></td>
                <td><a href="read.php?id=<?php echo $row['id']; ?>">Read</a></td>
                <td><a href="../manage/update.php?id=<?php echo $row['id']; ?>">Update</a></td>
                <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
            </tr>
            <?php                   endforeach; ?>
            <tr>
                <td>Add new corporation?</td>
                <td><a href="create.php">Create</a></td>
            </tr>
        </table>
    </body>
</html>

