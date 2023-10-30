<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <script src="<?= ROOT ?>/assets/scripts/validation.js" defer></script>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="dis-flex-col al-it-ce pad-20 gap-10">

            <form method="post" id="ad_form" class="bg-lightgray txt-c-black al-it-ce pad-20 bor-rad-5 dis-flex-col flex-1 ju-co-ce">
                <div class="profile-input-2 <?= (!empty($errors['title'])) ? 'error' : '' ?>">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?php if(!empty($errors['title'])) echo $errors->title ?>">
                    <div class="error"></div>
                </div>

                <div class="profile-input-2 <?= (!empty($errors['details'])) ? 'error' : '' ?>">
                    <label for="details">Details</label>
                    <textarea name="details" id="details" class="bor-rad-5 pad-10"><?php if(!empty($errors['details'])) echo $errors->details ?></textarea>
                    <div class="error"></div>
                </div>

                <div class="profile-input-2 <?= (!empty($errors['rates'])) ? 'error' : '' ?>">
                    <label for="rates">Rates</label>
                    <input type="text" id="rates" name="rates" value="<?php if(!empty($errors['rates'])) echo $errors->rates ?>">
                    <div class="error"></div>
                </div>

                <div class="profile-input-2 <?= (!empty($errors['image'])) ? 'error' : '' ?>">
                    <label for="image">Image</label>
                    <input type="text" id="image" name="image" value="<?php if(!empty($errors['image'])) echo $errors->image ?>">
                    <div class="error"></div>
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