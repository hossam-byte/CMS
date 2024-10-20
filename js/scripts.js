const switchToRegister = document.getElementById('switch-to-register');
const switchToLogin = document.getElementById('switch-to-login');
const loginForm = document.getElementById('login-form');
const registerForm = document.getElementById('register-form');
const loginImage = document.getElementById('loginImage');

function updateFormDisplay(isLogin) {
    if (isLogin) {
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
        loginImage.src = 'img/login.png';
        if (window.innerWidth > 768) {
            loginImage.style.transform = "translateX(0)";
            document.getElementById('form-section').style.transform = "translateX(0)";
        }
    } else {
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
        loginImage.src = 'img/register.png';
        if (window.innerWidth > 768) {
            loginImage.style.transform = "translateX(100%)";
            document.getElementById('form-section').style.transform = "translateX(-100%)";
        }
    }
}

switchToRegister.addEventListener('click', () => {
    updateFormDisplay(false);
});

switchToLogin.addEventListener('click', () => {
    updateFormDisplay(true);
});

updateFormDisplay(true);

// Validate Register Form
const registerFormElement = document.getElementById('register-form');
if (registerFormElement) {
    registerFormElement.addEventListener('submit', function (e) {
        e.preventDefault();

        const email = document.getElementById('new-email').value;
        const username = document.getElementById('new-username').value;
        const password = document.getElementById('new-password').value;
        const confirmPassword = document.getElementById('confirm-password').value;

        if (!email || !username || !password || !confirmPassword) {
            alert('Please fill in all fields.');
            return;
        }

        if (password !== confirmPassword) {
            alert('Passwords do not match.');
            document.getElementById('new-password').value = '';
            document.getElementById('confirm-password').value = '';
            return;
        }

        alert('Registration successful!');
        window.location.href = "profile.html";
    });
}

// Validate Login Form
const loginFormElement = document.getElementById('login-form');
if (loginFormElement) {
    loginFormElement.addEventListener('submit', function (e) {
        e.preventDefault();

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        if (!email || !password) {
            alert('Please fill in all fields.');
            return;
        }

        alert('Login successful!');
        window.location.href = "profile.html";
    });
}

function logout() {
    alert("You have logged out.");
    window.location.href = "index.html";
}
