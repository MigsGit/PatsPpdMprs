function getMachineDetailsForEdit(machineId){
    $.ajax({
        type: "get",
        url: "get_machine_details",
        data: {
            "machine_id" : machineId,
        },
        dataType: "json",
        success: function (response) {

			if(response['machineDetails'].length > 0){
				$('#textMachineName').val(response['machineDetails'][0]['machine_name'])
				$('#textMachineCategory').val(response['machineDetails'][0]['machine_category']).trigger('change');
			}
			
        }
    });
}