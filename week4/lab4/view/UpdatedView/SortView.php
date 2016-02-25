<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
    </head>
    <body>
        <?php
        
           include_once '../../functions/dbconnect.php';
                      
           $db = dbconnect();
           $column = 'corps';
           $order = 'ASC'; //DESC
           $stmt = $db->prepare("SELECT * FROM corps ORDER BY $column $order");

             $results = array();
             if ($stmt->execute() && $stmt->rowCount() > 0) {
                 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
             }
          
        ?>
        
        
        <table border="1">
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
            <tbody>
            <?php foreach ($results as $row): ?>
            <tr>
                <td><?php echo $row['corp']; ?></td>
                <td><?php   $date = new DateTime($row['incorp_dt']);
                            echo $date->format('m-d-Y'); ?></td>
                <td><?php echo $row['email']; ?></td> 
                <td><?php echo $row['zipcode']; ?></td> 
                <td><?php echo $row['owner']; ?></td>
                <td><?php echo $row['phone']; ?></td> 
            </tr>
            <?php                   endforeach; ?>
        </table>
        
       
    </body>
</html>

