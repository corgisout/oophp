<?php
namespace sihd\CMS;

class Content
{
    private $database;

    public function __construct($app)
    {
        $this->database = $app->db->connect();
    }

    public function fetch($sql, $params = null)
    {
        if ($params === null) {
            return $this->database->executeFetchAll($sql);
        } else {
            return $this->database->executeFetchAll($sql, $params);
        }
    }

    public function getPosts()
    {
        $sql = "SELECT * FROM CMS WHERE type = 'post';";
        return $this->database->executeFetchAll($sql);
    }
}
