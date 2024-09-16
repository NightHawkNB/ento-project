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
                        <h1></h1>
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
                    DETAILED REPORT - USER TYPES
                </span>

                <div class="report-content dis-flex-col ju-co-se">
                    <table style="width: 100%">
                        <tr>
                            <th>User Type</th>
                            <th>No of Accounts</th>
                            <th>Percentage</th>
                        </tr>

                        <tr>
                            <td>
                                Administrator
                            </td>

                            <td>
                                <?= $accounts[0]->count ?>
                            </td>

                            <td>
                                <?= sprintf('%05.2f%%',($accounts[0]->count/$user_count) * 100) ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Customer Care Agents
                            </td>

                            <td>
                                <?= $accounts[2]->count ?>
                            </td>

                            <td>
                                <?= sprintf('%05.2f%%',($accounts[2]->count/$user_count) * 100) ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Event Manager
                            </td>

                            <td>
                                <?= $accounts[4]->count ?>
                            </td>

                            <td>
                                <?= sprintf('%05.2f%%',($accounts[4]->count/$user_count) * 100) ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Singer
                            </td>

                            <td>
                                <?= $accounts[5]->count ?>
                            </td>

                            <td>
                                <?= sprintf('%05.2f%%',($accounts[5]->count/$user_count) * 100) ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Band
                            </td>

                            <td>
                                <?= $accounts[1]->count ?>
                            </td>

                            <td>
                                <?= sprintf('%05.2f%%',($accounts[1]->count/$user_count) * 100) ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Venue Manager
                            </td>

                            <td>
                                <?= $accounts[6]->count ?>
                            </td>

                            <td>
                                <?= sprintf('%05.2f%%',($accounts[6]->count/$user_count) * 100) ?>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                Venue Operator
                            </td>

                            <td>
                                <?= $accounts[7]->count ?>
                            </td>

                            <td>
                                <?= sprintf('%05.2f%%',($accounts[7]->count/$user_count) * 100) ?>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                Client
                            </td>

                            <td>
                                <?= $accounts[3]->count ?>
                            </td>

                            <td>
                                <?= sprintf('%05.2f%%',($accounts[3]->count/$user_count) * 100) ?>
                            </td>
                        </tr>


                    </table>

                    <div style="height: 10mm;">

                    </div>

                    <div class="account-count">
                        <div>
                            <p class="content-title">Total Number of User Accounts : </p>
                        </div>
                        <div class="count-value">
                            <p> <?= $user_count ?></p>
                        </div>
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

