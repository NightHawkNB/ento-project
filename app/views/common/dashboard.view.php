<html lang="en">
<?php $this->view('includes/head', ['style' => ['pages/create_event.css']]) ?>
<body>

<?php if (!Auth::is_client() || !Auth::is_admin() || !Auth::is_cca()): ?>
    <script defer>
        const calendar_events = <?= json_encode($calendar_events) ?>;
        const calendar_reservations = <?= json_encode($calendar_reservations) ?>;
        const personal_schedule = <?= json_encode($personal_schedule) ?>;
        const user_type = "<?= $_SESSION['USER_DATA']->user_type ?>";
    </script>

    <script src="<?= ROOT ?>/assets/scripts/calendar.js" defer></script>
<?php endif; ?>

<style>
    .chart-container {
        padding: 10px;
        /*background-color: white;*/
        width: 100%;
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .chart-container .chart {
        background-color: white;
        border-radius: 10px;
        padding: 20px;
        width: 300px;
        height: fit-content;
    }

    .widget-container {
        background-color: var(--white-link);
        padding: 10px;
        display: flex;
        gap: 10px;
        width: 100%;
    }

    .widget-container .widget {
        color: var(--font-primary);
        display: flex;
        /*flex-direction: column;*/
        align-items: center;
        gap: 10px;
        width: fit-content;
        max-height: 100px;
        height: 100%;
        /*height: 80px;*/
        border-radius: 10px;
        background-color: white;
        padding: 10px 20px;
        /*box-shadow: 0 2px 5px rgba(0,0,0,0.2);*/
    }

    /* SVG container inside the stat widget */
    .widget-container .widget > span {
        color: white;
        border-radius: 10px;
        padding: 5px;
        /*height: 60px;*/
        aspect-ratio: 1/1;
        width: fit-content;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
    }
    .widget-container .widget > span > svg {
        height: 35px;
        aspect-ratio: 1/1;
    }


    /* Text field inside the stat widgets */
    .widget-container .widget > p {
        font-size: 0.9rem;
        /*letter-spacing: 1px;*/
        font-family: arial, serif;
    }

    /* Counter inside the stat widgets */
    .widget-container .widget > div {
        display: flex;
        justify-content: left;
    }
    .widget-container .widget > div span {
        font-size: 3rem;
        color: var(--font-primary);
        font-weight: bold
    }

    .table-container {
        width: 100%;
        height: fit-content;
        padding: 10px;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        gap: 2px;


        .table-row {
            background-color: var(--white);
            border-radius: 5px;
            box-shadow: grey 1px 2px 3px;

            width: 100%;
            display: grid;
            grid-template-columns: 60% 40%;
            padding: 15px 10px;
            /*border-bottom: thin solid darkgrey;*/

            span {
                border-right: 1px solid lightgray;
                text-overflow: ellipsis;
            }

            p {
                padding-left: 10px;
            }

            &.table-heading {
                font-weight: bold;
                border: none;
                background-color: mediumpurple;
                color: white;
                /*border: thin solid darkgrey;*/
                /*border-radius: 5px 5px 0 0;*/
            }

            &:not(.table-heading):hover {
                background-color: ghostwhite;
            }
        }
    }

</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="dis-flex-col al-it-ba wid-100 pad-10 gap-10">

            <div class="dis-flex-col">

                <div class="widget-container">


                    <a href="<?= ROOT.'/'.strtolower($_SESSION['USER_DATA']->user_type).'/reservations/requests' ?>">
                        <div class="widget">
                    <span style="background-color: lightblue;">
                        <svg style="fill: dodgerblue" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560h-80v120H280v-120h-80v560Zm280-560q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                    </span>
                            <p>Reservation Requests</p>
                            <div>
                                <span><?= $stats->request_count ?? 0 ?></span>
                            </div>
                        </div>
                    </a>

                    <div class="widget">
                    <span style="background-color: lightgreen;">
                        <svg style="fill: forestgreen" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M620-163 450-333l56-56 114 114 226-226 56 56-282 282Zm220-397h-80v-200h-80v120H280v-120h-80v560h240v80H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h167q11-35 43-57.5t70-22.5q40 0 71.5 22.5T594-840h166q33 0 56.5 23.5T840-760v200ZM480-760q17 0 28.5-11.5T520-800q0-17-11.5-28.5T480-840q-17 0-28.5 11.5T440-800q0 17 11.5 28.5T480-760Z"/></svg>
                    </span>
                        <p>Accepted Requests</p>
                        <div>
                            <span><?= $stats->accepted_request_count ?? 0 ?></span>
                        </div>
                    </div>

                    <div class="widget">
                    <span style="background-color: lightpink;">
                        <svg style="fill: red" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h168q13-36 43.5-58t68.5-22q38 0 68.5 22t43.5 58h168q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm280-590q13 0 21.5-8.5T510-820q0-13-8.5-21.5T480-850q-13 0-21.5 8.5T450-820q0 13 8.5 21.5T480-790ZM200-200v-560 560Z"/></svg>
                    </span>
                        <p>Pending Requests</p>
                        <div>
                            <span><?= $stats->pending_request_count ?? 0 ?></span>
                        </div>
                    </div>
                </div>

                <!-- Calender -->
                <div class="calendar-container">
                    <div class="left">
                        <div class="calendar">
                            <div class="month">
                                <i class="fas fa-angle-left prev"></i>
                                <div class="date">december 2015</div>
                                <i class="fas fa-angle-right next"></i>
                            </div>
                            <div class="weekdays">
                                <div>Su</div>
                                <div>Mo</div>
                                <div>Tu</div>
                                <div>We</div>
                                <div>Th</div>
                                <div>Fr</div>
                                <div>Sa</div>
                            </div>
                            <div class="days"></div>
                            <div class="goto-today">
                                <div class="goto">
                                    <input type="text" placeholder="mm/yyyy" class="date-input"/>
                                    <button class="goto-btn">Go</button>
                                </div>
                                <button class="today-btn">Today</button>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="today-date">
                            <div class="event-day">wed</div>
                            <div class="event-date">12th december 2022</div>
                        </div>
                        <div class="events"></div>
                        <div class="add-event-wrapper">
                            <div class="add-event-header">
                                <div class="title">Add Event</div>
                                <i class="fas fa-times close"></i>
                            </div>
                            <div class="add-event-body">
                                <div class="add-event-input">
                                    <input type="text" placeholder="Event Name" class="event-name"/>
                                </div>
                                <div class="add-event-input">
                                    <input
                                            type="text"
                                            placeholder="Event Time From"
                                            class="event-time-from"
                                    />
                                </div>
                                <div class="add-event-input">
                                    <input
                                            type="text"
                                            placeholder="Event Time To"
                                            class="event-time-to"
                                    />
                                </div>
                            </div>
                            <div class="add-event-footer">
                                <button class="add-event-btn">Add Event</button>
                            </div>
                        </div>
                    </div>
                    <button class="add-event">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="mar-10 pad-10 txt-c-black">
                    <?php $this->view($_SESSION['USER_DATA']->user_type . "/dashboard"); ?>
                </div>
            </div>

        </section>

    </main>
</div>

</body>
</html>