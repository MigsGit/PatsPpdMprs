function resetFormValues() {
    // Reset values
    $("#formAddUser")[0].reset();

    // Reset hidden input fields
    // $("select[name='user_level']", $('#formAddUser')).val(0).trigger('change');

    // Remove invalid & title validation
    $('div').find('input').removeClass('is-invalid');
    $("div").find('input').attr('title', '');
    $('div').find('select').removeClass('is-invalid');
    $("div").find('select').attr('title', '');
}

// $("#modalAddUser").on('hidden.bs.modal', function () {
//     console.log('hidden.bs.modal');
//     resetFormValues();
// });