<?php
use Carbon\Carbon;
?>
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-details"></i>
            <?php $order = json_decode(json_encode ($order[0]), true);?>
        </div>
        <div class="tools">
            <a class="remove" data-dismiss="modal" aria-hidden="true"> </a>
        </div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form readonly class="form-horizontal"></form>
         {{csrf_field()}}
            <div class="form-body">
                <h3 class="form-section">Details</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3"><strong>Invoice Number </strong></label>
                            <div class="col-md-9">
                                <input disabled readonly class="form-control" value="{{ $order['invoice_number'] }}">
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3"><strong> Total Amount </strong></label>
                            <div class="col-md-9">
                                <input disabled readonly class="form-control" value="{{ $order['total_amount'] }}">
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3"><strong>Status</strong></label>
                            <div class="col-md-9">
                                <input disabled readonly class="form-control" value="{{ $order['status'] }}">
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label class="control-label col-md-3"><strong>Created At</strong></label>
                            <div class="col-md-9">
                                <input disabled readonly class="form-control" value="{{ $order['created_at'] }}">
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3"><strong>Product Name</strong></label>
                            <div class="col-md-9">
                                <input disabled readonly class="form-control" value="{{ $order['name'] }}">
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label class="control-label col-md-3"><strong>Quantity</strong></label>
                            <div class="col-md-9">
                                
                                <input disabled readonly class="form-control" value="{{ $order['quantity'] }}">
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--h3 class="form-section">Address</h3 -->
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label class="control-label col-md-3"><strong>Price.</strong></label>
                            <div class="col-md-9">
                               <input disabled readonly class="form-control" value="{{ $order['price'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-3"><strong>Stock</strong></label>
                            <div class="col-md-9">
                                <input disabled readonly class="form-control" value="{{ $order['in_stock'] ? 'In Stock' : 'Out Of Stock' }}">
                            </div>
                        </div>
                    </div>
                </div>
                <!--/row-->
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>