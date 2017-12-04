<?php  

namespace App\Models;

/**
 * summary
 */
class NewslettersModel
{
    private $db;
    private $table = 'newsletters';
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
