<div class="reservations">

    <?php
    $now = new DateTime();
    $future_date = new DateTime($start_time);

    $interval = $future_date->diff($now);
    ?>

    <p><?= $fname." ".$lname ?></p>
    <p><?= $start_time ?></p>
    <p><?= $location ?></p>
    <p><?= $interval->format("%a days : %h hours : %i minutes") ?></p>
    <p class="action-btn">
        <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations/<?= $reservation_id ?>">
            <button class="dis-flex al-it-ce gap-10">
                <svg class="feather feather-info" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="16" y2="12"/><line x1="12" x2="12.01" y1="8" y2="8"/></svg>
                <p>Details</p>
            </button>
        </a>
    </p>
</div>