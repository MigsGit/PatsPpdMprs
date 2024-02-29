<?php

namespace App\Http\Controllers;

use stdClass;
use App\Models\MoldClose;
use Illuminate\Http\Request;
use App\Models\MachineParameter;
use App\Models\MachineManagement;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MachineRequest;
use App\Http\Requests\MoldCloseRequest;
use App\Http\Requests\MachineParameterRequest;
use Illuminate\Database\Eloquent\Casts\ArrayObject;

class MachineParameterController extends Controller
{

    public function getMachineDetailsForm1(Request $request){
        $machine_details_1 = MachineManagement::
        where('status',1)
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

    public function saveMachineOne(Request $request,MachineParameterRequest $machine_parameter_request,MoldCloseRequest $mold_close_request){
        // return $request->all();
        // foreach ($mold_close_request->validated() as $key => $value) {
        //     # code...
        // }
        // var_dump($mold_close_request->validated());

        // return;
        date_default_timezone_set('Asia/Manila');
        DB::beginTransaction();
        try {
            $machine_parameter_id = MachineParameter::insertGetId($machine_parameter_request->validated());
            MachineParameter::where('id',$machine_parameter_id)->update([
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            $mold_close_id = MoldClose::insertGetId([
                'machine_parameter_id' => $machine_parameter_id
            ]);
            MoldClose::where('id',$mold_close_id)->update(
                $mold_close_request->validated()
            );
            // DB::rollback();
            DB::commit();
            return response()->json(['is_success' => 'true']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['is_success' => 'false', 'exceptionError' => $e->getMessage()]);
        }
    }


}