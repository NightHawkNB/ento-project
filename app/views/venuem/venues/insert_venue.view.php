<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 dis-flex ju-co-ce">
            <div class="glass-bg dis-flex-col al-it-ce pad-20 gap-10 bor-rad-5">

                <form method="post" enctype="multipart/form-data" class="profile-edit-form dis-flex-col al-it-ce ju-co-ce">
                    <div class="pos-rel wid-auto dis-flex ju-co-ce p-img">
                        <img id="image-ad" class="bor-rad-5" src="<?= (empty($image)) ? ROOT.'/assets/images/venues/venue.png' : $image ?>" style="width: 150px; height: 150px; object-fit: cover" alt="general image">
                        <label for="image" style="right: 150; bottom: -10; width: fit-content" class="pos-abs bor-rad-5 pad-10 bg-grey hover-pointer">
                            <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                            <input onchange="load_image(this.files[0])" type="file" id="image" name="image" class="hide">
                        </label>
                    </div>

                    <div class="">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?= set_value('name', $name) ?>">
                    </div>

                    <div class="">
                        <label for="location">Location</label>
                        <input type="text" name="location" value="<?= set_value('location', $location) ?>">
                    </div>

                    <div class="">
                        <label for="seat_count">Seat Count</label>
                        <input type="number" name="seat_count" value="<?= set_value('seat_count', $seat_count) ?>">
                    </div>

                    <div class="">
                        <label for="packages">Packages</label>
                        <textarea name="packages"><?= set_value('packages', $packages) ?></textarea>
                    </div>

                    <div class="">
                        <label for="other">Other Details</label>
                        <textarea name="other"><?= set_value('other', $other) ?></textarea>
                    </div>

                    <div class="wid-100 dis-flex ju-co-ce button">
                        <button type="submit" class="blue-btn">Save Changes</button>
                    </div>
                </form>

            </div >
        </section>
    </main>
</div>
</body>
</html>