<html lang="en">
<?php $this->view('includes/head', ['style' => 'pages/create_event.css']) ?>
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

                <div class="dis-flex">
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
                                        <input type="text" placeholder="mm/yyyy" class="date-input" />
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
                                        <input type="text" placeholder="Event Name" class="event-name" />
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
                        <?php $this->view($_SESSION['USER_DATA']->user_type."/dashboard"); ?>
                    </div>
                </div>

            </section>

        </main>
    </div>
</body>
</html>