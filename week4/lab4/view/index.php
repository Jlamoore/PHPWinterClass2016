<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- css style sheet -->
        <title></title>        
    </head>
    <body>
        <?php
        
           include_once '../functions/dbconnect.php';           //include the database connect function, the dbdata function 
           include_once '../functions/dbData.php';              //include the search and sort html forms
           include '../includes/formSearch.php';
           include '../includes/formSort.php';
          ?> 
        <form action="index.php">
        <input type="submit" value="Reset" />           <!-- reset button the clears all form data by redirecting back to this page-->
        </form>
        <?php
           
           if (isset($_GET['action'])) {$action = $_GET['action'];}     //if $_Get has a value for action initiate a switch  case on the variable action
           else { $action = ''; }
           switch ($action) {
            case "Submit1":
            {
                 include './UpdatedView/SortView.php';          //if action = submit1 include the sort view file
            }
             break;
            case "Submit2":
            {
                     include './UpdatedView/SearchView.php';    // if action = submit2 include the search view file
             }
             break;

            default:
            {
          $results = getAllTestData();          //if action has any other value, display all database data
            
               ?>
        <table class="table table-striped">                 <!--css style-->
            <thead>
                <tr> 
                    <th>Corporation</th>                    <!-- display database data in an easy to read table-->
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
                <td><?php   $date = new DateTime($row['incorp_dt']);
                            echo $date->format('m-d-Y'); ?></td>
                <td><?php echo $row['email']; ?></td> 
                <td><?php echo $row['zipcode']; ?></td> 
                <td><?php echo $row['owner']; ?></td>
                <td><?php echo $row['phone']; ?></td> 
            </tr>
            <?php                   endforeach; ?>
        </table>
            <?php }
            break;
            }  ?>
    </body>
</html>


