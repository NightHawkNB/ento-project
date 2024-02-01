<html lang="en">
<?php $this->view('includes/head') ?>
<body>

<?php if(!Auth::is_client() || !Auth::is_admin() || !Auth::is_cca()): ?>
    <script defer>
        const calendar_events = <?= json_encode($calendar_events) ?>;
        const calendar_reservations = <?= json_encode($calendar_reservations) ?>;
        const personal_schedule = <?= json_encode($personal_schedule) ?>;
        const user_type = "<?= $_SESSION['USER_DATA']->user_type ?>";
    </script>

    <script src="<?= ROOT ?>/assets/scripts/calendar.js" defer></script>
<?php endif; ?>

<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <style>
            .chart-container {
                padding: 20px;
                background-color: white;
                width: 100%;
                display: flex;
                gap: 20px;
            }

            .chart-container .chart {
                width: 300px;
                height: 400px;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <section class="dis-flex-col al-it-ba wid-100 pad-10 gap-10">

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