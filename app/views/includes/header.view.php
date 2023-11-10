<?php if(message()): ?>
    <div class="mar-0 alert-msg"><?= message('', true); ?></div>
<?php else: ?>
    <div><!-- Empty Div Element --></div>
<?php endif; ?>

<header class="cols-12 dis-flex pad-20 al-it-ce bg-black-2 flex-wrap gap-10 ju-co-ce">
    <a href="<?= ROOT ?>/home"><div class="" id="logo"><?= APP_NAME ?></div></a>
    <nav class="cols-5 flex-grow dis-flex flex-wrap ju-co-ce">
        <a href="<?= ROOT ?>/home">Home</a>
        <a href="<?= ROOT ?>/home/events">Events</a>
        <a href="<?= ROOT ?>/home/ads">Advertisements</a>
        <a href="#aboutus">About Us</a>
        <?php if(Auth::logged_in()): ?>
            <a href="<?= ROOT ?>/support/overview">Support</a>
            <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/dashboard">Dashboard</a>
        <?php endif; ?>
    </nav>
    <div class="dis-flex gap-20 al-it-ce txt-c-white">
        <?php if(Auth::logged_in()): ?>
            <div class="">Hi, <?= ucfirst(Auth::getFname())." ".substr(ucfirst(Auth::getLname()), 0, 1) ?></div>
        <?php endif; ?>
        <?php if(!Auth::logged_in()): ?>
            <a href="<?= ROOT ?>/login" id="login" class="btn-lay">Login</a>
            <a href="<?= ROOT ?>/signup" id="signup" class="btn-lay">Signup</a>
        <?php else: ?>
            <div class="">
                <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg>
            </div>
            <a href="<?= ROOT ?>/logout" id="logout" class="btn-lay">Logout</a>
        <?php endif; ?>
    </div>
</header>