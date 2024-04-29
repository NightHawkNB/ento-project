<html lang="en">
<?php $this->view('includes/head', ['style' => ['pages/create_event.css', 'cca/dashboard.css']]) ?>
<body>

<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="dis-flex-col al-it-ba wid-100 pad-10 gap-10">
            <!--cards-->
            <div class="dis-grid-c3 wid-100 pad-10 gap-10 cards">
                <div class="card">
                    <div class="text">
                        <div class="numbers"><?= $count ?></div>
                        <div class="cardname">New Complaints</div>
                    </div>
                    <div class="iconbox">
                        <ion-icon name="alert-circle-outline"></ion-icon>
                    </div>
                </div>
                <div class=" card">
                    <div>
                        <div class="numbers"><?= $vcount ?></div>
                        <div class="cardname">New Users</div>
                    </div>
                    <div class="iconbox">
                        <ion-icon name="person-add-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div class="text">
                        <div class="numbers"><?= $venuecount ?></div>
                        <div class="cardname">New Venue</div>
                    </div>
                    <div class="iconbox">
                        <ion-icon name="location"></ion-icon>
                    </div>
                </div>
            </div>

            <!--chart-->
            <div class="dis-flex wid-100 pad-10 gap-10 charts">

                <div class="box">
                    <h1>Complaints Status</h1>
                    <div class="chartcontainer">
                        <canvas id="my-chart"></canvas>
                    </div>
                </div>
                <div class="box">
                    <h1>New Users</h1>
                    <canvas id="line-chart"></canvas>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const chartData = {
                    labels: ['Handled', 'Assist', 'Idle', 'Accepted'],
                    datasets: [{
                        label: 'Counts',
                        data: [<?php for ($x = 0; $x < 4; $x++) {
                            echo $complaints[$x]->complaints . ', ';
                        }?>],
                        backgroundColor: [
                            'rgba(255, 206, 86, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgb(255, 99, 132)',
                            'rgb(153, 102, 255)'
                        ],
                        borderColor: 'rgb(187,147,255)',
                        borderWidth: 1
                    }]
                };
                const myChart = document.getElementById('my-chart').getContext('2d');
                new Chart(myChart, {
                    type: "doughnut",
                    data: chartData
                });

                const today = new Date();
                const lastMonth = new Date(today.getFullYear(), today.getMonth() - 1, 1).toLocaleDateString(undefined, {month: 'long'});
                const twoMonthsAgo = new Date(today.getFullYear(), today.getMonth() - 2, 1).toLocaleDateString(undefined, {month: 'long'});
                const threeMonthsAgo = new Date(today.getFullYear(), today.getMonth() - 3, 1).toLocaleDateString(undefined, {month: 'long'});
                const labels = [threeMonthsAgo, twoMonthsAgo, lastMonth];
                const data = {
                    labels: labels,
                    datasets: [{
                        label: ['new'],
                        data: [<?= $uservreqs[0]->uservreqs?>,<?= $uservreqs[1]->uservreqs?>],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                };

                const ctx = document.getElementById('line-chart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: data,
                    options: {
                        scales: {
                            y: {
                                type: 'linear',
                                ticks: {
                                    stepSize: 1, // Sets the step size between ticks to 1
                                    precision: 0, // Sets the number of decimal places to 0
                                },
                            },
                        },
                    },
                });
            </script>

            <!--complaint list-->
            <div class="dis-flex wid-100 pad-10 gap-10 details ">
                <div class="extra">
                    <div class="cardheader">
                        <h2>Complaints</h2>
                        <a href="<?= ROOT ?>/cca/complaints/" class="btn-lay-2 hover-pointer btn-anima-hover chbtn">View
                            All</a>
                    </div>

                    <table>
                        <thead>
                        <tr>
                            <td>Complaint Status</td>
                            <td>Complaint Count</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($complaints as $complaint) {
                            if ($complaint->status == 'Accepted') {
                                echo "
                                    <tr>
                                        <td>$complaint->status</td>
                                        <td><span class = 'acc'>$complaint->complaints</span></td>
                                    </tr>
                                    ";
                            }
                            if ($complaint->status == 'Idle') {
                                echo "
                                    <tr>
                                        <td> $complaint->status</td>
                                        <td><span class = 'idl'>$complaint->complaints</span></td>
                                    </tr>
                                    ";
                            }
                            if ($complaint->status == 'Handled') {
                                echo "
                                    <tr>
                                        <td>$complaint->status</td>
                                        <td><span class = 'hand'>$complaint->complaints</span></td>
                                    </tr>
                                    ";
                            }
                            if ($complaint->status == 'Assist') {
                                echo "
                                    <tr>
                                        <td>$complaint->status</td>
                                        <td><span class = 'ass'>$complaint->complaints</span></td>
                                    </tr>
                                    ";
                            }
                            if ($complaint->status == 'null') {
                                echo "No complaints";
                            }
                        }
                        ?>
                        </tbody>

                    </table>

                </div>

                <!--New Users-->
                <div class="extra">

                    <div class="cardheader">
                        <h2>Users</h2>
                        <a href="<?= ROOT ?>/cca/verify/" class="btn-lay-2 hover-pointer btn-anima-hover chbtn">View
                            All</a>
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <td>User</td>
                            <td>Count</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($uservreqs as $uvr) {
                            if ($uvr->status == 'New') {
                                echo "
                                    <tr>
                                        <td>$uvr->status</td>
                                        <td><span class = 'hand'>$uvr->uservreqs</span></td>
                                    </tr>
                                    ";
                            }
                            if ($uvr->status == 'Verified') {
                                echo "
                                    <tr>
                                        <td>$uvr->status</td>
                                        <td><span class = 'acc'>$uvr->uservreqs</span></td>
                                    </tr>
                                    ";
                            }
                            if ($uvr->status == 'Declined') {
                                echo "
                                    <tr>
                                        <td>$uvr->status</td>
                                        <td><span class = 'idl'>$uvr->uservreqs</span></td>
                                    </tr>
                                    ";
                            }
                            if ($uvr->status == 'null') {
                                echo "No New Users";
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="extra">

                    <div class="cardheader">
                        <h2>Venues</h2>
                        <a href="<?= ROOT ?>/cca/venue/" class="btn-lay-2 hover-pointer btn-anima-hover">View All</a>
                    </div>
                    <table>
                        <thead>
                        <tr>
                            <td>Venue</td>
                            <td>Status</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($venuevreqs as $uvr) {
                            if ($uvr->status == 'New') {
                                echo "
                                    <tr>
                                        <td>$uvr->status</td>
                                        <td><span class = 'hand'>$uvr->venuevreqs</span></td>
                                    </tr>
                                    ";
                            }
                            if ($uvr->status == 'Verified') {
                                echo "
                                    <tr>
                                        <td>$uvr->status</td>
                                        <td><span class = 'acc'>$uvr->venuevreqs</span></td>
                                    </tr>
                                    ";
                            }
                            if ($uvr->status == 'Declined') {
                                echo "
                                    <tr>
                                        <td>$uvr->status</td>
                                        <td><span class = 'idl'>$uvr->venuevreqs</span></td>
                                    </tr>
                                    ";
                            }
                            if ($uvr->status == 'null') {
                                echo "No New Users";
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                //menu toggle
                let toggle = document.querySelector('.toggle');
                let navigation = document.querySelector('.navigation');
                let main = document.querySelector('.main');
                toggle.onclick = function () {
                    navigation.classList.toggle('active');
                    main.classList.toggle('active');
                }

                //add hovered class in selected listitem
                let list = document.querySelectorAll('.navigation li');

                function activelink() {
                    list.foreach((item) =>
                        item.classlist.remove('hovered'));
                    this.classlist.add('hovered');
                }

                list.forEach((item) =>
                    item.addEventlistner('mouseover', activelink));
            </script>

    </main>
</div>
</body>
</html>