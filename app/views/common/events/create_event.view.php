<html lang="en">
<?php $this->view('includes/head') ?>

<style>
    input[type=file] {
        border: none;
    }

    #svg-01 {
        height: 1.4rem;
    }

    .add-btn {
        height: 40px;
        width: 40px;
        padding: 10px;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 1s ease;
        bottom: 20px;
        right: 20px;
        position: absolute;
        z-index: 1;
    }

    .add-btn:hover {
        transform: rotate(90deg);
    }

    /* PROGRESS BAR STYLES ---------------------------------------------------------------------------- */
    .progress-container-main {
        width: 100%;
        max-width: 800px;
    }

    .progress-container{
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        /*max-width: 100%;*/
        /*width: 320px;*/
        width: 100%;
        margin-bottom: 30px;
    }

    .progress-container::before{
        content: '';
        position: absolute;
        background-color: lightgrey;
        top: 50%;
        left: 0;
        height: 4px;
        width: 98%;
        z-index: 1;
        transform: translateY(-50%);
    }

    .progress{
        position: absolute;
        background-color: mediumpurple;
        top: 50%;
        left: 0;
        height: 4px;
        width: 0;
        z-index: 2;
        transform: translateY(-50%);
        transition: 0.4s ease;
    }

    .circle{
        position: relative;
        background-color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        color: rebeccapurple;
        width: 30px;
        height: 30px;
        border: 3px solid #e0e0e0;
        transition: .4s ease;
        z-index: 3;
    }

    .circle .label {
        position: absolute;
        top: 120%;
        left: 50%;
        height: 100%;
        width: 450%;
        z-index: 1;
        text-align: center;
        font-family: Poppins, sans-serif;
        color: var(--font-primary);
        transform: translate(-50%, 0%);
    }

    .circle.active{
        border-color: mediumpurple;
    }

    .event-form {
        width: 100%;
        height: 100%;
        padding: 20px;
        display: flex;
        flex-direction: column;
        border-radius: 5px;
        justify-content: space-between;
        /*box-shadow: 1px 1px 3px 2px grey;*/
        /*align-items: center;*/

        form {
            padding: 20px 20px 0 20px;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            .slide-container {
                flex: 1;

                .slide {
                    color: var(--font-primary);
                }
            }
        }
    }

    /* SLIDE STYLES ---------------------------------------------------------------------------- */

    .slide-container {
        /*background-color: black;*/


        .slide {
            width: 100%;
            height: 100%;
            border: thin solid aqua;
            /*display: flex !important;*/
            justify-content: space-between;
            gap: 20px;

            .cover-image {
                position: relative;
                width: 50%;
                height: fit-content;
                margin-right: 30px;

                label {
                    position: absolute;
                    width: fit-content;
                    height: fit-content;
                    left: 100%;
                    top: 100%;
                    transform: translate(-50%, -50%);
                }

                img {
                    object-fit: cover;
                    width: 100%;
                    min-width: 300px    ;
                    max-width: 600px;
                    aspect-ratio: 16/6;
                }
            }

            .details,
            .sides {
                display: flex;
                flex-direction: column;
                gap: 10px;
                width: 50%;

                .item {
                    display: flex;
                    flex-direction: column;
                    gap: 5px;
                    font-family: Poppins, sans-serif;

                    input,
                    textarea {
                        outline: none;
                        border: thin solid lightgrey;
                        background-color: white;
                        border-radius: 5px;
                        padding: 10px;

                        &:focus {
                            box-shadow: none;
                        }
                    }
                }
            }
        }
    }

</style>

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

                            <div class="sides">
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
                                    <input type="text" id="name">
                                </div>
                            </div>

                            <div class="sides details">
                                <div class="item">
                                    <label for="details">Event Details</label>
                                    <textarea name="details" id="details" cols="30" rows="5"></textarea>
                                </div>
                                <div class="item">
                                    <label for="name">Event Name</label>
                                    <input type="text" id="name">
                                </div>
                            </div>

                        </div>

                        <div class="slide" id="slide-2">
                            Slide 02
                        </div>

                        <div class="slide" id="slide-3">
                            Slide 03
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

            // switch (page) {
            //     case 1 :
            //         if(fname.value === "") errors.push("fname")
            //         if(lname.value === "") errors.push("lname")
            //         if(!emailRegex.test(email.value)) {
            //             errors.push("email")
            //             email_error.textContent = "Invalid email format"
            //         }
            //         if(contact_num.value === "") errors.push("contact_num")
            //         break
            //
            //     case 2:
            //         if(address1.value === "") errors.push("address1")
            //         if(address2.value === "") errors.push("address2")
            //         break
            //
            //     case 3:
            //         if(password.value === "") errors.push("password")
            //         if(confirmPass.value === "") errors.push("confirmPass")
            //         if(confirmPass.value !== password.value) {
            //             errors.push("confirmPass")
            //             confirmPass_error.textContent = "Passwords donot match"
            //         }
            //         break
            //
            //     default:
            //         errors = []
            //         break
            // }

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
            circles[currentActive].querySelector('svg').remove()

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
    </script>

</div>
</body>
</html>