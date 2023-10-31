<html lang="en">
<?php $this->view('includes/head') ?>

<style>
    .banner {
        position: absolute;
    }

    .home-btn-1 {
        z-index: 1;
        position: absolute;
        bottom: 100px;
        right: 100px;
    }

    .home-btn-2 {
        z-index: 1;
        position: absolute;
        bottom: 200px;
        right: 100px;
    }
</style>

<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main>
            <div class="dis-flex-col">
                <div class="wid-100 banner">
                    <img src="<?= ROOT ?>/assets/images/home_banner.jpg" style="width: 100vw" alt="Banner Image">
                    <?php if(Auth::logged_in() && (Auth::is_singer() || Auth::is_band())) : ?>
                        <a href=<?= ROOT."/".strtolower($_SESSION['USER_DATA']->user_type)."/ads/create-ad"?>>
                            <button class="btn-lay-2 btn-anima-hover hover-pointer home-btn-2">Post Ad</button>
                        </a>
                    <?php endif; ?>
                    <?php if(Auth::logged_in() && Auth::is_client()) : ?>
                        <a href=<?= ROOT."/client/event" ?>>
                            <button class="btn-lay-2 btn-anima-hover hover-pointer home-btn-1">Create Event</button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </main>

        <?php $this->view('includes/footer') ?>
    </div>
</body>
</html>