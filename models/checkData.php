<?php
/**
 * скрипт обработки данных вносимых в базу данных
 *
 */

require_once '../class/person.php'; // подключение класса person
require_once '../class/db.php';// подключение класса db

$dbConnect = new mysqli('localhost', 'root', '', 'db'); // подключение к базе данных
$select = $dbConnect->query("SELECT * FROM contacts"); // выбор данных из базы данных
$dbData = $select->fetch_all(MYSQLI_ASSOC); // выгрузка информации из базы данных

if ($_GET['button'] == 'Create new contact'){   /* проверка значения по ключу button на соответствие значению
                                                Create new contact. В случае соответствия создается объекта класса
                                                person с пустыми значениями и вызывается форма заполнения form.php */
    $person = new person();
    require_once '../views/form.php';

}

if ($_GET['button'] == 'Delete'){   /* проверка значения по ключу button на соответствие значению Delete. В случае
                                    соответствия создаётся объект класса db, с последующим вызовом метода delete
                                    для удаления элемента с указанным id из базы данных */
    $deletePerson = new db();
    $deletePerson->delete($_GET['id']);
    header('Location: ../index.php');
}

if ($_GET['button'] == 'Edit') {    /* проверка значения по ключу button на соответствие значению Edit. В случае
                                    соответствия производится переход к созданию новой записи в базу данных/
                                    внесение изменений в существующую запись */
    if ($_GET['id'] == '') {    /* проверка заполненности глобальной переменной GET по ключу id. Если поле
                                существует и оно не заполнено, это означает что из формы form.php получены данные
                                для создания нового пользователя.*/

        //создание нового объекта класса person c полями, полученными из формы
        $person = new person($_GET['id'], $_GET['lastName'], $_GET['firstName'], $_GET['email'], $_GET['companyName'], $_GET['position'], $_GET['phone1'], $_GET['phone2'], $_GET['phone3']);

        //проверка корректности введенных данных lastName, firstName, email
        $error = $person->getErrors($_GET['lastName'], $_GET['firstName'], $_GET['email']);
        $errorLastName = $error[0];
        $errorFirstName = $error[1];
        $errorEmail = $error[2];
        if ($errorLastName . $errorFirstName . $errorEmail == '') { /* проверка наличия ошибок. Если ошибок нет,
                                                                    создается новая запись в базу данных путем
                                                                    создания объекта класса db и вызова метода
                                                                    create данного класса */
            $createPerson = new db;
            $createPerson->create($_GET['lastName'], $_GET['firstName'], $_GET['email'], $_GET['companyName'], $_GET['position'], $_GET['phone1'], $_GET['phone2'], $_GET['phone3']);
            header('Location: ../index.php');
        } else {
            require_once '../views/form.php';   /* в случае, если одно или несколько полей lastName, firstName,
                                                email заполнены некорректно, возврат в форму form.php для
                                                корректировки вводимых данных */
        }
    } elseif ($_GET['id'] > 0) {/* проверка заполненности глобальной переменной GET по ключу id. Если в поле есть
                                отличное от 0 значение - значит исполняется скрипт по корректировке строки с
                                указанным id*/
        if (!isset($_GET['update'])){   /* проверка наличия флага update(ключ в глобаной переменной GET). Флаг
                                        update отсутствует для данных, полученных для внесения изменений со
                                        страницы index.php по нажатию кнопки Edit. Через конструктор класса person
                                        создается новый объект, в который подставляются значения полученные для
                                        корректироки из базы данных методом get класса db. Данные передаются в
                                        форму form.php для внесения изменений */
            $getDB = new db;
            $person = new person($getDB->get($_GET['id'])['id'], $getDB->get($_GET['id'])['lastName'], $getDB->get($_GET['id'])['firstName'], $getDB->get($_GET['id'])['email'], $getDB->get($_GET['id'])['companyName'], $getDB->get($_GET['id'])['position'], $getDB->get($_GET['id'])['phone1'], $getDB->get($_GET['id'])['phone2'], $getDB->get($_GET['id'])['phone3']);
            require_once '../views/form.php';
        } else { /* Флаг присутствует для данных полученных из формы form.php после внесения изменений в
                существующую в базе данных запись.*/
            $person = new Person($_GET['id'], $_GET['lastName'], $_GET['firstName'], $_GET['email'], $_GET['companyName'], $_GET['position'], $_GET['phone1'], $_GET['phone2'], $_GET['phone3']);
            $error = $person->getErrors($_GET['lastName'], $_GET['firstName'], $_GET['email']);
            $errorLastName = $error[0];
            $errorFirstName = $error[1];
            $errorEmail = $error[2];
            if ($errorLastName . $errorFirstName . $errorEmail == '') { /* Измененные данные проверяются на
                                                                        корректность заполнения полей lastName,
                                                                        firstName, email. Если поля заполнены
                                                                        корректно, то измененные данные методом
                                                                        update класса db вносятся в существующую
                                                                        запись базы данных. Если некорректно -
                                                                        происходит возврат в форму form.php */
                $updatePerson = new db;
                $updatePerson->update($_GET['id'], $_GET['lastName'], $_GET['firstName'], $_GET['email'], $_GET['companyName'], $_GET['position'], $_GET['phone1'], $_GET['phone2'], $_GET['phone3']);
                header('Location: ../index.php');
            } else {
                require_once '../views/form.php';
            }
        }
    }
}

