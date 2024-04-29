<html lang="en">
<?php $this->view('includes/head', ['style' => ['reports/admin_useraccounts.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>


    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 dis-flex-col gap-10 wid-100 pad-10 al-it-ce">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>

<!--            <div class="download-btn">-->
<!--                <button class="btn-lay-2" id="download1">Download</button>-->
<!--            </div>-->
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
                        <p>0752569841</p>
                        <p>admin1@gmail.com</p>
                        <br>
                        <p>www.ento.com</p>
                    </div>

                </div>

                <hr>

<!--                <span class="report-title ">-->
<!--                    DETAILED REPORT - USER ACCOUNTS<br>-->
<!--                    FROM --><?php //echo $from ?><!-- TO --><?php //echo $to ?>
<!--                </span>-->

                <div class="report-content dis-flex-col ju-co-se">
                    <table style="width: 100%">
                        <tr>
                            <th>User</th>
                            <th>Cca user id</th>
                            <th>status</th>
                            <th>Date & Time</th>
<!--                            <th>Email</th>-->
<!--                            <th>Contact No</th>-->
<!--                            <th>Joined Date</th>-->
<!--                        </tr>-->
                        <?php
                        foreach ($complaints as $comp) {

                            echo "<tr>";
                            echo "<td>" . $comp->user_type . "</td>";
                            echo "<td>" . $comp->cca_user_id . "</td>";
                            echo "<td>" . $comp->status . "</td>";
                            echo "<td>" . $comp->date_time . "</td>";
                            echo "</tr>";
                        }
//                        ?>


                    </table>

                    <div style="height: 10mm;">

                    </div>

<!--                    <div class="account-count">-->
<!--                        <div>-->
<!--                            <p class="content-title">Total Number of User Accounts : </p>-->
<!--                        </div>-->
<!--                        <div class="count-value">-->
<!--                            <p> --><?php
////                                show($count);
////                                echo $count;
//                                ?><!--</p>-->
<!--                        </div>-->
<!--                    </div>-->

                    <!--                    <hr>-->

                    <div class="flex-1">&nbsp;</div>

                    <hr>

                    <div class="report-footer">
                        <div>&copy; All Rights Reserved</div>
                        <div>Page 1 of 1</div>
                    </div>
                </div>

            </div>
        </section>
    </main>
</div>


<script>
    window.onload = () => {
        let currentDate = new Date();

        // Format the date into Y-m-d format
        document.getElementById('current_date').innerText = currentDate.getFullYear() + '-' + ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' + ('0' + currentDate.getDate()).slice(-2);
    };


    // document.getElementById("download1").addEventListener("click", () => {
    //     const invoice = document.querySelector(".report-container");
    //     html2pdf().from(invoice).save();
    // })
</script>
</body>
</html>


