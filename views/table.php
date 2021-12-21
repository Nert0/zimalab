<?php

if (isset($dbData[$i])){?> <!-- исключение вывода пустых строк на последней странице pagination-->
    <tr>
       <form method="get" action="models/checkData.php"> <!-- установка формы для передачи данных на страницу checkData.php-->
            <td><?=$dbData[$i]['lastName']?></td>
            <td><?=$dbData[$i]['firstName']?></td>
            <td><?=$dbData[$i]['email']?></td>
            <td><?=$dbData[$i]['companyName']?></td>
            <td><?=$dbData[$i]['position']?></td>
            <td><?=$dbData[$i]['phone1']?></td>
            <td><?=$dbData[$i]['phone2']?></td>
            <td><?=$dbData[$i]['phone3']?></td>
            <td><input type="hidden" name="id" value="<?=$dbData[$i]['id']?>"></td>
            <td><input type="submit" name="button" value="Edit" class="button"></td> <!-- установка значения Edit по ключу button
            для маршрутизации обработки передаваемых данных на внесение изменений на странице checkData.php
            по нажатию кнопки Edit -->
            <td><input type="submit" name="button" value="Delete" class="button"></td> <!-- установка значения Delete по ключу
            button для маршрутизации обработки передаваемых данных на удаление на странице checkData.php по
            нажатию кнопки Delete -->
       </form>
    </tr>
<?php }