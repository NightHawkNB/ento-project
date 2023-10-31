<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 pad-20 mar-bot-10">
            <div class="dis-flex-col gap-10 bg-grey pad-10 bor-rad-5 txt-c-white" style="height: 100%">
                <h2 class="mar-10-auto">Tickets</h2>
                <div class="dis-flex wid-60 bg-white mar-10-auto">
                    <div  class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
                        <?php
                        // Example ticket details
                        $ticketDetails = [
                            'QRCode' => 'https://ekimmobilier.com/images/qrcode-immobilier.png',
                            'Name' => 'KUWENI',
                            'SerialNumber' => '123456789',
                            'Date' => '2023-11-15',
                            'Venue' => 'Venue 1',
                            'Price' => 'RS.5000'
                        ];
                        ?>
                        <img  src="<?php echo $ticketDetails['QRCode']; ?>" alt="QR Code">
                        <div class="txt-c-black">
                            <P><?php echo $ticketDetails['Name']; ?></P>
                        </div>
                       <div class="txt-c-black">
                           <p>Serial Number: <?php echo $ticketDetails['SerialNumber']; ?></p>
                       </div>
                       <div class="dis-flex-col ju-co-sa txt-c-black" >
                           <p>Date: <?php echo $ticketDetails['Date']; ?></p>
                           <p>Venue: <?php echo $ticketDetails['Venue']; ?></p>
                           <p>Price: <?php echo $ticketDetails['Price']; ?></p>
                       </div>
                    </div>
                </div>

                <div class="dis-flex wid-60 bg-white mar-10-auto">
                    <div  class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
                            <?php
                            // Example ticket details
                            $ticketDetails = [
                                'QRCode' => 'https://ekimmobilier.com/images/qrcode-immobilier.png',
                                'Name' => 'THALA',
                                'SerialNumber' => '000998877',
                                'Date' => '2023-11-18',
                                'Venue' => 'Nelum Pokuna',
                                'Price' => 'RS.15000'
                            ];
                            ?>
                        <img  src="<?php echo $ticketDetails['QRCode']; ?>" alt="QR Code">
                        <div class="txt-c-black">
                            <P><?php echo $ticketDetails['Name']; ?></P>
                        </div>
                        <div class=txt-c-black">
                            <p>Serial Number: <?php echo $ticketDetails['SerialNumber']; ?></p>
                        </div>
                        <div class="dis-flex-col ju-co-sa txt-c-black" >
                            <p>Date: <?php echo $ticketDetails['Date']; ?></p>
                            <p>Venue: <?php echo $ticketDetails['Venue']; ?></p>
                            <p>Price: <?php echo $ticketDetails['Price']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="dis-flex wid-60 bg-white mar-10-auto">
                    <div  class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
                            <?php
                            // Example ticket details
                            $ticketDetails = [
                                'QRCode' => 'https://ekimmobilier.com/images/qrcode-immobilier.png',
                                'Name' => 'MA NOWANA MAMA',
                                'SerialNumber' => '11112234',
                                'Date' => '2023-12-16',
                                'Venue' => 'Venue 2',
                                'Price' => 'RS.25000'
                            ];
                            ?>
                        <img  src="<?php echo $ticketDetails['QRCode']; ?>" alt="QR Code">
                        <div class="txt-c-black">
                            <P><?php echo $ticketDetails['Name']; ?></P>
                        </div>
                        <div class=txt-c-black">
                            <p>Serial Number: <?php echo $ticketDetails['SerialNumber']; ?></p>
                        </div>
                        <div class="dis-flex-col ju-co-sa txt-c-black" >
                            <p>Date: <?php echo $ticketDetails['Date']; ?></p>
                            <p>Venue: <?php echo $ticketDetails['Venue']; ?></p>
                            <p>Price: <?php echo $ticketDetails['Price']; ?></p>
                        </div>
                    </div>
                </div>


            </div>
        </section>
    </main>
</div>
</body>
</html>