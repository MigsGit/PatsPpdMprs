    @extends('layouts.admin_layout')

    @section('title', 'Dashboard')
    @section('content_page')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Machine Parameter</h1>
                    </div>
                    <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Machine Parameter</li>
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
                                <h3 class="card-title" style="margin-top: 8px;">Machine Parameter</h3>
                                {{-- <button class="btn float-right reload"><i class="fas fa-sync-alt"></i></button> --}}
                            </div>
                            <div class="card-body">

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#MachineParameter" type="button" role="tab">Form 1</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#machineParameterForm2" type="button" role="tab">Form 2</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="MachineParameter" role="tabpanel">
                                        <div class="text-right mt-4">
                                            <button type="button" class="btn btn-primary mb-3" id="btnAddMachine1" data-bs-toggle="modal" data-bs-target="#modalAddMachine1"><i class="fa fa-plus fa-md"></i> Add Machine Parameter</button>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="tableMachineParameter_form1" class="table table-bordered table-hover nowrap" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Status</th>
                                                        <th>Machine Name</th>
                                                        <th>Device Name</th>
                                                        <th>Material Name</th>
                                                        <th>Machine No.</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="machineParameterForm2" role="tabpanel" aria-labelledby="tabmachineParameterForm2">
                                        <div style="float: right;">
                                            <div class="text-right mt-4">
                                                <button type="button" class="btn btn-primary mb-3" id="btnAddMachine2" data-bs-toggle="modal" data-bs-target="#modalAddMachine2"><i class="fa fa-plus fa-md"></i> Add Machine Parameter</button>
                                            </div>
                                        </div> <br><br>
                                        <div class="table-responsive">
                                            <table id="tableMachineParameter_form2" class="table table-sm table-bordered table-striped table-hover" style="width: 100%;">
                                                <thead>
                                                    <tr style="text-align:center">
                                                        <th>Action</th>
                                                        <th>Status</th>
                                                        <th>Machine Name</th>
                                                        <th>Device Name</th>
                                                        <th>Material Name</th>
                                                        <th>Machine No.</th>
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
    <div class="modal fade" id="modalAddMachine1" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Add Machine Parameter</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formAddMachine1" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <!-- For User Id -->
                        {{----}}
                                <input type="text" name="machine_parameter_id" id="machineParameterId">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4">
                                            <label for="selectMachine" class="form-label"> Machine<span class="text-danger" title="Required">*</span></label>
                                            <div>
                                                <select class="form-select select2" id="selectMachine1" name="machine_id">
                                                    <!-- Auto Generated -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label class="form-label">Accumulator<span class="text-danger" title="Required">*</span></label>
                                            <div>
                                                <input type="radio" id="with" name="is_accumulator" value="1">
                                                <label for="with">With</label>
                                                <div style="display: inline-block; margin-left:103px;"></div>
                                                <input type="radio" id="without" name="is_accumulator" value="2">
                                                <label for="without">Without</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textDateCreated" class="form-label">Date Created<span class="text-danger" title="Required">*</span></label>
                                            <input type="text" class="form-control" name="date_created" id="textDateCreated" placeholder="Auto-generated" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textDeviceName" class="form-label">Device Name<span class="text-danger" title="Required">*</span></label>
                                            <input type="text" class="form-control" name="device_name" id="textDeviceName" placeholder="Device Name">
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textDeviceName" class="form-label">No. Of Cavity<span class="text-danger" title="Required">*</span></label>
                                            <input min="0" type="number" class="form-control" name="no_of_cavity" id="textNoOfCavity" placeholder="No. Of Cavity">
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textMaterialMixingRatio" class="form-label">Material Mixing Ratio<span class="text-danger" title="Required">*</span></label>
                                            <div class="d-flex">
                                                <input min="0" type="number" class="form-control" name="material_mixing_ratio_v" id="textMaterialMixingRatio" placeholder=" % V">
                                                <input min="0" type="number" class="form-control" name="material_mixing_ratio_r" id="textMaterialMixingRatio" placeholder=" % R">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textMaterialName" class="form-label">Material Name<span class="text-danger" title="Required">*</span></label>
                                            <input type="text" class="form-control" name="material_name" id="textMaterialName" placeholder="Material Name">

                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textColor" class="form-label">Color<span class="text-danger" title="Required">*</span></label>
                                            <input type="text" class="form-control" name="color" id="textColor" placeholder="Color">

                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label class="form-label">Dryer Used<span class="text-danger" title="Required">*</span></label>
                                            <div>
                                                <input type="radio" id="dryerOven" name="dryer_used" value="1">
                                                <label for="dryerOven">Oven</label>
                                                <div style="display: inline-block; margin-left:103px;"></div>
                                                <input type="radio" id="dryerDHD" name="dryer_used" value="2">
                                                <label for="dryerDHD">DHD</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textMachineNo" class="form-label">Machine No.<span class="text-danger" title="Required">*</span></label>
                                            <input min="0" type="number" class="form-control" name="machine_no" id="textMachineNo" placeholder="Machine No.">

                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textShotWeight" class="form-label">Shot Weight<span class="text-danger" title="Required">*</span></label>
                                            <input min="0" class="form-control" name="shot_weight" id="textShotWeight" placeholder="Shot Weight">

                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textUnitWeight" class="form-label">Unit Weight<span class="text-danger" title="Required">*</span></label>
                                            <input min="0" type="number" class="form-control" name="unit_weight" id="textUnitWeight" placeholder="Unit Weight">
                                        </div>
                                    </div>

                                    <br>

                                    <div class="accordion" id="accordionExample">
                                        {{-- <div class="card">
                                            <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" id="moldCloseId"data-bs-toggle="collapse"data-bs-target="#moldClose" aria-expanded="true" aria-controls="moldClose">
                                                        MOLD CLOSE
                                                        </button>
                                                    </h5>
                                            </div>

                                                    <div id="moldClose" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textHiV" class="form-label">HI V.<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="hi_v" id="textHiV" placeholder="%">

                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textMidSlow" class="form-label">MID SLOW<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="mid_slow" id="textMidSlow" placeholder="%">

                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textLowL" class="form-label">LOW L<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="low_l" id="textLowL" placeholder="%">

                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textObstacleCheckTm" class="form-label">OBSTACLE CHECK TM<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="obstacle_check_tm" id="textObstacleCheckTm" placeholder="">
                                                                </div>

                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textSlowStart" class="form-label">SlOW START<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="slow_start" id="textSlowStart" placeholder="mm">
                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textSlowEnd" class="form-label">SLOW END<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="slow_end" id="textSlowEnd" placeholder="mm">

                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textLvlP" class="form-label">LVLP<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="lvlp" id="textLvlP" placeholder="mm">

                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textHpcl" class="form-label">HPCL<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="hpcl" id="textHpcl" placeholder="mm">
                                                                </div>

                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textMidSlp" class="form-label">MID SL P.<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="mid_sl_p" id="textMidSlp" placeholder="%">
                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textLowP" class="form-label">LOW P.<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="low_p" id="textLowP" placeholder="%">

                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textHiP" class="form-label">HI P.<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="hi_p" id="textHiP">
                                                                </div>

                                                                <div class="col-md-6 col-lg-4 mt-5">
                                                                    <div>
                                                                        <input type="radio" id="HiPton" name="hi_p_unit" value="1">
                                                                        <label for="HiPton">Ton</label>
                                                                        <div style="display: inline-block; margin-left:103px;"></div>
                                                                        <input type="radio" id="HiPPercent" name="hi_p_unit" value="2">
                                                                        <label for="HiPPercent">%</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="card">
                                                <div class="card-header" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        EJECTOR
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                    <div class="card-body">

                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <label for="textEjPres" class="form-label">EJ PRES<span class="text-danger" title="Required">*</span></label>
                                                                <input min="0" type="number" class="form-control" name="ej_pres" id="textEjPres" placeholder="%">
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <label for="textFwdEv1" class="form-label">FWD EV1<span class="text-danger" title="Required">*</span></label>
                                                                <input min="0" type="number" class="form-control" name="fwd_ev1" id="textFwdEv1" placeholder="%">

                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <label for="textFwdEv2" class="form-label">FWD EV2<span class="text-danger" title="Required">*</span></label>
                                                                <input min="0" type="number" class="form-control" name="fwd_ev2" id="textFwdEv2" placeholder="%">

                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <label for="textFwdEv2" class="form-label">FWD STOP<span class="text-danger" title="Required">*</span></label>
                                                                <input min="0" type="number" class="form-control" name="fwd_stop" id="textFwdStop" placeholder="mm">
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <label for="textBwdStop" class="form-label">BWD STOP<span class="text-danger" title="Required">*</span></label>
                                                                <input min="0" type="number" class="form-control" name="bwd_stop" id="textBwdStop" placeholder="mm">
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <label for="textCount" class="form-label">COUNT<span class="text-danger" title="Required">*</span></label>
                                                                <input min="0" type="number" class="form-control" name="count" id="textCount" placeholder="">
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <label for="textPattern" class="form-label">PATTERN<span class="text-danger" title="Required">*</span></label>
                                                                <input min="0" type="number" class="form-control" name="pattern" id="textPattern" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    MOLD OPEN
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-4">
                                                            <label for="textOpenEndV" class="form-label">OPEN END V.<span class="text-danger" title="Required">*</span></label>
                                                            <input min="0" type="number" step="0.01" class="form-control" name="open_end_v" id="textOpenEndV" placeholder="mm">
                                                        </div>
                                                        <div class="col-md-6 col-lg-4">
                                                            <label for="textHiVelocity2" class="form-label">HI VELOCITY 2<span class="text-danger" title="Required">*</span></label>
                                                            <input min="0" type="number" step="0.01" class="form-control" name="hi_velocity_2" id="textHiVelocity2" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-4">
                                                            <label for="textHiVelocity1Percent" class="form-label">HI VELOCITY 1<span class="text-danger" title="Required">*</span></label>
                                                            <input min="0" type="number" step="0.01" class="form-control" name="hi_velocity_1_percent" id="c" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-4">
                                                            <label for="textOpenV" class="form-label">OPEN V<span class="text-danger" title="Required">*</span></label>
                                                            <input min="0" type="number" step="0.01" class="form-control" name="open_v" id="textOpenV" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-4">
                                                            <label for="textTmpStopTime" class="form-label">TMP STOP TIME<span class="text-danger" title="Required">*</span></label>
                                                            <input min="0" type="number" step="0.01" class="form-control" name="tmp_stop_time" id="textTmpStopTime" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-4">
                                                            <label for="textOpenStop" class="form-label">OPEN STOP<span class="text-danger" title="Required">*</span></label>
                                                            <input min="0" type="number" step="0.01" class="form-control" name="open_stop" id="textOpenStop" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-4">
                                                            <label for="textLowDistance" class="form-label">LOW DISTANCE<span class="text-danger" title="Required">*</span></label>
                                                            <input min="0" type="number" step="0.01" class="form-control" name="low_distance" id="textLowDistance" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-4">
                                                            <label for="textHiVelocity1mm" class="form-label">HI VELOCITY 1<span class="text-danger" title="Required">*</span></label>
                                                            <input min="0" type="number" step="0.01" class="form-control" name="hi_velocity_1mm" id="textHiVelocity1mm" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-4">
                                                            <label for="textTmpStopPos" class="form-label">TMP STOP POS<span class="text-danger" title="Required">*</span></label>
                                                            <input min="0" type="number" step="0.01" class="form-control" name="tmp_stop_pos" id="textTmpStopPos" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                    HEATER
                                                </button>
                                                </h5>
                                            </div>
                                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-2">
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <label for="textHotSprueSet" class="form-label">HOT SPRUE<span class="text-danger" title="Required">*</span></label>
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <label for="textNozzleSet" class="form-label">NOZZLE<span class="text-danger" title="Required">*</span></label>
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <label for="textFrontSet" class="form-label">FRONT<span class="text-danger" title="Required">*</span></label>
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <label for="textMidSet" class="form-label">MID<span class="text-danger" title="Required">*</span></label>
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <label for="textRearSet" class="form-label">REAR<span class="text-danger" title="Required">*</span></label>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-2" id="setId" style="font-weight: bold">
                                                            SET
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <input min="0" type="number" step="0.01" class="form-control" name="hot_sprue_set" id="textHotSprueSet" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <input min="0" type="number" step="0.01" class="form-control" name="nozzle_set" id="textNozzleSet" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <input min="0" type="number" step="0.01" class="form-control" name="front_set" id="textFrontSet" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <input min="0" type="number" step="0.01" class="form-control" name="mid_set" id="textMidSet" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <input min="0" type="number" step="0.01" class="form-control" name="rear_set" id="textRearSet" placeholder="">
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-2" id="setId" style="font-weight: bold">
                                                            ACTUAL
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <input min="0" type="number" step="0.01" class="form-control" name="hot_sprue_actual" id="textHotSprueActual" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <input min="0" type="number" step="0.01" class="form-control" name="nozzle_actual" id="textNozzleActual" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <input min="0" type="number" step="0.01" class="form-control" name="front_actual" id="textFrontActual" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <input min="0" type="number" step="0.01" class="form-control" name="mid_actual" id="textMidActual" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <input min="0" type="number" step="0.01" class="form-control" name="rear_actual" id="textRearActual" placeholder="">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-2">
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <label for="textHotSprueSet" class="form-label">MOLD 1<span class="text-danger" title="Required">*</span></label>
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <label for="textNozzleSet" class="form-label">MOLD 2<span class="text-danger" title="Required">*</span></label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-2" id="setId" style="font-weight: bold">
                                                            MOLD HEATER
                                                        </div>
                                                        <div class="col-md-6 col-lg-2" id="setId" style="font-weight: bold">
                                                            SET
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <input min="0" type="number" step="0.01" class="form-control" name="mold_one_set" id="textHotSprueSet" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <input min="0" type="number" step="0.01" class="form-control" name="mold_two_set" id="textNozzleSet" placeholder="">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-2 mb-3" id="setId" style="font-weight: bold">
                                                        </div>
                                                        <div class="col-md-6 col-lg-2 mb-3" id="setId" style="font-weight: bold">
                                                            ACTUAL
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <input min="0" type="number" step="0.01" class="form-control" name="mold_one_actual" id="moldOneActual" placeholder="">
                                                        </div>
                                                        <div class="col-md-6 col-lg-2">
                                                            <input min="0" type="number" step="0.01" class="form-control" name="mold_two_actual" id="moldTwoActual" placeholder="">
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                        </div> --}}

                                        {{-- INJECTION VELOCITY --}}
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" id="injectionVelocityId"data-bs-toggle="collapse"data-bs-target="#injectionVelocity" aria-expanded="true" aria-controls="injectionVelocity">
                                                        INJECTION VELOCITY
                                                        </button>
                                                    </h5>
                                            </div>
                                                <div id="injectionVelocity" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <label for="numInjectionTime" class="form-label">INJECTION TIME<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="injection_time" id="numInjectionTime">
                                                                    <div class="input-group-prepend w-30">
                                                                        <span class="input-group-text w-100" id="basic-addon1">sec</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <label for="numCoolingTime" class="form-label">COOLING TIME<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="cooling_time" id="numCoolingTime">
                                                                    <div class="input-group-prepend w-30">
                                                                        <span class="input-group-text w-100" id="basic-addon1">sec</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <label for="numCycleStart" class="form-label">CYCLE START<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="cycle_start" id="numCycleStart">
                                                                    <div class="input-group-prepend w-30">
                                                                        <span class="input-group-text w-100" id="basic-addon1">sec</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numV6" class="form-label">V6<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_v6" id="numV6">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numV5" class="form-label">V5<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_v5" id="numV5">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numV4" class="form-label">V4<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_v4" id="numV4">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="nunumV3mLvlP" class="form-label">V3<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_v3" id="numV3">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numV2" class="form-label">V2<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_v2" id="numV2">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numV1" class="form-label">V1<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_v1" id="numV1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3 mt-5">
                                                                <div>
                                                                    <input type="radio" id="v1Mm" name="v1_unit" value="1">
                                                                    <label for="v1Mm">mm/S</label>
                                                                    <div style="display: inline-block; margin-left:103px;"></div>
                                                                    <input type="radio" id="v1Percent" name="v1_unit" value="2">
                                                                    <label for="v1Percent">%</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numVelocNo" class="form-label">VELOC. NO<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_veloc_no" id="numVelocNo">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numSv5" class="form-label">SV5<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_sv5" id="numSv5">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numSv4" class="form-label">SV4<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_sv4" id="numSv4">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numSv3" class="form-label">SV3<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_sv3" id="numSv3">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numSv2" class="form-label">SV2<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_sv2" id="numSv2">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numSv1" class="form-label">SV1<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_sv1" id="numSv1">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numSM" class="form-label">SM<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_sm" id="numSM">
                                                                    <div class="input-group-prepend w-30">
                                                                        <span class="input-group-text w-100" id="basic-addon1">mm</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numSd" class="form-label">SC<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_sd" id="numSd">
                                                                    <div class="input-group-prepend w-30">
                                                                        <span class="input-group-text w-100" id="basic-addon1">mm</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-lg-3">
                                                            <label for="numMidSlp" class="form-label">HOLDING PRESSURE</label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numPp3" class="form-label">Pp3<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_pp3" id="numPp3">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numPp2" class="form-label">Pp2<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_pp2" id="numPp2">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numPp1" class="form-label">Pp1<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_pp1" id="numPp1">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3 mt-5">
                                                                <div>
                                                                    <input type="radio" id="pp1KgCm" name="inj_pp1_unit" value="1">
                                                                    <label for="pp1KgCm">kg/cm2</label>
                                                                    <div style="display: inline-block; margin-left:103px;"></div>
                                                                    <input type="radio" id="pp1Percent" name="inj_pp1_unit" value="2">
                                                                    <label for="pp1Percent">%</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numPressNo" class="form-label">PRESS NO.<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_press_no" id="numPressNo">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numPtp2" class="form-label">Tp2<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_tp2" id="numTp2">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numTp1" class="form-label">Tp1<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_tp1" id="numTp1">
                                                                    <div class="input-group-prepend w-30">
                                                                        <span class="input-group-text w-100" id="basic-addon1">mm</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-5 col-md-3">
                                                            </div>
                                                            <div class="col-md-5 col-md-3">
                                                                <label for="numMidSlp" class="form-label">POS</label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-5 col-md-3">
                                                            </div>
                                                            <div class="col-md-5 col-lg-3">
                                                                <label for="numChangeMode" class="form-label">CHANGE MODE<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_pos_change_mode" id="numChangeMode">
                                                                    <div class="input-group-prepend w-30">
                                                                        <span class="input-group-text w-100" id="basic-addon1">mm</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 col-lg-4">
                                                                <label for="numVS" class="form-label">VS<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_pos_vs" id="numVS">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4">
                                                                <label for="numPb" class="form-label">PB<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_pos_pb" id="numPb">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-4 mt-5">
                                                                <div>
                                                                    <input type="radio" id="pbKgCm" name="pb_unit" value="1">
                                                                    <label for="pbKgCm">kg/cm2</label>
                                                                    <div style="display: inline-block; margin-left:103px;"></div>
                                                                    <input type="radio" id="pbPercent" name="inj_pos_pb_unit" value="2">
                                                                    <label for="pbPercent">%</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numPv3" class="form-label">Pv3<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_pv3" id="numPv3">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numPv2" class="form-label">Pv2<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_pv2" id="numPv2">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numPv1" class="form-label">Pv1<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_pv1" id="numPv1">
                                                                    <div class="input-group-prepend w-30">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3 mt-5">
                                                                <div>
                                                                    <input type="radio" id="pv1KgCm" name="pv1_unit" value="1">
                                                                    <label for="pv1KgCm">kg/cm2</label>
                                                                    <div style="display: inline-block; margin-left:103px;"></div>
                                                                    <input type="radio" id="pv1Percent" name="pv1_unit" value="2">
                                                                    <label for="pv1Percent">%</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numSp2" class="form-label">Sp2<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_sp2" id="numSp2">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-3">
                                                                <label for="numSp1" class="form-label">Sp1<span class="text-danger" title="Required">*</span></label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input min="0" type="number" class="form-control" name="inj_sp1" id="numSp1">
                                                                    <div class="input-group-prepend w-30">
                                                                        <span class="input-group-text w-100" id="basic-addon1">mm</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnAddMachine1" class="btn btn-primary"><i id="ibtnAddMachine1Icon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add User Modal End -->

    <!-- Add User Modal Start -->
    <div class="modal fade" id="modalAddMachine2" data-bs-keyboard="false" data-bs-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-info-circle"></i>&nbsp;Add Machine Parameter 2</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formAddMachine2" autocomplete="off">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <input type="text" name="machine_parameter_id" id="machineParameterId">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4">
                                            <label for="selectMachine" class="form-label"> Machine<span class="text-danger" title="Required">*</span></label>
                                            <div>
                                                <select class="form-select select2" id="selectMachine2" name="machine_id">
                                                    <!-- Auto Generated -->
                                                </select>
                                            </div>
                                        </div>
                                        {{-- wala --}}
                                        <div class="col-md-6 col-lg-4 d-none">
                                            <label class="form-label">Accumulator<span class="text-danger" title="Required">*</span></label>
                                            <div>
                                                <input type="radio" id="with" name="is_accumulator" value="1">
                                                <label for="with">With</label>
                                                <div style="display: inline-block; margin-left:103px;"></div>
                                                <input type="radio" id="without" name="is_accumulator" value="2">
                                                <label for="without">Without</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textDateCreated" class="form-label">Date Created<span class="text-danger" title="Required">*</span></label>
                                            <input type="text" class="form-control" name="date_created" id="textDateCreated" placeholder="Auto-generated" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textDeviceName" class="form-label">Device Name<span class="text-danger" title="Required">*</span></label>
                                            <input type="text" class="form-control" name="device_name" id="textDeviceName" placeholder="Device Name">
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textDeviceName" class="form-label">No. Of Cavity<span class="text-danger" title="Required">*</span></label>
                                            <input min="0" type="number" class="form-control" name="no_of_cavity" id="textNoOfCavity" placeholder="No. Of Cavity">
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textMaterialMixingRatio" class="form-label">Material Mixing Ratio<span class="text-danger" title="Required">*</span></label>
                                            <div class="d-flex">
                                                <input min="0" type="number" class="form-control" name="material_mixing_ratio_v" id="textMaterialMixingRatio" placeholder=" % V">
                                                <input min="0" type="number" class="form-control" name="material_mixing_ratio_r" id="textMaterialMixingRatio" placeholder=" % R">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-4">
                                            <label for="textMaterialName" class="form-label">Material Name<span class="text-danger" title="Required">*</span></label>
                                            <input type="text" class="form-control" name="material_name" id="textMaterialName" placeholder="Material Name">

                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textColor" class="form-label">Color<span class="text-danger" title="Required">*</span></label>
                                            <input type="text" class="form-control" name="color" id="textColor" placeholder="Color">

                                        </div>

                                        <div class="col-md-6 col-lg-4">
                                            <label class="form-label">Dryer Used<span class="text-danger" title="Required">*</span></label>
                                            <div>
                                                <input type="radio" id="dryerOven" name="dryer_used" value="0">
                                                <label for="dryerOven">Oven</label>
                                                <div style="display: inline-block; margin-left:103px;"></div>
                                                <input type="radio" id="dryerDHD" name="dryer_used" value="1">
                                                <label for="dryerDHD">DHD</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-4">
                                            <label for="textMachineNo" class="form-label">Machine No.<span class="text-danger" title="Required">*</span></label>
                                            <input min="0" type="number" class="form-control" name="machine_no" id="textMachineNo" placeholder="Machine No.">

                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textShotWeight" class="form-label">Shot Weight<span class="text-danger" title="Required">*</span></label>
                                            <input min="0" class="form-control" name="shot_weight" id="textShotWeight" placeholder="Shot Weight">

                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label for="textUnitWeight" class="form-label">Unit Weight<span class="text-danger" title="Required">*</span></label>
                                            <input min="0" type="number" class="form-control" name="unit_weight" id="textUnitWeight" placeholder="Unit Weight">
                                        </div>
                                    </div>

                                    <br>

                                    <div class="accordion" id="accordionExample2">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" id="moldCloseId"data-bs-toggle="collapse"data-bs-target="#moldClose" aria-expanded="true" aria-controls="moldClose">
                                                        MOLD CLOSE
                                                        </button>
                                                    </h5>
                                            </div>

                                                    <div id="moldClose" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                        <div class="card-body">

                                                            <div class="row">
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textHiV" class="form-label">HI V.<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="hi_v" id="textHiV" placeholder="%">

                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textMidSlow" class="form-label">MID SLOW<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="mid_slow" id="textMidSlow" placeholder="%">

                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textLowL" class="form-label">LOW L<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="low_l" id="textLowL" placeholder="%">

                                                                </div>
                                                                <div class="col-md-6 col-lg-4 d-none">
                                                                    {{-- wala --}}
                                                                    <label for="textObstacleCheckTm" class="form-label">OBSTACLE CHECK TM<span class="text-danger" title="Required">*</span></label>
                                                                    <input type="number" class="form-control" name="obstacle_check_tm" id="textObstacleCheckTm" placeholder="">
                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textSlowStart" class="form-label">SlOW START<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="slow_start" id="textSlowStart" placeholder="mm">
                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textSlowEnd" class="form-label">SLOW END<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="slow_end" id="textSlowEnd" placeholder="mm">

                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textLvlP" class="form-label">LVLP<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="lvlp" id="textLvlP" placeholder="mm">

                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textHpcl" class="form-label">HPCL<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="hpcl" id="textHpcl" placeholder="mm">
                                                                </div>

                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textMidSlp" class="form-label">MID SL P.<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="mid_sl_p" id="textMidSlp" placeholder="%">
                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textLowP" class="form-label">LOW P.<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="low_p" id="textLowP" placeholder="%">

                                                                </div>
                                                                <div class="col-md-6 col-lg-4">
                                                                    <label for="textHiP" class="form-label">HI P.<span class="text-danger" title="Required">*</span></label>
                                                                    <input min="0" type="number" class="form-control" name="hi_p" id="textHiP">
                                                                </div>

                                                                <div class="col-md-6 col-lg-4 mt-5">
                                                                    <div>
                                                                        <input type="radio" id="HiPton" name="hi_p_unit" value="1">
                                                                        <label for="HiPton">Ton</label>
                                                                        <div style="display: inline-block; margin-left:103px;"></div>
                                                                        <input type="radio" id="HiPPercent" name="hi_p_unit" value="2" checked>
                                                                        <label for="HiPPercent">%</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                EJECTOR
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="textEjPres" class="form-label">EJ PRES<span class="text-danger" title="Required">*</span></label>
                                                        <input min="0" type="number" class="form-control" name="ej_pres" id="textEjPres" placeholder="%">
                                                    </div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="textFwdEv1" class="form-label">FWD EV1<span class="text-danger" title="Required">*</span></label>
                                                        <input min="0" type="number" class="form-control" name="fwd_ev1" id="textFwdEv1" placeholder="%">

                                                    </div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="textFwdEv2" class="form-label">FWD EV2<span class="text-danger" title="Required">*</span></label>
                                                        <input min="0" type="number" class="form-control" name="fwd_ev2" id="textFwdEv2" placeholder="%">

                                                    </div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="textFwdEv2" class="form-label">FWD STOP<span class="text-danger" title="Required">*</span></label>
                                                        <input min="0" type="number" class="form-control" name="fwd_stop" id="textFwdStop" placeholder="mm">
                                                    </div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="textBwdStop" class="form-label">BWD STOP<span class="text-danger" title="Required">*</span></label>
                                                        <input min="0" type="number" class="form-control" name="bwd_stop" id="textBwdStop" placeholder="mm">
                                                    </div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="textCount" class="form-label">COUNT<span class="text-danger" title="Required">*</span></label>
                                                        <input min="0" type="number" class="form-control" name="count" id="textCount" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="textPattern" class="form-label">PATTERN<span class="text-danger" title="Required">*</span></label>
                                                        <input min="0" type="number" class="form-control" name="pattern" id="textPattern" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                MOLD OPEN
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                            <div class="card-body">

                                                <div class="row">
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="textOpenEndV" class="form-label">OPEN END V.<span class="text-danger" title="Required">*</span></label>
                                                        <input min="0" type="number" step="0.01" class="form-control" name="open_end_v" id="textOpenEndV" placeholder="mm">
                                                    </div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="textHiVelocity2" class="form-label">HI VELOCITY 2<span class="text-danger" title="Required">*</span></label>
                                                        <input min="0" type="number" step="0.01" class="form-control" name="hi_velocity_2" id="textHiVelocity2" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="textHiVelocity1Percent" class="form-label">HI VELOCITY 1<span class="text-danger" title="Required">*</span></label>
                                                        <input min="0" type="number" step="0.01" class="form-control" name="hi_velocity_1_percent" id="c" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="textOpenV" class="form-label">OPEN V<span class="text-danger" title="Required">*</span></label>
                                                        <input min="0" type="number" step="0.01" class="form-control" name="open_v" id="textOpenV" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-4 d-none">
                                                        {{-- wala --}}
                                                        <label for="textTmpStopTime" class="form-label">TMP STOP TIME<span class="text-danger" title="Required">*</span></label>
                                                        <input type="number" step="0.01" class="form-control" name="tmp_stop_time" id="textTmpStopTime" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="textOpenStop" class="form-label">OPEN STOP<span class="text-danger" title="Required">*</span></label>
                                                        <input min="0" type="number" step="0.01" class="form-control" name="open_stop" id="textOpenStop" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="textLowDistance" class="form-label">LOW DISTANCE<span class="text-danger" title="Required">*</span></label>
                                                        <input min="0" type="number" step="0.01" class="form-control" name="low_distance" id="textLowDistance" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-4">
                                                        <label for="textHiVelocity1mm" class="form-label">HI VELOCITY 1<span class="text-danger" title="Required">*</span></label>
                                                        <input min="0" type="number" step="0.01" class="form-control" name="hi_velocity_1mm" id="textHiVelocity1mm" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-4 d-none" >
                                                        {{-- wala --}}
                                                        <label for="textTmpStopPos" class="form-label">TMP STOP POS<span class="text-danger" title="Required">*</span></label>
                                                        <input type="number" step="0.01" class="form-control" name="tmp_stop_pos" id="textTmpStopPos" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                HEATER
                                            </button>
                                            </h5>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-2">
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <label for="textHotSprueSet" class="form-label">HOT SPRUE<span class="text-danger" title="Required">*</span></label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <label for="textNozzleSet" class="form-label">NOZZLE<span class="text-danger" title="Required">*</span></label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <label for="textFrontSet" class="form-label">FRONT<span class="text-danger" title="Required">*</span></label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <label for="textMidSet" class="form-label">MID<span class="text-danger" title="Required">*</span></label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <label for="textRearSet" class="form-label">REAR<span class="text-danger" title="Required">*</span></label>
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row">
                                                    <div class="col-md-6 col-lg-2" id="setId" style="font-weight: bold">
                                                        SET
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <input min="0" type="number" step="0.01" class="form-control" name="hot_sprue_set" id="textHotSprueSet" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <input min="0" type="number" step="0.01" class="form-control" name="nozzle_set" id="textNozzleSet" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <input min="0" type="number" step="0.01" class="form-control" name="front_set" id="textFrontSet" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <input min="0" type="number" step="0.01" class="form-control" name="mid_set" id="textMidSet" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <input min="0" type="number" step="0.01" class="form-control" name="rear_set" id="textRearSet" placeholder="">
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row">
                                                    <div class="col-md-6 col-lg-2" id="setId" style="font-weight: bold">
                                                        ACTUAL
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <input min="0" type="number" step="0.01" class="form-control" name="hot_sprue_actual" id="textHotSprueActual" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <input min="0" type="number" step="0.01" class="form-control" name="nozzle_actual" id="textNozzleActual" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <input min="0" type="number" step="0.01" class="form-control" name="front_actual" id="textFrontActual" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <input min="0" type="number" step="0.01" class="form-control" name="mid_actual" id="textMidActual" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <input min="0" type="number" step="0.01" class="form-control" name="rear_actual" id="textRearActual" placeholder="">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-2">
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <label for="textHotSprueSet" class="form-label">MOLD 1<span class="text-danger" title="Required">*</span></label>
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <label for="textNozzleSet" class="form-label">MOLD 2<span class="text-danger" title="Required">*</span></label>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-2" id="setId" style="font-weight: bold">
                                                        MOLD HEATER
                                                    </div>
                                                    <div class="col-md-6 col-lg-2" id="setId" style="font-weight: bold">
                                                        SET
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <input min="0" type="number" step="0.01" class="form-control" name="mold_one_set" id="textHotSprueSet" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <input min="0" type="number" step="0.01" class="form-control" name="mold_two_set" id="textNozzleSet" placeholder="">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-2 mb-3" id="setId" style="font-weight: bold">
                                                    </div>
                                                    <div class="col-md-6 col-lg-2 mb-3" id="setId" style="font-weight: bold">
                                                        ACTUAL
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <input min="0" type="number" step="0.01" class="form-control" name="mold_one_actual" id="moldOneActual" placeholder="">
                                                    </div>
                                                    <div class="col-md-6 col-lg-2">
                                                        <input min="0" type="number" step="0.01" class="form-control" name="mold_two_actual" id="moldTwoActual" placeholder="">
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="btnAddMachine2" class="btn btn-primary"><i id="ibtnAddMachine2Icon" class="fa fa-check"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add User Modal End -->


    @endsection

    <!--     {{-- JS CONTENT --}} -->
    @section('js_content')
    <script type="text/javascript">
        $(document).ready(function () {
            // Initialize Select2 Elements
            // $('.bootstrap-5').select2();

            getMachine1($('#selectMachine1'));
            getMachine2($('#selectMachine2'));


            $('#formAddMachine1').submit(function (e) {
                e.preventDefault();
                saveMachineOne();
            });
            $('#formAddMachine2').submit(function (e) {
                e.preventDefault();
                saveMachineTwo();
            });

            dt.dataTablesMachineParameter = $("#tableMachineParameter_form1").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "language": {
                    "info": "Showing _START_ to _END_ of _TOTAL_ user records",
                    "lengthMenu": "Show _MENU_ user records",
                },
                "ajax" : {
                    url: "load_machine_parameter_one",
                },
                "columns":[
                    { "data" : "get_action", orderable:false, searchable:false},
                    { "data" : "get_status"},
                    { "data" : "machine_name"},
                    { "data" : "material_name"},
                    { "data" : "device_name"},
                    { "data" : "machine_no"},
                ],
            });

            dt.dataTablesMachineParameter2 = $("#tableMachineParameter_form2").DataTable({
                "processing" : false,
                "serverSide" : true,
                "responsive": true,
                // "order": [[ 0, "desc" ],[ 4, "desc" ]],
                "language": {
                    "info": "Showing _START_ to _END_ of _TOTAL_ user records",
                    "lengthMenu": "Show _MENU_ user records",
                },
                "ajax" : {
                    url: "load_machine_parameter_two",
                },
                "columns":[
                    { "data" : "get_action", orderable:false, searchable:false},
                    { "data" : "get_status"},
                    { "data" : "machine_name"},
                    { "data" : "material_name"},
                    { "data" : "device_name"},
                    { "data" : "machine_no"},
                ],
            });

            $(tbl.tableMachineParameter_form1).on('click','#btnEditMachineParameter', function () {
                let machineParameterId = $(this).attr('machine-parameter-id');
                editMachineParameter(machineParameterId);
            });

            $(tbl.tableMachineParameter_form2).on('click','#btnEditMachineParameterTwo', function () {
                let machineParameterId = $(this).attr('machine-parameter-id');
                editMachineParameterTwo(machineParameterId);
            });


        });
    </script>
    @endsection

