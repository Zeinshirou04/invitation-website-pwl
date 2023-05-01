var userinformationForm = document.userInformationForm;
var userInformationFormLabel = document.forms["userInformationForm"].getElementsByTagName("label");
var userInformationFormInput = document.forms["userInformationForm"].getElementsByTagName("input");
console.log(userInformationFormInput);

userinformationForm.edit_profile.addEventListener('click', function (event) {
    event.preventDefault();
    // Turn all input form disable into false
    for (let i = 0; i < 0 + 10; i++) {
        if(userInformationFormInput[i].name == 'edit_profile') {
            continue;
        } else if(userInformationFormInput[i].name == 'changePass') {
            continue;
        } else if(userInformationFormInput[i].name == 'submitChangePass') {
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditProfile') {
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditProfile') {
            continue;
        }
        userInformationFormInput[i].disabled = false;
    }

    // Adding and removing class
    for (let i = 0; i < 0 + 10; i++) {
        if(userInformationFormInput[i].name == 'edit_profile') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'changePass') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'submitChangePass') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditProfile') {
            userInformationFormInput[i].classList.remove("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditProfile') {
            userInformationFormInput[i].classList.remove("hidden");
            continue;
        }
        userInformationFormInput[i].classList.remove("bg-transparent");
        userInformationFormInput[i].classList.remove("border-black/10");
        userInformationFormInput[i].classList.add("border-black");
        userInformationFormInput[i].classList.add("bg-black/10");
    }
});

userinformationForm.changePass.addEventListener('click', function (event) {
    event.preventDefault();
    // Turn all input form disable into false
    for (let i = 0; i < 0 + 10; i++) {
        if(userInformationFormInput[i].name == 'edit_profile') {
            continue;
        } else if(userInformationFormInput[i].name == 'changePass') {
            continue;
        } else if(userInformationFormInput[i].name == 'submitChangePass') {
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditProfile') {
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditProfile') {
            continue;
        }
        userInformationFormInput[i].disabled = false;
    }

    // Adding and removing class
    for (let i = 0; i < 0 + 10; i++) {
        if(userInformationFormInput[i].name == 'edit_profile') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'changePass') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditProfile') {
            userInformationFormInput[i].classList.remove("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'submitChangePass') {
            userInformationFormInput[i].classList.remove("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditProfile') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name =='username'){
            userInformationFormLabel[i - 0].classList.add("hidden");
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name =='userEmail'){
            userInformationFormLabel[i - 0].classList.add("hidden");
            userInformationFormInput[i].classList.add("hidden");
            continue;
        }
        userInformationFormInput[i].classList.remove("hidden");
        userInformationFormLabel[i - 0].classList.remove("hidden");
        userInformationFormInput[i].classList.remove("bg-transparent");
        userInformationFormInput[i].classList.remove("border-black/10");
        userInformationFormInput[i].classList.add("border-black");
        userInformationFormInput[i].classList.add("bg-black/10");
    }
});

userinformationForm.cancelEditProfile.addEventListener('click', function (event) {
    event.preventDefault();
    // Turn all input form disable into false
    for (let i = 0; i < 0 + 10; i++) {
        if(userInformationFormInput[i].name == 'edit_profile') {
            continue;
        } else if(userInformationFormInput[i].name == 'changePass') {
            continue;
        } else if(userInformationFormInput[i].name == 'submitChangePass') {
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditProfile') {
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditProfile') {
            continue;
        }
        userInformationFormInput[i].disabled = true;
    }

    // Adding and removing class
    for (let i = 0; i < 0 + 10; i++) {
        if(userInformationFormInput[i].name == 'edit_profile') {
            userInformationFormInput[i].classList.remove("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'changePass') {
            userInformationFormInput[i].classList.remove("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'submitChangePass') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditProfile') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditProfile') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name =='username'){
            userInformationFormLabel[i - 0].classList.remove("hidden");
            userInformationFormInput[i].classList.remove("hidden");
            userInformationFormInput[i].classList.remove("border-black");
            userInformationFormInput[i].classList.remove("bg-black/10");
            continue;
        } else if(userInformationFormInput[i].name =='userEmail'){
            userInformationFormLabel[i - 0].classList.remove("hidden");
            userInformationFormInput[i].classList.remove("hidden");
            userInformationFormInput[i].classList.remove("border-black");
            userInformationFormInput[i].classList.remove("bg-black/10");
            continue;
        }
        userInformationFormInput[i].classList.remove("border-black");
        userInformationFormInput[i].classList.remove("bg-black/10");
        userInformationFormInput[i].classList.add("hidden");
        userInformationFormLabel[i - 0].classList.add("hidden");
        userInformationFormInput[i].classList.add("bg-transparent");
        userInformationFormInput[i].classList.add("border-black/10");
    }
});

userinformationForm.submitChangePass.addEventListener('click', () => setTimeout(function () {
    // Turn all input form disable into false
    for (let i = 0; i < 0 + 10; i++) {
        if(userInformationFormInput[i].name == 'edit_profile') {
            continue;
        } else if(userInformationFormInput[i].name == 'changePass') {
            continue;
        } else if(userInformationFormInput[i].name == 'submitChangePass') {
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditProfile') {
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditProfile') {
            continue;
        }
        userInformationFormInput[i].disabled = true;
    }

    // Adding and removing class
    for (let i = 0; i < 0 + 10; i++) {
        if(userInformationFormInput[i].name == 'edit_profile') {
            userInformationFormInput[i].classList.remove("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'changePass') {
            userInformationFormInput[i].classList.remove("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'submitChangePass') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditProfile') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditProfile') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name =='username'){
            userInformationFormLabel[i - 0].classList.remove("hidden");
            userInformationFormInput[i].classList.remove("hidden");
            userInformationFormInput[i].classList.remove("border-black");
            userInformationFormInput[i].classList.remove("bg-black/10");
            userInformationFormInput[i].classList.add("bg-transparent");
            userInformationFormInput[i].classList.add("border-black/10");
            continue;
        } else if(userInformationFormInput[i].name =='userEmail'){
            userInformationFormLabel[i - 0].classList.remove("hidden");
            userInformationFormInput[i].classList.remove("hidden");
            userInformationFormInput[i].classList.remove("border-black");
            userInformationFormInput[i].classList.remove("bg-black/10");
            userInformationFormInput[i].classList.add("bg-transparent");
            userInformationFormInput[i].classList.add("border-black/10");
            continue;
        }
        userInformationFormInput[i].classList.remove("border-black");
        userInformationFormInput[i].classList.remove("bg-black/10");
        userInformationFormInput[i].classList.add("hidden");
        userInformationFormLabel[i - 0].classList.add("hidden");
        userInformationFormInput[i].classList.add("bg-transparent");
        userInformationFormInput[i].classList.add("border-black/10");
    }
}, 5000));

userinformationForm.submitEditProfile.addEventListener('click', () => setTimeout(function () {
    // Turn all input form disable into false
    for (let i = 0; i < 0 + 10; i++) {
        if(userInformationFormInput[i].name == 'edit_profile') {
            continue;
        } else if(userInformationFormInput[i].name == 'changePass') {
            continue;
        } else if(userInformationFormInput[i].name == 'submitChangePass') {
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditProfile') {
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditProfile') {
            continue;
        }
        userInformationFormInput[i].disabled = true;
    }

    // Adding and removing class
    for (let i = 0; i < 0 + 10; i++) {
        if(userInformationFormInput[i].name == 'edit_profile') {
            userInformationFormInput[i].classList.remove("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'changePass') {
            userInformationFormInput[i].classList.remove("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'submitChangePass') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditProfile') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditProfile') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name =='username'){
            userInformationFormLabel[i - 0].classList.remove("hidden");
            userInformationFormInput[i].classList.remove("hidden");
            userInformationFormInput[i].classList.remove("border-black");
            userInformationFormInput[i].classList.remove("bg-black/10");
            userInformationFormInput[i].classList.add("bg-transparent");
            userInformationFormInput[i].classList.add("border-black/10");
            continue;
        } else if(userInformationFormInput[i].name =='userEmail'){
            userInformationFormLabel[i - 0].classList.remove("hidden");
            userInformationFormInput[i].classList.remove("hidden");
            userInformationFormInput[i].classList.remove("border-black");
            userInformationFormInput[i].classList.remove("bg-black/10");
            userInformationFormInput[i].classList.add("bg-transparent");
            userInformationFormInput[i].classList.add("border-black/10");
            continue;
        }
        userInformationFormInput[i].classList.remove("border-black");
        userInformationFormInput[i].classList.remove("bg-black/10");
        userInformationFormInput[i].classList.add("hidden");
        userInformationFormLabel[i - 0].classList.add("hidden");
        userInformationFormInput[i].classList.add("bg-transparent");
        userInformationFormInput[i].classList.add("border-black/10");
    }
}, 5000));

userinformationForm.editInformation.addEventListener('click', function (event) {
    event.preventDefault();
    // Turn all input form disable into false
    for (let i = 10; i < 10 + 11; i++) {
        if(userInformationFormInput[i].name == 'editInformation') {
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditInformation') {
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditInformation') {
            continue;
        }
        userInformationFormInput[i].disabled = false;
    }

    // Adding and removing class
    for (let i = 10; i < 10 + 11; i++) {
        if(userInformationFormInput[i].name == 'editInformation') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditInformation') {
            userInformationFormInput[i].classList.remove("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditInformation') {
            userInformationFormInput[i].classList.remove("hidden");
            continue;
        }
        userInformationFormInput[i].classList.remove("hidden");
        userInformationFormInput[i].classList.remove("bg-transparent");
        userInformationFormInput[i].classList.remove("border-black/10");
        userInformationFormInput[i].classList.add("border-black");
        userInformationFormInput[i].classList.add("bg-black/10");
    }
});

userinformationForm.cancelEditInformation.addEventListener('click', function (event) {
    event.preventDefault();
    // Turn all input form disable into false
    for (let i = 10; i < 10 + 11; i++) {
        if(userInformationFormInput[i].name == 'editInformation') {
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditInformation') {
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditInformation') {
            continue;
        }
        userInformationFormInput[i].disabled = true;
    }

    // Adding and removing class
    for (let i = 10; i < 10 + 11; i++) {
        if(userInformationFormInput[i].name == 'editInformation') {
            userInformationFormInput[i].classList.remove("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditInformation') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditInformation') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        }
        userInformationFormInput[i].classList.remove("border-black");
        userInformationFormInput[i].classList.remove("bg-black/10");
        userInformationFormInput[i].classList.add("bg-transparent");
        userInformationFormInput[i].classList.add("border-black/10");
    }
});

userinformationForm.submitEditInformation.addEventListener('click', () => setTimeout(function () {
    // Turn all input form disable into false
    for (let i = 10; i < 10 + 11; i++) {
        if(userInformationFormInput[i].name == 'editInformation') {
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditInformation') {
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditInformation') {
            continue;
        }
        userInformationFormInput[i].disabled = true;
    }

    // Adding and removing class
    for (let i = 10; i < 10 + 11; i++) {
        if(userInformationFormInput[i].name == 'editInformation') {
            userInformationFormInput[i].classList.remove("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'cancelEditInformation') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        } else if(userInformationFormInput[i].name == 'submitEditInformation') {
            userInformationFormInput[i].classList.add("hidden");
            continue;
        }
        userInformationFormInput[i].classList.remove("border-black");
        userInformationFormInput[i].classList.remove("bg-black/10");
        userInformationFormInput[i].classList.add("bg-transparent");
        userInformationFormInput[i].classList.add("border-black/10");
    }
}, 5000));