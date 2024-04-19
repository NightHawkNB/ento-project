<!--<li class="nav-item --><?php //= set_activated($_SESSION['USER_DATA']->user_type.'/event') ?><!--">-->
<!--    <a class="nav-link" href="--><?php //= ROOT ?><!--/--><?php //= strtolower($_SESSION['USER_DATA']->user_type) ?><!--/event">-->
<!--        <svg class="feather feather-codesandbox" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="7.5 4.21 12 6.81 16.5 4.21"/><polyline points="7.5 19.79 7.5 14.6 3 12"/><polyline points="21 12 16.5 14.6 16.5 19.79"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" x2="12" y1="22.08" y2="12"/></svg>-->
<!--        <span class="link-name">Events</span>-->
<!--    </a>-->
<!--</li>-->

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
        <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations/accepted">
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
           href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations/pending">
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
            <span class="link-name">Pending</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link"
           href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reservations/denied">
            <svg class="feather feather-loader" height="24" width="24" fill="currentColor" stroke="currentColor" stroke-width="5"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M367.2 412.5L99.5 144.8C77.1 176.1 64 214.5 64 256c0 106 86 192 192 192c41.5 0 79.9-13.1 111.2-35.5zm45.3-45.3C434.9 335.9 448 297.5 448 256c0-106-86-192-192-192c-41.5 0-79.9 13.1-111.2 35.5L412.5 367.2zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256z"/></svg>
            <span class="link-name">Denied</span>
        </a>
    </li>

</ul>
<li class="nav-item <?= set_activated($_SESSION['USER_DATA']->user_type.'/bought_tickets') ?>">
    <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/bought_tickets">
        <svg class="feather feather-film" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><rect height="20" rx="2.18" ry="2.18" width="20" x="2" y="2"/><line x1="7" x2="7" y1="2" y2="22"/><line x1="17" x2="17" y1="2" y2="22"/><line x1="2" x2="22" y1="12" y2="12"/><line x1="2" x2="7" y1="7" y2="7"/><line x1="2" x2="7" y1="17" y2="17"/><line x1="17" x2="22" y1="17" y2="17"/><line x1="17" x2="22" y1="7" y2="7"/></svg>
        <span class="link-name">Tickets</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/dashboard">
        <svg class="feather feather-message-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
        <span class="link-name">Chat</span>
    </a>
</li>

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