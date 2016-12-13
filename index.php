<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Авторизация на сайте:</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
     

</head>
<body>


  <div class="container" >
  <h1>Cms sborka-1.02</h1>
  <h2>Войдите в вашу учетную запись</h2>

  <form class="form" action="index.php" method="post">
    
    <fieldset class="form-fieldset ui-input __first">
      <input type="text" id="username" name="login" tabindex="0" />
      <label for="username">
        <span data-text="Ваш логин">Ваш логин</span>
      </label>
    </fieldset>
    
   
    
    <fieldset class="form-fieldset ui-input __third">
      <input type="password" id="new-password" name="password" />
      <label for="new-password">
        <span data-text="Ваш пароль">Ваш пароль</span>
      </label>
    </fieldset>
	
	
	
    <div class="form-footer">
      <input type="submit"  class="btn" name="submit"  value="Войти в учетную запись"/>
    </div>
  </form>
</div>

<?php $connection = mysqli_connect('localhost', 'root', '', 'baseCMS') or die(mysqli_error()); // Соединение с базой данных ?>

<?php if (isset($_POST['submit'])) // Отлавливаем нажатие кнопки "Отправить"
{
if (empty($_POST['login'])) // Если поле логин пустое
{
echo '<script>alert("Поле логина не заполненно, повторите попытку!");</script>'; // То выводим сообщение об ошибке
}
elseif (empty($_POST['password'])) // Если поле пароль пустое
{
echo '<script>alert("Поле пароль не заполненно, повторите попытку!");</script>'; // То выводим сообщение об ошибке
}
else  // Иначе если все поля заполненны
{    
$login = $_POST['login']; // Записываем логин в переменную 
$password = $_POST['password']; // Записываем пароль в переменную           
$query = mysqli_query($connection, "SELECT `id` FROM `users` WHERE `login` = '$login' AND `password` = '$password'"); // Формируем переменную с запросом к базе данных с проверкой пользователя
$result = mysqli_fetch_array($query); // Формируем переменную с исполнением запроса к БД 
if (empty($result['id'])) // Если запрос к бд не возвразяет id пользователя
{
echo '<script>alert("Неверные Логин или Пароль");</script>'; // Значит такой пользователь не существует или не верен пароль
}
else // Если возвращяем id пользователя, выполняем вход под ним
{
$_SESSION['password'] = $password; // Заносим в сессию  пароль
require_once 'redirect.html'; //ПЕРЕНАПРАВЛЕНИЕ! ЗАМЕНИТЬ НАЗВАНИЕ ФАЙДА!!!
$_SESSION['login'] = $login; // Заносим в сессию  логин
$_SESSION['id'] = $result['id']; // Заносим в сессию  id
echo '</br><div align="center">Добро пожаловать '."<b>".$_SESSION['login']."</b>"." :)".'</div>'; // Выводим сообщение что пользователь авторизирован        
}     
}		
} ?>

<?php if (isset($_GET['exit'])) { // если вызвали переменную "exit"
unset($_SESSION['password']); // Чистим сессию пароля
unset($_SESSION['login']); // Чистим сессию логина
unset($_SESSION['id']); // Чистим сессию id
} ?>

<?php if (isset($_SESSION['login']) && isset($_SESSION['id'])) // если в сессии загружены логин и id
{
echo '<div align="center"><a href="index.php?exit">Выход</a></div>'; // Выводим нашу ссылку выхода
} ?>

<?php if (!isset($_SESSION['login']) || !isset($_SESSION['id'])) // если в сессии не загружены логин и id
{
echo '<div id="lastmain">
			<a href="reg.php" class="main-action">Создать учетную запись <i class="fa fa-plus" aria-hidden="true"></i> </a>
	</div>'; // Выводим нашу ссылку регистрации
} 
?>
</body>
</html>