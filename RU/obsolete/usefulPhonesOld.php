<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$maxRows_Recordset1 = 30;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM trening WHERE lang = '1' ORDER BY added DESC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $Ekaterina) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$colname_Recordset2 = "0";
if (isset($_GET['id'])) {
  $colname_Recordset2 = (get_magic_quotes_gpc()) ? $_GET['id'] : addslashes($_GET['id']);
}
mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset2 = sprintf("SELECT * FROM trening WHERE lang = '1' and id = '%s'", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $Ekaterina) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>���������� ����� ���������� ��� ������ � �����, ���������� ������� � �����</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<script language="JavaScript" src="menu/menu.js"></script>
	<link rel="stylesheet" href="menu/menu.css">
</head>

<body onload="initPage()">
<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><table width="100%" height="100%"  border="0"  cellpadding="0" cellspacing="0">
      <tr bgcolor="#B7D6F8">
        <?php include('include/header.php');?>
      </tr>
      
	  <tr bgcolor="#FFFFFF">
        <td width="15%" valign="top" bgcolor="#B7D6F8"><div align="left"><?php include('menu/menu.php');?></div></td>
        <td width="70%" valign="top" bgcolor="#FFFFFF">



          <?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>


          <p align="center" class="bodyHeader">������ ���������� ��������������� ������</p>
           <div class="textInTable">
         <p align="justify" class="text">�������� �������:</p>
           <table border="1" bordercolor="#3399FF" cellspacing="0" cellpadding="5px" cols="2" width="100%">
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">+7 (952) 146-22-23 <br>(� 12:00 �� 16:00<br>� ��, ��, �� � ��)</td>
                    <td>��������� ����� ����������</td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 332-60-13 <br>(�������������)</td>
                    <td>��� ����� � ����������</td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 371-03-03 <br>(�������������)</td>
                    <td>������� ���������� ��������������� ������</td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 347-77-00 <br>(�������������, <br>� �� �� ��)</td>
                    <td>������</td>
                </tr>
           </table>
           </div>

          <div class="textInTable">
          <p align="justify" class="text">������ ���������-��������������� ������:</p>
          <table border="1" bordercolor="#3399FF" cellspacing="0" cellpadding="5px" cols="2" width="100%">
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">+7 (952) 146-22-23</td>
                    <td>��������� ����� ����������.</td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 212-74-78</td>
                    <td>����� ���������� ������ ����� � ����� ����������,  ����-�������� �����</td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 341-46-78</td>
                    <td>����� ���������� ������ ����� � ����� ����������, ��������� �����</td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 262-24-10</td>
                    <td>����� ���������� ������ ����� � ����� �������, ����������� �����</td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 332-09-60<br>(343) 335-38-16</td>
                    <td>����� ���������� ������������ ��� ����� � ����������, ����������������� �����</td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 258-54-01</td>
                    <td>����� ���������� ������ ����� � �����, ���������� �����</td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 337-77-58</td>
                    <td>��������</td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 355-42-43</td>
                    <td>������������ ��������� ������� ���������</td>
                </tr>
           </table>
           </div>

          <div class="textInTable">
          <p align="justify" class="text">�������-����������� ����������</p>
          <table border="1" bordercolor="#3399FF" cellspacing="0" cellpadding="5px" cols="2" width="100%">
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 240-53-23<br>(� �� �� ��<br>9:00-16:00)</td>
                    <td>��������� ���� �������-����������� ����������</td>
                </tr>
           </table>
           </div>

          <div class="textInTable">
          <p align="justify" class="text">����������� �.�������������:</p>
          <table border="1" bordercolor="#3399FF" cellspacing="0" cellpadding="5px" cols="2" width="100%">
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 258-16-34</td>
                    <td>��� �20, ��. ���������������, 42</td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 256-22-85</td>
                    <td>��� �24 (������������� ��� �40), ���. �������, 16</td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 350-16-51<br>(343) 350-32-59</td>
                    <td>��� �36, ��. ������, 52, ���. �</td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 257-57-01<br>(343) 251-40-51</td>
                    <td>��� �36 (������������� ��� �1,�6),	���. �������, 3</td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 341-73-03</td>
                    <td>��� �7,	��. ��������, 33 </td>
                </tr>
                <tr>
                    <td width="25%" align="center" height="40px" bgcolor="#B7D6F8" class="anotherColor">(343) 334-03-39</td>
                    <td>��� �23,	��. ��. �����������, 9 </td>
                </tr>
           </table>
           </div>

          <?php } // Show if recordset empty ?>
          <p> <span  class="bodyHeader"><br><?php echo $row_Recordset2['name']; ?></span></p>

          <p ><span class="style39"> <div align="left"> <?php echo $row_Recordset2['text']; ?></div></span></p>
 <p align="right">
   <span class="style35">�<?php echo $row_Recordset2['added']; ?>� </span><br>
     <span class="style35"><?php echo $row_Recordset2['author']; ?>�</span></p>
 </td>


        <td width="15%" valign="top" bgcolor="#B7D6F8" height="662">

          <div class="newsHeader">��������</div>

                <?php do { ?>
                    <table align="left" class="news">
                         <tr>
                                <td rowspan="2"><img src="../image/strelka2.jpg" width="7" height="7"></td>
                                <td><a href="trening.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['name']; ?></a></td>
                         </tr>
                         <tr>
                                <td class="newsDate" align="right"><?php echo $row_Recordset1['added']; ?></td>
                         </tr>
                    </table>
                <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
        </td>


      </tr>
      <tr bgcolor="#B7D6F8">
        <td colspan="6"><?php include('include/footer.php');?>
		</td>
        </tr>
    </table></th>
  </tr>
</table>
</body>
</html>

<?php
mysql_free_result($Recordset1);
mysql_free_result($Recordset2);
?>
