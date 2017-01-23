<?php require_once('../Connections/Ekaterina.php'); ?>

<?php
$maxRows_Recordset1 = 30;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_Ekaterina, $Ekaterina);
$query_Recordset1 = "SELECT * FROM domviolence WHERE lang = 2 ORDER BY added DESC";
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
$query_Recordset2 = sprintf("SELECT * FROM domviolence WHERE lang = 2 and id = '%s'", $colname_Recordset2);
$Recordset2 = mysql_query($query_Recordset2, $Ekaterina) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>"Ekaterina" - the Sverdlovsk regional crisis center</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<script language="JavaScript" src="menu\toggle.js"></script>
<link rel="stylesheet" href="menu\toggle.css">
<style type="text/css">
<!--
.style39 {
          color: #000000;
	  font-size: 16px;
}
}
.style49 {
          color: #000000;
          font-size:20px;
}
-->
</style>
</head>

<body onload="initPage()">
<table width="100%" height="100%" cellpadding="0" cellspacing="0">
  <tr>
    <th><table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
      <tr bgcolor="#B7D6F8">
        <th width="15%">
            <table border='0'>
                <tr>
                    <td width="40%">Our assistance is<br>anonymous and free!</td>
                </tr>
                <tr>
                      <td>+7 (952) 146-22-23</td>
              </tr>
            </table>
        </th>
        <th scope="col">
              <img src="../image/tablebackground8.jpg" width="100%">
        </th>
        <th width="15%">
            <a href="http://www.112.ru/">
                <table height="120" border='0'>
                    <tr>
                        <td width="40%"><img src="../image/frst_logo.png" border="0" align="right"></td>
                        <td>Russian Federation Law-enforcement Portal</td>
                    </tr>
                </table>
            </a>
        </th>
        </tr>
      <tr bgcolor="#FFFFFF">
        <td width="15%" valign="top" bgcolor="#B7D6F8"><div align="left"><?php include('menu/toggle.php');?></div></td>
        <td width="70%" bgcolor="#FFFFFF"><p align="left"> </p>
          <?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>
          <p align="center" class="centeredText">  </p>
          <p align="center" class="centeredText">You are afraid to go home.</p>
	  <p align="center" class="centeredText">You are insulted and abused inside your home.</p>
	  <p align="center" class="big">At home your life and the lives of your children are under threat.</p>
          <p align="center" class="xxbig">Stop!</p>
	  <p align="center" class="big">Think!</p>
	  <p align="center" class="xbig">What is going on in your life?</p>
	  <p align="center" class="centeredText">Your home should be the safest place in your life.</p>
          <p align="center" class="xbig anotherColor">And what is it for you?</p>

	  <p align="justify" class="text"><span class="anotherColor">Domestic violence</span> is a complicated and multifaceted social problem that
								     includes physical, psychological, sexual, and economic violence, dependence, and
								     oppression.  Domestic violence is a specific system of behavior used by one family
								     member in order to establish and maintain power and control over other family members.</p>
          <p align="justify">  </p>
          <p align="justify" class="bodyHeader">Domestic violence can be divided into the following four primary categories:</p>
          <ul align="justify" class="text">
		<li align="justify"><p align="justify">	Physical violence - any aggressive forms of behavior that have a physical effect on another person.
			This includes punching, shoving, scratching, spanking, slapping, throwing objects, hitting and kicking,
			spitting, choking, burning, and the use of weapons to inflict physical harm upon another person.
	</p></li><li align="justify">	Psychological violence - the degradation, intimidation, coercion, and isolation of a person.  This includes
			verbal insults, incessant criticism of one's thoughts, feelings, opinions, convictions, and actions, continual
			inquisitive questioning, blackmail, threats to leave the victim and/or kidnap her children, violent threats towards
			the victim and her children, parents, and pets, threats to destroy one's personal property, perpetual control over
			a victim's social interactions (including telephone calls), extreme jealousy, harassment, blaming the victim for all of
			the abuser's problems, and repetitive disruption of a victim's sleep and eating habits.  Psychological violence can also include
			forcing a victim to alter or renounce his/her religious beliefs, morals, values, and principles.
	</li><li align="justify"><p align="justify">	Sexual violence - any sexual act or sexual behavior that is forced upon one's spouse or partner without his/her consent.
			This includes the use of physical force, threats, or blackmail to coerce one's partner into sexual interactions [i.e. sexual
			assault or rape], the infliction of physical pain or harm during sexual activities, denial of the victim's sexual needs, forcing
			the victim to perform sexual acts that are uncomfortable and/or offensive to him/her.  Sexual acts with one's children belong to a
			subcategory called incest.
	</p></li><li align="justify"><p align="justify">	Economic violence - 3the use of money to control one's partner.  This includes refusal to support children, maintaining complete
			control over financial decisions, creating situations in which the victim is obligated to ask for money, requiring the victim to
			track and report all and any purchases, controlling and using the victim's income, forbidding the victim to work, forcing the victim
			to work, and withholding money that the victim has earned.

	</p></li></ul>
	  </p>
          <?php } // Show if recordset empty ?>
          <p align="center" class="bodyHeader"><?php echo $row_Recordset2['name']; ?></p>
          <p align="justify"><?php echo $row_Recordset2['text']; ?></p>
          <p align="right" class="newsDate"> <?php echo $row_Recordset2['added']; ?><br>
              <?php echo $row_Recordset2['author']; ?></p></td>

	<td width="15%" valign="top" height="462" bgcolor="#B7D6F8">
	    <div class="newsHeader">Helpful Information</div>
		<?php do { ?>
		   <table align="left" class="news" width='100%'>
		     <tr>
            		<td><img src="../image/strelka2.jpg" width="7" height="7"></td>
					<td><a href="domviolenceen.php?id=<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['name']; ?></a></td>
		     </tr>
		   </table>
                <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
	</td>

        </tr>
      <tr bgcolor="#B7D6F8">
        <td colspan="3"><?php include('copyrihten.php');?>
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
