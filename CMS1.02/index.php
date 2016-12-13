<html>
<head>
      <title>Новости</title>
      <META http-equiv=Content-Type content="text/html; charset=windows-1251">
      <LINK href="data/PCSs.css" type=text/css rel=stylesheet>
      <?php include ("config.php"); ?>
<body><br>
<TABLE cellSpacing=1 cellPadding=1 width=400 align=center bgColor=#ffcc00 border=0>
<TR vAlign=top bgColor=#1f2f3f>
<TD>
<TABLE cellSpacing=0 cellPadding=1 width="100%" align=center border=0>
<TR bgColor=#1f2f3f><TD align=middle colSpan=2><FONT face=verdana color=#ffcc00 size=2><B>Новости сайта</B></FONT></TD></TR>
</TABLE></TD></TR></FONT></TD></TR></TABLE>
<br>
<?php

if (file_exists("data/news.txt")){
$t = file("data/news.txt") or exit("<TABLE cellSpacing=1 cellPadding=3 width=400 align=center bgColor=#ffcc00 border=0><TR bgColor=#425d7a><TD><FONT face=verdana color=#dfd8df size=1><center><b>Новостей нет</b></font></TD></font></TR></TABLE>
<hr color='ffcc00' size='10' width='100%'>
</font></center>
");

}else{
$fp = @fopen("data/news.txt","w") or exit("ОШИБКА");
fclose($fp);
}
if (!empty($t)){

for($i=(count($t)-1);$i>=0;$i--){
echo $t[($i)];
}
}

?>
<center><a href="admin.php">Перейти в Admin Panel</a></center>
<hr color='ffcc00' size='10' width='100%'>
</body></html>

<?php require_once("include_options.php");?>