const tbl = {
    tableMachineParameter_form1 : "#tableMachineParameter_form1",
}
const form = {
    formAddMachine1 : $('#formAddMachine1'),
}

function getMachine1(cboElement){
	let result = '<option value="0" disabled selected>Select One</option>';
	$.ajax({
		url: 'get_machine_name_form1',
		method: 'get',
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>Loading</option>';
			cboElement.html(result);
		},
		success: function(response){
			let disabled = '';
			if(response['machine_details_1'].length > 0){
				result = '<option value="0" disabled selected>Select One</option>';
				for(let index = 0; index < response['machine_details_1'].length; index++){
                    result += '<option value="' + response['machine_details_1'][index].id + '">' + response['machine_details_1'][index].machine_name + '</option>';
				}
			}
			else{
				result = '<option value="0" disabled>No User Role found</option>';
			}
			cboElement.html(result);
		},
		error: function(data, xhr, status){
			result = '<option value="0" disabled>Reload Again</option>';
			cboElement.html(result);
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}

function getMachine2(cboElement){
	let result = '<option value="0" disabled selected>Select One</option>';
	$.ajax({
		url: 'get_machine_name_form2',
		method: 'get',
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>Loading</option>';
			cboElement.html(result);
		},
		success: function(response){
			let disabled = '';
			if(response['machine_details_2'].length > 0){
				result = '<option value="0" disabled selected>Select One</option>';
				for(let index = 0; index < response['machine_details_2'].length; index++){
                    result += '<option value="' + response['machine_details_2'][index].id + '">' + response['machine_details_2'][index].machine_name + '</option>';
				}
			}
			else{
				result = '<option value="0" disabled>No User Role found</option>';
			}
			cboElement.html(result);
		},
		error: function(data, xhr, status){
			result = '<option value="0" disabled>Reload Again</option>';
			cboElement.html(result);
            console.log('Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
        }
	});
}
