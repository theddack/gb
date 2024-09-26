<?
class Centerbrowse extends MySQL {
    public $idx = null;
    public $table_name = "";
    public $table_name_image = "";
    public $where = " WHERE ";
    public $view_cnt = "";
    public $adm_lev = "";
    public $total_cnt = "";
    public $page = "";
    public $page_size = "";


    public function Centerbrowse() {
        $this->db_connect();
        $this->table_name = "center_browse";
        $this->table_name_image = "center_browse_image";
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


    public function center_list ($idx) {

        $s_page = ($this->page - 1) * $this->page_size;
        $e_page = $this->page_size;        

        if ($idx){
            $sql_sub = $this->where ." idx ='". $idx . "'";
        }
    
        $sql_sub .= " LIMIT " . intval($s_page) . "," . intval($e_page) . "";

        $num = $this->set_total_cnt() - $s_page;

        $sql = "SELECT idx, center, center_contents, update_user, update_date, user_id, reg_date, center_yn
                FROM " . $this->table_name .  $sql_sub;

        return $this->sql_while_array2($sql, $num);
    }

    public function center_list_image($data) {

        $sql = "SELECT idx, center_idx, center, image_src, image_name, image_id, reg_date, center_yn
                FROM " . $this->table_name_image . $this->where ." center_idx= '" . $data . "'
        ";

        return $this->sql_while_array($sql);

    }
    
    public function center_delete($idx){

        $sql = "DELETE FROM " . $this->table_name . $this->where ." idx= '" . $idx . "'";

        if($this->sql_featch_array($sql)){
            $sql2 = "DELETE FROM " . $this->table_name_image . $this->where . " center_idx='" . $idx . "'";
            $result = $this->sql_featch_array($sql2);

            if ($result){
                return "success";
            } else {
                return "error";
            }

        } else {
            return "error";
        }
    }

    public function center_pageing($cf_write_pages, $page, $qstr) { //페이징
        $domain = isset($domain) ? $domain : '';
        $total_cnt = $this->set_total_cnt();
        $total_page = ceil( $total_cnt/ $cf_write_pages);

        $pagelist = get_paging($cf_write_pages, $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr.'&amp;domain='.$domain.'&amp;page=');
        if ($pagelist) {
            echo $pagelist;
        }
    }

}
?>