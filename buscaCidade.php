<?php
	include_once('conexao.php');

	// capturamos o valor inserido no input Codigo e atribuimos a uma variavel
	//$codigo = filter_input(INPUT_GET, 'codigo');
	$codigo = $_GET['codigo'];

	//se a houver valor inserido no campo faça
	if(!empty($codigo)){
		//comando para tentar localizar o valor inserido no banco
		$comando = "SELECT * FROM cidade WHERE codigo = '$codigo' LIMIT 1";
		//variavel declarada como array
		$valores = array();
		// valida a conexão e o comando com o BD 
		$validaS  = mysqli_query($mysqli, $comando);                                           
		
		//se a consulta resultar em valores de linhas diferentes de 0
		if($validaS->num_rows != 0){
			// a variavel associa o valor recebido da consulta com a validação
			$linha = $consulta = mysqli_fetch_assoc($validaS);       
			// o campo cidade recebe o que estiver na linha no campo cidade
			$valores['cidade'] = $linha['cidade'];
		}else{
			// se não preenche o campo cidade com a mensagem depois do =
			$valores['cidade'] = 'Cidade não localizada';
		}

		//retorna o valor verificado para o arquivo js
		echo json_encode($valores);
	}
?>
