<?php if(str_contains($_GET['url'], '/profile')): ?>
<!--REMOVE AND OPTIONAL-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link" href="--><?php //= ROOT ?><!--/--><?php //= strtolower($_SESSION['USER_DATA']->user_type) ?><!--/profile/edit-profile">-->
<!--            <svg class="feather feather-edit-3" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>-->
<!--            <span class="link-name">Edit Profile</span>-->
<!--        </a>-->
<!--    </li>-->

<!--    <li class="nav-item">-->
<!--        <a class="nav-link" href="--><?php //= ROOT ?><!--/--><?php //= strtolower($_SESSION['USER_DATA']->user_type) ?><!--/profile/settings">-->
<!--            <svg class="feather feather-check-square" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>-->
<!--            <span class="link-name">Preferences</span>-->
<!--        </a>-->
<!--    </li>-->

    <li class="nav-item">
        <a class="nav-link" href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/profile/change-password">
            <svg class="feather feather-unlock" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><rect height="11" rx="2" ry="2" width="18" x="3" y="11"/><path d="M7 11V7a5 5 0 0 1 9.9-1"/></svg>
            <span class="link-name">Edit Password</span>
        </a>
    </li>
<?php endif; ?>