<?=$this->session->flashdata('flash') ?>

<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-11">
          <div class="px-5 pb-5 pt-4">
            <div class="row justify-content-between">
              <div class="col-4">
                <table class="">
                  <tr>
                    <td>Kelas</td>
                    <td align="center" width="20px">:</td>
                    <td><?=$kls ?></td>
                  </tr>
                  <tr>
                    <td>Matapelajaran</td>
                    <td align="center" width="20px">:</td>
                    <td><?=$mapel ?></td>
                  </tr>
                  
                </table>
              </div>
              <div class="col-4">
                <table class="ml-auto">
                  <tr>
                    <td>Tahun Ajaran</td>
                    <td align="center" width="20px">:</td>
                    <td><?=$thn ?></td>
                  </tr>
                  <tr>
                    <td>Semester</td>
                    <td align="center" width="20px">:</td>
                    <td><?=$sms ?></td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="text-center pt-4">
              <h1 class="h4 text-gray-900 mb-4 font-weight-bold">Input Data <?=$section?></h1>
            </div>
            <form class="user" method="POST" action="<?=base_url('admin/tarif/save')?>">
              <input type="hidden" name="tahun" value="<?=$thn?>">
              <input type="hidden" name="kelas" value="<?=$kls?>">
              <input type="hidden" name="mapel" value="<?=$mapel?>">
              <input type="hidden" name="semester" value="<?=$sms?>">
              <table class="table table-responsive">
                <tr>
                  <td width="50px">No</td>
                  <td width="350px">Nama</td>
                  <td>Angka</td>
                  <td>Huruf</td>
                  <td>Predikat</td>
                </tr>
                <?php 
                $no=1;
                foreach ($T_siswa as $ts) {
                  ?>
                <tr>
                  <td><?=$no ?></td>
                  <td><?=$ts->nama_siswa?></td>
                  <td><input type="text" name="angka" class="form-control form-control-sm" style="width: 40px"></td>
                  <td><input type="text" name="huruf" class="form-control form-control-sm" style="width: 250px"></td>
                  <td>
                      <select class="custom-select custom-select-sm" name="predikat" style="width: 50px">
                        <option>A</option>  
                        <option>B</option>  
                        <option>C</option>  
                      </select>
                  </td>
                </tr>
                <?php 
                $no++;
                } ?>
              </table>
              <hr>
              <div class="d-flex">
              <button type="submit" class="btn btn-primary mr-3">Simpan</button>
            </form>        
            <a href="<?=base_url('admin/tarif') ?>" class="btn btn-secondary">Kembali</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  function inputAngka(evt){
      var charCode = (evt.charCode);
      if(charCode>32 && (charCode<48 || charCode>57) && charCode!=45)
      {
        return false;
      }
      else
      {
        return true;
      }
  }
</script>