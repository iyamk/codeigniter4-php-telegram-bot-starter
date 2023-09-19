<?php

use CodeIgniter\Router\RouteCollection;

foreach (scandir(APPPATH.'Routes') as $r)
{
    if ($r[0] == '.') continue;
    include APPPATH.'Routes/'.$r;
}