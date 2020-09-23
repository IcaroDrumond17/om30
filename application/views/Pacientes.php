<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-body">
			<h3>Pacientes</h3>
			<div class="table-responsive">
				<table class="table">
				<caption>Lista de Pacientes</caption>
				<thead>
					<tr>
					<th scope="col">ID</th>
					<th scope="col">#</th>
					<th scope="col">Nome</th>
					<th scope="col">CPF</th>
					<th scope="col">CNS</th>
					<th scope="col">Data Nascimento</th>
					<th scope="col">Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if(isset($pacientes) && !empty($pacientes)):
							foreach($pacientes as $paciente):
								?>
								<tr>
									<th scope="row"><?php echo $paciente['id']; ?></th>
									<th><img src="<?php echo base_url(); ?>assets/images/<?php echo $paciente['foto']?>" width="30" height="30" style="border-radius: 15px;" ></th>
									<td><?php echo $paciente['nome_paciente']; ?></td>
									<td><?php echo $paciente['cpf']; ?></td>
									<td><?php echo $paciente['cns']; ?></td>
									<td><?php echo date('d/m/Y', strtotime($paciente['nascimento']));?></td>
									<td>
										<button type="button" class="btn btn-info btn-sm"
											title="Ver Dados do Paciente" data-toggle="modal"
											data-target="#info<?php echo $paciente['id']; ?>">
												Ver Dados
										</button>
										<button type="button" class="btn btn-info btn-sm"
											title="Editar Paciente" data-toggle="modal"
											data-target="#edit<?php echo $paciente['id']; ?>">
												Editar
										</button>
										<button type="button" class="btn btn-danger btn-sm"
											title="Excluír Paciente" data-toggle="modal"
											data-target="#remove<?php echo $paciente['id']; ?>">
												Excluír
										</button>
									</td>
								</tr>
								<!-- MODAL INFORMAÇÔES -->
								<div id="info<?php echo $paciente['id']; ?>" class="modal fade" tabindex="-1"
                                   role="dialog" aria-labelledby="modal-default" aria-hidden="true">
									<div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document"
										style="top: 50px;">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title text-black-50">
													<?php echo $paciente['nome_paciente']; ?>
												</h4>
												<img src="<?php echo base_url(); ?>assets/images/<?php echo $paciente['foto']?>" width="100" height="100" style="border-radius: 15px;" >
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-md-6">
													<!-- Nome -->
														<div class="form-group">
															<label for="nome_paciente">Nome Paciente</label>
															<input type="text" class="form-control" value="<?php echo $paciente['nome_paciente']; ?>" disabled>
														</div>
													</div>
													<div class="col-md-6">
													<!-- Nome Mãe -->
														<div class="form-group">
															<label for="nome_mae">Nome Mãe</label>
															<input type="text" class="form-control" value="<?php echo $paciente['nome_mae']; ?>" disabled>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
													<!-- Data Nasc -->
														<div class="form-group">
															<label for="nascimento">Data Nascimento</label>
															<input type="text" class="form-control" value="<?php echo date('d/m/Y', strtotime($paciente['nascimento']));?>" disabled>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
														<!-- CPF -->
															<label for="cpf">CPF</label>
															<input type="text" class="form-control" value="<?php echo $paciente['cpf']; ?>" disabled>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
														<!-- CNS -->
															<label for="cns">CNS (Cartão nacional de saúde)</label>
															<input type="text" class="form-control" value="<?php echo $paciente['cns']; ?>" disabled>
														</div>
													</div>
												</div>
												<h3>Endereço</h3>
												<div class="row">
													<div class="col-md-10">
														<div class="form-group">
														<!-- logradouro -->
															<label for="logradouro">Rua</label>
															<input type="text" class="form-control" value="<?php echo $paciente['logradouro']; ?>" disabled>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
														<!-- CEP -->
															<label for="cep">CEP</label>
															<input type="text" class="form-control" value="<?php echo $paciente['cep']; ?>" disabled>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<div class="form-group">
														<!-- Numero -->
															<label for="numero">Numero</label>
															<input type="text" class="form-control" value="<?php echo $paciente['numero']; ?>" disabled>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
														<!-- Complemento -->
															<label for="complemento">Complemento</label>
															<input type="text" class="form-control" value="<?php echo $paciente['complemento']; ?>" disabled>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
														<!-- Bairro -->
															<label for="bairro">Bairro</label>
															<input type="text" class="form-control" value="<?php echo $paciente['bairro']; ?>" disabled>
														</div>
													</div>
													
												</div>
												<div  class="row">
													<div class="col-md-10">
														<div class="form-group">
														<!-- Cidade -->
															<label for="cidade">Cidade</label>
															<input type="text" class="form-control" value="<?php echo $paciente['cidade']; ?>" disabled>
														</div>
													</div>
													<div class="col-md-2">
														<div class="form-group">
														<!-- UF -->
															<label for="uf">UF</label>
															<input type="text" class="form-control" value="<?php echo $paciente['uf']; ?>" disabled>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<label for="historico">Histórico Paciente</label>
															<textarea class="form-control" disabled> <?php echo $paciente['historico']; ?> </textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-info btn-md"
														data-dismiss="modal">Fechar
												</button>
											</div>
										</div>
									</div>
								</div>
								<!-- MODAL EDITAR -->
								<div id="edit<?php echo $paciente['id']; ?>" class="modal fade" tabindex="-1"
                                   role="dialog" aria-labelledby="modal-default" aria-hidden="true">
									<div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document"
										style="top: 50px;">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title text-black-50">
													<?php echo $paciente['nome_paciente']; ?>
												</h4>
												<img src="<?php echo base_url(); ?>assets/images/<?php echo $paciente['foto']?>" width="100" height="100" style="border-radius: 15px;" >
											</div>
											<div class="modal-body">
												<form id="formEditar<?php echo $paciente['id']; ?>" action="<?php echo base_url();?>index.php/pacientes/atualizar" method="POST" enctype="multipart/form-data">
													<input type="hidden" class="form-control" name="id" id="id<?php echo $paciente['id']; ?>" value="<?php echo $paciente['id']; ?>">
													<input type="hidden" class="form-control" name="foto_hidden" id="foto_hidden<?php echo $paciente['id']; ?>" value="<?php echo $paciente['foto']; ?>">
													<div class="row">
														<div class="col-md-6">
														<!-- Nome -->
															<div class="form-group">
																<label for="nome_paciente">Nome Paciente</label>
																<input type="text" class="form-control" name="nome_paciente" id="nome_paciente<?php echo $paciente['id']; ?>" value="<?php echo $paciente['nome_paciente']; ?>">
															</div>
														</div>
														<div class="col-md-6">
														<!-- Nome Mãe -->
															<div class="form-group">
																<label for="nome_mae">Nome Mãe</label>
																<input type="text" class="form-control" name="nome_mae" id="nome_mae<?php echo $paciente['id']; ?>" value="<?php echo $paciente['nome_mae']; ?>">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
														<!-- Data Nasc -->
															<div class="form-group">
																<label for="nascimento">Data Nascimento</label>
																<input type="date" class="form-control" name="nascimento" id="nascimento<?php echo $paciente['id']; ?>" value="<?php echo date('Y-m-d', strtotime($paciente['nascimento']));?>">
															</div>
														</div>
														<div class="col-md-4">
														<!-- Foto -->
															<div class="form-group">
																<label for="foto">Carregar nova imagem</label>
																<input type="file" class="form-control" id="foto<?php echo $paciente['id']; ?>" name="foto">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
															<!-- CPF -->
																<label for="cpf">CPF</label>
																<input type="text" class="form-control cpf" name="cpf" id="cpf<?php echo $paciente['id']; ?>" value="<?php echo $paciente['cpf']; ?>" onchange="validateCPF(`<?php echo $paciente['id']; ?>`)">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
															<!-- CNS -->
																<label for="cns">CNS (Cartão nacional de saúde)</label>
																<input type="text" class="form-control cns" name="cns" id="cns<?php echo $paciente['id']; ?>" value="<?php echo $paciente['cns']; ?>" onchange="validateCNS(`<?php echo $paciente['id']; ?>`)">
															</div>
														</div>
													</div>
													<h3>Endereço</h3>
													<div class="row">
														<div class="col-md-10">
															<div class="form-group">
															<!-- logradouro -->
																<label for="logradouro">Rua</label>
																<input type="text" class="form-control" name="logradouro" id="logradouro<?php echo $paciente['id']; ?>" value="<?php echo $paciente['logradouro']; ?>">
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
															<!-- CEP -->
																<label for="cep">CEP</label>
																<input type="text" class="form-control cep" name="cep" id="cep<?php echo $paciente['id']; ?>" value="<?php echo $paciente['cep']; ?>" onchange="getDataCEP(`<?php echo $paciente['id']; ?>`)">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
															<!-- Numero -->
																<label for="numero">Numero</label>
																<input type="text" class="form-control" name="numero" id="numero<?php echo $paciente['id']; ?>" value="<?php echo $paciente['numero']; ?>">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
															<!-- Complemento -->
																<label for="complemento">Complemento</label>
																<input type="text" class="form-control" name="complemento" id="complemento<?php echo $paciente['id']; ?>" value="<?php echo $paciente['complemento']; ?>">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
															<!-- Bairro -->
																<label for="bairro">Bairro</label>
																<input type="text" class="form-control" name="bairro" id="bairro<?php echo $paciente['id']; ?>" value="<?php echo $paciente['bairro']; ?>">
															</div>
														</div>
														
													</div>
													<div  class="row">
														<div class="col-md-10">
															<div class="form-group">
															<!-- Cidade -->
																<label for="cidade">Cidade</label>
																<input type="text" class="form-control" name="cidade" id="cidade<?php echo $paciente['id']; ?>" value="<?php echo $paciente['cidade']; ?>">
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
															<!-- UF -->
																<label for="uf">UF</label>
																<input type="text" class="form-control" name="uf" id="uf<?php echo $paciente['id']; ?>" value="<?php echo $paciente['uf']; ?>">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<div class="form-group">
																<label for="historico">Histórico Paciente</label>
																<textarea class="form-control" name="historico" id="historico<?php echo $paciente['id']; ?>"> <?php echo $paciente['historico']; ?> </textarea>
															</div>
														</div>
													</div>
													<button type="button" class="btn btn-success btn-sm"
															title="Salvar Edições"
															id="btn<?php echo $paciente['id']; ?>"
															onclick="save(`<?php echo $paciente['id']; ?>`)">
														Salvar Edições
													</button>
												</form>
											</div>
											<div class="modal-footer">
									
												<button type="button" class="btn btn-info btn-md"
														data-dismiss="modal">Fechar
												</button>
											</div>
										</div>
									</div>
								</div>
								<!-- MODAL EDITAR -->
								<div id="remove<?php echo $paciente['id']; ?>" class="modal fade" tabindex="-1"
                                   role="dialog" aria-labelledby="modal-default" aria-hidden="true">
									<div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document"
										style="top: 50px;">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title text-black-50">
													Paciente: <?php echo $paciente['nome_paciente']; ?>
												</h4>
											</div>
											<div class="modal-body">
												<p>Deseja remover permanentemente o paciente <?php echo $paciente['nome_paciente']; ?>?</p>
												<p><small>Os dados serão apagador permanentemente.</small></p>
												<button type="button" class="btn btn-danger btn-sm"
														title="Excluír Paciente"
														onclick="window.location.href=`<?php echo base_url(); ?>index.php/pacientes/remover/<?php echo $paciente['id']; ?>`">
													Excluír
												</button>
											</div>
											<div class="modal-footer">
									
												<button type="button" class="btn btn-info btn-md"
														data-dismiss="modal">Fechar
												</button>
											</div>
										</div>
									</div>
								</div>
								
								<?php 
							endforeach;
						else:
					?>

					<?php 
						endif;
					?>
				</tbody>
				</table>
			</div>
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

	.validacaomsg{
	color: #FF6347; /* cor do texto */
	}
</style>
<script type="text/javascript">

	var noAccept = false;

	// mascara cpf
	$('.cpf').mask('000.000.000-00', {reverse: true});
	// mascara cns
	$('.cns').mask('000 0000 0000 0000', {reverse: true});
	// mascara cep
	$('.cep').mask('00000-000', {reverse: true});

	getDataCEP();
	/**
		FUNÇÃO DE VALIDAÇÃO DO CPF	
	 */
	function validateCPF(id){

		if(id > 0){

			$('.validacaocpf').remove();

			var cpf_validar = $(`#cpf${id}`);

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
		}

		noAccept = false;	
	}

	/**
		FUNÇÕES DE VALIDAÇÃO DO CNS
	 */
	function validateCNS(id){
		if(id > 0){

			$('.validacaocns').remove();

			var cns = $(`#cns${id}`);

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
	function getDataCEP(id){
		if(id > 0){
			$('.validacaocep').remove();
			
			var cep = $(`#cep${id}`);

			if(cep.val()){
				var validacaocep = '<div class="validacaocep">CEP inválido.<span></span></div>';

				var cep_val = cep.val().replace(/[^0-9]/g, '').toString();

				if(cep_val.length != 8){
					noAccept = true;
					$(`#logradouro${id}`).val('').prop("readonly", false);
					$(`#comnplemento${id}`).val('').prop("readonly", false);
					$(`#bairro${id}`).val('').prop("readonly", false);
					$(`#cidade${id}`).val('').prop("readonly", false);
					$(`#uf${id}`).val('').prop("readonly", false);
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
						data.logradouro == '' ? $(`#logradouro${id}`).val(data.logradouro).attr('readonly', false) : $(`#logradouro${id}`).val(data.logradouro).attr('readonly', true);
						// complemento
						data.comnplemento == '' ? $(`#comnplemento${id}`).val(data.comnplemento).attr('readonly', false) : $(`#comnplemento${id}`).val(data.comnplemento).attr('readonly', true);
						// bairro
						data.bairro == '' ? $(`#bairro${id}`).val(data.bairro).attr('readonly', false) : $(`#bairro${id}`).val(data.bairro).attr('readonly', true);
						// cidade
						data.localidade == '' ? $(`#cidade${id}`).val(data.localidade).attr('readonly', false) : $(`#cidade${id}`).val(data.localidade).attr('readonly', true);
						// uf
						data.uf == '' ? $(`#uf${id}`).val(data.uf).attr('readonly', false) : $(`#uf${id}`).val(data.uf).attr('readonly', true);
					}
				});

			}else{
				noAccept = true;
				$(`#logradouro${id}`).val('').prop("readonly", false);
				$(`#comnplemento${id}`).val('').prop("readonly", false);
				$(`#bairro${id}`).val('').prop("readonly", false);
				$(`#cidade${id}`).val('').prop("readonly", false);
				$(`#uf${id}`).val('').prop("readonly", false);
				return;
			}
		}

		noAccept = false;
	}

	function save(id){

		$('.validacaomsg').remove();
		var validacaomsg = '<div class="validacaocpf">Campo inválido ou em branco.<span></span></div>';

		var array = [
			$(`#nome_paciente${id}`),
			$(`#nome_mae${id}`),
			$(`#nascimento${id}`),
			$(`#cpf${id}`),
			$(`#cns${id}`),
			$(`#cep${id}`),
			$(`#logradouro${id}`),
			$(`#numero${id}`),
			$(`#bairro${id}`),
			$(`#cidade${id}`),
			$(`#uf${id}`),
		];

		for(var i = 0; i < array.length; i++){
			if(!array[i].val()){
				noAccept = true;
				array[i].after(validacaomsg);
				$(".validacaomsg span");
			}
		}

		if(noAccept){
			return;
		}

		noAccept = false;
		// enviar dados
		$(`#formEditar${id}`).submit();
	}
</script>
