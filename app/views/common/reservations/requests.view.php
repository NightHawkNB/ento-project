<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="wid-100 pad-10 dis-flex-col al-it-ce">

            <h1 class="mar-10-0 txt-c-white f-mooli txt-w-bold" style="font-size: 1.5rem">Reservation Requests</h1>

            <div class="component-list wid-80">
                <div class="requests">
                    <p>Client Name</p>
                    <p>Date and Time</p>
                    <p>Location</p>
                    <p>Status</p>
                    <p>Actions</p>
                </div>

                <?php
                    if(!empty($requests)) {
                        foreach($requests as $request) {
                            $this->view('common/reservations/components/request', (array)$request);
                        }
                    } else {
                        echo "<h3 class='txt-c-white'>No reservations to show</h3>";
                    }
                ?>
            </div>

        </section>
    </main>
</div>
</body>
</html>