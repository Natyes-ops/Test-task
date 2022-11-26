
const form = document.querySelector('#registration'),
    statusMessage = document.createElement('div');

const message = {
    loading: 'Загрузка...',
    success: 'Пользователь успешно зарегистрирован',
    error: 'Возникла ошибка...'
};

statusMessage.classList.add('status');

form.addEventListener('submit', (e) => {
    e.preventDefault();
    form.appendChild(statusMessage);
    const formData = new FormData(form),
        json = JSON.stringify(Object.fromEntries(formData.entries()));

    postData('../app/registration.php', json)
        .then((response) => {
            if (response.status == 200) {
                statusMessage.style.color = 'green';
                statusMessage.textContent = message.success;
            } else if (validateJson(response)) {
                throw new Error(message.errorJson)
            } else if (response.type == 'login') {
                statusMessage.textContent = response.error;
            } else if (response.type == 'email') {
                statusMessage.textContent = response.error;
            } else if (response.type == 'password') {
                statusMessage.textContent = response.error;
            } else {
                throw new Error('status network not 200')
            }
        })
        .finally(() => {
            // form.reset();
            setTimeout(() => {
                window.location.replace("../reg.php")
                statusMessage.remove();
            }, 2000);
        });
});
