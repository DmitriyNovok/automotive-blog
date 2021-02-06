<?php


class DB
{
    private static $instance = null;

    public static function instance()
    {
        if (self::$instance === null) {
            require_once 'define.php';
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
                exit();
            }
        }
        return self::$instance;
    }

    public static function run($query, $bindings = [])
    {
        if (! $bindings) {
            return self::instance()->query($query);
        }
        $pdo = self::instance()->prepare($query);
        $pdo->execute($bindings);
        return $pdo;
    }
}