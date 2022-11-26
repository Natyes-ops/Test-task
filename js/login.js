const login = document.querySelector('#loginin'),
    statusMessage = document.createElement('div');

const message = {
    loading: 'Загрузка...',
    success: 'Пользователь успешно зарегистрирован',
    error: 'Возникла ошибка...'
};
statusMessage.classList.add('status');

login.addEventListener('submit', (e) => {
    e.preventDefault();
    login.appendChild(statusMessage);

    const formData = new FormData(login),
        json = JSON.stringify(Object.fromEntries(formData.entries()));
        postData('../app/loginin.php', json)
            .then((response) => {
                if (response.status == 200) {
                    statusMessage.style.color = 'green';
                    statusMessage.textContent = response.success;
                } else if (validateJson(response)) {
                    throw new Error(message.errorJson)
                } else if (response.type == 'error') {
                    statusMessage.textContent = response.error;
                } else {
                    throw new Error('status network not 200')
                }
            })
            .finally(() => {
                // login.reset();
                setTimeout(() => {
                    window.location.replace("../user.php")
                    statusMessage.remove();
                }, 2000);
            });
});