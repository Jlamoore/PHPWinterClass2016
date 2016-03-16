<html>
    <head>
        <title>Add to my address book</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Add to your address book.</h1>
        <form action="#" method="POST">
            Select an address group
            <select name="addressGroup">
                <?php
                $results = fetchGroups();
                foreach ($results as $row) {
                    ?>
                    <option value="<?php echo $row['address_group_id']; ?>"><?php echo $row['address_group']; ?></option>
                <?php } ?>
            </select>
            <input type="text" name="fullName" value="<?php if (isPostRequest() && isset($_POST['fullName'])) echo $_POST['fullName']; ?>" placeholder="Enter a full name">*
            <input type="text" name="website" value="<?php if (isPostRequest() && isset($_POST['website'])) echo $_POST['website']; ?>" placeholder="enter a vaild website">*
            <input type="date" name="birthday" value="<?php if (isPostRequest() && isset($_POST['birthday'])) echo $_POST['birthday']; ?>" placeholder="enter a birthday">*
            <input type="text" name="Email" value="<?php if (isPostRequest() && isset($_POST['Email'])) echo $_POST['Email']; ?>" placeholder="enter a valid email">*
            <input type="text" name="phone" value="<?php if (isPostRequest() && isset($_POST['phone'])) echo $_POST['phone']; ?>" placeholder="enter a phone number">*
            <input type="text" name="address" value="<?php if (isPostRequest() && isset($_POST['address'])) echo $_POST['address']; ?>" placeholder="enter an address">*
            <input type="image" name="image" placeholder="upload an image."><!--week 7 demo-->
        </form>
        <?php
        if (isPostRequest()) {
            if (isset($_POST['fullName']) && isset($_POST['Email']) &&
                    isset($_POST['address']) && isset($_POST['phone']) &&
                    isset($_POST['website']) && isset($_POST['birthday'])) {
                $result = isValidEmail();
                if ($result === TRUE) {
                    $result2 = AddToDB();
                    echo $result2;
                } else {
                    echo'Email is invalid';
                }
            } else {
                echo 'Not all required fields were entered, * indicates a required field.';
            }
        }
        ?>
        <form action="#" method ="GET">Would you like to view your addresses?
            <input  type="Submit" name="view" value="View-all">
            
        </form>
    </body>
</html>

