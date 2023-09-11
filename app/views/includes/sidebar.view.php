<a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/dashboard">
    <i class="fa-solid fa-gauge fa-lg"></i>
    Dashboard
</a>
<a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/profile">
    <i class="fa-solid fa-user fa-lg"></i>
    Profile
</a>
<a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations">
    <i class="fa-solid fa-file-circle-check"></i>
    Reservations
</a>