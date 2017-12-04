<?php  

namespace App\Models;

/**
 * summary
 */
class ConfigsModel
{
    private $db;
    private $table = 'configs';
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
