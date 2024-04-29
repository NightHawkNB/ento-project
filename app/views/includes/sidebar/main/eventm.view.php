<li class="nav-item <?= set_activated(strtolower($_SESSION['USER_DATA']->user_type).'/create_event') ?>">
    <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/create_event">
        <svg class="feather feather-plus-square" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><rect height="18" rx="2" ry="2" width="18" x="3" y="3"/><line x1="12" x2="12" y1="8" y2="16"/><line x1="8" x2="16" y1="12" y2="12"/></svg>
        <span class="link-name">Create Event</span>
    </a>
</li>

<li class="nav-item <?= set_activated($_SESSION['USER_DATA']->user_type.'/manage_events') ?>">
    <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/manage_events">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
        <span class="link-name">Manage Events</span>
    </a>
</li>

<li class="nav-item <?= set_activated($_SESSION['USER_DATA']->user_type.'/reports') ?>">
    <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/reports">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
        <span class="link-name">Reports</span>
    </a>
</li>