<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- css style sheet -->
        <title></title>        
    </head>
    <body> 
        <form action="#" method="post" style="">                                                                    <!-- basic html form with search field-->
            <h1> Enter the website url to be captured. </h1>
            <input type="text" name="URL" placeholder="WebSite URL" <?php if (isset($_POST['URL'])) {
    echo 'value="' . $_POST['URL'] . '"';
} ?>>
            <input type="submit">
        </form>
    </body>
</html>


