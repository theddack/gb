<?
class Centerbrowse extends MySQL {
    public $idx = null;
    public $table_name = "";
    public $table_name_image = "";
    public $where = "";
    public $view_cnt = "10";
    public $adm_lev = "";
    public $page_size = "20";
    public $total_cnt = "";


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

    public function center_list () {
        $sql = "SELECT idx, center, center_contents, update_user, update_date, user_id, reg_date
                FROM " . $this->table_name;
        //echo $sql; 

        return $this->sql_while_array($sql);
    }
    

}
?>