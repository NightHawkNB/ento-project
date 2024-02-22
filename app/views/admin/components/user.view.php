
    <div class="u bg-white txt-c-black dis-flex gap-10  pad-10 bor-rad-5 al-it-ce" data-title="<?= $fname . $lname ?>" data-category="<?=$user_type?>">
        <div class="dis-flex al-it-ce gap-10" style="width:250px">
            <img src="<?=ROOT.$image?>" alt="User Image" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
            <div>
                <p class="txt-c-black"><?= $fname ?><?= $lname ?></p>
            </div>
        </div>
        <div style="width: 300px">
            <?= $email ?>    
        </div>
        <div style="width: 100px">
            <?=ucfirst($user_type)?>    
        </div>
        <div class="dis-flex gap-10" style="margin-left:auto">
            <a href="<?= ROOT ?>/admin/usermng/update-user/<?= $user_id ?>">
                <button class="btn-lay-2 push-right hover-pointer "  style="background-color:black; text-align:center; border: none" >Update</button>    
            </a>
            <a href="<?= ROOT ?>/admin/usermng/delete-user/<?= $user_id ?>">
                <button class="btn-lay-2 push-right hover-pointer "  style="background-color:black; text-align:center; border: none" >Delete</button>    
            </a>
        </div>
    </div>
