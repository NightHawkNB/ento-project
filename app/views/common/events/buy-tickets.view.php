<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dis-flex al-it-st ju-co-st wid-100">
        <div class="bg-primary dis-flex-col wid-100 pad-10-20 gap-10">
            <h1 class="f-mooli f-space-2">Buy Tickets</h1>
            <div class="wid-100 bg-black-2 txt-c-white bor-rad-5">
                <p class="pad-10">Progress Bar</p>
            </div>

            <div class="ticket-form flex-1">
                <form method="post" class="wid-100">
                    <fieldset class="bor-rad-5">
                        <legend>Bank Account Details</legend>
                        <label for="acc_num">Account Number</label>
                        <input type="text" name="acc_num">
                    </fieldset>
                </form>
            </div>
        </div>
    </main>

    <?php $this->view('includes/footer') ?>
</div>
</body>
</html>