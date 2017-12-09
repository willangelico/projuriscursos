<?php  

namespace App\Models;

/**
 * summary
 */
class CoursesModel
{
    private $db;
    private $table = 'courses';
    /**
     * summary
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll($status = "")
    {
        $stts = '';
        if (!empty($status)){
            $stts = " and status = {$status}";
        }
        $query = $this->db->query(
            "SELECT * FROM {$this->table}, friendly_url
            WHERE {$this->table}.id_course = friendly_url.table_id
            {$stts}
            ORDER BY ordenation ASC"
        );
        return $query->fetchAll();
    }

    public function getById($id)
    {
        $query = $this->db->query(
            "SELECT * FROM {$this->table}
            WHERE id_course = $id"
        );
        return $query->fetch();
    }
}
