<?php
    include 'db.php';
    include 'config.php';

	session_start();

    if(!empty($_POST["username"])){ //if form was submitted

        $query = "SELECT * FROM passwords_227 WHERE userName='"
        . $_POST["username"]
        . "' and password = '"
        . $_POST["password"]
        . "'";

        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);

        if(is_array($row)){ // if data is true
          $_SESSION["userName"] = $row['userName'];
          $_SESSION["userid"] = $row['id'];

            header('Location: ' . URL . 'searchCards.php' );
        }
        else{
            $message = "Invalid user name OR password!";
        }
        
       $resetColTableLike = "TRUNCATE TABLE likes_227";        
       mysqli_query($connection, $resetColTableLike);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
	<!--Import Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Boostrap & CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<link rel="stylesheet" href="includes/css/login-mobile.css">
	<!-- <link rel="stylesheet" href="includes/css/login-web.css"> -->


</head>
<body>

<div class="container">
	<div>
		<a href="#" id="logo"> </a>
	</div>

    <form action="#" method="POST">
        <div class="form-group"> <!-- Username Field !-->
            <input type="text" class="form-control" id="username" placeholder="Username" name="username">
        </div>
        <div class="form-group"> <!-- Password Field !-->
            <input  type="password" class="form-control" name="password" placeholder="Password" id="password">
        </div>
        <div>
            <?php
                if(isset($message)){
                    echo $message;
                }
                ?>
        </div>
        <button type="submit" class="signInGreen">
		<button type="submit" class="signUpGreen">

	</form>
			</div>
</body>
</html>

<?php
//close
mysqli_close($connection);
?>
