<html lang="en">
<?php $this->view('includes/head', ['style' => ['pages/event_status.css', 'components/progress_bar.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="dis-flex-col al-it-ba wid-100 pad-10 gap-10 event_status">

            <div class="event-status-container">

                <div style="text-align: center" class="progress-container-main">
                    <div class="progress-container">
                        <?php $progress_count = 3; ?>
                        <div class="progress" id="progress" style="width: <?= $progress_count*20 ?>%"></div>
                        <div class="circle active">
                            <span class="label">General Details</span>
                        </div>
                        <div class="circle <?= (empty($something)) ? 'active' : '' ?>">
                            <span class="label">Venue</span>
                            <p>2</p>
                        </div>
                        <div class="circle <?= (empty($something)) ? 'active' : '' ?>">
                            <span class="label">Bands</span>
                            <p>3</p>
                        </div>
                        <div class="circle <?= (empty($something)) ? 'active' : '' ?>">
                            <span class="label">Singers</span>
                            <p>4</p>
                        </div>
                        <div class="circle <?= (!empty($something)) ? 'active' : '' ?>">
                            <span class="label">Ticketing Plan</span>
                            <p>5</p>
                        </div>
                        <div class="circle <?= (!empty($something)) ? 'active' : '' ?>">
                            <span class="label">Confirmation</span>
                            <p>6</p>
                        </div>
                    </div>

                </div>

                <div class="participant-container">
                    <div class="participants">
                        <h2>Singers</h2>
                        <p>singer2</p>
                        <p>singer3</p>
                    </div>

                    <!-- Band Part -->
                    <div class="participants band">
                        <h2>Band</h2>
                        <div>
                            <img class="es-image" src="<?= ($custom->band) ? ROOT.'/assets/images/bands/general.png' : ($reservations['band'] ? ROOT.$band->image : ROOT.'/assets/images/bands/general.png' ) ?>" alt="band_image">
                            <div class="es-content">

                                <?php
                                if(!$custom->band && $reservations['band']) {
                                    switch ($band->status) {
                                        case 'Pending':
                                            $band_color = 'var(--status-pending-bg)';
                                            break;

                                        case 'Accepted':
                                            $band_color = 'var(--status-approve-bg)';
                                            break;

                                        case 'Denied':
                                            $band_color = 'var(--status-error-bg)';
                                            break;

                                        default:
                                            $band_color = 'var(--status-unknown-bg)';
                                            break;
                                    }
                                } else {
                                    $band_color = 'var(--status-unknown-bg)';
                                }
                                ?>

                                <div class="es-status">
                                    <p> Request Status : </p>
                                    <span style="background-color: <?= $band_color ?>"><?= ($custom->band) ? 'Unknown' : (($reservations['band']) ? $band->status : 'Not Selected') ?></span>
                                </div>

                                <div class="es-title">
                                    <h3>Name : </h3>
                                    <span><?= (!$reservations['band'] && $custom->band) ? $band : "Not Selected" ?></span>
                                </div>

                                <div class="es-buttons">
                                    <button class="button-s2 es-button" type="button" <?= ($custom->band) ? 'disabled' : ($reservations['band'] ? '' : 'disabled') ?> >
                                        <svg class="feather feather-x" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
                                        <span>Cancel</span>
                                    </button>
                                    <button class="button-s2 es-button" onclick="cancelRR(this, '<?php if(!$custom->band) echo $band->req_id; else echo 'NULL' ?>', 'band')" type="button" <?= ($custom->band) ? 'disabled' : ($reservations['band'] ? '' : 'disabled') ?> >
                                        <svg class="feather feather-phone" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                        <span>Call</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Venue Part -->
                    <div class="participants venue">
                        <h2>Venue</h2>
                        <div>
                            <img class="es-image" src="<?= ($custom->venue) ? ROOT.'/assets/images/bands/general.png' : ($reservations['venue'] ? ROOT.$venue->image : ROOT.'/assets/images/bands/general.png') ?>" alt="venue_image">
                            <?php
                                if(!$custom->venue && $reservations['venue']) {
                                    switch ($venue->status) {
                                        case 'Pending':
                                            $venue_color = 'var(--status-pending-bg)';
                                            break;

                                        case 'Accepted':
                                            $venue_color = 'var(--status-approve-bg)';
                                            break;

                                        case 'Denied':
                                            $venue_color = 'var(--status-error-bg)';
                                            break;

                                        default:
                                            $venue_color = 'var(--status-unknown-bg)';
                                            break;
                                    }
                                } else {
                                    $venue_color = 'var(--status-unknown-bg)';
                                }
                            ?>
                            <div class="es-content">
                                <div class="es-status">
                                    <p> Request Status : </p>
                                    <span style="background-color: <?= $venue_color ?>"><?= ($custom->venue) ? 'Unknown' : (($reservations['venue'] != 0) ? $venue->status : 'Not Selected') ?></span>
                                </div>

                                <div class="es-title">
                                    <h3>Name : </h3>
                                    <span><?= (!$reservations['venue'] && $custom->venue) ? $venue : "Not Selected" ?></span>
                                </div>

                                <div class="es-buttons">
                                    <button class="button-s2 es-button" onclick="cancelRR(this, '<?= (!$custom->venue) ? ($reservations['venue'] ? $venue->req_id : 'NULL') : 'NULL' ?>', 'venue')" type="button" <?= ($custom->venue) ? 'disabled' : ($reservations['venue'] ? '' : 'disabled') ?> >
                                        <svg class="feather feather-x" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
                                        <span>Cancel</span>
                                    </button>
                                    <button class="button-s2 es-button" type="button" <?= ($custom->venue) ? 'disabled' : ($reservations['venue'] ? '' : 'disabled') ?> >
                                        <svg class="feather feather-phone" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                        <span>Call</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <?= show($data) ?>
                </div>

            </div>

        </section>

    </main>


    <script>
        const nodes = document.querySelectorAll('.circle')
        const svg = `<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: mediumpurple"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>`
        nodes.forEach(node => {
            if(node.classList.contains('active')) {
                node.insertAdjacentHTML('beforeend', svg)
                const para = node.querySelector('p')
                if(para) para.remove()
            }
        })


        function cancelRR(element, req_id, type) {
            console.log(element, req_id)

            // Confirming before deleting the Reservation Request
            const confirmation = confirm('Are you sure you want to delete this request?')
            if (confirmation) {

                let data = {req_id}

                fetch(`/ento-project/public/eventm/cancel_request/${req_id}`, {
                    method: "POST",
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

                    if(data === 'success') {
                        element.innerHTML = `<span>Choose ${type}</span>`;
                        const image = element.parentElement.parentElement.parentElement.querySelector('img')
                        const status = element.parentElement.parentElement.querySelector('.es-status span')

                        if(type === 'venue') image.src = '<?=  ROOT.'/assets/images/venues/venue.png' ?>'
                        else if(type === 'band') image.src = '<?=  ROOT.'/assets/images/bands/general.png' ?>'

                        status.style.backgroundColor = `var(--status-unknown-bg)`
                        status.textContent = 'Unknown'
                    } else {
                        alert("Error occurred. Try Again later or Contact Customer Care Agent")
                    }

                    console.log(data)
                })

                console.log('User confirmed');
            } else {
                console.log('User canceled');
            }
        }
    </script>


</div>
</body>
</html>