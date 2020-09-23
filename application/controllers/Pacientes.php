<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class - responsável por controlar os dados dos pacientes
 * 
 * 	-- MÉTODOS --
 * 		Index - Método Padrão
 *  	ShowAll - exibe dados de todos os pacientes
 * 		Store - Insere novo paciente
 * 		Update - Atualiza determinado paciente
 * 		Destroy - Remove o determinado paciente
 */
class Pacientes extends CI_Controller {

	function ___construct(){
		parent::___construct();
		$this->load->model('Pacientes_model');
	}

	/** Standard method */
	public function index(){
		$this->load->view('header');
		$this->load->view('Cadastro');
		$this->load->view('footer');
	}

	/** Get all patients */
	public function ShowAll(){

		$data['pacientes'] = $this->Pacientes_model->ShowAll();

		$this->load->view('header');
		$this->load->view('Pacientes', $data);
		$this->load->view('footer');
	}

	/** Recording patient data */
	public function Store(){

		$file_name = $this->upImages($_FILES);

		if(isset($_POST) && !empty($_POST)){

			if(!empty($file_name)){
				$file_name = 'default.jpg';
			}

			$this->Pacientes_model->Store($_POST, $file_name);
		}
		header("Location: " . base_url() . "index.php/pacientes");
	}	
	
	/** Update patient data */
	public function Update(){

		if(isset($_POST) && !empty($_POST)){

			// deletar img atual
			if(!empty($_POST['foto_hidden'] && $_POST['foto_hidden'] !== 'default.jpg')){
				unlink("./assets/images/" . $_POST['foto_hidden']);
			}

			$file_name = $this->upImages($_FILES);

			if(empty($file_name)){

				$file_name = $_POST['foto_hidden'];
				// caso ele n exista seta null para salvar default
				if(!file_exists('./assets/images/'. $file_name)){
					$file_name = null;
				}
				
				if(empty($file_name)){
					$file_name = 'default.jpg';
				}
			}
			
			$this->Pacientes_model->Update($_POST, $file_name);
		}
		header("Location: " . base_url() . "index.php/pacientes");
	}

	/** Remove patient data */
	public function Destroy(){
		
		$id = $this->uri->segment(3);

		if(!empty($id)){
			
			$this->Pacientes_model->Destroy($id);
		}

		header("Location: " . base_url() . "index.php/pacientes");
	}

	private function upImages($files){

		if(isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])){
			
			$foto = $_FILES['foto'];

			 // DEFINIÇÕES
			 $tMaximo = 1000000000000;                       /* Tamanho máximo do arquivo (em bytes) */
			 $extensoes = array(".png", ".jpg");             /* Extensões aceitas */
			 $caminho = "./assets/images/";              	 /* Caminho para onde o arquivo será enviado  */
			 $substituir = false;                            /* Substituir arquivo já existente (true = sim; false = nao) */
	 
			 if (!empty($foto['name']))
			 {
	 
				 $randP = md5($foto['name']);                /* Informações do arquivo enviado */
				 $nomeFoto = "";
	 
				 if ($foto["type"] === "image/jpeg")         /* verificar o tipo de arq */
				 {
					 $nomeFoto = $randP.".jpg";
				 }
	 
				 if ($foto["type"] === "image/png")
				 {
					 $nomeFoto = $randP.".jpg";
				 }
	 
				 $tamanhoFoto = $foto["size"];
				 $nomeTemporario = $foto["tmp_name"];
	 
				 if (!empty($nomeFoto))                      /* Verifica se o arquivo foi colocado no campo */
				 {
	 
					 $error = false;
	 
					 if ($tamanhoFoto > $tMaximo)            /* Verifica se o tamanho do arquivo é maior que o permitido */
					 {
						 $error = "O arquivo " . $nomeFoto . " não deve ultrapassar " . $tMaximo . " bytes";
					 }
					 elseif (!in_array(strrchr($nomeFoto, "."), $extensoes))         /* Verifica se a extensão está entre as aceitas */
					 {
						 $error = "A extensão do arquivo <b>" . $nomeFoto . "</b> não é válida";
					 }
					 elseif (file_exists($caminho . $nomeFoto) and !$substituir)     /*  Verifica se o arquivo existe e se é para substituir */
					 {
						 $error = "O arquivo <b>" . $nomeFoto . "</b> já existe";
					 }


					 if (!$error)                                                            /* Se não houver erro */
					 {
						 move_uploaded_file($nomeTemporario, ($caminho . $nomeFoto));        /* Move o arquivo para o caminho definido */
						 echo "O arquivo <b>" . $nomeFoto . "</b> foi enviado com sucesso. <br />";
					 }
					 else                                                                        /* Se houver erro */
					 {
						 echo $error . "<br />";
					 }
				 }
			 }
			 else
			 {
				 $nomeFoto = "default.jpg";
			 }
	 
			 return $nomeFoto;
		}
	}
}
