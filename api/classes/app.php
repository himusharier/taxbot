<?php

class App{

    private $db;
    public $result = "{}";

    function __construct()
    {
        $this->db = new Database();
        
        if(isset($_GET['url'])){
            $raw_url = $_GET['url'];
            $URL = explode("/", trim($raw_url, "/"));
            $table = $URL[0];
            unset($URL[0]);
            $params = array_values($URL);
        
            if(is_callable([$this, $table])){

                $this->result = $this->$table($params);
            }
        }else{
            $this->index();
        }
    }

    private function index()
    {
        require('home.php');
    }

    private function departments($params = array())
    {
        $id = isset($params[0]) ? $params[0] : null;

        if($id){
            $id = $id;
            $data = $this->db->run("SELECT * FROM testdata WHERE id = :id LIMIT 1",['id'=>$id]);
            if(is_array($data)){
                return json_encode($data);
            }
        }else{
            $data = $this->db->run("SELECT * FROM testdata");
            if(is_array($data)){
                return json_encode($data);
            }
        }

        return "{}";
    }
    

}
