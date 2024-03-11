// $(document).ready(function () { //docReadyEnd
    const tbl = {
        tableMachineParameter_form1 : "#tableMachineParameter_form1",
        tableMachineParameter_form2 : "#tableMachineParameter_form2",
    }
    const form = {
        formAddMachine1 : $('#formAddMachine1'),
        formAddMachine2 : $('#formAddMachine2'),
    }

    const dt = {
        dataTablesMachineParameter : '',
        dataTablesMachineParameter2 : '',
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
            beforeSend: function(){
                $('#modal-loading').modal('show');
            },
            success: function (response) {
                $('#modal-loading').modal('hide');
                $('#modalAddMachine1').modal('hide');
                $('#formAddMachine1')[0].reset();
                toastr.success('Save Sucessfully');
                dt.dataTablesMachineParameter.draw();
            },error: function (data, xhr, status){
                toastr.error(`Error: ${data.status}`);
                $('#modal-loading').modal('hide');
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
                $('#modal-loading').modal('hide');
                $('#modalAddMachine2').modal('hide');
                $('#formAddMachine2')[0].reset();
                toastr.success('Save Sucessfully');
                dt.dataTablesMachineParameter2.draw();
            },error: function (data, xhr, status){
                toastr.error(`Error: ${data.status}`);
                $('#modal-loading').modal('hide');

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
                // let injectionVelocity = machineParameter.injection_velocity;
                // console.log(injectionVelocity);
                // return;

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
                if(machineParameter.is_accumulator === 1){
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
                form.formAddMachine1.find('[name="obstacle_check_tm"]').val(moldClose.obstacle_check_tm);
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
                form.formAddMachine1.find('[name="tmp_stop_time"]').val(moldOpen.tmp_stop_time);
                form.formAddMachine1.find('[name="open_stop"]').val(moldOpen.open_stop);
                form.formAddMachine1.find('[name="low_distance"]').val(moldOpen.low_distance);
                form.formAddMachine1.find('[name="hi_velocity_1mm"]').val(moldOpen.hi_velocity_1mm);
                form.formAddMachine1.find('[name="tmp_stop_pos"]').val(moldOpen.tmp_stop_pos);
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
                form.formAddMachine1.find('[name="injection_time"]').val(injectionVelocity.injection_time);
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
                form.formAddMachine1.find('[name="inj_tp2"]').val(injectionVelocity.inj_tp2);
                form.formAddMachine1.find('[name="inj_pos_change_mode"]').val(injectionVelocity.inj_pos_change_mode);
                form.formAddMachine1.find('[name="inj_pos_vs"]').val(injectionVelocity.inj_pos_vs);
                form.formAddMachine1.find('[name="inj_pos_pb"]').val(injectionVelocity.inj_pos_pb);
                form.formAddMachine1.find('[name="inj_pv1"]').val(injectionVelocity.inj_pv1);
                form.formAddMachine1.find('[name="inj_pv2"]').val(injectionVelocity.inj_pv2);
                form.formAddMachine1.find('[name="inj_pv3"]').val(injectionVelocity.inj_pv3);
                form.formAddMachine1.find('[name="inj_sp1"]').val(injectionVelocity.inj_sp1);
                form.formAddMachine1.find('[name="inj_sp2"]').val(injectionVelocity.inj_sp2);
                console.log('injectionVelocity.inj_pp1_unit',injectionVelocity.inj_pp1_unit);
                // form.formAddMachine1.find('[name="inj_pp1_unit"]').val(injectionVelocity.inj_pp1_unit);
                // form.formAddMachine1.find('[name="inj_v1_unit"]').val(injectionVelocity.inj_v1_unit);
                // form.formAddMachine1.find('[name="inj_pos_pb_unit"]').val(injectionVelocity.inj_pos_pb_unit);
                // form.formAddMachine1.find('[name="inj_pv1_unit"]').val(injectionVelocity.inj_pv1_unit);

                //Injection Velocity
                form.formAddMachine1.find('[name="injection_time"]').val(injectionVelocity.injection_time);
                form.formAddMachine1.find('[name="inj_tab_rv6"').val()
                form.formAddMachine1.find('[name="inj_tab_rv5"').val()
                form.formAddMachine1.find('[name="inj_tab_rv4"').val()
                form.formAddMachine1.find('[name="inj_tab_rv3"').val()
                form.formAddMachine1.find('[name="inj_tab_rv2"').val()
                form.formAddMachine1.find('[name="inj_tab_rv1"').val()
                form.formAddMachine1.find('[name="inj_tab_rp3"').val()
                form.formAddMachine1.find('[name="inj_tab_rp2"').val()
                form.formAddMachine1.find('[name="inj_tab_rp1"').val()
                form.formAddMachine1.find('[name="inj_tab_fill_time"').val()
                form.formAddMachine1.find('[name="inj_tab_plastic_time"').val()
                form.formAddMachine1.find('[name="inj_tab_cycle_time"').val()
                form.formAddMachine1.find('[name="inj_tab_spray_tm"').val()
                form.formAddMachine1.find('[name="inj_tab_screw_most_fwd"').val()
                form.formAddMachine1.find('[name="inj_tab_enj_end_pos"').val()
                form.formAddMachine1.find('[name="inj_tab_airblow_start_time"').val()
                form.formAddMachine1.find('[name="inj_tab_airblow_blow_time"').val()
                form.formAddMachine1.find('[name="inj_tab_md_temp_requirement"').val()
                form.formAddMachine1.find('[name="inj_tab_md_time_requirement"').val()
                form.formAddMachine1.find('[name="inj_tab_md_temp_actual"').val()
                form.formAddMachine1.find('[name="inj_tab_spray_type"').val()
                form.formAddMachine1.find('[name="inj_tab_spray"').val()
                form.formAddMachine1.find('[name="inj_tab_spray_mode"').val()
                form.formAddMachine1.find('[name="inj_tab_spray_side"').val()
                form.formAddMachine1.find('[name="inj_tab_ccd"').val()
                form.formAddMachine1.find('[name="inj_tab_esc"').val()
                form.formAddMachine1.find('[name="inj_tab_spray_portion"').val()



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

            },
            success: function (response) {
                console.log('machineParameterId 2',machineParameterId);
                /*
                    is_accumulator
                    obstacle_check_tm
                    tmp_stop_time
                    tmp_stop_pos
                */
                let machineParameter = response.machine_parameter_detail;
                let moldClose = machineParameter.mold_close;
                let ejectorLub = machineParameter.ejector_lub;
                let moldOpen = machineParameter.mold_open;
                let heater = machineParameter.heater;
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
                // form.formAddMachine2.find('[name="tmp_stop_time"]').val(moldOpen.tmp_stop_time);
                form.formAddMachine2.find('[name="open_stop"]').val(moldOpen.open_stop);
                form.formAddMachine2.find('[name="low_distance"]').val(moldOpen.low_distance);
                form.formAddMachine2.find('[name="hi_velocity_1mm"]').val(moldOpen.hi_velocity_1mm);
                // form.formAddMachine2.find('[name="tmp_stop_pos"]').val(moldOpen.tmp_stop_pos);
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
            },error: function (data, xhr, status){
            toastr.error(`Error: ${data.status}`);
            }
        });
    }

// }); //docReadyEnd
