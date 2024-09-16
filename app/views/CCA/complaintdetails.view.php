<!--<style>-->
<!---->
<!--    .popup {-->
<!--        width: 400px;-->
<!--        background: #fff;-->
<!--        border-radius: 6px;-->
<!--        position: absolute;-->
<!--        top: 0;-->
<!--        left: 50%;-->
<!--        transform: translate(-50%, -50%) scale(0.1);-->
<!--        text-align: center;-->
<!--        padding: 0 30px 30px;-->
<!--        color: #333;-->
<!--        visibility: hidden;-->
<!--        transition: transform 0.4s, top 0.4s;-->
<!--    }-->
<!---->
<!--    .open-popup {-->
<!--        visibility: visible;-->
<!--        top: 50%;-->
<!--        transform: translate(-50%, -50%) scale(1);-->
<!--    }-->
<!---->
<!---->
<!--    .popup h2 {-->
<!--        margin: 30px 0 10px;-->
<!--        font-size: 38px;-->
<!--        font-weight: 500;-->
<!--    }-->
<!---->
<!--    .popup button {-->
<!--        width: 100%;-->
<!--        padding: 10px 0;-->
<!--        /*background: #5b00ee;*/-->
<!--        border: 0;-->
<!--        outline: none;-->
<!--        cursor: pointer;-->
<!--        border-radius: 4px;-->
<!--        font-size: 18px;-->
<!--        color: #fff;-->
<!--        margin-top: 50px;-->
<!--        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);-->
<!--    }-->
<!--</style>-->
<html lang="en">
<?php $this->view('includes/head', ['style' => ['cca/complaintdetails.css','cca/popupmsg.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>
    <main class="dashboard-main ">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 pad-20 dis-flex wid-100 hei-100 ju-co-ce al-it-ce">
            <div class="complaint-container">
                <button class="button-s2 "  onclick="goBack()">Back</button>
                <div class="form" style="width: 100%">
                    <div class="content">
                        <h1 class="dis-flex ju-co-ce pad-20 head">Complaint Details</h1>
                        <div class="inputflex">
                            <div class="input-box">
                                <label>User Id </label>
                                <div class="input-like"><?= $comp->user_id ?> </div>
                            </div>
                            <div class="input-box">
                                <label>User type</label>
                                <div class="input-like"><?= $comp->user_type ?> </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label>Details</label>
                            <div class="input-like"><?= $comp->details ?> </div>
                        </div>
                        <div class="input-box">
                            <label>Timestamp</label>
                            <div class="input-like"><?= $comp->date_time ?> </div>
                        </div>
                        <?php if ($comp->status == 'Handled') :?>
                            <div class="input-box">
                                <label>Comment</label>
                                <div class="input-like"><?= $comp->comment?> </div>
                            </div>

                        <?php endif; ?>
                    </div>
                    <!--                    accepted buttons-->
                    <?php if ($status->status == 'Accepted') :?>
                        <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">
                            <button type="button" class="button-s2 "  onclick="openPopup()">Assists</button>
                            <div class="popup" id="popup">
                                <form method="post"  action="<?= ROOT ?>/cca/complaints/accepted/assists/<?=$comp->comp_id ?>">
                                    <div class="input-box">
                                        <label>Reason for Assists </label>
                                        <textarea id="comment" name="comment"> </textarea>
                                    </div>
                                    <button type="submit" onclick="closePopup()">Ok</button>
                                </form>
                            </div>
                            <button type="button" class="button-s2"  onclick="openPopup()">Handle</button>
                            <div class="popup" id="popup">
                                <form method="post"  action="<?= ROOT ?>/cca/complaints/accepted/handle/<?=$comp->comp_id ?>">
                                    <div class="input-box">
                                        <label >Handled Details</label>
                                        <textarea id="comment" name="comment"> </textarea>
                                    </div>
                                    <button type="submit" class="button-s2" onclick="closePopup()">Ok</button>
                                </form>
                            </div>
                        </div>
                    <?php endif ?>
                    <!--                    idle buttons-->

                    <?php if ($status->status == 'Idle') : ?>
                        <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">
                        <a href="<?= ROOT ?>/cca/complaints/idle/accept/<?=$comp->comp_id ?>">
                            <button class="button-s2">Accept</button>
                        </a>
                    </div>
                    <?php endif ?>



                    <!--                    assist button-->
                    <?php if ($status->status == 'Assist') : ?>
                        <button type="button" class="button-s2 "  onclick="openPopup()">Update</button>
                        <div class="popup" id="popup">
                            <form method="post"  action="<?= ROOT ?>/cca/complaints/assists/update/<?=$comp->comp_id ?>">
                                <div class="input-box">
                                    <label>Assist Details</label>
                                    <textarea id="comment" name="comment"><?=$comp->comment ?> </textarea>
                                </div>
                                <button type="submit" class="button-s2" onclick="closePopup()">Ok</button>
                            </form>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </section>
    </main>
</div>
<script>
    let popup = document.getElementById('popup');
    function openPopup() {
        popup.classList.add("open-popup");
    }
    function closePopup() {
        popup.classList.remove("open-popup");
    }
</script>
</body>
</html>