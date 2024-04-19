<div class="reservation">

    <?php
//    format the start time
    $formatted_time = date('Y-m-d H:i:s', strtotime($start_time));
    list($date, $time) = explode(' ', $formatted_time);
//     calculate remaining time
    $now = new DateTime();
    $future_date = new DateTime($start_time);
    $interval = $future_date->diff($now);
    ?>
<!--        --><?php //= show($data);?>

    <div style="justify-content: left; ">
        <img src="<?= ROOT.$image ?>" alt="name png" class="icon" style="border-radius: 50%" >
        <p><?= $title ?></p>
    </div>

    <div>
<!--        <img src="--><?php //= ROOT ?><!--/assets/images/icons/clock.png" alt="clock png" class="icon">-->
        <p><?= "<div>$date<br>$time</div>"?></p>
    </div>
    <div>
<!--        <img src="--><?php //= ROOT ?><!--/assets/images/icons/location_pin.png" alt="location png" class="icon">-->
        <p><?= $location ?></p>
    </div>
    <div>
<!--        <img src="--><?php //= ROOT ?><!--/assets/images/icons/hourglass.png" alt="remaing time png" class="icon">-->
        <p><?= $interval->format("%aD:%hH:%iM") ?></p>
    </div>
    <?php
//    if ($status == 'Pending') {
//        echo "<div style='background-color: lightgreen; border-radius: 10px; padding: 10px; text-align: center; max-width: 100px;'> <p>$status</p></div>";
//    } elseif ($status == 'Accepted') {
//        echo "<div style='background-color: lightblue; border-radius: 10px; padding: 10px; text-align: center; max-width: 100px;'> <p>$status</p></div>";
//    } elseif ($status == 'Declined') {
//        echo "<div style='background-color: lightcoral; border-radius: 10px; padding: 10px; text-align: center; max-width: 100px;'> <p>$status</p></div>";
//
//    }
//    ?>

    <?php if ($status == "Accepted"): ?>
        <a href="<?= ROOT ?>/chat/reserve/<?= $sp_id ?>/<?= Auth::getUser_id() ?>/<?= $reservation_id ?>">
            <button>Chat</button>
        </a>
    <?php endif; ?>

</div>
