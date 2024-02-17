<html lang="en">
<?php $this->view('includes/head', ['style' => "pages/create_event.css"]) ?>

<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 pad-10 dis-flex ju-co-st al-it-st">
            <div class="event-form bg-white">

                <form id="form">
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
                                <span class="label">Singers</span>
                                <p>3</p>
                            </div>
                            <div class="circle">
                                <span class="label">Bands</span>
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
                                    <input type="text" id="name" placeholder="Name of the Event">
                                    <div class="error"></div>
                                </div>

                                <div class="item">
                                    <label for="province">Province</label>
                                    <select name="province" id="province" onchange="updateDistrict()">
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
                                    <select name="district" id="district"></select>
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
                                    <input type="datetime-local" id="start_time">
                                    <div class="error"></div>
                                </div>
                                <div class="item">
                                    <label for="end_time">Ending Date & Time</label>
                                    <input type="datetime-local" id="end_time">
                                    <div class="error"></div>
                                </div>
                            </div>

                        </div>

                        <!-- Slide 02 -->
                        <div class="slide venue-data" id="slide-2">

                            <div class="error"></div>

                            <?php
                                if(!empty($venues)) {
                                    foreach ($venues as $venue) {
                                        $this->view('common/events/components/venue', (array)$venue);
                                    };
                                    echo '
                                        <label class="venue_label" onclick="radio_check(this)">
                                            <div class="venue-item" style="display: flex; justify-content: space-between; gap: 10px">
                                            
                                                <h3>Add Custom Venue</h3>
                                            
                                                <input type="text" name="address" placeholder="Address">
                                                
                                                <div class="item">
                                                    <label for="venue_province">Province</label>
                                                    <select name="venue_province" id="venue_province" onchange="updateDistrict(2)">
                                                        <option value="central">Central</option>
                                                        <option value="eastern">Eastern</option>
                                                        <option value="northCentral">North Central</option>
                                                        <option value="northern">Northern</option>
                                                        <option value="northWestern">North Western</option>
                                                        <option value="sabaragamuwa">Sabaragamuwa</option>
                                                        <option value="southern">Southern</option>
                                                        <option value="uva">Uva</option>
                                                        <option value="western" selected>Western</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label for="venue_district">District</label>
                                                    <select name="venue_district" id="venue_district"></select>
                                                </div>
                          
                                            </div>
                                            <input type="radio" name="venue_id" value="None" style="display: none">
                                        </label>';
                                } else {
                                    echo "No Venues to Display";
                                }
                            ?>
                        </div>

                        <div class="slide" id="slide-3">

                            <div class="error"></div>

                            <?php
                            if(!empty($bands)) {
                                foreach ($bands as $band) {
                                    $this->view('common/events/components/band', (array)$band);
                                };
                                echo '
                                        <label class="venue_label" onclick="radio_check(this)">
                                            <div class="venue-item" style="display: flex; justify-content: space-between; gap: 10px">
                                            
                                                <h3>Add Custom Venue</h3>
                                            
                                                <input type="text" name="address" placeholder="Address">
                                                
                                                <div class="item">
                                                    <label for="venue_province">Province</label>
                                                    <select name="venue_province" id="venue_province" onchange="updateDistrict(2)">
                                                        <option value="central">Central</option>
                                                        <option value="eastern">Eastern</option>
                                                        <option value="northCentral">North Central</option>
                                                        <option value="northern">Northern</option>
                                                        <option value="northWestern">North Western</option>
                                                        <option value="sabaragamuwa">Sabaragamuwa</option>
                                                        <option value="southern">Southern</option>
                                                        <option value="uva">Uva</option>
                                                        <option value="western" selected>Western</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label for="venue_district">District</label>
                                                    <select name="venue_district" id="venue_district"></select>
                                                </div>
                          
                                            </div>
                                            <input type="radio" name="venue_id" value="None" style="display: none">
                                        </label>';
                            } else {
                                echo "No Venues to Display";
                            }
                            ?>
                        </div>

                        <div class="slide" id="slide-4">
                            Slide 04
                        </div>

                        <div class="slide" id="slide-5">
                            Slide 05
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

        // Form element selection

        // For slide 01
        const event_name =document.querySelector('#name')
        const province =document.querySelector('#province')
        const district =document.querySelector('#district')
        const details =document.querySelector('#details')
        const start_time = document.querySelector('#start_time')
        const end_time = document.querySelector('#end_time')

        let starting_time
        let ending_time
        let current_time

        // For slide 02
        const venue_items = document.querySelectorAll('.venue_label')
        const slide2 = document.getElementById('slide-2')
        const slide3 = document.getElementById('slide-3')
        const slide4 = document.getElementById('slide-4')

        const progress = document.getElementById('progress')
        const prev = document.getElementById('prev')
        const next = document.getElementById('next')
        const circles = document.querySelectorAll('.circle')

        const form = document.getElementById('form')

        const slides = document.querySelectorAll('.slide')

        let currentActive = 1

        errors = []

        // Validation function
        function validate(page) {
            errors = []
            document.querySelectorAll('.error').forEach(element => {
                element.textContent = ''
            })

            switch (page) {
                case 1 :

                    let maximum_ending_time
                    let minimum_ending_time

                    if(event_name.value === "") {
                        errors.push("event_name")
                        event_name.nextElementSibling.textContent = "Event name cannot be empty"
                    }

                    if(details.value === "") {
                        errors.push("details")
                        details.nextElementSibling.textContent = "Event details cannot be empty"
                    }

                    if(start_time.value === "") {
                        errors.push("start_time")
                        start_time.nextElementSibling.textContent = "Enter the event starting time"
                    } else {
                        // Converting the datetime to a JS Date object
                        starting_time = new Date(start_time.value)

                        minimum_ending_time = new Date(starting_time.getTime() + (2 * 60 * 60 * 1000))

                        // console.log(starting_time)
                    }

                    if(end_time.value === "") {
                        errors.push("end_time")
                        end_time.nextElementSibling.textContent = "Enter the event ending time"
                    } else {
                        // Converting the datetime to a JS Date object
                        ending_time = new Date(end_time.value)
                        maximum_ending_time = new Date(starting_time.getTime() + (10 * 60 * 60 * 1000))
                        // console.log(ending_time)
                    }

                    if(start_time.value !== "" && end_time.value !== "") {
                        if(ending_time <= minimum_ending_time) {
                            errors.push("invalid_duration")
                            end_time.nextElementSibling.textContent = "The minimum time duration for an event is 2 Hours"
                        } else if(ending_time >= maximum_ending_time) {
                            errors.push("invalid_duration")
                            end_time.nextElementSibling.textContent = "The maximum time duration for an event is 10 Hours"
                        }
                    }





                    break

                case 2:
                    let selected = false

                    for(let i = 0;i < venue_items.length; i++) {
                        // console.log(venue_items[i])
                        if(venue_items[i].querySelector('input').checked) {
                            selected = true
                            break
                        }
                    }
                    if(!selected) {
                        errors.push("no venue selected")
                        slide02.querySelector('.error').textContent = "Please Select a venue or Add a custom venue"
                    }
                    break

                // case 3:
                //     if(password.value === "") errors.push("password")
                //     if(confirmPass.value === "") errors.push("confirmPass")
                //     if(confirmPass.value !== password.value) {
                //         errors.push("confirmPass")
                //         confirmPass_error.textContent = "Passwords donot match"
                //     }
                //     break

                default:
                    errors = []
                    break
            }

            return errors.length <= 0
        }

        // Showing only the relevant slide
        for(let i = 0; i<slides.length; i++) {
            if(i === 0) {
                slides[i].style.display = 'flex'
            } else {
                slides[i].style.display = 'none'
            }
        }

        // What happens when the next button is clicked
        next.addEventListener('click', () => {
            currentActive++

            if(currentActive > circles.length){
                currentActive = circles.length
            }

            if(validate(currentActive-1)) {
                update()
                circles[currentActive-2].querySelector('p').style.display = 'none'
                if(circles[currentActive-2].querySelector('svg')) circles[currentActive-2].querySelector('svg').remove()
                circles[currentActive-2].innerHTML += '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: mediumpurple"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>'
            } else {
                console.log(errors)
                circles[currentActive-2].querySelector('p').style.display = 'none'
                if(circles[currentActive-2].querySelector('svg')) circles[currentActive-2].querySelector('svg').remove()
                circles[currentActive-2].innerHTML += '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" style="fill: mediumpurple" width="24"><path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>'
                currentActive--
            }

        })

        // What happens when the prev button is clicked
        prev.addEventListener('click', () => {
            currentActive--

            if(currentActive < 1){
                currentActive = 1
            }

            update()
            circles[currentActive].querySelector('p').style.display = 'block'
            if(circles[currentActive].querySelector('svg')) circles[currentActive].querySelector('svg').remove()

        })

        function update(){
            circles.forEach((circle, idx) => {
                if (idx < currentActive) {
                    circle.classList.add('active')
                }else{
                    circle.classList.remove('active')
                }
            })


            const actives = document.querySelectorAll('.active.circle')

            progress.style.width = (actives.length - 1) / (circles.length - 1) * 100 + '%'

            // Showing only the relevant slide
            for(let i = 0; i<slides.length; i++) {
                if(i === currentActive-1) {
                    slides[i].style.display = 'flex'
                } else {
                    slides[i].style.display = 'none'
                }
            }

            // Function to handle the button click and redirect
            function redirect_btn() {
                window.location.href = '<?= ROOT ?>/signup'
            }


            if(currentActive === 1){
                // prev.innerHTML = 'Type'
                // prev.onclick = redirect_btn
                next.onclick = null
            }else if (currentActive === circles.length) {
                prev.innerHTML = 'Back'
                next.innerHTML = 'Signup'
                // next.onclick = submit_form
            } else {
                next.innerHTML = 'Next'
                prev.innerHTML = 'Back'
                prev.disabled = false
                next.disabled = false
                next.type = 'button'
                prev.onclick = null
                next.onclick = null
            }

            function submit_form() {

                if(terms.checked) form.submit()
                else terms_error.textContent = "Please agree to terms and conditions"

            }

        }


        // Function for selecting the district and province for the event location
        // City data for each province
        const cityData = {
            northern: ["Jaffna", "Kilinochchi", "Manner", "Mullaitivu", "Vavuniya"],
            northWestern: ["Puttalam", "Kurunegala"],
            western: ["Colombo", "Gampaha", "Kalutara"],
            northCentral: ["Anuradhapura", "Polonnaruwa"],
            central: ["Kandy", "Nuwara Eliya", "Matale"],
            sabaragamuwa: ["Kegalle", "Ratnapura"],
            eastern: ["Trincomalee", "Batticaloa", "Ampara"],
            uva: ["Badulla", "Monaragala"],
            southern: ["Hambantota", "Matara", "Galle"]
        };

        // Function to update the district options based on the selected province
        function updateDistrict(action = 1) {

            const provinceSelect = (action === 1) ? document.getElementById("province") : document.getElementById("venue_province")
            const districtSelect = (action === 1) ? document.getElementById("district") : document.getElementById("venue_district")

            districtSelect.innerHTML = ""

            const selectedProvince = provinceSelect.value

            const districts = cityData[selectedProvince]

            if (districts) {
                districts.forEach(district => {
                    const option = document.createElement("option")
                    option.value = district
                    option.textContent = district

                    districtSelect.appendChild(option)
                });
            } else {
                const option = document.createElement("option")
                option.textContent = "No cities available"
                districtSelect.appendChild(option)
            }
        }

        function radio_check(element, slide = 2) {
            let slideN = window['slide' + slide];
            if (slideN) {
                slideN.querySelector('.error').textContent = "";

                const venue_items = slideN.querySelectorAll('.venue_label');
                venue_items.forEach(item => {
                    item.classList.remove('selected');
                });

                element.classList.add('selected');
            } else {
                console.error(`Slide ${slide} not found.`);
            }
        }


        updateDistrict(1)
        updateDistrict(2)
    </script>

</div>
</body>
</html>