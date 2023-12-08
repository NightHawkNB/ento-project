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
            <svg class="feather feather-users" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            <span class="link-name">Staff Management</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/venues">
            <svg class="feather feather-map" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"/><line x1="8" x2="8" y1="2" y2="18"/><line x1="16" x2="16" y1="6" y2="22"/></svg>
            <span class="link-name">Venue Management</span>
        </a>
    </li>
<?php endif; ?>
