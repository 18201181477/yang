<?php

return [



    'driver' => env('MAIL_DRIVER', 'smtp'),


    'host' => env('MAIL_HOST', 'smtp.mailgun.org'),


    'port' => env('MAIL_PORT', 587),


    'from' => ['address' => '250456621@qq.com', 'name' => '杨晶杰'],



    'encryption' => env('MAIL_ENCRYPTION', 'tls'),



    'username' => env('MAIL_USERNAME'),



    'password' => env('MAIL_PASSWORD'),



    'sendmail' => '/usr/sbin/sendmail -bs',

];
