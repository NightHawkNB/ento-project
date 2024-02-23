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
        background: var(--purple);
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

</style>

<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="bg-white cols-10 dis-flex-col wid-90">

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?= $data['pending_ads'][0]->{'COUNT(*)'} ?></div>
                        <div class="cardname">Pending Assistant Requests</div>
                    </div>
                    <div class="iconbox">
                        <ion-icon name="person-add-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers"><?= $data['pending_assreq'][0]->{'COUNT(*)'} ?></div>
                        <div class="cardname">Pending Ads</div>
                    </div>
                    <div class="iconbox">
                        <ion-icon name="alert-circle-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">8</div>
                        <div class="cardname">Upcoming Evenets</div>
                    </div>
                    <div class="iconbox">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <div class="dis-flex charts mar-20 wid-100 ju-co-st">
                <div class="" style="width: 450px;height:300px; margin: 30px;">
                    <canvas id="myChart" width="300px" height="300px" >

                    </canvas>
                </div>
                <div class="" style="width: 450px;height:300px;margin:30px">
                    <canvas id="UserTypes" >

                    </canvas>
                </div>
            </div>

        </section>

        <script>

            let user_types = <?= $plabels ?> ?? [];
            let user_count = <?= $pdata ?> ?? [];

            const pieChart = document.getElementById('UserTypes');

            // Define an array of colors for the chart
            const colors = [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
                'rgb(255, 159, 64)',
                'rgb(255, 0, 255)',
                'rgb(0, 255, 255)',
                'rgb(128, 128, 128)',

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


        </script>



    </main>
</div>
</body>
</html>
