<?php

namespace System\Support\Faker\Provider\id;

defined('DS') or exit('No direct script access allowed.');

use System\Support\Faker\Provider\Internet as BaseInternet;

class Internet extends BaseInternet
{
    protected static $freeEmailDomain = [
        'gmail.com', 'yahoo.com', 'gmail.co.id', 'yahoo.co.id',
    ];

    protected static $tld = [
        'com', 'net', 'org', 'asia', 'tv', 'biz', 'info', 'in', 'name', 'co',
        'ac.id', 'sch.id', 'go.id', 'mil.id', 'co.id', 'or.id', 'web.id',
        'my.id', 'biz.id', 'desa.id', 'id',
    ];
}
