const setError = (element, message) => {
    // Add error border
    const parent = element.parentElement
    parent.querySelector('.error').innerHTML = message
}

const clearError = (element) => {
    // Remove error border
    const parent = element.parentElement
    parent.querySelector('.error').innerHTML = ""
}


let errors = []


function validation_ad() {

    errors = []

    console.log("validation occured")
    const title = document.getElementById('title')
    const details = document.getElementById('details')
    const rates = document.getElementById('rates')
    const image = document.getElementById('image')

    if(title.value === "") {
        setError(title, "Title cannot be empty")
        errors.push("title")
    } else if(title.value.length < 3) {
        setError(title, "Title is too short")
        errors.push("title")
    } else if(title.value.length > 50) {
        setError(title, "Title is too long")
        errors.push("title")
    } else {
        clearError(title)
    }

    if(details.value === "") {
        setError(details, "Details cannot be empty")
        errors.push("details")
    } else {
        clearError(details)
    }

    if(rates.value === "") {
        setError(rates, "Rates cannot be empty")
        errors.push("rates")
    } else if(rates.value < 0) {
        setError(rates, "Enter a valid amount")
        errors.push("rates")
    } else {
        clearError(rates)
    }

    if(image.value === "" && errors.length < 0) {
        alert("A default image will be added !")
    }

    return errors.length <= 0;
}

const form = document.getElementById('ad_form')
form.addEventListener('submit', e => {
    if(!validation_ad()) {
        e.preventDefault()
    }
})