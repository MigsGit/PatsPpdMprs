<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 8 Template</title>
    @include('shared.css_links.css_links')

</head>
<body>
    @include('shared.pages.index_nav')
    
    <div class="container" style="margin-top: 7rem">
        <div class="row align-items-center">
            <div class="col-md-6 mt-5">
                <img class="svg-images img-fluid" src="{{ asset('public/images/svg/undraw_doctors.svg') }}">
            </div>
            <div class="col-md-6 mt-5">
                <h1 class="fw-bold">Fight Covid-19</h1>
                <p>Most people who become sick with COVID-19 will only have mild illness and can get better at home. Symptoms might last a few days. People who have the virus might feel better in about a week. Treatment is aimed at relieving symptoms and includes Rest, Fluids and Pain Relievers</p>
                <p>Everyone can now support directly to the Barangay. People and organizations who want to help fight the pandemic can now report through the Barangay Looc.</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 5rem">
        <div class="row" id="announcements">
            <h1 class="fw-bold text-md-center">Announcements</h1>
            <div class="col-md-5 mt-md-5 mt-sm-3 mr-md-auto">
                <img class="img-fluid d-block mx-auto" src="{{ asset('public/images/svg/undraw_candidate.svg') }}">
                <div class="mx-auto">
                    <h5 class="mt-3">Special title announcements</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda dicta velit rerum. Sit debitis ipsum ipsa aperiam, nemo sequi ad voluptate? Commodi exercitationem iste perferendis? Consectetur suscipit voluptas maxime accusantium.</p>
                    <p class="text-muted mb-2"><i class="fa fa-calendar"></i>&nbsp;{{ date('D, M d, Y') }}</p>
                </div>
            </div>
            <div class="col-md-5 mt-md-5 mt-sm-5">
                <img class="img-fluid d-block mx-auto" src="{{ asset('public/images/svg/undraw_candidate.svg') }}">
                <div class="mx-auto">
                    <h5 class="mt-3">Special title announcements</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Assumenda dicta velit rerum. Sit debitis ipsum ipsa aperiam, nemo sequi ad voluptate? Commodi exercitationem iste perferendis? Consectetur suscipit voluptas maxime accusantium.</p>
                    <p class="text-muted mb-2"><i class="fa fa-calendar"></i>&nbsp;{{ date('D, M d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>

@include('shared.js_links.js_links')