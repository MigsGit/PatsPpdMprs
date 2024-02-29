<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MachineParameter;
use App\Models\MachineManagement;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MachineRequest;
use App\Http\Requests\MachineParameterRequest;

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

    public function saveMachineOne(Request $request,MachineParameterRequest $machineParameterRequest){
        return $request->all();
        date_default_timezone_set('Asia/Manila');
        DB::beginTransaction();
        try {
            $machine_parameter_id = MachineParameter::insertGetId($machine_parameter_request->validated());
            MachineParameter::where('id',$machine_parameter_id)
                            ->update([
                                'created_at' => date('Y-m-d H:i:s'),
                            ]);
            // DB::rollback();
            DB::commit();
            return response()->json(['is_success' => 'true']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['is_success' => 'false', 'exceptionError' => $e->getMessage()]);
        }
    }


}
