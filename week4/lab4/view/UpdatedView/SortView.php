<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">        <!-- css style sheet -->
        <title></title>
        
    </head>
    <body>
        <?php       
        include '../functions/SortFunction.php';        //include the sort function 
                $results = sortFunction();?>            <!--sets the $results array = to the returned value of the sort function-->
        
        
        <table class="table table-striped">      <!-- css style-->
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
            <?php foreach ($results as $row): ?>          <!-- display the results of the sort in an easy to read table -->
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

