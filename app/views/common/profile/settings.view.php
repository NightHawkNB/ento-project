<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <style>
            .profile-page {
                background-color: var(--white);
                padding: 10px;
                border-radius: 10px;
                min-width: 850px;
                width: fit-content;
                height: fit-content;
                display: flex;
                justify-content: center;

                button {
                    width: fit-content;
                }

                form {
                    width: 100%;
                    max-width: 800px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    /*background-color: red;*/

                    input,
                    select,
                    option {
                        outline: none;
                        border: thin solid grey;
                        border-radius: 5px;
                        padding: 10px 10px 10px 15px;
                        min-width: 200px;
                        font-family: Poppins, sans-serif;
                    }

                    input::placeholder {
                        color: gray;
                    }

                    input:disabled {
                        background-color: var(--white-link);
                        border: none;
                        text-align: center;
                        letter-spacing: 2px;
                        font-weight: bold;
                    }

                    div.p-img {
                        width: fit-content;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        flex-direction: column;

                        img {
                            object-fit: cover;
                            width: 200px;
                            aspect-ratio: 1/1;
                        }

                        label {
                            right: -10;
                            bottom: -10;
                            width: fit-content;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            position: absolute;
                            border-radius: 5px;
                            padding: 10px;
                            background-color: var(--dark-grey);

                            &:hover {
                                cursor: pointer;
                            }
                        }
                    }


                    div.p-i-container {
                        display: flex;
                        gap: 10px;

                        div {
                            display: flex;
                            flex-direction: column;
                            width: 100%;

                            label {
                                color: var(--font-primary);
                                font-weight: bold;
                            }
                        }
                    }


                }

            }

            /* ################################  Slider Styles  ############################## */

            button.filter-button {
                border: none;
                cursor: pointer;
                background-color: transparent;
                outline: none;
            }

            nav.amazing-tabs {
                /*background-color: var(--white);*/
                border-radius: 2.5rem;
                user-select: none;
                padding: 1rem 0;
            }

            ul.filter-tabs {
                list-style-type: none;
                display: flex;
            }

            ul.main-tabs li {
                display: inline-flex;
                position: relative;
                padding: 1.5rem;
                z-index: 1;
            }

            .filters-container {
                overflow: hidden;
                padding: 0 3rem;
                transition: max-height 0.4s ease-in-out;
                max-height: var(--filters-container-height);
            }

            .filters-wrapper {
                position: relative;
                transition: opacity 0.2s ease-in-out;
                opacity: var(--filters-wrapper-opacity);
            }

            .filter-tabs {
                border-radius: 1rem;
                padding: 0.3rem;
                overflow: hidden;
                background-color: #c7b2f1;
            }

            .filter-tabs li {
                position: relative;
                z-index: 1;
                display: flex;
                flex: 1 0 33.33%;
            }

            .filter-button {
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 0.8rem;
                flex-grow: 1;
                height: 2rem;
                padding: 0 1.5rem;
                color: black;
                font-family: "Open Sans", sans-serif;
                font-weight: 600;
                font-size: 1.4rem;
            }

            .filter-button.filter-active {
                transition: color 0.4s ease-in-out;
                color: #320249;
            }

            .filter-slider {
                pointer-events: none;
                position: absolute;
                padding: 0.3rem;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 0;
            }

            .filter-slider-rect {
                height: 2rem;
                width: 50%;
                border-radius: 0.8rem;
                background-color: var(--white);
                box-shadow: 0 0.1rem 1rem -0.4rem rgba(0, 0, 0, 0.12);
                transition: transform 0.4s ease-in-out;
                transform: translateX(var(--translate-filters-slider));
            }
        </style>

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

                <div class="">
                    <div class="" id="notification-div">
                        <h2 style="color: white">Change Notification Preferences</h2>

                        <form method="post" class="dis-flex-col al-it-ce gap-20">
                            <div class="dis-flex gap-10">
                                <label for="setting-1" style="text-align: center">Event Notifications</label>
                                <label class="switch">
                                    <input type="checkbox" name="setting-1">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="dis-flex gap-10">
                                <label for="setting-2" style="text-align: center">Request Notifications</label>
                                <label class="switch">
                                    <input type="checkbox" name="setting-2">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="dis-flex gap-10">
                                <label for="setting-3" style="text-align: center">Reservation Reminders</label>
                                <label class="switch">
                                    <input type="checkbox" name="setting-3">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <button type="submit" class="glass-btn">Save changes</button>
                        </form>
                    </div>

                    <div class="" id="password-div">
                        <form method="post" class="wid-50">

                            <h2>Change your Password</h2>

                            <div class="profile-input">
                                <label for="inputPasswordCurrent">Current password</label>
                                <input type="password" class="form-control" id="inputPasswordCurrent">
                            </div>
                            <div class="profile-input">
                                <label for="inputPasswordNew">New password</label>
                                <input type="password" class="form-control" id="inputPasswordNew">
                            </div>
                            <div class="profile-input">
                                <label for="inputPasswordNew2">Verify password</label>
                                <input type="password" class="form-control" id="inputPasswordNew2">
                            </div>

                            <div class="wid-100 dis-flex ju-co-ce">
                                <button type="submit" class="glass-btn">Save changes</button>
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

            </section>
        </main>
    </div>
</body>
</html>