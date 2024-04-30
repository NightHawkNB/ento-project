<html lang="en">
<?php $this->view('includes/head', ['style' => ['reports/admin_useraccounts.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <style>
        table{
            tr{
                display: grid;
                grid-template-columns: 20mm 45mm 32mm 26mm 32mm 45mm;

                td {
                    text-align: center;
                }
            }
        }

        .account-count-sub{
            display: flex;
            /*justify-content: space-evenly ;*/
            padding: 2px;
            padding-left: 0;
            padding-right: 10px;
            font-family: "Arial Black", serif;
            font-size: 0.8rem;
            color: black;
            justify-content: end;
            align-items: center;
            gap: 10px;

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
                        <h1></h1>
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

                <span class="report-title ">
                    DETAILED REPORT - ASSISTANT REQUESTS<br>
                </span>

                <div class="report-content dis-flex-col ju-co-se">
                    <table style="width: 100%">
                        <tr>
                            <th id="complaint_th">Id</th>
                            <th id="date_th">Request Date</th>
                            <th id="status_th">CCA Name</th>
                            <th id="admin_th">Status</th>
                            <th id="comment_th">Admin Name</th>
                            <th id="comment_th">Handled Date</th>
                        </tr>
                        <?php
                        foreach ($assist as $row) {
                            echo "<tr>";
                            echo "<td>" . $row->comp_id . "</td>";
                            echo "<td>" . $row->created_at . "</td>";
                            echo "<td>" . $row->cca_name . "</td>";
                            echo "<td>" . $row->status . "</td>";
                            echo "<td>" . $row->admin_name . "</td>";
                            echo "<td>" . $row->handled_at . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>

                    <div style="height: 10mm;">

                    </div>

                    <div class="account-count-sub">
                        <div>
                            <p class="content-title">Idle Requests : </p>
                        </div>
                        <div class="count-value">
                            <p> <?php echo $idle_count; ?></p>
                        </div>
                    </div>

                    <div class="account-count-sub">
                        <div>
                            <p class="content-title">Todo Requests : </p>
                        </div>
                        <div class="count-value">
                            <p> <?php echo $todo_count; ?></p>
                        </div>
                    </div>

                    <div class="account-count-sub">
                        <div>
                            <p class="content-title"> Handled Requests: </p>
                        </div>
                        <div class="count-value">
                            <p> <?php echo $handled_count; ?></p>
                        </div>
                    </div>

                    <div class="account-count">
                        <div>
                            <p class="content-title">Total Number of Assistant Requests : </p>
                        </div>
                        <div class="count-value">
                            <p> <?php echo $assistant_count; ?></p>
                        </div>
                    </div>
                    <div class="account-count">
                        <div>
                            <p class="content-title">Total Number of Complaints : </p>
                        </div>
                        <div class="count-value">
                            <p> <?php echo $complaint_count ?></p>
                        </div>
                    </div>
                    <div class="account-count">
                        <div>
                            <p class="content-title">Assistant Requests Percentage : </p>
                        </div>
                        <div class="count-value">
                            <p> <?= sprintf('%05.2f%%',($assistant_count/$complaint_count) * 100) ?></p>
                        </div>
                    </div>

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


    document.getElementById("download1").addEventListener("click", () => {
        const invoice = document.querySelector(".report-container");
        html2pdf().from(invoice).save();
    })
</script>
</body>
</html>

