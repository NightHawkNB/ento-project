<html lang="en">
<?php $this->view('includes/head', ['style' => ["pages/view_events.css"]]) ?>

<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 pad-10 dis-flex ju-co-st al-it-st">
            <div class="event_listing_container">
                <?php
                    if(!empty($events)) {
                        foreach ($events as $event) $this->view('common/events/components/event_listing_eventm', (array)$event);
                    } else {
                        echo "No events listed yet";
                    }
                ?>
            </div>
        </section>
    </main>

</div>
</body>
</html>