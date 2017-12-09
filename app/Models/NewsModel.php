<?php  

namespace App\Models;

/**
 * summary
 */
class NewsModel
{
    private $db;
    private $table = 'news';
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
            $stts = " WHERE status = {$status}";
        }
        $query = $this->db->query(
            "SELECT * FROM {$this->table} 
            {$stts}
            ORDER BY ordenation ASC, dt_news DESC"
        );
        return $query->fetchAll();
    }

    public function getById($id)
    {
        $query = $this->db->query(
            "SELECT * FROM {$this->table}
            WHERE id_news = $id"
        );
        return $query->fetch();
    }

}
