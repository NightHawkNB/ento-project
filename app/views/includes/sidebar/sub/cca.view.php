<?php if(str_contains($_GET['url'], '/complaints')): ?>

    <li class="nav-item">
        <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/complaints/assists">
            <svg class="feather feather-anchor" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="5" r="3"/><line x1="12" x2="12" y1="22" y2="8"/><path d="M5 12H2a10 10 0 0 0 20 0h-3"/></svg>
            <span class="link-name">Assists</span>
        </a>
    </li>

<?php endif; ?>