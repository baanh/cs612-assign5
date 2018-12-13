function validate(form) {
    fail = validatePrice(form.price.value);
    fail += validateDescription(form.description.value);

    if (fail === "") {
        return true;
    } else {
        alert(fail);
        return false;
    }
}

function validatePrice(field)
{
    if (/[0-9]*\.[0-9]{2}/.test(field) === false) {
        return "Must specify the number of dollars and cents for the price. Exp: 3 or 3.00";
    }
    
    return "";
}

function validateDescription(field)
{
    if (field === "") {
        return "Please add the description for the product";
    }
    
    return "";
}