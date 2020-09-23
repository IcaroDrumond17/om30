<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<h3>Cadastro</h3>
			<form action="<?php echo base_url();?>index.php/pacientes/inserir" method="POST" enctype="multipart/form-data" id="formCadastro">
				<div class="row">
					<div class="col-md-6">
					<!-- Nome -->
						<div class="form-group">
							<label for="nome_paciente">Nome Completo Paciente*</label>
							<input type="text" class="form-control" id="nome_paciente" name="nome_paciente">
						</div>
					</div>
					<div class="col-md-6">
					<!-- Nome Mãe -->
						<div class="form-group">
							<label for="nome_mae">Nome Completo da Mãe*</label>
							<input type="text" class="form-control" id="nome_mae" name="nome_mae">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
					<!-- Data Nasc -->
						<div class="form-group">
							<label for="nascimento">Data Nascimento*</label>
							<input type="date" class="form-control" id="nascimento" name="nascimento">
						</div>
					</div>
					<div class="col-md-8">
					<!-- Foto -->
						<div class="form-group">
							<label for="foto">Carregar imagem*</label>
							<input type="file" class="form-control" id="foto" name="foto">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
						<!-- CPF -->
							<label for="cpf">CPF*</label>
							<input type="text" class="form-control" id="cpf" name="cpf" onchange="validateCPF()">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<!-- CNS -->
							<label for="cns">CNS (Cartão nacional de saúde)*</label>
							<input type="text" class="form-control" id="cns" name="cns" onchange="validateCNS()">
						</div>
					</div>
				</div>
				<h3>Endereço</h3>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group">
						<!-- logradouro -->
							<label for="logradouro">Rua*</label>
							<input type="text" class="form-control" id="logradouro" name="logradouro">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
						<!-- CEP -->
							<label for="cep">CEP*</label>
							<input type="text" class="form-control" id="cep" name="cep" onchange="getDataCEP()">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						<!-- Numero -->
							<label for="numero">Numero*</label>
							<input type="text" class="form-control" id="numero" name="numero">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						<!-- Complemento -->
							<label for="complemento">Complemento</label>
							<input type="text" class="form-control" id="complemento" name="complemento">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						<!-- Bairro -->
							<label for="bairro">Bairro*</label>
							<input type="text" class="form-control" id="bairro" name="bairro">
						</div>
					</div>
					
				</div>
				<div  class="row">
					<div class="col-md-10">
						<div class="form-group">
						<!-- Cidade -->
							<label for="cidade">Cidade*</label>
							<input type="text" class="form-control" id="cidade" name="cidade">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
						<!-- UF -->
							<label for="uf">UF*</label>
							<input type="text" class="form-control" id="uf" name="uf">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="historico">Histórico Paciente</label>
							<textarea class="form-control" id="historico" name="historico" rows="3"></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<button type="button" id="salvar" class="btn btn-primary">Salvar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<style>
	.error{
		color:#FF6347; /* cor do texto */
	}

	.validacaocpf{
	color: #FF6347; /* cor do texto */
	}

	.validacaocns{
	color: #FF6347; /* cor do texto */
	}

	.validacaocep{
	color: #FF6347; /* cor do texto */
	}
</style>
<script type="text/javascript">

	var noAccept = false;
	
	// mascara cpf
	$('#cpf').mask('000.000.000-00', {reverse: true});
	// mascara cns
	$('#cns').mask('000 0000 0000 0000', {reverse: true});
	// mascara cep
	$('#cep').mask('00000-000', {reverse: true});

	getDataCEP();

	$("#formCadastro").validate({
       rules: {       
			nome_paciente: {
               required: true,
			   minlength:3
           	},       
			nome_mae: {
               required: true,
			   minlength:3
           	},   
			nascimento: {
               required: true
           	},
		   	foto: {
               required: false,
			   extension: "jpg|jpeg|png"
           	},
		   	cpf: {
               required: true
           	},  
		   	cns: {
               required: true
           	}, 
			logradouro: {
               required: true,
			   minlength:3
           	},      
			numero: {
               required: true,
			   minlength:1
           	},   
			complemento: {
               required: false
           	},   
			bairro: {
               required: true,
			   minlength:3
           	},    
			cidade: {
				required: true,
				minlength:3
          	},     
			uf: {
               required: true,
			   rangelength:[2,2]
           	},
		   	historico: {
               required: false
           	}
       },
       messages: {          
			nome_paciente: {
                required: "* O campo Nome não pode ser branco",
				minlength:"O nome deve ter pelo menos 3 caracteres"
            },
			nome_mae: {
                required: "* O campo nome da Mãe não pode ser branco",
				minlength:"O nome deve ter pelo menos 3 caracteres" 
            },
			nascimento: {
                required: "* O campo Data de Nascimento não pode ser branco" 
            },
			foto: {
                extension: "* Tipo de Arquivo não permitido" 
            },
			cpf: {
                required: "* O campo CPF não pode ser branco" 
            },
			cns: {
                required: "* O campo CNS não pode ser branco" 
            },
			logradouro: {
                required: "* O campo Rua não pode ser branco",
				minlength:"O nome deve ter pelo menos 3 caracteres" 
            },
			numero: {
                required: "* O campo Número não pode ser branco",
				minlength:"O nome deve ter pelo menos 1 caractere" 
            },
			bairro: {
                required: "* O campo Bairro não pode ser branco" ,
				minlength:"O nome deve ter pelo menos 3 caracteres"
            },
			cidade: {
                required: "* O campo Cidade não pode ser branco",
				minlength:"O nome deve ter pelo menos 3 caracteres" 
            },
			uf: {
                required: "* O campo UF não pode ser branco",
				rangelength:"O nome deve ter 2 caracteres" 
            },
       }
	});

	/**
		FUNÇÃO DE VALIDAÇÃO DO CPF	
	 */
	function validateCPF(){

		$('.validacaocpf').remove();

		var cpf_validar = $("#cpf");

		if(cpf_validar.val()){
			var validacaocpf = '<div class="validacaocpf">CPF inválido.<span></span></div>';	
			var cpf = cpf_validar.val().replace(/[^0-9]/g, '').toString();
			var resultado = false;

			if(cpf.length != 11)
			{
				noAccept = true;
				// retorna: CPF inválido
				cpf_validar.after(validacaocpf);
				$(".validacaocpf span");
				return;
			}
				
			var v = [];

			//Faz o cálculo do primeiro dígito de verificação
			v[0] = 1 * cpf[0] + 2 * cpf[1] + 3 * cpf[2];
			v[0] += 4 * cpf[3] + 5 * cpf[4] + 6 * cpf[5];
			v[0] += 7 * cpf[6] + 8 * cpf[7] + 9 * cpf[8];
			v[0] = v[0] % 11;
			v[0] = v[0] % 10;

			//Faz o cálculo do segundo dígito de verificação
			v[1] = 1 * cpf[1] + 2 * cpf[2] + 3 * cpf[3];
			v[1] += 4 * cpf[4] + 5 * cpf[5] + 6 * cpf[6];
			v[1] += 7 * cpf[7] + 8 * cpf[8] + 9 * v[0];
			v[1] = v[1] % 11;
			v[1] = v[1] % 10;

			//Valida o cpf caso so dígitos de verificação forem os esperados
			if ((v[0] != cpf[9]) || (v[1] != cpf[10]))
			{
				noAccept = true;
				// retorna: CPF inválido
				cpf_validar.after(validacaocpf);
				$(".validacaocpf span");
				return;
			}

		}else{
			noAccept = true;
			// retorna: CPF inválido
			cpf_validar.after(validacaocpf);
				$(".validacaocpf span");
				return;
		}

		noAccept = false;
			
	}

	/**
		FUNÇÕES DE VALIDAÇÃO DO CNS
	 */
	function validateCNS(){

		$('.validacaocns').remove();

		var cns = $("#cns");

		if(cns.val())
		{
			var validacaocns = '<div class="validacaocns">CNS inválido.<span></span></div>';
			var cns_validar = cns.val().replace(/[^0-9]/g, '').toString();
			var resultado = false;

			if(cns_validar.length != 15)
			{
				noAccept = true;
				// retorna: cns inválido
				cns.after(validacaocns);
				$(".validacaocns span");
				return;
			}

			var primeiroN = cns_validar.substr(0,1);

			switch(primeiroN){
				case '1':
				case '2':
					resultado = validaCNS(cns_validar);
					break;
				case '7':	
				case '8':
				case '9':
					resultado = validaCNSProvisorio(cns_validar);
					break;
				default:
					resultado = false;
					break;	
			}	

			if(!resultado){
				noAccept = true;
				// retorna: cns inválido
				cns.after(validacaocns);
				$(".validacaocns span");
				return;
			}	
		}else{
			noAccept = true;
			// retorna: cns inválido
			cns.after(validacaocns);
				$(".validacaocns span");
				return;
		}

		noAccept = false;
	}

	function validaCNS(cns){
		var pis = cns.substr(0,11);
		var soma = 0;
		var dv = 0;
		var resultado = '';

		for(var i = 0; i < pis.length; i++){
			soma += parseInt(pis.substr(i, 1), 10)  * (15 - i);
		}

		dv = 11 - (soma % 11);
		dv = (dv != 11) ? dv : 0;

		if(dv == 10){
			soma += 2;
			dv = 11 - (soma % 11);
			resultado = pis+'001'+dv.toString();
		}else{
			resultado = pis+'000'+dv.toString();
		}

		if(cns != resultado)
		{
			return false
		}
		else{
			return true;
		}
			
	}

	function validaCNSProvisorio(cns){
		var soma = 0;

		for(var i = 0; i < cns.length; i++){
			soma += parseInt(cns.substr(i, 1), 10)  * (15 - i);
		}

		return soma % 11 == 0 && i == 15;
	}

	/** RETORNAR DADOS DO CEP */
	function getDataCEP(){

		$('.validacaocep').remove();
		
		var cep = $("#cep");

		if(cep.val()){
			var validacaocep = '<div class="validacaocep">CEP inválido.<span></span></div>';

			var cep_val = cep.val().replace(/[^0-9]/g, '').toString();

			if(cep_val.length != 8){
				noAccept = true;
				$("#logradouro").val('').prop("readonly", false);
				$("#comnplemento").val('').prop("readonly", false);
				$("#bairro").val('').prop("readonly", false);
				$("#cidade").val('').prop("readonly", false);
				$("#uf").val('').prop("readonly", false);
				// retorna: meno que 8 digitos
				cep.after(validacaocep);
				$(".validacaocep span");
				return;
			}

			// buscando dados do cep
			$.ajax({
				type : "GET",
				dataType : "jsonp",
				url : `https://viacep.com.br/ws/${cep_val}/json/`,
				success: function(data){
					// rua
					data.logradouro == '' ? $("#logradouro").val(data.logradouro).attr('readonly', false) : $("#logradouro").val(data.logradouro).attr('readonly', true);
					// complemento
					data.comnplemento == '' ? $("#comnplemento").val(data.comnplemento).attr('readonly', false) : $("#comnplemento").val(data.comnplemento).attr('readonly', true);
					// bairro
					data.bairro == '' ? $("#bairro").val(data.bairro).attr('readonly', false) : $("#bairro").val(data.bairro).attr('readonly', true);
					// cidade
					data.localidade == '' ? $("#cidade").val(data.localidade).attr('readonly', false) : $("#cidade").val(data.localidade).attr('readonly', true);
					// uf
					data.uf == '' ? $("#uf").val(data.uf).attr('readonly', false) : $("#uf").val(data.uf).attr('readonly', true);
				}
			});

		}else{
			noAccept = true;
			$("#logradouro").val('').prop("readonly", false);
			$("#comnplemento").val('').prop("readonly", false);
			$("#bairro").val('').prop("readonly", false);
			$("#cidade").val('').prop("readonly", false);
			$("#uf").val('').prop("readonly", false);
			return;
		}

		noAccept = false;
	}

	// validar ao enviar
	$("#salvar").on("click", function (e) {
		if (!$("#formCadastro").valid()) {
			e.preventDefault();
		}

		if(noAccept){
			e.preventDefault();
			return;
		}

		// enviar dados
		$("#formCadastro").submit();
		
	});

</script>
