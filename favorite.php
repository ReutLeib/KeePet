<?php

include 'db.php';
include 'config.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Favorite</title>

        <!--Import Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Boostrap & CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link rel="stylesheet" href="includes/css/favorite-mobile.css">
        <link rel="stylesheet" href="includes/css/web.css">

        <!-- JQUERY -->
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navbar For Web -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img id="logo" src="images/logo-new-png.png"></a>
                <img id="control-nav" src="images/Control-nav.png">
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Chat <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Search</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Favorite</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar For Web -->

            <!--favorites Go Here!-->
            <section class="card">
                <article>
                    <img class="card-img-top" src="images/Image%201.png" alt="Card image cap">
                    <p class="name">Noa</p>
                    <section id="rate">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </section>
                    <p class="date">01/01/18 - 05/01/18</p>
                    <p><img src="" alt=""></p>
                    <p class="reviews"><i class="fa fa-commenting" aria-hidden="true"></i>Reviews</p>
                    <p class="review-little">
                        Lorem ipsum dolor sit amet, consectetur <br>
                        adipiscing elit, sed do eiusmod tempor incididunt
                    </p>
                </article>
                <div class="card-body">

                </div>
            </section>



            <!--End Of favorites-->

            <!-- Bottom Navbar For Mobile -->
            <div id="bottom-nav">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <ul class="fa-ul">
                        <li>
                            <a href="#">
                                <i class="fa fa-comment" aria-hidden="true"></i><p>Chat</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                            <i class="fa fa-search" aria-hidden="true"></i><p>Search</p>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-star nav-active" aria-hidden="true"></i><p class="nav-active">Favorite</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- End Bottom Navbar For Mobile -->
        </div>
        <p id="web-only"> work on mobile Only !</p>
        <!-- Bootstrap Scripts -->
        <!--<script type="text/javascript" src="includes/js/scripts.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" async></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous" async></script>
    </body>
</html>

<?php
//close
mysqli_close($connection);
?>