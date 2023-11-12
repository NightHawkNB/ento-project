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

            <h1 class="mar-10-0 txt-c-white f-mooli txt-w-bold" style="font-size: 1.5rem">Reservations</h1>

            <div class="component-list">
                <div>
                    <p>Title</p>
                    <p>Date</p>
                    <p>Time</p>
                    <p>Status</p>
                    <p>Actions</p>
                </div>

                <?php
                    if(!empty($records)) {
                        foreach($records as $reservations) {
                            $this->view('includes/components/reservation', (array)$reservations);
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