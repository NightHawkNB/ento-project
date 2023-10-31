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
                <div class="profile-input">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="<?= set_value('title', $ads->title) ?>">
                </div>

                <div class="profile-input">
                    <label for="details">Details</label>
                    <textarea style="height: 100px; padding: 10px" name="details"><?= set_value('details', $ads->details) ?></textarea>
                </div>

<!--                <div class="profile-input">-->
<!--                    <label for="image">Image</label>-->
<!--                    <input type="text" name="image" value="--><?php //= set_value('image', $ads->image) ?><!--">-->
<!--                </div>-->

                <div class="profile-input">
                    <label for="views">Views</label>
                    <input type="text" name="views" value="<?= set_value('views', $ads->views) ?>">
                </div>

                <div class="profile-input">
                    <label for="rates">Rates</label>
                    <input type="text" name="rates" value="<?= set_value('rates', $ads->rates) ?>">
                </div>

                <div class="wid-100 dis-flex ju-co-ce">
                    <button type="submit" class="btn-lay-2 btn-anima-hover">Update Ad</button>
                </div>
            </form>

        </section>
    </main>
</div>
</body>
</html>