<html lang="en">
<?php $this->view('includes/head', ['style' => ['client/reservations.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="wid-100 pad-10 dis-flex-col al-it-ce">

            <h1 class="mar-10-0 txt-c-black txt-b-bold" style="font-size: 1.5rem"> Notifications</h1>
            <div class="txt-ali-lef bg-black-1 txt-c-white wid-100 mar-10 pad-10 bor-rad-5 glass-bg">
                    <?php
                    if(!empty($all_notifications)) {
                        foreach($all_notifications as $notification) {
                                $this->view('common/components/notification', (array)$notification);
//                                show($notification);
                        }
                    } else {
                        echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No notifications to show</h3>";
                    }
                    ?>
            </div>

        </section>
    </main>

</div>

</body>
</html>
