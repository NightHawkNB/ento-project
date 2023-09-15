<a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/dashboard">
    <i class="fa-solid fa-gauge fa-lg"></i>
    <span>Dashboard</span>
</a>
<a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/profile">
    <i class="fa-solid fa-user fa-lg"></i>
    <span>Profile</span>
</a>
<a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations">
    <i class="fa-solid fa-file-circle-check"></i>
    <span>Reservations</span>
</a>