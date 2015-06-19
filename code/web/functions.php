<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');

function connection() {
    global $DB;
    $DB = mysql_connect(DB_HOST, DB_USER, DB_PASS);
    mysql_select_db('samtt');
}

function get_auth_token() {
    $arg = json_encode($_REQUEST);
    return `./registermo $arg`;
}

function save($token) {
    global $DB;
    mysql_query(
        "insert into mo values (
            NULL,
            '{$_REQUEST['msisdn']}',
            '{$_REQUEST['operatorid']}',
            '{$_REQUEST['shortcodeid']}',
            '{$_REQUEST['text']}',
            '{$token}',
            now()
            );
        "
    );
}
