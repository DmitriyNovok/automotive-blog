<?php


class DB
{
    private static $instance = null;
    private $mysqli;

    /**
     * Функция проверяет был ли уже создан объект, если нет, то создает
     * @return DB | null
     */
    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __clone() {}
    private function __construct()
    {
        $this->mysqli = new mysqli("localhost", "phpmyadmin", "123456", "blog_cars");
        $this->mysqli->set_charset('utf8');
    }

    /**
    * Функция принимает на вход подключение и запрос к базе данных и возвращает ответ в виде массива
    * @param string $query - Строка запроса к базе данных
    * @return array - Возвращает ответ в виде массива из базы данных
    */
    public function db_get_array($query)
    {
        $result = $this->mysqli->query($query);

        $response = [];
        while($row = $result->fetch_assoc()) {
            $response[] = $row;
        }
        return $response;
    }

    /**
     * Функция принимает на вход подключение и запрос к базе данных и возвращает ответ в виде массива
     * @param string $query - Строка запроса к базе данных
     * @return array | false  - Возвращает ответ в виде массива из базы данных либо false
     */
    public function db_get_row($query)
    {
        $result = $this->mysqli->query($query);

        if ($result) {
            $response = $result->fetch_assoc();
        } else {
            $response = false;
        }
        return $response;
    }

    /**
     * Функция принимает на вход подключение и запрос к базе данных и возвращает ответ в виде массива
     * @param string $query - Строка запроса к базе данных
     * @return int $id
     */
    public function db_insert($query)
    {
        $this->mysqli->query($query);
        return $this->mysqli->insert_id;
    }

    /**
     * Функция принимает на вход подключение и запрос к базе данных и возвращает ответ в виде массива
     * @param string $query - Строка запроса к базе данных
     * @return true
     */
    public function db_query($query)
    {
        $this->mysqli->query($query);
        return true;
    }
}