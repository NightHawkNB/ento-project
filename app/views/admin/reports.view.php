<html lang="en">
<?php $this->view('includes/head',['style'=>['admin/adverification.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <style>

        input {
            padding: 5px;
            border-radius: 5px;
            outline: none;
            border: thin solid grey;
        }

        input:focus {
            border: thin solid var(--purple-tirtiary);
        }


        .report-container {
            width: 100%;
            height: 100%;
            /*padding: 10px;*/

            display: flex;
            flex-direction: column;
            gap: 20px;
            /*align-items: stretch;*/

            .report-tile-container {
                flex: 1;
                display: flex;
                gap: 20px;
                justify-content: center;
                /*padding: 10px;*/

                .report-tile {
                    flex: 1;
                    background-color: white;
                    border-radius: 5px;
                    padding: 10px;

                    max-width: 420px;
                    min-width: 420px;
                    height: 250px;

                    .report-image{
                        display: flex;
                        align-items: center;
                        justify-content: center;

                    }

                    .report-name{
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: rebeccapurple;
                        font-weight: bolder;
                        height: 50px;
                        font-size: 20px;
                        font-family: "Poppins", sans-serif;
                    }

                    .date-form{

                        form{
                            gap:3px;
                            width:100%;

                        }

                        form > div {
                            display: flex;
                            justify-content: space-around;
                            width: 100%;
                            align-items: center;

                            label {
                                font-weight: bold;
                            }
                        }
                        .btn{
                            display: flex;
                            justify-content: center;
                            margin: 10px;
                        }

                        form > div > div {
                            display: flex;
                            align-items: center;
                            width: fit-content;
                            gap: 5px;
                        }
                    }

                }

                .report-t{
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;

                    .report-image{
                        width: 150px;
                        height: 150px;
                        aspect-ratio : 1/1;

                    }
                }
            }
        }
    </style>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 dis-flex wid-100 pad-10">
            <div class="report-container">
                <div class="report-tile-container" style="align-items: end">

                    <div class="report-tile">
                        <div class="report-image">
                            <img width="100" height="100" src="<?= ROOT ?>/assets/images/icons/admin/report/user_accounts.jpg" alt=""/>
                        </div>
                        <div class="report-name">
                            User Account Details
                        </div>
                        <div class="date-form">
                            <form action="<?=ROOT?>/admin/reports/useraccount_report" method="POST">
                                <div>
                                    <div>
                                        <label for="from_date" style="color: black;">From:</label>
                                        <input type="date" id="from_date" name="from_date" required>
                                    </div>
                                   <div>
                                       <label for="to_date" style="color: black">To:</label>
                                       <input type="date" id="to_date" name="to_date" required>
                                   </div>
                                </div>
                                <div class="btn">
                                    <button class="button-s2" style="width: 120px;padding:10px 20px;">Generate</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <a href="<?= ROOT ?>/admin/reports/usertypes_report">
                        <div class="report-tile report-t">
                            <div class="report-image">
                                <img width="150" height="150" src="<?= ROOT ?>/assets/images/icons/admin/report/user_types.jpg" alt=""/>
                            </div>
                            <div class="report-name">
                                User Type Details
                            </div>
                        </div>
                    </a>
                </div>
                <div class="report-tile-container">
                    <a href="<?= ROOT ?>/admin/reports/assistant_report">
                        <div class="report-tile report-t">
                            <div class="report-image">
                                <img width="150" height="150" src="<?= ROOT ?>/assets/images/icons/admin/report/assistant_requests.jpg" alt=""/>
                            </div>
                            <div class="report-name">
                                Asssistant Request Details
                            </div>
                        </div>
                    </a>
                    <a href="<?= ROOT ?>/admin/reports/adverify_report">
                        <div class="report-tile report-t">
                            <div class="report-image">
                                <img width="150" height="150" src="<?= ROOT ?>/assets/images/icons/admin/report/ad_verification.jpg" alt=""/>
                            </div>
                            <div class="report-name">
                                Ad Verification Details
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
