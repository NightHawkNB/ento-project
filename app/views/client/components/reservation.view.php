<div class="reservation">

    <?php
    $now = new DateTime();
    $future_date = new DateTime($start_time);

    $interval = $future_date->diff($now);
    ?>
<!--        --><?php //= show($data);?>


    <div>
        <img src="<?= ROOT ?>/assets/images/icons/name.png" alt="name png" class="icon">
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
    <div>
        <img src="<?= ROOT ?>/assets/images/icons/remain-time.png" alt="remaing time png" class="icon">
        <p><?= $interval->format("%a days : %h hours : %i minutes") ?></p>
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
        <a href="<?= ROOT ?>/chat/reserve/<?= $sp_id ?>/<?= Auth::getUser_id() ?>/<?= $reservation_id ?>">
            <button>Chat</button>
        </a>
    <?php endif; ?>


</div>
