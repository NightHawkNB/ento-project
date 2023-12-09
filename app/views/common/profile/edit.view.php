<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main wid-100">
            <section class="wid-100 dis-flex ju-co-ce pad-10 al-it-st">
                <div class="glass-container pad-10-20">
                    <form method="post" enctype="multipart/form-data" class="profile-edit-form wid-50 dis-flex-col al-it-ce ju-co-ce">
                        <div class="pos-rel wid-auto p-img">
                            <img id="image-ad" class="bor-rad-5" src="<?= (str_contains($user->image, 'general')) ? ROOT.'/assets/images/ads/general.png' : $user->image ?>" style="width: 150px; height: 150px; object-fit: cover" alt="general image">
                            <label for="image" style="right: 150; bottom: -10; width: fit-content" class="pos-abs bor-rad-5 pad-10 bg-grey hover-pointer">
                                <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                <input onchange="load_image(this.files[0])" type="file" id="image" name="image" class="hide">
                            </label>
                            <div class="error"></div>
                        </div>

                        <div class="p-i-container" style="padding-top: 20px">
                            <div class="">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" value="<?= set_value('fname', $user->fname) ?>">
                            </div>

                            <div class="">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" value="<?= set_value('lname', $user->lname) ?>">
                            </div>
                        </div>

                        <div class="p-i-container">
                            <div class="">
                                <label for="email">Email</label>
                                <input type="text" name="email" value=<?= $user->email ?> >
                            </div>

                            <div class="">
                                <label for="contact_num">Contact Number</label>
                                <input type="text" name="contact_num" value="<?= set_value('contact_num', $user->contact_num) ?>">
                            </div>
                        </div>

                        <div class="nic_num">
                            <label for="nic_num">NIC Number</label>
                            <input type="text" name="nic_num" value="<?= $user->nic_num ?? "Not_Verfied" ?>" disabled >
                        </div>

                        <div class="p-i-container">
                            <div class="">
                                <label for="city">City</label>
                                <input type="text" name="city" value="<?= $user->city ?>" >
                            </div>

                            <div class="">
                                <label for="district">District</label>
                                <input type="text" name="district" value="<?= $user->district ?>" >
                            </div>
                        </div>

                        <div class="">
                            <label for="address1">Address 01</label>
                            <input type="text" name="address1" value="<?= $user->address1 ?>" >
                        </div>

                        <div class="">
                            <label for="address2">Address 02</label>
                            <input type="text" name="address2" value="<?= $user->address2 ?>" >
                        </div>

                        <div class="wid-100 dis-flex ju-co-ce button">
                            <button type="submit" class="glass-btn">Save Changes</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>
</html>