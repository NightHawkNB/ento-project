<html lang="en">
<?php $this->view('includes/head') ?>
<style>
    .complaint-container {
        width: 100%;
        height: 100%;
        background: #faf7f7;
        padding: 25px;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        justify-content: stretch;

        .content {
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            background: #faf7f7;
            width: 100%;

            .inputflex{
                display: flex;
                gap: 10px;
            }
        }
    }

    /*.complaint-container header {*/
    /*    font-size: 1.5rem;*/
    /*    color: #333;*/
    /*    font-weight: 500;*/
    /*    text-align: center;*/
    /*}*/



    .input-box label {
        color: #333;
    }

   .input-box input {
        height: 50px;
        width: 100%;
        outline: none;
        font-size: 1rem;
        color: #707070;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 0 15px;
    }

    .colum {
        display: flex;
        column-gap: 10px;
    }

    .btn {
        justify-content: center;
        border: none;
        outline: none;
        border-radius: 8px;
        padding: 20px;
        color: #333;
    }

    .complaint-container  {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .complaint-container .head{
        justify-content: center;
    }
</style>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>
    <main class="dashboard-main ">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 pad-20 dis-flex wid-100 hei-100 ju-co-ce al-it-ce">
            <div class="complaint-container">
                <div class="form" style="width: 100%">
                    <div class="content">
                        <style>
                            .head{
                                background-color: #d9cbf3;
                                border-radius: 8px;
                                font-size: 1.5rem;
                            }

                            .input-like {
                                height: 50px;
                                width: 100%;
                                outline: none;
                                font-size: 1rem;
                                color: #707070;
                                border: 1px solid #ddd;
                                border-radius: 8px;
                                padding: 0 15px;
                                display: flex;
                                align-items: center;
                            }
                                .input-box {
                                    display: flex;
                                    flex-direction: column;
                                    width: 100%;
                                    gap: 5px;
                                    padding-top: 5px;
                                }
                                .inputflex .input-box label{
                                    padding-top: 20px;
                                }

                        </style>
                                <h1 class = "dis-flex ju-co-ce pad-20 head">Complaint Details</h1>
                                <div class="inputflex">
                                    <div class="input-box">
                                        <label>Complaint Id</label>
                                        <div class="input-like"><?= $comp->comp_id?> </div>
                                    </div>
                                    <div class="input-box">
                                        <label>User Id </label>
                                        <div class="input-like"><?= $comp->user_id ?> </div>
                                    </div>
                                </div>
                                <div class="input-box">
                                    <label>Details</label>
                                    <div class="input-like"><?= $comp->details?> </div>
                                </div>
                                <div class="input-box">
                                    <label>Timestamp</label>
                                    <div class="input-like"><?= $comp->date_time?> </div>
                                </div>
                            </div>
                    <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">
                        <a href="<?= ROOT ?>/cca/complaints/accepted/assists/<?= $comp->comp_id ?>">
                            <button class="btn-lay-2 hover-pointer btn-anima-hover">Assists</button>
                        </a>
                        <button class="btn-lay-2 hover-pointer btn-anima-hover" onclick="openPopup()">Handle</button>
                    </div>
                    <div class="popup" id="popup">
                        <h2>Handle details</h2>
                            <input type = "text" >
                        <a href="<?= ROOT ?>/cca/complaints/accepted/handle/<?= $comp->comp_id ?>">
                            <button type="button" onclick="closePopup()">Ok</button>
                        </a>
                    </div>
<!--                    <div class="popup" id="popup">-->
<!--                        <h2>Handle details</h2>-->
<!--                        <input type="text">-->
<!--                        <a href="--><?php //= ROOT ?><!--/cca/complaints/accepted/handle/--><?php //= $comp->comp_id?><!--">-->
<!--                            <button type="button" onclick="closePopup()">Ok</button>-->
<!--                        </a>-->
<!--                    </div>-->
                </div>
        </section>
    </main>
</div>
<script>
    // let popup = document.getElementById('popup');
    // function openPopup() {
    //     popup.classList.add("open-popup");
    // }
    // function closePopup() {
    //     popup.classList.remove("open-popup");
    // }
    //
    // openPopup();
    let popup = document.getElementById('popup');
    function openPopup() {
        popup.classList.add("open-popup");
    }
    function closePopup() {
        popup.classList.remove("open-popup");
    }
    // Call openPopup somewhere, for example:
    openPopup();
</script>
</body>
</html>