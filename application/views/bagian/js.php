  <div class="control-sidebar-bg"></div>
</div>
</div>
<script src="<?php echo base_url(); ?>template/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>template/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
   $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo base_url(); ?>template/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>template/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>template/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>template/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url(); ?>template/dist/js/adminlte.min.js"></script>
<!-- restrict total input -->
<script>
    $(document).ready(function(){
        $("#nidn").attr('maxlength','10');
    });
</script>
<!-- disabled form-->
<script>
   $(document).ready(function() {
      $('#status').on('change', function() {
  			var optionText = $("#status option:selected").text(); //kalo mau dari data yg di database pake .val()
  			// alert("Selected Option Text: "+optionText);
  			var a = "Dosen Honorer";
  			if (optionText == a) {
  				$("#sertifikasi").attr('disabled', 'disabled');
  			} else {
  				$("#sertifikasi").removeAttr('disabled');
  			}
  		});
  });
</script>
<!-- alert auto close -->
<script>
  window.setTimeout(function(){
    $(".alert").fadeTo(200,0).slideUp(200,function(){
      $(this).remove();
  });

},2000);
</script>
<!-- daterange picker -->
<script>
   $('#reservation').daterangepicker()
   $('form').submit(function(ev, picker) {
      [startdate, enddate] = $('#reservation').val().split(' - ');
      $(this).find('input[name="startdate"]').val(startdate);
      $(this).find('input[name="enddate"]').val(enddate);
  })
</script>
<!-- datepicker -->
<script>
   $('#datepicker').datepicker({
      autoclose: true
  })
</script>
<!-- select2 js -->
<script>
   $(function() {
      $('.select3').select2()
  })
</script>
<!-- dt -->
<script>
   $(function() {
      $('#example1').DataTable({
         'responsive': true,
         'paging': true,
         'lengthChange': true,
         'searching': true,
         'ordering': true,
         'info': true,
         'autoWidth': false,
  			// 'scrollX': true
  		});
  });
</script>
<!-- dt -->
<script>
   $(function() {
      $('#example2').DataTable({
         'responsive': true,
         'paging': false,
         'lengthChange': false,
         'ordering': true,
         'info': false,
         'autoWidth': false,

     });
  });
</script>
<!-- dtdosen -->
<script>
   $(function() {
      $('#example3').DataTable({
         'responsive': true,
         'paging': false,
         'lengthChange': false,
         'ordering': false,
         'info': false,
         'autoWidth': false,
         'searching':false,

     });
  });
</script>
<!-- gatau apa ini -->
<script type="text/javascript">
   function onReady(callback) {
      var intervalID = window.setInterval(checkReady, 400);

      function checkReady() {
         if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalID);
            callback.call(this);
        }
    }
}

function show(id, value) {
  document.getElementById(id).style.display = value ? 'block' : 'none';
}
onReady(function() {
  show('page', true);
  show('loading', false);
});
</script>
<!-- number filter -->
<script>
   function input_number(evt) {
      var ch = String.fromCharCode(evt.which);
      if (!/[0-9]/.test(ch)) {
         evt.preventDefault();
     }
 }
</script>
<!-- char filter -->
<script>
   function input_char(evt) {
      var ch = String.fromCharCode(evt.which);
      var filter = /[a-zA-Z_ ]/;
      if (!filter.test(ch)) {
         event.returnValue = false;
     }
 }
</script>
