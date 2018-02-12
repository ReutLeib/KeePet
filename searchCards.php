<?php

include 'db.php';
include 'config.php';

session_start();

if(isset($_POST) && !empty($_POST)) { //if form was submitted

    $query = "SELECT * FROM cards_227 WHERE id not in (select cardid from likes_227 where userid = 2)";


    if((isset($_POST["startDate"]) && !empty($_POST["startDate"]))) $query.=" AND startDate='" . $_POST["startDate"]."'";
    if((isset($_POST["price"]) && !empty($_POST["price"]))) $query. " <= " . " AND price=" . $_POST["price"];
    if((isset($_POST["city"]) && !empty($_POST["city"]))) $query.=" AND city='" . $_POST["city"]."'";
    if((isset($_POST["cats"]) && !empty($_POST["cats"]))) $query.=" AND cats='cats'";
    if((isset($_POST["dogs"]) && !empty($_POST["dogs"]))) $query.=" AND dogs='dogs'";
    if((isset($_POST["other"]) && !empty($_POST["other"])))  $query.=" AND other='other'";
    $query.=" order by rand()";
    $result = mysqli_query($connection, $query);

}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>search</title>

        <!--Import Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Boostrap & CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link rel="stylesheet" href="includes/css/main-window-mobile.css">
        <link rel="stylesheet" href="includes/css/main-window-web.css">
        <link rel="stylesheet" href="includes/css/web.css">

        <!-- JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

    </head>
    <body id="background">
        <div id="wrapper">
            <!-- Navbar For Web -->
            <nav id="web-nav" class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img id="logo" src="images/logo-new-png.png"></a>

                <button onclick="openNav()">
                    <img id="control-nav" src="images/Control-nav.png">
                </button>

                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
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
            <div id="control-nav-open">
                <button onclick="submitAndClose()" >
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
                <a href="">
                    <img src="images/Logo-sidenav.png" alt="">
                </a>

                <!-- FORM -->
                <form action="searchCards.php" method="POST" >
                    <section id="dates">
                        <b>Sitter needed</b>
                        <img src="images/calendar-small-blue.png" alt="">
                        <input type="date" name="startDate">
                        <input type="date" name="endDate">
                    </section>

                    <section id="city">
                        <b>City</b>
                        <img src="images/location-icon.png" alt=""><br>
                        <input type="text" name="city">
                    </section>

                    <section id="price">
                        <b>Price</b>
                        <input type="range" name="price">
                        <p id="min-range">0</p>
                        <p>10000</p>
                    </section>

                    <section id="pets">
                        <b>Pets</b>
                        <section>
                            <p>Cats</p>
                            <label class="switch">
                                <input type="checkbox" name="cats">
                                <span class="slider round"></span>
                            </label>
                        </section>
                        <section>
                            <p>Dogs</p>
                            <label class="switch">
                                <input type="checkbox" name="dogs"  >
                                <span class="slider round"></span>
                            </label>
                        </section>
                        <section>
                            <p>Other</p>
                            <label class="switch">
                                <input type="checkbox" name="other">
                                <span class="slider round"></span>
                            </label>
                            <input type="image" src="images/save.png" class="saveAndClose   ">


                        </section>

                    </section>

                </form>
                <!-- END FORM -->
            </div>

            <!--Cards Go Here!-->
            <div id="container">
                <div class="cardcontainer list">
                    <ul class="cardlist">
                        <?php

                        if (isset($result)){
                            while($rows = mysqli_fetch_array($result)){ // there is a data
                                $city = $rows["city"];
                                $startDate = $rows["startDate"];
                                $endDate = $rows["endDate"];                              //
                                $imgName = $rows["picture"];
                                $userName = $rows["userName"];
                                $cardid = $rows["id"];
                                $checkSearchData= 1;

                                if((isset($_POST["cats"]) && !empty($_POST["cats"])))
                                    $preferenceCats = "cats";
                                else
                                    $preferenceCats = " ";

                                if((isset($_POST["dogs"]) && !empty($_POST["dogs"])))
                                    $preferenceDogs = "dogs";
                                else
                                    $preferenceDogs = " ";
                                if((isset($_POST["other"]) && !empty($_POST["other"])))
                                    $preferenceOther = "other";
                                else
                                    $preferenceOther = " ";

                                include "card.php";
                            }

                        }
                        else { // there is no data at search button
                          $queryAllTable = "SELECT * FROM cards_227 WHERE id not in (select cardid from likes_227 where userid = 2) order by rand()";
                            $resultAllTable = mysqli_query($connection, $queryAllTable);
                            if (isset($resultAllTable)){
                                while($rows = mysqli_fetch_array($resultAllTable)){ // there is a data
                                    $city = $rows["city"];
                                    $startDate = $rows["startDate"];
                                    $endDate = $rows["endDate"];
                                    $imgName = $rows["picture"];

                                    $checkSearchData = 0;
                                    $preferenceCats = $rows['cats'];
                                    $preferenceDogs = $rows['dogs'];
                                    $preferenceOther = $rows['other'];
                                    $cardid = $rows["id"];
                                    include "card.php";
                                }
                            }
                            }

                        ?>

                    </ul>
                    <button class="but-nope"></button>
                    <button class="but-yay"></button>
                </div>

            </div>

            <!--End Of Cards -->
            <main>
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
                            <a href="index.php" target="_self">
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
            </footer>
            <!-- End Bottom Navbar For Mobile -->
        </div>
        <div id="web-only">
            <img src="images/logo-new-png.png" alt="">
            <p>Mobile Only</p>
            <img id="qr-code" src="images/QR_Code_keepet%20.png" alt="">
        </div>
        <!-- Scripts -->
        <script src="includes/js/main-win.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/1.1.3/hammer.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" async></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous" async></script>

    </body>
</html>

<?php
//close
mysqli_close($connection);
?>
