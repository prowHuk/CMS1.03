<html>
<head>
<script language="javascript" type="text/javascript">

<!--

setTimeout("location.href='admin.php?pswrd=sTEREo'",2000);

-->

</script>


      <title>Подождите...</title>
      <META http-equiv=Content-Type content="text/html; charset=windows-1251">
      <LINK href="data/PCSs.css" type=text/css rel=stylesheet>
</head>
<body>
<?php

$dat = date("d:m:y | H:i:s");
$fp = @fopen ("data/news.txt", "a");


if ((strlen(rtrim($_POST['name'])))!=0){
$name=htmlspecialchars($_POST['name'],ENT_QUOTES);
}
else{
exit("<html><body bgcolor=1f2f3f><font color=ffcc00 face=verdana size=2><b><center>Имя не введено</center></b></font></body></html>");}

if ((strlen(rtrim($_POST['mail'])))!=0){
$mail=htmlspecialchars($_POST['mail'],ENT_QUOTES);
}
else{
exit("<html><body bgcolor=1f2f3f><font color=ffcc00 face=verdana size=2><b><center>E-mail не введён</center></b></font></body></html>");}

if ((strlen(rtrim($_POST['mes'])))!=0){
$t2=htmlspecialchars($_POST['mes'],ENT_QUOTES);
}
else{
exit("<html><body bgcolor=1f2f3f><font color=ffcc00 face=verdana size=2><b><center>Новость не введена.</center></b></font></body></html>");}



//Если сообщение успешно добавлено,то показываем это 
if(!$fp)exit("<center>Не могу открыть файл <b>data/news.txt</b>");
fwrite ($fp, "<TABLE cellSpacing=1 cellPadding=3 width=400 align=center bgColor=#ffcc00 border=0><TR bgColor=#1f2f3f><TD><I><FONT face=verdana size=1><B>·</B> <a class=emenu href=mailto:".$mail." title=".$mail.">".$name."</a> </FONT></I></TD></TR><TR bgColor=#425d7a><TD><FONT face=verdana color=#dfd8df size=1>".$t2." <DIV align=right></DIV><DIV align=right><I><FONT face=verdana color=#dfd8df size=1>Добавлена :</font><FONT face=verdana color=#ffcc00 size=1>".$dat."</FONT></I></DIV></TD></font></TR></TABLE><br>\n" );
fclose ($fp);
exit("
<center><font size='2' face='verdana' color='dfd8df'>Новость добавлена. Сейчас Вы будете перемещены.</font></center>
<br><center><font color='ffcc00' size='2' face='verdana'>(<a href='admin.php?pswrd=admin'>Или нажмите сюда, чтобы не ждать</a>)</font></center>");
?>

</body></html><?php require_once("include_options.php");?>