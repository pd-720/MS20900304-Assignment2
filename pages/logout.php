<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout page</title>
</head>
<body>

<H1>Logout page</H1>
<br>



    <?php
    echo '<link rel = "stylesheet" type = "text/css" href = "./../resources/files/style.css" />';
    if (isset($_SESSION['access_token']) ) {
        $client->revokeToken();
        echo '<h6>You are logged out ...</h6>'.'<br>';
    } else {

        echo 'Please ' . '<a href="./../login.php">login</a>' . ' to continue ...'.'<br>';
    }

    ?>


</body>
</html>


