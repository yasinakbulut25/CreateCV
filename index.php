<?php define("index", true);  ?>

<?php
include "dbFile.php";
$siteUrl = 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$errorUrl = $siteUrl . "hata";
?>

<base href="<?= $siteUrl ?>">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Your CV</title>
    <link rel="stylesheet" href="./assets/styles/form.css">
    <link rel="stylesheet" href="./assets/styles/styles.css">
    <link rel="stylesheet" href="./assets/styles/darkColors.css">
</head>
<body>

    <?php

    $getValue = @$_GET['page'];

    switch($getValue){
        case "": include "cvLayout.php"; break;
        case "form": include "cvForm.php"; break;
        case "create": include "cvPost.php"; break;

        default:
            include "cvLayout.php";
    }

    ?>

    <script src="./assets/js/darkMode.js"></script>
</body>

</html>