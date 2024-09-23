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

    public function center_list ($idx) {
        if ($idx){
            $where = " WHERE idx ='". $idx . "'";
        }

        $sql = "SELECT idx, center, center_contents, update_user, update_date, user_id, reg_date
                FROM " . $this->table_name . $where;
        //echo $sql; 

        return $this->sql_while_array($sql);
    }

    public function center_list_image($data) {

        $sql = "SELECT idx, center_idx, center, image_src, image_name, image_id, reg_date
                FROM " . $this->table_name_image . " WHERE center_idx= '" . $data . "'
        ";

        return $this->sql_while_array($sql);

    }
    
    public function center_delete($idx){

        $sql = "DELETE FROM " . $this->table_name . " WHERE idx= '" . $idx . "'";
        //echo $sql; exit;

        if($this->sql_featch_array($sql)){
            $sql2 = "DELETE FROM " . $this->table_name_image . " WHERE center_idx='" . $idx . "'";
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