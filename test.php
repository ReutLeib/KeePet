<?php

include 'db.php';
include 'config.php';

session_start();

if(isset($_POST) && !empty($_POST)) { //if form was submitted

    $query = "SELECT * FROM cards_227 ";
    if( (isset($_POST["startDate"]) && !empty($_POST["startDate"]) )||
        (isset($_POST["price"]) && !empty($_POST["price"]) )|| 
        (isset($_POST["city"]) && !empty($_POST["city"]) )|| 
        (isset($_POST["cats"]) && !empty($_POST["cats"]) )|| 
        (isset($_POST["dogs"]) && !empty($_POST["dogs"]) )|| 
        (isset($_POST["other"]) && !empty($_POST["other"])) ){
        $query.="WHERE 1";
    }

    if((isset($_POST["startDate"]) && !empty($_POST["startDate"]))){
        $query.=" AND startDate='" . $_POST["startDate"]."'";
    }
    if((isset($_POST["price"]) && !empty($_POST["price"])) ){
        $query.=" AND price=" . $_POST["price"];
    }
    if((isset($_POST["city"]) && !empty($_POST["city"])) ){
        $query.=" AND city='" . $_POST["city"]."'";

    }
    if((isset($_POST["cats"]) && !empty($_POST["cats"])) ){
        $query.=" AND preference='" . $_POST["cats"]."'";
    }
    if((isset($_POST["dogs"]) && !empty($_POST["dogs"])) ) $query.=" AND preference='" . $_POST["dogs"]."'";
    if((isset($_POST["other"]) && !empty($_POST["other"])) )  $query.=" AND preference='" . $_POST["other"]."'";
    var_dump($query);
    $result = mysqli_query($connection, $query);
    while($rows = mysqli_fetch_array($result)){ // there is a data 
        // insert details to card
       // header('Location: ' . URL . 'index.php' );
       var_dump($rows["userName"]);
    }

   
}else{

?>
<form action="test.php" method="POST" >
                    <section id="dates">
                        <b>Sitter needed</b>
                        <img src="images/calendar-small-blue.png" alt="">
                        <input type="date" name="startDate">
                        <input type="date" name="endDate">
                    </section>

                    <section id="city">
                        <b>City</b>
                        <img src="images/location-icon.png" alt="">
                        <p>Ramat gan, Hamerkaz</p>
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
                            <input type="submit" class="saveAndClose" value="Save and close"/>

                        </section>

                    </section>

                </form>
                <!-- END FORM -->
<?php
}
//close
mysqli_close($connection);
?>