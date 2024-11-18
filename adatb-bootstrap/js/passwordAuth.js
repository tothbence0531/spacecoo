function passwordAuth() {

    const length = document.getElementById('passwordLength')
    const number = document.getElementById('containsNumber')
    const uppercase = document.getElementById('containsUppercase')
    const special = document.getElementById('containsSpecialChar')
    const match = document.getElementById('passwordsMatch')

    const passwordInput = document.getElementById('password')
    const rePasswordInput = document.getElementById('repassword')
    const submitButton = document.getElementById('signupSubmit')
    const authContainer = document.querySelector('.password-auth-container')
    const matchAuthContainer = document.querySelector('.password-match-auth-container')
    const password = passwordInput.value
    const repassword = rePasswordInput.value

    numberRegex = /[0-9]/
    uppercaseRegex = /[A-Z]/
    specialRegex = /["@", "$", ".", "#", "!", "%", "*", "?", "&", "^"]/

    lengthCorrect = false
    numberCorrect = false
    uppercaseCorrect = false
    specialCorrect = false
    matchingPasswords = false

    if(password.length <= 0) {
        authContainer.style.display = "none";
    } else {
        authContainer.style.display = "block";
    }

    if(password.length <= 0) {
        matchAuthContainer.style.display = "none";
    } else {
        matchAuthContainer.style.display = "block";
    }

    if(password.length < 8) {
        length.classList.add('password-auth-inactive')
        length.classList.remove('password-auth-active')
        lengthCorrect = false
    } else {
        length.classList.remove('password-auth-inactive')
        length.classList.add('password-auth-active')
        lengthCorrect = true
    }

    if(!numberRegex.test(password)) {
        number.classList.add('password-auth-inactive')
        number.classList.remove('password-auth-active')
        numberCorrect = false
    } else {
        number.classList.remove('password-auth-inactive')
        number.classList.add('password-auth-active')
        numberCorrect = true
    }

    if(!uppercaseRegex.test(password)) {
        uppercase.classList.add('password-auth-inactive')
        uppercase.classList.remove('password-auth-active')
        uppercaseCorrect = false
    } else {
        uppercase.classList.remove('password-auth-inactive')
        uppercase.classList.add('password-auth-active')
        uppercaseCorrect = true
    }

    if(!specialRegex.test(password)) {
        special.classList.add('password-auth-inactive')
        special.classList.remove('password-auth-active')
        specialCorrect = false
    } else {
        special.classList.remove('password-auth-inactive')
        special.classList.add('password-auth-active')
        specialCorrect = true
    }

    if(password != repassword) {
        match.classList.add('password-auth-inactive')
        match.classList.remove('password-auth-active')
        matchingPasswords = false
    } else {
        match.classList.remove('password-auth-inactive')
        match.classList.add('password-auth-active')
        matchingPasswords = true
    }

    if(lengthCorrect && numberCorrect && uppercaseCorrect && specialCorrect && matchingPasswords) {
        submitButton.removeAttribute('disabled')
        authContainer.style.display = "none";
        matchAuthContainer.style.display = "none";
    } else {
        submitButton.setAttribute('disabled', "disabled")
    }
}