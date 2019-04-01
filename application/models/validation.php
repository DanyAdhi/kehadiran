<?php 
defined('BASEPATH') OR exit ('No script direct access allowed');

	class Validation extends CI_Model{

		public function val_login()
		{
			return [
				[
					'field'	=> 'username',
					'label'	=> 'Username',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'<b>%s</b> harus diisi.'],
				],
				[
					'field'	=> 'password',
					'label'	=> 'Password',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'<b>%s</b> harus diisi.']
				]
			];
		}

		public function kehadiran()
		{
			return [
				[
					'field'	=> 'nip',
					'label'	=> 'NIP',
					'rules'	=> 'required|rtrim|min_length[18]',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.',
						'min_length'=> 'Pangjang <b>%s<b/> minimal 18 karakter']
				],
				[
					'field'	=> 'mulai',
					'label'	=> 'Tanggal Mulai',
					'rules'	=> 'required|rtrim',
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'selesai',
					'label'	=> 'Tanggal Selesai',
					'rules'	=> "required|rtrim",
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'jenis',
					'label'	=> 'Jenis Keterangan',
					'rules'	=> "required|rtrim",
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'sub_ket',
					'label'	=> 'Sub Keterangan',
					'rules'	=> "required|rtrim",
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'no_surat',
					'label'	=> 'No Surat',
					'rules'	=> "required|rtrim",
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
				[
					'field'	=> 'keterangan',
					'label'	=> 'Keterangan',
					'rules'	=> "required|rtrim",
					'errors'=> ['required'=>'Form <b>%s</b> tidak boleh kosong.']
				],
			];
		}

		

	}
?>