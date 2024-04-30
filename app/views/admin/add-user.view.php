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

                legend{
                    color: black;
                }
                label{
                    color: black;
                }

                p{
                    color: black;
                }
                h2{
                    color: black;
                }

                input,
                input:checked,
                select,
                textarea {
                    color: black;
                }

                input:not(:checked) ~ label:hover,
                input:not(:checked) ~ label:hover ~ label{
                    color: var(--font-primary);
                }
                input:checked ~ label{
                    color: var(--font-primary);
                }

            </style>

            <section class="cols-10 dis-flex">
                <div class=" mar-10 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5" style="justify-content:stretch; align-items:stretch">
                    
                <form method="POST" class="dis-flex-col al-it-ce gap-20">
                        <h2>Register</h2>
                        <fieldset class="wid-60 pad-20 bor-rad-5 dis-flex-col gap-10">
                            <legend>Personal Details</legend>
                            <div class="dis-flex mar-top-0 gap-20">
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
                            <div class="dis-flex-col gap-20">
                                <div class="dis-flex gap-20 <?= (!empty($errors['address01'])) ? 'error' : '' ?>">
                                    <div class="dis-flex-col">
                                        <label for="address1">Address line 01</label>
                                        <input type="text" name="address1" class="input" required>
                                        <i></i>
                                    </div>
                                    <div class="dis-flex-col <?= (!empty($errors['address2'])) ? 'error' : '' ?>">
                                        <label for="address2">Address line 02</label>
                                        <input type="text" name="address2" class="input" required>
                                        <i></i>
                                    </div>
                                </div>
                                <div class="dis-flex gap-20">
                                    <div class="dis-flex-col">
                                        <label for="province">Province</label>
                                        <select name="province" class="input" id="province" onchange="updateDistrict()">
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
                                <input type="email" name="email" class="input" required>
                                <i></i>
                            </div>
                            <div class="dis-flex gap-20">
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
                            <div class="dis-flex ju-co-ce <?= (!empty($errors['user_type'])) ? 'error' : '' ?>">
                                <select class="input" value="<?php set_value('user_type') ?>" name="user_type" id="user_type">
                                    <option value="" selected disabled>Account Type</option>
                                    <option value="singer">Client</option>
                                    <option value="singer">Singer</option>
                                    <option value="band">Band</option>
                                    <option value="venuem">Venue Manager</option>
                                    <option value="admin">Admin</option>
                                    <option value="cca">Customer Care</option>
                                </select>
                                <i></i>
                            </div>
                        </fieldset>

                        <button type="submit" class="button-s2 hover-pointer btn-anima-hover">Add user</button>
                </form>
                <div class="pad-10">

                </div>
                </div >

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


                        const selectedProvince = provinceSelect.value

                        const districts = cityData[selectedProvince]

                        if (districts) {
                            districts.forEach(district => {
                                const option = document.createElement("option")
                                option.value = district
                                option.textContent = district

                                // Selecting the currently selected district

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
            </section>
        </main>
    </div>
</body>
</html>