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

        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="wid-100 dis-flex ju-co-ce pad-10 al-it-st">
            <div class="profile-page">
                <form method="post" enctype="multipart/form-data" class="">
                    <div class="pos-rel p-img">
                        <img id="image-ad" class="bor-rad-5" src="<?= (str_contains($user->image, 'general')) ? ROOT.'assets/images/ads/general.png' :  ROOT.$user->image ?>" alt="general image">
                        <label for="image">
                            <svg class="feather txt-c-white feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                            <input onchange="load_image(this.files[0])" type="file" id="image" name="image" class="hide">
                        </label>
                        <div class="error"></div>

                        <div class="profile_visibility">
                            <h2>Profile Visibility</h2>

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

                        <script>
                            // Script for changing the public_profile's visibility

                            const checkbox = document.querySelector('.checkbox')
                            const visible_text = document.querySelector('.js-left-text')
                            const hidden_text = document.querySelector('.js-right-text')

                            let current_visibility = <?= empty($_SESSION['USER_DATA']->visible) ? 0 : 1 ?> // Getting the current visibility of the user

                            // Running the toggle_visibility function when the page loads to update the button
                            if (current_visibility === 1) {
                                visible_text.style.color = 'mediumpurple'
                                hidden_text.style.color = 'grey'
                                checkbox.checked = false
                            } else {
                                visible_text.style.color = 'grey'
                                hidden_text.style.color = '#f44336'
                                checkbox.checked = true
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

                                fetch(`/ento-project/public/<?= $_SESSION['USER_DATA']->user_type ?>/public_profile/visibility`, {
                                    method: "POST",
                                    headers: {
                                        "Content-Type": "application/json; charset=utf-8"
                                    },
                                    body: JSON.stringify(data)
                                }).then(res => {
                                    // console.log(res)
                                    return res.text()
                                }).then(data => {

                                    if(data === "success") current_visibility = visibility
                                    else current_visibility = !visibility

                                    // Shows the data printed by the targeted php file.
                                    // (stopped printing all data in php file by using die command)
                                    // console.log(data)
                                })
                            }

                        </script>

                        <style>
                            .js-left-text,
                            .js-right-text {
                                font-size: 12px;
                                font-weight: bold;
                            }

                            .profile_visibility {
                                position: absolute;
                                top: 0;
                                left: 100%;
                                width: fit-content;
                                height: 100px;
                                display: flex;
                                flex-direction: column;
                                justify-content: center;
                                align-items: center;
                                gap: 10px;
                                color: var(--font-primary);
                            }

                            .toggle-button-cover {
                                background-color: transparent;
                                /*position: absolute;*/
                                /*top: 0;*/
                                /*left: 100%;*/
                                width: 300px;
                                height: 140px;
                                box-sizing: border-box;
                            }

                            .button-cover {
                                height: 100px;
                                border-radius: 4px;
                                display: flex;
                                gap: 15px;
                                justify-content: center;
                                align-items:center;
                                color: var(--font-primary);
                            }

                            .button-cover:before {
                                counter-increment: button-counter;
                                content: counter(button-counter);
                                position: absolute;
                                right: 0;
                                bottom: 0;
                                color: #d7e3e3;
                                font-size: 12px;
                                line-height: 1;
                                padding: 5px;
                            }

                            .button-cover,
                            .knobs,
                            .layer {
                                position: absolute;
                                top: 0;
                                right: 0;
                                bottom: 0;
                                left: 0;
                            }

                            .button {
                                position: relative;
                                width: 74px;
                                height: 36px;
                                overflow: hidden;
                            }

                            .button.r,
                            .button.r .layer {
                                border-radius: 100px;
                            }

                            .checkbox {
                                position: relative;
                                width: 100%;
                                height: 100%;
                                padding: 0;
                                margin: 0;
                                opacity: 0;
                                cursor: pointer;
                                z-index: 3;
                            }

                            .knobs {
                                z-index: 2;
                            }

                            .layer {
                                width: 100%;
                                background-color: var(--white-link);
                                transition: 0.3s ease all;
                                z-index: 1;
                            }

                            /* Button 3 */
                            #button-3 .knobs:before {
                                content: "";
                                position: absolute;
                                top: 4px;
                                left: 4px;
                                width: 20px;
                                height: 10px;
                                color: #fff;
                                font-size: 10px;
                                font-weight: bold;
                                text-align: center;
                                line-height: 1;
                                padding: 9px 4px;
                                background-color: var(--purple-secondary);
                                border-radius: 50%;
                                transition: 0.3s ease all, left 0.3s cubic-bezier(0.18, 0.89, 0.35, 1.15);
                            }

                            #button-3 .checkbox:active + .knobs:before {
                                width: 46px;
                                border-radius: 100px;
                            }

                            #button-3 .checkbox:checked:active + .knobs:before {
                                margin-left: -26px;
                            }

                            #button-3 .checkbox:checked + .knobs:before {
                                content: "";
                                left: 42px;
                                background-color: #f44336;
                            }

                            #button-3 .checkbox:checked ~ .layer {
                                background-color: #fcebeb;
                            }
                        </style>
                    </div>

                    <div class="p-i-container" style="padding-top: 20px">
                        <div class="">
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" value="<?= set_value($user->fname) ?>">
                        </div>

                        <div class="">
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" value="<?= set_value($user->lname) ?>">
                        </div>
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
            </div>
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