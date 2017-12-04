<?php  

namespace App\Models;

/**
 * summary
 */
class MonographsModel
{
    private $db;
    private $table = 'monographs';
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
