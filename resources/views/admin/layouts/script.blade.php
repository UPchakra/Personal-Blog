<script src="{{asset('public/adminAssets/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 
<script src="{{asset('public/adminAssets/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js --> 

<script src="{{asset('public/adminAssets/assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('public/adminAssets/assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script><!-- USA Map Js -->

<script src="{{asset('public/adminAssets/assets/bundles/morrisscripts.bundle.js')}}"></script><!-- Morris Plugin Js -->
<script src="{{asset('public/adminAssets/assets/bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('public/adminAssets/assets/bundles/knob.bundle.js')}}"></script> <!-- Jquery Knob Plugin Js -->

<script src="{{asset('public/adminAssets/assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
<script src="{{asset('public/adminAssets/assets/js/pages/blog/blog.js')}}"></script>
<script src="{{asset('public/adminAssets/assets/js/pages/charts/jquery-knob.min.js')}}"></script>
<script src="{{asset('public/adminAssets/assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('public/adminAssets/assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}">
</script>
<script src="{{asset('public/adminAssets/assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js --> 
<script src="{{asset('public/adminAssets/assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('public/adminAssets/assets/plugins/multi-select/js/jquery.multi-select.js')}}"></script> <!-- Multi Select Plugin Js --> 

<script src="{{asset('public/adminAssets/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script> <!-- Bootstrap Tags Input Plugin Js --> 

<script src="{{asset('public/adminAssets/assets/js/pages/forms/advanced-form-elements.js')}}"></script> 


<script src="{{asset('public/adminAssets/assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('public/adminAssets/assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('public/adminAssets/assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/adminAssets/assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script>
    $(".deleteRecord").click(function () {
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
                title: "Are You Sure? ",
                text: "You will not be able to recover this record again",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, Delete it!"
            },
            function () {

                window.location.href = "http://localhost/personal/BLOG/" + deleteFunction + "/" + id;
            });
    });

</script>

@yield('scripts')
