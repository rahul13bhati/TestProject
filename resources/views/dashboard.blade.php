@section('PageLevelStyles')
<link href="{{ URL::asset('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
<style type="text/css">
    .colored_bg {
    background-color: #b6deae;
}
td{
    text-align: center;
}
th{
    font-size: 11px !important; 
}
</style>
@endsection
@section('PageLevelScripts')
<script src="{{URL::asset('assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
@endsection
@section('content')
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"> Dashboard
    <small>dashboard & statistics</small>
</h3>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <h2> Welcome <?php echo ucfirst(str_replace("_"," ", Auth::User()->name)); ?> </h2>
</div>
<div class="clearfix"></div>
@endsection
@section('scripts')
@endsection
@include('master')