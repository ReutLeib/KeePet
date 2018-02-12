<?php

    $dirFile = "images/";

?>
<li class="card" data-id="<?php echo $cardid;?>">
<img class="card-img-top" src="<?php echo $dirFile . $imgName ?>" alt"Card image cap">
    <div class="card-body">
        <article class="house-content">
            <section class="location">
                <img src="images/location-icon.png" alt="">
                <p><?php echo $city; ?></p>
            </section>
            <section class="date">
                <img src="images/calendar-article.png" alt="">
                <p><?php echo $startDate . " - " . $endDate; ?></p>
            </section>
            <section class="pet">
                <img src="images/pawprint.png" alt="">
                <p><?php
                if($checkSearchData){
                    echo $preferenceCats . " " . $preferenceDogs . " " . $preferenceOther;
                }
                else{
                    echo $preferenceCats . " " . $preferenceDogs . " " . $preferenceOther;
                }

                ?></p>
            </section>
        </article>
    </div>
</li>
