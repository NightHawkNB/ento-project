<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section  class="wid-100 pad-10 dis-flex-col al-it-ce">

            <div id="current">
                <h1 class="mar-10-0 txt-c-white txt-w-bold" style="font-size: 1.5rem"> Current Reservations</h1>

                <div  class="pad-20 glass-bg wid-100 bor-rad-10  over-scroll dis-flex-col gap-10">
                    <?php
                    $currentDateTime = date('Y-m-d H:i:s');

                    if(!empty($reservations)) {
                        foreach($reservations as $reservation) {
                            if($currentDateTime < $reservation-> start_time ){
                                $this->view('client/components/reservation', (array)$reservation);
                            }
                        }
                    } else {
                        echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No reservations to show</h3>";
                    }
                    ?>
                </div>
            </div>

<!--                out dated recervations-->

            <div id="outdated">
                <h1 class="mar-10-0 txt-c-white txt-w-bold" style="font-size: 1.5rem"> Out Dated Reservations</h1>

                <div  class="pad-20 glass-bg wid-100 bor-rad-10  over-scroll dis-flex-col gap-10">
                    <?php
                    $currentDateTime = date('Y-m-d H:i:s');

                    if(!empty($reservations)) {
                        foreach($reservations as $reservation) {
                            if($currentDateTime > $reservation-> start_time ){
                                $this->view('client/components/reservation', (array)$reservation);
                            }
                        }
                    } else {
                        echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No reservations to show</h3>";
                    }
                    ?>
                </div>
            </div>

        </section>
        <div>
            <button class="blue-btn" onclick="hideShowOutdated()">OutDated</button>
            <button class="blue-btn" onclick="hideShowCurrent()">Current</button>
        </div>

    </main>
</div>
</body>
</html>
<script>
    var current = document.getElementById('current');
    var outdated = document.getElementById('outdated');

    function hideShowCurrent()
    {
        var isHiddenCurrent = current.classList.contains('hide');
        var isHiddenOutdated = outdated.classList.contains('hide');


        if(!isHiddenOutdated)
        {
            outdated.classList.add('hide');
        }

        if(isHiddenCurrent)
        {
            current.classList.remove('hide');
        }
    }
    function hideShowOutdated()
    {
        var isHiddenCurrent = current.classList.contains('hide');
        var isHiddenOutdated = outdated.classList.contains('hide');


        if(!isHiddenCurrent)
        {
            current.classList.add('hide');
        }

        if(isHiddenOutdated)
        {
            outdated.classList.remove('hide');
        }
    }

</script>