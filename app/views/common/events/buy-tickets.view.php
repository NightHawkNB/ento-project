<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dis-flex al-it-st ju-co-st wid-100">
        <div class="bg-primary dis-flex-col al-it-ce wid-100 pad-10-20 gap-10">
            <h1 class="f-mooli f-space-2">Buy Tickets</h1>
            <div class="wid-100 bg-black-2 txt-c-white bor-rad-5">
                <p class="pad-10">Progress Bar</p>
            </div>

            <script>
                function calc_total () {
                    var total = document.getElementById('count').value * document.getElementById('tickets').value
                    document.getElementById('total_price').value = total
                }
            </script>

            <div class="ticket-form flex-1">
                <form method="post" class="pad-20 dis-flex-col ju-co-ce al-it-ce">
                    <div class="txt-c-black f-mooli txt-w-bolder dis-flex gap-10 ju-co-ce al-it-ce pt-10">
                        <h3 class="txt-w-normal">Event Name : </h3>
                        <h1>Yaathra</h1>
                    </div>

                    <fieldset class="bor-rad-5 dis-flex-col gap-10 min-w-400">
                        <legend class="pad-10">Ticket Details</legend>
                        <div class="dis-flex gap-10 al-it-ce">
                            <label class="min-w-150" for="tickets">Ticket Price</label>
                            <select name="tickets" id="tickets" class="input wid-100 txt-ali-cen">
                                <option value="3000">LKR 3000</option>
                                <option value="5000">LKR 5000</option>
                                <option value="7000">LKR 7000</option>
                            </select>
                        </div>

                        <div class="dis-flex gap-10 al-it-ce">
                            <label class="min-w-150" for="count">Ticket Count</label>
                            <input type="number" id="count" name="count" class="input wid-100 txt-ali-cen" onChange="calc_total()" placeholder="Number of Tickets">
                        </div>

                        <div class="dis-flex gap-10 al-it-ce">
                            <label class="min-w-150" for="total_price">Total Amount</label>



                            <input type="number" id="total_price" name="total_price" class="input wid-100 txt-ali-cen" placeholder="--Total--" disabled>
                        </div>
                    </fieldset>

                    <fieldset class="bor-rad-5 min-w-400">
                        <legend class="pad-10">Online Payment Details</legend>
                        <div class="dis-flex al-it-ce gap-10">
                            <label class="min-w-150" for="acc_num">Card Number</label>
                            <input type="text" name="acc_num" class="input wid-100 txt-ali-cen" placeholder="Card Details" required>
                        </div>
                    </fieldset>

                    <button class="btn-lay-2 btn-anima-hover min-w-150">Pay</button>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>