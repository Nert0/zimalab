<?php
/**
 * класс управления объектами из списка контактов
 */
class person
{
    /** @var integer $id */
    public $id;
    /** @var string $lastName */
    public $lastName;
    /** @var string $firstName */
    public $firstName;
    /** @var string $email */
    public $email;
    /** @var string $companyName */
    public $companyName;
    /** @var string $position */
    public $position;
    /** @var string $phone1 */
    public $phone1;
    /** @var string $phone2 */
    public $phone2;
    /** @var string $phone3 */
    public $phone3;

    /**
     * Конструктор нового объекта класса
     *
     * @var integer $id, string $lastName, string $firstName, string $email, string $companyName, string $position, string $phone1, string $phone2, string $phone3
     */
    public function __construct($id = '', $lastName = '', $firstName = '', $email = '', $companyName = '', $position = '', $phone1 = '', $phone2 = '', $phone3 = '')
    {
        $this->id = $id;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->companyName = $companyName;
        $this->position = $position;
        $this->phone1 = $phone1;
        $this->phone2 = $phone2;
        $this->phone3 = $phone3;

    }
    /**
     * Проверяет наличие данных в полях lastName, firstName, а также наличие данных и символа "@" в поле email.
     * При их отсутствии возвращает соответствующее сообщение об ошибке
     *
     * @param string $lastName, string $firstName, string $email
     *
     * @return array $errors
     */
    public function getErrors ($lastName, $firstName, $email)
    {
        $errors = [];
        if (strlen($lastName) < 2) {
            $errors[] = 'Enter surname';
        } else {
            $errors[] = '';
        }
        if (strlen($firstName) < 2) {
            $errors[] = 'Enter name';
        } else {
            $errors[] = '';
        }
        if (!(strlen($email) > 3 && strpos('email' . $email, '@'))) {
            $errors[] = 'Enter correct e-mail';
        } else {
            $errors[] = '';
        }
        return $errors;
    }
    /** Возвращает значение id объекта
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    /** Возвращает значение LastName объекта
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    /** Возвращает значение FirstName объекта
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    /** Возвращает значение Email объекта
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /** Возвращает значение CompanyName объекта
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }
    /** Возвращает значение Position объекта
     * @return string
     */
    public function getPosition()
    {
        return $this->position;
    }
    /** Возвращает значение Phone1 объекта
     * @return string
     */
    public function getPhone1()
    {
        return $this->phone1;
    }
    /** Возвращает значение Phone2 объекта
     * @return string
     */
    public function getPhone2()
    {
        return $this->phone2;
    }
    /** Возвращает значение Phone3 объекта
     * @return string
     */
    public function getPhone3()
    {
        return $this->phone3;
    }

}