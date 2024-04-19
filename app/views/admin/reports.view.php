<html lang="en">
<?php $this->view('includes/head',['style'=>['admin/adverification.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>


    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <style>

            .report-container {
                width: 210mm; /* A4 width */
                height: 297mm; /* A4 height */
                max-height: 287mm;
                margin: 20px auto;
                padding: 5mm; /* Add padding to ensure content does not touch the edges */
                /*box-sizing: border-box;*/
                background-color: #fff; /* Optional: Set background color */

                justify-content:stretch;
                align-items:stretch;

                .report-header {
                    height: 40mm;
                }

                .report-content {
                    min-height: 227mm;
                }

                .report-footer {
                    background-color: red;
                    height: 40mm;
                }
            }

        </style>

        <section class="cols-10 dis-flex wid-100">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>

            <div>
                <button class="btn-lay-2" id="download1">Download</button>
            </div>
            <div class="report-container">
                <div class="report-header dis-flex ju-co-sb">
                    <div class="txt-ali-lef">
                        <h1>Logo</h1>
                        <br><br><br><br><br>
                        <p>Date: April 11, 2024</p>
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

                <style>
                    hr {
                        margin: 10px 0;
                    }

                    table {
                        width: 100%;
                        border: none;

                        tr {

                            th#complaint_th {
                                width: 30mm;
                                background-color: red;
                            }
                            th#date_th{
                                width:50mm;
                                background-color: cornflowerblue;
                            }
                            th#status_th{
                                width:30mm;
                                background-color: greenyellow;
                            }
                            th#admin_th{
                                width:30mm;
                                background-color: gray;
                            }
                            th#comment_th{
                                width:60mm;
                                background-color: cornflowerblue;
                            }

                            th{
                                font-size: 0.9rem;
                            }

                            td {
                                font-size: 0.7rem;
                                text-align: center;
                            }
                        }
                    }
                </style>

                <div class="report-content dis-flex-col ju-co-se">
                    <table style="width: 100%">
                        <tr>
                            <th id="complaint_th">Complaint id</th>
                            <th id="date_th">Date & Time</th>
                            <th id="status_th">Status</th>
                            <th id="admin_th">Admin Id</th>
                            <th id="comment_th">Comment</th>
                        </tr>
                        <?php
                        foreach ($assist as $row) {
                            echo "<tr>";
                            echo "<td>" . $row->comp_id . "</td>";
                            echo "<td>" . $row->date_time . "</td>";
                            echo "<td>" . $row->status . "</td>";
                            echo "<td>" . $row->admin_id . "</td>";
                            echo "<td>" . $row->comment . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>

                <hr>

                <div class="flex-1">&nbsp;</div>

                <hr>

                <div class="report-footer">
                    Footer
                </div>
                </div>

            </div>
        </section>
    </main>
</div>


<script>
    document.getElementById("download1").addEventListener("click",()=>{
        const invoice = document.querySelector(".report-container");
        html2pdf().from(invoice).save();
    })
</script>
</body>
</html>

