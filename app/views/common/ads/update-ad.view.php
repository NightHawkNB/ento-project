<html lang="en">
<?php $this->view('includes/head', ['style' => ['components/form.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="dis-flex-col al-it-ce" style="overflow: auto; padding: 20px; background-color: var(--white-link)">

            <form method="post" enctype="multipart/form-data" class="form-style">

                <div class="horizontal-group">
                    <?php if($_SESSION['USER_DATA']->user_type != "venuem"): ?>
                        <div class="image-upload">
                            <img id="image-ad" class="bor-rad-5" src="<?= ROOT.$ads->image ?>" style="width: 150px; height: 150px; object-fit: cover" alt="general image">
                            <div>
                                <label for="image" class="hover-pointer">
                                    <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                    <input onchange="load_image(this.files[0])" type="file" id="image" name="image" class="hide">
                                </label>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Code for selecting an existing venue -->
                    <div class="group">

                        <?php if($_SESSION['USER_DATA']->user_type == "venuem"): ?>
                            <select name="venue_id" id="venue_id">
                                <?php
                                if(!empty($venues)) {
                                    foreach ($venues as $venue) {
                                        echo "<option value='$venue->venue_id'>$venue->name</option>";
                                    }
                                } else {
                                    echo "<a href=' " . ROOT. "/venuem/venues/insert'> + Create a Venue</a>";
                                }
                                ?>
                            </select>
                        <?php else: ?>
                            <div class="group-content">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" placeholder="Name of the Ad" value="<?= !empty($ads->title) ? $ads->title : '' ?>">
                                <div class="error"></div>
                            </div>
                        <?php endif; ?>

                        <div class="group-content">
                            <label for="contact_email">Contact Email</label>
                            <input type="text" id="contact_email" name="contact_email" placeholder="Email to contact you for inquiries" value="<?= !empty($ads->contact_email) ? $ads->contact_email : '' ?>">
                            <div class="error"></div>
                        </div>
                    </div>
                </div>

                <div class="group-content">
                    <label for="details">Details</label>
                    <textarea name="details" id="details" placeholder="Details related to the advertisement"><?= !empty($ads->details) ? $ads->details : '' ?></textarea>
                    <div class="error"></div>
                </div>

                <div class="horizontal-group">
                    <div class="group-content">
                        <label for="rates">Rate per Event</label>
                        <input type="text" id="rates" name="rates" placeholder="Current average rates" value="<?= !empty($ads->rates) ? $ads->rates : '' ?>">
                        <div class="error"></div>
                    </div>

                    <div class="group-content">
                        <label for="contact_num">Contact Number</label>
                        <input type="tel" pattern="[0-9]{10}" id="contact_num" placeholder="Business contact number" name="contact_num" value="<?= !empty($ads->contact_num) ? $ads->contact_num : '' ?>">
                        <div class="error"></div>
                    </div>
                </div>

                <div class="horizontal-group">
                    <div class="group-content wid-100">
                        <label for="category">Advertisement Category</label>
                        <select name="category" class="wid-100" id="category">
                            <option id="singer_type" value="singer" <?= ($_SESSION['USER_DATA']->user_type == "singer") ? 'selected' : 'disabled' ?> >Singer</option>
                            <option id="band_type" value="band" <?= ($_SESSION['USER_DATA']->user_type == "band") ? 'selected' : 'disabled' ?> >Band</option>
                            <option id="venue_type" value="venue" <?= ($_SESSION['USER_DATA']->user_type == "venuem") ? 'selected' : 'disabled' ?> >Venue</option>
                            <!--                            <option selected disabled class="txt-ali-cen"> Select Ad Type </option>-->
                        </select>
                        <div class="error"></div>
                    </div>

                    <?php if($_SESSION['USER_DATA']->user_type == "band"): ?>
                        <div id="create_ad_band" class="group-content">

                            <div class="group-content">
                                <label for="packages">Package Details</label>
                                <select name="packages" class="wid-100" id="packages">
                                    <option id="3piece" value="3piece" <?= ($ads->packages == "3piece") ? 'selected' : '' ?>>3 Piece Band</option>
                                    <option id="5piece" value="5piece" <?= ($ads->packages == "5piece") ? 'selected' : '' ?>>5 Piece Band</option>
                                </select>
                                <div class="error"></div>
                            </div>

                        </div>
                    <?php endif; ?>
                </div>

                <div class="wid-100 dis-flex ju-co-ce">
                    <button type="submit" class="blue-btn">Update Ad</button>
                </div>
            </form>

        </section>
    </main>
</div>
</body>
</html>