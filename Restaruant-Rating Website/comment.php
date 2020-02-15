<?php

class comment
{
    private $conn;
    private $twig;
    public function __construct($conn, $twig)
    {
        $this->conn = $conn;
        $this->twig = $twig;
    }

    public function submitMethod()
    {
        $mid = $_POST['mid'];
        $content = $_POST['content'];
        $result = $this->conn->insertComment($mid, $content);
        header("Access_control-Allow-Origin:*");
        header("Content-Type:application/json;charset=utf-8");
        if ($result) {
            $message = array(
                'code' => 200,
                'message' => 'Add comment successfully'
            );
            echo json_encode($message);
        } else {
            $message = array(
                'code' => 400,
                'message' => 'Add comment failed, Please try again.'
            );
        }
    }
}
