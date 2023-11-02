/* Form Visibility Settings */
function changeForm() {
    var selected = document.getElementById("user_type")
    if(selected.value === "Singer") document.getElementById("singer").style.display="block"
    else document.getElementById("singer").style.display="none"
}

/* END OF FORM VALIDITY */



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