<?php

class BannerTest extends TestCase
{
    public function initTestData()
    {
        $banner = BannerModel::forge();
        $banner->saveData([
            'banner_name' => 'active',
            'url' => 'test',
            'start_date' => date('Y-m-d H:i:s', strtotime('yesterday')),
            'end_date' => date('Y-m-d H:i:s', strtotime('next year'))
        ]);

        $banner = BannerModel::forge();
        $banner->saveData([
            'banner_name' => 'schedule',
            'url' => 'test',
            'start_date' => date('Y-m-d H:i:s', strtotime('tomorrow')),
            'end_date' => date('Y-m-d H:i:s', strtotime('next year'))
        ]);

        $banner = BannerModel::forge();
        $banner->saveData([
            'banner_name' => 'expired',
            'url' => 'test',
            'start_date' => date('Y-m-d H:i:s', strtotime('yesterday')),
            'end_date' => date('Y-m-d H:i:s', strtotime('yesterday'))
        ]);
    }
    /**
     * As default config, Asia/Tokyo will be timezone of application when it's running
     **/
    public function checkTimezone()
    {
        $deadline_jpt = '2018-06-19 23:59:59';
        $expected = strtotime($deadline_jpt); // JPT

        date_default_timezone_set('UTC');

        $deadline_utc = '2018-06-19 14:59:59';
        $actual = strtotime($deadline_utc); // UTC

        $this->assertEquals($expected, $actual);
    }

    /**
     * reset timezone before run another test cases
     **/
    public function resetTimezone()
    {
        date_default_timezone_set(Config::get('timezone'));
    }

    public function checkWhiteList()
    {
        $ip = '10.0.0.1';
        $this->assertTrue(Util::isWhiteList($ip));
    }

    public function checkNotWhiteList()
    {
        $ip = '10.0.0.10';
        $this->assertTrue( ! Util::isWhiteList($ip));
    }

    public function checkActivedBanner()
    {
        $arr = BannerModel::getActive();
        $actual = isset($arr[0]) ? $arr[0]['banner_name'] : null;
        $this->assertEquals('active', $actual);
    }

    public function checkAllBanner()
    {
        $arr = BannerModel::getAll();
        $actual = count($arr);
        $this->assertEquals(3, $actual);
    }

    public function resetDB()
    {
        $banner = BannerModel::forge();
        $db = $banner->connection();

        if (file_exists($db))
            file_put_contents($db, '');
    }
}