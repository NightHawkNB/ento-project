<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<script src="<?= ROOT ?>/assets/scripts/components/jspdf.umd.min.js"></script>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main" style="background-color: var(--white-link)">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <style>
            .chart-container {
                padding: 10px;
                /*background-color: white;*/
                width: 100%;
                display: flex;
                gap: 20px;
                flex-wrap: wrap;
            }

            .chart-container .chart {
                background-color: white;
                border-radius: 10px;
                padding: 20px;
                width: 300px;
                height: fit-content;
            }

            .widget-container {
                background-color: var(--white-link);
                padding: 10px;
                display: flex;
                gap: 10px;
                width: 100%;
            }

            .widget-container .widget {
                color: var(--font-primary);
                display: flex;
                /*flex-direction: column;*/
                align-items: center;
                gap: 10px;
                width: fit-content;
                max-height: 100px;
                height: 100%;
                /*height: 80px;*/
                border-radius: 10px;
                background-color: white;
                padding: 10px 20px;
                /*box-shadow: 0 2px 5px rgba(0,0,0,0.2);*/
            }

            /* SVG container inside the stat widget */
            .widget-container .widget > span {
                color: white;
                border-radius: 10px;
                padding: 5px;
                /*height: 60px;*/
                aspect-ratio: 1/1;
                width: fit-content;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 1.5rem;
            }
            .widget-container .widget > span > svg {
                height: 35px;
                aspect-ratio: 1/1;
            }


            /* Text field inside the stat widgets */
            .widget-container .widget > p {
                font-size: 0.9rem;
                /*letter-spacing: 1px;*/
                font-family: arial, serif;
            }

            /* Counter inside the stat widgets */
            .widget-container .widget > div {
                display: flex;
                justify-content: left;
            }
            .widget-container .widget > div span {
                font-size: 3rem;
                color: var(--font-primary);
                font-weight: bold
            }

            .table-container {
                width: 100%;
                height: fit-content;
                padding: 10px;
                border-radius: 5px;
                display: flex;
                flex-direction: column;
                gap: 2px;


                .table-row {
                    background-color: var(--white);
                    border-radius: 5px;
                    box-shadow: grey 1px 2px 3px;

                    width: 100%;
                    display: grid;
                    grid-template-columns: 60% 40%;
                    padding: 15px 10px;
                    /*border-bottom: thin solid darkgrey;*/

                    span {
                        border-right: 1px solid lightgray;
                        text-overflow: ellipsis;
                    }

                    p {
                        padding-left: 10px;
                    }

                    &.table-heading {
                        font-weight: bold;
                        border: none;
                        background-color: mediumpurple;
                        color: white;
                        /*border: thin solid darkgrey;*/
                        /*border-radius: 5px 5px 0 0;*/
                    }

                    &:not(.table-heading):hover {
                        background-color: ghostwhite;
                    }
                }
            }

        </style>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <section class="dis-flex-col al-it-ba wid-100 pad-10 gap-10">

            <div class="widget-container">


                <a href="<?= ROOT.'/'.strtolower($_SESSION['USER_DATA']->user_type).'/reservations/requests' ?>">
                    <div class="widget">
                    <span style="background-color: lightblue;">
                        <svg style="fill: dodgerblue" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560h-80v120H280v-120h-80v560Zm280-560q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                    </span>
                        <p>Reservation Requests</p>
                        <div>
                            <span><?= $stats->request_count ?? 0 ?></span>
                        </div>
                    </div>
                </a>

                <div class="widget">
                    <span style="background-color: lightgreen;">
                        <svg style="fill: forestgreen" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                    </span>
                    <p>Accepted Requests</p>
                    <div>
                        <span><?= $stats->accepted_request_count ?? 0 ?></span>
                    </div>
                </div>

                <div class="widget">
                    <span style="background-color: lightpink;">
                        <svg style="fill: red" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm280-590q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM200-200v-560 560Z"/></svg>
                    </span>
                    <p>Pending Requests</p>
                    <div>
                        <span><?= $stats->pending_request_count ?? 0 ?></span>
                    </div>
                </div>
            </div>

            <div class="chart-container">
                <div class="chart" style="width:600px">
                    <canvas id="barChart"></canvas>
                </div>

                <div class="chart">
                    <canvas id="chart2" width="300" height="300"></canvas>
                </div>
            </div>

            <div class="table-container">
                <h2 class="pb-10">Advertisements Stats</h2>
                <div class="table-row table-heading">
                    <span>Property</span>
                    <p>Value</p>
                </div>
                <div class="table-row">
                    <span>Active Advertisement Count</span>
                    <p><?= $stats->active_ad_count ?></p>
                </div>
                <div class="table-row">
                    <span>Pending Advertisement Count</span>
                    <p><?= $stats->pending_ad_count ?></p>
                </div>
                <div class="table-row">
                    <span>Total Advertisement Count</span>
                    <p><?= $stats->total_ad_count ?></p>
                </div>

            </div>

            <?php if($_SESSION['USER_DATA']->user_type == 'singer'): ?>
                <div class="table-container">
                    <h2 class="pb-10">Estimated Earnings</h2>
                    <div class="table-row table-heading">
                        <span>Property</span>
                        <p>Value</p>
                    </div>
                    <div class="table-row">
                        <span>User's Average Rate</span>
                        <p>LKR <?= number_format($rate, 2) ?></p>
                    </div>
                    <div class="table-row">
                        <span>Expected earning from the accepted reservations</span>
                        <p>LKR <?= number_format(($stats->accepted_request_count ?? 0) * $rate, 2) ?></p>
                    </div>
                    <div class="table-row">
                        <span>Earning from the completed reservations</span>
                        <p>LKR <?= number_format(($stats->request_count - ($stats->pending_request_count + $stats->accepted_request_count) ) * $rate, 2) ?></p>
                    </div>

                </div>
            <?php endif; ?>

            <button onclick="generatePDF()" class="button-s2">Save Report</button>

        </section>

    </main>
</div>
</body>
</html>

<!-- Script for generating the charts -->
<script>

    // ************** START of PDF Generation **************** //

    // Default export is a4 paper, portrait, using millimeters for units
    function generatePDF() {
        const { jsPDF } = window.jspdf;

// Create a new jsPDF instance
        const doc = new jsPDF();

// Get current date
        const currentDate = new Date().toISOString().slice(0, 10);

// Set initial y position
        let y = 10;

// Add report heading
        doc.setFontSize(16);
        doc.setFont("helvetica", "bold");


        // Set document properties
        const pageWidth = doc.internal.pageSize.getWidth();
        const pageHeight = doc.internal.pageSize.getHeight();

// Text to be centered
        let text = `Report    ${currentDate}`

// Calculate the width of the text
        let textWidth = doc.getStringUnitWidth(text) * doc.internal.getFontSize() / doc.internal.scaleFactor

// Calculate x position to center text
        let x = (pageWidth - textWidth) / 2

        doc.text(text, x, y)

        y += 30
        doc.setFontSize(12)

        // Add section heading
        doc.setFont("helvetica", "bold")
        doc.text("Advertisement Statistics", 10, y)

        y += 10


// Add table header row
        const headers = ["Property", "Value"]
        const colWidth = 100
        doc.setFillColor(200, 200, 200) // Set header background color
        doc.rect(10, y, colWidth, 10, 'F') // Draw header background
        doc.rect(10+colWidth, y, colWidth-10, 10, 'F') // Draw header background
        doc.setFont("helvetica", "bold")
        doc.text(headers[0], 12, y + 7)
        doc.text(headers[1], 112, y + 7)
        doc.setTextColor(0, 0, 0) // Reset text color
        y += 10

// Advertisements Stats
        const advertisementStats = [
            ["Active Advertisement Count", "<?php echo $stats->active_ad_count; ?>"],
            ["Pending Advertisement Count", "<?php echo $stats->pending_ad_count; ?>"],
            ["Total Advertisement Count", "<?php echo $stats->total_ad_count; ?>"]
        ];

// Add rows to the table
        doc.setFont("helvetica", "normal");
        for (let i = 0; i < advertisementStats.length; i++) {
            doc.rect(10, y, colWidth, 10); // Draw row border left
            doc.rect(10+colWidth, y, colWidth-10, 10); // Draw row border right
            doc.text(advertisementStats[i][0], 12, y + 7);
            doc.text(advertisementStats[i][1], 112, y + 7);
            y += 10;
        }

        y += 20;

// Estimated Earnings (if user type is singer)
        <?php if($_SESSION['USER_DATA']->user_type == 'singer'): ?>
        const earningsStats = [
            ["User's Average Rate", "LKR <?php echo number_format($rate, 2); ?>"],
            ["Expected earning from the accepted reservations", "LKR <?php echo number_format(($stats->accepted_request_count ?? 0) * $rate, 2); ?>"],
            ["Earning from the completed reservations", "LKR <?php echo number_format(($stats->request_count - ($stats->pending_request_count + $stats->accepted_request_count)) * $rate, 2); ?>"]
        ];

        // Add space between sections
        y += 10;

        // Add section heading
        doc.setFont("helvetica", "bold");
        doc.text("Estimated Earnings", 10, y);
        y += 10;

        doc.setFillColor(200, 200, 200); // Set header background color
        doc.rect(10, y, colWidth, 10, 'F'); // Draw header background
        doc.rect(10+colWidth, y, colWidth-10, 10, 'F'); // Draw header background
        doc.setFont("helvetica", "bold");
        doc.text(headers[0], 12, y + 7);
        doc.text(headers[1], 112, y + 7);
        doc.setTextColor(0, 0, 0); // Reset text color
        y += 10;

        // Add rows to the table
        doc.setFont("helvetica", "normal");
        for (let i = 0; i < earningsStats.length; i++) {
            doc.rect(10, y, colWidth, 10); // Draw row border left
            doc.rect(10+colWidth, y, colWidth-10, 10); // Draw row border right
            doc.text(earningsStats[i][0], 12, y + 7);
            doc.text(earningsStats[i][1], 112, y + 7);
            y += 10;
        }
        <?php endif; ?>

// Add user's name as the ending
        const userName = "<?php echo $_SESSION['USER_DATA']->fname . ' ' . $_SESSION['USER_DATA']->lname; ?>"
        doc.setFont("helvetica", "bold")
        y = pageHeight - 10
        text = `Prepared by: ${userName}`
        textWidth = doc.getStringUnitWidth(text) * doc.internal.getFontSize() / doc.internal.scaleFactor;
        x = (pageWidth - textWidth) - 10
        doc.text(text, x, y)

// Save the PDF
        doc.save('Stat_Report.pdf');

    }
    // ************** END of PDF Generation **************** //

    // ------------- START of Data modeling -------------- //

    let views_data = <?= $views ?> ?? [];

    // Define an array of size 12 to store view count for each month
    let view_month = Array.from({ length: 12 }, () => 0)
    let currentYear = new Date().getFullYear()


    // Iterate through each object in the data array
    views_data.forEach(record => {

        // Add the number of view counts to the relevant array index to get the views for each month
        if(record.year === currentYear) view_month[record.month] += record.count
    })


    // ------------- END of Data modeling -------------- //

    const barchart = document.getElementById('barChart');
    const chart2 = document.querySelector('#chart2')

    new Chart(barchart, {
        type: 'bar',
        data: {
            labels: [
                "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ],
            datasets: [{
                label: `View Count of ${currentYear}`,
                data: view_month,
                borderWidth: 1,
                backgroundColor: 'mediumpurple',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    })

    new Chart(chart2, {
        type: 'doughnut',
        data: {
            labels: [
                'View Count',
                'Request Count',
            ],
            datasets: [{
                label: 'Probability',
                data: [<?= $stats->view_count ?? 0 ?>, <?= $stats->request_count ?? 0 ?>],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                ],
                hoverOffset: 4
            }]
        }
    })
</script>