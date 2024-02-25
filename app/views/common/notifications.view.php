<html lang="en">
<?php $this->view('includes/head', ['style' => 'client/reservations.css']) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="wid-100 pad-10 dis-flex-col al-it-ce">

            <h1 class="mar-10-0 txt-c-white txt-w-bold" style="font-size: 1.5rem"> Notifications</h1>
            <div class="txt-ali-lef bg-black-1 txt-c-white wid-100 mar-10 pad-10 bor-rad-5">
                <h3>New</h3>
                <br>
                <div class="new"></div>
                <br>
                <hr>
                <br>
                <h3>Viewed</h3>
                <br>
                <div class="viewed"></div>
            </div>

        </section>
    </main>

</div>

</body>
</html>

<script>
    let data_array = []
    let new_count = 0
    let viewed_count = 0
    const new_notification = document.querySelector('.new')
    const viewed_notification = document.querySelector('.viewed')

    fetch("<?=ROOT?>/home/notification/fetch", {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json; charset=utf-8"
        }
    }).then(res => {
        return res.text()
    }).then(data => {
        console.log(data)
        data_array = JSON.parse(data)
        data_array.forEach(notification => {

            const divElement1 = document.createElement('li');
            const divElement2 = document.createElement('li');
            divElement1.innerHTML = `<a href="<?=ROOT?>${notification.link}">${notification.message} by ${notification.title}</a>`;
            divElement2.innerHTML = `<a href="<?=ROOT?>${notification.link}">Your reservation has been ${notification.status} by ${notification.title} and ${notification.message}</a>`

            if (notification.viewed === 0) {
                // to take count of new notifications
                new_count += 1
                // for type = Reservation
                console.log(notification.type + '////////////')
                if (notification.type === 'Reservation') {
                    new_notification.appendChild(divElement1);
                    divElement1.onclick = () => {
                        update_notification(notification.notification_id)
                    }
                }
                // for type = Reminders
                else if (notification.type === 'Reminder') {
                    new_notification.appendChild(divElement2);
                    divElement2.onclick = () => {
                        update_notification(notification.notification_id)
                    }
                }
            }else if (notification.viewed === 1) {
                viewed_count += 1
                if (notification.type === 'Reservation') {
                    viewed_notification.appendChild(divElement1);
                }else if(notification.type === 'Reminder')
                    viewed_notification.appendChild(divElement2);
            }
        });
        if (new_count === 0) {
            const divElement3 = document.createElement('div');
            divElement3.innerHTML = `<div>No new notifications</div>`
            new_notification.appendChild(divElement3)
        }else if(viewed_count === 0){
            const divElement4 = document.createElement('div');
            divElement3.innerHTML = `<div>No viewed notifications</div>`
            viewed_notification.appendChild(divElement4)
        }
             // create span to display count of notifications
        if (new_count > 0) {
            const notifiContainer = document.querySelector('.notifications_container');
            const newElement = document.createElement('span')
            newElement.classList.add('notifiCounter')
            newElement.innerHTML = new_count.toString()
            notifiContainer.appendChild(newElement)
        }

    }).catch(error => {
        console.error('Fetch error:', error);
    });

    // to update the viewed column
    function update_notification(notification_id) {

        let data = {
            'notification_id': notification_id,
            'viewed': 1
        }

        fetch("<?=ROOT?>/home/notification/fetch", {
            method: "PUT",
            headers: {
                "Content-Type": "application/json; charset=utf-8"
            },
            body: JSON.stringify(data)
        }).then(res => {
            return res.text()
        }).then(data => {
            console.log(data)
        }).catch(error => {
            console.error('Fetch error:', error);
        });
    }

    // take the count of the new notifications
    if (new_count === 0) {
        const notifiCounter = document.querySelector('.notifiCounter');
        if (notifiCounter) notifiCounter.remove()
    }
</script>

