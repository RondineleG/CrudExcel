<html>
<head>
    <?php
    session_start();
    include "module/header.php";
    include "module/alerts.php";
    include "config/connect.php";
    ?>
</head>
<body>
<div class="container">
<?php include "module/nav.php"; ?>
		<?php
			if(isset($_POST['nome'])){
				$pesquisar = $_POST['nome'];
				//Selecionar  os itens da página
				$result_msg_contatos = "SELECT * FROM mensagens_contatos WHERE nome LIKE '%$pesquisar%' LIMIT 30";
				$resultado_msg_contatos = mysqli_query($connection , $result_msg_contatos);				
			}else{
				//Verificar se esta sendo passado na URL a página atual, senão é atribuido a pagina
				$pagina=(isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
				
				//Selecionar todos os itens da tabela 
				$result_msg_contato = "SELECT * FROM mensagens_contatos";
				$resultado_msg_contato = mysqli_query($connection , $result_msg_contato);
				
				//Contar o total de itens
				$total_msg_contatos = mysqli_num_rows($resultado_msg_contato);
				
				//Seta a quantidade de itens por página
				$quantidade_pg = 20;
				
				//calcular o número de páginas 
				$num_pagina = ceil($total_msg_contatos/$quantidade_pg);
				
				//calcular o inicio da visualizao	
				$inicio = ($quantidade_pg*$pagina)-$quantidade_pg;
				
				//Selecionar  os itens da página
				$result_msg_contatos = "SELECT * FROM mensagens_contatos limit $inicio, $quantidade_pg";
				$resultado_msg_contatos = mysqli_query($connection , $result_msg_contatos);
				$total_msg_contatos = mysqli_num_rows($resultado_msg_contatos);
			}
		?>
			<form class="form-horizontal" method="POST" action="">
				<div class="form-group">
					<label class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-8">
						<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome do Usuários" value="">
					</div>
					<div class="col-sm-2">
						<button type="submit" class="btn btn-info">Pesquisar</button>
					</div>
				</div>
			</form>	<hr>
			<form method="POST" action="gerar_planilha_especifica.php">
				<div class="row espaco">
					<div class="pull-right">					
						<a href="form_contato.php"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
						<a href="gerar_planilha.php"><button type='button' class='btn btn-sm btn-danger'>Gerar Excel</button></a>
						<input type="submit" value="Excel Especifico" class='btn btn-sm btn-warning'>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<table class="table">
							<thead>
								<tr>
									<th class="text-center">Selec.</th>
									<th class="text-center">Id</th>
									<th class="text-center">Tipo</th>
									<th class="text-center">Local</th>
									<th class="text-center">Descrição</th>
									<th class="text-center">Inserido</th>
									<th class="text-center">Ação</th>
								</tr>
							</thead>
							<tbody>
								<?php while($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)){?>
									<tr>
										<?php $id = $row_msg_contatos["id"]; ?>
										<td class="text-center">
											<?php echo "<input type='radio' name='msg_contato[$id]' value='1'" ?>
										</td>
										<td class="text-center"><?php echo $row_msg_contatos["id"]; ?></td>
										<td class="text-center"><?php echo $row_msg_contatos["nome"]; ?></td>
										<td class="text-center"><?php echo $row_msg_contatos["email"]; ?></td>
										<td class="text-center"><?php echo $row_msg_contatos["assunto"]; ?></td>
										<td class="text-center"><?php echo date('d/m/Y H:i:s',strtotime($row_msg_contatos["created"])); ?></td>
										<td class="text-center">								
											<a href="#">
												<span class="glyphicon glyphicon-eye-open text-primary" aria-hidden="true"></span>
											</a>
											<a href="#">
												<span class="glyphicon glyphicon-pencil text-warning" aria-hidden="true"></span>
											</a>
											<a href="#">
												<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>
											</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</form>
			<?php
			if(!isset($_POST['nome'])){
				//Verificar pagina anterior e posterior
				$pagina_anterior = $pagina - 1;
				$pagina_posterior = $pagina + 1;
				?>
				<nav class="text-center">
					<ul class="pagination">
						<li>
							<?php 
								if($pagina_anterior != 0){
									?><a href="administrativo.php?link=50&pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a><?php
								}else{
									?><span aria-hidden="true">&laquo;</span><?php
								}
							?>
						</li>
						<?php
							//Apresentar a paginação
							for($i = 1; $i < $num_pagina + 1; $i++){
								?>
									<li><a href="administrativo.php?link=50&pagina=<?php echo $i; ?>">
										<?php echo $i; ?>
									</a></li>
								<?php
							}
						?>
						<li>
							<?php 
								if($pagina_posterior <= $num_pagina){
									?><a href="administrativo.php?link=50&pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a><?php
								}else{
									?><span aria-hidden="true">&raquo;</span><?php
								}
							?>
						</li>
					</ul>
				</nav>
			<?php } ?>
		</div>
</body>

<?php include "module/footer.php"; ?>
</body>
</html>