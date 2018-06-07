<?php
namespace sihd\Movie;

/**
 * Class for interacting with database oophp with movies
 */
class Movie
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
}
