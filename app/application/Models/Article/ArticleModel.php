<?php

namespace app\application\Models\Article;

use DB;
use app\application\Models\User\UserModel;
use PDO;
use Exception;

class ArticleModel
{
    public $id;
    public $title;
    public $text;
    public $image;
    public $icon;
    public $date;

    /**
    * @var UserModel
    */
    public $user;

    /**
     * Возвращает все данные по статьям из базы данных
     * @param int $limit
     * @param $order
     * @return ArticleModel[]
     */
    public static function getArticlesAll($limit = 10, $order = false)
    {
        $articles = DB::run("SELECT * FROM articles " . ($order ?: 'ORDER BY article_id DESC') . " LIMIT $limit");
        $article_objects = [];
        foreach ($articles as $article) {
            $article_object = new ArticleModel();
            $article_object->dataLoad($article['article_id'], $article['article_title'], $article['article_text'],
                                          $article['article_date'], $article['user_id'], $article['article_image'], $article['article_icon']);
            $article_objects[] = $article_object;
        }
        return $article_objects;
    }

    public function load($id)
    {
        $this->id = $id;
        $article_data = DB::run("SELECT * FROM articles WHERE article_id = ?", [$this->id]);
        while ($row = $article_data->fetch(PDO::FETCH_LAZY))
        {
            $this->title = $row['article_title'];
            $this->text = $row['article_text'];
            $this->image = $row['article_image'];
            $this->icon = $row['article_icon'];
            $this->date = $row['article_date'];
            $this->user = new UserModel();
            $this->user->load($row['user_id']);
        }
    }

    private function dataLoad($id, $title, $text, $date, $user_id, $image = false, $icon = false)
    {
        $this->id = $id;
        $this->title = $title;
        $this->text = $text;
        $this->date = $date;
        $this->image = $image;
        $this->icon = $icon;
        $this->user = new UserModel();
        $this->user->load($user_id);
    }

    public function create($title, $text, $date, $user_id)
    {
        $id = DB::run("INSERT INTO articles (article_title, article_text, article_date, user_id)
                             VALUES (?, ?, ?)", [$title, $text, $date, $user_id]);
        $this->dataLoad($id, $title, $text, $date, $user_id, $image = false);
        return $id;
    }

    public function remove()
    {
        DB::run("DELETE FROM articles WHERE article_id = ?", [$this->id]);
    }

    /**
     * @param $new_title
     * @param $new_text
     * @param $new_date
     * @param $new_user_id
     * @return bool|false|\PDOStatement
     * @throws Exception
     */
    public function update($new_title, $new_text, $new_date, $new_user_id)
    {
        $id = DB::run("SELECT * FROM articles WHERE article_id = ?", [$this->id]);
        $new_user = new UserModel();
        $new_user->load($new_user_id);
        if ($new_user->name === NULL) {
            throw new Exception('Такого пользователя не существует!');
        }
        DB::run("UPDATE articles SET article_title = ?, article_text = ?, article_date = ?, user_id = ?
                       WHERE article_id = ?", [$new_title, $new_text, $new_date, $new_user_id, $this->id]);
        $this->title = $new_title;
        $this->text = $new_text;
        $this->date = $new_date;
        $this->user = $new_user_id;
        return $id;
    }
}
