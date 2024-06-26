<html lang="en">
<?php $this->view('includes/head') ?>
<style>
    .verify-container {
        width: 100%;
        height: 100%;
        background: #fff;
        padding: 25px;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        justify-content: stretch;

        .content {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
    }

    .verify-container header {
        font-size: 1.5rem;
        color: #333;
        font-weight: 500;
        text-align: center;
    }

    .form .input-box {
        width: 100%;
    }

    .input-box label {
        color: #333;
    }

    .form .input-box input {
        height: 50px;
        width: 100%;
        outline: none;
        font-size: 1rem;
        color: #707070;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 0 15px;
    }

    .form .colum {
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

    .complaint-container .right {
        width: 100%;
        display: flex;
        flex-direction: column;

        .photo {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
    }

    .complaint-container .left {
        display: flex;
        flex-direction: column;
        gap: 20px;
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
            <div class="verify-container">
                <div class="form" style="width: 100%">
                    <div class="content">
                        <div class="left">
                            <div class="input-box">
                                <style>
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
                                </style>
                                <label>Full Name</label>
                                <div class="input-like"><?= $assists->fname." ".$assists->lname ?> </div>
                            </div>
                            <div class="input-box">
                                <label>Address</label>
                                <div class="input-like"><?= $assists->address1.", ".$assists->address2.", ".$assists->province.", ".$assists->district ?> </div>
                            </div>
                                <div class="input-box">
                                    <label>Nic</label>
                                    <div class="input-like"><?= $assists->nic_num?> </div>
                                </div>
                                <div class="input-box">
                                    <label>Contact Number</label>
                                    <div class="input-like"><?= $assists->contact_num?> </div>
                                </div>
                                <div class="input-box">
                                <label>User Type </label>
                                <div class="input-like"><?= $assists->user_type ?> </div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="photo">
                                <img src="<?= ROOT ?>/assets/images/vrequests/1.jpg" style="width: 200px" alt="id front">
                                <br>
                                <img src="<?= ROOT ?>/assets/images/vrequests/1.jpg" style="width: 200px" alt="id back">
                            </div>
                        </div>
                    </div>
                </form>
<!--                    <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">-->
<!--                        <a href="--><?php //= ROOT ?><!--/cca/complaints/accepted/assists/--><?php //= $comp->comp_id ?><!--">-->
<!--                            <button class="btn-lay-2 hover-pointer btn-anima-hover">Assists</button>-->
<!--                        </a>-->
<!--                        <button class="btn-lay-2 hover-pointer btn-anima-hover" onclick="openPopup()">Handle</button>-->
<!--                    </div>-->
            </div>
        </section>
    </main>
</div>
</body>
</html>