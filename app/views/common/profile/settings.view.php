<html lang="en">
<?php $this->view('includes/head', ['style' => ['pages/profile/settings.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">

        <section class="slide-container">

            <div class="wid-100 dis-flex ju-co-ce pad-10-20 gap-20" style="background-color: rgba(147, 112, 219, 0.7)">
                <nav class="amazing-tabs" style="min-width: 200px">
                    <div class="filters-container">
                        <div class="filters-wrapper">
                            <ul class="filter-tabs">
                                <li>
                                    <button class="filter-button filter-active" data-translate-value="0">
                                        Notification
                                    </button>
                                </li>
                                <li>
                                    <button class="filter-button" data-translate-value="100%">
                                        Password
                                    </button>
                                </li>
                            </ul>
                            <div class="filter-slider" aria-hidden="true">
                                <div class="filter-slider-rect">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="section-container">
                <div class="content-section" id="notification-div">
                    <h2>Change Notification Preferences</h2>

                    <form method="post" class="">
                        <div class="">
                            <label for="setting-1" style="text-align: center">Event Notifications</label>
                            <label class="switch">
                                <input type="checkbox" name="setting-1">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="">
                            <label for="setting-2" style="text-align: center">Request Notifications</label>
                            <label class="switch">
                                <input type="checkbox" name="setting-2">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="">
                            <label for="setting-3" style="text-align: center">Reservation Reminders</label>
                            <label class="switch">
                                <input type="checkbox" name="setting-3">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <button type="submit" class="button-s2">Save changes</button>
                    </form>
                </div>

                <div class="content-section password-div" id="password-div">
                    <form method="post" action="<?= ROOT.'/'.$user->user_type ?>/profile/settings/password">

                        <h2>Change your Password</h2>

                        <div class="">
                            <label for="inputPasswordCurrent">Current password</label>
                            <input type="password" class="form-control" id="inputPasswordCurrent" name="inputPasswordCurrent">
                        </div>

                        <div class="group password">
                            <div class="input-box password-field">
                                <label for="password">Password</label>
                                <input id="password" placeholder="Enter a strong password" onkeyup="trigger_password()"
                                       type="password" name="password" required>
                                <span class="show-btn show">
                                    <img>
                                </span>
                            </div>

                            <!-- Password Strength Indicator -->
                            <div class="group">
                                <div class="ps-indicator-container">
                                    <div class="ps-indicator">
                                        <span class="weak"></span>
                                        <span class="medium"></span>
                                        <span class="strong"></span>
                                    </div>
                                    <span class="ps-text"></span>
                                </div>
                            </div>

                            <div class="input-box password-field">
                                <label for="confirmPass">Confirm Password</label>
                                <input id="confirmPass" placeholder="Re-enter the password" type="password"
                                       name="confirmPass" required>
                                <span class="show-btn">SHOW</span>
                            </div>
                        </div>

                        <div class="" style="justify-content: center">
                            <button type="submit" class="button-s2">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>

            <script defer>

                // ##################################### Slider Script ###############################################
                document.addEventListener("DOMContentLoaded", function () {
                    const filterTabs = document.querySelector(".filter-tabs");
                    const filterButtons = document.querySelectorAll(".filter-button");
                    const adSections = {
                        notification: document.getElementById('notification-div'),
                        password: document.getElementById('password-div'),
                    };

                    // Initial setup to select the "Available" tab
                    const initialTab = filterButtons[0]; // Select the first button (Available)
                    initialTab.classList.add("filter-active");

                    const root = document.documentElement;
                    const targetTranslateValue = initialTab.dataset.translateValue;
                    root.style.setProperty("--translate-filters-slider", targetTranslateValue);

                    // Function to handle active tab
                    const handleActiveTab = (targetTab) => {
                        filterButtons.forEach((tab) => {
                            tab.classList.remove("filter-active");
                        });

                        targetTab.classList.add("filter-active");

                        // Show the corresponding ad section and hide others
                        const selectedCategory = targetTab.innerText.toLowerCase();
                        for (const category in adSections) {
                            if (category === selectedCategory) {
                                adSections[category].style.display = 'flex'; // Show selected section
                            } else {
                                adSections[category].style.display = 'none'; // Hide other sections
                            }
                        }
                    };

                    // Event listener for filter tabs
                    filterTabs.addEventListener("click", (event) => {
                        if (event.target.classList.contains("filter-button")) {
                            const targetTranslateValue = event.target.dataset.translateValue;
                            root.style.setProperty("--translate-filters-slider", targetTranslateValue);
                            handleActiveTab(event.target)
                        }
                    })

                    // Initially hide band and venue sections
                    adSections.password.style.display = 'none';
                })
            </script>

            <!-- Importing the password strength checking script -->
            <script src="<?= ROOT ?>/assets/scripts/components/password_strength.js" defer></script>

        </section>
    </main>
</div>
</body>
</html>