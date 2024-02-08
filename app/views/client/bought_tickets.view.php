<html lang="en">
<script src="<?= ROOT ?>/assets/scripts/qrcode.min.js"></script>
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="wid-100 pad-10 dis-flex-col al-it-ce">

            <!--toggle btn html-->
            <div>
                <div class="button-box-res dis-flex">
                    <div class="btn-res"></div>
                    <button type="button" class="toggle-btn-res " onclick="hideShowCurrent()">
                        Current
                    </button>
                    <button type="button" class="toggle-btn-res" onclick="hideShowOutdated()">
                        Outdated
                    </button>
                </div>

            </div>
            <!--        current tickets-->
            <section id="current" class="wid-100 pad-10 dis-flex-col al-it-ce  hei-100">

                <h1 class="mar-10-0 txt-c-white txt-w-bold" style="font-size: 1.5rem"> Current Bought Tickets</h1>

                <div class="wid-80 glass-bg dis-flex gap-20 pad-20 hei-100 wid-100">

                    <?php
                    $currentDateTime = date('HY-m-d H:i:s');
                    if (!empty($bought_tickets)) {
                        foreach ($bought_tickets as $bought_ticket) {
                            if ($currentDateTime > $bought_ticket->start_time) {
                                $this->view('client/components/bought_ticket_current', (array)$bought_ticket);
                            }
                        }
                    } else {
                        echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No bought tickets to show</h3>";
                    }
                    ?>
                </div>

            </section>
            <!--        outdated tickets-->
            <section id="outdated" class="wid-100 pad-10 dis-flex-col al-it-ce  hei-100">

                <h1 class="mar-10-0 txt-c-white txt-w-bold" style="font-size: 1.5rem"> Outdated Bought Tickets</h1>

                <div class="wid-80 glass-bg dis-flex gap-20 pad-20 hei-100 wid-100">

                    <?php
                    $currentDateTime = date('HY-m-d H:i:s');
                    if (!empty($bought_tickets)) {
                        foreach ($bought_tickets as $bought_ticket) {
                            if ($currentDateTime < $bought_ticket->start_time) {
                                $this->view('client/components/bought_ticket_outdated', (array)$bought_ticket);
                            }
                        }
                    } else {
                        echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No bought tickets to show</h3>";
                    }
                    ?>
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

    function hideShowCurrent() {
        var isHiddenCurrent = current.classList.contains('hide');
        var isHiddenOutdated = outdated.classList.contains('hide');


        if (!isHiddenOutdated) {
            outdated.classList.add('hide');
            leftClick();
        }

        if (isHiddenCurrent) {
            current.classList.remove('hide');
            leftClick();
        }
    }

    function hideShowOutdated() {
        let isHiddenCurrent = current.classList.contains('hide');
        let isHiddenOutdated = outdated.classList.contains('hide');


        if (!isHiddenCurrent) {
            current.classList.add('hide');
            rightClick();
        }

        if (isHiddenOutdated) {
            outdated.classList.remove('hide');
            rightClick();
        }
    }

    // toggle button
    function leftClick() {
        buttons.style.left = '0'
    }

    function rightClick() {
        buttons.style.left = '110px'
    }

    // show current data when refresh and stay on outdated data when rating is added.

    let currentTab = "<?=$currentTab?>"

    document.addEventListener('DOMContentLoaded', function () {
        console.log(currentTab)
        if (currentTab === 'current') {
            outdated.classList.add('hide');
            current.classList.remove('hide');
            leftClick();
        } else {
            current.classList.add('hide');
            outdated.classList.remove('hide');
            rightClick();
        }

    });

</script>