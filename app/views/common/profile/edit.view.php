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