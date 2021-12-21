<?php
$header = 'Contact managment system';
require 'views/header.php'; //встраивание html-хедера

// подключение к базе данных, выгрузка всех данных в переменную $dbData
$dbConnect = new mysqli('localhost', 'root', '', 'db');
$select = $dbConnect->query("SELECT * FROM contacts");
$dbData = $select->fetch_all(MYSQLI_ASSOC);

$pageRowQuantity = 10; //установление количества записей в таблице
$pageQuantity = floor(count($dbData)/$pageRowQuantity); //расчёт количества страниц при отображении на 1 странице $pageRowQuantity строк
?>

<form action="models/checkData.php"> <!-- создание формы для передачи данных в checkData.php -->
    <input type="submit" name="button" value="Create new contact" class="button"> <!-- установка значения
    Create new contact по ключу button для маршрутизации обработки передаваемых данных на создание новой записи
    в базу данных на странице checkData.php по нажатию кнопки Create new contact -->
</form>
<br>
<table> <!-- создание разметки в виде таблицы для вывода информации из базы данных -->
    <tr>
        <th>Surname</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Company name</th>
        <th>Position</th>
        <th>Phone number</th>
        <th>Phone number</th>
        <th>Phone number</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    if (!isset($_GET['page'])){ //проверка установки идентификатора page (исключение ошибок в случае первого запуска страницы при отсутствии GET-параметров)
        for ($i = 0; $i < $pageRowQuantity; $i++){ //
            require 'views/table.php'; //встраивание формы таблицы
        }
    } else {
        for ($i = $_GET['page']*$pageRowQuantity; $i < ($_GET['page']+1)*$pageRowQuantity; $i++){
            require 'views/table.php'; //встраивание формы таблицы
        }
    } ?>
</table>

<div class="blockCenter">
<?php for ($i=0; $i<=$pageQuantity; $i++){ ?>
    <a href="?page=<?=$i;?>"> <input type="button" class="button" value="<?=($i+1);?>"> </a>
<?php } ?>
</div>

</body>
</html>