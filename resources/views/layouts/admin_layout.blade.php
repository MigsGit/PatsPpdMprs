@php
    session_start();
    $isLogin = false;
    if(isset($_SESSION['rapidx_user_id'])){
        $isLogin = true;
    }else{
        echo    '<script type="text/javascript">
                    window.location = "/";
                </script>';
    }
@endphp

@if($isLogin == true)
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>MPRS | @yield('title')</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="shortcut icon" type="image/png" href="">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <!-- CSS LINKS -->
            @include('shared.css_links.css_links')
            <style>
                .modal-xl-custom{
                    width: 95% !important;
                    min-width: 90% !important;
                }
                /* table.dataTable.display tbody tr.odd>.sorting_1, table.dataTable.order-column.stripe tbody tr.odd>.sorting_1 {
                    background-color: none !important;
                } */
            </style>
        </head>

        <body class="hold-transition sidebar-mini">
            <div class="wrapper">
                @include('shared.pages.header')
                @include('shared.pages.admin_nav')
                @include('shared.pages.footer')
                
                <input type="hidden" id="login_id" value="<?php echo $_SESSION['rapidx_user_id']; ?>">
                <input type="hidden" id="login_name" value="<?php echo $_SESSION["rapidx_name"]; ?>">

                @yield('content_page')
            </div>

            <!-- JS LINKS -->
            @include('shared.js_links.js_links')
            @yield('js_content')

            <script type="text/javascript">
                verifyUser();

                function verifyUser(){
                    var loginName = $('#login_name').val();
                    console.log('Session(Admin/User):', loginName);

                    $.ajax({
                        url: "get_login_user",
                        method: "get",
                        data: {
                            loginName : loginName
                        },
                        dataType: "json",

                        success: function(response){
                            if(response['result'].length == 0){
                                window.location.href = 'error';
                            }
                            else{
                                for(let i = 0; i<response['result'].length;i++){
                                    if(response['result'][i]['user_level'] == 1){
                                        $('#user_management_id').removeClass('d-none');
                                        $('#user_settings_id').removeClass('d-none');
                                        $('#users_tab_id').removeClass('d-none');
                                        $('#machine_settings_id').removeClass('d-none');
                                        // toastr.success('PANIS');
                                    }
                                    if(response['result'][i]['user_level'] == 2){
                                        
                                    }
                                }
                            }
                        }
                    });
                }
            </script>
        </body>
    </html>
@else
    <script type="text/javascript">
        // toastr.error('Session Expired! Please login again.');
        // window.location = "signin_page";
        // window.location = "../RapidX/";
    </script>
@endif

