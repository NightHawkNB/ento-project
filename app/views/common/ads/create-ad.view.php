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

            <script>
                function load_image(file) {

                    const mylink = window.URL.createObjectURL(file)
                    document.getElementById('image-ad').src = mylink
                }
            </script>

            <form method="post" enctype="multipart/form-data" id="ad_form" class="glass-container txt-c-black al-it-ce pad-20 bor-rad-5 dis-flex-col flex-1 ju-co-ce">

                <div class="profile-input-2 pos-rel">
                    <img id="image-ad" class="bor-rad-5" src="<?= ROOT ?>/assets/images/ads/general.png" style="width: 150px; height: 150px; object-fit: cover" alt="general image">
                    <div class="dis-flex gap-20 al-it-ce">
                        <label for="image" style="right: -10; bottom: -10" class="pos-abs bor-rad-5 pad-10 bg-grey hover-pointer">
                            <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                            <input onchange="load_image(this.files[0])" type="file" id="image" name="image" class="hide">
                        </label>
                    </div>
                    <div class="error"></div>
                </div>

                <div class="profile-input-2">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title">
                    <div class="error"></div>
                </div>

                <div class="profile-input-2">
                    <label for="details">Details</label>
                    <textarea name="details" id="details" class="bor-rad-5 pad-10"></textarea>
                    <div class="error"></div>
                </div>

                <div class="profile-input-2">
                    <label for="rates">Rates</label>
                    <input type="text" id="rates" name="rates">
                    <div class="error"></div>
                </div>

                <div class="profile-input-2">
                    <label for="contact_email">Contact Email</label>
                    <input type="text" id="contact_email" name="contact_email">
                    <div class="error"></div>
                </div>

                <div class="profile-input-2">
                    <label for="contact_num">Contact Number</label>
                    <input type="tel" pattern="[0-9]{3}-[0-9]{7}" id="contact_num" name="contact_num">
                    <div class="error"></div>
                </div>

                <div class="profile-input-2 wid-100">
                    <div class="dis-flex gap-20 wid-100 al-it-ce ju-co-sb">
                        <label for="category">Category</label>
                        <select name="category" class="input wid-100" id="category" onchange="create_ad()">
                            <option id="singer_type" value="singer">Singer</option>
                            <option id="band_type" value="band">Band</option>
                            <option id="venue_type" value="venue">Venue</option>
                            <option selected disabled class="txt-ali-cen"> Select Ad Type </option>
                        </select>
                    </div>
                    <div class="error"></div>
                </div>

                <div id="create_ad_singer" class="hide dis-flex-col al-it-ce ju-co-ce gap-20">

                    <div class="profile-input-2">
                        <div class="dis-flex gap-20 al-it-ce">
                            <p>Upload Sample Audio (MPEG/MP3)</p>
                            <label for="sample_audio" class="bor-rad-5 pad-10 bg-indigo-2 hover-pointer">
                                <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                <input type="file" id="sample_audio" name="sample_audio" class="hide">
                            </label>
                        </div>
                        <div class="error"></div>
                    </div>

                </div>

                <div id="create_ad_band" class="hide dis-flex-col gap-20 al-it-ce ju-co-ce">

                    <div class="profile-input-2">
                        <div class="dis-flex gap-20 al-it-ce">
                            <p>Upload Sample Audio (MPEG/MP3)</p>
                            <label for="sample_audio" class="bor-rad-5 pad-10 bg-indigo-2 hover-pointer">
                                <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                <input type="file" id="sample_audio" name="sample_audio" class="hide">
                            </label>
                        </div>
                        <div class="error"></div>
                    </div>

                    <div class="profile-input-2">
                        <div class="dis-flex gap-20 al-it-ce">
                            <p>Upload Sample Video Link (Youtube)</p>
                            <label for="sample_video" class="bor-rad-5 pad-10 bg-indigo-2 hover-pointer">
                                <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                <input type="text" id="sample_video" name="sample_video" class="hide">
                            </label>
                        </div>
                        <div class="error"></div>
                    </div>

                    <div class="profile-input-2">
                        <label for="packages">Package Details</label>
                        <input type="text" id="packages" name="packages">
                        <div class="error"></div>
                    </div>

                </div>

                <div id="create_ad_venue" class="hide dis-flex-col gap-20 al-it-ce ju-co-ce">

                    <div class="profile-input-2">
                        <div class="dis-flex gap-20 al-it-ce">
                            <p>Image of Seating Arrangements</p>
                            <label for="seat_image" class="bor-rad-5 pad-10 bg-indigo-2 hover-pointer">
                                <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                <input type="file" id="seat_image" name="seat_image" class="hide">
                            </label>
                        </div>
                        <div class="error"></div>
                    </div>

                    <div class="profile-input-2">
                        <label for="seat_count">Seat Count</label>
                        <input type="number" id="seat_count" name="seat_count">
                        <div class="error"></div>
                    </div>

                </div>

                <div class="wid-100 dis-flex ju-co-ce">
                    <button type="submit" class="btn-lay-2 btn-anima-hover">Create Ad</button>
                </div>
            </form>

        </section>
    </main>
</div>
</body>
</html>