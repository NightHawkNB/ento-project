<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="bg-lightgray dis-flex al-it-ce ju-co-ce wid-100">
        <div class="bg-lightgray txt-c-black flex-1 pad-20 dis-flex ju-co-ce">
          <form method="POST" id="complaint-form" class="dis-flex-col ju-co-ce wid-50">
            <label for="details" class="txt-c-black">Type your complaint :</label>
            <textarea name="details" id="details" cols="30" rows="10"></textarea>
            <div class="error"></div>
            <label for="files" class="txt-c-black">Add Files :</label>
            <input type="text" name="files" class="input">
            <div class="error"></div>

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