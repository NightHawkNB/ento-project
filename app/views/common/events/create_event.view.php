<html lang="en">
<?php $this->view('includes/head', ['style' => ["pages/create_event.css", "components/progress_bar.css"]]) ?>

<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 pad-10 dis-flex ju-co-st al-it-st">
            <div class="event-form bg-white sh">

                <form id="form" method="post" enctype="multipart/form-data">
                    <div style="text-align: center" class="progress-container-main">
                        <div class="progress-container">
                            <div class="progress" id="progress"></div>
                            <div class="circle active">
                                <p></p>
                                <span class="label">General Details</span>
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: mediumpurple"><path d="M480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-155.5t86-127Q252-817 325-848.5T480-880q83 0 155.5 31.5t127 86q54.5 54.5 86 127T880-480q0 82-31.5 155t-86 127.5q-54.5 54.5-127 86T480-80Zm0-160q100 0 170-70t70-170q0-100-70-170t-170-70q-100 0-170 70t-70 170q0 100 70 170t170 70Z"/></svg>
                            </div>
                            <div class="circle">
                                <span class="label">Venue</span>
                                <p>2</p>
                            </div>
                            <div class="circle">
                                <span class="label">Bands</span>
                                <p>3</p>
                            </div>
                            <div class="circle">
                                <span class="label">Singers</span>
                                <p>4</p>
                            </div>
                            <div class="circle">
                                <span class="label">Ticketing Plan</span>
                                <p>5</p>
                            </div>
                            <div class="circle">
                                <span class="label">Confirmation</span>
                                <p>6</p>
                            </div>
                        </div>
                    </div>

                    <div class="slide-container">
                        <div class="slide" id="slide-1">
<!--                            Slide 01-->

                            <div class="panel">
                                <div class="cover-image">
                                    <img id="image-ad" class="bor-rad-5" src="<?= ROOT.'/assets/images/ads/general.png' ?>" alt="general image">
                                    <label for="image" class="pos-abs bor-rad-5 pad-10 bg-grey hover-pointer">
                                        <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                        <input onchange="load_image(this.files[0])" type="file" id="image" name="image" class="hide">
                                    </label>
                                    <div class="error"></div>
                                </div>

                                <div class="item">
                                    <label for="name">Event Name</label>
                                    <input type="text" id="name" name="name" placeholder="Name of the Event">
                                    <div class="error"></div>
                                </div>

                                <div class="item">
                                    <label for="province">Province</label>
                                    <select name="province" id="province" onchange="updateDistrict(); get_venues()">
                                        <option value="central">Central</option>
                                        <option value="eastern">Eastern</option>
                                        <option value="northCentral">North Central</option>
                                        <option value="northern">Northern</option>
                                        <option value="northWestern">North Western</option>
                                        <option value="sabaragamuwa">Sabaragamuwa</option>
                                        <option value="southern">Southern</option>
                                        <option value="uva">Uva</option>
                                        <option value="western">Western</option>
                                    </select>
                                </div>

                                <div class="item">
                                    <label for="district">District</label>
                                    <select name="district" id="district" onchange="get_venues()"></select>
                                </div>
                            </div>

                            <div class="panel details">
                                <div class="item" style="flex: 1">
                                    <label for="details">Event Details</label>
                                    <textarea style="flex: 1" name="details" id="details" cols="30" rows="5"></textarea>
                                    <div class="error"></div>
                                </div>
                                <div class="item">
                                    <label for="start_time">Starting Date & Time</label>
                                    <input type="datetime-local" id="start_time" name="start_time">
                                    <div class="error"></div>
                                </div>
                                <div class="item">
                                    <label for="end_time">Ending Date & Time</label>
                                    <input type="datetime-local" id="end_time" name="end_time">
                                    <div class="error"></div>
                                </div>
                            </div>

                        </div>

                        <!-- Slide 02 -->
                        <div class="slide venue-data" id="slide-2">

                            <div class="error"></div>

<!--                            --><?php
//                                if(!empty($venues)) {
//                                    foreach ($venues as $venue) {
//                                        $this->view('common/events/components/venue', (array)$venue);
//                                    };
//                                } else {
//                                    echo "No Venues to Display";
//                                }
//                            ?>

                            <label class="venue_label custom_venue" for="custom_venue" onclick="radio_check(this)">
                                <div class="venue-item" style="display: flex; justify-content: space-between; gap: 10px">
                                    <input type="radio" name="venue_id" id="custom_venue" value="custom" style="display: none">
                                    <h3>Add Custom Venue</h3>

                                    <input type="text" name="custom_venue_address" placeholder="Address">

                                </div>
                            </label>

                        </div>

                        <!-- Slide 03 -->
                        <div class="slide band-data" id="slide-3">

                            <div class="error"></div>

                            <?php
                            if(!empty($bands)) {
                                foreach ($bands as $band) {
                                    $this->view('common/events/components/band', (array)$band);
                                };
                            } else {
                                echo "No Bands to Display";
                            }
                            ?>

                            <label class="venue_label custom_band" for="custom_band" onclick="radio_check(this, 3)">
                                <input type="radio" name="band_data" id="custom_band" value="custom" style="display: none">
                                <div class="venue-item" style="display: flex; justify-content: space-between; gap: 10px">

                                    <h3>Add Custom Band</h3>
                                    <input type="text" name="custom_band" placeholder="Enter the band name">
                                </div>
                            </label>
                        </div>

                        <!-- Slide 04 -->
                        <div class="slide singer-data" id="slide-4">
                            <div class="error"></div>

                            <?php
                                if(!empty($singers)) {
                                    foreach ($singers as $singer) {
                                        $this->view('common/events/components/singer', (array)$singer);
                                    };
                                } else {
                                    echo "No Bands to Display";
                                }
                            ?>

                            <label id="custom_singer_label" for="singer_checkbox" class="venue_label custom_singer" onclick="checkbox_select()">
                                <input type="checkbox" name="singer_checkbox" id="singer_checkbox" value="custom_singer" style="display: none">
                                <div class="venue-item" style="display: flex; justify-content: space-between; gap: 10px">
                                    <h3>Add Custom Singer</h3>
                                    <input type="text" name="custom_singer" placeholder="Sadun kalhara, Rodriges">
                                </div>
                            </label>
                        </div>

                        <!-- Slide 05 -->
                        <div class="slide ticket-data" id="slide-5">
                            <div class="error"></div>

                            <div class="slide-inner">
                                <!-- Basic Ticket Template -->
                                <label for="ticket_01" class="venue_label" onclick="checkbox_select(5)">
                                    <input type="checkbox" name="ticket_01" class="ticket_checkbox" id="ticket_01" value="ticket_01" style="display: none">
                                    <div class="venue-item">
                                        <img src="<?= ROOT ?>/assets/images/event/event1.png" alt="singer-image" style="width: 150px; aspect-ratio: 1/1; border-radius: 5px">
                                        <h3>Basic Ticket</h3>

                                        <div>
                                            <p>Price</p>
                                            <input type="number" id="basic_ticket_price" name="basic_ticket_price" placeholder="Basic ticket price in LKR">
                                        </div>

                                        <div>
                                            <p>Count</p>
                                            <input type="number" id="basic_ticket_count" name="basic_ticket_count" placeholder="Basic ticket count">
                                        </div>

                                    </div>
                                </label>

                                <!-- Premium Ticket Template -->
                                <label for="ticket_02" class="venue_label" onclick="checkbox_select(5)">
                                    <input type="checkbox" name="ticket_02" class="ticket_checkbox" id="ticket_02" value="ticket_02" style="display: none">
                                    <div class="venue-item">

                                        <img src="<?= ROOT ?>/assets/images/event/event2.png" alt="singer-image" style="width: 150px; aspect-ratio: 1/1; border-radius: 5px">

                                        <h3>Premium Ticket</h3>

                                        <div>
                                            <p>Price</p>
                                            <input type="number" id="premium_ticket_price" name="premium_ticket_price" placeholder="Premium ticket price in LKR">
                                        </div>

                                        <div>
                                            <p>Count</p>
                                            <input type="number" id="premium_ticket_count" name="premium_ticket_count" placeholder="Premium ticket count">
                                        </div>

                                    </div>
                                </label>
                            </div>

                        </div>

                        <div class="slide" id="slide-6">
                            Slide 06
                        </div>
                    </div>

                    <div class="wid-100 dis-flex ju-co-sa">
                        <button id="prev" type="button" class="button-s2">Prev</button>
                        <button id="next" type="button" class="button-s2">Next</button>
                    </div>

                </form>

            </div>
        </section>
    </main>

    <script>

        let chosen_district
        const ROOT = '<?= ROOT ?>'

        function get_venues() {

            const venue_div = document.querySelector('.venue-data')
            const existingElement = document.querySelector('.custom_venue')

            venue_div.querySelectorAll('.removable').forEach(item => {
                item.remove()
            })

            chosen_district = document.querySelector('#district').value
            console.log(chosen_district)
            let data = {'district': chosen_district}

            fetch(`/ento-project/public/eventm/create_event`, {
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

                if(data !== 'no_venues') {

                    console.log(venue_div)
                    console.log(existingElement)

                    data = JSON.parse(data)
                    console.log(data)

                    data.forEach(item => {
                        const newElement = document.createElement('div')
                        newElement.innerHTML = `
                        <label for="VEN_${item.venue_id}" class="venue_label removable" onclick="radio_check(this)">
                            <div class="venue-item" data-location="${item.location}">
                                <img src="${ROOT + item.image}" alt="venue-image" style="width: 50px; aspect-ratio: 1/1; border-radius: 50%">
                                <p>${item.name}</p>
                                <p>${item.seat_count}</p>
                                <p>${item.location}</p>
                            </div>
                            <input type="radio" name="venue_id" id="VEN_${item.venue_id}" value="${item.venue_id}" style="display: none">
                        </label>
                    `
                        venue_div.insertBefore(newElement, existingElement)
                    })

                } else console.log("No venue data found")

            })
        }
    </script>

    <script src="<?= ROOT ?>/assets/scripts/pages/create_event.js" defer></script>

</div>
</body>
</html>