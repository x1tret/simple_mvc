<?php

class DB
{
    private $db;
    private $connection;

    protected $table;
    protected $primary_key = 'index';
    protected $id;
    protected $fillables;

    public function __construct($db = null)
    {
        $this->db = $db;
        $this->connection = $this->connection();
    }

    public function connection()
    {
        if ( ! $this->db)
            $this->db = DOC_ROOT . '/data/'. APP_ENV . '.json';

        if (!file_exists($this->db))
            die("File not exist: {$this->db}");

        return $this->db;
    }

    /**
     * Get data from specify table
     * @todo I didn't implement this function because this demo has only one table.
     **/
    private function filterTable($json)
    {
        return $json;
    }

    public function all()
    {
        $str = file_get_contents($this->db);
        try {
            $json = json_decode($str, true);
        } catch (Exception $e) {
            die('Cannot parse json data, please check your format again!');
        }

        $json = $this->filterTable($json);
        return $json;
    }

    public function find($id)
    {
        $all = $this->all();
        $current = isset($all[$id]) ? $all[$id] : null;
        if ( ! $current)
            return;

        $current['id'] = $id;
        foreach ($current as $key => $value)
            $this->$key = $value;

        return $this;
    }

    public function save($data = [])
    {
        $all = $this->all();
        $arr = [];

        foreach ($this->fillables as $key)
            $arr[$key] = isset($data[$key]) ? $data[$key] : (isset($this->$key) ? $this->$key : null);

        if ( ! count($arr))
            return;

        if ($this->id) {
            if ( ! isset($all[$this->id]))
                die('Cannot found this record');
            $current = $all[$this->id];
            foreach ($current as $key => $value)
                $current[$key] = isset($arr[$key]) ? $arr[$key] : $current[$key];
            $all[$this->id] = $current;
        } else {
            $all[] = $arr;
            $current = $arr;
            $current['id'] = count($all);
        }

        file_put_contents($this->db, json_encode($all));

        return $current;
    }
}