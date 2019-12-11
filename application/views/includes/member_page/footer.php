
</section>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?php echo base_url();?>/assets/node_modules/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url();?>/assets/node_modules/bootstrap/js/popper.min.js"></script>
<script src="<?php echo base_url();?>/assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>assets/node_modules/sweetalert2/sweet-alert.init.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url()?>custom/js/members.js"></script>
<script type="text/javascript">

$('document').ready(function(){
  $('#checkbox0').on('change',function() {
    let isCheck = $(this).prop('checked');
    if(isCheck) {
      $('#password').attr('type', 'text');
    } else {
      $('#password').attr('type', 'password');
    }
  });
});

    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });

    $('#signaturetab').signature({syncField:'#signaturedata' , syncFormat : 'PNG'});

    $('#clear_signature').on('click' , function() {
        $('#signaturetab').signature('clear');
    });
</script>

</body>

</html>
