<?php

namespace App\Http\Controllers;

use stdClass;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Heater;
use App\Models\Support;
use App\Models\MoldOpen;
use App\Models\MoldClose;
use App\Models\EjectorLub;
use App\Models\InjectionTab;
use App\Models\MachineParameter;
use App\Models\InjectionVelocity;
use App\Models\MachineManagement;
use App\Http\Requests\HeaterRequest;
use App\Http\Requests\EjectorRequest;
use App\Http\Requests\MachineRequest;
use App\Http\Requests\SupportRequest;
use App\Http\Requests\MoldOpenRequest;
use App\Http\Requests\MoldCloseRequest;
use App\Http\Requests\InjectionTabRequest;
use App\Http\Requests\MachineParameterRequest;
use App\Http\Requests\EnjectionVelocityRequest;
use App\Http\Requests\InjectionVelocityRequest;

class MachineParameterController extends Controller
{

    public function loadMachineParameterOne(Request $request){
        // return 'true' ;
        /*
            { "data" : "action", orderable:false, searchable:false},
            { "data" : "status"},
            { "data" : "employee_name"},
            { "data" : "username"},
            { "data" : "user_level"},
        */
        date_default_timezone_set('Asia/Manila');
        try {
            $machine_parameter = DB::connection('mysql')
            ->select(' SELECT  parameters.*,machine.machine_name
                FROM machine_parameters AS parameters
                LEFT JOIN machine ON machine.id = parameters.machine_id
                WHERE machine.machine_category = 1 AND parameters.deleted_at IS NULL
                ORDER BY parameters.created_at DESC
            ');
            return DataTables::of($machine_parameter)
            ->addColumn('get_action', function($row){
                $result = '';
                $result .= '<center>';
                //<button type="button" class="btn btn-primary mb-3" machine-parameter-id='$row->id' id="btnAddMachine1" data-bs-toggle="modal" data-bs-target="#modalAddMachine1"><i class='fa-solid fa-pen-to-square'></i></button>
                $result .= "<button class='btn btn-info btn-sm mr-1' machine-parameter-id='$row->id' id='btnEditMachineParameter' data-bs-toggle='modal' data-bs-target='#modalAddMachine1'><i class='fa-solid fa-pen-to-square'></i></button>";
                $result .= '</center>';
                return $result;
            })
            ->addColumn('get_status', function($row){
                $result = '';
                $result .= "Status";
                return $result;
            })
            ->rawColumns(['get_action','get_status'])
            ->make(true);
        } catch (Exception $e) {
            return response()->json(['is_success' => 'false', 'exceptionError' => $e->getMessage()]);
        }
    }

    public function loadMachineParameterTwo(Request $request){
        // return 'true' ;
        /*
            { "data" : "action", orderable:false, searchable:false},
            { "data" : "status"},
            { "data" : "employee_name"},
            { "data" : "username"},
            { "data" : "user_level"},
        */
        date_default_timezone_set('Asia/Manila');
        try {
            $machine_parameter = DB::connection('mysql')
            ->select(' SELECT  parameters.*,machine.machine_name
                FROM machine_parameters AS parameters
                LEFT JOIN machine ON machine.id = parameters.machine_id
                WHERE machine.machine_category = 2 AND parameters.deleted_at IS NULL
                ORDER BY parameters.created_at DESC
            ');
            return DataTables::of($machine_parameter)
            ->addColumn('get_action', function($row){
                $result = '';
                $result .= '<center>';
                //<button type="button" class="btn btn-primary mb-3" machine-parameter-id='$row->id' id="btnAddMachine1" data-bs-toggle="modal" data-bs-target="#modalAddMachine1"><i class='fa-solid fa-pen-to-square'></i></button>
                $result .= "<button class='btn btn-info btn-sm mr-1' machine-parameter-id='$row->id' id='btnEditMachineParameterTwo' data-bs-toggle='modal' data-bs-target='#modalAddMachine2'><i class='fa-solid fa-pen-to-square'></i></button>";
                $result .= '</center>';
                return $result;
            })
            ->addColumn('get_status', function($row){
                $result = '';
                $result .= "Status";
                return $result;
            })
            ->rawColumns(['get_action','get_status'])
            ->make(true);
        } catch (Exception $e) {
            return response()->json(['is_success' => 'false', 'exceptionError' => $e->getMessage()]);
        }
    }

    public function getMachineDetailsForm1(Request $request){
        $machine_details_1 = MachineManagement::where('status',1)
        ->where('machine_category', 1)
        ->get();

        return response()->json(['machine_details_1' => $machine_details_1]);
        // return $machine_details;
    }

    public function getMachineDetailsForm2(Request $request){
        $machine_details_2 = MachineManagement::
        where('status',1)
        ->where('machine_category', 2)
        ->get();

        return response()->json(['machine_details_2' => $machine_details_2]);

        // return $machine_details;
    }

    public function saveMachineOne(
            Request $request,MachineParameterRequest $machine_parameter_request,
            MoldCloseRequest $mold_close_request,EjectorRequest $ejector_request,
            MoldOpenRequest $mold_open_request,HeaterRequest $heater_request
            ,InjectionVelocityRequest $injection_velocity_request,InjectionTabRequest $injection_tab_request
        ){
        date_default_timezone_set('Asia/Manila');
        DB::beginTransaction();
        try {
            if( isset($request->machine_parameter_id) || $request->machine_parameter_id != ''){ //Edit Machine Parameter
                // return 'edit';
                MachineParameter::where('id',$request->machine_parameter_id)->whereNull('deleted_at')->update($machine_parameter_request->validated());
                MoldClose::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($mold_close_request->validated());
                EjectorLub::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($ejector_request->validated());
                MoldOpen::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($mold_open_request->validated());
                Heater::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($heater_request->validated());
                InjectionVelocity::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($injection_velocity_request->validated());
                //This InjenctionTab is for Machine 1 Requirement Only
                InjectionTab::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($injection_tab_request->validated());
            }else{ //Add Machine Parameter
                // return 'add';
                $validation = array(
                    //Form Machine Parameter
                    'is_accumulator' => 'required',
                    //Form Mold Close
                    'obstacle_check_tm' => ['required','numeric'],
                    //Form Mold Open
                    'tmp_stop_time' => ['required','numeric'],
                    'tmp_stop_pos' => ['required','numeric'],
                    //Form Injection Velocity
                    'inj_pp1_unit' => ['required','numeric'],
                    'inj_v1_unit'=> ['required','numeric'],
                    'inj_veloc_no'=> ['required','numeric'],
                    'inj_press_no'=> ['required','numeric'],
                    'inj_tp2'=> ['required','numeric'],
                    'inj_pos_pb_unit'=> ['required','numeric'],
                    'inj_pv1_unit'=> ['required','numeric'],
                );
                $validator = Validator::make($request->all(), $validation);
                if ($validator->fails()) {
                    return response()->json(['result' => '0', 'errors' => $validator->messages()],422);
                }

                $machine_parameter_id = MachineParameter::insertGetId($machine_parameter_request->validated());
                MachineParameter::where('id',$machine_parameter_id)->whereNull('deleted_at')->update([
                    'is_accumulator' => $request->is_accumulator,
                    'created_at' => Carbon::now(),
                ]);
                $mold_close_id = MoldClose::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                    'obstacle_check_tm' => $request->obstacle_check_tm,
                ]);
                MoldClose::where('id',$mold_close_id)->update(
                    $mold_close_request->validated()
                );
                $ejector_lub_id = EjectorLub::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                    'created_at' => Carbon::now(),
                ]);
                EjectorLub::where('id',$ejector_lub_id)->update(
                    $ejector_request->validated()
                );
                $mold_open_id = MoldOpen::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                    'tmp_stop_time' => $request->tmp_stop_time,
                    'tmp_stop_pos' => $request->tmp_stop_pos,
                    'created_at' => Carbon::now(),
                ]);
                MoldOpen::where('id',$mold_open_id)->update(
                    $mold_open_request->validated()
                );
                $heater_id = Heater::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                    'created_at' => Carbon::now(),
                ]);
                Heater::where('id',$heater_id)->update(
                    $heater_request->validated()
                );
                $injection_velocity_id = InjectionVelocity::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                    'inj_veloc_no'=> $request->inj_veloc_no,
                    'inj_press_no'=> $request->inj_press_no,
                    'inj_pp1_unit' => $request->inj_pp1_unit,
                    'inj_v1_unit'=> $request->inj_v1_unit,
                    'inj_tp2'=> $request->inj_tp2,
                    'inj_pos_pb_unit'=> $request->inj_pos_pb_unit,
                    'inj_pv1_unit'=> $request->inj_pv1_unit,
                    'created_at' => Carbon::now(),
                ]);
                InjectionVelocity::where('id',$injection_velocity_id)->update(
                    $injection_velocity_request->validated()
                );
                $injection_tab_id = InjectionTab::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                    'created_at' => Carbon::now(),
                ]);
                InjectionTab::where('id',$injection_tab_id)->update(
                    $injection_tab_request->validated()
                );
                /* */
            }
            // DB::rollback();
            DB::commit();
            return response()->json(['is_success' => 'true']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['is_success' => 'false', 'exceptionError' => $e->getMessage()]);
        }
    }

    public function saveMachineTwo(
        Request $request,MachineParameterRequest $machine_parameter_request,
        MoldCloseRequest $mold_close_request,EjectorRequest $ejector_request,
        MoldOpenRequest $mold_open_request,HeaterRequest $heater_request
        ,InjectionVelocityRequest $injection_velocity_request,SupportRequest $support_request
        ){
        date_default_timezone_set('Asia/Manila');
        DB::beginTransaction();
        try {
            if( isset($request->machine_parameter_id) || $request->machine_parameter_id != ''){ //Edit Machine Parameter
                MachineParameter::where('id',$request->machine_parameter_id)->whereNull('deleted_at')->update($machine_parameter_request->validated());
                MoldClose::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($mold_close_request->validated());
                EjectorLub::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($ejector_request->validated());
                MoldOpen::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($mold_open_request->validated());
                Heater::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($heater_request->validated());
                //This Support is for Machine 2 Requirement Only
                Support::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($support_request->validated());

            }else{ //Add Machine Parameter
                // return 'add';
                $validation = array(
                    //Form Injection Velocity
                    'inj_fill' => ['required','numeric'],
                    'inj_hold' => ['required','numeric'],
                    'inj_limit_v' => ['required','numeric'],
                    'inj_limit_p' => 'required',
                );
                $validator = Validator::make($request->all(), $validation);
                if ($validator->fails()) {
                    return response()->json(['result' => '0', 'errors' => $validator->messages()],422);
                }
                $machine_parameter_id = MachineParameter::insertGetId($machine_parameter_request->validated());
                MachineParameter::where('id',$machine_parameter_id)->whereNull('deleted_at')->update([
                    'created_at' => Carbon::now(),
                ]);
                $mold_close_id = MoldClose::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                    'created_at' => Carbon::now(),
                ]);
                MoldClose::where('id',$mold_close_id)->update(
                    $mold_close_request->validated()
                );
                $ejector_lub_id = EjectorLub::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                    'created_at' => Carbon::now(),
                ]);
                EjectorLub::where('id',$ejector_lub_id)->update(
                    $ejector_request->validated()
                );
                $mold_open_id = MoldOpen::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                    'created_at' => Carbon::now(),
                ]);
                MoldOpen::where('id',$mold_open_id)->update(
                    $mold_open_request->validated()
                );
                $heater_id = Heater::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                    'created_at' => Carbon::now(),
                ]);
                Heater::where('id',$heater_id)->update(
                    $heater_request->validated()
                );

                $injection_velocity_id = InjectionVelocity::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                    'inj_fill'=> $request->inj_fill,
                    'inj_hold'=> $request->inj_hold,
                    'inj_limit_v' => $request->inj_limit_v,
                    'inj_limit_p'=> $request->inj_limit_p,
                    'created_at' => Carbon::now(),
                ]);
                InjectionVelocity::where('id',$injection_velocity_id)->update(
                    $injection_velocity_request->validated()
                );
                $support_id = Support::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                    'created_at' => Carbon::now(),
                ]);
                Support::where('id',$support_id)->update(
                    $support_request->validated()
                );

            }
            // DB::rollback();
            DB::commit();
            return response()->json(['is_success' => 'true']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['is_success' => 'false', 'exceptionError' => $e->getMessage()]);
        }
    }

    public function editMachineParameter(Request $request){
        // return $request->all();
        date_default_timezone_set('Asia/Manila');
        try {
            $machine_parameter_id = $request->machine_parameter_id;

            $machine_parameter_detail =  MachineParameter::with(
                'mold_close','ejector_lub','mold_open',
                'heater','injection_velocity','injection_tab',
            )->where('id',$machine_parameter_id)->get();

            return response()->json([
                'is_success' => 'true',
                'machine_parameter_detail' => $machine_parameter_detail[0],
            ]);
        } catch (\Exception $e) {
            return response()->json(['is_success' => 'false', 'exceptionError' => $e->getMessage()]);
        }
    }

    public function editMachineParameterTwo(Request $request){
        // return $request->all();
        date_default_timezone_set('Asia/Manila');
        try {
            $machine_parameter_id = $request->machine_parameter_id;

            $machine_parameter_detail =  MachineParameter::with(
                'mold_close','ejector_lub',
                'mold_open','heater','support'
            )->where('id',$machine_parameter_id)->get();
            return response()->json([
                'is_success' => 'true',
                'machine_parameter_detail' => $machine_parameter_detail[0],
            ]);
        } catch (\Exception $e) {
            return response()->json(['is_success' => 'false', 'exceptionError' => $e->getMessage()]);
        }
    }
}
