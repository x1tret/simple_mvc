<?php

class Validation
{
    protected $patterns;
    protected $error;

    public function __construct($patterns)
    {
        $this->patterns = $patterns;
        $this->error = [];
    }

    public static function forge($patterns)
    {
        $instance = new Validation($patterns);
        return $instance;
    }

    public function check($data)
    {
        $is_valid = true;
        foreach ($this->patterns as $field => $rules) {
            $arr_rules = explode('|', $rules);
            foreach ($arr_rules as $r) {
                $func = "is_$r";
                if (method_exists('Validation', $func)) {
                    $valid = self::$func($field, $data);
                    if ( ! $valid) {
                        $is_valid = false;
                        $this->error[] = $this->getErrorMessage($r, $field);
                    }
                } else {
                    $is_valid = false;
                    $this->error[] = $this->getErrorMessage('func', $r);
                }
            }
        }

        return $is_valid;
    }

    private function getErrorMessage($type, $field)
    {
        switch ($type) {
            case 'required': return "$field is mandantory for this field";
            case 'time': return "$field is invalid format";
            case 'func': return "$field is invalid rule";
        }
    }

    public function getError()
    {
        return $this->error;
    }

    public static function is_required($field, $data)
    {
        return isset($data[$field]);
    }

    public static function is_time($field, $data)
    {
        $time = isset($data[$field]) ? strtotime($data[$field]) : null;
        return $time ? true : false;
    }
}