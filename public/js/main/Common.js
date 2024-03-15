function resetFormValues(elementForm) {
    // Reset values
    elementForm[0].reset();

    // Reset hidden input fields
    elementForm.find("select").val(0).trigger('change');

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
}

const errorHandler = function (errors,elementFormInput){
    if(errors === undefined){
        elementFormInput.removeClass('is-invalid')
        elementFormInput.addClass('is-valid')
        elementFormInput.attr('title', '')
    }else {
        elementFormInput.removeClass('is-valid')
        elementFormInput.addClass('is-invalid');
        elementFormInput.attr('title', errors[0])
    }
}

// $("#modalAddUser").on('hidden.bs.modal', function () {
//     console.log('hidden.bs.modal');
//     resetFormValues();
// });
