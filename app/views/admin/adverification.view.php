<html lang="en">
<?php $this->view('includes/head',['style'=>'admin/adverification.css']) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>


    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 dis-flex wid-100">
            <div class="mar-10 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5" style="justify-content:stretch; align-items:stretch">

                <nav class="amazing-tabs">
                    <div class="filters-container">
                        <div class="filters-wrapper">
                            <ul class="filter-tabs">
                                <li>
                                    <button class="filter-button filter-active" data-translate-value="0">
                                        Singer
                                    </button>
                                </li>
                                <li>
                                    <button class="filter-button" data-translate-value="100%">
                                        Band
                                    </button>
                                </li>
                                <li>
                                    <button class="filter-button" data-translate-value="200%">
                                        Venue
                                    </button>
                                </li>
                            </ul>
                            <div class="filter-slider" aria-hidden="true">
                                <div class="filter-slider-rect">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                </nav>


                <div id="singersSection" class="ad-verification-section flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow:auto; padding-right: 10px">

                    <?php foreach($singerads as $ad){
                        $this->view('admin/components/ad',(array)$ad);
                    }
                    ?>

                </div>

                <div id="bandsSection" class="ad-verification-section flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow:auto; padding-right: 10px">

                    <?php foreach($bandads as $ad){
                        $this->view('admin/components/ad',(array)$ad);
                    }
                    ?>

                </div>

                <div id="venuesSection" class="ad-verification-section flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow:auto; padding-right: 10px">

                    <?php foreach($venueads as $ad){
                        $this->view('admin/components/ad',(array)$ad);
                    }
                    ?>

                </div>


            </div >
        </section>

        <script>

                document.addEventListener("DOMContentLoaded", function() {
                const filterTabs = document.querySelector(".filter-tabs");
                const filterButtons = document.querySelectorAll(".filter-button");
                const adSections = {
                singer: document.getElementById('singersSection'),
                band: document.getElementById('bandsSection'),
                venue: document.getElementById('venuesSection')
            };

                // Initial setup to select the "Singer" tab
                const initialTab = filterButtons[0]; // Select the first button (Singer)
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

                // Initially hide band and venue sections
                adSections.band.style.display = 'none';
                adSections.venue.style.display = 'none';
            });

        </script>
    </main>
</div>
</body>
</html>
