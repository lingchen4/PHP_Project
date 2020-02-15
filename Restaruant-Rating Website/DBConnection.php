<?php

class DBConnection
{
    protected $conn;

    public function getConnInstant()
    {
        if (!isset($this->conn)) {
            $this->conn = new PDO(
                'mysql:host=localhost; dbname=food; charset=utf8mb4',
                'root',
                ''
            );
        }

        return $this->conn;
    }

    public function getAllrestaruants()
    {
        $stmt = $this->getConnInstant()->query('SELECT * FROM restaruant ORDER BY data DESC');
        $restaruants = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $restaruants;
    }

    public function getAllCategories()
    {
        $stmt = $this->getConnInstant()->query('SELECT * FROM categories');
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }


    public function getRestaruantById($id)
    {
        $stmt = $this->getConnInstant()->prepare('SELECT * FROM restaruant WHERE id = :id');
        $stmt->execute(
            array(
                ':id' => $id
            )
        );
        $result = $stmt->fetch();
        return $result;
    }

    public function getRestaruantByCategoryId($cid)
    {
        $stmt = $this->getConnInstant()->prepare('SELECT * FROM restaruant WHERE genre LIKE :cid ORDER BY data DESC');
        $stmt->execute(
            array(
                ':cid' => '%' . $cid . '%'
            )
        );
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getCommentById($id)
    {
        $stmt = $this->getConnInstant()->prepare('SELECT * FROM comments WHERE m_id = :id ORDER BY date DESC');
        $stmt->execute(
            array(
                ':id' => $id,
            )
        );
        $result = $stmt->fetchAll();
        return $result;
    }

    public function insertComment($mid, $content)
    {
        $stmt = $this->getConnInstant()->prepare('INSERT INTO comments(m_id,date,content) VALUES(:mid, :date, :content)');
        $result = $stmt->execute(
            array(
                ':mid' => $mid,
                ':date' => date('y-m-d h:i:s'),
                ':content' => $content
            )
        );
        return $result;
    }
}

// $db = new DBConnection();
// var_dump($db->insertComment(2, '321'));
