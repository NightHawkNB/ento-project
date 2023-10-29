<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="dis-flex-col al-it-ce pad-20 gap-10 cols-10">

            <form method="post" class="bg-black-1 pad-20 bor-rad-5 dis-flex-col">
                <div class="profile-input <?= (!empty($errors['title'])) ? 'error' : '' ?>">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="<?php if(!empty($errors['title'])) echo $errors->title ?>">
                </div>

                <div class="profile-input <?= (!empty($errors['details'])) ? 'error' : '' ?>">
                    <label for="details">Details</label>
                    <textarea name="details"><?php if(!empty($errors['details'])) echo $errors->details ?></textarea>
                </div>

                <div class="profile-input <?= (!empty($errors['rates'])) ? 'error' : '' ?>">
                    <label for="rates">Rates</label>
                    <input type="text" name="rates" value="<?php if(!empty($errors['rates'])) echo $errors->rates ?>">
                </div>

                <div class="profile-input <?= (!empty($errors['image'])) ? 'error' : '' ?>">
                    <label for="image">Image</label>
                    <input type="text" name="image" value="<?php if(!empty($errors['image'])) echo $errors->image ?>">
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