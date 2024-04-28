<html lang="en">
<?php $this->view('includes/head', ['style' => ['reports/admin_useraccounts.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <style>
        table{
            tr{
                display: grid;
                grid-template-columns: 80mm 60mm 60mm ;

                td {
                    text-align: center;
                }
            }
        }
    </style>


    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 dis-flex-col gap-10 wid-100 pad-10 al-it-ce">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>

            <div class="download-btn">
                <button class="btn-lay-2" id="download1">Download</button>
            </div>
            <div class="report-container">
                <div class="report-header dis-flex ju-co-sb">
                    <div class="txt-ali-lef">
                        <h1>Logo</h1>
                        <br><br><br><br><br>
                        <p>Date: <span id="current_date"><?= date("M d, Y H:i a") ?></span></p>
                    </div>
                    <div class="txt-ali-rig">
                        <h1>ENTO</h1>
                        <br>
                        <p>Sri Lanka</p>
                        <p><?= $_SESSION['USER_DATA']->contact_num ?></p>
                        <p><?php echo $_SESSION['USER_DATA']->email ?></p>
                        <br>
                        <p>www.ento.com</p>
                    </div>

                </div>

                <hr>

                <span class="report-title ">
                    <?=$event->name?> - Event Report
                </span>

                <div ><h3><?=$event->name?> event details</h3></div>
                <div class="dis-flex-col gap-10 pad-5">
<!--                    singers-->
                    <div class="dis-flex gap-10">
                        <h4>Singers:</h4>
                            <div >
                                <?php
                                if (!empty($singers)){
                                foreach ($singers as $singer){
                                    echo '<p>'.$singer->singer_name.'</p>';}
                                } else{
                                    echo "No singers allocated for this event.";
                                }
                                ?>
                        </div >
                    </div>
<!--                    band-->
                    <div class="dis-flex gap-10">
                        <h4>Music Band:</h4>
                        <div>
                            <?php
                            if (!empty($band)){
                                echo $band->name;
                            }elseif (!empty($event->custom_band)){
                                echo $event->custom_band;
                            }else{
                                echo "No music bands allocated for this event.";
                            }
                            ?>
                        </div>
                    </div>
<!--                    venue-->
                    <div class="dis-flex gap-10">
                        <h4>Venue:</h4>
                        <div>
                            <?php
                            if (!empty($venue)){
                                echo $venue->name;
                            }elseif (!empty($event->custom_venue)){
                                echo $event->custom_venue;
                            }
                            ?>
                        </div>
                    </div>
<!--                    Date/Time-->
                    <div>
                        <h4>Date and Time:</h4>
                        <div>
                            <?php
                            $start_dateTime = new DateTime("$event->start_time");
                            $end_dateTime = new DateTime("$event->end_time");
                            echo $start_dateTime->format("Y-m-d")." ";
                            echo $start_dateTime->format("H:i")."-".$end_dateTime->format("H:i");
                            ?>
                        </div>
                    </div>
                </div>

                <span class="report-title ">
                     Ticket Details.
                </span>

                <div class="report-content dis-flex-col ju-co-se">


                    <table style="width: 100%">
                        <tr>
                            <th>Total Tickets</th>
                            <th>Available Tickets</th>
                            <th>Total Income</th>
                        </tr>

<!--                        <tr>-->
<!--                            <td>-->
<!--                                Administrator-->
<!--                            </td>-->
<!---->
<!--                            <td>-->
<!--                                --><?php //= $accounts[0]->count ?>
<!--                            </td>-->
<!---->
<!--                            <td>-->
<!--                                --><?php //= sprintf('%05.2f%%',($accounts[0]->count/$user_count) * 100) ?>
<!--                            </td>-->
<!--                        </tr>-->


                    </table>

                    <div style="height: 10mm;">

                    </div>


                    <!--                    <hr>-->

                    <div class="flex-1">&nbsp;</div>

                    <hr>

                    <div class="report-footer">
                        <div>&copy; All Rights Reserved</div>
                        <div>Page 1 of 1</div>
                    </div>
                </div>

            </div>


            <?=show($data)?>


        </section>
    </main>
</div>


<script>
    window.onload = () => {
        let currentDate = new Date();

        // Format the date into Y-m-d format
        document.getElementById('current_date').innerText = currentDate.getFullYear() + '-' + ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' + ('0' + currentDate.getDate()).slice(-2);
    };


    document.getElementById("download1").addEventListener("click", () => {
        const invoice = document.querySelector(".report-container");
        html2pdf().from(invoice).save();
    })
</script>
</body>
</html>

