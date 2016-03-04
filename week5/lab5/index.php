<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- css style sheet -->
        <title></title>        
    </head>
    <body>
        <header><h1>Url Finder by Site Given</h1></header>
        <?php
        include_once './functions/dbconnect.php';           //includes
        include_once './functions/until.php';
        include './functions/validation.php';
        include './functions/Curl.php';

        if (isPostRequest() === TRUE) {                                                             //check if there was a post request to display correct information
            $isValidUrl = validateUrl();                                                    //if there is a post request validate url        
            $isValidUrlInDB = doesExistInDB();                                              //check if this url is already in the database
            if ($isValidUrl === TRUE && $isValidUrlInDB === FALSE) {
                $output = specialOPCurl();                                                                          

                $htmlMatch = array();
                $urlRegEx = "/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/";                                          //grab all urls on page and store in a string variable
                $ExtractedHtml = filter_input(INPUT_POST, 'ExtractedHtml');                                                 //extract urls and store in an array
                preg_match_all($urlRegEx, $output, $htmlMatch);                                                                 //remove duplicates from array
                $finalMatches = array_unique($htmlMatch[0]);

                $url = filter_input(INPUT_POST, 'URL');
                $db = dbconnect();
                $stmt = $db->prepare("INSERT INTO sites SET site = :site, date = now()");                                   //insert all urls in array
                $binds = array(
                    ":site" => $url
                );
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                    $id = $db->lastInsertId();
                    ?><table class="table table-striped"> <h2>
                            <?php echo 'Successfully added to database!'; ?> <br/><?php echo'The site added was: ' . $url; ?><br/><?php         //success message and count of urls
                            echo
                            'Urls found on this page include: ';
                            foreach ($finalMatches as $row) {
                                $binds = array(                                                                                                 //display urls
                                    ":id" => $id,
                                    ":link" => $row);
                                ?>
                            </h2><tr><td> <?php echo $row; ?></td></tr><?php
                        }
                        ?> 
                    </table>
                    <?php
                    $stmt = $db->prepare("INSERT INTO sitelinks SET site_id = :id, link = :link");
                    foreach ($finalMatches as $row) {
                        $binds = array(
                            ":id" => $id,
                            ":link" => $row
                        );
                        $stmt->execute($binds);
                    }
                    ?>
                    <form action="index.php">
                        <input type="submit" value="Add Again" />                                                       <!-- links to other page-->
                    </form>
                    <form action="includes/ViewSitesCorrect.php">
                        <input type="submit" name="view" value="View all sites" />           
                    </form>
                    <?php
                }
            } else {
                echo "Either site is invalid or site already exists in DataBase";                           // error message
                include"./includes/urlForm.php";
                ?><form action="includes/ViewSitesCorrect.php">
                    <input type="submit" value="View all sites" /><?php
                }
            } else {
                include"./includes/urlForm.php";
                ?>                                                                      <!-- bas site if there is no post request -->
                <form action="includes/ViewSitesCorrect.php">
                    <input type="submit" name="view" value="View all sites" />           
                </form>
                <?php
            }
            ?>
    </body>
</html>