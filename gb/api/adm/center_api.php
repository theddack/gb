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


        if ($idx){
            $sql_sub = $this->where ." idx ='". $idx . "'";
        }

        if($this->page ){
            $s_page = ($this->page - 1) * $this->page_size;
            $e_page = $this->page_size;            
            $sql_sub .= " LIMIT " . $s_page . "," . $e_page . "";
        }

        $sql = "SELECT idx, center, center_contents, update_user, update_date, user_id, reg_date, center_yn
                FROM " . $this->table_name .  $sql_sub;
        echo $sql; 

        return $this->sql_while_array($sql);
    }

    public function center_list_image($data) {

        $sql = "SELECT idx, center_idx, center, image_src, image_name, image_id, reg_date, center_yn
                FROM " . $this->table_name_image . $this->where ." center_idx= '" . $data . "'
        ";

        return $this->sql_while_array($sql);

    }
    
    public function center_delete($idx){

        $sql = "DELETE FROM " . $this->table_name . $this->where ." idx= '" . $idx . "'";
        //echo $sql; exit;

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


}
?>