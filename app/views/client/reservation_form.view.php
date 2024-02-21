<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="dis-flex-col al-it-ce pad-20 gap-10">

            <form method="post" id="ad_form" class="bg-white txt-c-white al-it-ce pad-20 bor-rad-5 dis-flex-col flex-1 ju-co-ce glass-bg">

                <h3>Reservation Request Details</h3>

                <div class="profile-input-2">
                    <label for="details">Details</label>
                    <input type="text" id="details" name="details" placeholder="Ex: Birthday,Wedding,etc..">
                    <div class="error"></div>
                </div>

                <div class="profile-input-2">
                    <label for="start_time">Select the starting time and date</label>
                    <input type="datetime-local" id="start_time" name="start_time">
                    <div class="error"></div>
                </div>

                <div class="profile-input-2">
                    <label for="end_time">Select the ending time and date</label>
                    <input type="datetime-local" id="end_time" name="end_time">
                    <div class="error"></div>
                </div>

                <?php if($ad_owner_type != "venuem"): ?>
                <div class="profile-input-2">
                    <label for="location"> Enter the location</label>
                    <input type="text" id="location" name="location">
                    <div class="error"></div>
                </div>
                <?php endif; ?>

                <div class="wid-100 dis-flex ju-co-ce">
                    <button type="submit" class="btn-lay-2 btn-anima-hover">Submit</button>
                </div>
            </form>

        </section>
    </main>
</div>
</body>
</html>