<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <title></title>        
    </head>
    <body>
        <?php
        
           include_once '../functions/dbconnect.php';
           include_once '../functions/dbData.php';
            
          $results = getAllTestData();
            
               ?>
        <table class="table table-striped">                 <!--css style-->
            <thead>
                <tr> 
                    <th>Corporation</th>
                    <th>Incorporation Date</th>
                    <th>Email</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <?php
            foreach ($results as $row): ?>          <!--loop through the results array and display all corps-->
            <tr>
                <td><?php echo $row['corp']; ?></td>
                <!--<td><a href="../manage/read2.php?id=<?php echo $row['id']; ?>">Read</a></td>        <!--links to other pages with stored id's-->
                <!--<td><a href="../manage/update.php?id=<?php echo $row['id']; ?>">Update</a></td>
                <td><a href="../manage/delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>-->
                <td><?php   $date = new DateTime($row['incorp_dt']);
                            echo $date->format('m-d-Y'); ?></td>
                <td><?php echo $row['email']; ?></td> 
                <td><?php echo $row['zipcode']; ?></td> 
                <td><?php echo $row['owner']; ?></td>
                <td><?php echo $row['phone']; ?></td> 
            </tr>
            <?php                   endforeach; ?>
<!--            <tr>
                <td>Add new corporation?</td>
                <td><a href="../manage/create.php">Create</a></td>
            </tr>-->
        </table>
           
    </body>
</html>


