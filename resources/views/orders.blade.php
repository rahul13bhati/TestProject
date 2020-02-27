@section('PageLevelStyles')
<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('PageLevelScripts')

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-green"></i>
                    <span class="caption-subject font-green sbold uppercase">Orders</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="table">
                        <thead>
                            <tr>
                                <th> Sr No. </th>
                                <th> Invoice Number </th>
                                <th> Total Amount  </th>
                                <th> Status</th>
                                <th> Created At</th>
                                <th>View Details</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>
<div class="modal fade " id="ajax" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{URL::asset('assets/global/img/loading-spinner-grey.gif')}}" alt="" class="loading">
                    <span> &nbsp;&nbsp;Loading... </span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{url("datatable/getdata/orders")}}',
        data: {
            "tableName": "customers"
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'invoice_number', name: 'invoice_number' },
            { data: 'total_amount', name: 'total_amount' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endsection
@include('master')