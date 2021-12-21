<?php
 /**
  * Форма для ввода данных. Используется для создания новой записи в базу данных, корректировки существующих записей
  */
    $header = 'Enter value';
    require 'header.php'; //встраивание html-хедера

?>

<form action="../models/checkData.php" method="get"> <!-- создание формы для ввода данных -->
    <label for="lastName">Surname *</label>
    <input type="text" id="lastName" name="lastName" value="<?=$person->getLastName()?>">
    <div class="alarmFootnote"><?=isset($errorLastName) ? $errorLastName : ''?></div> <!-- вызов сообщения об
    ошибке при вводе lastName -->

    <label for="firstName">Name *</label>
    <input type="text" id="firstName" name="firstName" value="<?=$person->getFirstName()?>">
    <div class="alarmFootnote"><?=isset($errorFirstName) ? $errorFirstName : ''?></div> <!-- вызов сообщения об
    ошибке при вводе firstName -->

    <label for="email">E-mail *</label>
    <input type="text" id="email" name="email" value="<?=$person->getEmail()?>">
    <div class="alarmFootnote"><?=isset($errorEmail) ? $errorEmail : ''?></div> <!-- вызов сообщения об ошибке
    при вводе email -->

    <label for="companyName">Company name</label>
    <input type="text" id="companyName" name="companyName" value="<?=$person->getCompanyName()?>">
    <br>

    <label for="position">Position</label>
    <input type="text" id="position" name="position" value="<?=$person->getPosition()?>">
    <br>

    <label for="phone1">Phone number</label>
    <input type="text" id="phone1" name="phone1" value="<?=$person->getPhone1()?>">
    <br>

    <label for="phone2">Phone number</label>
    <input type="text" id="phone2" name="phone2" value="<?=$person->getPhone2()?>">
    <br>

    <label for="phone3">Phone number</label>
    <input type="text" id="phone3" name="phone3" value="<?=$person->getPhone3()?>">
    <br>
    <p class="footnote">* - required to fill</p>

    <input type="hidden" name="button" value="Edit"> <!-- установка значения Edit по ключу button для
    маршрутизации обработки передаваемых данных на внесение изменений на странице checkData.php -->

    <input type="hidden" name="id" value="<?=$person->getID()?>">

    <input type="hidden" name="update"> <!-- установка флага update. Необходим для того чтобы при передаче в
    checkData.php отличать скорректированные первично введенные данные (после отклоненной проверки по полям
    lastName/firstName/email) от случая внесения изменений в существующую в базе данных запись -->

    <input type="submit" value="Save" class="button"> <!-- переход на страницу checkData.php по нажатию кнопки Save -->

    <input type="submit" formaction="../index.php" value="Cancel" class="button"> <!-- переход на страницу index.php по нажатию
    кнопки Cancel -->

</form>
</body>
</html>
