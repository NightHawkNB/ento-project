<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="wid-100 al-it-ce pad-10 dis-flex-col">

            <h1 class="mar-10-0 txt-c-white txt-w-bold" style="font-size: 1.5rem">Venue Management</h1>

            <div class="glass-bg scanner-container mar-10 hei-100 wid-100 dis-flex-col al-it-ce pad-20 gap-10 bor-rad-5 over-scroll">

                <div class="flex-1 dis-flex-col al-it-ce ju-co-ce gap-10 mar-bot-10 mar-top-10  wid-100 hei-100">
                    <div id="scanner"></div>
                    <div id="result"></div>
                </div>

            </div >
        </section>
    </main>
</div>

<style>
    .scanner-container {
        justify-content: center;
    }

    #scanner {
        width: 500px;
    }
</style>

<script src="<?= ROOT ?>/assets/scripts/html5-qrcode.min.js"></script>
<script>
    const scanner = new Html5QrcodeScanner('scanner', {
        qrbox: {
            width: '50%',
            height: '50%',
        },
        fps: 20,
    })

    scanner.render(success, error)

    let result = document.getElementById('result')

    function success(res) {
        result.innerHTML = `<p>Success - ${res}</p>`
        scanner.clear()
        document.getElementById('scanner').remove()
        console.log(res)
    }

    function error(err) {
        // result.innerHTML = `<p>Failed - ${err}</p>`
        console.log(err)
    }

</script>


</body>
</html>