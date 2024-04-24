<html lang="en">
<?php //$this->view('includes/head', ['style' => ['client/dashboard.css']]) ?>
<?php $this->view('includes/head') ?>
<style>
    #slider {
        overflow: hidden;
        height: 300px;
        width: 500px;
    }

    #slider figure {
        position: relative;
        width: 100%; /* Adjusted to 100% */
        margin: 0;
        left: 0;
        animation: <?= count($events) * 5; ?>s slider infinite; /* Adjusted animation duration */
    }

    #slider figure img {
        float: left;
        width: <?= 100 / count($events); ?>%; /* Adjusted image width based on number of images */
        border-radius: 5px;
    }

    @keyframes slider {
    <?php
    $step = 100 / count($events); // Calculate step for each image
    $keyframes = '';

    // Iterate over each event
    foreach ($events as $i => $event) {
        $keyframes .= $i * $step . '% { left: -' . $i * 100 . '%; }';
    }

    // Add keyframe for transitioning directly to the first picture after the last one
    $keyframes .= '100% { left: -' . count($events) * 100 . '%; }';

    echo $keyframes;
    ?>
    }
</style>

<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="pad-10 dis-flex-col al-it-ce wid-100">
            <!--            <h1 class="mar-10-0 txt-c-black txt-w-bold" style="font-size: 1.5rem">Dashboard</h1>-->
            <!--            --><?php //show($data);?>
            <!--            --><?php //show(count($events)); ?>
            <div id="slider">
                <figure style="width: <?php echo count($events) * 100; ?>%;">
                    <?php
                    if (!empty($events)) {
                        foreach ($events as $event) {
                            $this->view('client/components/event_img', (array)$event);
                        }
                    }
                    ?>
                </figure>

                <figure style="width: <?php echo count($events) * 100; ?>%;">
                    <?php
                    if (!empty($events)) {
                        foreach ($events as $event) {
                            $this->view('client/components/event_details', (array)$event);
                        }
                    }
                    ?>
                </figure>


            </div>

        </section>

    </main>
</div>
</body>
</html>


