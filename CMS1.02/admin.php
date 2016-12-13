<?
include "config.php";

if (!isset($_GET['pswrd'])) 

{echo"
<html><head><title>Администрирование</title><META HTTP-EQUIV='Pragma' CONTENT='no-cache'><META HTTP-EQUIV='Cache-Control' CONTENT='no-cache'><META content='text/html; charset=windows-1251' http-equiv=Content-Type><link rel=stylesheet type='text/css' href='data/PCSs.css'></head><body>
<BR><BR><BR><center>
<form action='admin.php' method=GET name=pass>Введите пароль: <BR><input class=button type=password size=17 name=pswrd><BR><input class=button type=submit value='Войти'>
<SCRIPT language=JavaScript>document.pass.pswrd.focus();</SCRIPT><BR><BR><BR>";}
else {if ($_GET['pswrd']=="$password")
{ 


if (isset($_GET['id'])) { $page=$_GET['page'];
$file=file("data/news.txt"); $itogo=count($file)-1;
if ($msginout==1) {$id=$itogo-$_GET['id'];} else {$id=$itogo-$_GET['id']+2;}
if ($itogo<1) {print"$back. Нужно оставить хотябы одно сообщение!"; exit;}

$fp=fopen("data/news.txt","w");
flock ($fp,LOCK_EX);
for ($i=0;$i< sizeof($file);$i++) { if ($i==$id) {unset($file[$i]);} }
fputs($fp, implode("",$file));
flock ($fp,LOCK_UN);
fclose($fp);

Header("Location: admin.php?pswrd=$password&page=$page"); exit; }



else {

if (isset($_GET['page'])) {$page=$_GET['page'];} else {$page="1";}

print "<html><head>
<title>$gname</title>
<META HTTP-EQUIV='Pragma' CONTENT='no-cache'>
<META HTTP-EQUIV='Cache-Control' CONTENT='no-cache'>
<META content='text/html; charset=windows-1251' http-equiv=Content-Type>
<link rel=stylesheet type='text/css' href='data/PCSs.css'>
</head>
<body>
<center>
<br>

<TABLE width=780 align=center cellPadding=0 cellSpacing=0><TBODY>
<TD>
<table width=100%><TR>
<TD align=center><font color=ffcc00 size=2 face=verdana><B><a class=emenu href='admin.php?pswrd=$password'>Главная админки</a></div></B></font>";

print"<TD align=center><B>";
$lines=file("data/news.txt");
$itogo=count($lines);
$maxi=$itogo-1;
print "<b><font color=ffcc00 size=2 face=verdana>Всего <font color='red'>$itogo</font> новости</b></font>";






print"<TD align=center><font color=ffcc00 size=2 face=verdana><B><a class=emenu href='index.php'>Вернуться на главную</a></div></B></font>
</TD></TR></TABLE>
</TD>
</TR>
</TBODY></TABLE>";





if ((!isset($_GET['event'])) or (isset($_GET['event'])) & ($_GET['event']!="add"))  {
$lines=file("data/news.txt");
$itogo=count($lines);
$maxi=$itogo-1;
print "
<TABLE width=780 align=center cellPadding=0 cellSpacing=0><TBODY>

<center><table ><tr><td>";  

?>
<TABLE cellSpacing=1 cellPadding=1 width=400 align=center bgColor=#ffcc00 border=0>
<TR vAlign=top bgColor=#1f2f3f>
<TD>
<TABLE cellSpacing=0 cellPadding=1 width="100%" align=center border=0>
<TR bgColor=#1f2f3f><TD align=middle colSpan=2><FONT face=verdana color=#ffcc00 size=1><B>Добавить Новость</B></FONT></TD></TR>
<form action="status.php" method=post>
<TR>
<TD align=right width=70><FONT face=verdana color=#ffcc00 size=1>Имя:</FONT></TD>
<TD align=middle><INPUT class=name onblur="id=''" style="WIDTH: 314px" onfocus=id=className size=48 name=name ?></TD></TR>
<TR>
<TD align=right><FONT face=verdana color=#ffcc00 size=1>E-mail:</FONT></TD>
<TD align=middle><INPUT class=name onblur="id=''" style="WIDTH: 314px" onfocus=id=className size=48 name=mail ?></TD></TR>
<TR>
<TD align=right width=70><FONT face=verdana color=#ffcc00 size=1>Новость:</FONT></TD>
<TD align=middle><textarea class=name onblur="id=''"  onfocus=id=className style="WIDTH: 314px; height: 100px" cols=50 rows=4 size=500 name=mes></textarea></TD></TR>


<TR>
<TD align=center colspan=2>
<TABLE cellSpacing=0 cellPadding=1 bgColor=#425d7a border=0>
<TR><TD><INPUT class=submit style="CURSOR: hand" type=submit value="Добавить новость"></TD></TR></TABLE></TD></TR>

</FORM></TABLE></TD></TR></FONT></TD></TR></TABLE>


<br><br>

<?php


if (isset($_GET['rd']))  {
if ($msginout==1) {$rd=$maxi-$_GET['rd'];} else {$rd=$maxi-$_GET['rd']+2;}

$dt=explode("|",$lines[$rd]);
$dt[0]=str_replace("<br>", "\r\n", $dt[0]);


}
else 

print"</tr></td></table></TD></TR></TBODY></TABLE>";

print "<font color=ffcc00 size=2 face=verdana>Страницы:&nbsp; ";
for($i=0; $i<$maxi+1;) {$ip=$i/$qq+1;
if ($page==$ip) {print "<B>$ip</B> &nbsp;";} else {print "<a href=\"admin.php?pswrd=$password&page=$ip\">$ip</a> &nbsp;";}
$i=$i+$qq;} print "(дробление = <B>$qq</B>)<br><br>

<TABLE cellSpacing=1 cellPadding=1 width=400 align=center bgColor=#ffcc00 border=0>
<TR vAlign=top bgColor=#1f2f3f>
<TD>
<TABLE cellSpacing=0 cellPadding=1 width='100%' align=center border=0>
<TR bgColor=#1f2f3f><TD align=middle colSpan=2><FONT face=verdana color=#ffcc00 size=2><B>Текущие новости</B></FONT></TD></TR>
</TABLE></TD></TR></FONT></TD></TR></TABLE>";


if ($page=="0") {$page="1";} else {$page=abs($page);}

$maxpage=ceil(($maxi+1)/$qq); if ($page>$maxpage) {$page=$maxpage;}

if ($msginout=="1") 
{ $fm=$qq*($page-1); if ($fm>$maxi) {$fm=$maxi-$qq;}
  $lm=$fm+$qq; if ($lm>$maxi) {$lm=$maxi+1;} }
else 
{ $fm=$maxi-$qq*($page-1); if ($fm<"0") {$fm=$qq;}
  $lm=$fm-$qq; if ($lm<"0") {$lm="-1";} }


do { $dt = explode("|", $lines[$fm]);
if ($msginout=="1") {$fm++;} else {$fm--;}
$num=$itogo-$fm;



print"
<TABLE width=780 align=center cellPadding=0 cellSpacing=0><TBODY>

<br>
<em>$dt[0]</em><BR>
<div align=right>
<table border=0 bordercolor='1f2f3f'><TR><TD bgcolor=#425d7a><a href='admin.php?pswrd=$password&id=$num&page=$page'><b>[Удалить]</b></a>
</B></TD></TR></TABLE></div></TD></TR></TBODY></TABLE>
";

if ($msginout=="1") {$whm=$fm; $whe=$lm;} else {$whm=$lm; $whe=$fm;}
} while($whm < $whe);
print "</td></tr></table>";

print "<font color=ffcc00 size=2 face=verdana>Страницы:&nbsp; ";
for($i=0; $i<$maxi+1;) {$ip=$i/$qq+1;
if ($page==$ip) {print "<B>$ip</B> &nbsp;";} else {print "<a href='admin.php?pswrd=$password&page=$ip'>$ip</a> &nbsp;";}
$i=$i+$qq;} print "(дробление = <B>$qq</B>)";
}

}


}


}

?>
