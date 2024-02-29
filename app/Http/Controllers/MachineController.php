<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Auth; // or use Illuminate\Support\Facades\Auth;
use DataTables;

/**
 * Import Models here
 */
use App\Models\MachineManagement;

class MachineController extends Controller
{
    public function viewMachine(Request $request){
        $view_machine_details = MachineManagement::all();

        // return $test;
        return DataTables::of($view_machine_details)

        ->addColumn('action', function($view_machine_details){
            $result = '<center>';

            if($view_machine_details['status'] == 1){
                $result .= "<button class='btn btn-info btn-sm btnEdit' btn-value='".$view_machine_details['id']."'><i class='fas fa-edit'></i></button>";
                $result .= " ";
                $result .= "<button class='btn btn-danger btn-sm btnDelete' btn-value='".$view_machine_details['id']."'><i class='fas fa-trash-alt'></i></button>";
            }
            else{
                $result .= "<button class='btn btn-success btn-sm btnRestore' btn-value='".$view_machine_details['id']."'><i class='fas fa-redo'></i></button>";

            }
            // $result .= '<button type="button" class="btn btn-primary btn-sm text-center actionEditSummaryOfFindings" style="width:105px;margin:2%;" summaryfindings-id="' . $summary_of_findings->id . '" data-bs-toggle="modal" data-bs-target="#modalEditSummaryOfFindings" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit</button>&nbsp;';
            // $result .= '<button type="button" class="btn btn-warning btn-sm text-center actionEditSummaryOfFindingsStatus" style="width:105px;margin:2%;" summaryfindings-id="' . $summary_of_findings->id . '" data-bs-toggle="modal" data-bs-target="#modalEditSummaryOfFindingsStatus" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Deactivate</button>&nbsp;';

            $result .= '</center>';
            return $result;
        })

        ->addColumn("status", function($view_machine_details){
            $result = "";
            $result .="<center>";
            if($view_machine_details['status'] == 1){
                $result .= '<span class="badge rounded-pill bg-success">Active</span>';
            }
            else{
                $result = "<span class='badge rounded-pill bg-danger'>Deactivated</span>";
            }
            $result .= "</center>";

            return $result;
        })

        ->addColumn("category", function($view_machine_details){
            $result = "";
            if($view_machine_details['machine_category'] == 1){
                $result = "Form 1 (w/ Injection Tab)";
            }else{
                $result = "Form 2 (w/ Support Tab)";
            }

            return $result;
        })

        ->rawColumns(['action', "status", "category"]) // to format the added columns(status & action) as html format
        ->make(true);
    }

    public function addMachine(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        // return $request->user_id;

        // return $_SESSION['rapidx_username'];
        $data = $request->all();

        $rules = [
            // 'emp_no'              => 'required',
            'machine_name'           => 'required',
            'machine_category'          => 'required',
        ];

        $validator = Validator::make($data, $rules);
        if($validator->passes()){
                $array = [
                    'machine_name'     => $request->machine_name,
                    'machine_category' => $request->machine_category,
                    'status'        => 1,
                    'created_at'    => date('Y-m-d H:i:s'),
                    // 'created_by' => $_SESSION['rapidx_username'],
                ];
                if(isset($request->machine_id)){ // edit
                    MachineManagement::where('id', $request->machine_id)
                    ->update($array);
                }
                else{ // insert
                    MachineManagement::insert($array);

                }

                return response()->json(['result' => 0, 'message' => "SuccessFully Saved!"]);

        }
        else{
            return response()->json(['validation' => 1, "hasError", 'error' => $validator->messages()]);
        }


    }

    public function getMachineById(Request $request){
        $machine_details = MachineManagement::
        where('id', $request->machine_id)
        ->get();
        return response()->json(['machineDetails' => $machine_details]);
    }

    public function editMachineStatus(Request $request){
        MachineManagement::where('id', $request->machineId)
        ->update([
            'status' => 0,
        ]);

        return response()->json(['result' => 1]);
    }

    public function restoreMachineStatus(Request $request){
        MachineManagement::where('id', $request->machineId)
        ->update([
            'status' => 1,
        ]);

        return response()->json(['result' => 1]);
    }


}
