<html lang="en">
<?php $this->view('includes/head', ['style' => ['reports/admin_useraccounts.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>
    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 dis-flex-col gap-10 wid-100 pad-10 al-it-ce txt-c-black">
            <h2>Your Events</h2>
            <!--            --><?php //= show($data)?>

            <div class="txt-c-black ">
                <?php
                if (!empty($events)) {
                    foreach ($events as $event) {
                        $this->view('eventm/components/event_details', (array)$event);
                    }
                }
                ?>
            </div>
        </section>
    </main>
</div>
</body>
</html>

