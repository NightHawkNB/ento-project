<div class="res-out">

    <style>
        .res-out {
            display: flex;
            flex-direction: column;
            border-radius: 5px;
            overflow: hidden;
        }

        .res-out > div {
            padding: 10px;
        }

        .res-out > div.upper {
            display: grid;
            grid-template-columns: repeat(4, 250px);
            background-color: white;
        }

        .res-out > div.upper div {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .res-out > div.lower {
            display: grid;
            grid-template-columns: 600px 1fr 1fr;
            background-color: grey;
            padding: 10px;
        }
        .res-out > div.lower > div:nth-child(1) {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

    </style>

    <?php

    $now = new DateTime();
    $future_date = new DateTime($start_time);

    $interval = $future_date->diff($now);

    ?>

    <div class="upper">
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
    </div>

    <div class="lower">
        <?php if ($status == "Accepted"): ?>
            <div>
                <div class="dis-flex gap-10 al-it-ce">
                    <div style="color: #DEC20B;">&#9733;</div>
                    <?= number_format($data['rating'], 1) ?>
                </div>
                <div class="text">Thanks for rating us!</div>
                <button class="edit blue-btn" onclick="openRatingPopUp('<?=$review_id?>')">EDIT</button>
            </div>

<!--    chat-->
            <a href="<?= ROOT ?>/chat/reserve/<?= $sp_id ?>/<?= Auth::getUser_id() ?>/<?= $reservation_id ?>">
                <button class="blue-btn al-it-ce">Chat</button>
            </a>

<!--    rating button-->
            <button class="blue-btn" onclick="openRatingPopUp('<?=$review_id?>')">Rate and review</button>

        <?php endif; ?>
    </div>

</div>

<!--    Rating popup-->
<?php if ($status == "Accepted"): ?>
    <div id="rating-<?=$review_id?>" class="rating-container" style="display: none">
        <div class="rating-content">
            <span class="close" onclick="closeRatingPopUp('<?=$review_id?>')">&times;</span>
            <h6>Rate and review</h6>
            <div class="star-container">
                <form method="post" action="<?=ROOT?>/client/reservations/<?=$sp_id?>/<?=$reservation_id?>">
                    <div class="star-widget">
<!--    stars div-->
                        <div class="stars"  onclick="showComment('<?=$review_id?>')">
                            <?php if(empty($rating)){
                                $rating=-1;
                            }
                            echo $rating;
                            ?>
                            <input type="radio" name="rating" id="rate-5<?=$review_id?>" value="5" <?=($rating==5)?'checked':''?>>
                            <label for="rate-5<?=$review_id?>" >&#9733;</label>
                            <input type="radio" name="rating" id="rate-4<?=$review_id?>" value="4" <?=($rating==4)?'checked':''?>>
                            <label for="rate-4<?=$review_id?>" >&#9733;</label>
                            <input type="radio" name="rating" id="rate-3<?=$review_id?>" value="3" <?=($rating==3)?'checked':''?>>
                            <label for="rate-3<?=$review_id?>" >&#9733;</label>
                            <input type="radio" name="rating" id="rate-2<?=$review_id?>" value="2" <?=($rating==2)?'checked':''?>>
                            <label for="rate-2<?=$review_id?>" >&#9733;</label>
                            <input type="radio" name="rating" id="rate-1<?=$review_id?>" value="1" <?=($rating==1)?'checked':''?>>
                            <label for="rate-1<?=$review_id?>" >&#9733;</label>
                        </div>
                        <div <?=(!empty($content))?'style="display:block;"':''?> class="form1 " id="form-<?=$review_id?>">
                            <!--                                <header>I don't like it</header>-->
                            <div class="textarea">
                                <textarea name="content" id="" cols="30" rows="10" placeholder="Describe your experience..."><?=$content?></textarea>
                            </div>
                            <div class="btn">
                                <button id="post-btn" type="submit">Post</button>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

<?php endif; ?>






<script>
// rating popup calling function
    function openRatingPopUp(id) {
        let rating = document.getElementById('rating-'+id);
        rating.style.display='flex'}

    function closeRatingPopUp(id) {
        let rating = document.getElementById('rating-'+id);
        rating.style.display='none'}

// to show comment when editing
    function showComment(id) {
    let form1 = document.getElementById('form-'+id)
        form1.style.display = 'block'
    }

    <?=(!empty($content))?"showComment('$review_id')":''?>


</script>
