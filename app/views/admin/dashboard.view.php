<html lang="en">
<?php $this->view('includes/head') ?>

<body>

<style>

    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Ubuntu',sans-serif ;
    }

    :root{
        --purple: rgb(74, 44, 225);
        --white:#fff;
        --grey:#f5f5f5;
        --black1:#222;
        --black2:#999;
    }
    body{
        min-height: 100vh;
        overflow-x: hidden;
    }


    .navigation .active{
        width: 80px;
    }

    .navigation ul{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }

    .navigation ul li{
        position: relative;
        width: 200%;
        list-style: none;
        border-top-left-radius:30px ;
        border-bottom-left-radius: 30px;
    }

    .navigation ul li:hover{
        background: var(--white);
    }

    .navigation ul li:nth-child(1){
        margin-bottom: 40px;
        pointer-events: none;
    }

    .navigation ul li a{
        position: relative;
        display: block;
        width: 100%;
        display: flex;
        text-decoration: none;
        color: var(--white);
    }

    .navigation ul li:hover a{
        color: var(--purple);
    }

    .navigation ul li a .icon{
        position: relative;
        display: block;
        min-width: 60px;
        height: 60px;
        line-height: 70px;
        text-align: center;
    }

    .navigation ul li a .icon ion-icon{
        font-size: 1.75em;
    }

    .navigation ul li a .title{
        position: relative;
        display: block;
        padding: 0 10px;
        height: 60px;
        line-height: 60px;
        text-align: start;
        white-space: nowrap;
    }

    /*cursor outside*/
    .navigation ul li:hover a::before{
        content: '';
        position: absolute;
        right: 0;
        top: -50px;
        height: 50px;
        width: 50px;
        background: transparent;
        border-radius: 50%;
        box-shadow: 35px 35px 0 10px var(--white);
        pointer-events: none;
    }

    .navigation ul li:hover a::after{
        content: '';
        position: absolute;
        right: 0;
        bottom: -50px;
        height: 50px;
        width: 50px;
        background: transparent;
        border-radius: 50%;
        box-shadow: 35px -35px 0 10px var(--white);
        pointer-events: none;
    }


    .main .active{
        width: calc(100% - 80px);
        left: 80px;
    }


    .search label{
        position: relative;
        width: 100%;
    }

    .search label input{
        width: 100%;
        height: 40px;
        padding: 5px 20px;
        padding-left: 35px;
        border: 1px solid var(--black1);
        border-radius: 40px;
        font-size: 18px;
        outline: none;
    }

    .search label ion-icon{
        position: absolute;
        left: 10px;
        top: 0;
        font-size: 1.2em;
    }

    .user img{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .cardBox{
        position: relative;
        width: 100%;
        padding: 20px;
        display: grid;
        grid-gap: 20px;
        grid-template-columns: repeat(3,1fr);
    }

    .cardBox .card{
        width: 100%;
        position: relative;
        background: var(--white);
        padding: 30px;
        border-radius: 20px;
        display: flex;
        justify-content: space-between;
        cursor: pointer;
        box-shadow: 0 7px 25px rgba(0, 0 , 0, 0.08);
    }

    .cardBox .card .numbers{
        position: relative;
        display: block;
        font-size: 2.5em;
        font-weight: 400;
        color: var(--purple);
    }

    .cardBox .card .cardname{
        color: var(--black2);
        font-size: 1.1em;
        margin-top: 5px;
    }

    .cardBox .card .iconbox{
        position: relative;
        display: block;
        font-size: 2.5em;
        color: var(--black2);
    }

    .cardBox .card:hover{
        background: var(--purple-secondary);
    }

    .cardBox .card:hover .numbers,
    .cardBox .card:hover .cardname,
    .cardBox .card:hover .iconbox{
        color: var(--white);
    }



    .graphBox .box{
        position: relative;
        background: #fff;
        padding: 20px;
        width: 100%;
        box-shadow: 0 7px 25px rgba(0, 0 , 0, 0.08);
        border-radius: 20px;
    }

    .details .Complaints{
        position: relative;
        display: grid;
        min-height: 500px;
        background: var(--white);
        padding: 20px;
        box-shadow: 0 7px 25px rgba(0, 0 , 0, 0.08);
        border-radius: 20px;
    }

    .cardheader h2{
        font-weight: 600;
        color: var(--purple);
    }

    .details table{
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .details table thead td{
        font-weight: 600;
    }

    .details .newUsers table tr,
    .details .Complaints table tr{
        color: var(--black1);
        border-bottom: 1px solid rgba(0, 0 , 0, 0.8);
    }

    .details .newUsers table tr:last-child,
    .details .Complaints table tr:last-child{
        border-bottom: none;
    }

    .details .newUsers table tbody tr:hover,
    .details .Complaints table tbody tr:hover{
        background: var(--purple);
        color: var(--white);
    }

    .details .newUsers table tr td,
    .details .Complaints table tr td{
        padding: 10px;
    }

    .details .newUsers table tr td:last-child,
    .details .Complaints table tr td:last-child{
        text-align: end;
    }

    .details .newUsers table tr td:nth-child(2),
    .details .Complaints table tr td:nth-child(2){
        text-align: center;
    }

    .details .newUsers table tr td:nth-child(3),
    .details .Complaints table tr td:nth-child(3){
        text-align: center;
    }

    .userAcc-container{
        width: 500px;
        height:300px;
        background-color: var(--white);
        border-radius: 10px;
    }
</style>

<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class=" cols-10 dis-flex-col wid-100" >

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>

            <div class="cardBox">
                <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/ccareq">
                    <div class="card">
                        <div>
                            <div class="numbers"><?= $data['pending_ads'][0]->{'COUNT(*)'} ?></div>
                            <div class="cardname">Pending Assistant Requests</div>
                        </div>
                        <div class="iconbox">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                    </div>
                </a>
                <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/adverify">
                    <div class="card">
                        <div>
                            <div class="numbers"><?= $data['pending_assreq'][0]->{'COUNT(*)'} ?></div>
                            <div class="cardname">Pending Ads</div>
                        </div>
                        <div class="iconbox">
                            <i class="fa-brands fa-adversal"></i>
                        </div>
                    </div>
                </a>
                <a href="<?= ROOT ?>/home/events">
                    <div class="card">
                        <div>
                            <div class="numbers">8</div>
                            <div class="cardname">Upcoming Evenets</div>
                        </div>
                        <div class="iconbox">
                            <i class="fa-regular fa-calendar-check"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="dis-flex charts wid-100 ju-co-se gap-20" id="dash" style="margin: 0 20px">
                <div class="userAcc-container dis-flex ju-co-ce" style="background-color: white">
                    <canvas id="userTypeChart" width="600px" height="450px;" >

                    </canvas>
                </div>
                <div class="pad-10 bor-rad-10 dis-flex-col ju-co-ce al-it-ce" style="width: 350px;height:300px;background-color: white">
                    <canvas id="UserTypes" >

                    </canvas>
                </div>
                <div class="pad-10 bor-rad-10 dis-flex-col ju-co-ce al-it-ce" style="width: 400px;height:450px;background-color: white; margin-right: auto">
                    <div class="wid-100 dis-flex-col al-it-ce ju-co-ce" style="height:50px;font-weight: bolder;font-size: large;">
                        <p style="color: #5809ab;">Ad verifications</p>
                    </div>
                    <div class="wid-100 dis-flex-col al-it-ce ju-co-ce" style="height:50px;font-weight: bold;background-color: mediumpurple;font-size: large ">
                        <p style="color: white;">Pending </p>
                    </div>
                    <div class="dis-flex ju-co-ce al-it-ce wid-100">
                        <div class="dis-flex wid-50 ju-co-ce al-it-ce" style="height:50px;font-weight: bold;">
                            <p style="color: black;margin: 0;vertical-align: center;">Singer Ads</p>
                        </div>
                        <div class="dis-flex wid-50 ju-co-ce al-it-ce" style="height:50px;font-weight: bold;">
                            <p style="color: black;"><?= $data['pendingsinger'][0]->{'COUNT(ad_id)'};?></p>
                        </div>
                    </div>
                    <hr style="width: 100%;">
                    <div class="dis-flex ju-co-ce al-it-ce wid-100">
                        <div class="wid-50 dis-flex ju-co-ce al-it-ce " style="w:50px;font-weight: bold;">
                            <p style="color: black;">Band Ads</p>
                        </div>
                        <div class="dis-flex  wid-50 ju-co-ce al-it-ce" style="height:50px;font-weight: bold;">
                            <p style="color: black;"><?= $data['pendingband'][0]->{'COUNT(ad_id)'};?></p>
                        </div>
                    </div>
                    <hr style="width: 100%;">
                    <div class="dis-flex ju-co-ce al-it-ce wid-100">
                        <div class="dis-flex wid-50 ju-co-ce al-it-ce" style="height:50px;font-weight: bold;">
                            <p style="color: black;">Venue Ads</p>
                        </div>
                        <div class="dis-flex wid-50 ju-co-ce al-it-ce" style="height:50px;font-weight: bold;">
                            <p style="color: black;"><?= $data['pendingvenue'][0]->{'COUNT(ad_id)'};?></p>
                        </div>
                    </div>
                    <div class="wid-100 dis-flex-col al-it-ce ju-co-ce" style="height:50px;font-weight: bold;background-color: mediumpurple;font-size: large ">
                        <p style="color: white;">Posted</p>
                    </div>
                    <div class="dis-flex ju-co-ce al-it-ce wid-100">
                        <div class="dis-flex wid-50 ju-co-ce al-it-ce" style="height:50px;font-weight: bold;">
                            <p style="color: black;margin: 0;">Singer Ads</p>
                        </div>
                        <div class="dis-flex wid-50 ju-co-ce al-it-ce" style="height:50px;font-weight: bold;">
                            <p style="color: black;"><?= $data['postsinger'][0]->{'COUNT(ad_id)'};?></p>
                        </div>
                    </div>
                    <hr style="width: 100%;">
                    <div class="dis-flex ju-co-ce al-it-ce wid-100">
                        <div class="wid-50 dis-flex ju-co-ce al-it-ce " style="w:50px;font-weight: bold;">
                            <p style="color: black;">Band Ads</p>
                        </div>
                        <div class="dis-flex  wid-50 ju-co-ce al-it-ce" style="height:50px;font-weight: bold;">
                            <p style="color: black;"><?= $data['postband'][0]->{'COUNT(ad_id)'};?></p>
                        </div>
                    </div>
                    <hr style="width: 100%;">
                    <div class="dis-flex ju-co-ce al-it-ce wid-100">
                        <div class="dis-flex wid-50 ju-co-ce al-it-ce" style="height:50px;font-weight: bold;">
                            <p style="color: black;">Venue Ads</p>
                        </div>
                        <div class="dis-flex wid-50 ju-co-ce al-it-ce" style="height:50px;font-weight: bold;">
                            <p style="color: black;"><?= $data['postvenue'][0]->{'COUNT(ad_id)'};?></p>
                        </div>
                    </div>
                </div>
            </div>

            

        </section>

        <script>

            let user_types = <?= $plabels ?> ?? [];
            let user_count = <?= $pdata ?> ?? [];

            const pieChart = document.getElementById('UserTypes');

            // Define an array of colors for the chart
            const colors = [
                'rgb(139,27,192)',
                'rgb(232,68,232)',
                'rgb(153, 102, 255)',
                'rgb(193,171,236)',

            ];

            new Chart(pieChart, {
                type: 'pie',
                data: {
                    labels: user_types,
                    datasets: [{
                        label: 'Probability',
                        data: user_count,
                        backgroundColor: colors.slice(0, user_types.length), // Slice the colors array to match the number of user types
                        hoverOffset: 4
                    }]
                }
            });

            const fixedColors = ['rgb(139,27,192)','rgb(232,68,232)', 'rgb(153, 102, 255)', 'rgb(89,89,89)'];

            // Extract userTypeData from PHP code
            let userTypeData = <?= $userTypeData ?>;

            // Extract unique user types
            let userTypes = Object.keys(userTypeData);

            // Get the latest 12 months including the current month
            let latestMonths = [];
            let currentDate = new Date();
            let currentYear = currentDate.getFullYear();
            let currentMonth = currentDate.getMonth() + 1; // Adding 1 because getMonth() returns zero-based month index
            for (let i = 0; i < 12; i++) {
                if (currentMonth === 0) {
                    currentMonth = 12; // If the current month is January, set it to December of the previous year
                    currentYear--;
                }
                latestMonths.unshift(`${currentYear}-${currentMonth.toString().padStart(2, '0')}`);
                currentMonth--;
            }

            // Prepare data for each user type
            let datasets = userTypes.map((userType, index) => {
                let userData = userTypeData[userType];
                let counts = latestMonths.map(month => {
                    if (userData && userData[month]) {
                        return userData[month].cumulative_count;
                    } else {
                        return 0;
                    }
                });
                return {
                    label: userType,
                    data: counts,
                    borderColor: fixedColors[index % fixedColors.length], // Use fixed colors
                    fill: false
                };
            });

            // Create the line chart
            const ctx = document.getElementById('userTypeChart').getContext('2d');
            const userTypeChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: latestMonths,
                    datasets: datasets
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Months'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Cumulative Count'
                            }
                        }
                    }
                }
            });

        </script>

    </main>
</div>
</body>
</html>
