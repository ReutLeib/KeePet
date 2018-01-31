<?php 
 include 'db.php';
 include 'config.php';

 session_start();

 $user = $_SESSION['userName'];

    //get data from DB
    $query  = "SELECT * FROM profiles_227 where userName = '" . $user . "'" ;
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("DB query failed.");
    }

    $row = mysqli_fetch_assoc($result);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profile</title>

        <!--Import Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Boostrap & CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link rel="stylesheet" href="includes/css/profile-mobile.css">
        <link rel="stylesheet" href="includes/css/profile-web.css">        
        <link rel="stylesheet" href="includes/css/web.css">

        <!-- JQUERY -->
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    </head>

	<body>

	    <div id="wrapper">

            <!-- Navbar For Web -->
            <nav id="web-nav" class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img id="logo" src="images/logo-new-png.png"></a>
                    <img id="control-nav" src="images/Control-nav.png">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Chat <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="searchCards.php">Search</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="favorite-blue.php">Favorite</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar For Web -->
            <main>
            <!-- Content -->
            <div id="profile">
                <section></section>
                <img src="images/noa-profile-pic.png" alt="">
                <?php
                    echo "<h3>" . $user ."</h3>"
                ?>
                <h5>Dog trainer</h5>
                <article id="rate">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </article>
               <article id="about-me">
                   <h6>About me</h6>

                   <form action="profile_DB.php" method="get">
                    <textarea id=aboutMe name="abME"> <?php
                    echo $row['aboutMe'];
                    ?>
                    </textarea>
                    <div id="reccomend">
                    </div>
                    <button class="button"> Edit </button>
                    </form>
               </article>
            </div>

            <!-- End of Content -->

               <!-- Bottom Navbar For Mobile -->
               <footer>
               <div id="bottom-nav">
                   <nav class="navbar navbar-expand-lg navbar-light bg-light">
                       <ul class="fa-ul">
                           <li>
                               <a href="profile.php">
                                   <i class="fa fa-user" aria-hidden="true"></i><p>Profile</p>
                               </a>
                           </li>
                           <li>
                               <a href="searchCards.php" target="_self">
                               <i class="fa fa-search nav-active" aria-hidden="true"></i><p class="nav-active">Search</p>
                               </a>
                           </li>
                           <li>
                               <a href="favorite-blue.php" target="_self">
                                   <i class="fa fa-star" aria-hidden="true"></i><p>Favorite</p>
                               </a>
                           </li>
                       </ul>
                   </nav>
               </div>
               </main>
               </footer>
               <!-- End Bottom Navbar For Mobile -->
        </div>
        <div id="web-only">
            <img src="images/logo-new-png.png" alt="">
            <p>Mobile Only</p>
            <img id="qr-code" src="images/QR_Code_keepet%20.png" alt="">
        </div>

        <!-- free resault -->
        <?php 
            // release returned data
            mysqli_free_result($result);
        ?>
        
        <!-- Bootstrap Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" async></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous" async></script>
        <!--profile Scripts-->
        <script src="includes/js/profile.js"></script>
        </body>
</html>

<?php

//close DB connection

mysqli_close($connection);

?>