<div class="res-out">

    <?php

    $now = new DateTime();
    $future_date = new DateTime($start_time);

    $interval = $future_date->diff($now);

    ?>

    <div class="upper">
        <div>
            <img src="<?= ROOT.$image ?>" alt="name png" class="icon" style="border-radius: 50%" >
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

    <?php if ($status == "Accepted"): ?>
        <div class="lower">
            <?php if(!empty($rating)):?>
            <div>
                <div>
                    <div style="color: #DEC20B; width: fit-content; font-size: 1.5rem">&#9733;</div>
                    <p><?= number_format($data['rating'], 1) ?></p>
                    <div class="text" >Thanks for rating us!</div>

                    <button class="btn" onclick="openRatingPopUp('<?=$review_id?>')">EDIT</button>

                </div>


            </div>
            <?php endif; ?>

            <!--chat-->
<!--            <a href="--><?php //= ROOT ?><!--/chat/reserve/--><?php //= $sp_id ?><!--/--><?php //= Auth::getUser_id() ?><!--/--><?php //= $reservation_id ?><!--">-->
<!--                <button class="blue-btn" disabled>Chat</button>-->
<!--            </a>-->

            <!--rating button-->
            <?php if(empty($content)):?>
                <button class="blue-btn" onclick="openRatingPopUp('<?=$review_id?>')">Rate and review</button>
            <?php endif; ?>

        </div>
    <?php endif; ?>

</div>

<!--    Rating popup-->
<?php if ($status == "Accepted"): ?>
    <div id="rating-<?=$review_id?>" class="rating-container">
        <div class="rating-content">
            <span class="close" onclick="closeRatingPopUp('<?=$review_id?>')">&times;</span>
            <h6>Rate and review</h6>
            <div class="star-container">
                <form method="post" action="<?=ROOT?>/client/reservations/<?=$sp_id?>/<?=$reservation_id?>">
                    <div class="star-widget">
                        <!--    stars div-->
                        <div class="stars"  onclick="showComment('<?=$review_id?>')">
                            <!--                            --><?php //if(empty($rating)){
                            //                                $rating=-1;
                            //                            }
                            //                            echo $rating;
                            //                            ?>
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
                        <div <?=(!empty($content))?'style="display:flex;"':''?> class="form1 " id="form-<?=$review_id?>">
                            <!--                                <header>I don't like it</header>-->
                            <div class="textarea">
                                <textarea name="content" id="" cols="30" rows="10" placeholder="Describe your experience..."><?=$content?></textarea>
                            </div>
                            <div class="btn">
                                <button id="post-btn" class="blue-btn" type="submit">Post</button>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

<?php endif; ?>