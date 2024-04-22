<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <style>
        .error{
            min-height: 16px;
        }

        .res-title {
            position: absolute;
            right: 10px;
            bottom: 10px;
            font-size: 2rem;
            font-weight: bold;
            color: var(--font-secondary);
        }
    </style>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="pad-10 dis-flex-col al-it-ce wid-100">
            <h1 class="mar-10-0 txt-c-black txt-w-bold" style="font-size: 1.5rem">Reservation Request Details</h1>
            <div class="dis-flex pad-10 gap-20 bg-white bor-rad-5" style="height: 75vh">
                <div class="dis-flex-col wid-100 gap-10 mar-top-10">
                    <div class="dis-flex-col" style="position: relative">
                        <div class="res-title"><?= $title ?></div>
                        <img src="<?= ROOT . $image ?>" alt="service provider image"
                             style="border-radius: 10px; width: 400px; aspect-ratio: 16/9;">
                    </div>
                    <div class="gap-10 mar-0-20" style="overflow: auto; height: 100%">
                        <h4 class="gap-10  mar-bot-10">Already Reserved Dates</h4>
                        <div class="gap-10 bor-rad-10 bor-rad-5" style="background-color: #E8E9FF;">
                            <?php
                            if (!empty($reservations)) {
                                foreach ($reservations as $reservation) {
                                    $this->view('client/components/reserve_time', (array)$reservation);
                                }
                            } else {
                                echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No reservations currently.</h3>";
                            }
                            ?>
                        </div>
                    </div>
                </div>


                <form method="post" id="ad_form" class="txt-c-black pad-10 hei-100" style="">


                    <!--                    --><?php //= show($data) ?>
                    <!--                    --><?php //= show($_SESSION) ?>
                    <div class="profile-input-2">
                        <label for="details">Details</label>
                        <textarea name="details" id="details" placeholder="Ex: Birthday,Wedding,etc.." style="resize: none"></textarea>
                        <div class="error"></div>
                    </div>

                    <div class="profile-input-2">
                        <label for="start_time">Select the starting time and date</label>
                        <input required type="datetime-local" id="start_time" name="start_time">
                        <div class="error"></div>
                    </div>

                    <div class="profile-input-2">
                        <label for="end_time">Select the ending time and date</label>
                        <input required type="datetime-local" id="end_time" name="end_time">
                        <div class="error"></div>
                    </div>

                    <?php if ($ad_owner_type != "venuem"): ?>
                        <div class="profile-input-2">
                            <label for="location"> Enter the location</label>
                            <input required type="text" id="location" name="location"
                                   placeholder="Ex- 361/3A Himbutana, Mulleriyawa.">
                            <div class="error"></div>
                        </div>
                    <?php endif; ?>

<!--                    <div class="flex-1"></div>-->

                    <div class="wid-100">
                        <button type="submit" class="button-s2 error" style="width: 100%; align-self: flex-end">Submit
                        </button>
                    </div>
                </form>
            </div>

        </section>

    </main>
</div>
</body>
</html>
<script>
    //to stop past dates
    let date = new Date();
    let day = date.getDate() + 1;
    let month = date.getMonth() + 1;
    let year = date.getFullYear();
    let hours = date.getHours();
    let minutes = date.getMinutes();
    if (day < 10) {
        day = "0" + day;
    }
    if (month < 10) {
        month = "0" + month;
    }
    if (hours < 10) {
        hours = "0" + hours;
    }
    if (minutes < 10) {
        minutes = "0" + minutes;
    }
    let minDateTime = year + "-" + month + "-" + day + "T" + hours + ":" + minutes;
    document.getElementById("start_time").setAttribute('min', minDateTime);
    document.getElementById("end_time").setAttribute('min', minDateTime);

    //to stop event time more than 6 hours

    // Get the start and end time input fields
    let start_time = document.getElementById("start_time");
    let end_input = document.getElementById("end_time");
    let Form = document.getElementById("ad_form");

    // Add event listener to the form's submit event
    ad_form.addEventListener("submit", function (event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Validate the time range
        validateTimeRange();
    });

    function validateTimeRange() {
        // Get the selected start and end times
        let startTime = new Date(start_time.value);
        let endTime = new Date(end_time.value);

        document.querySelectorAll('.error').forEach(error_div => {
            error_div.innerHTML = ""
        })

        if (startTime.getTime() > endTime.getTime()) {
            end_input.parentElement.querySelector('.error').textContent = "End time cannot be greater than start time"
        } else {
            // Calculate the time difference in milliseconds
            let timeDifference = endTime.getTime() - startTime.getTime();

            // Convert milliseconds to hours
            let timeDifferenceHours = timeDifference / (1000 * 60 * 60);

            // Display error message if time difference is more than 6 hours
            if (timeDifferenceHours > 6) {
                end_input.parentElement.querySelector('.error').textContent = "Duration can not be more than 6 hours."
            }else if (timeDifferenceHours < 1) {
                end_input.parentElement.querySelector('.error').textContent = "Duration can not be less than 1 hour."
            }else{
            // If time range is valid, submit the form
            Form.submit();
        }
    }

    }
</script>

