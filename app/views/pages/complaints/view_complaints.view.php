<html lang="en">
<?php $this->view('includes/head' ,['style'=>'admin/adverification.css']) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <?php if(Auth::logged_in()): ?>
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>
        <?php endif; ?>
        <section class="cols-10 pad-20 mar-bot-10">
            <div class="bg-trans dis-flex-col gap-20 bg-lightgray flex-1 pad-20">
                <div class="dis-flex-col bg-trans gap-10 pad-20 txt-ali-cen">
                <nav class="amazing-tabs">
                    <div class="filters-container">
                        <div class="filters-wrapper">
                            <ul class="filter-tabs">
                                <li>
                                    <button class="filter-button filter-active" data-translate-value="0">
                                        Accepted
                                    </button>
                                </li>
                                <li>
                                    <button class="filter-button" data-translate-value="100%">
                                        Idle
                                    </button>
                                </li>
                                <li>
                                    <button class="filter-button" data-translate-value="200%">
                                        Assists
                                    </button>
                                </li>
                               
                            </ul>
                            <div class="filter-slider" aria-hidden="true">
                                <div class="filter-slider-rect">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                </nav>
                    <div id="acceptedsection" class="complaint-section flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow:auto; padding-right: 10px">

                        <?php

                        if(!empty($acc)) {
                            foreach($acc as $complaint){
                                $this->view('pages/complaints/single', (array)$complaint);
                            }
                        } else {
                            echo "no complaints";
                        }


                        ?>

                    </div>

                    <div id="idleSection" class="complaint-section flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow:auto; padding-right: 10px">

                        <?php
                        if(!empty($idl)){
                            foreach ($idl as $complaint) {
                                $this->view('pages/complaints/single', (array)$complaint);
                            }
                        }else{
                            echo "no complaints";
                        }
                        ?>

                    </div>

                    <div id="assistSection" class="complaint-section flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow:auto; padding-right: 10px">

                        <?php
                        if(!empty($assi)){
                            foreach ($assi as $complaint) {
                                $this->view('pages/complaints/single', (array)$complaint);
                            }
                        }else{
                            echo "no complaints";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </section>
        <script>

                document.addEventListener("DOMContentLoaded", function() {
                const filterTabs = document.querySelector(".filter-tabs");
                const filterButtons = document.querySelectorAll(".filter-button");
                const adSections = {
                acc: document.getElementById('acceptedsection'),
                idl: document.getElementById('idleSection'),
                assi: document.getElementById('assistSection')
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
                adSections.idl.style.display = 'none';
                adSections.assi.style.display = 'none';
            });

        </script>
    </main>
</div>
</body>
</html>