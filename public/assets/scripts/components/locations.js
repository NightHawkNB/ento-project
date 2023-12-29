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
    let currentDistrict = ""

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