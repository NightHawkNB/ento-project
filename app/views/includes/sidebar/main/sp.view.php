<?php if (Auth::is_singer() || Auth::is_band() || Auth::is_venuem() || Auth::is_eventm()): ?>

    <?php if (!Auth::is_singer() AND !Auth::is_eventm()): ?>
    <li class="nav-item sub-menu-header <?= set_activated($_SESSION['USER_DATA']->user_type.'/ads') ?>" onclick="open_submenu(this)">
        <svg class="feather feather-send" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
             stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
            <line x1="22" x2="11" y1="2" y2="13"/>
            <polygon points="22 2 15 22 11 13 2 9 22 2"/>
        </svg>
        <span class="link-name">Advertisements</span>
    </li>

    <ul class="sub-menu" id="subm">
            <li class="nav-item <?= set_activated($_SESSION['USER_DATA']->user_type.'/ads/create-ad') ?>">
                <a class="nav-link"
                   href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ads/create-ad">
                    <svg class="feather feather-plus-circle" fill="none" height="24" stroke="currentColor"
                         stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                         xmlns="http://www.w3.org/2000/svg">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="12" x2="12" y1="8" y2="16"/>
                        <line x1="8" x2="16" y1="12" y2="12"/>
                    </svg>
                    <span class="link-name">Create Ad</span>
                </a>
            </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ads">
                <svg class="feather feather-check-circle" fill="none" height="24" stroke="currentColor"
                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                    <polyline points="22 4 12 14.01 9 11.01"/>
                </svg>
                <span class="link-name">Your Ads</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ads/pending">
                <svg class="feather feather-help-circle" fill="none" height="24" stroke="currentColor"
                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                     xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/>
                    <line x1="12" x2="12.01" y1="17" y2="17"/>
                </svg>
                <span class="link-name">Pending Ads</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ads/all-ads">
                <svg class="feather feather-play-circle" fill="none" height="24" stroke="currentColor"
                     stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                     xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10"/>
                    <polygon points="10 8 16 12 10 16 10 8"/>
                </svg>
                <span class="link-name">All Ads</span>
            </a>
        </li>
    </ul>

    <?php endif; ?>

    <li class="nav-item sub-menu-header <?= set_activated($_SESSION['USER_DATA']->user_type.'/reservations') ?>" onclick="open_submenu(this)">
        <svg class="feather feather-edit" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
             stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
        </svg>
        <span class="link-name">Reservations</span>
    </li>

    <ul class="sub-menu">
        <li class="nav-item">
            <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations">
                <svg class="feather feather-book" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                     stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                </svg>
                <span class="link-name">Accepted</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link"
               href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations/requests">
                <svg class="feather feather-loader" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                     stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                     xmlns="http://www.w3.org/2000/svg">
                    <line x1="12" x2="12" y1="2" y2="6"/>
                    <line x1="12" x2="12" y1="18" y2="22"/>
                    <line x1="4.93" x2="7.76" y1="4.93" y2="7.76"/>
                    <line x1="16.24" x2="19.07" y1="16.24" y2="19.07"/>
                    <line x1="2" x2="6" y1="12" y2="12"/>
                    <line x1="18" x2="22" y1="12" y2="12"/>
                    <line x1="4.93" x2="7.76" y1="19.07" y2="16.24"/>
                    <line x1="16.24" x2="19.07" y1="7.76" y2="4.93"/>
                </svg>
                <span class="link-name">Requests</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link"
               href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations/event-list">
                <svg class="feather feather-star" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                     stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                     xmlns="http://www.w3.org/2000/svg">
                    <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                </svg>
                <span class="link-name">Associated Events</span>
            </a>
        </li>
    </ul>

<?php endif; ?>

<?php if (Auth::is_venuem()): ?>
    <li class="nav-item <?= set_activated($_SESSION['USER_DATA']->user_type.'/staff') ?>">
        <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/staff">
            <svg class="feather feather-users" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
            <span class="link-name">Staff Management</span>
        </a>
    </li>

    <li class="nav-item <?= set_activated($_SESSION['USER_DATA']->user_type.'/venues') ?>">
        <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/venues">
            <svg class="feather feather-map" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                 xmlns="http://www.w3.org/2000/svg">
                <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"/>
                <line x1="8" x2="8" y1="2" y2="18"/>
                <line x1="16" x2="16" y1="6" y2="22"/>
            </svg>
            <span class="link-name">Venue Management</span>
        </a>
    </li>
<?php endif; ?>

<?php if (Auth::is_venueo()): ?>
    <li class="nav-item <?= set_activated($_SESSION['USER_DATA']->user_type.'/scanner') ?>">
        <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/scanner">
            <svg id="scanner-icon" style="enable-background:new 0 0 24 24;" viewBox="0 0 24 24" xml:space="preserve"
                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Layer_1"/>
                <g id="Layer_2">
                    <g>
                        <path d="M17,3h-1c-0.6,0-1,0.4-1,1s0.4,1,1,1h1c1.1,0,2,0.9,2,2v1.1c0,0.6,0.4,1,1,1s1-0.4,1-1V7C21,4.8,19.2,3,17,3z"/>
                        <path d="M20,15c-0.6,0-1,0.4-1,1v1c0,1.1-0.9,2-2,2h-1c-0.6,0-1,0.4-1,1s0.4,1,1,1h1c2.2,0,4-1.8,4-4v-1C21,15.4,20.6,15,20,15z"/>
                        <path d="M8,19H7c-1.1,0-2-0.9-2-2v-1c0-0.6-0.4-1-1-1s-1,0.4-1,1v1c0,2.2,1.8,4,4,4h1c0.6,0,1-0.4,1-1S8.6,19,8,19z"/>
                        <path d="M4,9c0.6,0,1-0.4,1-1V7c0-1.1,0.9-2,2-2h1c0.6,0,1-0.4,1-1S8.6,3,8,3H7C4.8,3,3,4.8,3,7v1C3,8.5,3.4,9,4,9z"/>
                        <path d="M20,11H4c-0.6,0-1,0.4-1,1s0.4,1,1,1h16c0.6,0,1-0.4,1-1S20.6,11,20,11z"/>
                    </g>
                </g></svg>
            <span class="link-name">QR Code Scanner</span>
        </a>
    </li>
<?php endif; ?>

<!-- The report button will only be shown to the Singer for now -->
<?php if ($_SESSION['USER_DATA']->user_type == 'singer'): ?>

    <li class="nav-item special <?= set_activated($_SESSION['USER_DATA']->user_type.'/stat') ?>">
        <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/stat">
            <svg class="feather feather-bar-chart-2" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><line x1="18" x2="18" y1="20" y2="10"/><line x1="12" x2="12" y1="20" y2="4"/><line x1="6" x2="6" y1="20" y2="14"/></svg>
            <span class="link-name">Statistics</span>
        </a>
    </li>

<?php endif; ?>

<script>
    function open_submenu(element) {
        // Find the next sibling element (which is the <ul> in this case)
        let submenu = element.nextElementSibling;

        // Check if the next sibling is a <ul> element
        if (submenu && submenu.tagName === 'UL') {
            // Toggle the 'active' class on the <ul> element
            submenu.classList.toggle('active');
        }
    }
</script>
