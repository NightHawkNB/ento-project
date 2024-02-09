<div><!-- Empty Div Element --></div>

<?php
if (message()) {
    switch ($_SESSION['alert-status']) {
        case 'neutral':
            $status = "neutral";
            $heading = "Alert";
            break;
        case 'success':
            $status = "success";
            $heading = "Success";
            break;
        case 'failed':
            $status = "failed";
            $heading = "Error";
            break;
        default :
            $status = "";
            $heading = "";
    }
}
?>

<!--<div class="cursor"></div>-->

<div class="pre-loader" id="pre-loader">
    <img src="<?= ROOT ?>/assets/images/loading.gif" alt="loading_gif">
</div>

<link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/navbar.css">
<script src="<?= ROOT ?>/assets/scripts/components/navbar.js"></script>

<header class="cols-12">

    <a href="<?= ROOT ?>/home">
        <div class="" id="logo"><?= APP_NAME ?></div>
    </a>

    <div id="main-navbar">
        <div class="container">
            <div class="mobile-nav-content">
                <button id="menu-toggler" style="margin-left: auto"><i class="fa fa-bars"> </i><i class="fa fa-close"> </i></button>
            </div>
            <ul class="menu">
                <li><a class="<?= (str_ends_with($_SERVER['REQUEST_URI'], "home")) ? 'active' : '' ?>"
                       href="<?= ROOT ?>/home">Home</a></li>
                <li><a class="<?= (str_contains($_SERVER['REQUEST_URI'], '/home/events')) ? 'active' : '' ?>"
                       href="<?= ROOT ?>/home/events">Events</a></li>
                <li><a class="<?= (str_contains($_SERVER['REQUEST_URI'], '/home/ads')) ? 'active' : '' ?>"
                       href="<?= ROOT ?>/home/ads">Advertisements</a></li>
                <li><a class="<?= (str_contains($_SERVER['REQUEST_URI'], '/home/about')) ? 'active' : '' ?>"
                       href="<?= ROOT ?>/home/about">About Us</a></li>
                <li>
                    <?php if (Auth::logged_in()): ?>
                        <a class="<?= (str_contains($_SERVER['REQUEST_URI'], '/' . strtolower($_SESSION['USER_DATA']->user_type))) ? 'active' : '' ?>"
                           href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>">Dashboard</a>
                    <?php endif; ?>
                </li>
                <li><a href="#">Services</a>
                    <ul class="submenu">
                        <li><a href="#">Web Dev</a></li>
                        <li><a href="#">Mobile App Dev</a></li>
                        <li><a href="#">Desktop App Dev</a></li>
                    </ul>
                </li>

                <!--                <li><a href="#">Portfolio</a></li>-->
                <!--                <li><a href="#">Blog</a>-->
                <!--                    <ul class="submenu">-->
                <!--                        <li><a href="#">Categories</a>-->
                <!--                            <ul class="submenu">-->
                <!--                                <li><a href="#">Wordpress</a></li>-->
                <!--                                <li><a href="#">Bootstrap</a></li>-->
                <!--                                <li><a href="#">Javascript</a></li>-->
                <!--                            </ul>-->
                <!--                        </li>-->
                <!--                        <li><a href="#">Series</a>-->
                <!--                            <ul class="submenu" style="--navbar-submenu-width: 250px">-->
                <!--                                <li><a href="#">Intro to Web Dev</a></li>-->
                <!--                                <li><a href="#">Data Structures &amp; Algo</a></li>-->
                <!--                                <li><a href="#">Deep Dive Into Cybersecurity</a></li>-->
                <!--                            </ul>-->
                <!--                        </li>-->
                <!--                        <li><a href="#">Tips &amp; Tricks</a></li>-->
                <!--                    </ul>-->
                <!--                </li>-->

            </ul>
        </div>
    </div>

    <!-- START OF Popup message box -->
    <div class="alert <?= $status ?> dis-flex gap-10 al-it-ce <?= (message()) ? 'show' : '' ?>" id="alert-window">
        <?php if ($status == "success"): ?>
            <svg class="feather feather-check-circle" fill="none" height="24" stroke="currentColor"
                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                <polyline points="22 4 12 14.01 9 11.01"/>
            </svg>
        <?php endif; ?>
        <?php if ($status == "neutral"): ?>
            <svg class="feather feather-alert-circle" fill="none" height="24" stroke="currentColor"
                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                 xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" x2="12" y1="8" y2="12"/>
                <line x1="12" x2="12.01" y1="16" y2="16"/>
            </svg>
        <?php endif; ?>
        <?php if ($status == "failed"): ?>
            <svg class="feather feather-x-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"
                 xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10"/>
                <line x1="15" x2="9" y1="9" y2="15"/>
                <line x1="9" x2="15" y1="9" y2="15"/>
            </svg>
        <?php endif; ?>

        <p class="flex-1">
            <?= $heading ?> : <?= message('', true); ?>
        </p>
    </div>
    <!-- END OF Popup message box -->

    <div class="dis-flex gap-20 al-it-ce txt-c-white pos-rel">
        <?php if (!Auth::logged_in()): ?>
            <a href="<?= ROOT ?>/login" id="login" class="btn-lay">Login</a>
            <a href="<?= ROOT ?>/signup" id="signup" class="btn-lay">Signup</a>
        <?php else: ?>
            <div class="">
                <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 448 512">
                    <path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/>
                </svg>
            </div>
            <div id="profile-btn" style="padding: 2px 5px">
                <img src="<?= ROOT . '/' . $_SESSION['USER_DATA']->image ?>" alt="profile-image"
                     style="width: 35px; border-radius: 50%" class="hover-pointer" onclick="toggleDrop()">
            </div>


            <div class="sub-menu-wrap" id="js-sub-menu">
                <div class="sub-menu">
                    <div class="user-info">
                        <div class="profile-header">
                            <img src="<?= ROOT . '/' . $_SESSION['USER_DATA']->image ?>" alt="profile-image">
                            <h3><?= ucfirst($_SESSION['USER_DATA']->fname) . " " . ucfirst($_SESSION['USER_DATA']->lname) ?></h3>
                        </div>
                        <?php if($_SESSION['USER_DATA']->verified): ?>
                        <div class="verified-status">
                            <img src="<?= ROOT ?>/assets/images/icons/status_symbols/verified.png" alt="verified-image">
                            <span>Verified</span>
                        </div>
                        <?php else: ?>
                            <a href="<?= ROOT ?>/mailer/email_verification">
                                <div class="verified-status verify">
                                    <img src="<?= ROOT ?>/assets/images/icons/status_symbols/not_verified.png" alt="verify-image">
                                    <span>Not Verified</span>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                    <hr>
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/profile/edit-profile"
                       class="sub-menu-link">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title/>
                            <circle cx="12" cy="8" r="4"/>
                            <path d="M20,19v1a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V19a6,6,0,0,1,6-6h4A6,6,0,0,1,20,19Z"/>
                        </svg>
                        <p>Edit Profile</p>
                        <span> &raquo; </span>
                    </a>

                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/profile/settings"
                       class="sub-menu-link">
                        <svg enable-background="new 0 0 32 32" id="Glyph" version="1.1" viewBox="0 0 32 32"
                             xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink"><path
                                    d="M27.526,18.036L27,17.732c-0.626-0.361-1-1.009-1-1.732s0.374-1.371,1-1.732l0.526-0.304  c1.436-0.83,1.927-2.662,1.098-4.098l-1-1.732c-0.827-1.433-2.666-1.925-4.098-1.098L23,7.339c-0.626,0.362-1.375,0.362-2,0  c-0.626-0.362-1-1.009-1-1.732V5c0-1.654-1.346-3-3-3h-2c-1.654,0-3,1.346-3,3v0.608c0,0.723-0.374,1.37-1,1.732  c-0.626,0.361-1.374,0.362-2,0L8.474,7.036C7.042,6.209,5.203,6.701,4.375,8.134l-1,1.732c-0.829,1.436-0.338,3.269,1.098,4.098  L5,14.268C5.626,14.629,6,15.277,6,16s-0.374,1.371-1,1.732l-0.526,0.304c-1.436,0.829-1.927,2.662-1.098,4.098l1,1.732  c0.828,1.433,2.667,1.925,4.098,1.098L9,24.661c0.626-0.363,1.374-0.361,2,0c0.626,0.362,1,1.009,1,1.732V27c0,1.654,1.346,3,3,3h2  c1.654,0,3-1.346,3-3v-0.608c0-0.723,0.374-1.37,1-1.732c0.625-0.361,1.374-0.362,2,0l0.526,0.304  c1.432,0.826,3.271,0.334,4.098-1.098l1-1.732C29.453,20.698,28.962,18.865,27.526,18.036z M16,21c-2.757,0-5-2.243-5-5s2.243-5,5-5  s5,2.243,5,5S18.757,21,16,21z"
                                    id="XMLID_273_"/></svg>
                        <p>Settings & Privacy</p>
                        <span> &raquo; </span>
                    </a>

                    <a href="<?= ROOT ?>/support" class="sub-menu-link">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-7v2h2v-2h-2zm2-1.645A3.502 3.502 0 0 0 12 6.5a3.501 3.501 0 0 0-3.433 2.813l1.962.393A1.5 1.5 0 1 1 12 11.5a1 1 0 0 0-1 1V14h2v-.645z"/>
                            </g>
                        </svg>
                        <p>Help & Support</p>
                        <span> &raquo; </span>
                    </a>

                    <a href="<?= ROOT ?>/logout" class="sub-menu-link">
                        <img src="<?= ROOT ?>/assets/images/icons/logout.png" alt="edit-profile">
                        <p>Logout</p>
                        <span> &raquo; </span>
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <script>
            let subMenu = document.getElementById('js-sub-menu')

            function toggleDrop() {
                subMenu.classList.toggle('open-menu')
            }

            let loader = document.getElementById('pre-loader')

            window.addEventListener('load', function () {
                loader.style.display = "none"
            })
        </script>

        <!--    </div>-->
</header>