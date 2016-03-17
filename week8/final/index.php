<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $view = filter_input(INPUT_GET, 'view');                    //This index page controls the required includes for all the "pages" the user interacts with
        if ( $view === 'Signup' ) {
            require_once './functions/dbData.php';  
            include './functions/until.php ';
            include './functions/Validation.php';
            include './functions/dbconnect.php';
            include './functions/CreateUser.php';
            include './templates/signup.php';
            //unset($_POST);
        } else if (  $view === 'Login' ) {            
            require_once './functions/dbconnect.php';
            require_once './functions/dbData.php';
            include './functions/Validation.php';
            include './functions/Login-function.php';
            include './functions/until.php ';
            include './functions/Session_fuctions.php';
            include './templates/Login.html.php';
            
        } else if (  $view === 'View-all' ) {
            require_once './functions/dbconnect.php';
            require_once './functions/dbData.php';
            include './templates/view-all.html.php';
            
        } else if (  $view === 'add' ) {
            require_once './functions/dbconnect.php';
            require_once './functions/dbData.php';
            include './functions/AddtoDB.php';
            include './functions/until.php';
            include './functions/Validation.php';
            include './functions/FetchGroups.php';
            include './templates/Add.html.php';        
        } else if (  $view === 'read' ) {
            require_once './functions/dbconnect.php';
            require_once './functions/dbData.php';
            include './templates/view-all.html.php';
            
        } else if (  $view === 'delete' ) {
            require_once './functions/dbconnect.php';
            require_once './functions/dbData.php';
            include './templates/view-all.html.php';
        
        } else if (  $view === 'update' ) {
            require_once './functions/dbconnect.php';
            require_once './functions/dbData.php';
            include './templates/view-all.html.php';
        } else if (  $view === 'Accept' ) {
            require_once './functions/dbconnect.php';
            require_once './functions/dbData.php';
            include './functions/searchSortFunctions.php';
            include './functions/FetchGroups.php';
            include './functions/until.php';
            include './templates/SearchSort.php';
        
        } else {
            /* Default view */            
            include './templates/default.html.php';
        }
        
        ?>
    </body>
</html>
