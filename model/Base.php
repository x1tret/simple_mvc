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

    public static function forge()
    {
        $class_name = get_called_class();
        $instance = new $class_name();
        return $instance;
    }

    public function saveData($data = [])
    {
        $data['updated_date'] = time();
        if ( ! isset($data['id']))
            $data['created_date'] = time();

        $data['start_date'] = strtotime($data['start_date']);
        $data['end_date'] = strtotime($data['end_date']);

        return $this->save($data);
    }

    public static function getOne($id)
    {
        $instance = self::forge();
        return $instance->find($id);
    }

    public static function getAll()
    {
        $instance = self::getInstance();
        return $instance->all();
    }
}