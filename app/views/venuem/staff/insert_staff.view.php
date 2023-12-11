<html lang="en">
<?php $this->view('includes/head') ?>

<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>

            <section class="cols-2 pad-10">
                <div class="glass-bg wid-100 dis-flex-col pad-20 bor-rad-5 al-it-ce">

                    <form method="POST" class="dis-flex-col al-it-ce ju-co-ce gap-20 user-update-form">
                        <h2>Register</h2>
                        <h3>Venue Operator</h3>
                        <fieldset class="pad-20 bor-rad-5 dis-flex-col gap-10">
                            <legend>Personal Details</legend>
                            <div class="input-container">
                                <div class="dis-flex-col <?= (!empty($errors['fname'])) ? 'error' : '' ?>">
                                    <label for="fname">First Name</label>
                                    <input type="text" name="fname" class="input" required>
                                    <i></i>
                                </div>
                                <div class="dis-flex-col <?= (!empty($errors['lname'])) ? 'error' : '' ?>">
                                    <label for="lname">Last Name</label>
                                    <input type="text" name="lname" class="input" required>
                                    <i></i>
                                </div>
                            </div>
                            <div class="dis-flex-col <?= (!empty($errors['contact_num'])) ? 'error' : '' ?>">
                                <label for="contact_num">Contact Number</label>
                                <input type="text" name="contact_num" maxlength="10" class="input" required>
                                <i></i>
                            </div>
                            <div class="input-container">
                                <div class="dis-flex-col <?= (!empty($errors['province'])) ? 'error' : '' ?>">
                                    <label for="province">Province</label>
                                    <select name="province" id="province" class="input" onchange="updateDistrict()">
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
                                    <i></i>
                                </div>
                                <div class="dis-flex-col <?= (!empty($errors['district'])) ? 'error' : '' ?>">
                                    <label for="district">District</label>
                                    <select name="district" class="input" id="district"></select>
                                    <i></i>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="pad-20 bor-rad-5 dis-flex-col gap-10">
                            <legend>Account Details</legend>
                            <div class="dis-flex-col <?= (!empty($errors['email'])) ? 'error' : '' ?>">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="input" required>
                                <i></i>
                            </div>

                                <input type="checkbox" class="hide" name="change_pass" id="change_pass" checked>

                            <div class="input-container">
                                <div class="dis-flex-col <?= (!empty($errors['password'])) ? 'error' : '' ?>">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="input" required>
                                    <i></i>
                                </div>
                                <div class="dis-flex-col <?= (!empty($errors['confirmPass'])) ? 'error' : '' ?>">
                                    <label for="confirmPass">Confirm Password</label>
                                    <input type="password" name="confirmPass" class="input" required>
                                    <i></i>
                                </div>
                            </div>
                        </fieldset>

<!--                        COPY REMOVE-->
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
                                let currentDistrict = ""

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

                    <button type="submit" class="glass-btn">Add User</button>
                </form>
                </div>
            </section>
        </main>
    </div>
</body>

</html>