<?php
    if(isset($_POST['submit'])){
        session_start();
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        if ($name=='iram' && $pass='4587'){
            $_SESSION['name']=$name;
            header('location:adminPage.php');
        }
    }
?>