<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <style>


        :root {
            --background-color: #bbdefb;
            --blue-50: #e3f2fd;
            --blue-100: #bbdefb;
            --blue-A700: #2962ff;
            --green-50: #e8f5e9;
            --green-100: #c8e6c9;
            --green-A700: #00c853;
            --purple-50: #f3e5f5;
            --purple-100: #e1bee7;
            --purple-A700: #aa00ff;
            --orange-50: #fff3e0;
            --orange-100: #ffe0b2;
            --orange-A700: #ff6d00;
            --orange-700: #f57c00;
            --grey-900: #212121;
            --white: #ffffff;
            --round-button-active-color: #212121;
            --translate-main-slider: 100%;
            --main-slider-color: #e3f2fd;
            --translate-filters-slider: 0;
            --filters-container-height: 3.8rem;
            --filters-wrapper-opacity: 1;
        }

    

        button {
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


        .avatar img {
            height: 4rem;
            width: 4rem;
            border-radius: 50%;
            pointer-events: none;
        }

        .avatar img {
            object-fit: cover;
        }


        .round-button svg {
            pointer-events: none;
            height: 2.8rem;
            width: 2.8rem;
            transform: translate(0, 0);
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
            width: 33.33%;
            border-radius: 0.8rem;
            background-color: var(--white);
            box-shadow: 0 0.1rem 1rem -0.4rem rgba(0, 0, 0, 0.12);
            transition: transform 0.4s ease-in-out;
            transform: translateX(var(--translate-filters-slider));
        }


    </style>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 dis-flex">
            <div class="glass-bg mar-10 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5" style="justify-content:stretch; align-items:stretch">

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

                    <?php foreach($ads as $ad){
                        $this->view('admin/components/ad',(array)$ad);
                    }
                    ?>

                </div>

                <div id="bandsSection" class="ad-verification-section flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow:auto; padding-right: 10px">

                    <?php foreach($ads as $ad){
                        $this->view('admin/components/ad',(array)$ad);
                    }
                    ?>

                </div>

                <div id="venuesSection" class="ad-verification-section flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="max-height: 60vh; overflow:auto; padding-right: 10px">

                    <?php foreach($ads as $ad){
                        $this->view('admin/components/ad',(array)$ad);
                    }
                    ?>

                </div>


            </div >
        </section>

        <script>


            const handleActiveTab = (tabs, event, className) => {
                tabs.forEach((tab) => {
                    tab.classList.remove(className);
                });

                if (!event.target.classList.contains(className)) {
                    event.target.classList.add(className);
                }
            };



            const filterTabs = document.querySelector(".filter-tabs");
            const filterButtons = document.querySelectorAll(".filter-button");

            filterTabs.addEventListener("click", (event) => {
                const root = document.documentElement;
                const targetTranslateValue = event.target.dataset.translateValue;

                if (event.target.classList.contains("filter-button")) {
                    root.style.setProperty("--translate-filters-slider", targetTranslateValue);
                    handleActiveTab(filterButtons, event, "filter-active");
                }
            });



        </script>
    </main>
</div>
</body>
</html>
