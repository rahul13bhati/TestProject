<div class="page-footer">
            <div class="page-footer-inner"> 2019 &copy; Dashboard By 
                <a href="http://www.rvinformatics.com/" title="Visit Our Website" target="_blank"> RV Informatics.</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
        <script src="{{  URL::asset('assets/global/plugins/respond.min.js')}}"></script>
        <script src="{{  URL::asset('assets/global/plugins/excanvas.min.js')}}"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{URL::asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{URL::asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        @yield('PageLevelScripts')
        <script src="{{URL::asset('assets/global/plugins/bootstrap-toastr/toastr.min.js')}}" type="text/javascript"></script>
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{URL::asset('assets/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::asset('assets/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        @yield('scripts')
      