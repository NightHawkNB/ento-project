<html lang="en">
<?php $this->view('includes/head', ['style' => ['client/reservations.css', 'admin/adverification.css']]) ?>
<style>
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
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="wid-100 pad-10 dis-flex-col al-it-ce">
            <!--////////////////////////////////////////////////////////////////////////////////////////////////-->
            <!-- toggle button-->

            <nav class="amazing-tabs">
                <div class="filters-container">
                    <div class="filters-wrapper">
                        <ul class="filter-tabs">
                            <li>
                                <button class="filter-button filter-active" style="font-weight:550; font-size:1.2rem;"
                                        data-translate-value="0">
                                    Current
                                </button>
                            </li>
                            <li>
                                <button class="filter-button" style="font-weight:550; font-size:1.2rem;"
                                        data-translate-value="100%">
                                    Outdated
                                </button>
                            </li>
                        </ul>
                        <div class="filter-slider" aria-hidden="true">
                            <div class="filter-slider-rect">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </nav>
            <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <!--             for pending reservations-->
            <!--current reservations-->
            <div id="current" class="reservation-section">
                <h1 class="mar-10-0 txt-c-black txt-w-bold" style="font-size: 1.5rem"> Denied Reservations</h1>

                <div class="res-container glass-bg">
                        <!--                        --><?php //= show($data)?>
                    <div class="reservation txt-w-bold" style="background-color: #c7b2f1; border-radius: 10px 10px 0 0">
                        <div>Service Provider</div>
                        <div>Data/Time</div>
                        <div>Location</div>
                        <div>Remaining Time</div>
                        <div>Action</div>
                    </div>
                    <?php
                    $currentDateTime = date('Y-m-d H:i:s');
                    $count = 0;
                    if (!empty($reservations)) {
                        foreach ($reservations as $reservation) {
                            $count += 1;
                            if ($currentDateTime < $reservation->start_time && $reservation->status === "Denied") {
                                $this->view('client/components/reservation_current', (array)$reservation);
                            }
                        }
                    } else {
                        echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No reservations to show</h3>";
                    }
                    ?>
                </div>
            </div>

            <!--out dated reservations-->

            <div id="outdated" class="reservation-section">
                <h1 class="mar-10-0 txt-c-black txt-w-bold" style="font-size: 1.5rem"> Denied Reservations</h1>

                <div class="res-container">
                    <?php
                    $currentDateTime = date('Y-m-d H:i:s');

                    if (!empty($reservations)) {
                        foreach ($reservations as $reservation) {
                            if ($currentDateTime > $reservation->start_time && $reservation->status === "Denied") {
                                $this->view('client/components/reservation_outdated', (array)$reservation);
                            }
                        }
                    } else {
                        echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No reservations to show</h3>";
                    }
                    ?>
                </div>
            </div>

        </section>


    </main>
</div>
</body>
</html>
<script>

    // rating popup calling function
    function openRatingPopUp(id) {
        let rating = document.getElementById('rating-' + id);
        if (!rating.classList.contains('active')) rating.classList.add('active')
        // rating.classList.add('overlay')
    }

    function closeRatingPopUp(id) {
        let rating = document.getElementById('rating-' + id);
        if (rating.classList.contains('active')) rating.classList.remove('active')
        // rating.classList.remove('overlay')
    }

    // to show comment when editing
    function showComment(id) {
        let form1 = document.getElementById('form-' + id)
        form1.style.display = 'flex'
    }

    <?=(!empty($content)) ? "showComment('$review_id')" : ''?>

    /////////////////////////////////////////////////////////////////////////////////////////////////

    // toggle button
    document.addEventListener("DOMContentLoaded", function () {
        const filterTabs = document.querySelector(".filter-tabs");
        const filterButtons = document.querySelectorAll(".filter-button");
        const adSections = {
            current: document.getElementById('current'),
            outdated: document.getElementById('outdated')
        };

        // Initial setup to select the "current" tab
        const initialTab = filterButtons[0]; // Select the first button (current)
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
                handleActiveTab(event.target);
            }
        });

        // Initially hide outdated section
        adSections.outdated.style.display = 'none';

    });

</script>