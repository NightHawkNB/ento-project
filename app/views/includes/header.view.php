<header>
    <a href="<?= ROOT ?>/home"><div class="logo" id="logo"><?= APP_NAME ?></div></a>
    <nav class="navbar cols-5">
        <a href="<?= ROOT ?>/home">Home</a>
        <a href="#events">Events</a>
        <a href="#reserve">Reserve</a>
        <a href="#aboutus">About Us</a>
        <a href="#contactus">Contact Us</a>
        <?php if(Auth::logged_in()): ?>
            <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/dashboard">Dashboard</a>
        <?php endif; ?>
    </nav>
    <div class="user cols-2">
        <?php if(Auth::logged_in()): ?>
            <div class="profile" id="profile">Hi, <?= ucfirst(Auth::getFname())." ".ucfirst(Auth::getLname()) ?></div>
        <?php endif; ?>
        <?php if(!Auth::logged_in()): ?>
            <a href="<?= ROOT ?>/login" id="login" class="logsign">Login</a>
            <a href="<?= ROOT ?>/signup" id="signup" class="logsign">Signup</a>
        <?php else: ?>
            <a href="<?= ROOT ?>/logout" id="logout" class="logsign">Logout</a>
        <?php endif; ?>
    </div>
</header>