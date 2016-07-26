<?php

    if ( preg_match( '/gc200333254.computerstudi.es//i', $_SERVER ['HTTP_HOST'] ) )
    {
        //configuration for database for remote server
        define('DBHOST', 'sql.computerstudi.es');
        define('DBNAME', 'gc200333254');
        define('DBUSER', 'gc200333254');
        define('DBPASS', '7aULr7wU');
    }
    else
    {
        //configuration for database for local server
        define('DBHOST', 'localhost');
        define('DBNAME', 'comp-1006');
        define('DBUSER', 'root');
        define('DBPASS', '');
    }
