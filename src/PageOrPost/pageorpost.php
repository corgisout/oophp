<?php
namespace sihd\pageorpost;

class pageorpost
{
    private $database;

    public function createContent($content)
    {
        if ($content['path'] === "") {
            $content['path'] = null;
        }
        if ($this->checkSlug($content['slug'], 0) == true) {
            $sql = "INSERT INTO content (title, type, path, slug, data, filter) VALUES(?, ?, ?, ?, ?, ?);";

            $params = [$content['title'], $content['type'], $content['path'], $content['slug'], $content['data'], $content['filter']];
            $content = $this->database->executeFetchAll($sql, $params);
            return true;
        } else {
            return false;
        }
    }

    public function connect($app)
    {
        $this->database = $app->db->connect();
    }

    public function checkSlug($arg, $id)
    {
        $sql = "SELECT * FROM content WHERE slug = ?;";
        $params = [$arg];
        $res = $this->database->executeFetchAll($sql, $params);

        if (empty($res)) {
            $status = true;
        } elseif ($res[0]->id == $id) {
            $status = true;
        } else {
            $status = false;
        }

        return $status;

    }

    public function getContent($type, $arg)
    {
        $sql = "SELECT * FROM content WHERE path = ? OR slug = ? AND type = ?;";
        $params = [$arg, $arg, $type];
        $content = $this->database->executeFetchAll($sql, $params);

        $this->createArrayOfFilters($content[0]->filter);
        $data['title'] = $content[0]->title;
        $data['text'] = $content[0]->data;
        $data['created'] = $content[0]->created;
        $data['filters'] = $this->createArrayOfFilters($content[0]->filter);

        return $data;
    }

    public function createArrayOfFilters($filterString)
    {
        $filters = explode(",", $filterString);
        return $filters;
    }

    public function editContent($content)
    {
        if ($content['path'] === "") {
            $content['path'] = null;
        }
        if ($this->checkSlug($content['slug'], $content['id']) == true) {
            $sql = "UPDATE content SET path = ?, slug = ?, title = ?, data = ?, type = ?, filter = ?, published = ?, created = ?, updated = ?, deleted = ? WHERE id = ?;";

            $params = [$content['path'], $content['slug'], $content['title'], $content['data'], $content['type'], $content['filter'], $content['published'], $content['created'], $content['updated'], $content['deleted'], $content['id']];
            $content = $this->database->executeFetchAll($sql, $params);

            return true;
        } else {
            return false;
        }

    }

    public function deleteContent($id)
    {
        $sql = "DELETE FROM content WHERE id = ? LIMIT 1;";
        $params = [$id];
        $this->database->executeFetchAll($sql, $params);
    }
}
