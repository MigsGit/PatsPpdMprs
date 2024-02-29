@extends('layouts.admin_layout')

@section('title', 'Dashboard')
@section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Machine Management</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Machine Management</li>
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
                                <h3 class="card-title" style="margin-top: 8px;">Machine Management</h3>
                                {{-- <button class="btn float-right reload"><i class="fas fa-sync-alt"></i></button> --}}
                            </div>
                            <div class="card-body">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#machine" type="button" role="tab">Machine Lists</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="machine" role="tabpanel">
                                        <div class="text-right mt-4">
                                            <button type="button" class="btn btn-primary mb-3" id="buttonAddMachine" data-bs-toggle="modal" data-bs-target="#modalAddMachine"><i class="fa fa-plus fa-md"></i> Add Machine</button>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="tableMachineList" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Status</th>
                                                        <th>Machine Name</th>
                                                        <th>Machine Form Category</th>
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
       <div class="modal fade" id="modalAddMachine" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Add Machine</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="formAddMachine" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For Machine Id -->
                                    <input type="text" class="form-control" style="display: none" name="machine_id" id="machineId">

                                    <div class="mb-3">
                                        <label for="machine_name" class="form-label">Machine Name</label>
                                        <input type="text" class="form-control" name="machine_name" id="textMachineName" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="textMachineCategory" class="form-label">Machine Category<span class="text-danger" title="Required">*</span></label>
                                        <select class="form-select" id="textMachineCategory" name="machine_category" required>
                                            <option value="0" selected disabled>-- SELECT --</option>
                                            <option value="1" >Form 1</option>
                                            <option value="2" >Form 2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnAddMachine" class="btn btn-primary"><i id="ibtnAddMachineIcon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- Add User Modal End -->

    <!--     {{-- Edit Machine Status --}} -->
    <div class="modal fade" id="modalEditMachineStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title" id="editMachineStatusTitle"><i class="fas fa-info-circle"></i> Edit Machine Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <input type="hidden" id="textEditMachineStatusMachineId">
                    <h3>Are you sure you want to Deactivate this Machine?</h3>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="buttonEditMachineStatus" class="btn btn-danger"><i id="iBtnEditMachineIcon" class="fa fa-check"></i> Yes</button>
                </div>

            </div>
        </div>
    </div>
    <!--     {{-- Edit Machine Status END --}} -->

    <div class="modal fade" id="modalRestoreStatus" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title" id="editMachineAuthenticationTitle"><i class="fas fa-info-circle"></i></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <input type="hidden" id="restoreMachineId">
                    <h3>Are you sure you want to restore this Machine?</h3>
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

            dataTablesMachineList = $("#tableMachineList").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "language": {
                    "info": "Showing _START_ to _END_ of _TOTAL_ user records",
                    "lengthMenu": "Show _MENU_ user records",
                },
                "ajax" : {
                    url: "view_machine",
                },
                "columns":[
                    { "data" : "action", orderable:false, searchable:false},
                    { "data" : "status"},
                    { "data" : "machine_name"},
                    { "data" : "category"},
                ],
                'columnDefs': [
                    {
                        "targets": [0,1,2,3], // your case first column
                        "className": "text-center",
                        "width": "4%"
                    },
                ],
            });

            $('#formAddMachine').submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "add_machine",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response){
                        if(response['validation'] == 1){
                            toastr.error('Saving user failed!');
                            if(response['error']['name'] === undefined){
                                $("#textMachineName").removeClass('is-invalid');
                                $("#textMachineName").attr('title', '');
                            }
                            else{
                                $("#textMachineName").addClass('is-invalid');
                                $("#textMachineName").attr('title', response['error']['machine_name']);
                            }
                            if(response['error']['email'] === undefined){
                                $("#textMachineCategory").removeClass('is-invalid');
                                $("#textMachineCategory").attr('title', '');
                            }
                            else{
                                $("#textMachineCategory").addClass('is-invalid');
                                $("#textMachineCategory").attr('title', response['error']['machine_category']);
                            }
                        }else if(response['result'] == 0){
                            $("#formAddMachine")[0].reset();
                            toastr.success('Succesfully saved!');
                            $('#modalAddMachine').modal('hide');
                            dataTablesMachineList.draw();
                        }

                        $("#ibtnAddMachineIcon").removeClass('spinner-border spinner-border-sm');
                        $("#btnAddMachine").removeClass('disabled');
                        $("#ibtnAddMachineIcon").addClass('fa fa-check');
                    },
                    error: function(data, xhr, status){
                        toastr.error('An error occured!\n' + 'Data: ' + data + "\n" + "XHR: " + xhr + "\n" + "Status: " + status);
                    }
                });
            });

            $(document).on('click', '.btnEdit', function(){
                $('#modalAddMachine').modal('show');
                let machineId = $(this).attr('btn-value')
                $('#machineId').val(machineId);

                // console.log(machineId);

                getMachineDetailsForEdit(machineId);

                if(typeof(machineId) != "undefined" && machineId !== null) {
                    $("#textMachineName").attr("readonly", false);
                    $("#textMachineCategory").attr("readonly", false);
                }else{
                    $("#textMachineName").attr("readonly", true);
                    $("#textMachineCategory").attr("readonly", true);
                }
            });

            $(document).on('click', '.btnDelete', function(){
                $('#modalEditMachineStatus').modal('show');
                let machineId = $(this).attr('btn-value')
                $('#textEditMachineStatusMachineId').val(machineId);
            });

            $('#buttonEditMachineStatus').on('click', function(){
                let machineId = $('#textEditMachineStatusMachineId').val();
                $.ajax({
                    type: "get",
                    url: "edit_machine_status",
                    data: {
                        'machineId' : machineId
                    },
                    dataType: "json",
                    success: function (response) {
                        toastr.success('Machine Deactivated!');
                        $('#modalEditMachineStatus').modal('hide');
                        dataTablesMachineList.draw();
                    }
                });
            });

            $(document).on('click', '.btnRestore', function(){
                let machineId = $(this).attr('btn-value');
                $('#modalRestoreStatus').modal('show');
                $('#restoreMachineId').val(machineId);
            });

            $('#btnRestore').on('click', function(){
                let machineId = $('#restoreMachineId').val();
                $.ajax({
                    type: "get",
                    url: "reactivate_machine",
                    data: {
                        'machineId' : machineId
                    },
                    dataType: "json",
                    success: function (response) {
                        toastr.success('User Reactivated!');
                        $('#modalRestoreStatus').modal('hide');
                        dataTablesMachineList.draw();
                    }
                });
            });


        });
    </script>
@endsection

