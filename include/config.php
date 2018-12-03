<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
define('BD_USER', 'ecobi396_user');
define('BD_PASS', 'ecobi2016');
define('BD_NAME', 'ecobi396_cfl');

mysql_connect('localhost', BD_USER, BD_PASS);
mysql_select_db(BD_NAME);
?>