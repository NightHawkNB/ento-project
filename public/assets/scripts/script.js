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


/* START OF DASHBOARD SIDEBAR */
window.onload = function(){

    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.querySelector("#btn");
    const searchBtn = document.querySelector(".bx-search")

    closeBtn.addEventListener("click",function(){
        sidebar.classList.toggle("open")

        // if(sidebar.classList.contains("open")) {
        //     localStorage.setItem("sidebar_status", "true")
        // } else {
        //     localStorage.setItem("sidebar_status", "false")
        // }

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