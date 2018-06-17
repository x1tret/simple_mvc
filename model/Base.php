<?php

class BaseModel extends DB
{
    private static $instance;

    private static function getInstance()
    {
        if ( ! self::$instance)
            self::$instance = new BaseModel();

        return self::$instance;
    }

    public function saveData($data = [])
    {
        $data['updated_date'] = time();
        if ( ! isset($data['id']))
            $data['created_date'] = time();

        $data['start_date'] = strtotime($data['start_date']);
        $data['end_date'] = strtotime($data['end_date']);
        $instance = self::getInstance();
        $this->save($data);
    }

    public static function getOne($id)
    {
        $class_name = get_called_class();
        $instance = new $class_name();
        return $instance->find($id);
    }

    public static function getAll()
    {
        $instance = self::getInstance();
        return $instance->all();
    }
}