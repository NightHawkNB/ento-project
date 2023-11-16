<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>


    <main class="bg-lightgray dis-flex al-it-ce ju-co-ce wid-100">
        <div class="txt-c-black flex-1 pad-20 dis-flex ju-co-ce">
            <form method="POST" id="complaint-form" class="dis-flex-col ju-co-ce wid-50">
                <div class="dis-flex-col gap-10">
                    <label for="details" class="txt-c-black">Further Details :</label>
                    <textarea name="details" id="details" cols="30" rows="10"></textarea>
                    <div class="error"></div>
                </div>

                <div class="dis-flex gap-10">
                    <div class="dis-flex-col gap-10">
                        <label for="location" class="txt-c-black">Location :</label>
                        <input style="min-height: 40px" type="text" name="location" id="location">
                        <div class="error"></div>
                    </div>

                    <div class="dis-flex-col gap-10">
                        <label for="datetime" class="txt-c-black">Date and Time :</label>
                        <input style="min-height: 40px" type="datetime-local" name="datetime" id="datetime">
                        <div class="error"></div>
                    </div>
                </div>

                <div class="wid-100 dis-flex ju-co-ce">
                    <button class="btn-lay-2 btn-anima-hover bg-indigo-2 txt-c-white" type="submit">Submit</button>
                </div>

            </form>
        </div>
    </main>

    <?php $this->view('includes/footer') ?>
</div>
</body>
</html>