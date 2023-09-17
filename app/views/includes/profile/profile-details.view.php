<div class="profile-input">
    <label>User ID</label>
    <input type="text" name="user_id" value=<?= esc($user_id) ?> disabled>
</div>

<div class="profile-input">
    <label>First Name</label>
    <input type="text" name="fname" value=<?= esc($fname) ?> disabled>
</div>

<div class="profile-input">
    <label>Last Name</label>
    <input type="text" name="lname" value=<?= esc($lname) ?> disabled>
</div>

<div class="profile-input">
    <label>Email</label> 
    <input type="text" name="email" value=<?= esc($email) ?> disabled>
</div>

<div class="profile-input">
    <label>NIC Num</label>
    <input type="text" name="nic_num" value=<?= $nic_num ?? "-- Not Verified --"?> disabled>
</div>

<div class="profile-input">
    <label>Contact Num</label>
    <input type="text" name="contact_num" value=<?= esc($contact_num) ?> disabled>
</div>

<div class="profile-input">
    <label>User Type</label>
    <input type="text" name="user_type" value=<?= esc($user_type) ?> disabled>
</div>