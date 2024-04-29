<html lang="en">
<?php $this->view('includes/head', ['style' => ['components/res_req_details.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="wid-100 al-it-ce pad-10 dis-flex-col gap-20">

            <h1 class="mar-10-0 txt-c-black txt-w-bold" style="font-size: 1.5rem">Reservation Requests Details</h1>

            <div class="bg-white-90 bor-rad-5 wid-80 pad-30-10 dis-flex-col gap-20">

                <?php
                extract((array)$request);
                ?>

                <h3>Details of the Request</h3>

                <div class="dis-flex flex-wrap wid-100 gap-20">
                    <div class="dis-flex gap-10 ju-co-sb wid-100 flex-wrap">
                        <div>
                            <h4>Start Time</h4>
                            <p><?= $start_time ?></p>
                        </div>
                        <div>
                            <h4>End Time</h4>
                            <p><?= $start_time ?></p>
                        </div>
                        <div>
                            <h4>Location</h4>
                            <p><?= $location ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white-90 bor-rad-5 wid-80 pad-30-10 dis-flex-col gap-20">
                <h3>Client's Details</h3>
                <div class="dis-flex gap-10 ju-co-sb wid-100 flex-wrap">
                    <div class="client_data">
                        <div class="client_image">
                            <img src="<?= ROOT.$image ?>" alt="Client_profile_image">
                        </div>
                        <div class="client_name">
                            <h4>Name</h4>
                            <p><?= $fname." ".$lname ?></p>
                        </div>
                    </div>
                    <div>
                        <h4>Email</h4>
                        <p><?= $email ?></p>
                    </div>
                    <div>
                        <h4>Contact Number</h4>
                        <p><?= $contact_num ?></p>
                    </div>
                </div>
                <div class="cs-buttons">
                    <a href="mailto:<?= $email ?>" class="button-s2">
                        <svg class="feather feather-mail" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        <span>Email</span>
                    </a>
                    <a href="tel:+<?= $contact_num ?>" class="button-s2">
                        <svg class="feather feather-phone" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        <span>Call</span>
                    </a>
                    <a href="<?= ROOT.'/chat/resreq/'.Auth::getUser_id().'/'.$client_id.'/'.$req_id ?>" class="button-s2">
                        <svg class="feather feather-message-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                        <span>Chat</span>
                    </a>
                </div>
            </div>

            <div class="bg-white-90 bor-rad-5 wid-80 pad-30-10 dis-flex-col gap-20">
                <h3>Request Details</h3>
                <div class="dis-flex gap-10 wid-100">
                    <div class="wid-100" style="overflow: auto">
                        <h4>Details</h4>
                        <p><?= $details ?></p>
                    </div>
                </div>
            </div>

            <div class="bg-white-90 bor-rad-5 wid-80 pad-10 dis-flex ju-co-ce gap-20 flex-wrap action-btn">

<!--                <a href="--><?php //= ROOT.'/chat/resreq/'.Auth::getUser_id().'/'.$client_id.'/'.$req_id ?><!--" class="action-btn">-->
<!--                    <button class="chat-btn">-->
<!--                        <svg class="feather feather-message-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>-->
<!--                        <span>Chat</span>-->
<!--                    </button>-->
<!--                </a>-->

                <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations/requests/<?= $req_id ?>/accept">
                    <button class="accept-btn">
                        <svg class="feather feather-check-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <span>Accept</span>
                    </button>
                </a>

                <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations/requests/<?= $req_id ?>/decline">
                    <button class="decline-btn">
                        <svg class="feather feather-x-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10"/><line x1="15" x2="9" y1="9" y2="15"/><line x1="9" x2="15" y1="9" y2="15"/></svg>
                        <span>Decline</span>
                    </button>
                </a>

            </div>

        </section>
    </main>
</div>
</body>
</html>