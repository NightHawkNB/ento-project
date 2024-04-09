<html lang="en">
<?php $this->view('includes/head',['style'=>['admin/adverification.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 dis-flex">
            <div class="glass-bg mar-10 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5" style="justify-content:stretch; align-items:stretch">

                <style>
                    .button {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        text-align: center;
                        line-height: 100%;
                        font-size: 16px;
                        font-weight: bolder;
                        color: #333;
                        background-color: #C7B2F1FF;
                        height: 20%;
                        width: 250px;
                    }

                    .button.selected {
                        /* Define the styles for the selected button */
                        background-color: #7b68ee; /* Change the background color to indicate selection */
                        color: white; /* Change the text color */
                        /* You can add more styles as needed */
                    }

                </style>

                <div class="dis-flex ju-co-sb" style="height:25%;  width:75%;margin-left: auto;margin-right: auto;">
                    <div class="pending" style="background-color: #38393b; width: 250px;">
                        <div class="" style="background-color: #ffffff; height: 80%;"></div>
                        <button id="pending-button" class="button" onclick="showDiv('pending-assist', 'pending-button')">
                            Pending Requests
                        </button>
                    </div>
                    <div class="todo" style="background-color: #1a9be6; width: 250px;">
                        <div class="" style="background-color: #ffffff;height: 80%;"></div>
                        <button id="todo-button" class="button" onclick="showDiv('assisting', 'todo-button')">
                            Todo Requests
                        </button>
                    </div>
                    <div class="handled" style="background-color: #8741cf; width: 250px;">
                        <div class="" style="background-color: #ffffff; height: 80%;"></div>
                        <button id="handled-button" class="button" onclick="showDiv('handled', 'handled-button')">
                            Handled Requests
                        </button>
                    </div>
                </div>

            <!-- Idle Requests -->
                <div id="pending-assist" class="flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="display: none; max-height: 70vh; overflow: auto;padding-right: 10px">
                    <?php if (empty($idlerequests)): ?>
                        <p style="color: #e3f2fd; font-weight: bold;font-size: 20px;">No todo requests</p>
                    <?php else: ?>
                        <?php foreach($idlerequests as $request): ?>
                            <?php $this->view('admin/components/assrequests',(array)$request); ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!-- To do Requests -->
                <div id="assisting" class="flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="display: none;max-height: 70vh; overflow: auto;padding-right: 10px">
                    <?php if (empty($assistrequests)): ?>
                        <p style="color: #e3f2fd; font-weight: bold;font-size: 20px;">No todo requests</p>
                    <?php else: ?>
                        <?php foreach($assistrequests as $request): ?>
                            <?php $this->view('admin/components/assrequests',(array)$request); ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <!--Handled Request-->
                <div id="handled" class="flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10" style="display: none;max-height: 70vh; overflow: auto;padding-right: 10px">
                    <?php if (empty($handledrequests)): ?>
                        <p style="color: #e3f2fd; font-weight: bold;font-size: 20px;">No handled requests</p>
                    <?php else: ?>
                        <?php foreach($handledrequests as $request): ?>
                            <?php $this->view('admin/components/assrequests',(array)$request); ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

            </div>
        </section>
    </main>
</div>

<script>
    function showDiv(divId, buttonId) {
        // Hide all divs
        document.getElementById('pending-assist').style.display = 'none';
        document.getElementById('assisting').style.display = 'none';
        document.getElementById('handled').style.display = 'none';

        // Show the selected div
        document.getElementById(divId).style.display = 'block';

        // Remove 'selected' class from all buttons
        document.querySelectorAll('.button').forEach(button => {
            button.classList.remove('selected');
        });

        // Add 'selected' class to the clicked button
        document.getElementById(buttonId).classList.add('selected');
    }
</script>

</body>
</html>
