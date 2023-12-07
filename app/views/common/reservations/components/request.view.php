<?php
    $status_class = "";
    switch ($status) {
        case "Pending":
            $status_class = "pending";
            break;
        case "Declined":
            $status_class = "declined";
            break;
        case "Expired":
            $status_class = "expired";
            break;
        case "Accepted":
            $status_class = "accepted";
            break;
        default:
            $status_class = "error";
            break;
    }
?>

<div class="requests">
    <p><?= $fname." ".$lname ?></p>
    <p><?= $start_time ?></p>
    <p><?= $location ?></p>
    <p class="status <?= $status_class ?>">
        <span><?= $status ?></span>
    </p>
    <p class="action-btn">
        <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations/requests/<?= $req_id ?>">
            <button class="chat-btn">
                <svg class="feather feather-info" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="16" y2="12"/><line x1="12" x2="12.01" y1="8" y2="8"/></svg>
            </button>
        </a>

        <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations/requests/<?= $req_id ?>/accept">
            <button class="accept-btn">
                <svg class="feather feather-check" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><polyline points="20 6 9 17 4 12"/></svg>
            </button>
        </a>

        <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations/requests/<?= $req_id ?>/decline">
            <button class="decline-btn">
                <svg class="feather feather-x" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
            </button>
        </a>
    </p>
</div>