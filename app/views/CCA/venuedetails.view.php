<html lang="en">
<?php $this->view('includes/head', ['style' => ['cca/complaintdetails.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>
    <main class="dashboard-main ">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 pad-20 dis-flex wid-100 hei-100 ju-co-ce al-it-ce">
            <div class="complaint-container">
                <div class="form" style="width: 100%">
                    <div class="content">
                        <h1 class="dis-flex ju-co-ce pad-20 head">Venue Details</h1>
                        <div class="inputflex">
                            <div class="input-box">
                                <label>Venue Id </label>
                                <div class="input-like"><?= $assists->venue_id ?> </div>
                            </div>
                            <div class="input-box">
                                <label>Name</label>
                                <div class="input-like"><?= $assists->name ?> </div>
                            </div>
                        </div>
                        <div class="inputflex">
                            <div class="input-box">
                                <label>Seat Count</label>
                                <div class="input-like"><?= $assists->seat_count?> </div>
                            </div>
                            <div class="input-box">
                                <label>Contact Number</label>
                                <div class="input-like"><?= $assists->seat_count?> </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label>Location</label>
                            <div class="input-like"><?= $assists->location ?> </div>
                        </div>
                    </div>
                    <?php
                    if ($assists->status == 'New') {
                        echo '
                       <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">
                        <a href="<?= ROOT ?>/cca/venue/verifydetails/<?= $assists->$venue_id ?>">
                            <button class="btn-lay-2 hover-pointer btn-anima-hover">Verify</button>
                        </a>
                        <a href="<?= ROOT ?>/cca/venue/verifydetails/<?= $assists->$venue_id?>">
                            <button class="btn-lay-2 hover-pointer btn-anima-hover">Declined</button>
                        </a>
                    </div>';
                    }
                    ?>
            </div>
        </section>
    </main>
</div>
</body>
</html>