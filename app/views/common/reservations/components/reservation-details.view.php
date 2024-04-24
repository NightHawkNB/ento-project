<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="wid-100 al-it-ce pad-10 dis-flex-col gap-20">

            <style>
                h4 {
                    color: darkslategrey;
                    font-weight: normal;
                }

                p {
                    font-family: Calibri, sans-serif;
                }

                button {
                    border: 1px solid var(--line-primary);
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    padding: 5px 10px;
                    border-radius: 5px;
                }
            </style>

            <h1 class="mar-10-0 txt-c-white f-mooli txt-w-bold" style="font-size: 1.5rem">Reservation Details</h1>

            <div class="bg-white-90 bor-rad-5 wid-80 pad-30-10 dis-flex-col gap-20 sh">

                <?php extract((array)$reservation); ?>

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

            <div class="bg-white-90 bor-rad-5 wid-80 pad-30-10 dis-flex-col gap-20 sh">
                <h3>Client's Details</h3>
                <div class="dis-flex gap-10 ju-co-sb wid-100 flex-wrap">
                    <div>
                        <h4>Name</h4>
                        <p><?= $fname." ".$lname ?></p>
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
            </div>

            <div class="bg-white-90 bor-rad-5 wid-80 pad-30-10 dis-flex-col gap-20 sh">
                <h3>Request Details</h3>
                <div class="dis-flex gap-10 wid-100">
                    <div class="wid-100">
                        <h4>Details</h4>
                        <p><?= $details ?></p>
                    </div>
                </div>
            </div>

            <div class="bg-white-90 bor-rad-5 wid-80 pad-10 dis-flex ju-co-ce gap-20 sh flex-wrap">

                <a href="<?= ROOT.'/chat/reserve/'.Auth::getUser_id().'/'.$client_id.'/'.$reservation_id ?>" class="action-btn">
                    <button class="chat-btn">
                        <svg class="feather feather-message-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                        <span>Chat</span>
                    </button>
                </a>

                <a href="#" class="action-btn">
                    <button class="decline-btn">
                        <svg class="feather feather-x-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10"/><line x1="15" x2="9" y1="9" y2="15"/><line x1="9" x2="15" y1="9" y2="15"/></svg>
                        <span>Request Cancellation</span>
                    </button>
                </a>

            </div>

        </section>
    </main>
</div>
</body>
</html>