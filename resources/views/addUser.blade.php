@section('PageLevelStyles')
<link href="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('PageLevelScripts')
<script src="{{URL::asset('assets/pages/scripts/form-samples.min.js')}}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
@endsection
@section('content')
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-details"></i>
            @if(!isset($users))
            Create User 
            @else
            Edit User
            @endif
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse"> </a>
            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
            <a href="javascript:;" class="reload"> </a>
            <a href="javascript:;" class="remove"> </a>
        </div>
    </div>
    <div class="portlet-body form">
              @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
      @endif
        <!-- BEGIN FORM-->
        @if(isset($users))
            {{ Form::model($visit, ['route' => ['updateVisit', $users->id], 'method' => 'PATCH', 'class' => 'form-horizontal']) }}
        @else
            {{ Form::open(['route' => 'createUser', 'class' => 'form-horizontal']) }}
        @endif
         {{csrf_field()}}
            <div class="form-body">
                <h3 class="form-section">Details</h3>
                <!--/row-->
                <div class="row">
                    <!--/span-->
                    <div class="col-md-12">
                        <div class="form-group ">
                            <label class="control-label col-md-2">Full Name </label>
                            <div class="col-md-10">
                                {{ Form::text('name',null, ['class' => 'form-control', 'placeholder' => "Enter User's Full Name "], Input::old('name')) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group ">
                            <label class="control-label col-md-2">Email Address </label>
                            <div class="col-md-10">
                                {{ Form::email('email',null, ['class' => 'form-control', 'placeholder' => "Enter User's Email Address"], Input::old('email')) }}
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                   
                </div>
                <!--/row-->
                <!--/row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group ">
                            <label class="control-label col-md-2">Password </label>
                            <div class="col-md-10">
                                {{ Form::text('password',null, ['class' => 'form-control', 'placeholder' => "Enter User's Password "]) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green">Submit</button>
                                <button type="button" class="btn default">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"> </div>
                </div>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
    $(".form_datetime").datepicker({
            autoclose: true,
            format : 'yyyy-mm-dd',
    });
    $('select option:first').attr('hidden', true);
    $('select option:first').attr('selected', false);
});
</script>
@endsection
@include('master')


