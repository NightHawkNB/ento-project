<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="bg-lightgray">
        <div class="mar-10 over-hide bor-rad-5 dis-flex-col sh pad-10">
            <form method="post" class="bg-indigo-alert pad-10 bor-rad-5">
                <fieldset class="bor-rad-5">
                    <legend>Bank Account Details</legend>
                    <label for="acc_num">Account Number</label>
                    <input type="text" name="acc_num">
                </fieldset>
            </form>
        </div>
    </main>

    <?php $this->view('includes/footer') ?>
</div>
</body>
</html>

<!-- TODO Make the ticket buying pages -->