@extends('layouts.admin_layout')

@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Management</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Management</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="margin-top: 8px;">User Management</h3>
                                {{-- <button class="btn float-right reload"><i class="fas fa-sync-alt"></i></button> --}}
                            </div>
                            <div class="card-body">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab">User Lists</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="user" role="tabpanel">
                                        <div class="text-right mt-4">                   
                                            <button type="button" class="btn btn-primary mb-3" id="buttonAddUser" data-bs-toggle="modal" data-bs-target="#modalAddUser"><i class="fa fa-plus fa-md"></i> New User</button>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="tableUsers" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Status</th>
                                                        <th>Employee Name</th>
                                                        <th>Department</th>
                                                        <th>Username</th>
                                                        <th>User Level</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

       <!-- Add User Modal Start -->
       <div class="modal fade" id="modalAddUser" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Add User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddUser" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For User Id -->
                                    <input type="text" class="form-control" style="display: none" name="user_id" id="userId">
                                    
                                    <!-- For RapidX User Id -->
                                    <input type="text" class="form-control" style="display: none" name="rapidx_user_id" id="rapidxUserId">

                                    <!-- For Name -->
                                    <input type="text" class="form-control" readonly style="display: none" name="name" id="textName" placeholder="Name">
                                    
                                    <div class="mb-3">
                                        <label for="rapidx_user" class="form-label">Name<span class="text-danger" title="Required">*</span></label>
                                        <select class="form-select select2" id="rapidxUsers" name="rapidx_user">
                                            <!-- Auto Generated -->
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" readonly name="username" id="textUsername" placeholder="Username" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="text" class="form-control" readonly name="email" id="textEmail" placeholder="Email Address" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Department</label>
                                        <input type="text" class="form-control" readonly name="department" id="textDepartment" placeholder="Department" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="textUserLevel" class="form-label">User Level<span class="text-danger" title="Required">*</span></label>
                                        <select class="form-select" id="textUserLevel" name="user_level" required>
                                            <option value="0" selected disabled>-- SELECT --</option>
                                            <option value="1" >Engineer</option>
                                            <option value="2" >Supervisor</option>
                                            <option value="3" >QC</option>
                                            <option value="4" >Technician</option>
                                            <option value="5" >Machine Operator</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnAddUser" class="btn btn-primary"><i id="iBtnAddUserIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add User Modal End -->
   
    <!--     {{-- Edit User Status --}} -->
    <div class="modal fade" id="modalEditUserStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title" id="editUserStatusTitle"><i class="fas fa-info-circle"></i> Edit User Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <input type="hidden" id="textEditUserStatusUserId">
                    <h3>Are you sure you want to Deactivate this user?</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="buttonEditUserStatus" class="btn btn-danger"><i id="iBtnEditUserIcon" class="fa fa-check"></i> Yes</button>
                </div>

            </div>
        </div>
    </div> 
    <!--     {{-- Edit User Status END --}} -->

    <div class="modal fade" id="modalRestoreStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title" id="editUserAuthenticationTitle"><i class="fas fa-info-circle"></i></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <input type="hidden" id="restoreUserId">
                    <h3>Are you sure you want to restore this user?</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="btnRestore" class="btn btn-primary"><i id="" class="fa fa-check"></i> Yes</button>
                </div>

            </div>
        </div>
    </div>

@endsection

<!--     {{-- JS CONTENT --}} -->
@section('js_content')
    <script type="text/javascript">
        $(document).ready(function () {
            // Initialize Select2 Elements
            $('.select2').select2({
                theme: 'bootstrap-5'
            });

            dataTablesUsers = $("#tableUsers").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "language": {
                    "info": "Showing _START_ to _END_ of _TOTAL_ user records",
                    "lengthMenu": "Show _MENU_ user records",
                },
                "ajax" : {
                    url: "view_users",
                },
                "columns":[
                    { "data" : "action", orderable:false, searchable:false},
                    { "data" : "status"},
                    { "data" : "employee_name"},
                    { "data" : "department"},
                    { "data" : "username"},
                    { "data" : "user_level"},
                ],
            });
            
            getRapidxUsers($('#rapidxUsers'));
            
            $("select#rapidxUsers").on('change',function(){
                var selectedRapidxUserId = $(this).children("option:selected").attr('value');
                var selectedName = $(this).children("option:selected").attr('name');
                var selectedUsername = $(this).children("option:selected").attr('username');
                var selectedEmail = $(this).children("option:selected").attr('email');
                // var selectedDepartment = $(this).children("option:selected").attr('department');
                var selectedDepartmentGroup = $(this).children("option:selected").attr('department-group');

                $("input[name='rapidx_user_id']", $('#formAddUser')).val(selectedRapidxUserId);
                $('#textName').val(selectedName);
                $('#textUsername').val(selectedUsername);
                $('#textEmail').val(selectedEmail);
                $('#textDepartment').val(selectedDepartmentGroup);
            });

            $('#formAddUser').submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "add_user",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response){
                        if(response['validation'] == 1){
                            toastr.error('Saving user failed!');
                            if(response['error']['name'] === undefined){
                                $("#rapidxUsers").removeClass('is-invalid');
                                $("#rapidxUsers").attr('title', '');
                            }
                            else{
                                $("#rapidxUsers").addClass('is-invalid');
                                $("#rapidxUsers").attr('title', response['error']['name']);
                            }
                            if(response['error']['email'] === undefined){
                                $("#textEmail").removeClass('is-invalid');
                                $("#textEmail").attr('title', '');
                            }
                            else{
                                $("#textEmail").addClass('is-invalid');
                                $("#textEmail").attr('title', response['error']['email']);
                            }
                            if(response['error']['department'] === undefined){
                                $("#textDepartment").removeClass('is-invalid');
                                $("#textDepartment").attr('title', '');
                            }
                            else{
                                $("#textDepartment").addClass('is-invalid');
                                $("#textDepartment").attr('title', response['error']['department']);
                            }
                            if(response['error']['user_level'] === undefined){
                                $("#textUserLevel").removeClass('is-invalid');
                                $("#textUserLevel").attr('title', '');
                            }
                            else{
                                $("#textUserLevel").addClass('is-invalid');
                                $("#textUserLevel").attr('title', response['error']['user_level']);
                            }
                            if(response['error']['username'] === undefined){
                                $("#textUsername").removeClass('is-invalid');
                                $("#textUsername").attr('title', '');
                            }
                            else{
                                $("#textUsername").addClass('is-invalid');
                                $("#textUsername").attr('title', response['error']['username']);
                            }
                        }else if(response['result'] == 0){
                            $("#formAddUser")[0].reset();
                            toastr.success('Succesfully saved!');
                            $('#modalAddUser').modal('hide');
                            dataTablesUsers.draw();
                        }

                        $("#btnAddUserIcon").removeClass('spinner-border spinner-border-sm');
                        $("#btnAddUser").removeClass('disabled');
                        $("#btnAddUserIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status){
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    }
                });
            });

            $(document).on('click', '.btnEdit', function(){
                $('#modalAddUser').modal('show');
                let userId = $(this).attr('btn-value')
                $('#userId').val(userId);

                // console.log(userId);

                getUserDetailsForEdit(userId);

                if(typeof(userId) != "undefined" && userId !== null) {
                    // $("#textEmail").attr("readonly", false); 
                    $("#textDepartment").attr("readonly", false); 
                    $("#textUsername").attr("readonly", false); 
                    $("#textEmail").attr("readonly", false); 
                }else{
                    // $("#textEmail").attr("readonly", true); 
                    $("#textDepartment").attr("readonly", true); 
                    $("#textUsername").attr("readonly", true); 
                    $("#textEmail").attr("readonly", true); 
                }
            });

            $(document).on('click', '.btnDelete', function(){
                $('#modalEditUserStatus').modal('show');
                let userId = $(this).attr('btn-value')
                $('#textEditUserStatusUserId').val(userId);
                // getUserDetailsForEdit(userId);

            });


            $('#buttonEditUserStatus').on('click', function(){
                let userId = $('#textEditUserStatusUserId').val();
                $.ajax({
                    type: "get",
                    url: "edit_user_status",
                    data: {
                        'id' : userId
                    },
                    dataType: "json",
                    success: function (response) {
                        toastr.success('User Deactivated!');
                        $('#modalEditUserStatus').modal('hide');
                        dataTablesUsers.draw();
                    }
                });
            });

            $(document).on('click', '.btnRestore', function(){
                let empId = $(this).attr('btn-value');
                $('#modalRestoreStatus').modal('show');
                $('#restoreUserId').val(empId);
            });

            $('#btnRestore').on('click', function(){
                let empId = $('#restoreUserId').val();
                $.ajax({
                    type: "get",
                    url: "reactivate_account",
                    data: {
                        'id' : empId
                    },
                    dataType: "json",
                    success: function (response) {
                        toastr.success('User Reactivated!');
                        $('#modalRestoreStatus').modal('hide');
                        dataTablesUsers.draw();
                    }
                });
            });

            function resetFormValues() {
                // Reset values
                $("#formAddUser")[0].reset();
                $('#rapidxUsers').val('0').trigger('change');
                $('#textUserLevel').val('0').trigger('change');
                // $(".modal-body").html("");
                // console.log('pumasok dito');

                // Reset hidden input fields
                // $("select[name='user_level']", $('#formAddUser')).val(0).trigger('change');

                // Remove invalid & title validation
                $('div').find('input').removeClass('is-invalid');
                $("div").find('input').attr('title', '');
                $('div').find('select').removeClass('is-invalid');
                $("div").find('select').attr('title', '');
            }

            $("#modalAddUser").on('hidden.bs.modal', function () {
                console.log('hidden.bs.modal');
                resetFormValues();
            });


        });
    </script>
@endsection

