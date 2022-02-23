<?php

require "libs/rb-mysql.php";
R::setup( 'mysql:host=localhost;dbname=registration',
'root', '' );
if ( !R::testConnection() )
{
        exit ('Нет соединения с базой данных');
}

session_start();