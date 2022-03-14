require('./bootstrap');

window.onload = function () {
    const messages = document.getElementById('messages');
    const username = document.getElementById('username');
    const message = document.getElementById('message');
    const messageForm = document.getElementById('messageForm');

    messageForm.addEventListener('submit', function(event) {
        event.preventDefault();

        let hasErrors = false;

        if(username.value === '') {
            alert('The username field is required.');
            hasErrors = true;
        } else if(message.value === '') {
            alert('The message field is required.');
            hasErrors = true;
        }

        if(hasErrors) return;

        const options = {
            method: 'post',
            url: '/chat/send',
            data: {
                username: username.value,
                message: message.value
            }
        }

        axios(options);
    });

    window.Echo.channel('chat')
        .listen('.message', (event) => {
            messages.innerHTML += '<div class="message"><strong>' + event.username + ': </strong>' + event.message + '</div>';
        });

}
