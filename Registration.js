const user_con = document.querySelector('.user-container');
const reg_btn = document.querySelector('.reg-btn');
const login_btn = document.querySelector('.login-btn');

reg_btn.addEventListener('click', () => {
    user_con.classList.add('login-section--display')
})

login_btn.addEventListener('click', () => {
    user_con.classList.remove('login-section--display')
})