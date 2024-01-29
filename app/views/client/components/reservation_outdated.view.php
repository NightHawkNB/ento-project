<div class="reservation" style="width: fit-content !important; height: fit-content !important;">

    <?php
    $now = new DateTime();
    $future_date = new DateTime($start_time);

    $interval = $future_date->diff($now);
    ?>
<!--    --><?php //= show($data);?>
<!--    --><?php //= show($_POST); ?>
<!---->
<!--    die;-->
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

        <div id="rating" class="rating-container" style="display: none">
            <div class="rating-content">
                <span class="close" onclick="closeRatingPopUp()">&times;</span>
                <h6>Rate and review</h6>
                <div class="star-container">
                    <div class="post">
                        <div class="text">Thanks for rating us!</div>
                        <div class="edit">EDIT</div>
                    </div>
                    <form method="post" action="<?=ROOT?>/client/reservations/<?=$sp_id?>">
                        <div class="star-widget">
                           <div class="stars">
                               <input type="radio" name="star-rate" id="rate-5" value="5">
                               <label for="rate-5" >&#9733;</label>
                               <input type="radio" name="star-rate" id="rate-4" value="4">
                               <label for="rate-4" >&#9733;</label>
                               <input type="radio" name="star-rate" id="rate-3" value="3">
                               <label for="rate-3" >&#9733;</label>
                               <input type="radio" name="star-rate" id="rate-2" value="2">
                               <label for="rate-2" >&#9733;</label>
                               <input type="radio" name="star-rate" id="rate-1" value="1">
                               <label for="rate-1" >&#9733;</label>
                           </div>
                            <div class="form1">
<!--                                <header>I don't like it</header>-->
                                <div class="textarea">
                                    <textarea name="content" id="" cols="30" rows="10" placeholder="Describe your experience..."></textarea>
                                </div>
                                <div class="btn">
                                    <button type="submit">Post</button>
                                </div>
                            </div>
                        </div>
                    </form>

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
    const rating = document.getElementById('rating');

    function openRatingPopUp() { rating.style.display='flex'}
    function closeRatingPopUp() { rating.style.display='none'}

    const btn = document.querySelector("button")
    const post = document.querySelector(".post")
    const widget = document.querySelector(".star-widget")
    const editBtn = document.querySelector(".edit")

    btn.onclick = ()=> {
        widget.style.display = "none";
        editBtn.onclick = ()=> {
            widget.style.display = "block";
            post.style.display = "none";
        }
        return false;
    }

    const stars = document.querySelector(".stars")
    const form1 = document.querySelector('.form1')

    stars.addEventListener('click', () => {
        form1.style.display = 'block'
    })

</script>
