<?php !defined("index") ? header("location: demo") : null ?>
<?php
unset($_SESSION['user']);
header("refresh: 0; url=$siteUrl");
?>