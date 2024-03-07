<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\Heater;
use App\Models\MoldOpen;
use App\Models\MoldClose;
use App\Models\EjectorLub;
use Illuminate\Http\Request;
use App\Models\MachineParameter;
use Yajra\DataTables\DataTables;
use App\Models\InjectionVelocity;
use App\Models\MachineManagement;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HeaterRequest;
use App\Http\Requests\EjectorRequest;
use App\Http\Requests\MachineRequest;
use App\Http\Requests\MoldOpenRequest;
use App\Http\Requests\MoldCloseRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\MachineParameterRequest;
use App\Http\Requests\EnjectionVelocityRequest;
use App\Http\Requests\InjectionVelocityRequest;
use Illuminate\Database\Eloquent\Casts\ArrayObject;

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

    // public function saveMachineOne(
    //     Request $request,MachineParameterRequest $machine_parameter_request,
    //     MoldCloseRequest $mold_close_request,EjectorRequest $ejector_request,
    //     MoldOpenRequest $mold_open_request,HeaterRequest $heater_request
    // ){
    public function saveMachineOne(Request $request,MachineParameterRequest $machine_parameter_request,InjectionVelocityRequest $injection_velocity_request){
        // return $machine_parameter_request->validated();
        date_default_timezone_set('Asia/Manila');
        DB::beginTransaction();
        try {
            if( isset($request->machine_parameter_id) || $request->machine_parameter_id != ''){ //Edit Machine Parameter
                MachineParameter::where('id',$request->machine_parameter_id)->whereNull('deleted_at')->update($machine_parameter_request->validated());
                MoldClose::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($mold_close_request->validated());
                EjectorLub::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($ejector_request->validated());
                MoldOpen::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($mold_open_request->validated());
                Heater::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($heater_request->validated());
                InjectionVelocity::where('machine_parameter_id',$request->machine_parameter_id)->whereNull('deleted_at')->update($injection_velocity_request->validated());
            }else{ //Add Machine Parameter

                // $validation = array(
                //     'obstacle_check_tm' => ['required','numeric'],
                //     'tmp_stop_time' => ['required','numeric'],
                //     'tmp_stop_pos' => ['required','numeric'],
                //     'is_accumulator' => 'required',
                // );

                // $validator = Validator::make($request->all(), $validation);
                // if ($validator->fails()) {
                //     return response()->json(['result' => '0', 'errors' => $validator->messages()],422);
                // }

                $machine_parameter_id = MachineParameter::insertGetId($machine_parameter_request->validated());
                MachineParameter::where('id',$machine_parameter_id)->whereNull('deleted_at')->update([
                    'created_at' => date('Y-m-d H:i:s'),
                ]);

                // $mold_close_id = MoldClose::insertGetId([
                //     'machine_parameter_id' => $machine_parameter_id
                // ]);
                // MoldClose::where('id',$mold_close_id)->update(
                //     $mold_close_request->validated()
                // );
                // $ejector_lub_id = EjectorLub::insertGetId([
                //     'machine_parameter_id' => $machine_parameter_id,
                // ]);
                // EjectorLub::where('id',$ejector_lub_id)->update(
                //     $ejector_request->validated()
                // );
                // $mold_open_id = MoldOpen::insertGetId([
                //     'machine_parameter_id' => $machine_parameter_id,
                // ]);
                // MoldOpen::where('id',$mold_open_id)->update(
                //     $mold_open_request->validated()
                // );
                // $heater_id = Heater::insertGetId([
                //     'machine_parameter_id' => $machine_parameter_id,
                // ]);
                // Heater::where('id',$heater_id)->update(
                //     $heater_request->validated()
                // );
                $injection_velocity_id = InjectionVelocity::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                ]);
                InjectionVelocity::where('id',$injection_velocity_id)->update(
                    $injection_velocity_request->validated()
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

    public function saveMachineTwo(
        Request $request,MachineParameterRequest $machine_parameter_request,
        MoldCloseRequest $mold_close_request,EjectorRequest $ejector_request,
        MoldOpenRequest $mold_open_request,HeaterRequest $heater_request
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
            }else{ //Add Machine Parameter
                $machine_parameter_id = MachineParameter::insertGetId($machine_parameter_request->validated());
                MachineParameter::where('id',$machine_parameter_id)->whereNull('deleted_at')->update([
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
                $mold_close_id = MoldClose::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id
                ]);
                MoldClose::where('id',$mold_close_id)->update(
                    $mold_close_request->validated()
                );
                $ejector_lub_id = EjectorLub::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                ]);
                EjectorLub::where('id',$ejector_lub_id)->update(
                    $ejector_request->validated()
                );
                $mold_open_id = MoldOpen::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                ]);
                MoldOpen::where('id',$mold_open_id)->update(
                    $mold_open_request->validated()
                );
                $heater_id = Heater::insertGetId([
                    'machine_parameter_id' => $machine_parameter_id,
                ]);
                Heater::where('id',$heater_id)->update(
                    $heater_request->validated()
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

            $machine_parameter_detail =  MachineParameter::with('mold_close','ejector_lub','mold_open','heater','injection_velocity')->where('id',$machine_parameter_id)->get();
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

            $machine_parameter_detail =  MachineParameter::with('mold_close','ejector_lub','mold_open','heater')->where('id',$machine_parameter_id)->get();
            return response()->json([
                'is_success' => 'true',
                'machine_parameter_detail' => $machine_parameter_detail[0],
            ]);
        } catch (\Exception $e) {
            return response()->json(['is_success' => 'false', 'exceptionError' => $e->getMessage()]);
        }
    }




}
