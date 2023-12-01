<div class="venue-op-div">

    <img src="<?= $image ?>" alt="Profile_image">
    <h3 class="txt-c-black"><?= $fname ?>&nbsp;<?= $lname ?></h3>

    <div class="location">
        <svg style="max-height: 30px;" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#101820;}</style></defs><title/><g data-name="Layer 21" id="Layer_21"><path class="cls-1" d="M16,31a3,3,0,0,1-2.21-1C10.14,26,4,18.39,4,13.36A12.19,12.19,0,0,1,16,1,12.19,12.19,0,0,1,28,13.36c0,5-6.14,12.59-9.79,16.65A3,3,0,0,1,16,31ZM16,3A10.2,10.2,0,0,0,6,13.36c0,3.14,3.47,8.86,9.28,15.31a1,1,0,0,0,1.44,0C22.53,22.22,26,16.5,26,13.36A10.2,10.2,0,0,0,16,3Z"/><path class="cls-1" d="M16,19a6,6,0,1,1,6-6A6,6,0,0,1,16,19ZM16,9a4,4,0,1,0,4,4A4,4,0,0,0,16,9Z"/></g></svg>
        <p><?= $city ?></p>
    </div>
    <div class="assign-venue">
        <select name="venue_id" id="venue-select" class="input">
            <option value="#default" disabled <?= (!$venue_id) ? 'selected' : '' ?> style="text-align: center"> Assign Venue </option>
            <?php foreach ($venues as $venue): ?>
                <option data-venueo-id="<?= $venueO_id ?>" data-venue-id="<?= $venue->venue_id ?>" value="<?= $venue->venue_id ?>" <?= ($venue_id == $venue->venue_id) ? 'selected' : '' ?>><?= $venue->name ?></option>
            <?php endforeach; ?>
            <option data-venueo-id="<?= $venueO_id ?>" data-venue-id="<?= 'not-set' ?>" value="<?= 'not-set' ?>">Un-assign</option>
        </select>
    </div>
    <div class="dis-flex gap-10 btn-collection">
        <a href="<?= ROOT ?>/venuem/staff/update/<?= $user_id ?>">
            <button class="btn-lay-2 push-right hover-pointer circular-btn update-btn">
                <svg class="feather feather-edit" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            </button>
        </a>
        <a href="<?= ROOT ?>/venuem/staff/delete/<?= $user_id ?>" id="<?= $user_id ?>">
            <button class="btn-lay-2 push-right hover-pointer circular-btn delete-btn">
                <svg class="feather feather-trash-2" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
            </button>
        </a>
    </div>
</div>

<script defer>
    document.getElementById('<?= $user_id ?>').addEventListener("click", e => {
        let result = confirm('Do you want to delete?')
        if(!result) e.preventDefault()
    })

    document.getElementById('venue-select').addEventListener("change", function() {
        // Get the selected option
        let selectedOption = this.selectedOptions[0]

        // Access custom data attribute using the dataset property
        let venueO_id = selectedOption.dataset.venueoId
        let venue_id = selectedOption.dataset.venueId

        updateAssignedVenue(venueO_id, venue_id)
    });

    function updateAssignedVenue(venueO_id, venue_id) {

        if(venueO_id !== '' && venue_id !== '') {

            let data = {venueO_id, venue_id}

            fetch(`/ento-project/public/venuem/staff/${venueO_id}/${venue_id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json; charset=utf-8"
                },
                body: JSON.stringify(data)
            }).then(res => {
                // console.log(res)
                return res.text()
            }).then(data => {
                // Shows the data printed by the targeted php file.
                // (stopped printing all data in php file by using die command)
                console.log(data)
            })
        } else {
            console.log("No user_id or venue_id is given")
        }
    }
</script>