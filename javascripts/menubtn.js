const mnueBtn = document.getElementById('user-menu') ?? null;
const sidNav = document.getElementById('sidnav') ?? null;
const logInContainer = document.getElementById('login')??null;
const closeLogInContainer = document.getElementById('close-login-popup')??null;
const closeSignUpContainer = document.getElementById('close-signup-popup')??null;
const loginForm = document.getElementById('login-btn')??null;
const signUpContainer = document.getElementById('signup')??null;
const signupForm = document.getElementById('signup-btn')??null;
const tableContainer = document.getElementById('table-container')??null;
//=========================================================================//

if(tableContainer != null){tableContainer.style.marginLeft = '100px'};
if(mnueBtn != null && sidNav !=null){
    mnueBtn.addEventListener('click',()=>{
        sidNav.classList.toggle('nav-none');
    })
    
}

if(closeLogInContainer != null){
 closeLogInContainer.addEventListener('click',()=>{
    if(logInContainer != null){logInContainer.classList.add("login-none");}
 })
}
if(loginForm != null){
loginForm.addEventListener('click',()=>{
    logInContainer.classList.remove('login-none');
})
}
if(closeSignUpContainer != null){
closeSignUpContainer.addEventListener('click',()=>{
    signUpContainer.classList.add("login-none");
})
}
if(signupForm != null){
signupForm.addEventListener('click',()=>{
    signUpContainer.classList.remove('login-none');
})
}


