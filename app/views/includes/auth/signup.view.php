<html lang="en">
<?php $this->view('includes/head', ['style' => 'auth/signup.css']) ?>
<body>

<!-- Animated Background -->
<div class="area">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>

<div class="dis-flex ju-co-ce al-it-ce pad-20 hei-100 wid-100">

    <?php
    if(message()) {
        switch ($_SESSION['alert-status']) {
            case 'neutral':
                $status = "neutral";
                $heading = "Alert";
                break;
            case 'success':
                $status = "success";
                $heading = "Success";
                break;
            case 'failed':
                $status = "failed";
                $heading = "Error";
                break;
            default :
                $status = "";
                $heading = "";
        }
    }
    ?>

    <!-- START OF Popup message box -->
    <div class="alert <?= $status ?> dis-flex gap-10 al-it-ce <?= (message()) ? 'show' : '' ?>" id="alert-window">
        <?php if($status == "success"): ?>
            <svg class="feather feather-check-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
        <?php endif; ?>
        <?php if($status == "neutral"): ?>
            <svg class="feather feather-alert-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
        <?php endif; ?>
        <?php if($status == "failed"): ?>
            <svg class="feather feather-x-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10"/><line x1="15" x2="9" y1="9" y2="15"/><line x1="9" x2="15" y1="9" y2="15"/></svg>
        <?php endif; ?>

        <p class="flex-1">
            <?= $heading ?> : <?= message('', true); ?>
        </p>
    </div>
    <!-- END OF Popup message box -->

    <main class="signup-container auth-container sh">
        <div class="login left-section">
            <form method="POST" id="form">
                <h2>Register</h2>

                <div style="text-align: center" class="progress-container-main">
                    <div class="progress-container">
                        <div class="progress" id="progress"></div>
                        <div class="circle active">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: mediumpurple"><path d="M480-80q-82 0-155-31.5t-127.5-86Q143-252 111.5-325T80-480q0-83 31.5-155.5t86-127Q252-817 325-848.5T480-880q83 0 155.5 31.5t127 86q54.5 54.5 86 127T880-480q0 82-31.5 155t-86 127.5q-54.5 54.5-127 86T480-80Zm0-160q100 0 170-70t70-170q0-100-70-170t-170-70q-100 0-170 70t-70 170q0 100 70 170t170 70Z"/></svg>
                        </div>
                        <div class="circle">2</div>
                        <div class="circle">3</div>
                        <div class="circle">4</div>
                    </div>
                </div>

                <div class="slide-container">
                    <div class="slide" id="slide-1">
                        <div class="group">
                            <div class="input-box <?= (!empty($errors['fname'])) ? 'error' : '' ?>">
                                <label for="fname">First Name</label>
                                <input id="fname" placeholder="First Name" value="<?= $prev->fname ?>" type="text" name="fname" required>
                                <i><?= (array_key_exists('fname', $errors)) ? $errors['fname'] : '' ?></i>
                            </div>
                            <div class="input-box <?= (!empty($errors['lname'])) ? 'error' : '' ?>">
                                <label for="lname">Last Name</label>
                                <input id="lname" placeholder="Middle/Last Name" value="<?= $prev->lname ?>" type="text" name="lname" required>
                                <i><?= (array_key_exists('lname', $errors)) ? $errors['lname'] : '' ?></i>
                            </div>
                        </div>
                        <div class="input-box <?= (!empty($errors['email'])) ? 'error' : '' ?>">
                            <label for="email">Email</label>
                            <input id="email" placeholder="eg: user@ento.com" value="<?= $prev->email ?>" type="email" name="email" required>
                            <i><?= (array_key_exists('email', $errors)) ? $errors['email'] : '' ?></i>
                        </div>
                        <div class="input-box <?= (!empty($errors['contact_num'])) ? 'error' : '' ?>">
                            <label for="contact_num">Contact Number</label>
                            <input id="contact_num" placeholder="eg: 0112354659" value="<?= $prev->contact_num ?>" type="text" name="contact_num" maxlength="10" required>
                            <i><?= (array_key_exists('contact_num', $errors)) ? $errors['contact_num'] : '' ?></i>
                        </div>
                    </div>

                    <div class="slide" id="slide-2">
                        <div class="group">
                            <div class="input-box <?= (!empty($errors['province'])) ? 'error' : '' ?>">
                                <label for="province">Province</label>
                                <select name="province" id="province" class="input" onchange="updateDistrict()">
                                    <option <?= ($prev->province == "central") ? 'selected' : '' ?> value="central">Central</option>
                                    <option <?= ($prev->province == "eastern") ? 'selected' : '' ?> value="eastern">Eastern</option>
                                    <option <?= ($prev->province == "northCentral") ? 'selected' : '' ?> value="northCentral">North Central</option>
                                    <option <?= ($prev->province == "northern") ? 'selected' : '' ?> value="northern">Northern</option>
                                    <option <?= ($prev->province == "northWestern") ? 'selected' : '' ?> value="northWestern">North Western</option>
                                    <option <?= ($prev->province == "sabaragamuwa") ? 'selected' : '' ?> value="sabaragamuwa">Sabaragamuwa</option>
                                    <option <?= ($prev->province == "southern") ? 'selected' : '' ?> value="southern">Southern</option>
                                    <option <?= ($prev->province == "uva") ? 'selected' : '' ?> value="uva">Uva</option>
                                    <option <?= ($prev->province == "western") ? 'selected' : '' ?> value="western">Western</option>
                                </select>
                                <i></i>
                            </div>
                            <div class="input-box <?= (!empty($errors['district'])) ? 'error' : '' ?>">
                                <label for="district">District</label>
                                <select name="district" class="input" id="district"></select>
                                <i></i>
                            </div>
                        </div>

                        <div class="input-box">
                            <label for="address1">Address line 01</label>
                            <input id="address1" placeholder="Part of physical address" value="<?= $prev->address1 ?>" type="text" name="address1" required>
                            <i><?= (array_key_exists('address1', $errors)) ? $errors['address1'] : '' ?></i>
                        </div>
                        <div class="input-box <?= (!empty($errors['address2'])) ? 'error' : '' ?>">
                            <label for="address2">Address line 02</label>
                            <input id="address2" placeholder="Part of physical address" value="<?= $prev->address2 ?>" type="text" name="address2" required>
                            <i><?= (array_key_exists('address2', $errors)) ? $errors['address2'] : '' ?></i>
                        </div>
                    </div>

                    <div class="slide" id="slide-3">
                        <div  class="group password">
                            <div class="input-box password-field <?= (!empty($errors['password'])) ? 'error' : '' ?>">
                                <label for="password">Password</label>
                                <input id="password" placeholder="Enter a strong password" onkeyup="trigger_password()" type="password" name="password" id="password-input" required>
                                <span class="show-btn show">
                                <img>
                            </span>
                                <i><?= (array_key_exists('password', $errors)) ? $errors['password'] : '' ?></i>
                            </div>

                            <!-- Password Strength Indicator -->
                            <div class="group">
                                <div class="ps-indicator-container">
                                    <div class="ps-indicator">
                                        <span class="weak"></span>
                                        <span class="medium"></span>
                                        <span class="strong"></span>
                                    </div>
                                    <span class="ps-text"></span>
                                </div>
                            </div>

                            <div class="input-box password-field <?= (!empty($errors['confirmPass'])) ? 'error' : '' ?>">
                                <label for="confirmPass">Confirm Password</label>
                                <input id="confirmPass" placeholder="Re-enter the password"  type="password" name="confirmPass" required>
                                <span class="show-btn">SHOW</span>
                                <i id="confirmPass_error"><?= (array_key_exists('confirmPass', $errors)) ? $errors['confirmPass'] : '' ?></i>
                            </div>
                        </div>
                    </div>

                    <div class="slide" id="slide-4">
                        <?php if($_SESSION['temp_data']['user_type'] == "band"): ?>
                        <div class="input-box <?= (!empty($errors['packages'])) ? 'error' : '' ?>">
                            <label for="packages">Packages</label>
                            <input placeholder="Can be left empty" type="text" name="packages">
                            <i></i>
                        </div>
                        <div class="input-box <?= (!empty($errors['location'])) ? 'error' : '' ?>">
                            <label for="location">Location</label>
                            <input placeholder="Currently active location"  type="text" name="location">
                            <i></i>
                        </div>
                        <?php endif; ?>

                        <?php if($_SESSION['temp_data']['user_type'] == "singer"): ?>
                            <div class="input-box">
                                <label for="rate">Rate</label>
                                <input placeholder="Current Average Charging Rates" type="text" name="rate">
                                <i></i>
                            </div>
                        <?php endif; ?>

                        <div class="terms-div">
                            <input type="checkbox" name="terms" id="terms" required>
                            <label for="terms">
                                <a href="#terms">Terms and Conditions</a>
                                <?php if(!empty($errors['terms'])):?>
                                    <div  class="text-center" style="color: mediumpurple"><?= $errors['terms'] ?></div>
                                <?php else: ?>
                                    <div class="text-center"></div>
                                <?php endif; ?>
                            </label>
                        </div>
                    </div>
                </div>




                <div style="flex: 1"></div>

                <p class="">Already have an Account ? <a href="<?= ROOT ?>/login">Login</a></p>

                <div class="group ju-co-ce">
                    <button type="button" id="prev" class="btn" onclick="redirect_btn()">Type</button>
                    <button type="button" id="next" class="btn">Next</button>
                </div>

            </form>
        </div>

        <div class="login right-section"  style="background: blue url('<?= ROOT ?>/assets/images/icons/auth/signup.jpg') no-repeat center; background-size: cover;">
        </div>
    </main>

    <script>

        /* ----------------------------------- START OF PROGRESS BAR SCRIPT --------------------------------- */

        const progress = document.getElementById('progress')
        const prev = document.getElementById('prev')
        const next = document.getElementById('next')
        const circles = document.querySelectorAll('.circle')

        const fname = document.getElementById('fname')
        const lname = document.getElementById('lname')
        const email = document.getElementById('email')
        const contact_num = document.getElementById('contact_num')
        const address1 = document.getElementById('address1')
        const address2 = document.getElementById('address2')
        const password = document.getElementById('password')
        const confirmPass = document.getElementById('confirmPass')
        const confirmPass_error = document.getElementById('confirmPass_error')
        const terms = document.getElementById('terms')
        const terms_error = document.getElementById('terms_error')

        const form = document.getElementById('form')

        const slides = document.querySelectorAll('.slide')

        let currentActive = 1

        errors = []

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        function validate(page) {
            errors = []

            switch (page) {
                case 1 :
                    if(fname.value === "") errors.push("fname")
                    if(lname.value === "") errors.push("lname")
                    if(!emailRegex.test(email.value)) errors.push("email")
                    if(contact_num.value === "") errors.push("contact_num")
                    break

                case 2:
                    if(address1.value === "") errors.push("address1")
                    if(address2.value === "") errors.push("address2")
                    break

                case 3:
                    if(password.value === "") errors.push("password")
                    if(confirmPass.value === "") errors.push("confirmPass")
                    if(confirmPass.value !== password.value) {
                        errors.push("confirmPass")
                        confirmPass_error.textContent = "Passwords donot match"
                    }
                    break

                default:
                    errors = []
                    break
            }

            return errors.length <= 0
        }

        next.addEventListener('click', () => {
            currentActive++

            if(currentActive > circles.length){
                currentActive = circles.length
            }

            if(validate(currentActive-1)) {
                update()
                circles[currentActive-2].innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" style="fill: mediumpurple"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>'
            } else {
                console.log(errors)
                circles[currentActive-2].innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" style="fill: mediumpurple" width="24"><path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>'
                currentActive--
            }
            //console.log(currentActive)

        })

        prev.addEventListener('click', () => {
            currentActive--

            if(currentActive < 1){
                currentActive = 1
            }

            update()
            circles[currentActive].innerHTML = (currentActive+1).toString()
            //console.log(currentActive)

        })

        // Showing only the relevant slide
        for(let i = 0; i<slides.length; i++) {
            if(i === 0) {
                slides[i].style.display = 'block'
            } else {
                slides[i].style.display = 'none'
            }
        }

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
                    slides[i].style.display = 'block'
                } else {
                    slides[i].style.display = 'none'
                }
            }

            // Function to handle the button click and redirect
            function redirect_btn() {
                window.location.href = '<?= ROOT ?>/signup'
            }


            if(currentActive === 1){
                prev.innerHTML = 'Type'
                prev.onclick = redirect_btn
                next.onclick = null
            }else if (currentActive === circles.length) {
                prev.innerHTML = 'Back'
                next.innerHTML = 'Signup'
                next.onclick = submit_form
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



        /* ----------------------------------- END OF PROGRESS BAR SCRIPT --------------------------------- */

        const user_type = document.getElementById('user_type')
        const singer_box = document.getElementById('singer-box')
        const band_box = document.getElementById('band-box')
        const side_image = document.getElementById('signup-right-image')

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
            let currentDistrict = "<?= ($prev->district) ? ucfirst(strtolower($prev->district)) : '' ?>"

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
    <script src="<?= ROOT ?>/assets/scripts/components/password_strength.js" defer></script>

</div>
</body>

</html>