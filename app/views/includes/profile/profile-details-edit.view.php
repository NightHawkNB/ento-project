<form method="post">
    <!-- Temp Styles -->
    <style>
        .upload-btn {
            background-color: cornflowerblue;
            border-radius: 5px;
            color: white;
        }

        .upload-btn > svg {
            padding: 10px;
        }

        .upload-btn:hover {
            cursor: pointer;
        }

        .upload-btn label {
            width: fit-content;
        }

        .upload-btn input {
            width: fit-content;
        }
    </style>

    <div class="profile-input">
        <label>User Profile</label>
        <label class="upload-btn">
            <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M246.6 9.4c-12.5-12.5-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 109.3V320c0 17.7 14.3 32 32 32s32-14.3 32-32V109.3l73.4 73.4c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-128-128zM64 352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 53 43 96 96 96H352c53 0 96-43 96-96V352c0-17.7-14.3-32-32-32s-32 14.3-32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V352z"/></svg>
            <input type="file" name="image" style="display: none;">
        </label>
    </div>

    <div class="profile-input">
        <label>User ID</label>
        <input type="text" name="user_id" value=<?= $user_id ?> disabled>
    </div>

    <div class="profile-input">
        <label>First Name</label>
        <input type="text" name="fname" value="<?= set_value('fname', $fname) ?>">
    </div>

    <div class="profile-input">
        <label>Last Name</label>
        <input type="text" name="lname" value="<?= set_value('lname', $lname) ?>">
    </div>

    <div class="profile-input">
        <label>Email</label> 
        <input type="text" name="email" value=<?= $email ?> disabled>
    </div>

    <div class="profile-input">
        <label>NIC Num</label>
        <input type="text" name="nic_num" value=<?= $nic_num ?? "-- Not Verified --"?> disabled>
    </div>

    <div class="profile-input">
        <label>Contact Num</label>
        <input type="text" name="contact_num" value="<?= set_value('contact_num', $contact_num) ?>">
    </div>

    <div class="profile-input">
        <label>User Type</label>
        <input type="text" name="user_type" value=<?= $user_type ?> disabled>
    </div>

    <div class="form-button">
        <input type="submit" value="Save Changes">
    </div>
</form>