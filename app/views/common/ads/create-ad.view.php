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
                    <input type="text" name="title">
                </div>

                <div class="profile-input">
                    <label for="details">Details</label>
                    <textarea name="details"></textarea>
                </div>

                <div class="profile-input">
                    <label for="image">Image</label>
                    <input type="text" name="image">
                </div>

                <div class="profile-input">
                    <label for="views">Views</label>
                    <input type="text" name="views">
                </div>

                <div class="profile-input">
                    <label for="rates">Rates</label>
                    <input type="text" name="rates">
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