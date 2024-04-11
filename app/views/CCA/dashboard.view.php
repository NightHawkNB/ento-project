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
        padding: 20px;
        font-weight: 500;
        background-color: white;
        width: 100%;   
    }
  

</style>
        <div class="dis-grid-c3 wid-100 pad-10 gap-10 cards">
            <div class=" card">
                <div>
                    <div class="numbers">102</div>
                    <div class="cardname">Verify</div>
                </div>
                <div class="iconbox">
                    <ion-icon name="person-add-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">20</div>
                    <div class="cardname">Complaints</div>
                </div>
                <div class="iconbox">
                    <ion-icon name="alert-circle-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">1504</div>
                    <div class="cardname">Daily Views</div>
                </div>
                <div class="iconbox">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>
        </div>
        <style>
            .charts > div{
                display: flex;
                border-radius: 10px;
                padding: 20px;
                font-weight: 500;
                background-color: white;
                width: 100%;
            }
        </style>

        <!--chart-->
        <div class="dis-flex wid-100 pad-10 gap-10 charts">
            
            <div class="box">
                <canvas id="myChart"></canvas>
            </div>
            <div class="box"></div>
        </div>

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
                align-item:left;
                margin-bottom: 20px;
            }
            .details .cardheader .btn{
                position: relative;
                padding: 5px 10px;
                color: black;
            }
        </style>
         <!--complaint list-->
         <div class="dis-flex wid-100 pad-10 gap-10 details">
            <div class="Complaints">
                <div class="cardheader">
                    <h2>Complaints</h2>
                    <a href="#" class="btn">View All</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>Complaint ID</td>
                            <td>Comment</td>
                            <td>Time stamp</td>
                            <td>status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($complaints as $complain){
                            echo "
                                <tr>
                            <td>$complain->comp_id</td>
                            <td>$complain->details</td>
                            <td>$complain->date_time</td>
                            <td><span class='status Accept'>$complain->status</span></td>
                        </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!--New Users-->
        <div class="newUsers">
            
                <div class="cardheader">
                    <h2>New Users</h2>
                    <a href="#" class="btn">View All</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>User ID</td>
                            <td>Username</td>
                            <td>Time stamp</td>
                            <td>status</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if(!empty($uservreqs)){
                            foreach($uservreqs as $ureq){
                                echo "
                                <tr>
                                <td>$ureq->userVreq_id</td>
                                <td>$ureq->user_id</td>
                                <td>$ureq->timestamps</td>
                                <td>$ureq->resources</td>
                                </tr>
                                ";
                            }
                        }
                        else{
                            echo "No user verification Request";
                        }
                        ?>
                    </tbody>
                </table>
            
        </div>
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