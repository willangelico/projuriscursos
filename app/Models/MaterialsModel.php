<?php  

namespace App\Models;

/**
 * summary
 */
class MaterialsModel
{
    private $db;
    private $table = 'materials';
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
