            </div>
            <footer class="footer">
                © BUPHARCO
            </footer>
        </div>
    </div><!-- End Wrapper -->

<!-- All Jquery -->
<!-- JS FOR CHART -->
<!-- ============================================================== -->
<script src="<?php echo base_url();?>custom/js/donut-chart.js" charset="utf-8"></script>
<script src="<?php echo base_url();?>custom/js/dash-chart.js" charset="utf-8"></script>
<!-- Bootstrap popper Core JavaScript -->
<script src="<?php echo base_url() ?>assets/node_modules/bootstrap/js/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?php echo base_url() ?>assets/node_modules/ps/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/printThis.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url() ?>assets/js/waves.js"></script>
<!--Menu sidebar -->
<script src="<?php echo base_url() ?>assets/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url() ?>assets/js/custom.min.js"></script>
<!-- GENERATE QR CODE -->
<script src="<?php echo base_url() ?>assets/js/qr-code.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--c3 JavaScript -->
<script src="<?php echo base_url() ?>assets/node_modules/d3/d3.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/c3-master/c3.min.js"></script>
<!--stickey kit -->
 <script src="<?php echo base_url() ?>assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
 <script src="<?php echo base_url() ?>assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
<!-- Sweet-Alert  -->
<script src="<?php echo base_url() ?>assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/sweetalert2/sweet-alert.init.js"></script>
<!-- Popup message jquery -->
<!-- <script src="<?php echo base_url() ?>assets/node_modules/toast-master/js/jquery.toast.js"></script> -->
<!-- SELECT JS -->
<script src="<?php echo base_url() ?>assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<!-- Chart JS -->
<script src="<?php echo base_url() ?>assets/js/dashboard1.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
<!-- SELECTIZE -->
<script src="<?php echo base_url() ?>assets/node_modules/selectize/selectize.js"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<!-- webcam -->
<script src="<?php echo base_url() ?>/assets/js/webcam.min.js" charset="utf-8"></script>
<!-- end -->
<!-- <script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js" charset="utf-8"></script> -->
<script src="<?php echo base_url() ?>assets/node_modules/styleswitcher/jQuery.style.switcher.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/sweetalert2/sweet-alert.init.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/dropify/dist/js/dropify.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>assets/node_modules/moment/moment.js"></script>
<script src="<?php echo base_url();?>assets/node_modules/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url();?>assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/icheck/icheck.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/icheck/icheck.init.js"></script>
<script src="<?php echo base_url() ?>custom/js/my-jquery.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>custom/js/viewMember.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>custom/js/accountInfo.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>custom/js/insurance.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>custom/js/scheduler.js" charset="utf-8"></script>
<script src="<?php echo base_url();?>custom/js/selectjs.js" charset="utf-8"></script>

</script>
<!-- start - This is for export functionality only -->
    <script src="<?php echo base_url() ?>assets/node_modules/table-assets/dataTables.buttons.js">
    </script>
    <script src="<?php echo base_url() ?>assets/node_modules/table-assets/buttons.flash.js">
    </script>
    <script src="<?php echo base_url() ?>assets/node_modules/table-assets/jszip.js"></script>
    <script src="<?php echo base_url() ?>assets/node_modules/table-assets/pdfmake.js"></script>
    <!-- <script src="<?php echo base_url() ?>assets/node_modules/table-assets/vfs_fonts.js"></script> -->
    <script src="<?php echo base_url() ?>assets/node_modules/table-assets/buttons.html5.js"></script>
    <script src="<?php echo base_url() ?>assets/node_modules/table-assets/buttons.print.js"></script>
    <!-- end - This is for export functionality only -->
<script>


    $('.profile_edit').dropify({
      messages: {
         'default': 'Drag and drop an image here or click',
         'replace': 'Drag and drop or click to replace',
         'remove':  'Change',
         'error':   'Something went wrong. Please try again.'
       }
    });

    $('.profile_new').dropify({
      messages: {
         'default': 'Drag and drop an image here or click',
         'replace': 'Drag and drop or click to replace',
         'remove':  'Change',
         'error':   'Something went wrong. Please try again.'
       }
    });

    $('#signature').dropify({
      messages: {
         'default': 'Drag and drop an image here or click',
         'replace': 'Drag and drop or click to replace',
         'remove':  'Change',
         'error':   'Something went wrong. Please try again.'
       }
    });

    $('#unfreeze').hide();
    $('#controls').hide();
    $('#use_photo').hide();
    $('#takephoto').on('click' , function() {
    $('#controls').show();
      Webcam.set({
       width: 208,
       height: 190,
       image_format: 'png',
       png_quality: 90
      });
      Webcam.attach( '#photo_container' );
    })

    $('#snap').on('click' , function() {
        $(this).hide();
        $('#use_photo').show();
        $('#unfreeze').show();
        Webcam.freeze();
    });

    $('#unfreeze').on('click' , function() {
        $(this).hide();
        $('#use_photo').hide();
        $('#snap').show();
        Webcam.unfreeze();

    });

    $('#use_photo').on('click' , function() {
        Webcam.snap( function(data_uri) {
        document.getElementById('photo_container').innerHTML = '<img id="capture_photo" src="'+data_uri+'"/>';
        $('#controls').hide();
        Webcam.reset();
          } );


    });

    $('#use_photo').on('click' , function() {
        Webcam.snap( function(data_uri) {
        document.getElementById('photo_container').innerHTML = '<img id="capture_photo" src="'+data_uri+'"/>';
        $('#controls').hide();
        Webcam.reset();
          } );
    });

    $('#signaturetab').signature({syncField:'#testsignature' , syncFormat : 'PNG'});

    $('#clear_signature').on('click' , function() {
        $('#signaturetab').signature('clear');
    });
</script>
<script src="<?php echo base_url('custom/js/report.js') ?>" charset="utf-8"></script>
</body>
