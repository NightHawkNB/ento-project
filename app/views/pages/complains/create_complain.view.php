<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="bg-lightgray dis-flex al-it-ce ju-co-ce">
        <div class="bg-black-2 flex-1 pad-20">
          <form method="POST">
            <label for="details">Type your complain:</label>
            <textarea name="details" id="details" cols="30" rows="10"></textarea>
            <label for="files">Add Files:</label>
            <input type="text" name="files"  >
            <button class="btn-lay-s btn-anima-hover bg-indigo-2 txt-c-white" type="submit">Submit</button>
          </form>
        </div>
    </main>

    <?php $this->view('includes/footer') ?>
</div>
</body>
</html>