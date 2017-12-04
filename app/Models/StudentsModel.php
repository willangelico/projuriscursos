<?php  

namespace App\Models;

/**
 * summary
 */
class StudentsModel
{
    private $db;
    private $table = 'students';
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
