<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dis-flex al-it-st ju-co-st wid-100">
        <div class="bg-primary dis-flex-col al-it-ce wid-100 pad-10-20 gap-10">
            <h1 class="f-mooli f-space-2">Buy Tickets</h1>

            <!-- PayHere Integration -->
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
            <script>
                function calc_total() {
                    // Get the selected option element
                    var selectedOption = document.getElementById('tickets').options[document.getElementById('tickets').selectedIndex];

                    // Get the data-value attribute of the selected option
                    var ticketPrice = parseFloat(selectedOption.dataset.value);

                    // Get the value of the count input field
                    var ticketCount = parseInt(document.getElementById('count').value);

                    // Calculate the total amount
                    var totalAmount = ticketPrice * ticketCount;

                    // Set the total amount in the amount input field
                    document.getElementById('amount').value = totalAmount.toFixed(2); // Fixed to 2 decimal places
                }
            </script>


            <div class="ticket-form flex-1">
                <form method="post" class="pad-20 dis-flex-col ju-co-ce al-it-ce">
                    <div class="txt-c-black f-mooli txt-w-bolder dis-flex gap-10 ju-co-ce al-it-ce pt-10">
                        <h3 class="txt-w-normal">Event Name : </h3>
                        <h1><?= $event->name ?></h1>
                    </div>

                    <fieldset class="bor-rad-5 dis-flex-col gap-10 min-w-400">
                        <legend class="pad-10">Ticket Details</legend>
                        <div class="dis-flex gap-10 al-it-ce">
                            <label class="min-w-150" for="tickets">Ticket Price</label>
                            <select name="tickets" id="tickets" class="input wid-100 txt-ali-cen" onChange="calc_total()">
                                <?php foreach ($tickets as $ticket): ?>
                                    <option data-value="<?= $ticket->price ?>" value="<?= $ticket->type ?>"><?= ucfirst($ticket->type). " - LKR " .$ticket->price ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="dis-flex gap-10 al-it-ce">
                            <label class="min-w-150" for="count">Ticket Count</label>
                            <select id="count" name="count" class="input wid-100 txt-ali-cen" onChange="calc_total()">
                                <?php for ($i = 1; $i <= 10; $i++): ?>
                                    <option value="<?= $i ?>"><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>


                        <div class="dis-flex gap-10 al-it-ce">
                            <label class="min-w-150" for="amount">Total Amount</label>
                            <input type="number" id="amount" name="amount" class="input wid-100 txt-ali-cen" placeholder="--Total--" disabled>
                        </div>
                    </fieldset>

                    <button type="submit" class="btn-lay-2 btn-anima-hover min-w-150">Pay</button>
                </form>
            </div>
        </div>
    </main>
</div>
</body>
</html>