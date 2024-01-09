<div class="venue-op-div">

    <img src="<?= $image ?>" alt="Venue_image">
    <h3 class="txt-c-black"><?= $name ?></h3>

    <div class="location">
        <img src="<?= ROOT ?>/assets/images/icons/location_pin.png" alt="seat-image" class="icon">
        <p><?= $location ?></p>
    </div>

    <div class="">
        <img src="<?= ROOT ?>/assets/images/icons/seat.png" alt="seat-image" class="icon">
        <p><?= ($seat_count == 0) ? 'No Seating Available' : $seat_count ?></p>
    </div>
    <div class="dis-flex gap-10 btn-collection">
        <a href="<?= ROOT ?>/venuem/venues/update/<?= $venue_id ?>">
            <button class="btn-lay-2 push-right hover-pointer circular-btn update-btn">
                <svg class="feather feather-edit" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            </button>
        </a>
        <a href="<?= ROOT ?>/venuem/venues/delete/<?= $venue_id ?>" id="<?= $venue_id ?>">
            <button class="btn-lay-2 push-right hover-pointer circular-btn delete-btn">
                <svg class="feather feather-trash-2" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
            </button>
        </a>
    </div>
</div>

<script defer>
    document.getElementById('<?= $venue_id ?>').addEventListener("click", e => {
        let result = confirm('Do you want to delete?')
        if(!result) e.preventDefault()
    })
</script>