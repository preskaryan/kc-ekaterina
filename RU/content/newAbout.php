<?php require_once('../Connections/Ekaterina.php'); ?>
<?php
$maxRows_Recordset1 = 10;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM news WHERE lang = '1' ORDER BY id DESC";
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
?>

<div class="information">

          <p align="center" class="bodyHeader">��� ��?</p>
          <p align="left" class="text">������������ ������������ ������������ ����������� ���������� ����� ��� ������ � �����, ���������� ������� � ����� ����������. </p>
              <p align="center" class="bodyHeader">���� ��������</p>
            <div align="left">
			        <p class="text">�������������� ����� ��� ������������ �� ������� � �����: +7 (952) 146-22-23<br>(����� ������ - ��, ��, �� � 12.00 �� 17.00)</p>
              <p class="text">����������� �����: <a href="mailto:kc-ekaterina@mail.ru">kc-ekaterina@mail.ru</a><br>
            </div>
          <p align="center" class="bodyHeader">��� �� ��������?</p>
          <p align="left" class="text">��������� ����� ��� ������ ���������� ���������� �������� � ������������� 6 ����� 1998, ���� �������� �� �������� ��������� ������� ������� ���������������� ������ � 1996 ����. ����� ������������ 4 �������.<br>
          ������ ���� ����������� ����� ����������� �������� ��������� ������ � �������� � ����� � �. �������������. �� ���� �������� �� ������ ���������������, ������ ����������������� ����� �� ������ ���������� ���, �� � ��������������� ������� ������. </p>
          <p align="center">
              <span class="bodyHeader">���� ����</span></p>
          <p align="left" class="text">�������� ����������, ���������������, ����������� ������ � ��������� ��������, ������������ �� ��������� �������; ����������� ��������� �� ��������� ������� � ����� � ����������� ������ �� ������ ������ � �������. </p>
          <p align="center" class="bodyHeader"> ��� �� ����������?</p>
          <p align="left" class="text">����������� ������ �������� �������������� ���������������� ������, ������������ �� ��������� ������� ��� ������������� � ��������� �������� ������ �������� ������� �������, ���������� ������ ��������� � ���������� ��� ������, ��� ������������� �������������� ����������� ������������� ������ � ����. ��������� ������� ������ � �������������, ���������� � ���������� ���������� �������� ���������� �� ���� ��������� ������� � �������� ������. <br>
    ���������� ������ ���������� � �������� �������� �� ��� ���� ��� ��������� ����� ���������: ����������� �������, ���������, ���������� ����������, ������. <br>
    ���������� ����������� ��������� ��������������� � ������������ ������ ������� ������������ � ���������� ������� ������������ ������� � ���������� ������� �� �������� � ��� ��������� ������� ��� ������. </p>
           <p align="center" class="bodyHeader">���� ������</p>
          <p align="left" class="text">������ ����������� - ��������� � ������ ������, �������������� �������, � ������������ �� ������������ �����
			 �������������� � ������������ �������, � ����� �������������� ����� ��������, ������������ (����������) �� ��������� �������,
			������������ ��������������� � � ���������� ����������� ������ ����� (�������� ���������).</p>

</div>

<div class="rightmenu">
          <div class="newsHeader">�������</div>

				<?php do { ?>

		    <table class="news">

            		 <tr>
				<td rowspan="2"><img src="../image/strelka2.jpg" width="7" height="7"></td>
            			<td><a href="<?php echo $row_Recordset1['link']; ?>"><?php echo $row_Recordset1['news']; ?></a></td>
			 </tr>
			 <tr>
              			<td class="newsDate" align="right"><?php echo $row_Recordset1['date']; ?></td>
			 </tr>

			 <tr>
			 <td>



			 </td></tr>


	            </table>
			 <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</div>

<?php
mysql_free_result($Recordset1);
?>
