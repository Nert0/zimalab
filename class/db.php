<?php
/**
 * класс взайимодействия с базой данных, в которой хранится список контактов
 */
class db
{
    /**
     * Создает новый элемент в базе данных
     *
     * @param string $lastName, string $firstName, string $email, string $companyName, string $position, string $phone1, string $phone2, string $phone3
     */
    public function create ($lastName, $firstName, $email, $companyName, $position, $phone1, $phone2, $phone3)
    {
        $dbConnect = new mysqli('localhost', 'root', '', 'db');
        $create = $dbConnect->query("INSERT INTO contacts (id, lastName, firstName, email, companyName, position, phone1, phone2, phone3) VALUES (NULL, '$lastName', '$firstName', '$email', '$companyName', '$position', '$phone1', '$phone2', '$phone3')");
    }
    /**
     * Получает данные элемента базы данных
     *
     * @param integer $id
     *
     * @return array $get
     */
    public function get ($id)
    {
        $dbConnect = new mysqli('localhost', 'root', '', 'db');
        $get = $dbConnect->query("SELECT * FROM contacts WHERE id = '$id'");
        return $get->fetch_assoc();
    }
    /**
     * Вносит изменения в элемент базы данных
     *
     * @param integer $id, string $lastName, string $firstName, string $email, string $companyName, string $position, string $phone1, string $phone2, string $phone3
     */
    public function update ($id, $lastName, $firstName, $email, $companyName, $position, $phone1, $phone2, $phone3)
    {
        $dbConnect = new mysqli('localhost', 'root', '', 'db');
        $update = $dbConnect->query("UPDATE contacts SET lastName = '$lastName', firstName = '$firstName', email = '$email', companyName = '$companyName', position = '$position', phone1 = '$phone1', phone2 = '$phone2', phone3 = '$phone3' WHERE id = '$id'");
    }
    /**
     * Удаляет элемент из базы данных
     *
     * @param integer $id
     */
    public function delete ($id)
    {
        $dbConnect = new mysqli('localhost', 'root', '', 'db');
        $delete = $dbConnect->query("DELETE FROM contacts WHERE id = '$id'");
    }
}