/* Form Visibility Settings */
// function changeForm() {
//     let selected = document.getElementById("user_type")
//     if(selected.value === "singer") document.getElementById("singer").style.display="block"
//     else document.getElementById("singer").style.display="none"
// }

/* END OF FORM VALIDITY */





/* START OF AD CREATION FORM */

const ad_form_change = document.getElementById('ad_form')

const create_ad = () => {
    const create_ad_singer = document.getElementById('create_ad_singer')
    const create_ad_band = document.getElementById('create_ad_band')
    const create_ad_venue = document.getElementById('create_ad_venue')
    const ad_type = document.getElementById('category')
    const singer_type = document.getElementById('singer_type')
    const band_type = document.getElementById('band_type')
    const venue_type = document.getElementById('venue_type')

    if(singer_type.selected) create_ad_singer.classList.remove("hide")
    else create_ad_singer.classList.add("hide")

    if(band_type.selected) create_ad_band.classList.remove("hide")
    else create_ad_band.classList.add("hide")

    if(venue_type.selected) create_ad_venue.classList.remove("hide")
    else create_ad_venue.classList.add("hide")

    // singer_type.addEventListener("select", () => {
    //     create_ad_singer.classList.toggle("hide")
    // })
}

/* END OF AD CREATION FORM */

function load_image(file) {

    const mylink = window.URL.createObjectURL(file)
    document.getElementById('image-ad').src = mylink
}

/* START OF DASHBOARD SIDEBAR */
window.onload = function(){

    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.querySelector("#btn");
    const searchBtn = document.querySelector(".bx-search")

    if(localStorage.getItem("sidebar_status") === "true") {
        if(!sidebar.classList.contains("open")) sidebar.classList.toggle("open")
        console.log("toggle to ")
    } else {
        if(sidebar.classList.contains("open")) sidebar.classList.toggle("open")
    }

    closeBtn.addEventListener("click",function(){
        sidebar.classList.toggle("open")

        if(sidebar.classList.contains("open")) {
            localStorage.removeItem("sidebar_status")
            localStorage.setItem("sidebar_status", "true")
        } else {
            localStorage.removeItem("sidebar_status")
            localStorage.setItem("sidebar_status", "false")
        }

        menuBtnChange()
    })

    function menuBtnChange(){
        if(sidebar.classList.contains("open")){
            closeBtn.classList.replace("bx-menu","bx-menu-alt-right")
        }else{
            closeBtn.classList.replace("bx-menu-alt-right","bx-menu")
        }
    }
}
/* END OF DASHBOARD SIDEBAR */



/* START OF THE POPUP SCRIPT */

const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-btn]')
const overlay = document.getElementById('overlay')

openModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        const modal = document.querySelector(button.dataset.modalTarget)
        openModal(modal)
    })
})

closeModalButtons.forEach(button => {
    button.addEventListener('click', () => {
        // Gets the closest parent with the class modal
        const modal = button.closest('.modal')
        closeModal(modal)
    })
})

function openModal(modal) {
    if (modal == null) return
    modal.classList.add('active')
    overlay.classList.add(('active'))
}


function closeModal(modal) {
    if (modal == null) return
    modal.classList.remove('active')
    overlay.classList.remove(('active'))
}

/* END OF THE POPUP SCRIPT */


/* START OF ALERT MESSAGE SCRIPT */

const alert_window = document.getElementById('alert-window')
if(alert_window) {
    alert_window.addEventListener('click', () => {
        if(alert_window.classList.contains('show')) alert_window.classList.remove('show')
    })
}

/* END OF ALERT MESSAGE SCRIPT */