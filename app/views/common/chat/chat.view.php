<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <style>
        /* nice scroll bar */
        ::-webkit-scrollbar {
            width: 5px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
            border-radius: 50px;
        }
        ::-webkit-scrollbar-thumb {
            background: var(--c-primary);
            border-radius: 50px;
        }
    </style>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="wid-100 ju-co-ce pad-10 dis-flex hei-100">

            <div class="wid-100 hei-100 bor-rad-5 dis-flex-col al-it-ce ju-co-ce pad-20 gap-20">
                <div class="chat-wrapper">
                    <div id="chat" class="chat-container wid-100 hei-100 pad-10 bor-rad-5 gap-10" style="height: 65vh; overflow-y: auto">
<!--                        <h3 class="txt-c-white">Message Box</h3>-->
                        <?php
                        if(!empty($msg)) {
                            foreach($msg as $message) {
                                $this->view("common/chat/components/message", (array)$message);
                            }
                        }
                        ?>

                    </div>

                    <div class="msg-field">
                        <input type="text" id="msg" name="msg">
                        <button id="send-btn">
                            <img src="<?= ROOT ?>/assets/images/icons/send.png" alt="send button">
                        </button>
                    </div>
                </div>
            </div>

        </section>
    </main>


    <script>

        /* SCRIPT FOR SCROLLING THE MESSAGE HISTORY TO THE BOTTOM  */

        let target_div = document.getElementById("chat");
        target_div.scrollTop = target_div.scrollHeight

        /* SCRIPT FOR SENDING MESSAGES ASYNCHRONOUSLY  */

        const input_field = document.getElementById('msg')

        const sender_id = "<?= (Auth::is_client()) ? $sen : Auth::getUser_id() ?>"
        const receiver_id = "<?= (Auth::is_client()) ? Auth::getUser_id() : $rec ?>"
        const reservation_id = "<?= $unique_id ?>"

        document.getElementById('send-btn').addEventListener("click", function() {

            if(input_field.value.length === 0) return;

            sendMsg()
        });

        function sendMsg() {

            let is_client = "<?= (Auth::is_client()) ? "1" : "0" ?>"
            console.log(is_client)

            let type = ""

            if(is_client === "1") type = "receiver"
            else type = "sender"

            let data = {
                "content" : input_field.value,
                "type" : type
            }

            const link = "<?= $_SERVER['REQUEST_URI'] ?>"
            let path = ""

            if(link.includes("resreq")) path = 'resreq'
            else if(link.includes("reserve")) path = 'reserve'
            else if(link.includes("complaint")) path = 'complaint'

            try {
                fetch(`/ento-project/public/chat/${path}/${sender_id}/${receiver_id}/${reservation_id}`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json; charset=utf-8"
                    },
                    body: JSON.stringify(data)
                }).then(res => {
                    // console.log(res)
                    return res.text()
                }).then(data => {
                    // Shows the data printed by the targeted php file.
                    // (stopped printing all data in php file by using die command)
                    console.log(data)
                })
            } catch (e) {
                console.log("message sending error")
            }

            function new_msg_sender(data) {

                let now = new Date()

                let new_msg = document.createElement('div')
                let content_part = document.createElement('div')
                content_part.classList.add('m-content')
                content_part.innerHTML = data.content

                let meta_part = document.createElement('div')
                meta_part.classList.add('m-meta')

                // let date_part = document.createElement('div')
                // date_part.classList.add('m-date')
                // date_part.innerHTML = now.getFullYear() + "-" + (now.getMonth()+1) + "-" + now.getDate()

                let time_part = document.createElement('div')
                time_part.classList.add('m-time')
                time_part.innerHTML = formatAMPM(now)

                // meta_part.appendChild(date_part)
                meta_part.appendChild(time_part)

                new_msg.appendChild(content_part)
                new_msg.appendChild(meta_part)

                new_msg.classList.add("message")
                new_msg.classList.add("sender")

                // Append the div to the body of the document
                target_div.appendChild(new_msg);

                target_div.scrollTop = target_div.scrollHeight
            }

            new_msg_sender(data)

            input_field.value = ""
        }

        function formatAMPM(date) {
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0'+minutes : minutes;
            return hours + ':' + minutes + ' ' + ampm;
        }

        function new_msg_receiver(data) {

            let now = new Date()

            let new_msg = document.createElement('div')
            let content_part = document.createElement('div')
            content_part.classList.add('m-content')
            content_part.innerHTML = data.content

            let meta_part = document.createElement('div')
            meta_part.classList.add('m-meta')

            // let date_part = document.createElement('div')
            // date_part.classList.add('m-date')
            // date_part.innerHTML = now.getFullYear() + "-" + (now.getMonth()+1) + "-" + now.getDate()

            let time_part = document.createElement('div')
            time_part.classList.add('m-time')
            time_part.innerHTML = formatAMPM(now)

            // meta_part.appendChild(date_part)
            meta_part.appendChild(time_part)

            new_msg.appendChild(content_part)
            new_msg.appendChild(meta_part)

            new_msg.classList.add("message")
            new_msg.classList.add("receiver")

            // Append the div to the body of the document
            target_div.appendChild(new_msg);

            target_div.scrollTop = target_div.scrollHeight
        }

        function send_put() {

            let message_count = document.querySelectorAll(".message").length
            let messages = []


            let data = {
                "from" : message_count
            };

            const link = "<?= $_SERVER['REQUEST_URI'] ?>"
            let path = ""

            if(link.includes("resreq")) path = 'resreq'
            else if(link.includes("reserve")) path = 'reserve'

            if(message_count > 0) {
                try {
                    fetch(`/ento-project/public/chat/${path}/${sender_id}/${receiver_id}/${reservation_id}`, {
                        method: "PUT",
                        headers: {
                            "Content-Type": "application/json; charset=utf-8"
                        },
                        body: JSON.stringify(data)
                    }).then(res => {
                        // console.log(res)
                        return res.text()
                    }).then(data => {
                        // Shows the data printed by the targeted php file.
                        // (stopped printing all data in php file by using die command)
                        console.log(data)
                        if(data) {
                            messages = JSON.parse(data)
                            console.log(messages)

                            messages.forEach(msg => {
                                new_msg_receiver(msg)
                                // console.log(msg)
                            })
                        }
                    })
                } catch (e) {
                    console.log("message receiving error")
                }
            }
        }

        // Repeatedly checks for new messages and adds them to the chat box
        setInterval(send_put, 1000)
    </script>

</div>
</body>
</html>