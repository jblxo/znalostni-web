<?php

class Database
{
    public $db;
    private $host = 'localhost';
    private $user = 'quiz_web';
    private $pass = 'cisco';
    private $database = 'quiz_web';

    public function __construct()
    {
        $this->db = mysqli_connect($this->host, $this->user, $this->pass, $this->database);

        if (!$this->db) {
            echo 'Error: Unable to connect to MySQL.'.PHP_EOL;
            echo 'Debugging errno: '.mysqli_connect_errno().PHP_EOL;
            echo 'Debugging error: '.mysqli_connect_error().PHP_EOL;
        }
    }

    public function signUp($firstName, $lastName, $username, $password, $email, $note = ' ')
    {
        $sql = $this->db->prepare('INSERT INTO users (firstName, lastName, username, password, email, note) VALUES (?, ?, ?, ?, ?, ?)');
        $sql->bind_param('ssssss', $firstName, $lastName, $username, $password, $email, $note);
        $sql->execute();
        printf($sql->error);
        $sql = $this->db->prepare('SELECT id FROM users WHERE username = ?');
        $sql->bind_param('s', $username);
        $sql->execute();
        printf($sql->error);
        $result = $sql->get_result();
        $user = $result->fetch_object();
        $sql->close();

        return $user;
    }

    public function signIn($email, $password)
    {
        $sql = $this->db->prepare('SELECT id, password FROM users WHERE email = ?');
        $sql->bind_param('s', $email);
        $sql->execute();
        printf($sql->error);
        $result = $sql->get_result();
        $user = $result->fetch_object();
        echo $user->password.'<br>';
        echo $password.'<br>';
        if (!password_verify($password, $user->password)) {
            echo 'Wrong email or password!';

            return null;
        }
        $sql->close();

        return $user;
    }

    public function getTests()
    {
        $sql = $this->db->prepare('SELECT id, title FROM tests');
        $sql->execute();
        printf($sql->error);
        $result = $sql->get_result();
        $sql->close();

        return $result;
    }

    public function getTest($idTest)
    {
        $sql = $this->db->prepare('SELECT DISTINCT q.id, q.title, q.option1, q.option2, q.option3, q.correctOptionIndex FROM tests as t INNER JOIN questions as q ON q.test = ?');
        $sql->bind_param('i', $idTest);
        $sql->execute();
        printf($sql->error);
        $result = $sql->get_result();
        $sql->close();

        return $result;
    }

    public function getTestAnswers($idTest)
    {
        $sql = $this->db->prepare('SELECT DISTINCT q.id, q.title, q.option1, q.option2, q.option3, q.correctOptionIndex FROM tests as t INNER JOIN questions as q ON q.test = ?');
        $sql->bind_param('i', $idTest);
        $sql->execute();
        printf($sql->error);
        $result = $sql->get_result();
        $sql->close();

        return $result;
    }

    public function insertTestResult($result, $user, $test)
    {
        $sql = $this->db->prepare('INSERT INTO results(result, user, test) VALUES (?, ?, ?)');
        $sql->bind_param('iii', $result, $user, $test);
        $sql->execute();
        printf($sql->error);
        $sql->close();
    }

    public function getProfile($user)
    {
        $sql = $this->db->prepare('SELECT firstName, lastName, username, note FROM users WHERE id = ?');
        $sql->bind_param('i', $user);
        $sql->execute();
        printf($sql->error);
        $result = $sql->get_result();
        $sql->close();

        return $result;
    }

    public function getUserResults($user)
    {
        $sql = $this->db->prepare('SELECT r.result, t.title, r.completedAt FROM results as r LEFT JOIN tests as t on t.id = r.test WHERE r.user = ?');
        $sql->bind_param('i', $user);
        $sql->execute();
        printf($sql->error);
        $result = $sql->get_result();
        $sql->close();

        return $result;
    }

    public function getLeaderboard()
    {
        $sql = $this->db->prepare('SELECT COUNT(r.id) as testsTaken, u.username, AVG(r.result) as averageScore FROM results as r LEFT JOIN users as u ON u.id = r.user WHERE r.result > 80 GROUP BY u.id ORDER BY testsTaken DESC, averageScore DESC LIMIT 5');
        $sql->execute();
        printf($sql->error);
        $result = $sql->get_result();
        $sql->close();

        return $result;
    }
}

$database = new Database();
