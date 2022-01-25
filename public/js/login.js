/* Show / Hide Password */

let showPasswordIcon = document.querySelector(".password-container .fa-eye-slash"); 
    hidePasswordIcon = document.querySelector(".password-container .fa-eye");

//show password
showPasswordIcon.onclick = () => {
    hidePasswordIcon.classList.remove("d-none");
    showPasswordIcon.classList.add("d-none");

    showPasswordIcon.parentElement.querySelector("input").setAttribute("type", "text");
}

//hide password
hidePasswordIcon.onclick = () => {
    showPasswordIcon.classList.remove("d-none");
    hidePasswordIcon.classList.add("d-none");

    hidePasswordIcon.parentElement.querySelector("input").setAttribute("type", "password");
}

/******************************************************************/

/* Validate login form */

let loginForm      = document.querySelector(".login form"),
    formInputArray = loginForm.querySelectorAll("input:not([type='submit'])");

loginForm.addEventListener("submit", (e) => { //when submiting the form
    e.preventDefault(); //don't submit

    /*if(checkLogin()) { //if the form is vaild
        window.location = "../html/index.html" //redirect to home page
    }*/
    
});
console.log(document.myloginform.email);
//check the form
let checkLogin = () => { 
    let vaild = true; //valid form or not
    const emailValidation = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const email = document.myloginform.email;
    const password = document.myloginform.password;

    //email validation
    if(email.value.trim() == "" || !email.value.match(emailValidation)) { //if empty
        email.classList.add("input-invalid");
        vaild = false;
    } else {
        email.classList.remove("input-invalid");
    }

    //password validation
    if(password.value.length < 7) { //if empty
        password.classList.add("input-invalid");
        vaild = false;
    } else {
        password.classList.remove("input-invalid");
    }
    

    return vaild; //return valiation condition

}

/*****************************************************************/