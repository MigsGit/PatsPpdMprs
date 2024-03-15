// $(document).ready(function () { //docReadyEnd
    const tbl = {
        tableMachineParameter_form1 : "#tableMachineParameter_form1",
        tableMachineParameter_form2 : "#tableMachineParameter_form2",
        tableInjectionTabList : "#tableInjectionTabList",
    }
    const form = {
        formAddMachine1 : $('#formAddMachine1'),
        formAddMachine2 : $('#formAddMachine2'),
        formInjectionTabList : $('#formInjectionTabList'),
    }

    const dt = {
        MachineParameter : '',
        MachineParameter2 : '',
        InjectionTabListOne : '',
        InjectionTabListTwo : '',
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
    const saveMachineOne = () => {
        $.ajax({
            type: 'POST',
            url: 'save_machine_one',
            data: $('#formAddMachine1').serialize(),
            dataType: 'json',
            beforeSend: function() {
                $('#modal-loading').modal('show');
            },
            success: function (response) {
                if(response['is_success'] == 'true'){
                    $('#modal-loading').modal('hide');
                    $('#modalAddMachine1').modal('hide');
                    $('#formAddMachine1')[0].reset();
                    toastr.success('Save Sucessfully');
                    dt.MachineParameter.draw();
                }else{
                    toastr.error('Saving Failed');
                }
            },error: function (data, xhr, status){
                $('#modal-loading').modal('hide');
                if(data.status === 422){
                    let errors = data.responseJSON.errors ;
                    toastr.error(`Saving Failed, Please fill up all required fields`);
                    //Machine Parameter
                    errorHandler( errors.machine_id,form.formAddMachine1.find('[name="machine_id"]') );
                    errorHandler( errors.device_name,form.formAddMachine1.find('[name="device_name"]') );
                    errorHandler( errors.no_of_cavity,form.formAddMachine1.find('[name="no_of_cavity"]') );
                    errorHandler( errors.material_mixing_ratio_v,form.formAddMachine1.find('[name="material_mixing_ratio_v"]') );
                    errorHandler( errors.material_mixing_ratio_r,form.formAddMachine1.find('[name="material_mixing_ratio_r"]') );
                    errorHandler( errors.material_name,form.formAddMachine1.find('[name="material_name"]') );
                    errorHandler( errors.color,form.formAddMachine1.find('[name="color"]') );
                    errorHandler( errors.machine_no,form.formAddMachine1.find('[name="machine_no"]') );
                    errorHandler( errors.shot_weight,form.formAddMachine1.find('[name="shot_weight"]') );
                    errorHandler( errors.unit_weight,form.formAddMachine1.find('[name="unit_weight"]') );
                    //Mold Close
                    errorHandler( errors.hi_v,form.formAddMachine1.find('[name="hi_v"]') );
                    errorHandler( errors.mid_slow,form.formAddMachine1.find('[name="mid_slow"]') );
                    errorHandler( errors.low_l,form.formAddMachine1.find('[name="low_l"]') );
                    errorHandler( errors.obstacle_check_tm,form.formAddMachine1.find('[name="obstacle_check_tm"]') );
                    errorHandler( errors.slow_start,form.formAddMachine1.find('[name="slow_start"]') );
                    errorHandler( errors.slow_end,form.formAddMachine1.find('[name="slow_end"]') );
                    errorHandler( errors.lvlp,form.formAddMachine1.find('[name="lvlp"]') );
                    errorHandler( errors.hpcl,form.formAddMachine1.find('[name="hpcl"]') );
                    errorHandler( errors.mid_sl_p,form.formAddMachine1.find('[name="mid_sl_p"]') );
                    errorHandler( errors.low_p,form.formAddMachine1.find('[name="low_p"]') );
                    errorHandler( errors.hi_p,form.formAddMachine1.find('[name="hi_p"]') );
                    //Ejector
                    errorHandler( errors.ej_pres,form.formAddMachine1.find('[name="ej_pres"]') );
                    errorHandler( errors.fwd_ev1,form.formAddMachine1.find('[name="fwd_ev1"]') );
                    errorHandler( errors.fwd_ev2,form.formAddMachine1.find('[name="fwd_ev2"]') );
                    errorHandler( errors.fwd_stop,form.formAddMachine1.find('[name="fwd_stop"]') );
                    errorHandler( errors.bwd_stop,form.formAddMachine1.find('[name="bwd_stop"]') );
                    errorHandler( errors.count,form.formAddMachine1.find('[name="count"]') );
                    errorHandler( errors.pattern,form.formAddMachine1.find('[name="pattern"]') );
                    //Mold Open
                    errorHandler( errors.open_end_v,form.formAddMachine1.find('[name="open_end_v"]') );
                    errorHandler( errors.hi_velocity_2,form.formAddMachine1.find('[name="hi_velocity_2"]') );
                    errorHandler( errors.hi_velocity_1_percent,form.formAddMachine1.find('[name="hi_velocity_1_percent"]') );
                    errorHandler( errors.open_v,form.formAddMachine1.find('[name="open_v"]') );
                    errorHandler( errors.tmp_stop_time,form.formAddMachine1.find('[name="tmp_stop_time"]') );
                    errorHandler( errors.open_stop,form.formAddMachine1.find('[name="open_stop"]') );
                    errorHandler( errors.low_distance,form.formAddMachine1.find('[name="low_distance"]') );
                    errorHandler( errors.hi_velocity_1mm,form.formAddMachine1.find('[name="hi_velocity_1mm"]') );
                    errorHandler( errors.tmp_stop_pos,form.formAddMachine1.find('[name="tmp_stop_pos"]') );
                    //Heater
                    errorHandler( errors.hot_sprue_set,form.formAddMachine1.find('[name="hot_sprue_set"]') );
                    errorHandler( errors.nozzle_set,form.formAddMachine1.find('[name="nozzle_set"]') );
                    errorHandler( errors.front_set,form.formAddMachine1.find('[name="front_set"]') );
                    errorHandler( errors.mid_set,form.formAddMachine1.find('[name="mid_set"]') );
                    errorHandler( errors.rear_set,form.formAddMachine1.find('[name="rear_set"]') );
                    errorHandler( errors.mold_set,form.formAddMachine1.find('[name="mold_set"]') );
                    errorHandler( errors.hot_sprue_actual,form.formAddMachine1.find('[name="hot_sprue_actual"]') );
                    errorHandler( errors.front_actual,form.formAddMachine1.find('[name="front_actual"]') );
                    errorHandler( errors.nozzle_actual,form.formAddMachine1.find('[name="nozzle_actual"]') );
                    errorHandler( errors.mid_actual,form.formAddMachine1.find('[name="mid_actual"]') );
                    errorHandler( errors.rear_actual,form.formAddMachine1.find('[name="rear_actual"]') );
                    errorHandler( errors.mold_one_set,form.formAddMachine1.find('[name="mold_one_set"]') );
                    errorHandler( errors.mold_two_set,form.formAddMachine1.find('[name="mold_two_set"]') );
                    errorHandler( errors.mold_one_actual,form.formAddMachine1.find('[name="mold_one_actual"]') );
                    errorHandler( errors.mold_two_actual,form.formAddMachine1.find('[name="mold_two_actual"]') );
                    //Injection Velocity
                    errorHandler( errors.cooling_time,form.formAddMachine1.find('[name="cooling_time"]') );
                    errorHandler( errors.cycle_start,form.formAddMachine1.find('[name="cycle_start"]') );
                    errorHandler( errors.inj_pp2,form.formAddMachine1.find('[name="inj_pp2"]') );
                    errorHandler( errors.inj_pp3,form.formAddMachine1.find('[name="inj_pp3"]') );
                    errorHandler( errors.inj_pp1,form.formAddMachine1.find('[name="inj_pp1"]') );
                    errorHandler( errors.inj_v1,form.formAddMachine1.find('[name="inj_v1"]') );
                    errorHandler( errors.inj_v2,form.formAddMachine1.find('[name="inj_v2"]') );
                    errorHandler( errors.inj_v3,form.formAddMachine1.find('[name="inj_v3"]') );
                    errorHandler( errors.inj_v4,form.formAddMachine1.find('[name="inj_v4"]') );
                    errorHandler( errors.inj_v6,form.formAddMachine1.find('[name="inj_v6"]') );
                    errorHandler( errors.inj_v5,form.formAddMachine1.find('[name="inj_v5"]') );
                    errorHandler( errors.inj_sv1,form.formAddMachine1.find('[name="inj_sv1"]') );
                    errorHandler( errors.inj_sv2,form.formAddMachine1.find('[name="inj_sv2"]') );
                    errorHandler( errors.inj_sv3,form.formAddMachine1.find('[name="inj_sv3"]') );
                    errorHandler( errors.inj_sv4,form.formAddMachine1.find('[name="inj_sv4"]') );
                    errorHandler( errors.inj_sv5,form.formAddMachine1.find('[name="inj_sv5"]') );
                    errorHandler( errors.inj_sm,form.formAddMachine1.find('[name="inj_sm"]') );
                    errorHandler( errors.inj_sd,form.formAddMachine1.find('[name="inj_sd"]') );
                    errorHandler( errors.inj_veloc_no,form.formAddMachine1.find('[name="inj_veloc_no"]') );
                    errorHandler( errors.inj_press_no,form.formAddMachine1.find('[name="inj_press_no"]') );
                    errorHandler( errors.inj_tp1,form.formAddMachine1.find('[name="inj_tp1"]') );
                    errorHandler( errors.inj_tp2,form.formAddMachine1.find('[name="inj_tp2"]') ); //NOTE: For Machine 1 only
                    errorHandler( errors.inj_pos_change_mode,form.formAddMachine1.find('[name="inj_pos_change_mode"]') );
                    errorHandler( errors.inj_pos_vs,form.formAddMachine1.find('[name="inj_pos_vs"]') );
                    errorHandler( errors.inj_pos_pb,form.formAddMachine1.find('[name="inj_pos_pb"]') );
                    errorHandler( errors.inj_pv1,form.formAddMachine1.find('[name="inj_pv1"]') );
                    errorHandler( errors.inj_pv2,form.formAddMachine1.find('[name="inj_pv2"]') );
                    errorHandler( errors.inj_pv3,form.formAddMachine1.find('[name="inj_pv3"]') );
                    errorHandler( errors.inj_sp1,form.formAddMachine1.find('[name="inj_sp1"]') );
                    errorHandler( errors.inj_sp2,form.formAddMachine1.find('[name="inj_sp2"]') );
                    //Injection Tab
                    errorHandler( errors.inj_tab_rv6,form.formAddMachine1.find('[name="inj_tab_rv6"') );
                    errorHandler( errors.inj_tab_rv5,form.formAddMachine1.find('[name="inj_tab_rv5"') );
                    errorHandler( errors.inj_tab_rv4,form.formAddMachine1.find('[name="inj_tab_rv4"') );
                    errorHandler( errors.inj_tab_rv3,form.formAddMachine1.find('[name="inj_tab_rv3"') );
                    errorHandler( errors.inj_tab_rv2,form.formAddMachine1.find('[name="inj_tab_rv2"') );
                    errorHandler( errors.inj_tab_rv1,form.formAddMachine1.find('[name="inj_tab_rv1"') );
                    errorHandler( errors.inj_tab_rp3,form.formAddMachine1.find('[name="inj_tab_rp3"') );
                    errorHandler( errors.inj_tab_rp2,form.formAddMachine1.find('[name="inj_tab_rp2"') );
                    errorHandler( errors.inj_tab_rp1,form.formAddMachine1.find('[name="inj_tab_rp1"') );
                    errorHandler( errors.inj_tab_fill_time,form.formAddMachine1.find('[name="inj_tab_fill_time"') );
                    errorHandler( errors.inj_tab_plastic_time,form.formAddMachine1.find('[name="inj_tab_plastic_time"') );
                    errorHandler( errors.inj_tab_cycle_time,form.formAddMachine1.find('[name="inj_tab_cycle_time"') );
                    errorHandler( errors.inj_tab_spray_tm,form.formAddMachine1.find('[name="inj_tab_spray_tm"') );
                    errorHandler( errors.inj_tab_screw_most_fwd,form.formAddMachine1.find('[name="inj_tab_screw_most_fwd"') );
                    errorHandler( errors.inj_tab_enj_end_pos,form.formAddMachine1.find('[name="inj_tab_enj_end_pos"') );
                    errorHandler( errors.inj_tab_airblow_start_time,form.formAddMachine1.find('[name="inj_tab_airblow_start_time"') );
                    errorHandler( errors.inj_tab_airblow_blow_time,form.formAddMachine1.find('[name="inj_tab_airblow_blow_time"') );
                    errorHandler( errors.inj_tab_md_temp_requirement,form.formAddMachine1.find('[name="inj_tab_md_temp_requirement"') );
                    errorHandler( errors.inj_tab_md_time_requirement,form.formAddMachine1.find('[name="inj_tab_md_time_requirement"') );
                    errorHandler( errors.inj_tab_md_temp_actual,form.formAddMachine1.find('[name="inj_tab_md_temp_actual"') );
                }else{
                    toastr.error(`Error: ${data.status}`);
                }
            }

        });
    }

    const saveMachineTwo = () => {
        $.ajax({
            type: 'POST',
            url: 'save_machine_two',
            data: $('#formAddMachine2').serialize(),
            dataType: 'json',
            beforeSend: function(){
                $('#modal-loading').modal('show');
            },
            success: function (response) {
                if(response['is_success'] === 'true'){
                    $('#modal-loading').modal('hide');
                    $('#modalAddMachine2').modal('hide');
                    $('#formAddMachine2')[0].reset();
                    dt.MachineParameter2.draw();
                    toastr.success('Save Sucessfully');
                }else{
                    toastr.error('Saving Failed');
                }
            },error: function (data, xhr, status){
                toastr.error(`Error: ${data.status}`);
                $('#modal-loading').modal('hide');

            }
        });
    }

    const saveInjectionTabList = function() {
        $.ajax({
            type: 'POST',
            url: 'save_injection_tab_list',
            data: form.formInjectionTabList.serialize(),
            dataType: 'json',
            beforeSend: function() {
                $('#modal-loading').modal('show');
            },
            success: function(response) {
                console.log(response);
                if(response['is_success'] === 'true'){
                    $('#modal-loading').modal('hide');
                    $('#modalAddInjectionTabList').modal('hide');
                    $('#formInjectionTabList')[0].reset();
                    dt.InjectionTabListOne.draw();
                    dt.InjectionTabListTwo.draw();
                    toastr.success('Save Sucessfully');
                }else{
                    toastr.error('Saving Failed');
                }
            },
            error: function(data, xhr, status) {
                $('#modal-loading').modal('hide');
                if(data.status === 422){
                    let errors = data.responseJSON.errors ;
                    toastr.error(`Saving Failed, Please fill up all required fields`);
                    errorHandler( errors.inj_tab_list_mo_day,form.formInjectionTabList.find('[name="inj_tab_list_mo_day"]') );
                    errorHandler( errors.inj_tab_list_shot_count,form.formInjectionTabList.find('[name="inj_tab_list_shot_count"]') );
                    errorHandler( errors.inj_tab_list_operator_name,form.formInjectionTabList.find('[name="inj_tab_list_operator_name"]') );
                    errorHandler( errors.inj_tab_list_mat_time_in,form.formInjectionTabList.find('[name="inj_tab_list_mat_time_in"]') );
                    errorHandler( errors.inj_tab_list_prond_time_start,form.formInjectionTabList.find('[name="inj_tab_list_prond_time_start"]') );
                    errorHandler( errors.inj_tab_list_prond_time_end,form.formInjectionTabList.find('[name="inj_tab_list_prond_time_end"]') );
                    errorHandler( errors.inj_tab_list_total_mat_dring_time,form.formInjectionTabList.find('[name="inj_tab_list_total_mat_dring_time"]') );
                    errorHandler( errors.inj_tab_list_mat_lot_num_virgin,form.formInjectionTabList.find('[name="inj_tab_list_mat_lot_num_virgin"]') );
                    errorHandler( errors.inj_tab_list_mat_lot_num_recycle,form.formInjectionTabList.find('[name="inj_tab_list_mat_lot_num_recycle"]') );
                    errorHandler( errors.inj_tab_list_remarks,form.formInjectionTabList.find('[name="inj_tab_list_remarks"]') );
                }else{
                    toastr.error(`Error: ${data.status}`);
                }
            }
        });
    }

    const editMachineParameter = (machineParameterId) => {
        console.log('machineParameterId 1',machineParameterId);
        $.ajax({
            type: 'GET',
            url: 'edit_machine_parameter',
            data: {'machine_parameter_id' : machineParameterId},
            dataType: 'json',
            beforeSend: function(){
                $('#modal-loading').modal('show');
            },
            success: function (response) {
                $('#modal-loading').modal('hide');
                let machineParameter = response.machine_parameter_detail;
                let moldClose = machineParameter.mold_close;
                let ejectorLub = machineParameter.ejector_lub;
                let moldOpen = machineParameter.mold_open;
                let heater = machineParameter.heater;
                let injectionVelocity = machineParameter.injection_velocity;
                let injectionTab = machineParameter.injection_tab;

                //Machine Parameter
                form.formAddMachine1.find('[name="machine_parameter_id"]').val(machineParameter.id);
                form.formAddMachine1.find('[name="machine_id"]').val(machineParameter.machine_id);
                form.formAddMachine1.find('[name="device_name"]').val(machineParameter.device_name);
                form.formAddMachine1.find('[name="no_of_cavity"]').val(machineParameter.no_of_cavity);
                form.formAddMachine1.find('[name="material_mixing_ratio_v"]').val(machineParameter.material_mixing_ratio_v);
                form.formAddMachine1.find('[name="material_mixing_ratio_r"]').val(machineParameter.material_mixing_ratio_r);
                form.formAddMachine1.find('[name="material_name"]').val(machineParameter.material_name);
                form.formAddMachine1.find('[name="color"]').val(machineParameter.color);
                form.formAddMachine1.find('[name="machine_no"]').val(machineParameter.machine_no);
                form.formAddMachine1.find('[name="shot_weight"]').val(machineParameter.shot_weight);
                form.formAddMachine1.find('[name="unit_weight"]').val(machineParameter.unit_weight);
                form.formAddMachine1.find('[name="date_created"]').val(machineParameter.created_at);
                if(machineParameter.is_accumulator === 1){ //NOTE: For Machine 1 only
                    form.formAddMachine1.find('#with').prop('checked',true);
                    form.formAddMachine1.find('#without').prop('checked',false);
                }else{
                    form.formAddMachine1.find('#with').prop('checked',false);
                    form.formAddMachine1.find('#without').prop('checked',true);
                }

                if(machineParameter.dryer_used === 1){
                    form.formAddMachine1.find('#dryerOven').prop('checked',true);
                    form.formAddMachine1.find('#dryerDHD').prop('checked',false);
                }else{
                    form.formAddMachine1.find('#dryerOven').prop('checked',false);
                    form.formAddMachine1.find('#dryerDHD').prop('checked',true);
                }
                //Mold Close
                form.formAddMachine1.find('[name="hi_v"]').val(moldClose.hi_v);
                form.formAddMachine1.find('[name="mid_slow"]').val(moldClose.mid_slow);
                form.formAddMachine1.find('[name="low_l"]').val(moldClose.low_l);
                form.formAddMachine1.find('[name="obstacle_check_tm"]').val(moldClose.obstacle_check_tm); //NOTE: For Machine 1 only
                form.formAddMachine1.find('[name="slow_start"]').val(moldClose.slow_start);
                form.formAddMachine1.find('[name="slow_end"]').val(moldClose.slow_end);
                form.formAddMachine1.find('[name="lvlp"]').val(moldClose.lvlp);
                form.formAddMachine1.find('[name="hpcl"]').val(moldClose.hpcl);
                form.formAddMachine1.find('[name="mid_sl_p"]').val(moldClose.mid_sl_p);
                form.formAddMachine1.find('[name="low_p"]').val(moldClose.low_p);
                form.formAddMachine1.find('[name="hi_p"]').val(moldClose.hi_p);
                if(machineParameter.dryer_used === 1){
                    form.formAddMachine1.find('#HiPton').prop('checked',true);
                    form.formAddMachine1.find('#HiPPercent').prop('checked',false);
                }else{
                    form.formAddMachine1.find('#HiPton').prop('checked',false);
                    form.formAddMachine1.find('#HiPPercent').prop('checked',true);
                }
                //Ejector
                form.formAddMachine1.find('[name="ej_pres"]').val(ejectorLub.ej_pres);
                form.formAddMachine1.find('[name="fwd_ev1"]').val(ejectorLub.fwd_ev1);
                form.formAddMachine1.find('[name="fwd_ev2"]').val(ejectorLub.fwd_ev2);
                form.formAddMachine1.find('[name="fwd_stop"]').val(ejectorLub.fwd_stop);
                form.formAddMachine1.find('[name="bwd_stop"]').val(ejectorLub.bwd_stop);
                form.formAddMachine1.find('[name="count"]').val(ejectorLub.count);
                form.formAddMachine1.find('[name="pattern"]').val(ejectorLub.pattern);
                //Mold Open
                form.formAddMachine1.find('[name="open_end_v"]').val(moldOpen.open_end_v);
                form.formAddMachine1.find('[name="hi_velocity_2"]').val(moldOpen.hi_velocity_2);
                form.formAddMachine1.find('[name="hi_velocity_1_percent"]').val(moldOpen.hi_velocity_1_percent);
                form.formAddMachine1.find('[name="open_v"]').val(moldOpen.open_v);
                form.formAddMachine1.find('[name="tmp_stop_time"]').val(moldOpen.tmp_stop_time); //NOTE: For Machine 1 only
                form.formAddMachine1.find('[name="open_stop"]').val(moldOpen.open_stop);
                form.formAddMachine1.find('[name="low_distance"]').val(moldOpen.low_distance);
                form.formAddMachine1.find('[name="hi_velocity_1mm"]').val(moldOpen.hi_velocity_1mm);
                form.formAddMachine1.find('[name="tmp_stop_pos"]').val(moldOpen.tmp_stop_pos); //NOTE: For Machine 1 only
                //Heater
                form.formAddMachine1.find('[name="hot_sprue_set"]').val(heater.hot_sprue_set);
                form.formAddMachine1.find('[name="nozzle_set"]').val(heater.nozzle_set);
                form.formAddMachine1.find('[name="front_set"]').val(heater.front_set);
                form.formAddMachine1.find('[name="mid_set"]').val(heater.mid_set);
                form.formAddMachine1.find('[name="rear_set"]').val(heater.rear_set);
                form.formAddMachine1.find('[name="mold_set"]').val(heater.mold_set);
                form.formAddMachine1.find('[name="hot_sprue_actual"]').val(heater.hot_sprue_actual);
                form.formAddMachine1.find('[name="front_actual"]').val(heater.front_actual);
                form.formAddMachine1.find('[name="nozzle_actual"]').val(heater.nozzle_actual);
                form.formAddMachine1.find('[name="mid_actual"]').val(heater.mid_actual);
                form.formAddMachine1.find('[name="rear_actual"]').val(heater.rear_actual);
                form.formAddMachine1.find('[name="mold_one_set"]').val(heater.mold_one_set);
                form.formAddMachine1.find('[name="mold_two_set"]').val(heater.mold_two_set);
                form.formAddMachine1.find('[name="mold_one_actual"]').val(heater.mold_one_actual);
                form.formAddMachine1.find('[name="mold_two_actual"]').val(heater.mold_two_actual);
                //Injection Velocity
                // form.formAddMachine1.find('[name="injection_time"]').val(injectionVelocity.injection_time);
                form.formAddMachine1.find('[name="cooling_time"]').val(injectionVelocity.cooling_time);
                form.formAddMachine1.find('[name="cycle_start"]').val(injectionVelocity.cycle_start);
                form.formAddMachine1.find('[name="inj_pp2"]').val(injectionVelocity.inj_pp2);
                form.formAddMachine1.find('[name="inj_pp3"]').val(injectionVelocity.inj_pp3);
                form.formAddMachine1.find('[name="inj_pp1"]').val(injectionVelocity.inj_pp1);
                form.formAddMachine1.find('[name="inj_v1"]').val(injectionVelocity.inj_v1);
                form.formAddMachine1.find('[name="inj_v2"]').val(injectionVelocity.inj_v2);
                form.formAddMachine1.find('[name="inj_v3"]').val(injectionVelocity.inj_v3);
                form.formAddMachine1.find('[name="inj_v4"]').val(injectionVelocity.inj_v4);
                form.formAddMachine1.find('[name="inj_v6"]').val(injectionVelocity.inj_v6);
                form.formAddMachine1.find('[name="inj_v5"]').val(injectionVelocity.inj_v5);
                form.formAddMachine1.find('[name="inj_sv1"]').val(injectionVelocity.inj_sv1);
                form.formAddMachine1.find('[name="inj_sv2"]').val(injectionVelocity.inj_sv2);
                form.formAddMachine1.find('[name="inj_sv3"]').val(injectionVelocity.inj_sv3);
                form.formAddMachine1.find('[name="inj_sv4"]').val(injectionVelocity.inj_sv4);
                form.formAddMachine1.find('[name="inj_sv5"]').val(injectionVelocity.inj_sv5);
                form.formAddMachine1.find('[name="inj_sm"]').val(injectionVelocity.inj_sm);
                form.formAddMachine1.find('[name="inj_sd"]').val(injectionVelocity.inj_sd);
                form.formAddMachine1.find('[name="inj_veloc_no"]').val(injectionVelocity.inj_veloc_no);
                form.formAddMachine1.find('[name="inj_press_no"]').val(injectionVelocity.inj_press_no);
                form.formAddMachine1.find('[name="inj_tp1"]').val(injectionVelocity.inj_tp1);
                form.formAddMachine1.find('[name="inj_tp2"]').val(injectionVelocity.inj_tp2); //NOTE: For Machine 1 only
                form.formAddMachine1.find('[name="inj_pos_change_mode"]').val(injectionVelocity.inj_pos_change_mode);
                form.formAddMachine1.find('[name="inj_pos_vs"]').val(injectionVelocity.inj_pos_vs);
                form.formAddMachine1.find('[name="inj_pos_pb"]').val(injectionVelocity.inj_pos_pb);
                form.formAddMachine1.find('[name="inj_pv1"]').val(injectionVelocity.inj_pv1);
                form.formAddMachine1.find('[name="inj_pv2"]').val(injectionVelocity.inj_pv2);
                form.formAddMachine1.find('[name="inj_pv3"]').val(injectionVelocity.inj_pv3);
                form.formAddMachine1.find('[name="inj_sp1"]').val(injectionVelocity.inj_sp1);
                form.formAddMachine1.find('[name="inj_sp2"]').val(injectionVelocity.inj_sp2);

                if(injectionVelocity.inj_pp1_unit == 1){
                    form.formAddMachine1.find('#pp1KgCm').prop('checked',true);
                    form.formAddMachine1.find('#pp1Percent').prop('checked',false);
                }else{
                    form.formAddMachine1.find('#pp1KgCm').prop('checked',false);
                    form.formAddMachine1.find('#pp1Percent').prop('checked',true);
                }
                if(injectionVelocity.inj_v1_unit == 1){
                    form.formAddMachine1.find('#v1Mm').prop('checked',true);
                    form.formAddMachine1.find('#v1Percent').prop('checked',false);
                }else{
                    form.formAddMachine1.find('#v1Mm').prop('checked',false);
                    form.formAddMachine1.find('#v1Percent').prop('checked',true);
                }
                if(injectionVelocity.inj_pos_pb_unit == 1){
                    form.formAddMachine1.find('#pbKgCm').prop('checked',true);
                    form.formAddMachine1.find('#pbPercent').prop('checked',false);
                }else{
                    form.formAddMachine1.find('#pbKgCm').prop('checked',false);
                    form.formAddMachine1.find('#pbPercent').prop('checked',true);
                }
                if(injectionVelocity.inj_pv1_unit == 1){
                    form.formAddMachine1.find('#pv1KgCm').prop('checked',true);
                    form.formAddMachine1.find('#pv1Percent').prop('checked',false);
                }else{
                    form.formAddMachine1.find('#pv1KgCm').prop('checked',false);
                    form.formAddMachine1.find('#pv1Percent').prop('checked',true);
                }
                //Injection Tab
                form.formAddMachine1.find('[name="inj_tab_rv6"').val(injectionTab.inj_tab_rv6);
                form.formAddMachine1.find('[name="inj_tab_rv5"').val(injectionTab.inj_tab_rv5);
                form.formAddMachine1.find('[name="inj_tab_rv4"').val(injectionTab.inj_tab_rv4);
                form.formAddMachine1.find('[name="inj_tab_rv3"').val(injectionTab.inj_tab_rv3);
                form.formAddMachine1.find('[name="inj_tab_rv2"').val(injectionTab.inj_tab_rv2);
                form.formAddMachine1.find('[name="inj_tab_rv1"').val(injectionTab.inj_tab_rv1);
                form.formAddMachine1.find('[name="inj_tab_rp3"').val(injectionTab.inj_tab_rp3);
                form.formAddMachine1.find('[name="inj_tab_rp2"').val(injectionTab.inj_tab_rp2);
                form.formAddMachine1.find('[name="inj_tab_rp1"').val(injectionTab.inj_tab_rp1);
                form.formAddMachine1.find('[name="inj_tab_fill_time"').val(injectionTab.inj_tab_fill_time);
                form.formAddMachine1.find('[name="inj_tab_plastic_time"').val(injectionTab.inj_tab_plastic_time);
                form.formAddMachine1.find('[name="inj_tab_cycle_time"').val(injectionTab.inj_tab_cycle_time);
                form.formAddMachine1.find('[name="inj_tab_spray_tm"').val(injectionTab.inj_tab_spray_tm);
                form.formAddMachine1.find('[name="inj_tab_screw_most_fwd"').val(injectionTab.inj_tab_screw_most_fwd);
                form.formAddMachine1.find('[name="inj_tab_enj_end_pos"').val(injectionTab.inj_tab_enj_end_pos);
                form.formAddMachine1.find('[name="inj_tab_airblow_start_time"').val(injectionTab.inj_tab_airblow_start_time);
                form.formAddMachine1.find('[name="inj_tab_airblow_blow_time"').val(injectionTab.inj_tab_airblow_blow_time);
                form.formAddMachine1.find('[name="inj_tab_md_temp_requirement"').val(injectionTab.inj_tab_md_temp_requirement);
                form.formAddMachine1.find('[name="inj_tab_md_time_requirement"').val(injectionTab.inj_tab_md_time_requirement);
                form.formAddMachine1.find('[name="inj_tab_md_temp_actual"').val(injectionTab.inj_tab_md_temp_actual);

                if(injectionTab.inj_tab_spray_type === "YP"){
                    form.formAddMachine1.find('#radioInjTabSprayTypeYP').prop('checked',true);
                    form.formAddMachine1.find('#radioInjTabSprayTypeZ').prop('checked',false);
                }else{
                    form.formAddMachine1.find('#radioInjTabSprayTypeYP').prop('checked',false);
                    form.formAddMachine1.find('#radioInjTabSprayTypeZ').prop('checked',true);
                }
                if(injectionTab.inj_tab_spray === "YES"){
                    form.formAddMachine1.find('#radioInjTabSprayYes').prop('checked',true);
                    form.formAddMachine1.find('#radioInjTabSprayNo').prop('checked',false);
                }else{
                    form.formAddMachine1.find('#radioInjTabSprayYes').prop('checked',false);
                    form.formAddMachine1.find('#radioInjTabSprayNo').prop('checked',true);
                }
                if(injectionTab.inj_tab_spray_mode === "MANUAL"){
                    form.formAddMachine1.find('#radioInjTabSprayModeManual').prop('checked',true);
                    form.formAddMachine1.find('#radioInjTabSprayModeAuto').prop('checked',false);
                }else{
                    form.formAddMachine1.find('#radioInjTabSprayModeManual').prop('checked',false);
                    form.formAddMachine1.find('#radioInjTabSprayModeAuto').prop('checked',true);
                }
                if(injectionTab.inj_tab_spray_side === "MOVE"){
                    form.formAddMachine1.find('#radioInjTabSpraySideMove').prop('checked',true);
                    form.formAddMachine1.find('#radioInjTabSpraySideFixed').prop('checked',false);
                }else{
                    form.formAddMachine1.find('#radioInjTabSpraySideMove').prop('checked',false);
                    form.formAddMachine1.find('#radioInjTabSpraySideFixed').prop('checked',true);
                }
                if(injectionTab.inj_tab_ccd === "YES"){
                    form.formAddMachine1.find('#radioInjTabCcdYes').prop('checked',true);
                    form.formAddMachine1.find('#radioInjTabCcdNo').prop('checked',false);
                }else{
                    form.formAddMachine1.find('#radioInjTabCcdYes').prop('checked',false);
                    form.formAddMachine1.find('#radioInjTabCcdNo').prop('checked',true);
                }
                if(injectionTab.inj_tab_esc === "YES"){
                    form.formAddMachine1.find('#radioInjTabEscYes').prop('checked',true);
                    form.formAddMachine1.find('#radioInjTabEscNo').prop('checked',false);
                }else{
                    form.formAddMachine1.find('#radioInjTabEscYes').prop('checked',false);
                    form.formAddMachine1.find('#radioInjTabEscNo').prop('checked',true);
                }
                if(injectionTab.inj_tab_spray_portion === "CENTER ONLY"){
                    form.formAddMachine1.find('#radioInjTabSprayPortionCenter').prop('checked',true);
                    form.formAddMachine1.find('#radioInjTabSprayPortionWhole').prop('checked',false);
                }else{
                    form.formAddMachine1.find('#radioInjTabSprayPortionCenter').prop('checked',false);
                    form.formAddMachine1.find('#radioInjTabSprayPortionWhole').prop('checked',true);
                }
                dt.InjectionTabListOne.draw();
                dt.InjectionTabListTwo.draw();
                $('#modal-loading').modal('hide');

            },error: function (data, xhr, status){
                toastr.error(`Error: ${data.status}`);
                $('#modal-loading').modal('hide');
            }
        });
    }

    const editMachineParameterTwo = (machineParameterId) => {
        $.ajax({
            type: 'GET',
            url: 'edit_machine_parameter_two',
            data: {'machine_parameter_id' : machineParameterId},
            dataType: 'json',
            beforeSend: function(){
                $('#modal-loading').modal('show');
            },
            success: function (response) {
                try {
                    let machineParameter = response.machine_parameter_detail;
                    let moldClose = machineParameter.mold_close;
                    let ejectorLub = machineParameter.ejector_lub;
                    let moldOpen = machineParameter.mold_open;
                    let heater = machineParameter.heater;
                    let injectionVelocity = machineParameter.injection_velocity;
                    let support = machineParameter.support;

                    //Machine Parameter
                    form.formAddMachine2.find('[name="machine_parameter_id"]').val(machineParameter.id);
                    form.formAddMachine2.find('[name="machine_id"]').val(machineParameter.machine_id);
                    form.formAddMachine2.find('[name="device_name"]').val(machineParameter.device_name);
                    form.formAddMachine2.find('[name="no_of_cavity"]').val(machineParameter.no_of_cavity);
                    form.formAddMachine2.find('[name="material_mixing_ratio_v"]').val(machineParameter.material_mixing_ratio_v);
                    form.formAddMachine2.find('[name="material_mixing_ratio_r"]').val(machineParameter.material_mixing_ratio_r);
                    form.formAddMachine2.find('[name="material_name"]').val(machineParameter.material_name);
                    form.formAddMachine2.find('[name="color"]').val(machineParameter.color);
                    form.formAddMachine2.find('[name="machine_no"]').val(machineParameter.machine_no);
                    form.formAddMachine2.find('[name="shot_weight"]').val(machineParameter.shot_weight);
                    form.formAddMachine2.find('[name="unit_weight"]').val(machineParameter.unit_weight);
                    form.formAddMachine2.find('[name="date_created"]').val(machineParameter.created_at);

                    if(machineParameter.dryer_used === 1){
                        form.formAddMachine2.find('#dryerOven').prop('checked',true);
                        form.formAddMachine2.find('#dryerDHD').prop('checked',false);
                    }else{
                        form.formAddMachine2.find('#dryerOven').prop('checked',false);
                        form.formAddMachine2.find('#dryerDHD').prop('checked',true);
                    }
                    //Mold Close
                    form.formAddMachine2.find('[name="hi_v"]').val(moldClose.hi_v);
                    form.formAddMachine2.find('[name="mid_slow"]').val(moldClose.mid_slow);
                    form.formAddMachine2.find('[name="low_l"]').val(moldClose.low_l);
                    // form.formAddMachine2.find('[name="obstacle_check_tm"]').val(moldClose.obstacle_check_tm);
                    form.formAddMachine2.find('[name="slow_start"]').val(moldClose.slow_start);
                    form.formAddMachine2.find('[name="slow_end"]').val(moldClose.slow_end);
                    form.formAddMachine2.find('[name="lvlp"]').val(moldClose.lvlp);
                    form.formAddMachine2.find('[name="hpcl"]').val(moldClose.hpcl);
                    form.formAddMachine2.find('[name="mid_sl_p"]').val(moldClose.mid_sl_p);
                    form.formAddMachine2.find('[name="low_p"]').val(moldClose.low_p);
                    form.formAddMachine2.find('[name="hi_p"]').val(moldClose.hi_p);
                    if(machineParameter.dryer_used === 1){
                        form.formAddMachine2.find('#HiPton').prop('checked',true);
                        form.formAddMachine2.find('#HiPPercent').prop('checked',false);
                    }else{
                        form.formAddMachine2.find('#HiPton').prop('checked',false);
                        form.formAddMachine2.find('#HiPPercent').prop('checked',true);
                    }
                    //Ejector
                    form.formAddMachine2.find('[name="ej_pres"]').val(ejectorLub.ej_pres);
                    form.formAddMachine2.find('[name="fwd_ev1"]').val(ejectorLub.fwd_ev1);
                    form.formAddMachine2.find('[name="fwd_ev2"]').val(ejectorLub.fwd_ev2);
                    form.formAddMachine2.find('[name="fwd_stop"]').val(ejectorLub.fwd_stop);
                    form.formAddMachine2.find('[name="bwd_stop"]').val(ejectorLub.bwd_stop);
                    form.formAddMachine2.find('[name="count"]').val(ejectorLub.count);
                    form.formAddMachine2.find('[name="pattern"]').val(ejectorLub.pattern);
                    //Mold Open
                    form.formAddMachine2.find('[name="open_end_v"]').val(moldOpen.open_end_v);
                    form.formAddMachine2.find('[name="hi_velocity_2"]').val(moldOpen.hi_velocity_2);
                    form.formAddMachine2.find('[name="hi_velocity_1_percent"]').val(moldOpen.hi_velocity_1_percent);
                    form.formAddMachine2.find('[name="open_v"]').val(moldOpen.open_v);
                    form.formAddMachine2.find('[name="open_stop"]').val(moldOpen.open_stop);
                    form.formAddMachine2.find('[name="low_distance"]').val(moldOpen.low_distance);
                    form.formAddMachine2.find('[name="hi_velocity_1mm"]').val(moldOpen.hi_velocity_1mm);

                    //Heater
                    form.formAddMachine2.find('[name="hot_sprue_set"]').val(heater.hot_sprue_set);
                    form.formAddMachine2.find('[name="nozzle_set"]').val(heater.nozzle_set);
                    form.formAddMachine2.find('[name="front_set"]').val(heater.front_set);
                    form.formAddMachine2.find('[name="mid_set"]').val(heater.mid_set);
                    form.formAddMachine2.find('[name="rear_set"]').val(heater.rear_set);
                    form.formAddMachine2.find('[name="mold_set"]').val(heater.mold_set);
                    form.formAddMachine2.find('[name="hot_sprue_actual"]').val(heater.hot_sprue_actual);
                    form.formAddMachine2.find('[name="front_actual"]').val(heater.front_actual);
                    form.formAddMachine2.find('[name="nozzle_actual"]').val(heater.nozzle_actual);
                    form.formAddMachine2.find('[name="mid_actual"]').val(heater.mid_actual);
                    form.formAddMachine2.find('[name="rear_actual"]').val(heater.rear_actual);
                    form.formAddMachine2.find('[name="mold_one_set"]').val(heater.mold_one_set);
                    form.formAddMachine2.find('[name="mold_two_set"]').val(heater.mold_two_set);
                    form.formAddMachine2.find('[name="mold_one_actual"]').val(heater.mold_one_actual);
                    form.formAddMachine2.find('[name="mold_two_actual"]').val(heater.mold_two_actual);

                    //Injection Velocity
                    form.formAddMachine2.find('[name="injection_time"]').val(injectionVelocity.injection_tim);
                    form.formAddMachine2.find('[name="cooling_time"]').val(injectionVelocity.cooling_time);
                    form.formAddMachine2.find('[name="cycle_start"]').val(injectionVelocity.cycle_start);
                    form.formAddMachine2.find('[name="inj_pp2"]').val(injectionVelocity.inj_pp2);
                    form.formAddMachine2.find('[name="inj_pp3"]').val(injectionVelocity.inj_pp3);
                    form.formAddMachine2.find('[name="inj_pp1"]').val(injectionVelocity.inj_pp1);
                    form.formAddMachine2.find('[name="inj_v1"]').val(injectionVelocity.inj_v1);
                    form.formAddMachine2.find('[name="inj_v2"]').val(injectionVelocity.inj_v2);
                    form.formAddMachine2.find('[name="inj_v3"]').val(injectionVelocity.inj_v3);
                    form.formAddMachine2.find('[name="inj_v4"]').val(injectionVelocity.inj_v4);
                    form.formAddMachine2.find('[name="inj_v6"]').val(injectionVelocity.inj_v6);
                    form.formAddMachine2.find('[name="inj_v5"]').val(injectionVelocity.inj_v5);
                    form.formAddMachine2.find('[name="inj_sv1"]').val(injectionVelocity.inj_sv1);
                    form.formAddMachine2.find('[name="inj_sv2"]').val(injectionVelocity.inj_sv2);
                    form.formAddMachine2.find('[name="inj_sv3"]').val(injectionVelocity.inj_sv3);
                    form.formAddMachine2.find('[name="inj_sv4"]').val(injectionVelocity.inj_sv4);
                    form.formAddMachine2.find('[name="inj_sv5"]').val(injectionVelocity.inj_sv5);
                    form.formAddMachine2.find('[name="inj_sm"]').val(injectionVelocity.inj_sm);
                    form.formAddMachine2.find('[name="inj_sd"]').val(injectionVelocity.inj_sd);
                    form.formAddMachine2.find('[name="inj_veloc_no"]').val(injectionVelocity.inj_veloc_no);
                    form.formAddMachine2.find('[name="inj_press_no"]').val(injectionVelocity.inj_press_no);
                    form.formAddMachine2.find('[name="inj_tp1"]').val(injectionVelocity.inj_tp1);
                    form.formAddMachine2.find('[name="inj_pos_change_mode"]').val(injectionVelocity.inj_pos_change_mode);
                    form.formAddMachine2.find('[name="inj_pos_vs"]').val(injectionVelocity.inj_pos_vs);
                    form.formAddMachine2.find('[name="inj_pos_pb"]').val(injectionVelocity.inj_pos_pb);
                    form.formAddMachine2.find('[name="inj_pv1"]').val(injectionVelocity.inj_pv1);
                    form.formAddMachine2.find('[name="inj_pv2"]').val(injectionVelocity.inj_pv2);
                    form.formAddMachine2.find('[name="inj_pv3"]').val(injectionVelocity.inj_pv3);
                    form.formAddMachine2.find('[name="inj_sp1"]').val(injectionVelocity.inj_sp1);
                    form.formAddMachine2.find('[name="inj_sp2"]').val(injectionVelocity.inj_sp2);
                    form.formAddMachine2.find('[name="inj_hold"]').val(injectionVelocity.inj_hold); //NOTE: For Machine 1 only
                    form.formAddMachine2.find('[name="inj_limit_v"]').val(injectionVelocity.inj_limit_v); //NOTE: For Machine 1 only
                    form.formAddMachine2.find('[name="inj_fill"]').val(injectionVelocity.inj_fill); //NOTE: For Machine 1 only
                    form.formAddMachine2.find('[name="inj_limit_p"]').val(injectionVelocity.inj_limit_p); //NOTE: For Machine 1 only

                    //Support
                    form.formAddMachine2.find('[name="support_v6"]').val(support.support_v6);
                    form.formAddMachine2.find('[name="support_v5"]').val(support.support_v5);
                    form.formAddMachine2.find('[name="support_v4"]').val(support.support_v4);
                    form.formAddMachine2.find('[name="support_v3"]').val(support.support_v3);
                    form.formAddMachine2.find('[name="support_v2"]').val(support.support_v2);
                    form.formAddMachine2.find('[name="support_v1"]').val(support.support_v1);
                    form.formAddMachine2.find('[name="support_pp3"]').val(support.support_pp3);
                    form.formAddMachine2.find('[name="support_pp2"]').val(support.support_pp2);
                    form.formAddMachine2.find('[name="support_pp1"]').val(support.support_pp1);
                    form.formAddMachine2.find('[name="support_fill_p"]').val(support.support_fill_p);
                    form.formAddMachine2.find('[name="support_bp"]').val(support.support_bp);
                    form.formAddMachine2.find('[name="support_fill_time"]').val(support.support_fill_time);
                    form.formAddMachine2.find('[name="support_plastic_time"]').val(support.support_plastic_time);
                    form.formAddMachine2.find('[name="support_cycle_time"]').val(support.support_cycle_time);
                    form.formAddMachine2.find('[name="support_spray_tm"]').val(support.support_spray_tm);
                    form.formAddMachine2.find('[name="support_screw_most_fwd"]').val(support.support_screw_most_fwd);
                    form.formAddMachine2.find('[name="support_enj_end_pos"]').val(support.support_enj_end_pos);
                    form.formAddMachine2.find('[name="support_airblow_start_time"]').val(support.support_airblow_start_time);
                    form.formAddMachine2.find('[name="support_airblow_blow_time"]').val(support.support_airblow_blow_time);
                    form.formAddMachine2.find('[name="support_md_temp_requirement"]').val(support.support_md_temp_requirement);
                    form.formAddMachine2.find('[name="support_md_time_requirement"]').val(support.support_md_time_requirement);
                    form.formAddMachine2.find('[name="support_md_temp_actual"]').val(support.support_md_temp_actual);

                    if(support.support_spray_type === "YP"){
                        form.formAddMachine2.find('#radioSupportSprayTypeYP').prop('checked',true);
                        form.formAddMachine2.find('#radioSupportSprayTypeZ').prop('checked',false);
                    }else{
                        form.formAddMachine2.find('#radioSupportSprayTypeYP').prop('checked',false);
                        form.formAddMachine2.find('#radioSupportSprayTypeZ').prop('checked',true);
                    }
                    if(support.support_spray === "YES"){
                        form.formAddMachine2.find('#radioSupportSprayYes').prop('checked',true);
                        form.formAddMachine2.find('#radioSupportSprayNo').prop('checked',false);
                    }else{
                        form.formAddMachine2.find('#radioSupportSprayYes').prop('checked',false);
                        form.formAddMachine2.find('#radioSupportSprayNo').prop('checked',true);
                    }
                    if(support.support_spray_mode === "MANUAL"){
                        form.formAddMachine2.find('#radioSupportSprayModeManual').prop('checked',true);
                        form.formAddMachine2.find('#radioSupportSprayModeAuto').prop('checked',false);
                    }else{
                        form.formAddMachine2.find('#radioSupportSprayModeManual').prop('checked',false);
                        form.formAddMachine2.find('#radioSupportSprayModeAuto').prop('checked',true);
                    }
                    if(support.support_spray_side === "MOVE"){
                        form.formAddMachine2.find('#radioSupportSpraySideMove').prop('checked',true);
                        form.formAddMachine2.find('#radioSupportSpraySideFixed').prop('checked',false);
                    }else{
                        form.formAddMachine2.find('#radioSupportSpraySideMove').prop('checked',false);
                        form.formAddMachine2.find('#radioSupportSpraySideFixed').prop('checked',true);
                    }
                    if(support.support_ccd === "YES"){
                        form.formAddMachine2.find('#radioSupportCcdYes').prop('checked',true);
                        form.formAddMachine2.find('#radioSupportCcdNo').prop('checked',false);
                    }else{
                        form.formAddMachine2.find('#radioSupportCcdYes').prop('checked',false);
                        form.formAddMachine2.find('#radioSupportCcdNo').prop('checked',true);
                    }
                    if(support.support_esc === "YES"){
                        form.formAddMachine2.find('#radioSupportEscYes').prop('checked',true);
                        form.formAddMachine2.find('#radioSupportEscNo').prop('checked',false);
                    }else{
                        form.formAddMachine2.find('#radioSupportEscYes').prop('checked',false);
                        form.formAddMachine2.find('#radioSupportEscNo').prop('checked',true);
                    }
                    if(support.support_spray_portion === "CENTER ONLY"){
                        form.formAddMachine2.find('#radioSupportSprayPortionCenter').prop('checked',true);
                        form.formAddMachine2.find('#radioSupportSprayPortionWhole').prop('checked',false);
                    }else{
                        form.formAddMachine2.find('#radioSupportSprayPortionCenter').prop('checked',false);
                        form.formAddMachine2.find('#radioSupportSprayPortionWhole').prop('checked',true);
                    }
                    console.log('sdsad',$('[name="machine_parameter_id"]').val())
                    dt.InjectionTabListOne.draw();
                    dt.InjectionTabListTwo.draw();
                    $('#modal-loading').modal('hide');
                } catch (error) {
                    $('#modal-loading').modal('hide');
                    toastr.error(`Error: ${error}`);
                }

            },error: function (data, xhr, status){
                $('#modal-loading').modal('hide');
                toastr.error(`Error: ${data.status}`);
            }
        });
    }

    const fnGetOperatorName = function (elementId,dataId = null){
        let result = `<option value="0" selected> N/A </option>`;
        $.ajax({
            type: 'GET',
            url: 'get_operator_name',
            data: {"data_id" : dataId},
            dataType: 'json',
            beforeSend: function(){
                result = `<option value="0" selected disabled> - Loading - </option>`;
                elementId.html(result);
            },
            success: function (response) {
                let columnId = response.id;
                result = '';
                if(columnId.length > 0){
                    for(let index = 0; index < columnId.length; index++){

                        result += `<option value="${columnId[index]}">${response.value[index]}</option>`;
                    }
                }
                else{
                    result = `<option value="0" selected disabled> - No data found - </option>`;
                }
                elementId.html(result);
                if(dataId != null){
                    setTimeout(() => {
                        console.log('dataId',dataId)
                        elementId.val(dataId).trigger('change');
                    }, 100);
                }
            },error: function (data, xhr, status){
                result = `<option value="0" selected disabled> - Reload Again - </option>`;
                elementId.html(result);
                toastr.error(`Error: ${data.status}`);
            }
        });
    }

    const editInjectionTabList = function (injectionTabListId){
        $.ajax({
            type: 'GET',
            url: 'edit_injection_tab_list',
            data: {'injection_tab_list_id' : injectionTabListId},
            dataType: 'json',
            success: function (response) {
                if(response.is_success === 'true'){
                    let injectionTabDetails = response.injection_tab_details[0];

                    form.formInjectionTabList.find('[name="machine_parameter_id"]').val(injectionTabDetails.machine_parameter_id);
                    form.formInjectionTabList.find('[name="injection_tab_list_id"]').val(injectionTabDetails.id);
                    form.formInjectionTabList.find('[name="inj_tab_list_mo_day"]').val(injectionTabDetails.inj_tab_list_mo_day);
                    form.formInjectionTabList.find('[name="inj_tab_list_shot_count"]').val(injectionTabDetails.inj_tab_list_shot_count);
                    form.formInjectionTabList.find('[name="inj_tab_list_mat_time_in"]').val(injectionTabDetails.inj_tab_list_mat_time_in);
                    form.formInjectionTabList.find('[name="inj_tab_list_prond_time_start"]').val(injectionTabDetails.inj_tab_list_prond_time_start);
                    form.formInjectionTabList.find('[name="inj_tab_list_prond_time_end"]').val(injectionTabDetails.inj_tab_list_prond_time_end);
                    form.formInjectionTabList.find('[name="inj_tab_list_total_mat_dring_time"]').val(injectionTabDetails.inj_tab_list_total_mat_dring_time);
                    form.formInjectionTabList.find('[name="inj_tab_list_mat_lot_num_virgin"]').val(injectionTabDetails.inj_tab_list_mat_lot_num_virgin);
                    form.formInjectionTabList.find('[name="inj_tab_list_mat_lot_num_recycle"]').val(injectionTabDetails.inj_tab_list_mat_lot_num_recycle);
                    form.formInjectionTabList.find('[name="inj_tab_list_remarks"]').val(injectionTabDetails.inj_tab_list_remarks);

                    fnGetOperatorName(form.formInjectionTabList.find('[name="inj_tab_list_operator_name"]'),injectionTabDetails.inj_tab_list_operator_name)
                }
            },error: function (data, xhr, status){

                toastr.error(`Error: ${data.status}`);
            }
        });
    }

// }); //docReadyEnd
