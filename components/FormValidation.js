function validateFormRegister() {
    // Get form elements
    var name = document.forms["registerForm"]["name"].value;
    var contact = document.forms["registerForm"]["contact"].value;
    var email = document.forms["registerForm"]["email"].value;
    var pass = document.forms["registerForm"]["pass"].value;
    var pass_conf = document.forms["registerForm"]["pass_conf"].value;
    var gender = document.forms["registerForm"]["gender"].value;
    var birthday = document.forms["registerForm"]["birthday"].value;

    // All fields must be filled in
    if (name === "" || contact === "" || email === "" || pass === "" || pass_conf === "" || gender === "" || birthday === "") {
        alert("All fields must be filled out");
        return false; 
    }

    // Passwords match
    if (pass !== pass_conf) {
        alert("Passwords do not match!");
        return false;
    }

    // Check Contact Number
    var contactPattern = /^\d{10}$/; 
    if (!contactPattern.test(contact)) {
        alert("Contact number must be 10 digits.");
        return false; 
    }

    return true; 
}

