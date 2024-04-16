<html lang="en">
<?php $this->view('includes/head', ['style' => ['auth/login.css']]) ?>

<body>

    <!-- Animated Background -->
    <div class="area">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

    <div class="dis-flex ju-co-ce al-it-ce pad-20 wid-100 hei-100">

        <?php
        if (message()) {
            switch ($_SESSION['alert-status']) {
                case 'neutral':
                    $status = "neutral";
                    $heading = "Alert";
                    break;
                case 'success':
                    $status = "success";
                    $heading = "Success";
                    break;
                case 'failed':
                    $status = "failed";
                    $heading = "Error";
                    break;
                default:
                    $status = "";
                    $heading = "";
            }
        }
        ?>

        <!-- START OF Popup message box -->
        <div class="alert <?= $status ?> dis-flex gap-10 al-it-ce <?= (message()) ? 'show' : '' ?>" id="alert-window">
            <?php if ($status == "success") : ?>
                <svg class="feather feather-check-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                    <polyline points="22 4 12 14.01 9 11.01" />
                </svg>
            <?php endif; ?>
            <?php if ($status == "neutral") : ?>
                <svg class="feather feather-alert-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="12" x2="12" y1="8" y2="12" />
                    <line x1="12" x2="12.01" y1="16" y2="16" />
                </svg>
            <?php endif; ?>
            <?php if ($status == "failed") : ?>
                <svg class="feather feather-x-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="10" />
                    <line x1="15" x2="9" y1="9" y2="15" />
                    <line x1="9" x2="15" y1="9" y2="15" />
                </svg>
            <?php endif; ?>

            <p class="flex-1">
                <?= $heading ?> : <?= message('', true); ?>
            </p>
        </div>
        <!-- END OF Popup message box -->

        <main class="login-container auth-container sh">
            <div class="login left-section">
                <form method="post" class="dis-flex-col al-it-ce">
                    <h2>Email Confirmation</h2>
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input style="background-color: whitesmoke; text-align: center" type="email" name="email" value="<?= $email ?>" disabled>
                        <i></i>
                    </div>
                    <div class="input-box">
                        <label for="pin">Verification Code</label>
                        <div class="pin-input">
                            <input class="" style="text-align: center;" type="text" name="pin" placeholder="Enter the verification code" required>
                            <label id="send_code_label" style="color: blue; font-size: 0.8em;" class="send-code-btn" onclick="send_code()">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: rebeccapurple"><path d="m720-160-56-56 63-64H560v-80h167l-63-64 56-56 160 160-160 160ZM160-280q-33 0-56.5-23.5T80-360v-400q0-33 23.5-56.5T160-840h520q33 0 56.5 23.5T760-760v204q-10-2-20-3t-20-1q-10 0-20 .5t-20 2.5v-147L416-520 160-703v343h323q-2 10-2.5 20t-.5 20q0 10 1 20t3 20H160Zm58-480 198 142 204-142H218Zm-58 400v-400 400Z"/></svg>
                            </label>
                        </div>
                        <i></i>
                    </div>

                    <div id="timer-container" style="width: 100%; text-align: center; display: none; align-items: center; justify-content: center">
                        <div style="width: fit-content;" id="timer-text">Time Left : &nbsp;</div>
                        <div style="width: fit-content;" id="timer">00:00</div>
                    </div>

                    <button class="sh" type="submit">Confirm</button>
                    <a href="<?= ROOT ?>/login">
                        <button class="sh blue-btn" type="button">Skip & Login</button>
                    </a>
                </form>
            </div>

            <div class="login right-section" style="background: blue url('<?= ROOT ?>/assets/images/icons/auth/mail.jpg') no-repeat center; background-size: cover;">
            </div>
        </main>

        <script>

            let data = {
                "email": "<?= $email ?>"
            }

            const send_code_label = document.getElementById('send_code_label')

            function send_code() {

                send_code_label.innerHTML = `<div class="loader"></div>`

                try {
                    fetch(`/ento-project/public/mailer/email_verification`, {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json; charset=utf-8"
                        },
                        body: JSON.stringify(data)
                    }).then(res => {
                        // console.log(res)
                        return res.text()
                    }).then(data => {
                        // Shows the data printed by the targeted php file.
                        // (stopped printing all data in php file by using die command)
                        console.log(data)
                        
                        if(data === "success") console.log("Code sent")/* alert('Verification Code Sent') */
                        else if(data === "failed") {

                            // alert('Sending verification code failed')

                            if(document.getElementById('timer-container').style.display === 'flex') {
                                document.getElementById('timer-container').style.display = 'none'
                            }
                        }
                        else if(data.startsWith('cannot_update_code')) {

                            let time = data.split('|')
                            time = time[1].split(':')

                            let totalTime = parseInt(time[0]) * 60 + parseInt(time[1])

                            const intervalId = setInterval(updateTimer, 1000)

                            function updateTimer() {
                                // Display the formatted time in the timer element
                                displayTime(totalTime)
                                if(document.getElementById('timer-container').style.display === 'none') {
                                    document.getElementById('timer-container').style.display = 'flex'
                                }

                                if (totalTime <= 0) {
                                    // If the timer reaches zero, stop the timer
                                    clearInterval(intervalId)
                                } else {
                                    // Decrease the total time by 1 second
                                    totalTime--;
                                }
                            }

                            function displayTime(seconds) {
                                // Convert total seconds to minutes and seconds
                                const minutes = Math.floor(seconds / 60)
                                const remainingSeconds = seconds % 60

                                // Format the minutes and seconds with leading zeros
                                const formattedMinutes = padZero(minutes)
                                const formattedSeconds = padZero(remainingSeconds)

                                // Display the formatted time in the timer element
                                document.getElementById('timer').innerHTML = `${formattedMinutes}:${formattedSeconds}`
                            }

                            function padZero(value) {
                                return value < 10 ? `0${value}` : value
                            }

                        } else if(data === 'code_updated') {

                            if(document.getElementById('timer-container').style.display === 'flex') {
                                document.getElementById('timer').style.display = 'none'
                                document.getElementById('timer-text').style.display = 'none'
                            }

                            // alert("Verification Code Updated")
                        }

                        send_code_label.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: rebeccapurple"><path d="M440-122q-121-15-200.5-105.5T160-440q0-66 26-126.5T260-672l57 57q-38 34-57.5 79T240-440q0 88 56 155.5T440-202v80Zm80 0v-80q87-16 143.5-83T720-440q0-100-70-170t-170-70h-3l44 44-56 56-140-140 140-140 56 56-44 44h3q134 0 227 93t93 227q0 121-79.5 211.5T520-122Z"/></svg>'

                    })
                } catch (e) {
                    console.log("Error - Couldn't send email")
                }
            }
        </script>

        <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/loader.css">

    </div>
</body>

</html>