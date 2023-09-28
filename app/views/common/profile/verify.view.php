<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
            <?php $this->view('common/sidebar'); ?>
        </section>
        <section class="cols-10 profile dis-flex">
            <div class="profile-container-2 bg-black-1" style="align-items: stretch">
                <form method="post" class="al-it-ce">

                    <h2 class="txt-c-white f-mooli">Account Verification Form</h2>

                    <div class="flex-1 flex-all dis-flex-col gap-20 mar-bot-10">
                        <fieldset style="width: 100%" class="bor-rad-5 pad-10">
                            <legend class="txt-c-white txt-w-bold f-mooli">Personal Details</legend>
                            <div class="profile-input">
                                <label for="nic_num">NIC Number</label>
                                <input type="text" class="form-control" id="nic_num" maxlength="20">
                            </div>
                            <div class="profile-input pad-20">
                                <label>Upload images of NIC</label>
                                <div>
                                    <label for="nic_front" class="mar-20 btn-lay-s">
                                        <span class="txt-c-white txt-w-normal">Front Side :</span>
                                        <i class="fa-solid fa-file-arrow-up fa-xl txt-c-white"></i>
                                    </label>
                                    <label for="nic_back" class="mar-20 btn-lay-s">
                                        <span class="txt-c-white txt-w-normal">Back Side :</span>
                                        <i class="fa-solid fa-file-arrow-up fa-xl txt-c-white"></i>
                                    </label>
                                    <input type="file" id="nic_front" hidden>
                                    <input type="file" id="nic_back" hidden>
                                </div>
                            </div>
                        </fieldset>

                        <?php if($_SESSION['USER_DATA']->user_type === 'singer'): ?>
                            <fieldset style="width: 100%" class="bor-rad-5 pad-10">
                                <legend class="txt-c-white txt-w-bold f-mooli">Professional</legend>
                                <?php $this->view($_SESSION['USER_DATA']->user_type.'/verification') ?>
                            </fieldset>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="btn-lay-2 btn-anima-hover">Confirm & Send Request</button>
                </form>
            </div>
        </section>
    </main>
    <?php $this->view('includes/footer') ?>
</div>
</body>
</html>