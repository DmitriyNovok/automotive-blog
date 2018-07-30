<?php


class Article
{
    public $id;
    public $title;
    public $text;
    public $image;
    public $icon;
    public $date;

    /**
    * @var User
    */
    public $user;

    /**
     * Возвращает все данные по статьям из базы данных
     * @param int $limit
     * @return Article[]
     */
    public static function get_all_articles($limit = 10, $order = false)
    {
        $mysqli = DB::getInstance();
        $articles = $mysqli->db_get_array("SELECT * FROM articles " . ($order ? 'ORDER BY article_id DESC' : '') . " LIMIT $limit");

        $article_objects = [];

        foreach ($articles as $article) {
            $article_object = new Article();
            $article_object->load_by_data($article['article_id'], $article['article_title'], $article['article_text'],
                                            $article['article_date'], $article['user_id'], $article['article_image'], $article['article_icon']);
            $article_objects[] = $article_object;
        }
        return $article_objects;
    }


    public function __construct()
    {

    }

    public function load($id)
    {
        $mysqli = DB::getInstance();
        $this->id = $id;
        $article_data = $mysqli->db_get_row("SELECT * FROM articles WHERE article_id = $this->id");

        $this->title = $article_data['article_title'];
        $this->text = $article_data['article_text'];
        $this->image = $article_data['article_image'];
        $this->icon = $article_data['article_icon'];
        $this->date = $article_data['article_date'];

        $this->user = new User();
        $this->user->load($article_data['user_id']);
    }

    private function load_by_data($id, $title, $text, $date, $user_id, $image = false, $icon = false)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->date = $date;
        $this->image = $image;
        $this->icon = $icon;

        $this->user = new User();
        $this->user->load($user_id);
    }

    public function create($title, $text, $date, $user_id)
    {
        $mysqli = DB::getInstance();
        $id = $mysqli->db_insert("INSERT INTO articles (article_title, article_text, article_date, user_id)
                                         VALUES ('$title', '$text', '$date', '$user_id')");

        $this->load_by_data($id, $title, $text, $date, $user_id, $image = false);

        return true;
    }

    public function delete()
    {
        $mysqli = DB::getInstance();
        $mysqli->db_query("DELETE FROM articles WHERE article_id = $this->id");

        return true;
    }


    public function update($new_title, $new_text, $new_date, $new_user_id)
    {
        $mysqli = DB::getInstance();
        $mysqli->db_get_row("SELECT * FROM articles WHERE article_id = $this->id");


        $new_user = new User();
        $new_user->load($new_user_id);
        if ($new_user->name === NULL) {
            var_dump('Такого пользователя не существует!');
            return false;
        }

        $mysqli->db_query("UPDATE articles SET 
                                  article_title = '$new_title', article_text = '$new_text',
                                  article_date = '$new_date', user_id = '$new_user_id'
                                  WHERE article_id = $this->id");

        $this->title = $new_title;
        $this->text = $new_text;
        $this->date = $new_date;
        $this->user = $new_user_id;

        return true;
    }

}
