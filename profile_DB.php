<?php

    session_start();

    $user = $_SESSION['userName'];

    $AboutMe = $_GET['abME'];
    //create a mySQL DB connection:
    $dbhost = "182.50.133.55";
    $dbuser = "auxstudDB7c";
    $dbpass = "auxstud7cDB1!";
    $dbname = "auxstudDB7c";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    //testing connection success
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
        );
    }

    //get data from DB
    $query  = "UPDATE profiles_227 SET aboutMe = '" . $AboutMe . "' WHERE userName =  '" . $user . "'" ;
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("DB query failed.");
    }

    header('Location: profile.php');


?>