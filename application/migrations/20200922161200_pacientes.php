<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_pacientes extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
				'constraint' => 11,
				'unique' => true,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nome_paciente' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
			),
			'nome_mae' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'nascimento' => array(
                'type' => 'DATETIME',
                'null' => FALSE,
			),
			'foto' => array(
                'type' => 'text',
				'null' => TRUE,
			),
			'cpf' => array(
                'type' => 'VARCHAR',
				'constraint' => '11',
				'unique' => true,
			),
			'cns' => array(
                'type' => 'VARCHAR',
				'constraint' => '15',
				'unique' => true,
			),
			'cep' => array(
                'type' => 'VARCHAR',
                'constraint' => '8',
			),
			'logradouro' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
			),
			'numero' => array(
                'type' => 'VARCHAR',
                'constraint' => '11',
			),
			'complemento' => array(
                'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
			),
			'bairro' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
			),
			'cidade' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
			),
			'uf' => array(
                'type' => 'VARCHAR',
                'constraint' => '2',
			),
			'historico' => array(
				'type' => 'text',
				'null' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('om30_pacientes');
    }

    public function down(){
        $this->dbforge->drop_table('om30_pacientes'); 
    }
}
