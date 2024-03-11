// Form element selection

// For slide 01
const event_name =document.querySelector('#name')
const province =document.querySelector('#province')
const district =document.querySelector('#district')
const details =document.querySelector('#details')
const start_time = document.querySelector('#start_time')
const end_time = document.querySelector('#end_time')

let starting_time
let ending_time
let current_time

// For slide 02
const slide2 = document.getElementById('slide-2')
const slide3 = document.getElementById('slide-3')
const slide4 = document.getElementById('slide-4')
const slide5 = document.getElementById('slide-5')

const progress = document.getElementById('progress')
const prev = document.getElementById('prev')
const next = document.getElementById('next')
const circles = document.querySelectorAll('.circle')


// Customs Elements
const custom_venue = document.querySelector('.custom_venue')
const custom_band = document.querySelector('.custom_band')
const custom_singer = document.querySelector('.custom_singer')

const form = document.getElementById('form')

const slides = document.querySelectorAll('.slide')

let currentActive = 1

errors = []

// Validation function
function validate(page) {
    let errors = []
    document.querySelectorAll('.error').forEach(element => {
        element.textContent = ''
    })

    let selected = false
    let currentSlide

    switch (page) {
        case 2:
            currentSlide = slide2
            break
        case 3:
            currentSlide = slide3
            break
        case 4:
            currentSlide = slide4
            break
        case 5:
            currentSlide = slide5
            break
        default:
            currentSlide = slide2
            break
    }
    
    const venue_labels = currentSlide.querySelectorAll('.venue_label')

    switch (page) {
        case 1 :

            let minimum_starting_time
            let maximum_ending_time
            let minimum_ending_time

            if(event_name.value === "") {
                errors.push("event_name")
                event_name.nextElementSibling.textContent = "Event name cannot be empty"
            }

            if(details.value === "") {
                errors.push("details")
                details.nextElementSibling.textContent = "Event details cannot be empty"
            }

            if(start_time.value === "") {
                errors.push("start_time")
                start_time.nextElementSibling.textContent = "Enter the event starting time"
            } else {
                // Converting the datetime to a JS Date object
                starting_time = new Date(start_time.value)

                let currentDate = new Date()

                minimum_ending_time = new Date(starting_time.getTime() + (2 * 60 * 60 * 1000))
                minimum_starting_time = new Date(currentDate.getTime() + (24 * 60 * 60 * 1000))

                // console.log(starting_time)
            }

            if(end_time.value === "") {
                errors.push("end_time")
                end_time.nextElementSibling.textContent = "Enter the event ending time"
            } else {
                // Converting the datetime to a JS Date object
                ending_time = new Date(end_time.value)
                maximum_ending_time = new Date(starting_time.getTime() + (10 * 60 * 60 * 1000))
                // console.log(ending_time)
            }

            if(start_time.value !== "" && end_time.value !== "") {
                if(starting_time < minimum_starting_time) {
                    errors.push("minimum starting time error")
                    end_time.nextElementSibling.textContent = "The event should be created at least one day before the starting time"
                }else if(ending_time <= minimum_ending_time) {
                    errors.push("invalid_duration")
                    end_time.nextElementSibling.textContent = "The minimum time duration for an event is 2 Hours"
                } else if(ending_time >= maximum_ending_time) {
                    errors.push("invalid_duration")
                    end_time.nextElementSibling.textContent = "The maximum time duration for an event is 10 Hours"
                }
            }

            break

        case 2:
            selected = false

            for(let i = 0;i < venue_labels.length; i++) {
                // console.log(venue_labels[i])
                if(venue_labels[i].querySelector('input').checked) {
                    selected = true
                    break
                }
            }

            if(!selected) {
                errors.push("no venue selected")
                slide2.querySelector('.error').textContent = "Please Select a venue or Add a custom venue"
            }

            break


        case 3:
            selected = false

            for(let i = 0;i < venue_labels.length; i++) {
                // console.log(venue_labels[i])
                if(venue_labels[i].querySelector('input').checked) {
                    selected = true
                    break
                }
            }
            if(!selected) {
                errors.push("Please select a band or Add custom band details")
                slide3.querySelector('.error').textContent = "Please Select a venue or Add a custom venue"
            }
            break


        case 4:
            selected = false
            let singer_count = 0

            for(let i = 0;i < venue_labels.length; i++) {
                // console.log(venue_labels[i])
                if(venue_labels[i].querySelector('input').checked) {
                    selected = true
                    singer_count++
                    break
                }
            }
            if(!selected) {
                errors.push("Please select at least one Singer or Add custom singer details")
                slide4.querySelector('.error').textContent = "Please Select a venue or Add a custom venue"
            }

            if(singer_count>3) {
                errors.push("Maximum number of singers is 3")
                slide4.querySelector('.error').textContent = "Please select only 3 singers"
            }

            break


        case 5:
            selected = false

            for(let i = 0;i < venue_labels.length; i++) {
                // console.log(venue_labels[i])

                console.log(venue_labels[i])

                if(venue_labels[i].querySelector('input').checked) {
                    selected = true
                    const inputs = venue_labels[i].querySelectorAll('input')

                    if(inputs[0].value === '' || inputs[1].value === '') {

                        if (!errors.includes("Invalid ticket data inputs")) {
                            errors.push("Invalid ticket data inputs");
                        }

                        slide5.querySelector('.error').textContent = "Please fill the details for the tickets"
                    }
                }
            }

            if(!selected) {
                if (!errors.includes("Not selected any ticket type")) {
                    errors.push("Not selected any ticket type");
                }

                slide5.querySelector('.error').textContent = "Please select at least one Ticket type"
            }

            break


        default:
            errors = []
            break
    }

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
    if(circles[currentActive].querySelector('svg')) circles[currentActive].querySelector('svg').remove()

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

        form.submit()

    }

}


// Function for selecting the district and province for the event location
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

    const selectedProvince = provinceSelect.value

    const districts = cityData[selectedProvince]

    if (districts) {
        districts.forEach(district => {
            const option = document.createElement("option")
            option.value = district
            option.textContent = district

            districtSelect.appendChild(option)
        });
    } else {
        const option = document.createElement("option")
        option.textContent = "No cities available"
        districtSelect.appendChild(option)
    }
}

function radio_check(element, slide = 2) {
    let slideN = (slide === 2) ? slide2 : slide3
    if (slideN) {
        slideN.querySelector('.error').textContent = ""

        const venue_labels = slideN.querySelectorAll('.venue_label')
        venue_labels.forEach(item => {
            item.classList.remove('selected')
        });

        element.classList.add('selected')
    } else {
        console.error(`Slide ${slide} not found.`)
    }
}

function checkbox_select(slide = 4) {

    const singer_labels = (slide === 4) ? slide4.querySelectorAll('.venue_label') : slide5.querySelectorAll('.venue_label')
    slide4.querySelector('.error').textContent = ""
    slide5.querySelector('.error').textContent = ""

    if(singer_labels.length >= 0) {
        singer_labels.forEach(label => {
            if(label.classList.contains('selected')) label.classList.remove('selected')

            if(slide === 4) {
                if(label.querySelector('input').checked) label.classList.add('selected')
            } else {
                if(label.querySelector('input').checked) label.classList.add('selected')
            }
        })
    }
}

updateDistrict(1)
updateDistrict(2)