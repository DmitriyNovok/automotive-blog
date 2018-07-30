<?php

class User
{
    public $id;
    public $name;
    public $email;
    public $password;

    /**
     * Возвращает все данные по юзерам из базы данных
     * @return User[]
     */
    public static function get_all_users()
    {
        $mysqli = DB::getInstance();
        $users = $mysqli->db_get_array("SELECT * FROM users");
        $user_objects = [];

        foreach ($users as $user) {
            $user_object = new User();
            $user_object->load_by_data($user['user_id'], $user['user_name'], $user['user_email'],
                                         $user['user_password']);
            $user_objects[] = $user_object;
        }
        return $user_objects;
    }

    public function __construct()
    {

    }

    public function load($id)
    {
        $mysqli = DB::getInstance();
        $this->id = $id;
        $user_data = $mysqli->db_get_row("SELECT * FROM users WHERE user_id = $this->id");

        $this->name = $user_data['user_name'];
        $this->email = $user_data['user_email'];
        $this->password = $user_data['user_password'];

    }

    private function load_by_data($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;

    }

    /**
     * Функция принимает на вход параметры и создает нового пользователя в базе данных
     * @param string $name - Имя пользователя
     * @param string $email - Email пользователя
     * @param string $password - Пароль пользователя
     * @return bool - true | false
     */
    public function create($name, $email, $password)
    {
        $mysqli = DB::getInstance();
        $result = $mysqli->db_get_row("SELECT user_id FROM users WHERE user_email = '$email'");
        if ($result) {
            var_dump('Такой email уже существует!');
            return false;
        }

        if (mb_strlen($password) < 4 || $password == '') {
            var_dump('Пароль не менее 4 символа!');
            return false;
        }

        $id = $mysqli->db_insert("INSERT INTO users (user_name, user_email, user_password)
                                         VALUES ('$name', '$email', '$password')");

        $this->load_by_data($id, $name, $email, $password);

        return true;
    }

    public function delete()
    {
        $mysqli = DB::getInstance();
        $mysqli->db_query("DELETE FROM users WHERE user_id = $this->id");

        return true;
    }


    public function update($new_name, $new_email, $new_password)
    {
        $mysqli = DB::getInstance();
        $mysqli->db_get_row("SELECT * FROM users WHERE user_id = $this->id");

        if (mb_strlen($new_password) < 4 || $new_password == '') {
            var_dump('Пароль не менее 4 символа!');
            return false;
        }

        $mysqli->db_query("UPDATE users SET 
                                  user_name = '$new_name', 
                                  user_email = '$new_email',
                                  user_password = '$new_password'
                                  WHERE user_id = $this->id");

        $this->name = $new_name;
        $this->email = $new_email;
        $this->password = $new_password;

        return true;
    }

    /**
     * Возвращает количество статей опубликованных юзером
     * @return int
     */
    public function get_count_articles()
    {
        $mysqli = DB::getInstance();
        $count = $mysqli->db_get_row("SELECT COUNT(a.article_id) as article_count FROM users u 
                                             LEFT JOIN articles a ON u.user_id = a.user_id 
                                             WHERE u.user_id = $this->id");

        return $count['article_count'];
    }

    /**
     * Принимает на вход параметры и проверяет , есть ли в базе уже такие данные пользователя
     * и возвращаем его идентификатор
     * @param string $email - Email пользователя
     * @param string $password - Пароль пользователя
     * @return int|false
     */
    public static function userExist($email, $password)
    {
        $mysqli = DB::getInstance();
        $result = $mysqli->db_get_row("SELECT user_id FROM users WHERE user_email = '$email' AND user_password = '$password'");
        if (!$result) {
            return false;
        }
        return $result['user_id'];
    }
}