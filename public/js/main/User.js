function getRapidxUsers(cboElement){
	let result = '<option value="0" disabled selected>Select One</option>';
	$.ajax({
		url: 'get_rapidx_users',
		method: 'get',
		dataType: 'json',
		beforeSend: function(){
			result = '<option value="0" disabled>Loading</option>';
			cboElement.html(result);
		},
		success: function(response){
			let disabled = '';
			if(response['rapidxUsers'].length > 0){
				result = '<option value="0" disabled selected>Select One</option>';
				for(let index = 0; index < response['rapidxUsers'].length; index++){
                    result += `<option name="${response['rapidxUsers'][index].name}" username="${response['rapidxUsers'][index].username}" email="${response['rapidxUsers'][index].email}" department="${response['rapidxUsers'][index]['department'].department_name}" department-group="${response['rapidxUsers'][index]['department'].department_group}" value="${response['rapidxUsers'][index].id}">${response['rapidxUsers'][index].name}</option>`;
				}
			}
			else{
				result = '<option value="0" disabled>No record found</option>';
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

function getUserDetailsForEdit(userId){
    $.ajax({
        type: "get",
        url: "get_user_details",
        data: {
            "user_id" : userId,
        },
        dataType: "json",
        success: function (response) {

			if(response['userDetails'].length > 0){
				// console.log(response['userDetails']);
				$('select[name="rapidx_user"]').val(response['userDetails'][0]['rapidx_id']).trigger('change');
				$('#rapidxUserId').val(response['userDetails'][0]['rapidx_id'])
				$('#textEmail').val(response['userDetails'][0]['email'])
				$('#textDepartment').val(response['userDetails'][0]['department'])
				$('#textUsername').val(response['userDetails'][0]['username'])
				$('#textUserLevel').val(response['userDetails'][0]['user_level']).trigger('change');
			}
			
        }
    });
}
