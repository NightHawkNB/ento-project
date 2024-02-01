<html lang="en">
<?php $this->view('includes/head') ?>
<body>

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
                display: flex;
                flex-direction: column;
                gap: 10px;
                width: 170px;
                height: 120px;
                border-radius: 10px;
                background-color: white;
                padding: 10px;
                /*box-shadow: 0 2px 5px rgba(0,0,0,0.2);*/
            }

            .widget-container .widget > span {
                color: white;
                border-radius: 15px;
                padding: 10px;
                height: 40px;
                aspect-ratio: 1/1;
                width: fit-content;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 1.5rem;
            }

            .widget-container .widget > div {
                display: flex;
                justify-content: left;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <section class="dis-flex-col al-it-ba wid-100 pad-10 gap-10">

            <div class="widget-container">
                <div class="widget">
                    <span style="background-color: lightblue;">
                        <svg style="fill: dodgerblue" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560h-80v120H280v-120h-80v560Zm280-560q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                    </span>
                    <p style="font-size: 0.7rem; letter-spacing: 1px; font-family: 'Century Gothic';">Reservation Requests</p>
                    <div>
                        <span style="font-size: 1.5rem; font-weight: bold"><?= $request_count ?? 0 ?></span>
                    </div>
                </div>

                <div class="widget">
                    <span style="background-color: lightgreen;">
                        <svg style="fill: forestgreen" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>                    </span>
                    <p style="font-size: 0.7rem; letter-spacing: 1px; font-family: 'Century Gothic';">Accepted Requests</p>
                    <div>
                        <span style="font-size: 1.5rem; font-weight: bold"><?= $accepted_request_count ?? 0 ?></span>
                    </div>
                </div>

                <div class="widget">
                    <span style="background-color: lightpink;">
                        <svg style="fill: red" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm280-590q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM200-200v-560 560Z"/></svg>
                    </span>
                    <p style="font-size: 0.7rem; letter-spacing: 1px; font-family: 'Century Gothic';">Pending Requests</p>
                    <div>
                        <span style="font-size: 1.5rem; font-weight: bold"><?= $pending_request_count ?? 0 ?></span>
                    </div>
                </div>
            </div>

            <div class="chart-container">
                <div class="chart">
                    <canvas id="barChart" width="300" height="300"></canvas>
                </div>

                <div class="chart">
                    <canvas id="chart2" width="300" height="300"></canvas>
                </div>
            </div>

        </section>

    </main>
</div>
</body>
</html>
<script>
    const barchart = document.getElementById('barChart');
    const chart2 = document.querySelector('#chart2')

    new Chart(barchart, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'No of Votes',
                data: [12, 19, 3, 5, 2, 3],
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
                data: [<?= $view_count ?? 0 ?>, <?= $request_count ?? 0 ?>],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                ],
                hoverOffset: 4
            }]
        }
    })
</script>