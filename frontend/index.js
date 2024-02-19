document.getElementById("studentForm").addEventListener("submit", function(event) {
    var isValid = true;
    var errorMessages = [];

   
    var requiredFields = document.querySelectorAll('input[required]');
    requiredFields.forEach(function(field) {
        if (!field.value.trim()) {
            isValid = false;
            errorMessages.push(field.name + " is required");
        }
    });

 
    var marksFields = document.querySelectorAll('input[type="number"]');
    marksFields.forEach(function(field) {
        if (field.value.trim() === '' || isNaN(field.value.trim()) || parseFloat(field.value.trim()) < 0 || parseFloat(field.value.trim()) > 100) {
            isValid = false;
            errorMessages.push(field.name + " should be a number between 0 and 100");
        }
    });

    if (!isValid) {
        event.preventDefault();
        alert(errorMessages.join("\n"));
    }
});