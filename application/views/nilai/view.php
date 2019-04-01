<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-5 text-gray-800">Input Data <?=$section?></h1>
<?=$this->session->flashdata('flash') ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex">
        <span class="m-0 font-weight-bold text-primary">Pilih Data</span>
    </div>
    <div class="card-body">
      <form method="POST" action="<?=base_url('admin/nilai/search') ?>">
        <div class="row form-group">
          <div class="col-lg-5">
            <label class="text-dark font-weight-bold">Tahun Ajaran</label>
            <input type="text" name="tahun" class="form-control mb-2">
            <?=form_error('tahun',"<small class='text-danger'>","</small>") ?>
          </div>
          <div class="col-lg-5">
            <label class="text-dark font-weight-bold">Semester</label>
            <select class="custom-select mb-2" name="semester">
              <option value="1">Satu/Ganjil</option>
              <option value="2">Dua/Genap</option>
            </select>
          </div>
        </div>
        <div class="row form-group">
          <div class="col-lg-5">
            <label class="text-dark font-weight-bold">Kelas</label>
              <select class="custom-select mb-2" name="kelas" id="kelas">
                  <option value="" selected>--Pilih Kelas--</option>
                <?php foreach ($T_kelas as $tk): ?>
                  <option><?=$tk->nama_kelas?></option>
                <?php endforeach ?>
              </select>
              <?=form_error('kelas',"<small class='text-danger'>",'</small>') ?>
          </div>
          <div class="col-lg-5">
            <label class="text-dark font-weight-bold">Matapelajaran</label>
              <select class="custom-select mb-2" name="mapel" id="mapel">
                <option value="" selected>--Pilih Mapel--</option>
              </select>
              <?=form_error('mapel',"<small class='text-danger'>",'</small>') ?>
          </div>
        </div>
        <div><button class="btn btn-primary">Cari <i class="fa fa-fw fa-search"></i></button></div>
      </form>
    </div>
  </div>

</div>


