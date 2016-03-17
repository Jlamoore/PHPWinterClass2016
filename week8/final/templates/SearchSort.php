<!DOCTYPE html>
<html>
    <head>
        <title>SearchSort</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        </table>
        <form method="GET" action="./index.php">
            <input type="submit" name="view" value='View-all'>
        </form>
        <form method="POST" action="#">
            Sort by group:
            <select name="addressGroup">
                <?php                               //two html forms for searching and sorting 
                $results = fetchGroups();
                foreach ($results as $row) {
                    ?>
                    <option value="<?php echo $row['address_group_id']; ?>"><?php echo $row['address_group']; ?></option>
                <?php } ?>
            </select>
                <input type="hidden" name="sort" value="<?php echo $row['address_group_id']; ?>">
                <input type="submit" name="SS" value="sort">
        </form>
        <br/>
        <form method="POST" action="#">
            Search by group:
            <select name="addressGroup">
                    <option value="fullname">fullname</option>
                    <option value="phone">Phone Number</option>
                    <option value="email">Email</option>
                    <option value="address">Address</option>
            </select>
                    
                <input name="searchterm" type="search" value="<?php if( isset($_POST['searchterm'])) { echo $_POST['searchterm'];} ?>"/>
                <input type="submit" name="SS" value="search">
                </form>
                <?php
                if (isPostRequest()) {
                    if (filter_input(INPUT_POST, 'SS') == "sort") {         //test for post request sort, if so go through the sort function
                        $sortSearchResults = sortfunction();
                        include './includes/displayrows.php';
                    }
                    if (filter_input(INPUT_POST, 'SS') == 'search') {           //test for post request search, if so go through search functions
                        $sortSearchResults = searchfunction();
                        include './includes/displayrows.php';
                    }
                }
                ?>
                </body>
                </html>