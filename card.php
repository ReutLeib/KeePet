<li class="card">
    <img class="card-img-top" src="images/Image%201.png" alt="Card image cap">
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
                 echo $preferenceCats . " " . $preferenceDogs . " " . $preferenceOther;
                                 
                ?></p>
            </section>
        </article>
    </div>
</li>