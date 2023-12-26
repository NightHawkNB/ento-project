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

            <div class="glass-bg scanner-container mar-10 hei-100 wid-100 dis-flex-col al-it-ce pad-20 bor-rad-5 over-scroll">

                <div class="qr-container">
                    <div id="scanner" class="qr-content scanner"></div>
                    
                    <div id="result" class="qr-content result" style="width: 100%; aspect-ratio: 1/1">
                        <div id="status-container" class="border-pending dis-flex-col gap-10 al-it-ce ju-co-ce">
                            <img id="status-gif" src="" alt="scanning-anima" class="gif">
                            <h2 id="status-text">Scanning</h2>
                        </div>
                    </div>
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
        rememberLastUsedCamera: true,
    })

    const status_container = document.getElementById('status-container')
    const status_image = document.getElementById('status-gif')
    const status_text = document.getElementById('status-text')
    status_image.src = "<?= ROOT ?>/assets/images/icons/scanning-anima.gif"

    scanner.render(success, error)

    let result = document.getElementById('result')

    function success(res) {

        // IMPORTANT Add something stop repeated scans, like a delay(timer)
        // Show the timer in the view for user convenience


        // Splitting the result - current format -> id/hash
        res = res.split("/")

        let data = {
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

            if(data === "error") {
                console.log("No ticket found with that ID")
                status_change("error")

                setTimeout(() => {
                    status_change('pending')
                }, 3000)
            } else if (data === "valid") {
                console.log("Valid Ticket")
                status_change("approve")

                setTimeout(() => {
                    status_change('pending')
                }, 3000)
            } else {
                console.log("Altered/Fake Ticket")
                status_change("error")

                setTimeout(() => {
                    status_change('pending')
                }, 3000)
            }

            // console.log(data)
        })

    }

    function error(err) {
        console.log(err)
    }

    function status_change(status) {

        switch (status) {
            case 'approve':
                if(!status_container.classList.contains('border-approved')) status_container.classList.add('border-approved')
                if(status_container.classList.contains('border-error')) status_container.classList.remove('border-error')
                if(status_container.classList.contains('border-pending')) status_container.classList.remove('border-pending')
                status_image.src = "<?= ROOT ?>/assets/images/icons/approved.png"
                status_text.innerHTML = "Approved"
                break

            case 'error':
                if(status_container.classList.contains('border-approved')) status_container.classList.remove('border-approved')
                if(!status_container.classList.contains('border-error')) status_container.classList.add('border-error')
                if(status_container.classList.contains('border-pending')) status_container.classList.remove('border-pending')
                status_image.src = "<?= ROOT ?>/assets/images/icons/error.png"
                status_text.innerHTML = "Declined"
                break

            case 'pending':
                if(status_container.classList.contains('border-approved')) status_container.classList.remove('border-approved')
                if(status_container.classList.contains('border-error')) status_container.classList.remove('border-error')
                if(!status_container.classList.contains('border-pending')) status_container.classList.add('border-pending')
                status_image.src = "<?= ROOT ?>/assets/images/icons/scanning-anima.gif"
                status_text.innerHTML = "Scanning"
                break

            default :
                if(status_container.classList.contains('border-approved')) status_container.classList.remove('border-approved')
                if(status_container.classList.contains('border-error')) status_container.classList.remove('border-error')
                if(!status_container.classList.contains('border-pending')) status_container.classList.add('border-pending')
                status_image.src = "<?= ROOT ?>/assets/images/icons/scanning-anima.gif"
                status_text.innerHTML = "Scanning"


                break
        }

    }

</script>


</body>
</html>