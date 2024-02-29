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
use App\Models\UserManagement;
use App\Models\RapidXUser;
use App\Models\RapidXDepartment;
use App\Models\MachineManagement;

class UserController extends Controller
{

    public function addUser(Request $request){
        date_default_timezone_set('Asia/Manila');
        session_start();

        // return $request->user_id;

        // return $_SESSION['rapidx_username'];
        $data = $request->all();

        $rules = [
            // 'emp_no'              => 'required',
            'name'           => 'required',
            'user_level'          => 'required',
            'username'          => 'required',
            'department'          => 'required',
            'email'          => 'required',
            'user_level'          => 'required'
        ];

        $validator = Validator::make($data, $rules);
        if($validator->passes()){
                $array = [
                    'status'        => 1,
                    'rapidx_id'     => $request->rapidx_user,
                    'employee_name'          => $request->name,
                    'username'         => $request->username,
                    'email' => $request->email,
                    'department' => $request->department,
                    'user_level'    => $request->user_level,
                    'created_at'    => date('Y-m-d H:i:s'),
                    // 'created_by' => $_SESSION['rapidx_username'],
                ];
                if(isset($request->user_id)){ // edit
                    UserManagement::where('id', $request->user_id)
                    ->update($array);
                }
                else{ // insert
                    UserManagement::insert($array);
                    
                }

                return response()->json(['result' => 0, 'message' => "SuccessFully Saved!"]);
            
        }
        else{
            return response()->json(['validation' => 1, "hasError", 'error' => $validator->messages()]);
        }
        

    }

    public function viewUsers(Request $request){
        $view_user_details = UserManagement::all();

        // return $test;
        return DataTables::of($view_user_details)

        ->addColumn('action', function($view_user_details){
            $result = '<center>';

            if($view_user_details['status'] == 1){
                $result .= "<button class='btn btn-info btn-sm btnEdit' btn-value='".$view_user_details['id']."'><i class='fas fa-edit'></i></button>";
                $result .= " ";
                $result .= "<button class='btn btn-danger btn-sm btnDelete' btn-value='".$view_user_details['id']."'><i class='fas fa-trash-alt'></i></button>";
            }
            else{
                $result .= "<button class='btn btn-success btn-sm btnRestore' btn-value='".$view_user_details['id']."'><i class='fas fa-redo'></i></button>";

            }
            // $result .= '<button type="button" class="btn btn-primary btn-sm text-center actionEditSummaryOfFindings" style="width:105px;margin:2%;" summaryfindings-id="' . $summary_of_findings->id . '" data-bs-toggle="modal" data-bs-target="#modalEditSummaryOfFindings" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Edit</button>&nbsp;';
            // $result .= '<button type="button" class="btn btn-warning btn-sm text-center actionEditSummaryOfFindingsStatus" style="width:105px;margin:2%;" summaryfindings-id="' . $summary_of_findings->id . '" data-bs-toggle="modal" data-bs-target="#modalEditSummaryOfFindingsStatus" data-keyboard="false"><i class="nav-icon fas fa-edit"></i> Deactivate</button>&nbsp;';

            $result .= '</center>';
            return $result;
        })

        ->addColumn("status", function($view_user_details){
            $result = "";
            $result .="<center>";
            if($view_user_details['status'] == 1){
                $result .= '<span class="badge rounded-pill bg-success">Active</span>';
            }
            else{
                $result = "<span class='badge rounded-pill bg-danger'>Deactivated</span>";
            }
            $result .= "</center>";

            return $result;
        })

        ->addColumn('user_level', function($view_user_details){
            $result = "";
           
            if($view_user_details['user_level'] == 1){
                $result = "Engineer";
            }
            else if($view_user_details['user_level'] == 2){
                $result = "Supervisor";
            }
            else if($view_user_details['user_level'] == 3){
                $result = "QC";
            }
            else if($view_user_details['user_level'] == 4){
                $result = "Technician";
            }
            else if($view_user_details['user_level'] == 5){
                $result = "Machine Operator";
            }
            return $result;
        })

        ->rawColumns(['action', "status", "user_level"]) // to format the added columns(status & action) as html format
        ->make(true);
    }

    public function getRapidxUsers(Request $request){
        $rapidxUsers = RapidXUser::with('department')->where('user_stat', '!=', 0)->get();
        // return $rapidxUsers;
        return response()->json(['rapidxUsers' => $rapidxUsers]);
    }

    public function getUserById(Request $request){
        $user_details = UserManagement::with([
            'rapidx_user'
        ])
        ->where('id', $request->user_id)->get();
        return response()->json(['userDetails' => $user_details]);
    }

    public function editUserStatus(Request $request){
        UserManagement::where('id', $request->id)
        ->update([
            'status' => 0,
        ]);

        return response()->json(['result' => 1]);
    }

    public function reactivateUserStatus(Request $request){
        UserManagement::where('id', $request->id)
        ->update([
            'status' => 1,
        ]);

        return response()->json(['result' => 1]);
    }

    public function getDataForDashboard(){
        date_default_timezone_set('Asia/Manila');
        $totalUsers = UserManagement::where('status', 1)->get();
        $totalMachines = MachineManagement::where('status', 1)->get();
        return response()->json([
            'totalUsers' => count($totalUsers), 
            'totalMachines' => count($totalMachines)
        ]);
    }

    public function getUserLogin(Request $request){
        $user_log = UserManagement::where('employee_name', $request->loginName)
        ->where('status', 1)
        ->get();

        // return $user_log;

        return response()->json(['result' => $user_log]);
    }
}
