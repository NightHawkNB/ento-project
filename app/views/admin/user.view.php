<a href="#req-01">
    <div class="bg-white txt-c-black dis-flex ju-co-sb pad-10 bor-rad-5">
        <p class="txt-c-black"><?= $fname ?>&nbsp;</p>
        <p class="txt-c-black"><?= $lname ?></p>
        <div class="dis-flex gap-10">
            <a href="<?= ROOT ?>/admin/usermng/update-user/<?= $user_id ?>">
                <button class="btn-lay-2 push-right hover-pointer "  style="background-color:black; text-align:center; border: none" >Update</button>    
            </a>
            <a href="<?= ROOT ?>/admin/usermng/delete-user/<?= $user_id ?>">
                <button class="btn-lay-2 push-right hover-pointer "  style="background-color:black; text-align:center; border: none" >Delete</button>    
            </a>
        </div>
    </div>
</a>