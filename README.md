# Simple MVC framework

## Demo

http://mercari.ductai.me/

* Please setup your virtual host with rewrite mode and override all requests to `document_root/public/index.php`
* Or you can copy my sample config in `nginx.conf.sample`
* I'm not sure about "write" permission on host so please change the permission for my sample database like as below. It make sure that my application could be written data into database file.

```
$ cd <your web root>
$ chmod 777 data/production.json
```

* **Default Timezone** was "Asia/Tokyo". You can change it in application config at `app.php`
* You can also change permitted IP addresses in here, please change at `white_list`

## Testing

Please run as below command
```
$ cd <your web root>
$ chmod 777 data/testing.json
$ php test.php
```
