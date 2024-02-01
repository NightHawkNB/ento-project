<div class="reservation" style="width: fit-content !important; height: fit-content !important;">

    <?php
    show($content);

    $now = new DateTime();
    $future_date = new DateTime($start_time);

    $interval = $future_date->diff($now);
    ?>

<!--    --><?php //= show($_POST); ?>
<!--    --><?php //= show($data)?>

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

    <?php if ($status == "Accepted"): ?>
        <div class="post" style="display: flex">
            <div style="color: #DEC20B;">&#9733;</div><?= $data['rating'].".0"?>

            <div class="text">Thanks for rating us!</div>

                <button class="edit" onclick="openRatingPopUp('<?=$review_id?>')">EDIT</button>

        </div>
    <?php endif; ?>


<!--    rating button-->

    <?php if ($status == "Accepted"): ?>

        <button class="blue-btn" onclick="openRatingPopUp('<?=$review_id?>')">Rate and review</button>
<!--    Rating popup-->
        <div id="rating-<?=$review_id?>" class="rating-container" style="display: none">
            <div class="rating-content">
                <span class="close" onclick="closeRatingPopUp('<?=$review_id?>')">&times;</span>
                <h6>Rate and review</h6>
                <div class="star-container">
                    <form method="post" action="<?=ROOT?>/client/reservations/<?=$sp_id?>/<?=$reservation_id?>">
                        <div class="star-widget">
<!--    stars div-->
                           <div class="stars" on onclick="showComment('<?=$review_id?>')">
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


    <!--    chat-->

    <?php if ($status == "Accepted"): ?>
        <a href="<?= ROOT ?>/chat/reserve/<?= $sp_id ?>/<?= Auth::getUser_id() ?>/<?= $reservation_id ?>">
            <button>Chat</button>
        </a>
    <?php endif; ?>

</div>
<script>
// rating popup calling function

    function openRatingPopUp(id) {
        console.log("xdxd")
        let rating = document.getElementById('rating-'+id);

        rating.style.display='flex'}
    function closeRatingPopUp(id) {
        let rating = document.getElementById('rating-'+id);

        rating.style.display='none'}

    // const btn = document.querySelector("button")
    // const post = document.querySelector(".post")
    // const widget = document.querySelector(".star-widget")
    // const editBtn = document.querySelector(".edit")
    //
    // btn.onclick = ()=> {
    //     widget.style.display = "none";
    //     editBtn.onclick = ()=> {
    //         widget.style.display = "block";
    //         post.style.display = "none";
    //     }
    //     return false;
    // }
    // const stars = document.querySelector(".stars")
function showComment(id) {
    let form1 = document.getElementById('form-'+id)
        form1.style.display = 'block'
    }
        // stars.addEventListener('click', showComment)
    <?=(!empty($content))?"showComment('$review_id')":''?>

    const postBtn = document.getElementById("post-btn")
    const post = document.querySelector(".post");

    postBtn.onclick = ()=> {
        post.style.display = 'block';
    }
</script>
