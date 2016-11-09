<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>School Information System|Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="description" content="">
    <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
    <meta name="author" content="Innocent Christopher Kilogha">

    <!-- Base Css Files -->
   {!!HTML::style("assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" )!!}
   {!!HTML::style("assets/libs/bootstrap/css/bootstrap.min.css" )!!}
   {!!HTML::style("assets/libs/font-awesome/css/font-awesome.min.css" )!!}
   {!!HTML::style("assets/libs/fontello/css/fontello.css" )!!}
   {!!HTML::style("assets/libs/animate-css/animate.min.css" )!!}
   {!!HTML::style("assets/libs/nifty-modal/css/component.css" )!!}
   {!!HTML::style("assets/libs/magnific-popup/magnific-popup.css" )!!}
   {!!HTML::style("assets/libs/ios7-switch/ios7-switch.css" )!!}
   {!!HTML::style("assets/libs/pace/pace.css" )!!}
   {!!HTML::style("assets/libs/sortable/sortable-theme-bootstrap.css" )!!}
   {!!HTML::style("assets/libs/bootstrap-datepicker/css/datepicker.css" )!!}
   {!!HTML::style("assets/libs/jquery-icheck/skins/all.css" )!!}
    <!-- Code Highlighter for Demo -->
   {!!HTML::style("assets/libs/prettify/github.css" )!!}

    <!-- Extra CSS Libraries Start -->
   {!!HTML::style("assets/css/style.css" )!!}
    <!-- Extra CSS Libraries End -->
   {!!HTML::style("assets/css/style-responsive.css" )!!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/apple-touch-icon-152x152.png" />
</head>
<body class="fixed-left lock-page">
<!-- Modal Start -->
<!-- Modal Task Progress -->
<div class="md-modal md-3d-flip-vertical" id="task-progress">
    <div class="md-content">
        <h3><strong>Task Progress</strong> Information</h3>
        <div>
            <p>CLEANING BUGS</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                    <span class="sr-only">80&#37; Complete</span>
                </div>
            </div>
            <p>POSTING SOME STUFF</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                    <span class="sr-only">65&#37; Complete</span>
                </div>
            </div>
            <p>BACKUP DATA FROM SERVER</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                    <span class="sr-only">95&#37; Complete</span>
                </div>
            </div>
            <p>RE-DESIGNING WEB APPLICATION</p>
            <div class="progress progress-xs for-modal">
                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">100&#37; Complete</span>
                </div>
            </div>
            <p class="text-center">
                <button class="btn btn-danger btn-sm md-close">Close</button>
            </p>
        </div>
    </div>
</div>

<!-- Modal Logout -->
<div class="md-modal md-just-me" id="logout-modal">
    <div class="md-content">
        <h3><strong>Logout</strong> Confirmation</h3>
        <div>
            <p class="text-center">Are you sure want to logout from this awesome system?</p>
            <p class="text-center">
                <button class="btn btn-danger md-close">Nope!</button>
                <a href="login.html" class="btn btn-success md-close">Yeah, I'm sure</a>
            </p>
        </div>
    </div>
</div>        <!-- Modal End -->
<!-- Begin page -->
<div class="container animated fadeInDownBig">
    <div class="full-content-center">
        <p class="text-center"><a href="#"><img src="assets/img/login-logo.png" alt="Logo"></a></p>
        <div class="login-wrap">
            <div class="login-block">

                    {!! Form::open(array('url' => 'lockscreen','id'=>'loginForm','role'=>'form')) !!}
                    <div class="form-group login-input">
                        <i class="fa fa-user overlay"></i>
                        <input  name="username" type="text" class="form-control text-input" placeholder="Username" value="{{old('username')}}" autocomplete=off>
                    </div>
                    <div class="form-group login-input">
                        <i class="fa fa-key overlay"></i>
                        <input type="password" name="password" class="form-control text-input" placeholder="********" autocomplete=off>
                        <button type="submit" class="btn btn-success btn-block">UNLOCK</button>
                    </div>
                {!!Form::close() !!}
            </div>
        </div>

    </div>
</div>
<!-- the overlay modal element -->
<div class="md-overlay"></div>
<!-- End of eoverlay modal -->
<script>
    var resizefunc = [];
</script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{!!HTML::script("assets/libs/jquery/jquery-1.11.1.min.js")!!}
{!!HTML::script("assets/libs/bootstrap/js/bootstrap.min.js")!!}
{!!HTML::script("assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js")!!}
{!!HTML::script("assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js")!!}
{!!HTML::script("assets/libs/jquery-detectmobile/detect.js")!!}
{!!HTML::script("assets/libs/jquery-animate-numbers/jquery.animateNumbers.js")!!}
{!!HTML::script("assets/libs/ios7-switch/ios7.switch.js")!!}
{!!HTML::script("assets/libs/fastclick/fastclick.js")!!}
{!!HTML::script("assets/libs/jquery-blockui/jquery.blockUI.js")!!}
{!!HTML::script("assets/libs/bootstrap-bootbox/bootbox.min.js")!!}
{!!HTML::script("assets/libs/jquery-slimscroll/jquery.slimscroll.js")!!}
{!!HTML::script("assets/libs/jquery-sparkline/jquery-sparkline.js")!!}
{!!HTML::script("assets/libs/nifty-modal/js/classie.js")!!}
{!!HTML::script("assets/libs/nifty-modal/js/modalEffects.js")!!}
{!!HTML::script("assets/libs/sortable/sortable.min.js")!!}
{!!HTML::script("assets/libs/bootstrap-fileinput/bootstrap.file-input.js")!!}
{!!HTML::script("assets/libs/bootstrap-select/bootstrap-select.min.js")!!}
{!!HTML::script("assets/libs/bootstrap-select2/select2.min.js")!!}
{!!HTML::script("assets/libs/magnific-popup/jquery.magnific-popup.min.js")!!}
{!!HTML::script("assets/libs/pace/pace.min.js")!!}
{!!HTML::script("assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js")!!}
{!!HTML::script("assets/libs/jquery-icheck/icheck.min.js")!!}

<!-- Demo Specific JS Libraries -->
{!!HTML::script("assets/libs/prettify/prettify.js")!!}

{!!HTML::script("assets/js/init.js")!!}
<!-- Page Specific JS Libraries -->
{!!HTML::script("assets/js/pages/lockscreen.js")!!}
</body>
</html>