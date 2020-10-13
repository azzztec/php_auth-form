import Validator from './Validator.js';

const form = document.querySelector('form');

const errorTexts = document.querySelectorAll('.error_msg');

let validator = new Validator();

function showErrorMessages(errorsLog) {
    console.log('errorsLog:  ', errorsLog)
    errorTexts.forEach(message => {
        if(errorsLog[message.dataset.errorName]) {
            message.innerText = errorsLog[message.dataset.errorName];
            message.classList.remove('hidden');
        }
    })
}

function hideErrorMessages() {
    errorTexts.forEach(message => {
        message.innerText = '';
        message.classList.add('hidden');
    })
}

form.addEventListener('change', (event) => {
    let target = event.target;
    target.classList.remove('correct');

    if(target.tagName === 'INPUT') {
        let inputValue = target.value;
        let targetInputId = target.getAttribute('id');

        validator[`validate${targetInputId}`](inputValue) ?
            target.classList.add('correct') : target.classList.add('wrong');
    }
})

form.addEventListener('submit', (event) => {
    event.preventDefault();
    hideErrorMessages();
    
    let formData = new FormData(event.target);
    formData = Object.fromEntries(formData);

    let searchParams = new URLSearchParams();
    for(let key of Object.keys(formData)) {
        searchParams.append(key, formData[key])
    }

    if(event.target.id === 'registration') {
        fetch('../server/register.php', {
            method: 'POST',
            contentType: 'text/html; charset=UTF-8',
            accept: 'application/json',
            processData: false,
            body: searchParams
        })
        .then(response => response.json())
        .then(errorsLog => showErrorMessages(errorsLog))
        .catch(() => window.location = '../../login.php')
    }

    if(event.target.id === 'login') {
        fetch('../server/login.php', {
            method: 'POST',
            contentType: 'text/html; charset=UTF-8',
            accept: 'application/json',
            processData: false,
            body: searchParams
        })
        .then(response => response.json())
        .then(errorsLog => showErrorMessages(errorsLog))
        .catch(() => window.location = '../../index.php')
    }

    if(event.target.id === 'logout') {
        console.log('here');
        fetch('../server/logout.php', {
            method: 'POST',
            contentType: 'text/html; charset=UTF-8',
            accept: 'application/json',
            processData: false,
            body: searchParams
        })
        .then(response => response.json())
        .then(() => window.location = '../../index.php')
        .catch(() => window.location = '../../index.php')
    }
    
})
// 1234sadfF%