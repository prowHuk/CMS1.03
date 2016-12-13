<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Регистрация на сайте</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
    

</head>
<body>


 <div class="container" >
  <h1>Cms sborka-1.02</h1>
  <h2>Войдите в вашу учетную запись</h2>

  <form class="form" action="reg.php" method="post">
    
    <fieldset class="form-fieldset ui-input __first">
      <input type="text" id="username" name="login2" tabindex="0" />
      <label for="username">
        <span data-text="Ваш логин">Ваш логин</span>
      </label>
    </fieldset>
    
   
    
    <fieldset class="form-fieldset ui-input __third">
      <input type="password" id="new-password" name="password2" />
      <label for="new-password">
        <span data-text="Ваш пароль">Ваш пароль</span>
      </label>
    </fieldset>
    
  
    
    <div class="form-footer">
      <input type="submit"  class="btn" name="submit2"  value="Создать учетную запись"/>
    </div>
	<br>
	<a href="http://kursovoyproekt/">На главную!</a>
  </form>
</div>








<?php $connection = mysqli_connect('localhost', 'root', '', 'baseCMS') or die(mysqli_error()); // Соединение с базой данных ?> 

<?php if (isset($_POST['submit2'])) // Отлавливаем нажатие на кнопку отправить 
{
if (empty($_POST['login2']))  // Условие - если поле логин пустое
{
echo "<script>alert('Поле логин не заполненно');</script>"; // Выводим сообщение об ошибке
}          
elseif (empty($_POST['password2'])) // Иначе если поле с паролем пустое
{
echo "<script>alert('Поле логин не заполненно');</script>"; // Выводим сообщение об ошибке
}                      
else // Иначе если поля не пустые
{
$login2 = $_POST['login2']; // Присваеваем переменной значение из поля с логином             
$password2 = $_POST['password2']; // Присваеваем другой переменной значение из поля с паролем
$query = "INSERT INTO `users` (login, password) VALUES ('$login2', '$password2')"; // Создаем переменную с запросом к базе данных на отправку нового юзера
$result = mysqli_query($connection, $query) or die(mysql_error()); // Отправляем переменную с запросом в базу данных 
echo "<div align='center'>Регистрация прошла успешно!</div>"; // Сообщаем что все получилось
}
} 
?>
</body>
</html>