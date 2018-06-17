<?php

class BannerModel extends BaseModel
{
    protected $table = 'banner';
    protected $fillables = [
        'banner_name',
        'file_name',
        'url',
        'start_date',
        'end_date',
        'created_date',
        'updated_date',
    ];

    public static function getActive()
    {
        $result = self::getAll();
        $now = time();
        foreach ($result as $i => $item) {
            if ($item['start_date'] > $now || $item['end_date'] < $now)
                unset($result[$i]);
        }

        return $result;
    }
}