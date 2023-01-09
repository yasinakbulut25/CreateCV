<?php define("index", true);  ?>

<?php
include "dbFile.php";
$siteUrl = 'https://domain.com/';
$errorUrl = $siteUrl . "hata";
session_start();
ob_start();

$smtpHost = "mail.domain.com";
$smtpEmail = "example.domain.com";
$smtpPassword = "mail_password";
?>

<base href="<?= $siteUrl ?>">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title translate="no">Create Your CV</title>
    <link rel="stylesheet" href="./assets/styles/cvForm.css">
    <link rel="stylesheet" href="./assets/styles/home.css">
    <link rel="stylesheet" href="./assets/styles/profile.css">
    <link rel="stylesheet" href="./assets/styles/darkThemes.css">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <script src="https://SortableJS.github.io/Sortable/Sortable.js"></script>
</head>
<body>
    <?php
    $socialMedia = array("instagram","twitter","linkedin","facebook","github","medium");
    include "./functions.php";

    $getValue = @$_GET['page'];

    switch($getValue){
        case "": include "home.php"; break;
        case "demo": include "cvLayout.php"; break;
        case "cv": include "cvLayout.php"; break;
        case "edit-cv": include "cvEdit.php"; break;
        case "delete-cv": include "cvDelete.php"; break;
        case "form": include "cvForm.php"; break;
        case "create": include "cvPost.php"; break;
        case "login": include "login.php"; break;
        case "register": include "register.php"; break;
        case "forgot-password": include "forgot-password.php"; break;
        case "check-user": include "check-user.php"; break;
        case "profile": include "profile.php"; break;
        case "logout": include "logout.php"; break;

        default:
            include "home.php";
    }

    if($getValue != "demo" && $getValue != "cv"){
        ?>
        <footer class="footer">
            <p>developed by <a target="_blank" href="https://www.linkedin.com/in/yasinakbulut/">Yasin Akbulut</a></p>
            <div class="footer-links">
                <a target="_blank" href="https://github.com/yasinakbulut25"><i class="bi bi-github"></i> yasinakbulut25</a>
                <a target="_blank" href="https://www.linkedin.com/in/yasinakbulut/"><i class="bi bi-linkedin"></i> yasinakbulut</a>
            </div>
        </footer>
        <?php
    }

?>
    
    <script src="./assets/js/darkMode.js"></script>
    <script src="./assets/js/sortables.js"></script>
    <script src="./assets/js/createElements.js"></script>
    <script src="./assets/js/fileUpload.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>