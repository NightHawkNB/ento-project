<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 dis-flex">
            <div class="mar-10 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5" style="justify-content:stretch; align-items:stretch">

                <form method="POST" class="dis-flex-col al-it-ce gap-20">
                    <h2>Register</h2>
                    <fieldset class="wid-60 pad-20 bor-rad-5 dis-flex-col gap-10">
                        <legend>Personal Details</legend>
                        <div class="dis-flex mar-top-0 gap-20">
                            <div class="dis-flex-col <?= (!empty($errors['fname'])) ? 'error' : '' ?>">
                                <label for="fname">First Name</label>
                                <input value=<?= $user->fname ?> type="text" name="fname" class="input" required>
                                <i></i>
                            </div>
                            <div class="dis-flex-col <?= (!empty($errors['lname'])) ? 'error' : '' ?>">
                                <label for="lname">Last Name</label>
                                <input value=<?= $user->lname ?> type="text" name="lname" class="input" required>
                                <i></i>
                            </div>
                        </div>
                        <div class="dis-flex-col <?= (!empty($errors['contact_num'])) ? 'error' : '' ?>">
                            <label for="contact_num">Contact Number</label>
                            <input value=<?= $user->contact_num ?> type="text" name="contact_num" maxlength="10" class="input" required>
                            <i></i>
                        </div>
                        <div class="dis-flex-col gap-20">
                            <div class="dis-flex gap-20 <?= (!empty($errors['address01'])) ? 'error' : '' ?>">
                                <div class="dis-flex-col">
                                    <label for="address1">Address line 01</label>
                                    <input value=<?= $user->address1 ?> type="text" name="address1" class="input" required>
                                    <i></i>
                                </div>
                                <div class="dis-flex-col <?= (!empty($errors['address2'])) ? 'error' : '' ?>">
                                    <label for="address2">Address line 02</label>
                                    <input value=<?= $user->address2 ?> type="text" name="address2" class="input" required>
                                    <i></i>
                                </div>
                            </div>
                            <div class="dis-flex gap-20">
                                <div class="dis-flex-col">
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
                        </div>
                    </fieldset>

                    <fieldset class="wid-60 pad-20 bor-rad-5 dis-flex-col gap-10">
                        <legend>Account Details</legend>
                        <div class="dis-flex-col <?= (!empty($errors['email'])) ? 'error' : '' ?>">
                            <label for="email">Email</label>
                            <input value=<?= $user->email ?> type="email" name="email" class="input" disabled style="color: white">
                            <i></i>
                        </div>
                        <div class="wid-100 dis-flex ju-co-ce al-it-ce">
                            <input type="checkbox" name="change_pass" id="change_pass">
                            <p>Change Password</p>
                        </div>
                        <div class="dis-flex gap-20">
                            <div class="dis-flex-col <?= (!empty($errors['password'])) ? 'error' : '' ?>">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="input" >
                                <i></i>
                            </div>
                            <div class="dis-flex-col <?= (!empty($errors['confirmPass'])) ? 'error' : '' ?>">
                                <label for="confirmPass">Confirm Password</label>
                                <input type="password" name="confirmPass" class="input" >
                                <i></i>
                            </div>
                        </div>
                        <div class="dis-flex ju-co-ce <?= (!empty($errors['user_type'])) ? 'error' : '' ?>">
                            <select class="input" value="<?php set_value('user_type') ?>" name="user_type" id="user_type">
                                <option value="" selected disabled>Account Type</option>
                                <option <?php if($user->user_type == 'client') echo "selected" ?> value="client">Client</option>
                                <option <?php if($user->user_type == 'singer') echo "selected" ?> value="singer">Singer</option>
                                <option <?php if($user->user_type == 'band') echo "selected" ?> value="band">Band</option>
                                <option <?php if($user->user_type == 'venuem') echo "selected" ?> value="venuem">Venue Manager</option>
                                <option <?php if($user->user_type == 'admin') echo "selected" ?> value="admin">Admin</option>
                                <option <?php if($user->user_type == 'cca') echo "selected" ?> value="cca">Customer Care</option>
                            </select>
                            <i></i>
                        </div>
                    </fieldset>

                    <button type="submit" class="btn-lay-2 hover-pointer btn-anima-hover">Update User</button>
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