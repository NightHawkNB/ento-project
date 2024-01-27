<div class="reservation">

    <?php
    $now = new DateTime();
    $future_date = new DateTime($start_time);

    $interval = $future_date->diff($now);
    ?>
    <!--        --><?php //= show($data);?>


    <div style="justify-content: left; ">
        <img src="<?= $image ?>" alt="name png" class="icon" style="border-radius: 50%" >
        <p><?= $title ?></p>
    </div>

    <div>
        <img src="<?= ROOT ?>/assets/images/icons/clock.png" alt="clock png" class="icon">
        <p><?= $start_time ?></p>
    </div>
    <div>
        <img src="<?= ROOT ?>/assets/images/icons/location_pin.png" alt="location png" class="icon">
        <p><?= $location ?></p>
    </div>
    
    <?php
    if ($status == 'Pending') {
        echo "<div style='background-color: lightgreen; border-radius: 10px; padding: 10px; text-align: center; max-width: 100px;'> <p>$status</p></div>";
    } elseif ($status == 'Accepted') {
        echo "<div style='background-color: lightblue; border-radius: 10px; padding: 10px; text-align: center; max-width: 100px;'> <p>$status</p></div>";
    } elseif ($status == 'Declined') {
        echo "<div style='background-color: lightcoral; border-radius: 10px; padding: 10px; text-align: center; max-width: 100px;'> <p>$status</p></div>";

    }
    ?>

<!--    rating button-->

    <?php if ($status == "Accepted"): ?>
        <button class="blue-btn" onclick="openRatingPopUp()">Rate and review</button>

        <div id="rating" class="rating-container hide">
            <div class="rating-content">
                <span class="close" onclick="closeRatingPopUp()">&times;</span>
                <h6>Rate and review</h6>
                <div class="star-container">
                    <div class="star-widget">
                        <input type="radio" name="rate" id="rate-5">
                        <label for="rate-5" >&#9733;</label>
                        <input type="radio" name="rate" id="rate-4">
                        <label for="rate-4" >&#9733;</label>
                        <input type="radio" name="rate" id="rate-3">
                        <label for="rate-3" >&#9733;</label>
                        <input type="radio" name="rate" id="rate-2">
                        <label for="rate-2" >&#9733;</label>
                        <input type="radio" name="rate" id="rate-1">
                        <label for="rate-1" >&#9733;</label>
                        <form action="#">
                            <header>I don't like it</header>
                            <div class="textarea">
                                <textarea name="comment" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="btn-lay">
                                <button type="submit">Post</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    <?php endif; ?>


    <!--    chat-->

    <?php if ($status == "Accepted"): ?>
        <a href="<?= ROOT ?>/chat/reserve/<?= $sp_id ?>/<?= Auth::getUser_id() ?>/<?= $reservation_id ?>">
            <button>Chat</button>
        </a>
    <?php endif; ?>

</div>
<script>

    var rating = document.getElementById('rating');

    function openRatingPopUp() {
        rating.style.display='flex';

    }

    function closeRatingPopUp() {console.log(rating);

        rating.style.display='none';
    }
</script>
