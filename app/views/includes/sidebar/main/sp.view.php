<?php if(Auth::is_singer() || Auth::is_band() || Auth::is_venuem()): ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ads">
            <svg class="feather feather-send" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><line x1="22" x2="11" y1="2" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            <span class="link-name">Advertisements</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations">
            <svg class="feather feather-edit" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            <span class="link-name">Reservations</span>
        </a>
    </li>
<?php endif; ?>

<?php if(Auth::is_venuem()): ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/staff">
            <svg class="feather feather-send" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><line x1="22" x2="11" y1="2" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            <span class="link-name">Staff Management</span>
        </a>
    </li>
<?php endif; ?>
