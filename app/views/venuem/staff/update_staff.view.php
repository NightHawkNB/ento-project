<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <style>
            .user-update-form {
                color: var(--font-primary);
                padding: 10px;
                border-radius:10px;
            }
        </style>

        <section class="cols-10 dis-flex pad-10">
            <div class="wid-100 dis-flex-col pad-20 gap-10 bor-rad-5">

                <form method="POST" class="bg-white dis-flex-col al-it-ce gap-20 wid-100 user-update-form">
                    <h2>Register</h2>
                    <fieldset class="pad-20 bor-rad-5 dis-flex-col gap-10">
                        <legend>Personal Details</legend>
                        <div class="input-container">
                            <div class="dis-flex-col <?= (!empty($errors['fname'])) ? 'error' : '' ?>">
                                <label for="fname">First Name</label>
                                <input value=<?= $user->fname ?> type="text" name="fname" class="input" required>
                                <i><?= (!empty($user->errors['fname'])) ? $user->errors['fname'] : '' ?></i>
                            </div>
                            <div class="dis-flex-col <?= (!empty($errors['lname'])) ? 'error' : '' ?>">
                                <label for="lname">Last Name</label>
                                <input value=<?= $user->lname ?> type="text" name="lname" class="input" required>
                                <i><?= (!empty($user->errors['lname'])) ? $user->errors['lname'] : '' ?></i>
                            </div>
                        </div>
                        <div class="dis-flex-col <?= (!empty($errors['contact_num'])) ? 'error' : '' ?>">
                            <label for="contact_num">Contact Number</label>
                            <input value=<?= $user->contact_num ?> type="text" name="contact_num" maxlength="10" class="input" required>
                            <i><?= (!empty($user->errors['contact_num'])) ? $user->errors['contact_num'] : '' ?></i>
                        </div>

                        <div class="input-container">
                            <div class="">
                                <label for="province">Province</label>
                                <select name="province" class="input" id="province" onchange="updateDistrict()">
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
                            <div class="dis-flex-col <?= (!empty($errors['district'])) ? 'error' : '' ?>">
                                <label for="district">District</label>
                                <select name="district" class="input" id="district"></select>
                                <i><?= (!empty($user->errors['district'])) ? $user->errors['district'] : '' ?></i>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="pad-20 bor-rad-5 dis-flex-col gap-10">
                        <legend>Account Details</legend>
                        <div class="dis-flex-col <?= (!empty($errors['email'])) ? 'error' : '' ?>">
                            <label for="email">Email</label>
                            <input value=<?= $user->email ?> type="email" name="email" class="input" required>
                            <i><?= (!empty($user->errors['email'])) ? $user->errors['email'] : '' ?></i>
                        </div>

                        <div class="wid-100 dis-flex ju-co-ce al-it-ce">
                            <input type="checkbox" name="change_pass" id="change_pass">
                            <p>Change Password</p>
                        </div>

                        <div class="input-container">
                            <div class="dis-flex-col <?= (!empty($errors['password'])) ? 'error' : '' ?>">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="input">
                                <i><?= (!empty($user->errors['password'])) ? $user->errors['password'] : '' ?></i>
                            </div>
                            <div class="dis-flex-col <?= (!empty($errors['confirmPass'])) ? 'error' : '' ?>">
                                <label for="confirmPass">Confirm Password</label>
                                <input type="password" id="confirmPass" name="confirmPass" class="input">
                                <i><?= (!empty($user->errors['confirmPass'])) ? $user->errors['confirmPass'] : '' ?></i>
                            </div>
                        </div>
                    </fieldset>

                    <button type="submit" class="blue-btn">Update User</button>
                </form>

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

                    document.getElementById('change_pass').onchange = function() {
                        // document.getElementById('password').readOnly = !this.checked;
                        // document.getElementById('confirmPass').readOnly = !this.checked;
                    };
                </script>

            </div >
        </section>
    </main>
</div>
</body>
</html>