<html>
<head>
<?php
include "module/header.php";
include "module/alerts.php";
include "config/connect.php"; 
?>
</head>
<body>

<div class="container">
<?php include "module/nav.php"; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="page-header">
            <h1>Salvar Novo Bug</h1>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-6">
	<form id="form_input" method="POST">

<?php
if(isset($_POST['salvar']))
{
	mysqli_query($connection,"INSERT INTO bugs.t_member (nama, email, hp) 
         VALUES ('".$_POST['nama']."','".$_POST['email']."','".$_POST['hp']."')");
	writeMsg('save.sukses');
}
?>

	<div class="form-group">
  		<label class="control-label" for="nama">Nome (obrigatório)</label>
  		<input type="text" class="form-control" name="nama" id="nama" required>
	</div>

	<div class="form-group">
  		<label class="control-label" for="email">Descrição (obrigatório)</label>
  		<input type="email" class="form-control" name="email" id="email" required>
	</div>

	<div class="form-group">
  		<label class="control-label" for="hp">Localização (obrigatório)</label>
  		<input type="text" class="form-control" name="hp" id="hp">
	</div>

	<div class="form-group">
	<input type="submit" value="save" name="save" class="btn btn-primary">
	<input type="reset" value="Reset" class="btn btn-danger">
	</div>
	</form>
	</div>
</div>

</div>
<?php include "module/footer.php"; ?>
</body>
</html>