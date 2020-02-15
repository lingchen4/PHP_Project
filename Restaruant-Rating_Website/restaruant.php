<?php

class restaruant
{
    private $conn;
    private $twig;

    public function __construct($db_conn, $twig)
    {
        $this->conn = $db_conn;
        $this->twig = $twig;
    }

    public function indexMethod()
    {
        echo 'this is moive\' index ';
    }

    public function getMethod($id)
    {
        $restaruant = $this->conn->getRestaruantById($id);
        $categories = $this->conn->getAllCategories();
        $new_category = array();
        foreach ($categories as $category)
            $new_category += array(
                $category['id'] => $category['name']
            );

        $comment = $this->conn->getCommentById($id);
        try {
            echo $this->twig->render(
                'restaruant.html.twig',
                array(
                    'restaruant' => $restaruant,
                    'categories' => $new_category,
                    'comments' => $comment
                )
            );
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
