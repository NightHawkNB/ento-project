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
            <div>
<!--                <button class="blue-btn" onclick="hideShowOutdated()">OutDated</button>-->
<!--                <button class="blue-btn" onclick="hideShowCurrent()">Current</button>-->

                <div class="button-box-res dis-flex" >
                    <div class="btn-res"></div>
                    <button  type="button" class="toggle-btn-res "  onclick="hideShowCurrent()">
                        Current
                    </button>
                    <button  type="button" class="toggle-btn-res"  onclick="hideShowOutdated()">
                        Outdated
                    </button>
                </div>

            </div>

<!--current reservations-->

            <div id="current">
                <h1 class="mar-10-0 txt-c-white txt-w-bold" style="font-size: 1.5rem"> Current Reservations</h1>

                <div  class="pad-20 glass-bg wid-100 bor-rad-10  over-scroll dis-flex-col gap-10">
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
                                $this->view('client/components/reservation_outdated', (array)$reservation);
                            }
                        }
                    } else {
                        echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No reservations to show</h3>";
                    }
                    ?>
                </div>
            </div>

        </section>


    </main>
</div>
</body>
</html>
<script>
    var current = document.getElementById('current');
    var outdated = document.getElementById('outdated');
    var buttons = document.querySelector('.btn-res');

    function hideShowCurrent()
    {
        var isHiddenCurrent = current.classList.contains('hide');
        var isHiddenOutdated = outdated.classList.contains('hide');


        if(!isHiddenOutdated)
        {
            outdated.classList.add('hide');
            leftClick();
        }

        if(isHiddenCurrent)
        {
            current.classList.remove('hide');
            leftClick();
        }
    }
    function hideShowOutdated()
    {
        var isHiddenCurrent = current.classList.contains('hide');
        var isHiddenOutdated = outdated.classList.contains('hide');


        if(!isHiddenCurrent)
        {
            current.classList.add('hide');
            rightClick();
        }

        if(isHiddenOutdated)
        {
            outdated.classList.remove('hide');
            rightClick();
        }
    }

    // toggle button
    function leftClick(){
        buttons.style.left = '0'
    }

    function rightClick(){
        buttons.style.left = '110px'
    }

// show current data when refresh
    document.addEventListener('DOMContentLoaded',function (){
        outdated.classList.add('hide');
        current.classList.remove('hide');
        leftClick();
    });

</script>