<?php
    session_start();
    if(isset($_SESSION['adminid']))
    {
        session_unset();
        session_destroy();
        header("Location: http://localhost/hostel/");
    }
    else
    {
        header("Location: http://localhost/hostel/login.php");
    }
?>