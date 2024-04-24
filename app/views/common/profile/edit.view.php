<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <style>
            .profile-page {
                background-color: var(--white);
                padding: 10px;
                border-radius: 10px;
                min-width: 850px;
                width: fit-content;
                height: fit-content;
                display: flex;
                justify-content: center;

                button {
                    width: fit-content;
                }

                form {
                    width: 100%;
                    max-width: 800px;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    /*background-color: red;*/

<<<<<<< HEAD
                    input,
                    select,
                    option {
                        outline: none;
                        border: thin solid grey;
                        border-radius: 5px;
                        padding: 10px 10px 10px 15px;
                        min-width: 200px;
                        font-family: Poppins, sans-serif;
                    }
=======
        <?php if(($user->user_id == Auth::getUser_id()) AND ($user->user_type != 'client' AND $user->user_type != 'venuem' AND $user->user_type != 'venueo')) : ?>
            <div class="option-bar">
                <div class="profile_visibility">
>>>>>>> 19e4d6aa5610f46aea5ed1ba5eec5a556f694cf1

                    input::placeholder {
                        color: gray;
                    }

                    input:disabled {
                        background-color: var(--white-link);
                        border: none;
                        text-align: center;
                        letter-spacing: 2px;
                        font-weight: bold;
                    }

                    div.p-img {
                        width: fit-content;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        flex-direction: column;

                        img {
                            object-fit: cover;
                            width: 200px;
                            aspect-ratio: 1/1;
                        }

<<<<<<< HEAD
                        label {
                            right: -10;
                            bottom: -10;
                            width: fit-content;
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            position: absolute;
                            border-radius: 5px;
                            padding: 10px;
                            background-color: var(--dark-grey);

                            &:hover {
                                cursor: pointer;
                            }
                        }
                    }


                    div.p-i-container {
                        display: flex;
                        gap: 10px;

                        div {
                            display: flex;
                            flex-direction: column;
                            width: 100%;

                            label {
                                color: var(--font-primary);
                                font-weight: bold;
                            }
                        }
                    }


                }

            }
        </style>

        <main class="dashboard-main wid-100">
            <section class="wid-100 dis-flex ju-co-ce pad-10 al-it-st">
                <div class="profile-page">
                    <form method="post" enctype="multipart/form-data" class="">
                        <div class="pos-rel p-img">
                            <img id="image-ad" class="bor-rad-5" src="<?= (str_contains($user->image, 'general')) ? ROOT.'assets/images/ads/general.png' :  ROOT.$user->image ?>" alt="general image">
=======
                <form method="post" enctype="multipart/form-data" class="wid-100">
                    <div class="pos-rel p-img">
                        <img id="image-ad" class="bor-rad-5" src="<?= (str_contains($user->image, 'general')) ? ROOT.'/assets/images/users/general.jpg' :  ROOT.$user->image ?>" alt="general image">
                        <?php if($user->user_id == Auth::getUser_id()) : ?>
>>>>>>> 19e4d6aa5610f46aea5ed1ba5eec5a556f694cf1
                            <label for="image">
                                <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                <input onchange="load_image(this.files[0])" type="file" id="image" name="image" class="hide">
                            </label>
<<<<<<< HEAD
                            <div class="error"></div>
=======
                        <?php endif; ?>
                        <div class="error"></div>


                        <?php if(($user->user_id == Auth::getUser_id()) AND ($user->user_type != 'client' AND $user->user_type != 'venuem' AND $user->user_type != 'venueo')): ?>
                            <script>
                                // Script for changing the public_profile's visibility

                                const checkbox = document.querySelector('.checkbox')
                                const visible_text = document.querySelector('.js-left-text')
                                const hidden_text = document.querySelector('.js-right-text')

                                let current_visibility = <?= $user->profile_visible ?> // Getting the current visibility of the user

                                // Running the toggle_visibility function when the page loads to update the button

                                    if (current_visibility === 0) {
                                        visible_text.style.color = 'grey'
                                        hidden_text.style.color = '#f44336'
                                        checkbox.checked = true
                                    } else {
                                        visible_text.style.color = 'mediumpurple'
                                        hidden_text.style.color = 'grey'
                                        checkbox.checked = false
                                    }


                                function toggle_visibility() {

                                    if (!checkbox.checked) {
                                        visible_text.style.color = 'mediumpurple'
                                        hidden_text.style.color = 'grey'
                                    } else {
                                        visible_text.style.color = 'grey'
                                        hidden_text.style.color = '#f44336'
                                    }

                                    let visibility = checkbox.checked ? 0 : 1
                                    if(current_visibility !== visibility) update_visibility(visibility)

                                }

                                // Adding an event listener to the checkbox to update the visibility when the checkbox is clicked
                                checkbox.addEventListener('change', toggle_visibility)

                                function update_visibility(visibility) {
                                    let data = {visibility}
                                    // console.log("RAN")
                                    fetch(`/ento-project/public/<?= $_SESSION['USER_DATA']->user_type ?>/profile/edit-profile/visibility`, {
                                        method: "PATCH",
                                        headers: {
                                            "Content-Type": "application/json; charset=utf-8"
                                        },
                                        body: JSON.stringify(data)
                                    }).then(res => {
                                        // console.log(res)
                                        return res.text()
                                    }).then(data => {

                                        if(data === "success") current_visibility = visibility
                                        // else current_visibility = !visibility

                                        // Shows the data printed by the targeted php file.
                                        // (stopped printing all data in php file by using die command)
                                        // console.log(data)
                                    })
                                }
                            </script>
                        <?php endif; ?>

                    </div>

                    <div class="p-i-container" style="padding-top: 20px">
                        <div class="">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" value="<?= set_value($user->fname) ?>" <?= $user->user_id == Auth::getUser_id() ? '' : 'disabled' ?>>
>>>>>>> 19e4d6aa5610f46aea5ed1ba5eec5a556f694cf1
                        </div>

                        <div class="p-i-container" style="padding-top: 20px">
                            <div class="">
                                <label for="fname">First Name</label>
                                <input type="text" name="fname" value="<?= set_value($user->fname) ?>">
                            </div>

<<<<<<< HEAD
                            <div class="">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" value="<?= set_value($user->lname) ?>">
                            </div>
=======
                    <?php if($user->user_id == Auth::getUser_id()): ?>
                    <div class="p-i-container">
                        <div class="">
                            <label for="email">Email</label>
                            <input type="text" name="email" value='<?= $user->email ?>' <?= $user->user_id == Auth::getUser_id() ? '' : 'disabled' ?>>
>>>>>>> 19e4d6aa5610f46aea5ed1ba5eec5a556f694cf1
                        </div>

                        <div class="p-i-container">
                            <div class="">
                                <label for="email">Email</label>
                                <input type="text" name="email" value='<?= $user->email ?>' >
                            </div>

                            <div class="">
                                <label for="contact_num">Contact Number</label>
                                <input type="tel" size="10" pattern="[0]{1}[0-9]{9}" name="contact_num" value="<?= set_value($user->contact_num) ?>">
                            </div>
                        </div>

                        <div class="p-i-container">
                            <div class="nic_num">
                                <label for="nic_num">NIC Number</label>
                                <input type="text" name="nic_num" value="<?= $user->nic_num ?? "Not_Verfied" ?>" disabled >
                            </div>
                        </div>

                        <div class="p-i-container">

<<<<<<< HEAD
                            <div class="">
                                <label for="province">Province</label>
                                <select name="province" id="province" onchange="updateDistrict()">
                                    <option value="central" <?= ($user->province == "central") ? 'selected' : '' ?>>Central</option>
                                    <option value="eastern" <?= ($user->province == "eastern") ? 'selected' : '' ?>>Eastern</option>
                                    <option value="northCentral" <?= ($user->province == "northCentral") ? 'selected' : ''?>>North Central</option>
                                    <option value="northern" <?= ($user->province == "northern") ? 'selected' : ''?>>Northern</option>
                                    <option value="northWestern" <?= ($user->province == "northWestern") ? 'selected'  : ''?>>North Western</option>
                                    <option value="sabaragamuwa" <?= ($user->province == "sabaragamuwa") ? 'selected'  : ''?>>Sabaragamuwa</option>
                                    <option value="southern" <?= ($user->province == "southern") ? 'selected'  : '' ?>>Southern</option>
                                    <option value="uva" <?= ($user->province == "uva") ? 'selected' : '' ?>>Uva</option>
                                    <option value="western" <?= ($user->province == "western") ? 'selected' : ''?>>Western</option>
                                </select>
                            </div>

                            <div class="">
                                <label for="district">District</label>
                                <select name="district" id="district"></select>
                            </div>
                        </div>

                        <div class="p-i-container">
                            <div class="">
                                <label for="address1">Address 01</label>
                                <input type="text" name="address1" value="<?= $user->address1 ?>" >
                            </div>

                            <div class="">
                                <label for="address2">Address 02</label>
                                <input type="text" name="address2" value="<?= $user->address2 ?>" >
                            </div>
                        </div>

                        <div class="wid-100 dis-flex ju-co-ce">
                            <button type="submit" class="button-s2">Save Changes</button>
                        </div>
                    </form>
=======
                    <?php endif; ?>

                    <?php if(Auth::is_singer()): ?>
                        <div class="dis-flex gap-20">
                            <div class="dis-flex-col ju-co-ce">
                                <label for="spotify_link" class="dis-flex gap-10 al-it-ce" style="margin-bottom: 5px; color: var(--font-primary);">
                                    <svg style="fill: #00c853; aspect-ratio: 1/1; width: 30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path d="M248 8C111.1 8 0 119.1 0 256s111.1 248 248 248 248-111.1 248-248S384.9 8 248 8zm100.7 364.9c-4.2 0-6.8-1.3-10.7-3.6-62.4-37.6-135-39.2-206.7-24.5-3.9 1-9 2.6-11.9 2.6-9.7 0-15.8-7.7-15.8-15.8 0-10.3 6.1-15.2 13.6-16.8 81.9-18.1 165.6-16.5 237 26.2 6.1 3.9 9.7 7.4 9.7 16.5s-7.1 15.4-15.2 15.4zm26.9-65.6c-5.2 0-8.7-2.3-12.3-4.2-62.5-37-155.7-51.9-238.6-29.4-4.8 1.3-7.4 2.6-11.9 2.6-10.7 0-19.4-8.7-19.4-19.4s5.2-17.8 15.5-20.7c27.8-7.8 56.2-13.6 97.8-13.6 64.9 0 127.6 16.1 177 45.5 8.1 4.8 11.3 11 11.3 19.7-.1 10.8-8.5 19.5-19.4 19.5zm31-76.2c-5.2 0-8.4-1.3-12.9-3.9-71.2-42.5-198.5-52.7-280.9-29.7-3.6 1-8.1 2.6-12.9 2.6-13.2 0-23.3-10.3-23.3-23.6 0-13.6 8.4-21.3 17.4-23.9 35.2-10.3 74.6-15.2 117.5-15.2 73 0 149.5 15.2 205.4 47.8 7.8 4.5 12.9 10.7 12.9 22.6 0 13.6-11 23.3-23.2 23.3z"/></svg>
                                    <span>Spotify Link</span>
                                </label>
                                <input type="text" id="spotify_link" placeholder="Enter Spotify link" name="spotify_link">
                                <div class="error"></div>
                            </div>

                            <div class="dis-flex-col gap-10 ju-co-ce">
                                <label for="youtube_link" class="dis-flex gap-10 al-it-ce" style="color: var(--font-primary);">
                                    <svg style="fill: #ff3c42; aspect-ratio: 1/1; width: 30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/></svg>
                                    <span>YouTube Link</span>
                                </label>
                                <input type="text" id="youtube_link" placeholder="Enter YouTube link" name="youtube_link">
                                <div class="error"></div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(($user->user_id == Auth::getUser_id()) AND ($user->user_type != 'client' OR $user->user_type != 'venuem' OR $user->user_type != 'venueo')) : ?>
                        <div class="dis-flex ju-co-ce">
                            <button type="submit" class="button-s2">Save Changes</button>
                        </div>
                    <?php endif; ?>

                </form>

            </div>

            <?php if($user->user_type != 'client' OR $user->user_type != 'venuem' OR $user->user_type != 'venueo'): ?>
                <div class="past_event_section">
                    <div class="pes-header">
                        <h2>Past Events</h2>
                    </div>

                    <div class="pes-content">
                        <?php if(empty($past_events)) {
                            echo "<h3>No past events to show</h3>";
                        } else {

                            foreach ($past_events as $event) {
                                $this->view("common/profile/components/event", (array)$event);
                            }

    //                        show($past_events);
                        } ?>
                    </div>
>>>>>>> 19e4d6aa5610f46aea5ed1ba5eec5a556f694cf1
                </div>
            </section>
        </main>
    </div>

<<<<<<< HEAD
    <script>
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
        function updateDistrict() {

            const provinceSelect = document.getElementById("province")
            const districtSelect = document.getElementById("district")

            districtSelect.innerHTML = ""

            // Currently selected district
            let currentDistrict = "<?= ($user->district) ? ucfirst(strtolower($user->district)) : '' ?>"

            const selectedProvince = provinceSelect.value

            const districts = cityData[selectedProvince]
=======
                <div class="past_review_section">
                    <div class="pes-header">
                        <h2>User Reviews</h2>
                    </div>

                    <div class="pes-content">
                        <?php if(empty($reviews)) {
                            echo "<h3>No reviews to show</h3>";
                        } else {

                            foreach ($reviews as $review) {
                                $this->view("common/profile/components/review", (array)$review);
                            }

    //                        show($reviews);
                        } ?>
                    </div>
                </div>
            <?php endif; ?>
>>>>>>> 19e4d6aa5610f46aea5ed1ba5eec5a556f694cf1

            if (districts) {
                districts.forEach(district => {
                    const option = document.createElement("option")
                    option.value = district
                    option.textContent = district

                    // Selecting the currently selected district
                    if(currentDistrict === district) option.selected = true

                    districtSelect.appendChild(option)
                });
            } else {
                const option = document.createElement("option")
                option.textContent = "No cities available"
                districtSelect.appendChild(option)
            }
        }

<<<<<<< HEAD
        updateDistrict()
    </script>
=======
    <?php if($user->user_id == Auth::getUser_id()): ?>
    updateDistrict()
    <?php endif; ?>
</script>
>>>>>>> 19e4d6aa5610f46aea5ed1ba5eec5a556f694cf1

</body>
</html>