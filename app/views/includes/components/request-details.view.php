<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="wid-100 pad-10">

            <h1 class="mar-10-0 txt-c-white f-mooli txt-w-bold" style="font-size: 1.5rem">Reservation Requests Details</h1>

            <div class="bg-white-90 bor-rad-5 wid-100 pad-10 dis-flex-col gap-20 sh">

                <?php
                extract((array)$request);
                ?>

                <h3>Details of the Request</h3>

                <div class="dis-flex flex-wrap wid-100 gap-20">
                    <div class="dis-flex gap-10 ju-co-sb wid-100 flex-wrap">
                        <div>
                            <h4>Date and Time</h4>
                            <p><?= $datetime ?></p>
                        </div>
                        <div class="txt-ali-rig">
                            <h4>Location</h4>
                            <p><?= $location ?></p>
                        </div>
                    </div>


                    <div class="dis-flex-col gap-10 ju-co-sb wid-100 flex-wrap">
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

                    <div class="dis-flex-col gap-10 ju-co-sb wid-100 flex-wrap">
                        <h3>Request Details</h3>
                        <div class="dis-flex gap-10 wid-100">
                            <div class="wid-100">
                                <h4>Details</h4>
                                <p><?= $details ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!--            --><?php //= show($request); ?>

        </section>
    </main>
</div>
</body>
</html>