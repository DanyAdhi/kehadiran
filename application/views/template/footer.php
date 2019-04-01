<!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url('assets/') ?>js/demo/datatables-demo.js"></script>

  <script>
    $(document).ready(function(){

      $('#jenis').change(function(){
        var jenis = $(this).val();
        $.ajax({
          type  : 'POST',
          url   : '<?=base_url('kehadiran/sub_ket')?>',
          data  : 'jenis ='+jenis,
          success : function(data){
            $('#sub').html(data);
          }
        });
      });



      $('#nip').blur(function(){
        var nip =$(this).val();
        $.ajax({
          type  : 'POST',
          url   : '<?=base_url('kehadiran/cek_karyawan')?>',
          data  : 'nip ='+nip,
          success : function(data){
            $('#namaa').val(data);
            $('#nama').val(data);

          }
        });
      });
    });
  </script>

</body>

</html>
