<html lang="en">
<?php $this->view('includes/head') ?>

<style>
    body {
        font-family: Poppins, Serif;
    }

    input {
        height: 30px;
        text-align: center;
    }

    input:focus {
        text-align: left;
    }

    img {
        padding-bottom: 10px;
    }

    label {
        padding-bottom: 5px;
    }

    form div > div {
        transition: 1s;
    }

    form div > div:hover {
        background-color: var(--indigo-6);
    }
</style>

<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 pad-10 dis-flex ju-co-st al-it-st">
            <div class=" wid-100 pad-10 gap-10 bor-rad-5 dis-flex-col ju-co-ce al-it-ce gap-20">

                <h2>Create Event Page 3</h2>

                <form method="post" class="pad-10 wid-100 bor-rad-5">
                    <div class="dis-flex gap-20 ju-co-ce al-it-ce flex-wrap">

                    </div>
                </form>

                <div class="wid-100 dis-flex ju-co-ce al-it-ce gap-20">
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/event/2">
                        <span class="btn-lay-2 btn-anima-hover f-space-2 txt-w-normal">Back</span>
                    </a>
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/event/#">
                        <span class="btn-lay-2 btn-anima-hover f-space-2 txt-w-normal">Next</span>
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>