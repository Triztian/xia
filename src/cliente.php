<?php require_once('../Connections/prueba.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_prueba, $prueba);
$query_Recordset1 = "SELECT * FROM posiciones";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $prueba) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body {
	background-color: #666;
}
#form1 label {
	color: #FFF;
}
</style>
</head>

<body>
<table width="1562" height="736" border="0">
  <tr>
    <td width="1162" height="732">&nbsp;
      <table border="1" cellpadding="5" cellspacing="5">
        <tr>
          <td width="20" height="20" bgcolor="#FFFFFF">RENGLON</td>
          <td width="50" height="50" bgcolor="#FFFFFF">C1</td>
          <td width="50" height="50" bgcolor="#FFFFFF">C2</td>
          <td width="50" height="50" bgcolor="#FFFFFF">C3</td>
          <td width="50" height="50" bgcolor="#FFFFFF">C4</td>
          <td width="50" height="50" bgcolor="#FFFFFF">C5</td>
          <td width="50" height="50" bgcolor="#FFFFFF">C6</td>
          <td width="50" height="50" bgcolor="#FFFFFF">C7</td>
          <td width="50" height="50" bgcolor="#FFFFFF">C8</td>
          <td width="50" height="50" bgcolor="#FFFFFF">C9</td>
          <td width="50" height="50" bgcolor="#FFFFFF">C10</td>
        </tr>
        <?php do { ?>
          <tr>
            <td width="20" height="20" bgcolor="#FFFFFF"><?php echo $row_Recordset1['RENGLON']; ?></td>
            <td width="50" height="50" bgcolor="#FFFFFF"><?php echo $row_Recordset1['C1']; ?></td>
            <td width="50" height="50" bgcolor="#FFFFFF"><?php echo $row_Recordset1['C2']; ?></td>
            <td width="50" height="50" bgcolor="#FFFFFF"><?php echo $row_Recordset1['C3']; ?></td>
            <td width="50" height="50" bgcolor="#FFFFFF"><?php echo $row_Recordset1['C4']; ?></td>
            <td width="50" height="50" bgcolor="#FFFFFF"><?php echo $row_Recordset1['C5']; ?></td>
            <td width="50" height="50" bgcolor="#FFFFFF"><?php echo $row_Recordset1['C6']; ?></td>
            <td width="50" height="50" bgcolor="#FFFFFF"><?php echo $row_Recordset1['C7']; ?></td>
            <td width="50" height="50" bgcolor="#FFFFFF"><?php echo $row_Recordset1['C8']; ?></td>
            <td width="50" height="50" bgcolor="#FFFFFF"><?php echo $row_Recordset1['C9']; ?></td>
            <td width="50" height="50" bgcolor="#FFFFFF"><?php echo $row_Recordset1['C10']; ?></td>
          </tr>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
    </table></td>
    <td width="390"><form id="form1" name="form1" method="post" action="">
      <label for="mensaje">mensaje</label>
      <input type="text" name="mensaje" id="mensaje" />
    </form></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
