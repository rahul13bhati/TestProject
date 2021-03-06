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
                    <span class="caption-subject font-green sbold uppercase">Products</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="table">
                        <thead>
                            <tr>
                                <th> Sr No. </th>
                                <th> Name </th>
                                <th> Price  </th>
                                <th> In Stock</th>
                                <th> Created At</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{url("datatable/getanydata/products")}}',
        data: {
            "tableName": "products"
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'price', name: 'price' },
            { data: 'in_stock', name: 'in_stock' },
            { data: 'created_at', name: 'created_at' },
        ]
    });
});
</script>
@endsection
@include('master')