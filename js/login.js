const login = document.querySelector('#loginin'),
    statusMessage = document.createElement('div');

const message = {
    loading: 'Загрузка...',
    success: 'Пользователь успешно зарегистрирован',
    error: 'Возникла ошибка...',
    errorJson: 'Ошибка в JSON',
};

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
                } else if (validateJson(response)) {
                    throw new Error(message.errorJson)
                }
                statusMessage.textContent = message.success;
            })
            .catch((error) => {
                // statusMessage.textContent = message.error;
                // console.error(error);
            })
            .finally(() => {
                // login.reset();
                setTimeout(() => {
                    window.location.replace("../user.php")
                    statusMessage.remove();
                }, 1000);
            });
});