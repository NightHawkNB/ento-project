<html lang="en">
<?php $this->view('includes/head', ['style' => ['pages/create_event.css']]) ?>
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

            <section class="dis-flex-col al-it-ba wid-100 pad-10 gap-10">
        <!--cards-->
<style>
    .cards > div {
        display: flex;
        justify-content: space-between;
        border-radius: 10px;
        padding: 50px;
        background-color: white;
        width: 100%;   
    }
    .cards .card .numbers{
        font-size: 2.5em;
    }

    .cards .card .cardname{
        font-size: 1.4em;
    }
    .cards .card .iconbox{
        display: block;
        font-size: 2.5em;
    }

    .cards .card:hover{
        background-color: #823dff;
    }
    .cards .card .numbers,
    .cards .card .cardname{
        font-weight: 500;
    }
    .cards .card:hover .numbers,
    .cards .card:hover .cardname,
    .cards .card:hover .iconbox{
        color: #ffffff;
    }
</style>
        <div class="dis-grid-c3 wid-100 pad-10 gap-10 cards">
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
                    <div class="numbers"><?= $count ?></div>
                    <div class="cardname">New Complaints</div>
                </div>
                <div class="iconbox">
                    <ion-icon name="alert-circle-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div class="text">
                    <div class="numbers"><?= $venuecount ?></div>
                    <div class="cardname">New Venue</div>
                </div>
                <div class="iconbox">
                    <ion-icon name="alert-circle-outline"></ion-icon>
                </div>
            </div>
        </div>
        <style>
            .charts > div{
                display: flex;
                flex-direction: column;
                border-radius: 10px;
                padding: 20px;
                font-weight: 500;
                background-color: #ffffff;
                width: 100%;
            }
            .charts .box{
                background-color: #ffffff;
                /*box-shadow: 5px 10px 18px #c8aaff;*/
            }
            .charts .box:hover{
                 /*background-color: #5b00ee;*/
                 box-shadow: 5px 10px 18px #c8aaff;
             }
            .box .chartcontainer{
                width: 400px;
            }
            .box{
                align-items: center;
                justify-content: center;
            }
        </style>

        <!--chart-->
                <div class="dis-flex wid-100 pad-10 gap-10 charts">

                    <div class="box">
                        <h1>Complaints Status</h1>
                        <div class="chartcontainer">
                            <canvas id="my-chart"></canvas>
                        </div>
                    </div>
                    <div class="box">
                        <h1>New Verifies</h1>
                        <canvas id="line-chart"></canvas>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const chartData = {
                        labels: ['Accepted','Handle','Idle','Assist'],
                        datasets: [{
                            label: 'Counts',
                            data: [13, 34, 55, 66],
                            backgroundColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderColor:'rgb(187,147,255)',
                            borderWidth: 1
                        }]
                    };
                    const myChart = document.getElementById('my-chart').getContext('2d');
                    new Chart(myChart, {
                        type: "doughnut",
                        data: chartData
                    });
                </script>
                <script>
                    const chartData = {
                        labels: ['Accepted', 'Handle', 'Idle', 'Assist'],
                        datasets: [{
                            label: 'Counts',
                            data: [13, 34, 55, 66],
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }]
                    };
                    const ctx = document.getElementById('line-chart').getContext('2d');
                    new Chart(ctx, {
                        type: 'line',
                        data: chartData
                    });
                </script>

                <style>
            .details > div{
                display: flex;
                border-radius: 10px;
                padding: 20px;
                font-weight: 500;
                background-color: white;
                width: 100%;
            }
            .details .cardheader{
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                padding-left: 10px;
                margin-bottom: 10px;
            }
            .details .cardheader a.btn{
                /*justify-content: space-between;*/
                /*align-items: flex-start;*/
                /*position: relative;*/
                /*align-items: flex-end;*/
                padding: 5px 10px;
                color: black;
                background: #823dff;
                border-radius: 10px;
                border: 0.5px solid black;
            }
            .details .cardheader a.btn:hover{
                box-shadow: 3px 5px 9px #c8aaff;
            }
            .details .extra{
                display: flex;
                flex-direction: column;
                box-shadow: 5px 10px 18px #c8aaff;
            }
            .details .extra table tbody .ass {
                background: #fdf431;
                padding: 1px 70px;
                border-radius: 100px;
                border: 0.5px solid black;
            }
            .details .extra table tbody .hand {
                background: #00b6fd;
                padding: 1px 70px;
                border-radius: 100px;
                border: 0.5px solid black;
            }
            .details .extra table tbody .acc {
                background: #23e540;
                padding: 1px 70px;
                border-radius: 100px;
                border: 0.5px solid black;
            }
            .details .extra table tbody .idl {
                background: #ff3c42;
                padding: 1px 70px;
                border-radius: 100px;
                border: 0.5px solid black;
            }

            .details .extra table tbody tr td{
                text-align: center;
                /*border-radius: 100px;*/
            }
            .details .extra table thead tr td{
                text-align: center;
                /*border-radius: 100px;*/
            }
            .details .extra table {
                border-collapse: separate; /* Separate borders */
                border-spacing: 0 10px; /* Set the vertical (top/bottom) spacing to 10px */
            }

            /*.details .extra table thead {*/
            /*    padding-bottom: 5px; !* Additional padding at the bottom of the thead *!*/
            /*}*/

            .details .extra:hover{
                background-color: #f6f6f6;
            }

        </style>
         <!--complaint list-->
         <div class="dis-flex wid-100 pad-10 gap-10 details ">
            <div class="extra">
                <div class="cardheader">
                    <h2>Complaints</h2>
                    <a href="<?= ROOT ?>/cca/complaints/" class="btn">View All</a>
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
                        foreach($complaints as $complaint){
                            if($complaint->status=='Accepted'){
                                echo "
                                    <tr>
                                        <td>$complaint->status</td>
                                        <td><span class = 'acc'>$complaint->complaints</span></td>
                                    </tr>
                                    ";
                            }if($complaint->status=='Idle'){
                                    echo "
                                    <tr>
                                        <td>$complaint->status</td>
                                        <td><span class = 'idl'>$complaint->complaints</span></td>
                                    </tr>
                                    ";
                                }if($complaint->status=='Handled'){
                                echo "
                                    <tr>
                                        <td>$complaint->status</td>
                                        <td><span class = 'hand'>$complaint->complaints</span></td>
                                    </tr>
                                    ";
                            }
                            if($complaint->status=='Assist'){
                                echo "
                                    <tr>
                                        <td>$complaint->status</td>
                                        <td><span class = 'ass'>$complaint->complaints</span></td>
                                    </tr>
                                    ";
                            }if($complaint->status=='null'){
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
                        <h2>New Users</h2>
                        <a href="<?= ROOT ?>/cca/verify/" class="btn">View All</a>
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
                        foreach($uservreqs as $uvr){
                            if($uvr->status=='new'){
                                echo "
                                    <tr>
                                        <td>$uvr->status</td>
                                        <td><span class = 'hand'>$uvr->uservreqs</span></td>
                                    </tr>
                                    ";
                            }if($uvr->status=='verified'){
                                echo "
                                    <tr>
                                        <td>$uvr->status</td>
                                        <td><span class = 'acc'>$uvr->uservreqs</span></td>
                                    </tr>
                                    ";
                            }if($uvr->status=='declined'){
                                echo "
                                    <tr>
                                        <td>$uvr->status</td>
                                        <td><span class = 'idl'>$uvr->uservreqs</span></td>
                                    </tr>
                                    ";
                            }if($uvr->status=='null'){
                                echo "No New Users";
                            }
                        }
                            ?>
                        </tbody>
                    </table>
            </div>
             <div class="extra">

<!--                 <div class="cardheader">-->
<!--                     <h2>New Users</h2>-->
<!--                     <a href="--><?php //= ROOT ?><!--/cca/verify/" class="btn">View All</a>-->
<!--                 </div>-->
<!--                 <table>-->
<!--                     <thead>-->
<!--                     <tr>-->
<!--                         <td>Venue</td>-->
<!--                         <td>Status</td>-->
<!--                     </tr>-->
<!--                     </thead>-->
<!--                     <tbody>-->
<!--                     --><?php
//                     if(!empty($uservreqs)){
//                         foreach($uservreqs as $ureq){
//                             echo "
//                                    <tr>
//                                    <td>$ureq->userVreq_id</td>
//                                    <td>$ureq->resources</td>
//                                    </tr>
//                                    ";
//                         }
//                     }
//                     else{
//                         echo "No user verification Request";
//                     }
//                     ?>
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
    toggle.onclick = function(){
        navigation.classList.toggle('active');
        main.classList.toggle('active');
    }
   
    //add hovered class in selected listitem
    let list =document.querySelectorAll('.navigation li');
    function activelink(){
        list.foreach((item)=>
        item.classlist.remove('hovered'));
        this.classlist.add('hovered');
    }
    list.forEach((item)=>
    item.addEventlistner('mouseover',activelink));
</script>
</body>
</html>
            </section>

        </main>
    </div>
</body>
</html>