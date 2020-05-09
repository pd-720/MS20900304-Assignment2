
<?php

//CSS style sheet
echo '<link rel = "stylesheet" type = "text/css" href = "./resources/files/style.css" />';

if (!isset($_SESSION['access_token'])) {
    echo '<div>';
    echo '<H1>' . 'OAuth2 demonstration' . '</H1>';
    echo '<br>';
    echo  'Login to the application using the following link:  '.'<br>';
    echo '<br>';
    echo '<a href="pages/index.php"> Click to login </a>';
    echo '</div>';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>

    <script type="application/javascript">
        window.moveTo(0, 0);
        window.resizeTo(screen.width, screen.height);
        window.innerWidth = screen.width;
        window.innerHeight = screen.height;
        window.screenX = 0;
        window.screenY = 0;
        alwaysLowered = false;
    </script>

</head>
<body>

</body>
</html>
