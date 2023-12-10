<div class="reservation">

    <?php
        $now = new DateTime();
        $future_date = new DateTime($start_time);

        $interval = $future_date->diff($now);
    ?>

    <h3 class="txt-c-black"><?= ucfirst($fname) ?>&nbsp;<?= ucfirst($lname) ?></h3>

    <div class="time">
        <img src="<?= ROOT ?>/assets/images/icons/clock.png" alt="seat-image" class="icon">
        <p><?= $start_time ?></p>
    </div>

    <div class="location">
        <img src="<?= ROOT ?>/assets/images/icons/location_pin.png" alt="seat-image" class="icon">
        <p><?= $location ?></p>
    </div>

    <div class="interval">
        <img src="<?= ROOT ?>/assets/images/icons/hourglass.png" alt="seat-image" class="icon">
        <p><?= $interval->format("%a D : %h H : %i M") ?></p>
    </div>

    <div class="dis-flex gap-10 accept-btn">
        <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations/<?= $reservation_id ?>">
            <button class="dis-flex al-it-ce gap-10">
                <svg class="feather feather-info" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="16" y2="12"/><line x1="12" x2="12.01" y1="8" y2="8"/></svg>
                <p>Details</p>
            </button>
        </a>
    </div>
</div>