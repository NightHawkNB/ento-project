<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>

            <section class="cols-10 profile bg-primary dis-flex al-it-st">
                <div class="profile-container-2">
                    <form method="post" enctype="multipart/form-data" class="wid-50 dis-flex-col al-it-ce ju-co-ce">
                        <div class="profile-input-2 pos-rel">
                            <img id="image-ad" class="bor-rad-5" src="<?= (str_contains($user->image, 'general')) ? ROOT.'/assets/images/ads/general.png' : $user->image ?>" style="width: 150px; height: 150px; object-fit: cover" alt="general image">
                            <div class="dis-flex gap-20 al-it-ce">
                                <label for="image" style="right: -10; bottom: -10; width: fit-content" class="pos-abs bor-rad-5 pad-10 bg-grey hover-pointer">
                                    <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                    <input onchange="load_image(this.files[0])" type="file" id="image" name="image" class="hide">
                                </label>
                            </div>
                            <div class="error"></div>
                        </div>

                        <div class="profile-input">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" value="<?= set_value('fname', $user->fname) ?>">
                        </div>

                        <div class="profile-input">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" value="<?= set_value('lname', $user->lname) ?>">
                        </div>

                        <div class="profile-input">
                            <label for="email">Email</label>
                            <input type="text" name="email" value=<?= $user->email ?> >
                        </div>

                        <div class="profile-input">
                            <label for="nic_num">NIC Num</label>
                            <input type="text" name="nic_num" value=<?= $user->nic_num ?? "Not_Verfied" ?> disabled >
                        </div>

                        <div class="profile-input">
                            <label for="contact_num">Contact Num</label>
                            <input type="text" name="contact_num" value="<?= set_value('contact_num', $user->contact_num) ?>">
                        </div>

                        <div class="profile-input">
                            <label for="city">City</label>
                            <input type="text" name="city" value=<?= $user->city ?> >
                        </div>

                        <div class="profile-input">
                            <label for="district">District</label>
                            <input type="text" name="district" value=<?= $user->district ?> >
                        </div>

                        <div class="profile-input">
                            <label for="address1">Address 01</label>
                            <input type="text" name="address1" value=<?= $user->address1 ?> >
                        </div>

                        <div class="profile-input">
                            <label for="address2">Address 02</label>
                            <input type="text" name="address2" value=<?= $user->address2 ?> >
                        </div>

                        <div class="wid-100 dis-flex ju-co-ce">
                            <button type="submit" class="btn-lay-2 btn-anima-hover">Save Changes</button>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </div>
</body>
</html>