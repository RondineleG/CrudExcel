<html>
<head>
<?php
include "module/header.php";
include "module/alerts.php";
include "config/connect.php"; 

$sql = mysqli_query($connection,"SELECT id, nama, email, hp FROM bugs.t_member ORDER BY ID DESC");
?>
</head>

<body >
<div class="container">
<?php include "module/nav.php"; ?>
    <div class="page-header">
        <h1>Lista de Mensagem Contatos</h1>
    </div>
    <div class="dropdown">
				<span class="glyphicon glyphicon-cog btn-lg text-success" id="dropdownMenu1"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> menu</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="form_contato.php">Cadastrar</a></li>
            <li><a href="gerar_planilha.php">Gerar Relatório Excel</a></li>
        </ul>
    </div>
    <div class="row ">

        <div class="col-lg-4">
            <div class="input-group">
                <input type="text" size="30" class="form-control" maxlength="1000" value="" id="S" />
                <span class="input-group-btn">
	<input type="button" class="btn btn-default" value="Search""/>
	</span>
            </div>
        </div>
        <div class="col-lg-4">
            <a href="export.php" class="btn btn-success">
                <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Export to Excel</a>
        </div>
    </div>
        <div class="span">
            <a href="form_contato.php"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
            <a href="gerar_planilha.php"><button type='button' class='btn btn-sm btn-success'>Gerar Excel</button></a>
        </div>
    </div>
<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Bugs</h1>
        </div>
    </div>
</div>
<p>
<div class="row">
<br />
<div class="row">
	<div class="col-md-12">
	<p>
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th width="5%"><center>NO</center></th>
					<th>NAMA</th>
					<th>EMAIL</th>
					<th>HP</th>
					<th width="15%"><center>ACTION</center></th>
				</tr>
			</thead>
			<tbody id="data">
			<?php $no=1; while ($row = mysqli_fetch_array($sql)) { ?>
				<tr>
					<td align="center"><?php echo $no; ?></td>
					<td><?php echo $row['nama']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['hp']; ?></td>
					<td align="center">
					<a href="edit.php?id=<?php echo $row['id']; ?>">update</a> 
					| 
					<a href="delete.php?id=<?php echo $row['id']; ?>"
                       onclick ="if (!confirm('Apakah Anda yakin akan menghapus data ini?'))
                           return false;">delete</a>
					</td>
				</tr>
			<?php $no++; } ?>	
			</tbody>
		</table>
	</p>	
	</div>
</div>
</div>
<div class="container theme-showcase" role="main">
    <div class="page-header">
        <h1>Lista de Mensagem Contatos</h1>
    </div>
    <div class="dropdown">
				<span class="glyphicon glyphicon-cog btn-lg text-success" id="dropdownMenu1"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> menu</span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="form_contato.php">Cadastrar</a></li>
            <li><a href="gerar_planilha.php">Gerar Relatório Excel</a></li>
        </ul>
    </div>
    <div class="row espaco">
        <div class="pull-right">
            <a href="form_contato.php"><button type='button' class='btn btn-sm btn-success'>Cadastrar</button></a>
            <a href="gerar_planilha.php"><button type='button' class='btn btn-sm btn-success'>Gerar Excel</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">Assunto</th>
                    <th class="text-center">Inserido</th>
                    <th class="text-center">Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row_msg_contatos = mysqli_fetch_assoc($resultado_msg_contatos)){?>
                    <tr>
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

    <?php
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
</div>

<?php include "module/footer.php"; ?>
</body>
</html>
