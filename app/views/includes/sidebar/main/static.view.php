<li class="nav-item" id="btn" >
    <!-- id="navBtn" -->
    <a class="nav-link" href="#">
        <svg class="feather feather-chevrons-right" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><polyline points="13 17 18 12 13 7"/><polyline points="6 17 11 12 6 7"/></svg>
        <span class="link-name">Menu</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>">
        <svg class="feather feather-globe" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10"/><line x1="2" x2="22" y1="12" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
        <span class="link-name">Dashboard</span>
    </a>
</li>