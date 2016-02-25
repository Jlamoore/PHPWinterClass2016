<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Sort & Search</h1>
        <?php
        
        $action = filter_input(INPUT_POST, 'action');
        
        if ( $action === 'Submit1' ) {
            echo 'Sorted';
        }
        if ( $action === 'Submit2' ) {
            echo 'Searched';
        }
        
        include '../includes/formSort.php';
        include '../includes/formSearch.php';
        
        ?>
    </body>
</html>

