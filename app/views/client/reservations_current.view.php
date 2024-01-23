<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section id="current" class="wid-100 pad-10 dis-flex-col al-it-ce">

            <h1 class="mar-10-0 txt-c-white txt-w-bold" style="font-size: 1.5rem"> Current Reservations</h1>

            <div class="pad-20 glass-bg wid-100 bor-rad-10  over-scroll dis-flex-col gap-10">
                <?php
                $currentDateTime = date('Y-m-d H:i:s');

                if(!empty($reservations)) {
                    foreach($reservations as $reservation) {
                        if($currentDateTime < $reservation-> start_time ){
                            $this->view('client/components/reservation_current', (array)$reservation);
                        }
                    }
                } else {
                    echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No reservations to show</h3>";
                }
                ?>

                <a class="blue-btn push-right"  href="reservations_old" >
                    Outdated Reservations
                </a>
                <button onclick="hideshow()">Hide</button>
        </section>
        <button onclick="hideshow()">Hide</button>
    </main>
</div>
</body>
</html>
<script>
    var sec = document.getElementById('current');

    function hideshow()
    {
        sec.classList.contains('hide');
    }

</script>