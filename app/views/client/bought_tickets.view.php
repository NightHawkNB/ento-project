<html lang="en">
<script src="<?= ROOT ?>/assets/scripts/qrcode.min.js"></script>
<?php $this->view('includes/head', ['style' => ['admin/adverification.css']]) ?>
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

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Adjust the alpha value to change the opacity */
        z-index: 14; /* Make sure it's on top of everything */
        display: none; /* Initially hidden */
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
            <!--        current tickets-->
            <section id="current" class="wid-100 pad-10 dis-flex-col al-it-ce  hei-100">

                <h1 class="mar-10-0 txt-c-black txt-w-bold" style="font-size: 1.5rem"> Current Bought Tickets</h1>

                <div class="bor-rad-10 ju-co-ce wid-80 dis-flex gap-20 pad-20 wid-100 flex-wrap">

                    <?php
                    $currentDateTime = date('Y-m-d H:i:s');

                    if (!empty($bought_tickets)) {
                        foreach ($bought_tickets as $bought_ticket) {
//                            show($bought_ticket->start_time);
                            if ($currentDateTime < $bought_ticket->start_time) {
//                    show($bought_ticket);
                                $this->view('client/components/bought_ticket_current', (array)$bought_ticket);
                            }
                        }
                    } else {
                        echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No bought tickets to show</h3>";
                    }
                    ?>
                </div>

            </section>
            <!--        outdated tickets-->
            <section id="outdated" class="wid-100 pad-10 dis-flex-col al-it-ce hei-100">

                <h1 class="mar-10-0 txt-c-black txt-w-bold" style="font-size: 1.5rem"> Outdated Bought Tickets</h1>

                <div class="bor-rad-10 ju-co-ce wid-80 dis-flex gap-20 pad-20 hei-100 wid-100 flex-wrap">
                    <?php //= show($data)?>
                    <?php
                    $currentDateTime = date('Y-m-d H:i:s');
                    if (!empty($bought_tickets)) {
                        foreach ($bought_tickets as $bought_ticket) {
//                            show($currentDateTime);
//                            show($bought_ticket->start_time);
                            if ($currentDateTime > $bought_ticket->start_time) {
                                $this->view('client/components/bought_ticket_current', (array)$bought_ticket);
                            }
                        }
                    } else {
                        echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No bought tickets to show</h3>";
                    }
                    ?>
                </div>
            </section>
        </section>
    </main>
</div>
</body>
</html>

<script>

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

    // let qrImage = document.getElementById("qrImage");
    // const qr_container = document.querySelector(".qr_container");

    function close_popup(ticket_id, overlay) {
        const qrImage = document.getElementById(ticket_id)
        const qr_container = qrImage.parentElement.parentElement
        qr_container.classList.toggle("hide")
        document.getElementById(overlay).style.display = 'none';
    }

    function generateQR(ticket_id, container_ticket_id, hash, overlay) {
        const qrImage = document.getElementById(ticket_id);
        const qr_container = document.getElementById(container_ticket_id)

        let formattedText = ticket_id + "/" + hash

        qr_container.classList.toggle("hide");
        qrImage.innerHTML = "";
        new QRCode(qrImage, {
            text: formattedText,
            width: 150,
            height: 150
        });

        document.getElementById(overlay).style.display = 'block'; // Show the overlay
    }

    function downloadQR(ticket_id) {
        // Get the QR code image element
        const qrImage = document.getElementById(ticket_id);

        // Get the base64 encoded image data
        const imageData = qrImage.querySelector('img').src;

        // Create a temporary anchor element
        const downloadLink = document.createElement('a');

        // Set the href attribute to the base64 image data
        downloadLink.href = imageData;

        // Set the download attribute to specify the filename
        downloadLink.download = 'qr_code.png';

        // Trigger a click event on the anchor element to initiate download
        downloadLink.click();
    }


</script>