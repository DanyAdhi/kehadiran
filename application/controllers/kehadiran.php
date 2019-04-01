<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kehadiran extends CI_Controller {

	var $table 		= 'kehadiran';
	var $folder 	= 'kehadiran/';
	var $section 	= 'Kehadiran';


	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk')!=TRUE){$url=base_url('login');redirect($url);};
		$this->load->model(['model','validation']);
		$this->load->library(['form_validation', 'encrypt']);

	}

	public function index()
	{
		$data = ['content'	=> $this->folder.('view'),
				 'section'	=> $this->section,
				 'tampil'	=> $this->model->kehadidan()
				 ];

		$this->load->view('template/template', $data);
	}

	public function add()
	{
		$data = ['content'	=> $this->folder.('post'),
				 'section'	=> $this->section,];

		$this->load->view('template/template', $data);
	}


	public function save()
	{
		// var_dump($_POST);die;
		$post 		= $this->input->post();
		$validasi 	= $this->form_validation->set_rules($this->validation->kehadiran());

		if($validasi->run()==True){
			$data = [
						'nip'				=> $post['nip'],
						'nama'				=> $post['nama'],
						'tgl_mulai'			=> $post['mulai'],
						'tgl_selesai'		=> $post['selesai'],
						'jenis_keterangan'	=> $post['jenis'],
						'no_surat'			=> $post['no_surat'],
						'keterangan'		=> $post['keterangan'],
						'dibuat'			=> $post['sekarang'],
					];
			$this->model->save($this->table, $data);
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di simpan.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect('kehadiran/add');
		}else{
			$data = ['content'	=> $this->folder.('post'),
					 'section'	=> $this->section,];
			$this->load->view('template/template', $data);
		}
	}

	public function delete($id=null)
	{
		if(!isset($id)) show_404();
		$id = str_replace(['-','_','~'],['=','+','/'],$id);
		$id = $this->encrypt->decode($id);
		$this->model->delete($this->table, 'id_kehadiran' , $id);
		$this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data telah di hapus.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('kehadiran');
	}

	public function edit($id=null)
	{
		if(!isset($id)) show_404();
		$id = str_replace(['-','_','~'],['=','+','/'],$id);
		$id = $this->encrypt->decode($id);

		$data = [
					'content'	=> $this->folder.('edit'),
				 	'section'	=> $this->section,
				 	'tampil'	=> $this->model->edit_kehadiran($id)
				];

		$this->load->view('template/template', $data);
	}

	public function update()
	{
		// var_dump($_POST);die;
		$post 	= $this->input->post();
		$id 	= $post['id_kehadiran'];


		$this->form_validation->set_rules('jenis', 'Jenis Keterangan', 'required|rtrim',['required' 	=> 'Form <b>%s</b> tidak boleh kosong']);
		$this->form_validation->set_rules('sub_ket', 'Sub Keterangan', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);
		$this->form_validation->set_rules('no_surat', 'No Surat', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|rtrim',['required'=>'Form <b>%s</b> tidak boleh kosong.']);

		if($this->form_validation->run()==true){
			$data = [
						'tgl_mulai'			=> $post['mulai'],
						'tgl_selesai'		=> $post['selesai'],
						'jenis_keterangan'	=> $post['jenis'],
						'no_surat'			=> $post['no_surat'],
						'keterangan'		=> $post['keterangan'],
					];
				$this->model->update($this->table, 'id_kehadiran', $id, $data);
				$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil di Ubah.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect('kehadiran');
		}else{
			$data = [
					'content'	=> $this->folder.('edit'),
				 	'section'	=> $this->section,
				 	'tampil'	=> $this->model->get_by($this->table, 'id_kehadiran', $id)->result()
					];
			$this->load->view('template/template', $data);

		}
	}



	public function sub_ket()
	{
		$jenis 		= $this->input->post('jenis_');
		$sub_ket  	= $this->model->get_by('sub_ket', 'id_ket', $jenis)->result();
		$jum 		= count($sub_ket);

		if($jum>0){
			echo "<option value='' >--Pilih--</option>";
			foreach ($sub_ket as $m) {
				echo "<option value='$m->id'>$m->sub_cuti</option>";
			}
		}else{
				echo "<option value=''>--Pilih--</option>";
		}
	}

	public function cek_karyawan()
	{
		$nip 	= $this->input->post('nip_');
		$cek 	= $this->model->get_by('karyawan', 'nip', $nip)->result_array();
		$jum 	= count($cek);
		if($jum>0){
			echo $cek[0]['nama'];

		}else{
				echo "";
		} 
	}
}

/* End of file kehadiran.php */
/* Location: ./application/controllers/kehadiran.php */