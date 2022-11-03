const login = document.querySelector('#loginin'),
    statusMessage = document.createElement('div');

// Login
login.addEventListener('submit', (e) => {
    e.preventDefault();
    login.appendChild(statusMessage);
    const formData = new FormData(login),
        json = JSON.stringify(Object.fromEntries(formData.entries()));
    postData('../app/loginin.php', json)
        .then((response) => {
            if (response.status !== 200) {
                throw new Error('status network not 200')
            }
            console.log(json);
            statusMessage.textContent = message.success;
        })
        .catch((error) => {
            statusMessage.textContent = message.error;
            console.error(error);
        })
        .finally(() => {
            login.reset();
            window.location.replace("/user.php")
            setTimeout(() => {
                statusMessage.remove();
            }, 6000);
        });
});