<?php
function writeMsg($tipe){
	if ($tipe=='save.success') {
		$MsgClass = "alert-success";
		$Msg = "<strong>Sucesso!</strong> Bug salvo com sucesso!";
	} else 
	if ($tipe == 'save.erro') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Oops!</strong> Falha ao salvar os Bug!";
	}
	else 
	if ($tipe == 'update.success') {
		$MsgClass = "alert-success";
		$Msg = "<strong>Sucesso!</strong> Dados atualizados com sucesso. ";
	}
	else 
	if ($tipe == 'update.erro') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Oops!</strong>Falha ao atualizar o Bug!";
	}

echo "<div class=\"alert alert-dismissible ".$MsgClass."\">
  	  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
  	  ".$Msg."
	  </div>";		  
}
?>