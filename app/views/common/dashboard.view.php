<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <style>

            html, body {
                height: 100%;
                width: 100%;
                font-family: 'Roboto', sans-serif;
                background: #efefef;
                overflow: hidden;
            }

            .panel {
                width: 750px;
                height: 400px;
                background: #838CC7;
                box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);
                border-radius: 6px;
                overflow: hidden;
            }

            .panel-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0 30px;
                height: 60px;
                background: #fff;
            }

            .title {
                color: #5E6977;
                font-weight: 500;
            }

            .calendar-views span {
                font-size: 14px;
                font-weight: 300;
                color: #BDC6CF;
                padding: 6px 14px;
                border: 2px solid transparent;
            }

            .panel-body {
                display: flex;
                height: 340px;
            }

            .categories {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                flex-basis: 25%;
                padding: 39px 0px 41px 26px;
            }
            .category {
                display: flex;
                flex-direction: column;
            }
            .category span:first-child {
                font-weight: 300;
                font-size: 14px;
                opacity: 0.6;
                color: #fff;
                margin-bottom: 6px;
            }
            .category span:last-child {
                font-size: 32px;
                font-weight: 300;
                color: #fff;
            }

            .chart {
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                flex-grow: 2;
                position: relative;
            }

            .operating-systems {
                display: flex;
                justify-content: space-between;
                width: 215px;
                margin-top: 30px;
                margin-bottom: 50px;
            }
            span[class*=&quot;-os&quot;] {
                font-size: 14px;
                font-weight: 300;
                font-size: 14px;
                color: #c3c6e4;
            }
            span[class*=&quot;-os&quot;] span {
                                             width: 9px;
                                             height: 9px;
                                             display: inline-block;
                                             border-radius: 50%;
                                             margin-right: 9px;
                                         }
            .android-os span {
                background: #80B354;
            }
            .ios-os span {
                background: #F5A623;
            }
            .windows-os span {
                background: #F8E71C;
            }

            div[class*=&quot;-stats&quot;] {
                position: absolute;
                color: #fff;
                font-size: 12px;
                display: flex;
                opacity: 0;
                animation: showstats 0.6s linear 1.8s;
                animation-fill-mode: forwards;
            }

            div[class*=&quot;-stats&quot;] span {
                                               height: 12px;
                                               width: 12px;
                                               margin: 0 7px;
                                               background-color: #fff;
                                               border: 2px solid transparent;
                                               border-radius: 50%;
                                           }

            .android-stats {
                bottom: 155px;
                right: 230px;
            }

            .ios-stats {
                bottom: 83px;
                left: 133px;
            }

            .windows-stats {
                bottom: 133px;
                right: 62px;
            }

            .calendar-views span:hover {
                border: 2px solid #BDC6CF;
                cursor: pointer;
                border-radius: 15px;
            }

            div[class*=&quot;-stats&quot;] span:hover {
                                               transform: scale(1.4) rotate(0.02deg);
                                               border: 2px solid #fff;
                                               cursor: pointer;
                                               transition: transform 0.2s ease-in-out;
                                           }

            .android-stats span:hover {
                background: #80B354;
            }

            .ios-stats span:hover {
                background: #F5A623;
            }

            .windows-stats span:hover {
                background: #F8E71C;
            }

            .dataset-1 {
                animation: raise .8s linear 1;
                transform-origin: bottom;
            }
            .dataset-2 {
                animation: raise 1.6s linear 1;
                transform-origin: bottom;
            }
            .dataset-3 {
                animation: raise 1.8s linear 1;
                transform-origin: bottom;
            }

            .lines {
                opacity: 0;
                animation: showlines 0.6s linear 1.6s;
                animation-fill-mode: forwards;
            }

            @keyframes showlines {
                to { opacity: 0.2; }
            }

            @keyframes showstats {
                to { opacity: 1; }
            }

            @keyframes raise {
                0% { transform: scaleY(0.01); }
                75% { transform: scaleY(1.1); }
                100% { transform: scaleY(1); }
            }
        </style>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>
            <section class="cols-10 dis-flex-col al-it-ce">
                <div class="dash-comp dis-flex ju-co-ce">
                    <div class="comp comp-purple">
                        <div class="comp-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>
                        </div>
                        <div>
                            <span>50</span>
                            <p>User Count</p>
                        </div>
                    </div>
                    <div class="comp comp-green">
                        <div class="comp-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 64C28.7 64 0 92.7 0 128v64c0 8.8 7.4 15.7 15.7 18.6C34.5 217.1 48 235 48 256s-13.5 38.9-32.3 45.4C7.4 304.3 0 311.2 0 320v64c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V320c0-8.8-7.4-15.7-15.7-18.6C541.5 294.9 528 277 528 256s13.5-38.9 32.3-45.4c8.3-2.9 15.7-9.8 15.7-18.6V128c0-35.3-28.7-64-64-64H64zm64 112l0 160c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H144c-8.8 0-16 7.2-16 16zM96 160c0-17.7 14.3-32 32-32H448c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32V160z"/></svg>
                        </div>
                        <div>
                            <span>1505</span>
                            <p>Tickets Sold</p>
                        </div>
                    </div>
                    <div class="comp comp-red">
                        <div class="comp-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"/></svg>
                        </div>
                        <div>
                            <span>8</span>
                            <p>Active Count</p>
                        </div>
                    </div>
                </div>

                <div class="wrapper">
                    <div class="panel">
                        <div class="panel-header">
                            <h3 class="title">Statistics</h3>

                            <div class="calendar-views">
                                <span>Day</span>
                                <span>Week</span>
                                <span>Month</span>
                            </div>
                        </div>

                        <div class="panel-body">
                            <div class="categories">
                                <div class="category">
                                    <span>New Users</span>
                                    <span>1.897</span>
                                </div>
                                <div class="category">
                                    <span>Recurring Users</span>
                                    <span>127</span>
                                </div>
                                <div class="category">
                                    <span>Page Views</span>
                                    <span>8.648</span>
                                </div>
                            </div>

                            <div class="chart">
                                <div class="operating-systems">
                                  <span class="ios-os">
                                    <span></span>Ads
                                  </span>

                                  <span class="windows-os">
                                    <span></span>Events
                                  </span>

                                  <span class="android-os">
                                    <span></span>Complaints
                                  </span>
                                </div>

                                <svg width="563" height="204" class="data-chart" viewBox="0 0 563 204" xmlns="https://www.w3.org/2000/svg">
                                    <svg width="563" height="204" class="data-chart" viewBox="0 0 563 204" xmlns="https://www.w3.org/2000/svg">
                                        <g fill="none" fill-rule="evenodd">
                                            <path class="dataset-1" d="M30.046 97.208c2.895-.84 5.45-2.573 7.305-4.952L71.425 48.52c4.967-6.376 14.218-7.38 20.434-2.217l29.447 34.46c3.846 3.195 9.08 4.15 13.805 2.52l31.014-20.697c4.038-1.392 8.485-.907 12.13 1.32l3.906 2.39c5.03 3.077 11.43 2.753 16.124-.814l8.5-6.458c6.022-4.577 14.563-3.676 19.5 2.056l54.63 55.573c5.622 6.526 15.686 6.647 21.462.258l37.745-31.637c5.217-5.77 14.08-6.32 19.967-1.24l8.955 7.726c5.42 4.675 13.456 4.63 18.82-.11 4.573-4.036 11.198-4.733 16.508-1.735l61.12 34.505c4.88 2.754 10.916 2.408 15.45-.885L563 90.915V204H0v-87.312-12.627c5.62-.717 30.046-6.852 30.046-6.852z" fill="#7DC855" opacity=".9"/>
                                            <path class="dataset-2" d="M563 141.622l-21.546-13.87c-3.64-2.343-8.443-1.758-11.408 1.39l-7.565 8.03c-3.813 4.052-10.378 3.688-13.718-.758L469.83 84.58c-3.816-5.08-11.588-4.687-14.867.752l-28.24 46.848c-2.652 4.402-8.48 5.673-12.74 2.78l-15.828-10.76c-3.64-2.475-8.55-1.948-11.575 1.245l-53.21 43.186c-3.148 3.32-8.305 3.74-11.953.974l-100.483-76.2c-3.364-2.55-8.06-2.414-11.27.326l-18.24 15.58c-3.25 2.773-8.015 2.874-11.38.24L159.91 93.79c-3.492-2.733-8.467-2.51-11.697.525l-41.58 39.075c-2.167 2.036-5.21 2.868-8.117 2.218L39.05 112.5c-4.655-1.808-9.95-.292-12.926 3.7L0 137.31V204h563v-62.378z" fill="#F8E71C" opacity=".6"/>
                                            <path class="dataset-3" d="M0 155.59v47.415c0 .55.448.995 1 .995h562v-43.105l-40.286 11.83c-3.127.92-6.493.576-9.368-.954l-53.252-28.32c-5.498-2.924-12.323-1.365-15.987 3.654l-25.48 34.902c-4.08 5.59-12.478 5.513-16.455-.148L360.06 121.92c-2.802-4.073-8.2-5.457-12.633-3.237L322.2 133.827c-4.415 2.21-9.792.848-12.604-3.196L282.78 99.25c-4.106-5.906-12.978-5.6-16.665.57l-26.757 44.794c-3.253 5.446-10.753 6.468-15.36 2.092l-16.493-15.673c-4.27-4.058-11.138-3.522-14.72 1.148l-23.167 30.21c-3.722 4.852-10.937 5.207-15.12.744l-44.385-47.345c-5.807-5.427-14.83-5.508-20.734-.19l-55.76 48.31c-3.76 3.26-9.127 3.93-13.582 1.703L0 155.59z" fill="#F5A623" opacity=".7"/>
                                            <path class="lines" fill="#FFF" opacity=".2" d="M0 203h563v1H0zM0 153h563v1H0zM0 102h563v1H0zM0 51h563v1H0zM0 0h563v1H0z"/>
                                        </g>
                                    </svg>
                                </svg>

                            </div>
                        </div>
                    </div>

                <div class="mar-10 pad-10 txt-c-black">
                    <?php $this->view($_SESSION['USER_DATA']->user_type."/dashboard"); ?>
                </div>
            </section>
        </main>
    </div>
</body>
</html>