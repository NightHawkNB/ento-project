<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <!-- PayHere Integration -->
    <script type="text/javascript" src="<?= ROOT ?>/assets/scripts/payhere.js"></script>

    <main class="dis-flex al-it-st ju-co-st wid-100">
        <div class="bg-primary dis-flex-col al-it-ce wid-100 pad-10-20 gap-10">
            <h1 class="f-mooli f-space-2">Buy Tickets</h1>

            <div class="ticket-form flex-1">
                <form method="post" class="pad-20 dis-flex-col ju-co-ce al-it-ce">
                    <div class="txt-c-black f-mooli txt-w-bolder dis-flex gap-10 ju-co-ce al-it-ce pt-10">
                        <h3 class="txt-w-normal">Event Name : </h3>
                        <h1><?= $event->name ?></h1>
                    </div>

                    <fieldset class="bor-rad-5 dis-flex-col gap-10 min-w-400">
                        <legend class="pad-10">Payment Confirmation</legend>

                        <div class="dis-flex gap-10 al-it-ce">
                            <label class="min-w-150" for="total_price">Total Amount</label>

                            <input type="number" id="total_price" name="total_price" class="input wid-100 txt-ali-cen" placeholder="<?= $amount ?>" disabled>
                        </div>
                    </fieldset>

                </form>

                <div class="wid-100 dis-flex ju-co-ce bg-white pb-10">
                    <button type="submit" id="payhere-payment" class=" button-s2 min-w-150 hover-pointer">PayHere Pay</button>
                </div>

                <script>
                    // Payment completed. It can be a successful failure.
                    payhere.onCompleted = function onCompleted(orderId) {
                        console.log("Payment completed. OrderID:" + orderId);
                        // Note: validate the payment and show success or failure page to the customer
                    };

                    // Payment window closed
                    payhere.onDismissed = function onDismissed() {
                        // Note: Prompt user to pay again or show an error page
                        console.log("Payment dismissed");
                    };

                    // Error occurred
                    payhere.onError = function onError(error) {
                        // Note: show an error page
                        console.log("Error:"  + error);
                    };

                    // Put the payment variables here
                    var payment = {
                        "sandbox": true,
                        "merchant_id": "<?= $merchant_id ?>",    // Replace your Merchant ID
                        "return_url": "<?= ROOT ?>/home/events/2/return",     // Important
                        "cancel_url": "home/events/2/return",     // Important
                        "notify_url": "<?= ROOT ?>/home/events/<?= $event_id ?>/notify",
                        "order_id": "<?= $order_id ?>",
                        "items": "Door bell wireles",
                        "amount": "<?= $amount ?>",
                        "currency": "LKR",
                        "hash": "<?= $hash ?>", // *Replace with generated hash retrieved from backend
                        "first_name": "Saman",
                        "last_name": "Perera",
                        "email": "samanp@gmail.com",
                        "phone": "0771234567",
                        "address": "No.1, Galle Road",
                        "city": "Colombo",
                        "country": "Sri Lanka",
                        "delivery_address": "No. 46, Galle road, Kalutara South",
                        "delivery_city": "Kalutara",
                        "delivery_country": "Sri Lanka",
                        "custom_1": "",
                        "custom_2": ""
                    };

                    // Show the payhere.js popup, when "PayHere Pay" is clicked
                    document.getElementById('payhere-payment').onclick = function (e) {
                        payhere.startPayment(payment);
                    };
                </script>

            </div>
        </div>
    </main>
</div>
</body>
</html>