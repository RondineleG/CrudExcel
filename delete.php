<?php
include "config/connect.php";

mysqli_query($connection,"DELETE FROM bugs.t_member WHERE ID = '".$_GET['id']."'");
echo "<script language=javascript>parent.location.href='recap.php';</script>";
?>