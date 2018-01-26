<?php
    include 'db.php';
    include 'config.php';

	session_start();

    if(!empty($_POST["username"])){ //if form was submitted
        // echo 'FORM SENT';

        $query = "SELECT * FROM passwords_227 WHERE userName='"
        . $_POST["username"]
        . "' and password = '"
        . $_POST["password"]
        . "'";
        // echo $query;
    
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result);

        if(is_array($row)){ // if data is true 
			$_SESSION["userName"] = $row['userName'];
            header('Location: ' . URL . 'index.php' );
        }
        else{
            $message = "Invalid user name OR password!";
        }

       
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

</head>
<body>

<div class="container">
	<div>
		<a href="#" id="logo"> </a>
	</div>

    <form action="#" method="POST">
        <div>
        <label for="username">username:</label>
        <input type="text" placeholder="username" name="username"><br><br>
        </div>

        <div>
        <label for="password">Password:</label>
        <input type="pass" placeholder="password" name="password" id="password"><br><br>
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

