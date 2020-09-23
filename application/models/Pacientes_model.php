<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/** */

class Pacientes_model extends CI_Model {

	private $table = 'om30_pacientes';

	function ___construct(){
		parent::Model();
	}

	/** Get all patients */
	public function ShowAll(){
		
		$sql = $this->db->query("SELECT id, nome_paciente, nome_mae,
								CONCAT(SUBSTR(cpf, 1, 3), '.', SUBSTR(cpf, 4, 3), '.', SUBSTR(cpf, 7, 3), '-',
                                                                SUBSTR(cpf, 10, 2)) as cpf, 
								CONCAT(SUBSTR(cns, 1, 3), ' ', SUBSTR(cns, 4, 4), ' ', SUBSTR(cns, 8, 4), ' ',
                                                                SUBSTR(cns, 11, 4)) as cns,
								CONCAT(SUBSTR(cep, 1, 5), '-', SUBSTR(cep, 6, 3)) as cep,
								nascimento, foto, logradouro, numero, complemento, bairro, cidade, uf, historico FROM ".$this->table);

		return $sql->num_rows() > 0 ? $sql->result_array() : [];
	}

	/** Recording patient data */
	public function Store($data, $files = []){
		extract($this->AllData($data));

		$array_insert = [
			'nome_paciente' => $nome_paciente,
			'nome_mae' => $nome_mae,
			'nascimento' => $nascimento,
			'foto' => $file,
			'cpf' => $cpf,
			'cns' => $cns,
			'cep' => $cep,
			'logradouro' => $logradouro,
			'numero' => $numero,
			'complemento' => $complemento,
			'bairro' => $bairro,
			'cidade' => $cidade,
			'uf' => $uf,
			'historico' => $historico
		];

		return $this->db->query($this->db->insert_string($this->table, $array_insert));
	}
	
	/** Update patient data */
	public function Update($data, $file = null){
		extract($this->AllData($data));
	
		$array_update = [
			'id' => $id,
			'nome_paciente' => $nome_paciente,
			'nome_mae' => $nome_mae,
			'nascimento' => $nascimento,
			'foto' => $file,
			'cpf' => $cpf,
			'cns' => $cns,
			'cep' => $cep,
			'logradouro' => $logradouro,
			'numero' => $numero,
			'complemento' => $complemento,
			'bairro' => $bairro,
			'cidade' => $cidade,
			'uf' => $uf,
			'historico' => $historico
		];

		$this->db->where('id', $id);
		return $this->db->update($this->table, $array_update);
	}

	/** Remove patient data */
	public function Destroy($id){
		
		if($id > 0){
			$this->db->where('id', $id);
			return $this->db->delete($this->table);
		}
	}

	/** validates the array fields in a new array */
	private function AllData($data){
		
		$newData = [];

		if(isset($data['id'])){
			$newData['id'] = addslashes ($data['id']);
		}

		if(isset($data['nome_paciente'])){
			$newData['nome_paciente'] = addslashes ($data['nome_paciente']);
		}

		if(isset($data['nome_mae'])){
			$newData['nome_mae'] = addslashes ($data['nome_mae']);
		}

		if(isset($data['nascimento'])){
			$newData['nascimento'] = addslashes ($data['nascimento']);
		}

		if(isset($data['cpf'])){
			$newData['cpf'] = addslashes (preg_replace('/[^0-9]/', '', $data['cpf']));
		}

		if(isset($data['cns'])){
			$newData['cns'] = addslashes (preg_replace('/[^0-9]/', '', $data['cns']));
		}

		if(isset($data['cep'])){
			$newData['cep'] = addslashes (preg_replace('/[^0-9]/', '', $data['cep']));
		}

		if(isset($data['logradouro'])){
			$newData['logradouro'] = addslashes ($data['logradouro']);
		}

		if(isset($data['numero'])){
			$newData['numero'] = addslashes ($data['numero']);
		}

		if(isset($data['complemento'])){
			$newData['complemento'] = addslashes ($data['complemento']);
		}

		if(isset($data['bairro'])){
			$newData['bairro'] = addslashes ($data['bairro']);
		}

		if(isset($data['cidade'])){
			$newData['cidade'] = addslashes ($data['cidade']);
		}

		if(isset($data['uf'])){
			$newData['uf'] = addslashes ($data['uf']);
		}

		if(isset($data['historico'])){
			$newData['historico'] = addslashes ($data['historico']);
		}

		return $newData;
	}
}
