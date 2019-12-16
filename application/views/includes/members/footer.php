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
<!--morris JavaScript -->
<!-- <script src="<?php echo base_url() ?>assets/node_modules/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/morrisjs/morris.min.js"></script> -->
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js
"></script>

<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="<?php echo base_url() ?>assets/node_modules/styleswitcher/jQuery.style.switcher.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/sweetalert2/sweet-alert.init.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/dropify/dist/js/dropify.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/node_modules/multiselect/js/jquery.multi-select.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/icheck/icheck.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/icheck/icheck.init.js"></script>
<script src="<?php echo base_url() ?>custom/js/my-jquery.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>custom/js/scheduler.js" charset="utf-8"></script>
<script src="<?php echo base_url();?>custom/js/selectjs.js" charset="utf-8"></script>
<script src="<?php echo base_url();?>assets/node_modules/wizard/jquery.steps.min.js"></script>
<script src="<?php echo base_url();?>assets/node_modules/wizard/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>custom/js/applicant.js"></script>
<script>
    $('#signaturetab').signature({syncField:'#testsignature' , syncFormat : 'PNG'});
    $('#signaturetab1').signature({syncField:'#testsignature1' , syncFormat : 'PNG'});
    $('#signaturetab2').signature({syncField:'#testsignature2' , syncFormat : 'PNG'});
    $('#signaturetab3').signature({syncField:'#testsignature3' , syncFormat : 'PNG'});
    $('#agreementform_sig').signature({syncField:'#agre_sig_val' , syncFormat : 'PNG'});

   //
   //  $('#clear_signature').on('click' , function() {
   //      $('#signaturetab').signature('clear');
   //  });
   //

    $('#member_profile').dropify({
     messages: {
        'default': 'Drag and drop an image here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Change',
        'error':   'Something went wrong. Please try again.'
      }
   });

</script>
</body>
