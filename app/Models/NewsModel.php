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

    public function getAll()
    {
        $query = $this->db->query(
            "SELECT * FROM {$this->table}"
        );
        return $query->fetchAll();
    }
}
