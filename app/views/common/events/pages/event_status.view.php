<html lang="en">
<?php $this->view('includes/head', ['style' => ['pages/event_status.css', 'components/progress_bar.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="dis-flex-col al-it-ba wid-100 pad-10 gap-10 event_status">

            <div class="event-status-container">

                <div style="text-align: center" class="progress-container-main">
                    <div class="progress-container">
                        <?php $progress_count = 3; ?>
                        <div class="progress" id="progress" style="width: <?= $progress_count * 20 ?>%"></div>
                        <div class="circle active">
                            <span class="label">General Details</span>
                        </div>
                        <div class="circle <?= (empty($something)) ? 'active' : '' ?>">
                            <span class="label">Venue</span>
                            <p>2</p>
                        </div>
                        <div class="circle <?= (empty($something)) ? 'active' : '' ?>">
                            <span class="label">Bands</span>
                            <p>3</p>
                        </div>
                        <div class="circle <?= (empty($something)) ? 'active' : '' ?>">
                            <span class="label">Singers</span>
                            <p>4</p>
                        </div>
                        <div class="circle <?= (!empty($something)) ? 'active' : '' ?>">
                            <span class="label">Ticketing Plan</span>
                            <p>5</p>
                        </div>
                        <div class="circle <?= (!empty($something)) ? 'active' : '' ?>">
                            <span class="label">Confirmation</span>
                            <p>6</p>
                        </div>
                    </div>

                </div>

                <div class="participant-container">
                    <div class="participants">
                        <h2>Singers</h2>
                        <p>singer2</p>
                        <p>singer3</p>
                    </div>

                    <div class="temp-div dis-flex gap-10">
                        <!-- Band Part -->
                        <div class="participants band">
                            <h2>Band</h2>
                            <div>
                                <img class="es-image"
                                     src="<?= ($custom->band) ? ROOT . '/assets/images/bands/general.png' : ($reservations['band'] ? ROOT . $band->image : ROOT . '/assets/images/bands/general.png') ?>"
                                     alt="band_image">
                                <div class="es-content">

                                    <?php
                                    if (!$custom->band && $reservations['band']) {
                                        switch ($band->status) {
                                            case 'Pending':
                                                $band_color = 'var(--status-pending-bg)';
                                                break;

                                            case 'Accepted':
                                                $band_color = 'var(--status-approve-bg)';
                                                break;

                                            case 'Denied':
                                                $band_color = 'var(--status-error-bg)';
                                                break;

                                            default:
                                                $band_color = 'var(--status-unknown-bg)';
                                                break;
                                        }
                                    } else {
                                        $band_color = 'var(--status-unknown-bg)';
                                    }
                                    ?>

                                    <div class="es-status">
                                        <p> Request Status : </p>
                                        <span style="background-color: <?= $band_color ?>"><?= ($custom->band) ? 'Unknown' : (($reservations['band']) ? $band->status : 'Not Selected') ?></span>
                                    </div>

                                    <div class="es-title">
                                        <h3>Name : </h3>
                                        <span><?= (!$reservations['band'] && $custom->band) ? $band : (($reservations['band'] && !$custom->band) ? $band->name : "Not Selected") ?></span>
                                    </div>

                                    <div class="es-buttons">

                                        <button class="button-s2 es-button main-button"
                                                data-req_id="<?= ($custom->band) ? 'NULL' : ($reservations['band'] ? $band->req_id : 'NULL') ?>"
                                                data-state="<?= ($custom->band) ? 'custom' : ($reservations['band'] ? 'selected' : 'choose') ?>"
                                                data-type="band"
                                                type="button" <?= ($event->time_left < 7) ? 'disabled' : '' ?> >
                                            <svg class="feather feather-x" fill="none" stroke="currentColor"
                                                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                 viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                <line x1="18" x2="6" y1="6" y2="18"/>
                                                <line x1="6" x2="18" y1="6" y2="18"/>
                                            </svg>
                                            <span><?= ($custom->band) ? 'Remove' : ($reservations['band'] ? 'Cancel' : 'Add Band') ?></span>
                                        </button>

                                        <button class="button-s2 es-button"
                                                type="button" <?= ($custom->band) ? 'disabled' : ($reservations['band'] ? '' : 'disabled') ?> >
                                            <svg class="feather feather-phone" fill="none" stroke="currentColor"
                                                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                 viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                            </svg>
                                            <span>Call</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Venue Part -->
                        <div class="participants venue">
                            <h2>Venue</h2>
                            <div>
                                <img class="es-image"
                                     src="<?= ($custom->venue) ? ROOT . '/assets/images/bands/general.png' : ($reservations['venue'] ? ROOT . $venue->image : ROOT . '/assets/images/bands/general.png') ?>"
                                     alt="venue_image">
                                <?php
                                if (!$custom->venue && $reservations['venue']) {
                                    switch ($venue->status) {
                                        case 'Pending':
                                            $venue_color = 'var(--status-pending-bg)';
                                            break;

                                        case 'Accepted':
                                            $venue_color = 'var(--status-approve-bg)';
                                            break;

                                        case 'Denied':
                                            $venue_color = 'var(--status-error-bg)';
                                            break;

                                        default:
                                            $venue_color = 'var(--status-unknown-bg)';
                                            break;
                                    }
                                } else {
                                    $venue_color = 'var(--status-unknown-bg)';
                                }
                                ?>
                                <div class="es-content">
                                    <div class="es-status">
                                        <p> Request Status : </p>
                                        <span style="background-color: <?= $venue_color ?>"><?= ($custom->venue) ? 'Unknown' : (($reservations['venue'] != 0) ? $venue->status : 'Not Selected') ?></span>
                                    </div>

                                    <div class="es-title">
                                        <h3>Name : </h3>
                                        <span><?= (!$reservations['venue'] && $custom->venue) ? $venue : (($reservations['venue'] && !$custom->venue) ? $venue->name : "Not Selected") ?></span>
                                    </div>

                                    <div class="es-buttons">
                                        <button class="button-s2 es-button main-button"
                                                data-state="<?= ($custom->venue) ? 'custom' : ($reservations['venue'] ? 'selected' : 'choose') ?>"
                                                data-req_id="<?= (!$custom->venue) ? ($reservations['venue'] ? $venue->req_id : 'NULL') : 'NULL' ?>"
                                                data-type="venue"
                                                type="button" <?= ($event->time_left < 7) ? 'disabled' : '' ?> >
                                            <svg class="feather feather-x" fill="none" stroke="currentColor"
                                                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                 viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                <line x1="18" x2="6" y1="6" y2="18"/>
                                                <line x1="6" x2="18" y1="6" y2="18"/>
                                            </svg>
                                            <span><?= ($custom->venue) ? 'Remove' : ($reservations['venue'] ? 'Cancel' : 'Add Venue') ?></span>
                                        </button>
                                        <button class="button-s2 es-button"
                                                type="button" <?= ($custom->venue) ? 'disabled' : ($reservations['venue'] ? '' : 'disabled') ?> >
                                            <svg class="feather feather-phone" fill="none" stroke="currentColor"
                                                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                 viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                            </svg>
                                            <span>Call</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div style="width: 100%">
                    <!--                    --><?php //= show($data) ?>
                </div>

            </div>

        </section>

    </main>


    <div class="es-overlay"></div>

    <!--  Venue selection popup  -->
    <div class="venue-popup popup">
        <!--        <input type="text" name="custom_band_name" id="custom_band_name" placeholder="Enter the name of the band ... ">-->
        <div class="dis-flex" style="justify-content: flex-end">
            <button type="button" onclick="togglePopup('venue', false)">&cross;</button>
        </div>

        <nav class="amazing-tabs">
            <div class="filters-container">
                <div class="filters-wrapper">
                    <ul class="filter-tabs">
                        <li>
                            <button class="filter-button filter-active" data-translate-value="0">
                                Available
                            </button>
                        </li>
                        <li>
                            <button class="filter-button" data-translate-value="100%">
                                Custom
                            </button>
                        </li>
                    </ul>
                    <div class="filter-slider" aria-hidden="true">
                        <div class="filter-slider-rect">&nbsp;</div>
                    </div>
                </div>
            </div>
        </nav>

        <div id="availableSection" class="es-popup-content">

            <?php
            if(!empty($venue_set)) {
                foreach ($venue_set as $single_venue) {
                    $this->view('common/events/components/venue_select', (array)$single_venue);
                };
            } else {
                echo "No Venues to Display";
            }
            ?>

        </div>

        <div id="customSection" class="es-popup-content">

            <div class="title">Add custom venue details</div>
            <input type="text" name="venue_name" id="custom_venue_input" placeholder="Enter the name of the venue ... ">
            <div class="button-container">
                <button type="button" onclick="select_custom_venue()" class="button-s2">Add Custom Venue</button>
            </div>

        </div>

    </div>


    <!--  Band selection popup  -->
    <div class="band-popup popup open-popup">
        <!--        <input type="text" name="custom_band_name" id="custom_band_name" placeholder="Enter the name of the band ... ">-->
        <div class="dis-flex" style="justify-content: flex-end">
            <button type="button" onclick="togglePopup('band', false)">&cross;</button>
        </div>

        <nav class="amazing-tabs">
            <div class="filters-container">
                <div class="filters-wrapper">
                    <ul class="filter-tabs">
                        <li>
                            <button class="filter-button filter-active" data-translate-value="0">
                                Available
                            </button>
                        </li>
                        <li>
                            <button class="filter-button" data-translate-value="100%">
                                Custom
                            </button>
                        </li>
                    </ul>
                    <div class="filter-slider" aria-hidden="true">
                        <div class="filter-slider-rect">&nbsp;</div>
                    </div>
                </div>
            </div>
        </nav>

        <div id="availableSection2" class="es-popup-content">

            <?php
            if(!empty($band_set)) {
                foreach ($band_set as $single_band) {
                    $this->view('common/events/components/band_select', (array)$single_band);
                };
            } else {
                echo "No Bands to Display";
            }
            ?>

        </div>

        <div id="customSection2" class="es-popup-content">

            <div class="title">Add custom venue details</div>
            <input type="text" name="venue_name" id="custom_venue_input" placeholder="Enter the name of the venue ... ">
            <div class="button-container">
                <button type="button" onclick="select_custom_venue()" class="button-s2">Add Custom Venue</button>
            </div>
        </div>
    </div>


    <script>
        const nodes = document.querySelectorAll('.circle')
        const svg = `<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: mediumpurple"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>`
        nodes.forEach(node => {
            if (node.classList.contains('active')) {
                node.insertAdjacentHTML('beforeend', svg)
                const para = node.querySelector('p')
                if (para) para.remove()
            }
        })


        const main_buttons = document.querySelectorAll('.es-button.main-button')
        main_buttons.forEach(button => {
            if (button.dataset.state === 'selected') button.addEventListener('click', () => cancelRR(button))
            else if (button.dataset.state === 'choose') button.addEventListener('click', () => togglePopup(button.dataset.type))
            else button.addEventListener('click', () => cancelRR(button))
        })

        function cancelRR(element) {


            let req_id = element.dataset.req_id
            let type = element.dataset.type

            console.log(element, req_id)

            // Confirming before deleting the Reservation Request
            const confirmation = confirm('Are you sure you want to delete this request?')
            if (confirmation) {

                let event_id = '<?= $event->event_id ?>'

                let data

                if(element.dataset.state === "custom") {
                    data = {event_id, type}
                } else {
                    data = {req_id, event_id, type}
                }

                fetch(`/ento-project/public/eventm/cancel_request/${req_id}`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json; charset=utf-8"
                    },
                    body: JSON.stringify(data)
                }).then(res => {
                    // console.log(res)
                    return res.text()
                }).then(data => {
                    // Shows the data printed by the targeted php file.
                    // (stopped printing all data in php file by using die command)
                    console.log(data)
                    if (data === 'success') {
                        location.reload()
                        element.innerHTML = `<span>Choose ${type}</span>`;
                        const image = element.parentElement.parentElement.parentElement.querySelector('img')
                        const status = element.parentElement.parentElement.querySelector('.es-status span')

                        if (type === 'venue') image.src = '<?=  ROOT . '/assets/images/venues/venue.png' ?>'
                        else if (type === 'band') image.src = '<?=  ROOT . '/assets/images/bands/general.png' ?>'

                        status.style.backgroundColor = `var(--status-unknown-bg)`
                        status.textContent = 'Unknown'

                        console.log(element.onclick)

                        // Removing the current onclick event
                        element.removeEventListener('click', () => cancelRR(element))
                        element.addEventListener('click', () => togglePopup(element.dataset.type))

                        console.log(element.onclick)
                    } else {
                        alert("Error occurred. Try Again later or Contact Customer Care Agent")
                    }

                    console.log(data)
                })

                console.log('User confirmed');
            } else {
                console.log('User canceled');
            }
        }

        function togglePopup(type, open = true) {

            let popup
            const overlay = document.querySelector('.es-overlay')

            switch (type) {
                case 'venue':
                    popup = document.querySelector('.venue-popup')
                    break

                case 'band':
                    popup = document.querySelector('.band-popup')
                    break

                case 'singer':
                    popup = document.querySelector('.singer-popup')
                    break

                default:
                    alert('Invalid Popup Type')
                    return
            }


            if (open) {
                popup.classList.add('open-popup')
                overlay.classList.remove('hide')
            } else {
                popup.classList.remove('open-popup')
                overlay.classList.add('hide')
            }

        }


        // ##################################### Slider Script for VENUE ###############################################
        document.addEventListener("DOMContentLoaded", function () {
            const filterTabs = document.querySelector(".filter-tabs");
            const filterButtons = document.querySelectorAll(".filter-button");
            const adSections = {
                available: document.getElementById('availableSection'),
                custom: document.getElementById('customSection'),
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

            // ##################################### Slider Script for BAND ###############################################
            document.addEventListener("DOMContentLoaded", function () {
                const filterTabs = document.querySelector(".filter-tabs");
                const filterButtons = document.querySelectorAll(".filter-button");
                const adSections = {
                    available: document.getElementById('availableSection'),
                    custom: document.getElementById('customSection'),
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
                adSections.custom.style.display = 'none';
            })

            // Event listener for filter tabs
            filterTabs.addEventListener("click", (event) => {
                if (event.target.classList.contains("filter-button")) {
                    const targetTranslateValue = event.target.dataset.translateValue;
                    root.style.setProperty("--translate-filters-slider", targetTranslateValue);
                    handleActiveTab(event.target)
                }
            })

            // Initially hide band and venue sections
            adSections.custom.style.display = 'none';
        })

        // ##################################### Selecting within the popup ###############################################
        function select_venue(element) {
            // send post with venue_id and event_id to update the event
            let venue_id = element.dataset.venueid
            let event_id = '<?= $event->event_id ?>'
            let sp_id = element.dataset.spid
            let ad_id = element.dataset.adid

            let data = {venue_id, event_id, sp_id, ad_id}

            fetch(`/ento-project/public/eventm/add_venue`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json; charset=utf-8"
                },
                body: JSON.stringify(data)
            }).then(res => {
                // console.log(res)
                return res.text()
            }).then(data => {
                // Shows the data printed by the targeted php file.
                // (stopped printing all data in php file by using die command)
                console.log(data)
                if (data === 'success') {
                    alert('Venue Added Successfully')
                    location.reload()
                } else {
                    alert("Error occurred. Try Again later or Contact Customer Care Agent")
                }

                console.log(data)
            })
        }

        function select_custom_venue() {
            let custom_venue = document.getElementById('custom_venue_input').value
            let event_id = '<?= $event->event_id ?>'

            let data = {custom_venue, event_id}

            fetch(`/ento-project/public/eventm/add_custom_venue`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json; charset=utf-8"
                },
                body: JSON.stringify(data)
            }).then(res => {
                // console.log(res)
                return res.text()
            }).then(data => {
                // Shows the data printed by the targeted php file.
                // (stopped printing all data in php file by using die command)
                console.log(data)
                if (data === 'success') {
                    alert('Venue Added Successfully')
                    location.reload()
                } else {
                    alert("Error occurred. Try Again later or Contact Customer Care Agent")
                }

                console.log(data)
            })
        }
    </script>


</div>
</body>
</html>