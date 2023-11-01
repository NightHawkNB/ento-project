<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <style>
        img {
            width: 100px;
            height: 100px;
        }

        .events > div {
            padding: 10px 20px;
            width: 70%;
        }

        .events div > div {
            border-radius: 5px;
        }

        .events div > div:nth-child(1) {
            margin-bottom: 20px;
        }

        .events {
            align-items: center;
            gap: 100px;
        }
    </style>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="dis-flex-col gap-20 pad-20 events">
            <!--        Event 01-->
                <div class="dis-flex-col gap-10 bg-grey pad-10 bor-rad-5 txt-c-white" style="height: auto">
                    <h2 class="mar-0 al-it-ce" >Event 01 Reservation Details</h2>
                    <div class="dis-flex gap-10">
                        <div class="dis-flex wid-100 bg-white mar-10-auto">
                            <div  class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
                                <?php
                                $EventDetails = [
                                        'Name' => 'KUWENI',
                                        'Date' => '2023-11-15',
                                ];
                                ?>
                                <img  src="<?= ROOT ?>/assets/images/event/event1.png" alt="event pic">
                                <div class="txt-c-black">
                                    <p>Event Name:</p>
                                    <P><?php echo $EventDetails['Name']; ?></P>
                                </div>
                                <div class="txt-c-black">
                                    <p>Date:</p>
                                    <P><?php echo $EventDetails['Date']; ?></P>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="mar-0 txt-ali-lef">Venue Reservation Details</h3>
                        <div class="dis-flex wid-100 bg-white mar-10-auto">
                            <div  class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
                                <?php
                                $VenueDetails = [
                                    'Name' => 'Nelum Pokuna',
                                    'Date' => '2023-11-15',
                                    'State' => 'Pending'
                                ];
                                ?>
                                <img  src="<?= ROOT ?>/assets/images/venues/venue1.png" alt="venue pic">
                                <div class="txt-c-black">
                                    <p>Venue:</p>
                                    <P><?php echo $VenueDetails['Name']; ?></P>
                                </div>
                                <div class="txt-c-lightgreen">
                                    <p class="txt-c-black">State:</p>
                                    <P><?php echo $VenueDetails['State']; ?></P>
                                </div>
                                <div class="txt-c-black">
                                    <p>Date:</p>
                                    <P><?php echo $VenueDetails['Date']; ?></P>
                                </div>
                                <button class="btn-lay-2 hover-pointer btn-anima-hover">New Reservation</button>

                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="mar-0 txt-ali-lef">Music Band Reservation Details</h3>
                        <div class="dis-flex wid-100 bg-white mar-10-auto">
                            <div  class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
                                <?php
                                $MusicBandDetails = [
                                    'Name' => 'Wayo',
                                    'Date' => '2023-11-15',
                                    'State' => 'Pendding'
                                ];
                                ?>
                                <img  src="<?= ROOT ?>/assets/images/music_bands/music_band_1.png" alt="Music band pic">
                                <div class="txt-c-black">
                                    <p>Music Band:</p>
                                    <P><?php echo $MusicBandDetails['Name']; ?></P>
                                </div>
                                <div class="txt-c-lightgreen">
                                    <p class="txt-c-black">State:</p>
                                    <P><?php echo $MusicBandDetails['State']; ?></P>
                                </div>
                                <div class="txt-c-black">
                                    <p>Date:</p>
                                    <P><?php echo $MusicBandDetails['Date']; ?></P>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="mar-0 txt-ali-lef">Singer 01 Reservation Details</h3>
                        <div class="dis-flex wid-100 bg-white mar-10-auto">
                            <div  class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
                                <?php
                                $singer01Details = [
                                    'Name' => 'Thisara Dilshan',
                                    'Date' => '2023-11-15',
                                    'State' => 'Pendding'
                                ];
                                ?>
                                <img src="<?= ROOT ?>/assets/images/singers/singer1.png" alt="singer">
                                <div class="txt-c-black">
                                    <p>Singer:</p>
                                    <P><?php echo $singer01Details['Name']; ?></P>
                                </div>
                                <div class="txt-c-lightgreen">
                                    <p class="txt-c-black">State:</p>
                                    <P><?php echo $singer01Details['State']; ?></P>
                                </div>
                                <div class="txt-c-black">
                                    <p>Date:</p>
                                    <P><?php echo $singer01Details['Date']; ?></P>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="mar-0 txt-ali-lef">Singer 02 Reservation Details</h3>
                        <div class="dis-flex wid-100 bg-white mar-10-auto">
                            <div  class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
                                <?php
                                $singer02Details = [
                                    'Name' => 'Kasun Kalhara',
                                    'Date' => '2023-11-15',
                                    'State' => 'Pendding'
                                ];
                                ?>
                                <img src="<?= ROOT ?>/assets/images/singers/singer2.png" alt="singer">
                                <div class="txt-c-black">
                                    <p>Singer:</p>
                                    <P><?php echo $singer02Details['Name']; ?></P>
                                </div>
                                <div class="txt-c-lightgreen">
                                    <p class="txt-c-black">State:</p>
                                    <P><?php echo $singer02Details['State']; ?></P>
                                </div>
                                <div class="txt-c-black">
                                    <p>Date:</p>
                                    <P><?php echo $singer02Details['Date']; ?></P>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



                <!--        Event 02-->
                <!--            <section class="cols-10 pad-20 mar-bot-10">-->
                <div class="dis-flex-col gap-10 bg-grey pad-10 bor-rad-5 txt-c-white" style="height: auto">
                    <h2 class="mar-0 al-it-ce" >Event 02 Reservation Details</h2>
                    <div class="dis-flex gap-10">
                        <div class="dis-flex wid-100 bg-white mar-10-auto">
                            <div  class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
                                <?php
                                $EventDetails = [
                                    'Name' => 'MA NOWANA MAMA',
                                    'Date' => '2023-12-31',
                                ];
                                ?>
                                <img  src=<?= ROOT ?>/assets/images/event/event2.png alt="event pic">
                                <div class="txt-c-black">
                                    <p>Event Name:</p>
                                    <P><?php echo $EventDetails['Name']; ?></P>
                                </div>
                                <div class="txt-c-black">
                                    <p>Date:</p>
                                    <P><?php echo $EventDetails['Date']; ?></P>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="mar-0 txt-ali-lef">Venue Reservation Details</h3>
                        <div class="dis-flex wid-100 bg-white mar-10-auto">
                            <div  class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
                                <?php
                                $VenueDetails = [
                                    'Name' => 'Gall FACE',
                                    'Date' => '2023-12-31',
                                    'State' => 'Accepted'
                                ];
                                ?>
                                <img  src="<?= ROOT ?>/assets/images/venues/venue2.png" alt="venue pic">
                                <div class="txt-c-black">
                                    <p>Venue:</p>
                                    <P><?php echo $VenueDetails['Name']; ?></P>
                                </div>
                                <div class="txt-c-green">
                                    <p class="txt-c-black">State:</p>
                                    <P><?php echo $VenueDetails['State']; ?></P>
                                </div>
                                <div class="txt-c-black">
                                    <p>Date:</p>
                                    <P><?php echo $VenueDetails['Date']; ?></P>
                                </div>
                                <button class="btn-lay-2 hover-pointer btn-anima-hover">Chat</button>

                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="mar-0 txt-ali-lef">Music Band Reservation Details</h3>
                        <div class="dis-flex wid-100 bg-white mar-10-auto">
                            <div  class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
                                <?php
                                $MusicBandDetails = [
                                    'Name' => 'Sun Flower',
                                    'Date' => '2023-12-31',
                                    'State' => 'Pendding'
                                ];
                                ?>
                                <img  src="<?= ROOT ?>/assets/images/music_bands/music_band_2.png" alt="Music band pic">
                                <div class="txt-c-black">
                                    <p>Music Band:</p>
                                    <P><?php echo $MusicBandDetails['Name']; ?></P>
                                </div>
                                <div class="txt-c-lightgreen">
                                    <p class="txt-c-black">State:</p>
                                    <P><?php echo $MusicBandDetails['State']; ?></P>
                                </div>
                                <div class="txt-c-black">
                                    <p>Date:</p>
                                    <P><?php echo $MusicBandDetails['Date']; ?></P>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="mar-0 txt-ali-lef">Singer 01 Reservation Details</h3>
                        <div class="dis-flex wid-100 bg-white mar-10-auto">
                            <div  class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
                                <?php
                                $singer01Details = [
                                    'Name' => 'Sanka Dineth',
                                    'Date' => '2023-12-31',
                                    'State' => 'Pendding'
                                ];
                                ?>
                                <img src=<?= ROOT ?>/assets/images/singers/singer3.png alt="singer">
                                <div class="txt-c-black">
                                    <p>Singer:</p>
                                    <P><?php echo $singer01Details['Name']; ?></P>
                                </div>
                                <div class="txt-c-lightgreen">
                                    <p class="txt-c-black">State:</p>
                                    <P><?php echo $singer01Details['State']; ?></P>
                                </div>
                                <div class="txt-c-black">
                                    <p>Date:</p>
                                    <P><?php echo $singer01Details['Date']; ?></P>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="mar-0 txt-ali-lef">Singer 02 Reservation Details</h3>
                        <div class="dis-flex wid-100 bg-white mar-10-auto">
                            <div  class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 dis-flex gap-20 al-it-ce ju-co-sb ads sh f-poppins">
                                <?php
                                $singer02Details = [
                                    'Name' => 'Shehan Mihiranga',
                                    'Date' => '2023-12-31',
                                    'State' => 'Pendding'
                                ];
                                ?>
                                <img src=<?= ROOT ?>/assets/images/singers/singer4.png alt="singer">
                                <div class="txt-c-black">
                                    <p>Singer:</p>
                                    <P><?php echo $singer02Details['Name']; ?></P>
                                </div>
                                <div class="txt-c-lightgreen">
                                    <p class="txt-c-black">State:</p>
                                    <P><?php echo $singer02Details['State']; ?></P>
                                </div>
                                <div class="txt-c-black">
                                    <p>Date:</p>
                                    <P><?php echo $singer02Details['Date']; ?></P>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!--        </section>-->
        </section>
    </main>
</div>
</body>
</html>