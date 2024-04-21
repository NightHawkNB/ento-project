<html lang="en">
<?php $this->view('includes/head', ['style' => ['pages/edit_profile.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main wid-100">

        <?php if($user->user_id == Auth::getUser_id()) : ?>
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <?php endif; ?>

        <section class="wid-100 dis-flex-col ju-co-sa" style="padding: 10px 10px 10px 10px; gap: 30px;">

        <?php if(($user->user_id == Auth::getUser_id()) AND ($user->user_type != 'client' OR $user->user_type != 'venuem' OR $user->user_type != 'venueo')) : ?>
            <div class="option-bar">
                <div class="profile_visibility">

                    <h3 style="font-family: Poppins, serif">Profile <br/> Visibility</h3>

                    <div class="toggle-button-cover">
                        <div class="button-cover">
                            <p class="js-left-text">VISIBLE</p>
                            <div class="button r" id="button-3">
                                <input type="checkbox" class="checkbox" />
                                <div class="knobs"></div>
                                <div class="layer"></div>
                            </div>
                            <p class="js-right-text">HIDDEN</p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

            <div>
                <button class="button-s2" onclick="goBack()">Back</button>
            </div>

            <div class="profile-page">

                <form method="post" enctype="multipart/form-data" class="wid-100">
                    <div class="pos-rel p-img">
                        <img id="image-ad" class="bor-rad-5" src="<?= (str_contains($user->image, 'general')) ? ROOT.'/assets/images/users/general.jpg' :  ROOT.$user->image ?>" alt="general image">
                        <?php if($user->user_id == Auth::getUser_id()) : ?>
                            <label for="image">
                                <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                <input onchange="load_image(this.files[0])" type="file" id="image" name="image" class="hide">
                            </label>
                        <?php endif; ?>
                        <div class="error"></div>

                        <script>
                            // Script for changing the public_profile's visibility

                            const checkbox = document.querySelector('.checkbox')
                            const visible_text = document.querySelector('.js-left-text')
                            const hidden_text = document.querySelector('.js-right-text')

                            let current_visibility = <?= $user->visible ?> // Getting the current visibility of the user

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
                                console.log("RAN")
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
                                    console.log(data)
                                })
                            }

                        </script>
                    </div>

                    <div class="p-i-container" style="padding-top: 20px">
                        <div class="">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" value="<?= set_value($user->fname) ?>" <?= $user->user_id == Auth::getUser_id() ? '' : 'disabled' ?>>
                        </div>

                        <div class="">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" value="<?= set_value($user->lname) ?>" <?= $user->user_id == Auth::getUser_id() ? '' : 'disabled' ?>>
                        </div>
                    </div>

                    <div class="p-i-container">
                        <div class="">
                            <label for="email">Email</label>
                            <input type="text" name="email" value='<?= $user->email ?>' <?= $user->user_id == Auth::getUser_id() ? '' : 'disabled' ?>>
                        </div>

                        <div class="">
                            <label for="contact_num">Contact Number</label>
                            <input type="tel" size="10" pattern="[0]{1}[0-9]{9}" name="contact_num" value="<?= set_value($user->contact_num) ?>" <?= $user->user_id == Auth::getUser_id() ? '' : 'disabled' ?>>
                        </div>
                    </div>

                    <div class="p-i-container">
                        <div class="nic_num">
                            <label for="nic_num">NIC Number</label>
                            <input type="text" name="nic_num" value="<?= $user->nic_num ?? "Not_Verfied" ?>" disabled >
                        </div>
                    </div>

                    <div class="p-i-container">

                        <div class="">
                            <label for="province">Province</label>
                            <select name="province" id="province" onchange="updateDistrict()" <?= $user->user_id == Auth::getUser_id() ? '' : 'disabled' ?>>
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
                            <select name="district" id="district" <?= $user->user_id == Auth::getUser_id() ? '' : 'disabled' ?>></select>
                        </div>
                    </div>

                    <div class="p-i-container">
                        <div class="">
                            <label for="address1">Address 01</label>
                            <input type="text" name="address1" value="<?= $user->address1 ?>" <?= $user->user_id == Auth::getUser_id() ? '' : 'disabled' ?>>
                        </div>

                        <div class="">
                            <label for="address2">Address 02</label>
                            <input type="text" name="address2" value="<?= $user->address2 ?>" <?= $user->user_id == Auth::getUser_id() ? '' : 'disabled' ?>>
                        </div>
                    </div>

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
                </div>

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

        </section>
    </main>
</div>

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

    updateDistrict()
</script>

</body>
</html>