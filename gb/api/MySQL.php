<?php

class MySQL{

    var $connect_db = null;

    function __construct() {
        $this->db_connect();
    }

    function sql_connect($host, $user, $pass, $db = G5_MYSQL_DB){
        $link = mysqli_connect($host, $user, $pass, $db);

        if(mysqli_connect_errno()){
            die('Connect Error:' . mysqli_connect_error());
        }

        return $link;

    }


    function sql_select_db($db, $connect){
        return @mysqli_select_db($connect, $db);
    }

    function sql_set_charset($charset, $link = null){
        if (!$link){
            $link = $this->connect_db;
        }

        mysqli_set_charset($link, $charset);
    }


    function db_connect(){
        $this->connect_db = $this->sql_connect(G5_MYSQL_HOST, G5_MYSQL_USER, G5_MYSQL_PASSWORD, G5_MYSQL_DB);
        $select_db = $this->sql_select_db(G5_MYSQL_DB, $this->connect_db) or die('MySQL DB Error!!!');
        $this->sql_set_charset('utf8', $this->connect_db);
    }

    function sql_query($sql, $error = G5_DISPLAY_SQL_ERROR , $link = null){
        if (!$link){
            $link = $this->connect_db;
        }

        $sql = trim($sql);
        $sql = preg_replace("#^select.*from.*[\s\(]+union[\s\)]+.*#i ", "select 1", $sql);
        $sql = preg_replace("#^select.*from.*where.*`?information_schema`?.*#i", "select 1", $sql);

        if ($error){
            $result = @mysqli_query($link, $sql) or die("<p>$sql<p>" . mysqli_errno($link) . " : " .  mysqli_error($link) . "<p>error file : {$_SERVER['SCRIPT_NAME']}");
        } else {
            $result = @mysqli_query($link, $sql);
        }

        return $result;

    }

    function sql_featch_array($query){
        $result = $this->sql_query($query);
        $row = @mysqli_fetch_assoc($result);
        return $row;
    }

    function sql_while_array($query){

        $result = $this->sql_query($query);

        $list = [];
        while ($row = @mysqli_fetch_assoc($result)){
            $list[] = $row; 
        }
        return $list;
    }

    function sql_while_array2($query, $num){ // 페이징 처리

        $result = $this->sql_query($query);

        $list = [];
        while ($row = @mysqli_fetch_assoc($result)){
            $row['num'] = $num--;
            $list[] = $row;
        }

        
        return $list;
    }


}


?>