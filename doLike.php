<?php

  include 'db.php';
  include 'config.php';
  session_start();    //testing connection success
    $user = $_SESSION['userName'];
    $id = $_SESSION['userid'];
    
    $cardid = $_GET['cardid'];
    $query = "INSERT INTO likes_227(userid,cardid) values($id,$cardid)";
    $result = mysqli_query($connection, $query);
    if(!$result) echo json_encode(array("status"=>400));
    else echo json_encode(array("status"=>200));
