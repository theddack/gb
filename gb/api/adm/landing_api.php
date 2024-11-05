<?php

class Landing_api extends MySQL {
    public $idx = null;
    public $table_name = "";
    public $where = " WHERE ";
    public $view_cnt = "";
    public $total_cnt = "";
    public $page = "";
    public $page_size = "";
    public $data_value = "";

    public function __construct() {
        $this->db_connect();
        $this->table_name = "landing_list";

    }

    public function set_total_cnt() {
        $sql = "SELECT COUNT(*) AS cnt FROM " . $this->table_name;
        $row = $this->sql_featch_array($sql);
        if ($row) {
            $rtn = $row['cnt'];
        } else {
            $rtn = 0;
        }
        return $rtn;
    }

    
    public function landing_pageing($cf_write_pages, $page, $qstr) { //페이징
        $domain = isset($domain) ? $domain : '';
        $total_cnt = $this->set_total_cnt();
        $total_page = ceil( $total_cnt/ $cf_write_pages);

        $pagelist = get_paging($cf_write_pages, $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr.'&amp;domain='.$domain.'&amp;page=');
        if ($pagelist) {
            echo $pagelist;
        }
    }
    public function landing_list ($idx) {
        if ($idx){
            $sql_sub = $this->where ." idx ='". $idx . "'";
        }
    
        if($this->page){
            $s_page = ($this->page - 1) * $this->page_size;
            $e_page = $this->page_size;       
            $sql_sub .= " ORDER BY idx DESC LIMIT " . intval($s_page) . "," . intval($e_page) . "";
        }


        $num = $this->set_total_cnt() - $s_page; //번호

        $sql = "SELECT idx, landing_subject, landing_key, landing_url, landing_skin, landing_guide, landing_category, landing_userId, landing_regdate
                FROM " . $this->table_name .  $sql_sub;
        return $this->sql_while_array2($sql, $num);
    }


}
?>