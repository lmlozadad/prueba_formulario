<?php

unset($CFG);
global $CFG;
$CFG = array();


// Conexion BD
$CFG['driver'] = 'mysql';
$CFG['host'] = '127.0.01';
$CFG['port'] = '3306';
$CFG['db'] = 'test';
$CFG['user'] = 'root';
$CFG['pass'] = '';