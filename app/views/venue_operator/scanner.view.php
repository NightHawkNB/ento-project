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

                <div class="qr-container">
                    <div id="scanner" class="qr-content"></div>
                    <div id="result" class="qr-content"></div>
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
            width: '75%',
            height: '75%',
        },
        fps: 20,
    })

    scanner.render(success, error)

    let result = document.getElementById('result')

    function success(res) {

        // IMPORTANT Add something stop repeated scans, like a delay(timer)
        // Show the timer in the view for user convinience

        res = res.split("/")
        console.log(res[0])
        console.log(res[1])
        
        data = {
            'ticket_id' : res[0],
            'hash' : res[1]
        }

        fetch(`/ento-project/public/venueo/scanner`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json; charset=utf-8"
            },
            body: JSON.stringify(data)
        }).then(res => {
            // console.log(res)
            return res.text()
        }).then(data => {
            // Shows the data printed by the targeted php file.
            // (stopped printing all data in php file by using die command)
            
            if(data == "error") {
                console.log("No ticket found with that ID")
            } else if (data == "valid") {
                console.log("Valid Ticket")
            }

            console.log(data)
        })


        result.innerHTML = `<p>Success - ${res}</p>`
        // scanner.clear()
        // document.getElementById('scanner').remove()
        console.log(res)
    }

    function error(err) {
        // result.innerHTML = `<p>Failed - ${err}</p>`
        console.log(err)
    }

</script>


</body>
</html>