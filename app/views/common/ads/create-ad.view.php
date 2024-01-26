<html lang="en">
<?php $this->view('includes/head', ['style' => 'components/form.css']) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="dis-flex-col al-it-ce ju-co-ce pad-20 gap-10">

            <form method="post" enctype="multipart/form-data" class="form-style sh">

                <div class="image-upload">
                    <img id="image-ad" class="bor-rad-5" src="<?= ROOT ?>/assets/images/ads/general.png" style="width: 150px; height: 150px; object-fit: cover" alt="general image">
                    <div>
                        <label for="image" class="hover-pointer">
                            <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                            <input onchange="load_image(this.files[0])" type="file" id="image" name="image" class="hide">
                        </label>
                    </div>
                </div>

                <div class="group">
                    <div class="group-content">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" placeholder="Name of the Ad">
                        <div class="error"></div>
                    </div>

                    <div class="group-content">
                        <label for="contact_email">Contact Email</label>
                        <input type="text" id="contact_email" name="contact_email" placeholder="Email to contact you for inquiries">
                        <div class="error"></div>
                    </div>
                </div>

                <div class="group-content">
                    <label for="details">Details</label>
                    <textarea name="details" id="details" placeholder="Details related to the advertisement"></textarea>
                    <div class="error"></div>
                </div>

                <div class="group">
                    <div class="group-content">
                        <label for="rates">Rates</label>
                        <input type="text" id="rates" name="rates" placeholder="Current average rates">
                        <div class="error"></div>
                    </div>

                    <div class="group-content">
                        <label for="contact_num">Contact Number</label>
                        <input type="tel" pattern="[0-9]{10}" id="contact_num" placeholder="Business contact number" name="contact_num">
                        <div class="error"></div>
                    </div>
                </div>

                <div class="group-content wid-100">
                    <label for="category">Advertisement Category</label>
                    <select disabled name="category" class="input wid-100" id="category">
                        <option id="singer_type" value="singer" <?= ($_SESSION['USER_DATA']->user_type == "singer") ? 'selected' : 'disabled' ?> >Singer</option>
                        <option id="band_type" value="band" <?= ($_SESSION['USER_DATA']->user_type == "band") ? 'selected' : 'disabled' ?> >Band</option>
                        <option id="venue_type" value="venue" <?= ($_SESSION['USER_DATA']->user_type == "venuem") ? 'selected' : 'disabled' ?> >Venue</option>
                        <!--                            <option selected disabled class="txt-ali-cen"> Select Ad Type </option>-->
                    </select>
                    <div class="error"></div>
                </div>


                <?php if($_SESSION['USER_DATA']->user_type == "singer"): ?>
                <div id="create_ad_singer" class="group-content">
                    <div class="dis-flex gap-20 ju-co-ce wid-100">
                        <p>Upload Sample Audio (MPEG/MP3)</p>
                        <label for="sample_audio" class="bor-rad-5 pad-10 bg-indigo-2 hover-pointer">
                            <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                            <input type="file" id="sample_audio" name="sample_audio" class="hide">
                        </label>
                    </div>
                    <div class="error"></div>
                </div>
                <?php endif; ?>

                <?php if($_SESSION['USER_DATA']->user_type == "band"): ?>
                <div id="create_ad_band" class="group-content">

                    <div class="group-content">
                        <div class="dis-flex gap-20 ju-co-ce wid-100">
                            <p>Upload Sample Audio (MPEG/MP3)</p>
                            <label for="sample_audio" class="bor-rad-5 pad-10 bg-indigo-2 hover-pointer">
                                <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                <input type="file" id="sample_audio" name="sample_audio" class="hide">
                            </label>
                        </div>
                        <div class="error"></div>
                    </div>

                    <div class="group-content">
                        <div class="dis-flex gap-20 ju-co-ce wid-100">
                            <p>Upload Sample Video Link (Youtube)</p>
                            <label for="sample_video" class="bor-rad-5 pad-10 bg-indigo-2 hover-pointer">
                                <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                <input type="text" id="sample_video" name="sample_video" class="hide">
                            </label>
                        </div>
                        <div class="error"></div>
                    </div>

                    <div class="group-content">
                        <label for="packages">Package Details</label>
                        <input type="text" id="packages" name="packages">
                        <div class="error"></div>
                    </div>

                </div>
                <?php endif; ?>

                <?php if($_SESSION['USER_DATA']->user_type == "venuem"): ?>
                <div id="create_ad_venue" class="group">

                    <div class="group-content">
                        <div class="dis-flex gap-20 ju-co-ce wid-100">
                            <p>Image of Seating Arrangements</p>
                            <label for="seat_image" class="bor-rad-5 pad-10 bg-indigo-2 hover-pointer">
                                <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                <input type="file" id="seat_image" name="seat_image" class="hide">
                            </label>
                        </div>
                        <div class="error"></div>
                    </div>

                    <div class="group-content">
                        <label for="seat_count">Seat Count</label>
                        <input type="number" id="seat_count" name="seat_count">
                        <div class="error"></div>
                    </div>

                </div>
                <?php endif; ?>

                <div class="wid-100 dis-flex ju-co-ce">
                    <button type="submit" class="blue-btn">Create Ad</button>
                </div>
            </form>

        </section>
    </main>
</div>
</body>
</html>