<?php
namespace sihd\login;

class Login
{
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

    public function login($username, $password)
    {
        $sql = "SELECT username FROM login WHERE username = ? AND password = ?";
        $res = $this->fetch($sql, [$username, $password]);
        if (count($res) > 0) {
            $_SESSION['isLogged'] = true;
            header('Location: login');
            exit;
        } else {
            return false;
        }
        return false;
    }
        //Classen Login
    public function logout()
    {
        if (isset($_SESSION['isLogged'])) {
            unset($_SESSION['isLogged']);
        }
        header('Location: login');
        exit;
    }
}
