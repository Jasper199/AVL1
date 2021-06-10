<!DOCTYPE html>
<html>
<head>
	<title>General</title>
	<style type="text/css">
		img {
			margin-right: 0.5vw;
			margin-top: 0.5vh;
		}
	</style>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

<div class="container">
	<form method="post">
		<div class="col-lg-3 col-sm-6">
			<label for="nome" class="form-label">Nome</label>
    		<input type="text" class="form-control" id="nome" name="nome">
		</div>
		<br>
		<div class="col-lg-3 col-sm-6">
			<button type="submit" class="btn btn-success">Jogar</button>
		</div>
	</form>
</div>
<div class="container">
	<div class="col-6">
<br>
<?php 
	if (isset($_POST['nome'])) { 
		$nome = $_POST['nome'];
		$jogador = array();
		$pc = array();
		$final_jogador = 0;
		$final_pc = 0;
		for ($i=0; $i < 5; $i++) { 
			$jogador[$i] = rand(1, 6);
			$pc[$i] = rand(1, 6);
		}
		echo ($nome != '') ? '<h3>'.$nome.'</h3>' : '<h3>Jogador</h3>';
		apresentar($jogador);
		echo '<h3>Computador:</h3>';
		apresentar($pc);
		$pontuacao_jogador = pontuacoes($jogador);
		$pontuacao_pc = pontuacoes($pc);
		for ($i=0; $i < 13; $i++) { 
			$final_jogador += $pontuacao_jogador[$i];
			$final_pc += $pontuacao_pc[$i];
		}
?>
	</div>
	<div class="col-lg-5 col-sm-6">
	 <table class="table">
	 	<thead>
	 		<tr>
	 			<th></th>
	 			<th><?php echo ($_POST['nome'] != '') ? $nome : 'Jogador'; ?></th>
	 			<th>Computador</th>
	 		</tr>
	 	</thead>
	 	<tbody>
	 		<tr>
	 			<td>Jogada 1</td>
	 			<td><?php echo $pontuacao_jogador[0]; ?></td>
	 			<td><?php echo $pontuacao_pc[0]; ?></td>	
	 		</tr>
	 		<tr>
	 			<td>Jogada 2</td>
	 			<td><?php echo $pontuacao_jogador[1]; ?></td>
	 			<td><?php echo $pontuacao_pc[1]; ?></td>
	 		</tr>
	 		<tr>
	 			<td>Jogada 3</td>
	 			<td><?php echo $pontuacao_jogador[2]; ?></td>
	 			<td><?php echo $pontuacao_pc[2]; ?></td>
	 		</tr>
	 		<tr>
	 			<td>Jogada 4</td>
	 			<td><?php echo $pontuacao_jogador[3]; ?></td>
	 			<td><?php echo $pontuacao_pc[3]; ?></td>
	 		</tr>
	 		<tr>
	 			<td>Jogada 5</td>
	 			<td><?php echo $pontuacao_jogador[4]; ?></td>
	 			<td><?php echo $pontuacao_pc[4]; ?></td>
	 		</tr>
	 		<tr>
	 			<td>Jogada 6</td>
	 			<td><?php echo $pontuacao_jogador[5]; ?></td>
	 			<td><?php echo $pontuacao_pc[5]; ?></td>
	 		</tr>
	 		<tr>
	 			<td>Trinca</td>
	 			<td><?php echo $pontuacao_jogador[6]; ?></td>
	 			<td><?php echo $pontuacao_pc[6]; ?></td>
	 		</tr>
	 		<tr>
	 			<td>Quadra</td>
	 			<td><?php echo $pontuacao_jogador[7]; ?></td>
	 			<td><?php echo $pontuacao_pc[7]; ?></td>
	 		</tr>
	 		<tr>
	 			<td>Full house</td>
	 			<td><?php echo $pontuacao_jogador[8]; ?></td>
	 			<td><?php echo $pontuacao_pc[8]; ?></td>
	 		</tr>
	 		<tr>
	 			<td>Sequencia alta</td>
	 			<td><?php echo $pontuacao_jogador[9]; ?></td>
	 			<td><?php echo $pontuacao_pc[9]; ?></td>
	 		</tr>
	 		<tr>
	 			<td>Sequencia baixa</td>
	 			<td><?php echo $pontuacao_jogador[10]; ?></td>
	 			<td><?php echo $pontuacao_pc[10]; ?></td>
	 		</tr>
	 		<tr>
	 			<td>General</td>
	 			<td><?php echo $pontuacao_jogador[11]; ?></td>
	 			<td><?php echo $pontuacao_pc[11]; ?></td>
	 		</tr>
	 		<tr>
	 			<td>Aleatório</td>
	 			<td><?php echo $pontuacao_jogador[12]; ?></td>
	 			<td><?php echo $pontuacao_pc[12]; ?></td>
	 		</tr>
	 	</tbody>
	 	<tfoot>
	 		<th class="table-info">Total:</th>
	 		<th class="table-info"><?php echo $final_jogador; ?></th>
	 		<th class="table-info"><?php echo $final_pc; ?></th>
	 	</tfoot>
	 </table>
	</div>
<?php 
	if ($final_jogador > $final_pc) {
		echo ($nome != '') ? '<h3>'.$nome.' ganhou!</h3>' : '<h3>Jogador ganhou!</h3>';
	} else if ($final_jogador < $final_pc){
		echo '<h3> Computador ganhou!</h3>';
	} else {
		echo '<h3> Empate!</h3>';
	}
} 
?>
</div>
	<?php 

		function apresentar($dados)
		{
			for ($i=0; $i < count($dados); $i++) { 
				echo '<img width="75" src="img/'.$dados[$i].'.gif">';
			}
		}

		function pontuacoes($dados)
		{
			$pontuacao = array();
			for ($i=0; $i < 13; $i++) { 
				$pontuacao[$i] = 0;
			}
			$dados_flip = array_flip($dados);
			if (count($dados) !== count($dados_flip)) {
				for ($i=0; $i < 6; $i++) { 
					$pontuacao[$i] = duplicadosContagem(($i+1), $dados);
				}
				$retornado1 = duplicados($dados);
				if ($retornado1 == 20) {
					$pontuacao[6] = 20;
				} else if ($retornado1 == 30) {
					$pontuacao[6] = 20;
					$pontuacao[7] = 30;
				} else if ($retornado1 == 25) {
					$pontuacao[6] = 20;
					$pontuacao[8] = 25;
				}
				if (count($dados_flip) == 1) {
					$pontuacao[11] = 50;
				}
			} else {
				if (in_array(2, $dados) && in_array(3, $dados) && in_array(4, $dados) && in_array(5, $dados) && in_array(6, $dados)) {
					$pontuacao[9] = 30;
				} else if (in_array(1, $dados) && in_array(2, $dados) && in_array(3, $dados) && in_array(4, $dados) && in_array(5, $dados)) {
					$pontuacao[10] = 40;
				}
			}
			for ($i=0; $i < count($dados); $i++) { 
				$pontuacao[12] += $dados[$i];
			}
			return $pontuacao;
		}

		function duplicadosContagem($valor, $dados)
		{
			$retorno = 0;
			if (in_array($valor, $dados)) {
				$contagem = array_count_values($dados);
				if ($contagem[$valor] > 1) {
					$retorno = $valor * $contagem[$valor];
				}
			}
			return $retorno;
		}

		function duplicados($dados)
		{
			$retorno = 0;
			$contagem = array_count_values($dados);
			foreach ($contagem as $i => $valor) { 
				if ($contagem[$i] == 3) {
					$retorno = 20;
				} else if ($contagem[$i] == 4) {
					$retorno = 30;
				} else if ($contagem[$i] == 3 && count($contagem) == 2) {
					$retorno = 25;
				}
			}
			return $retorno;
		}

	 ?>

</body>
</html>