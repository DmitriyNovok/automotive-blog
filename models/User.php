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
        $users = DB::run("SELECT * FROM users");
        $user_objects = [];
        foreach ($users as $user) {
            $user_object = new User();
            $user_object->load_by_data($user['user_id'], $user['user_name'], $user['user_email'], $user['user_password']);
            $user_objects[] = $user_object;
        }
        return $user_objects;
    }

    public function __construct() {}

    public function load($id)
    {
        $this->id = $id;
        $user_data = DB::run("SELECT * FROM users WHERE user_id = ?", [$this->id]);
        while ($row = $user_data->fetch(PDO::FETCH_LAZY))
        {
            $this->name = $row['user_name'];
            $this->email = $row['user_email'];
            $this->password = $row['user_password'];
        }
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
        $result = DB::run("SELECT user_id FROM users WHERE user_email = ?", [$email]);
        if ($result) {
            var_dump('Такой email уже существует!');
            return false;
        }
        if (mb_strlen($password) < 4 || $password == '') {
            var_dump('Пароль не менее 4 символа!');
            return false;
        }
        $id = DB::run("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)", [$name, $email, $password]);

        $this->load_by_data($id, $name, $email, $password);
        return true;
    }

    public function delete()
    {
        DB::run("DELETE FROM users WHERE user_id = ?", [$this->id]);
        return true;
    }

    public function update($new_name, $new_email, $new_password)
    {
        DB::run("SELECT * FROM users WHERE user_id = ?", [$this->id]);
        if (mb_strlen($new_password) < 4 || $new_password == '') {
            var_dump('Пароль не менее 4 символа!');
            return false;
        }
        DB::run("UPDATE users SET  user_name = ?, user_email = ?, user_password = ?
                       WHERE user_id = ?", [$new_name, $new_email, $new_password, $this->id]);
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
        $count = DB::run("SELECT COUNT(articles.article_id) as article_count FROM users
                                LEFT JOIN articles ON users.user_id = articles.user_id 
                                WHERE users.user_id = ?", [$this->id])->fetch();
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
        $hashPass = DB::run("SELECT user_password FROM users WHERE user_email = ?", [$email])->fetchColumn();
        if (password_verify($password, $hashPass)) {
            $user_id = DB::run("SELECT user_id FROM users WHERE user_email = ?", [$email])->fetchColumn();
            return $user_id;
        } else {
            return false;
        }
    }
}