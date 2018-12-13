function validate(form) {
    fail = validateDoubleNumber(form.price);
    fail += validateDoubleNumber(form.discount_percent);
    fail += validateRequired(form.code);
    fail += validateRequired(form.name);
    fail += validateRequired(form.description);

    if (fail === "") {
        return true;
    } else {
        alert(fail);
        return false;
    }
}

function validateDoubleNumber(field)
{
    if (/[0-9]*\.[0-9]{2}/.test(field.value) === false) {
        return field.name.toUpperCase() + ": Must specify the number of dollars and cents. Exp: 3 or 3.00. \n";
    }
    
    return "";
}

function validateRequired(field)
{
    if (field.value === "") {
        return field.name.toUpperCase() + ": Required field. \n";
    }
    
    return "";
}