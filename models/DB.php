<?php

class DB
{
    private static $instance = null;

    public static function instance()
    {
        if (self::$instance === null) {
            include 'define.php';
            $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset='.DB_CHAR;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false
            ];
            try{
                self::$instance = new PDO($dsn, DB_USER, DB_PASS, $options);
            }catch(PDOException $e){
                print "Error!: " . $e->getMessage() . "<br/>";
                exit;
            }
        }
        return self::$instance;
    }

    public static function run($query, $param = [])
    {
        if (!$param) {
            return self::instance()->query($query);
        }
        $pdo = self::instance()->prepare($query);
        $pdo->execute($param);
        return $pdo;
    }

//    /**
//    * Функция принимает на вход подключение и запрос к базе данных и возвращает ответ в виде массива
//    * @param string $query - Строка запроса к базе данных
//    * @return array - Возвращает ответ в виде массива из базы данных
//    */
//    public function db_get_array($query)
//    {
//        $result = $this->mysqli->query($query);
//
//        $response = [];
//        while($row = $result->fetch_assoc()) {
//            $response[] = $row;
//        }
//        return $response;
//    }
//
//    /**
//     * Функция принимает на вход подключение и запрос к базе данных и возвращает ответ в виде массива
//     * @param string $query - Строка запроса к базе данных
//     * @return array | false  - Возвращает ответ в виде массива из базы данных либо false
//     */
//    public function db_get_row($query)
//    {
//        $result = $this->mysqli->query($query);
//
//        if ($result) {
//            $response = $result->fetch_assoc();
//        } else {
//            $response = false;
//        }
//        return $response;
//    }
//
//    /**
//     * Функция принимает на вход подключение и запрос к базе данных и возвращает ответ в виде массива
//     * @param string $query - Строка запроса к базе данных
//     * @return int $id
//     */
//    public function db_insert($query)
//    {
//        $this->mysqli->query($query);
//        return $this->mysqli->insert_id;
//    }
//
//    /**
//     * Функция принимает на вход подключение и запрос к базе данных и возвращает ответ в виде массива
//     * @param string $query - Строка запроса к базе данных
//     * @return true
//     */
//    public function db_query($query)
//    {
//        $this->mysqli->query($query);
//        return true;
//    }
}