<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";
class UserModel extends Database
{
    public function getUsers($limit)
    {
        return $this->select("SELECT * FROM tbl_benutzer ORDER BY PK_Benutzer ASC LIMIT ?", ["i", $limit]);
    }
}