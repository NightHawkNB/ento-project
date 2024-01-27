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

            <form method="post" enctype="multipart/form-data" id="ad_form" class="txt-c-black al-it-ce pad-20 bor-rad-5 dis-flex-col flex-1 ju-co-ce">

                <div class="profile-input-2 pos-rel">
                    <img id="image-ad" class="bor-rad-5" src="<?= $ads->image ?>" style="width: 150px; height: 150px; object-fit: cover" alt="general image">
                    <div class="dis-flex gap-20 al-it-ce">
                        <label for="image" style="right: -10; bottom: -10" class="pos-abs bor-rad-5 pad-10 bg-primary hover-pointer">
                            <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                            <input onchange="load_image(this.files[0])" type="file" id="image" name="image" class="hide">
                        </label>
                    </div>
                    <div class="error"></div>
                </div>

                <div class="profile-input-2">
                    <label for="title">Title</label>
                    <input value="<?= set_value('title', $ads->title) ?>" type="text" id="title" name="title">
                    <div class="error"></div>
                </div>

                <div class="profile-input-2">
                    <label for="details">Details</label>
                    <textarea name="details" id="details" class="bor-rad-5 pad-10"><?= set_value('details', $ads->details) ?></textarea>
                    <div class="error"></div>
                </div>

                <div class="profile-input-2">
                    <label for="rates">Rates</label>
                    <input value="<?= set_value('rates', $ads->rates) ?>" type="text" id="rates" name="rates">
                    <div class="error"></div>
                </div>

                <div class="profile-input-2">
                    <label for="contact_email">Contact Email</label>
                    <input value="<?= set_value('contact_email', $ads->contact_email) ?>" type="text" id="contact_email" name="contact_email">
                    <div class="error"></div>
                </div>

                <div class="profile-input-2">
                    <label for="contact_num">Contact Number</label>
                    <input value="<?= set_value('contact_num', $ads->contact_num) ?>" type="tel" pattern="[0-9]{10}" id="contact_num" name="contact_num">
                    <div class="error"></div>
                </div>

                <?php if($ads->category == "singer"): ?>

                    <input class="hide" id="category" name="category" type="text" value="<?= $ads->category ?>">

                    <div class="dis-flex-col al-it-ce ju-co-ce gap-20">

                        <div class="profile-input-2">
                            <div class="dis-flex gap-20 al-it-ce">
                                <p>Upload Sample Audio (MPEG/MP3)</p>
                                <label for="sample_audio" class="bor-rad-5 pad-10 bg-indigo-2 hover-pointer">
                                    <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                    <input value="<?= set_value('sample_audio', $ads->sample_audio) ?>" type="file" id="sample_audio" name="sample_audio" class="hide">
                                </label>
                            </div>
                            <div class="error"></div>
                        </div>

                    </div>
                <?php endif; ?>

                <?php if($ads->category == "band"): ?>

                    <input class="hide" id="category" name="category" type="text" value="<?= $ads->category ?>">

                    <div class="dis-flex-col gap-20 al-it-ce ju-co-ce">

                        <div class="profile-input-2">
                            <div class="dis-flex gap-20 al-it-ce">
                                <p>Upload Sample Audio (MPEG/MP3)</p>
                                <label for="sample_audio" class="bor-rad-5 pad-10 bg-indigo-2 hover-pointer">
                                    <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                    <input value="<?= set_value('sample_audio', $ads->sample_audio) ?>" type="file" id="sample_audio" name="sample_audio" class="hide">
                                </label>
                            </div>
                            <div class="error"></div>
                        </div>

                        <div class="profile-input-2">
                            <div class="dis-flex gap-20 al-it-ce">
                                <p>Upload Sample Video Link (Youtube)</p>
                                <label for="sample_video" class="bor-rad-5 pad-10 bg-indigo-2 hover-pointer">
                                    <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                    <input value="<?= set_value('sample_video', $ads->sample_video) ?>" type="text" id="sample_video" name="sample_video" class="hide">
                                </label>
                            </div>
                            <div class="error"></div>
                        </div>

                        <div class="profile-input-2">
                            <label for="packages">Package Details</label>
                            <input value="<?= set_value('packages', $ads->packages) ?>" type="text" id="packages" name="packages">
                            <div class="error"></div>
                        </div>

                    </div>
                <?php endif; ?>

                <?php if($ads->category == "venue"): ?>

                    <input class="hide" id="category" name="category" type="text" value="<?= $ads->category ?>">

                    <div class="dis-flex-col gap-20 al-it-ce ju-co-ce">

                        <div class="profile-input-2">
                            <div class="dis-flex gap-20 al-it-ce">
                                <p>Image of Seating Arrangements</p>
                                <label for="seat_image" class="bor-rad-5 pad-10 bg-indigo-2 hover-pointer">
                                    <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                    <input value="<?= set_value('seat_image', $ads->seat_image) ?>" type="file" id="seat_image" name="seat_image" class="hide">
                                </label>
                            </div>
                            <div class="error"></div>
                        </div>

                        <div class="profile-input-2">
                            <label for="seat_count">Seat Count</label>
                            <input value="<?= set_value('seat_count', $ads->seat_count) ?>" type="number" id="seat_count" name="seat_count">
                            <div class="error"></div>
                        </div>

                    </div>
                <?php endif; ?>

                <div class="wid-100 dis-flex ju-co-ce">
                    <button type="submit" class="btn-lay-2 btn-anima-hover">Update Ad</button>
                </div>
            </form>

        </section>
    </main>
</div>
</body>
</html>