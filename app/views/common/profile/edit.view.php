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
                    <form method="post" class="wid-50 dis-flex-col al-it-ce ju-co-ce">
                        <div class="profile-input" style="width: fit-content">
                            <label class="bg-lightgray dis-flex gap-20 fill-white pad-10 bor-rad-5 hover-pointer">
                                <p>User Profile</p>
                                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3V320c0 17.7 14.3 32 32 32s32-14.3 32-32V109.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 53 43 96 96 96H352c53 0 96-43 96-96V352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V352z"/></svg>
                                <input type="file" name="image" style="display: none">
                            </label>
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

                        <div class="profile-input">
                            <label for="image">Image</label>
                            <input type="text" name="image" value=<?= $user->image ?> >
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