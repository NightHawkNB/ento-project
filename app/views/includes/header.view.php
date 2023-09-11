<header>
    <a href="<?= ROOT ?>/home"><div class="logo" id="logo"><?= APP_NAME ?></div></a>
    <nav class="navbar">
        <a href="<?= ROOT ?>/home">Home</a>
        <a href="#events">Events</a>
        <a href="#reserve">Reserve</a>
        <a href="#aboutus">About Us</a>
        <a href="#contactus">Contact Us</a>
        <?php if(Auth::is_sp()): ?>
            <a href="<?= ROOT ?>/dashboard">Dashboard</a>
        <?php endif; ?>
        <?php if(!Auth::logged_in()): ?>
            <a href="<?= ROOT ?>/login" id="login" class="logsign">Login</a>
            <a href="<?= ROOT ?>/signup" id="signup" class="logsign">Signup</a>
        <?php else: ?>
            <a href="<?= ROOT ?>/logout" id="logout" class="logsign">Logout</a>
        <?php endif; ?>
        <div>
            Hi, <?= ucfirst(Auth::getFname())." ".ucfirst(Auth::getLname()) ?>
        </div>
    </nav>
    <a href="<?= ROOT ?>/profile"><div class="profile" id="profile">Profile</div></a>
</header>