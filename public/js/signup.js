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

let signupForm     = document.querySelector(".signup form"),
    checkBoxSubmit = document.getElementById("checkbox-submit");

signupForm.addEventListener("submit", (e) => { //when submiting the form
    //if false then the form is invalid
    if(!checkForm(signupForm)) { 
        e.preventDefault(); //don't submit
    }

});

//check if the user has accepted the terms
checkBoxSubmit.addEventListener("click", (e) => { 
    if(checkBoxSubmit.checked){
        //enable the button.
        document.getElementById("submit-btn").disabled = false;
    } else{
        //disable the submit button.
        document.getElementById("submit-btn").disabled = true;
    }
});

//check the form
let checkForm = (elementForm) => { 

    //valid form or not
    let vaild = true; 
    
    //all input except submit types
    let formInputArray = elementForm.querySelectorAll('input:not([type="submit"])'); 

    formInputArray.forEach(element => {
        if(element.value.trim() == "") {
            element.classList.remove("input-valid");
            element.classList.add("input-invalid");
            vaild = false;
        } else {
            element.classList.remove("input-invalid");
            element.classList.add("input-valid");
        }
    });

    return vaild; //return valiation condition

}

/*****************************************************************/