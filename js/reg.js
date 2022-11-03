
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
            if (response.status !== 200) {
                throw new Error('status network not 200')
            }
            console.log(json);
            statusMessage.textContent = message.success;
        })
        .catch((error) => {
            // statusMessage.textContent = message.error;
            // console.error(error);
        })
        .finally(() => {
            form.reset();
            window.location.replace("/")
            setTimeout(() => {
                statusMessage.remove();
            }, 6000);
        });
});
