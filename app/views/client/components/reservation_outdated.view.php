<div class="res-out">

    <?php

    $now = new DateTime();
    $future_date = new DateTime($start_time);

    $interval = $future_date->diff($now);

    ?>

    <div class="upper">
        <div>
            <img src="<?= ROOT . $image ?>" alt="name png" class="icon" style="border-radius: 50%;">
            <p style="font-weight: bold"><?= $title ?></p>
        </div>

        <div>
            <img src="<?= ROOT ?>/assets/images/icons/date.png" alt="clock png" class="icon">
            <p><?= $start_time ?></p>
        </div>
        <div>
            <img src="<?= ROOT ?>/assets/images/icons/location.png" alt="location png" class="icon">
            <p><?= $location ?></p>
        </div>


        <!--        --><?php
        //        if ($status == 'Pending') {
        //            echo "<div style='background-color: lightgreen; border-radius: 10px; padding: 10px; text-align: center; max-width: 100px;'> <p>$status</p></div>";
        //        } elseif ($status == 'Accepted') {
        //            echo "<div style='background-color: lightblue; border-radius: 10px; padding: 10px; text-align: center; max-width: 100px;'> <p>$status</p></div>";
        //        } elseif ($status == 'Declined') {
        //            echo "<div style='background-color: lightcoral; border-radius: 10px; padding: 10px; text-align: center; max-width: 100px;'> <p>$status</p></div>";
        //
        //        }
        //        ?>
    </div>

    <?php if ($status == "Accepted"): ?>
        <div class="lower1">
            <?php if (!empty($rating)): ?>
                <div>
                    <div class="dis-flex pad-5">
                        <div class="dis-flex-col">
                            <?php if ($rating == 1): ?>
                                <div style="color: #DEC20B; font-size: 1.5rem; width: 100px">&#9733;</div>
                                <p class="pad-5"><?= number_format($data['rating'], 1) ?></p>
                            <?php elseif ($rating == 2): ?>
                                <div style="color: #DEC20B; font-size: 1.5rem; width: 100px">&#9733;&#9733;</div>
                                <p class="pad-5"><?= number_format($data['rating'], 1) ?></p>
                            <?php elseif ($rating == 3): ?>
                                <div style="color: #DEC20B; font-size: 1.5rem; width: 100px">&#9733;&#9733;&#9733;</div>
                                <p class="pad-5"><?= number_format($data['rating'], 1) ?></p>
                            <?php elseif ($rating == 4): ?>
                                <div style="color: #DEC20B; font-size: 1.5rem; width: 100px">&#9733;&#9733;&#9733;&#9733;</div>
                                <p class="pad-5"><?= number_format($data['rating'], 1) ?></p>
                            <?php elseif ($rating == 5): ?>
                                <div style="color: #DEC20B; font-size: 1.5rem; width: 100px">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                                <p class="pad-5"><?= number_format($data['rating'], 1) ?></p>
                            <?php endif; ?>

                        </div>
                        <div style="width: 400px; height: 80px; background-color: #E8E9FF; position: relative;border-radius: 10px">
                            <p class="pad-5">Comment:</p>
                            <p class="pad-5"><?= $content ?></p>
                            <button class="btn pad-5" onclick="openRatingPopUp('<?= $review_id ?>')"
                                    style="position: absolute; bottom: 0; right: 0; ">EDIT
                            </button>
                        </div>

                    </div>


                </div>
            <?php endif; ?>

            <!--chat-->
            <!--            <a href="--><?php //= ROOT ?><!--/chat/reserve/--><?php //= $sp_id ?><!--/-->
            <?php //= Auth::getUser_id() ?><!--/--><?php //= $reservation_id ?><!--">-->
            <!--                <button class="blue-btn" disabled>Chat</button>-->
            <!--            </a>-->

            <!--rating button-->
            <?php if (empty($content)): ?>
                <button class="btn-lay-s pad-10 mar-10" style="width: fit-content; height: fit-content; background-color: #c1abec " onclick="openRatingPopUp('<?= $review_id ?>')">Rate and review</button>
            <?php endif; ?>

        </div>
    <?php endif; ?>

</div>

<!--    Rating popup-->
<?php if ($status == "Accepted"): ?>
    <div id="rating-<?= $review_id ?>" class="rating-container">
        <div class="rating-content">
            <div class="close" onclick="closeRatingPopUp('<?= $review_id ?>')"> x </div>
            <h6>Rate and review</h6>
            <div class="star-container">
                <form method="post" action="<?= ROOT ?>/client/reservations/<?= $sp_id ?>/<?= $reservation_id ?>">
                    <div class="star-widget">
                        <!--    stars div-->
                        <div class="stars" onclick="showComment('<?= $review_id ?>')">
                            <!--                            --><?php //if(empty($rating)){
                            //                                $rating=-1;
                            //                            }
                            //                            echo $rating;
                            //                            ?>
                            <input type="radio" name="rating" id="rate-5<?= $review_id ?>"
                                   value="5" <?= ($rating == 5) ? 'checked' : '' ?>>
                            <label for="rate-5<?= $review_id ?>">&#9733;</label>
                            <input type="radio" name="rating" id="rate-4<?= $review_id ?>"
                                   value="4" <?= ($rating == 4) ? 'checked' : '' ?>>
                            <label for="rate-4<?= $review_id ?>">&#9733;</label>
                            <input type="radio" name="rating" id="rate-3<?= $review_id ?>"
                                   value="3" <?= ($rating == 3) ? 'checked' : '' ?>>
                            <label for="rate-3<?= $review_id ?>">&#9733;</label>
                            <input type="radio" name="rating" id="rate-2<?= $review_id ?>"
                                   value="2" <?= ($rating == 2) ? 'checked' : '' ?>>
                            <label for="rate-2<?= $review_id ?>">&#9733;</label>
                            <input type="radio" name="rating" id="rate-1<?= $review_id ?>"
                                   value="1" <?= ($rating == 1) ? 'checked' : '' ?>>
                            <label for="rate-1<?= $review_id ?>">&#9733;</label>
                        </div>
                        <div <?= (!empty($content)) ? 'style="display:flex;"' : '' ?> class="form1 "
                                                                                      id="form-<?= $review_id ?>">
                            <!--                                <header>I don't like it</header>-->
                            <div class="textarea">
                                <textarea name="content" id="" cols="30" rows="10"
                                          placeholder="Describe your experience..."><?= $content ?></textarea>
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