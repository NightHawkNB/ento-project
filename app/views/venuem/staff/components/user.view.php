<div class="venue-op-div">

    <img src="<?= $image ?>" alt="Profile_image">
    <h3 class="txt-c-black"><?= $fname ?>&nbsp;<?= $lname ?></h3>

    <div class="location">
        <img src="<?= ROOT ?>/assets/images/icons/location_pin.png" alt="seat-image" class="icon">
        <p><?= $district ?></p>
    </div>
    <div class="assign-venue">
        <select name="venue_id" id="venue-select-<?= $venueO_id ?>" class="input" style="box-shadow: none">
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

    document.getElementById('venue-select-<?= $venueO_id ?>').addEventListener("change", function() {
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