<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- css style sheet -->
        <title></title>        
    </head>
    <body> 
        <header>
            <a href="../index.php"><h1>Back to Add Sites?</h1></a>      <!-- header link back to add sites-->
        </header>
        <?php
        include_once '../functions/dbconnect.php';                          //includes
        include '../functions/until.php';
        $db = dbconnect();

        $stmt = $db->prepare("SELECT * FROM sites ORDER BY site;");         

        $results = array();                                                 // load results of query into an array
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);                          //validate and return the array
        }
        $stmt2 = $db->prepare("SELECT * FROM sites  WHERE site_id = :id;");     
        $specificSite = filter_input(INPUT_POST, 'SITE');                       
        $binds2 = array(                                                            //set binds for sql safety
            ":id" => $specificSite);
        if ($stmt2->execute($binds2) && $stmt2->rowCount() > 0) {                               ////validate and return the second query / array
            $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        }
        ?>
        <form action="#" method="post">                                                                   
            <fieldset>
                <legend>View all Links by Site</legend>
                <label>Site</label>  
                <select name="SITE">
                    <?php foreach ($results as $row): ?>          <!--loop through the results array and display all sites-->
                        <option value="<?php echo $row['site_id'] ?>"<?php
                        if (isPostRequest() === TRUE) {
                            if (intval($specificSite) === $row['site_id']) {                                 // sets the selected option to selected in the html form
                                ?>
                                        selected="selected"
                                        <?php
                                    }
                                }
                                ?>> <?php echo $row['site']; ?> </option>
                            <?php endforeach; ?>  
                </select>
                <input type="submit" name="submit" value="Show all links">
            </fieldset>
        </form>
        <?php
        if (isPostRequest() === TRUE) {                                                                                             //if there is a post request display table
            ?>
            <table class="table table-striped">


                <?php
                foreach ($results2 as $display):
                    $date = new DateTime($display['date']);
                    ?>
                    <th><?php
                        echo "The following links were found on: " . $display['site'] . " on: " . $date->format('m-d-Y H:i') . "<div>";     //query results as header
                    endforeach;
                    $stmt = $db->prepare("SELECT * FROM sitelinks  WHERE site_id = :id;");                  //set query and execute
                    $sites = filter_input(INPUT_POST, 'SITE');
                    $binds = array(
                        ":id" => $sites);
                    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                        $results2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        echo 'We found ' . count($results2) . " result(s)";
                        ?></th> 
                    <?php foreach ($results2 as $rows): ?>          <!--loop through the results array and display all sites-->
                        <tr>

                            <td><a href="<?php echo $rows['link']; ?>" target="popup"><?php echo $rows['link']; ?></a></td> <!-- popup links-->

                        </tr>
                    <?php endforeach; ?>
                </table>
                <?php
            }
        }
        ?>
    </body>
</html>

