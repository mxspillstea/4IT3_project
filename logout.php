<?php session_start();
session_destroy();
$_SESSION['user']='';
// echo $_COOKIE['userid'];
setcookie("userid", "", time() - 3600);
?>
    <script>
        window.location.href='https://mxspillstea.me/index.php';
    </script>
