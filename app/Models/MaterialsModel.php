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

    public function getMaterialByStudent($idStudent, $status){
        $query = $this->db->query(
            "SELECT courses.name as curso_name, class.name as class_name , class.id_class
            FROM courses, class, students_class
            WHERE class.id_class = students_class.id_class
            and students_class.id_student = {$idStudent}
            and class.id_course = courses.id_course
            ORDER BY class.id_class"
        );
        $materials = $query->fetchAll();

        $sttsDB = "";
        if($status){
            $sttsDB = " and {$this->table}.status = {$status}";
        }
        foreach($materials as $k => $m){
            $query = $this->db->query(
                "SELECT materials.label as material_name, materials.file as material_file
                FROM {$this->table}, class, students_class
                WHERE {$this->table}.id_class = class.id_class 
                and class.id_class = students_class.id_class
                and students_class.id_student = {$idStudent}
                {$sttsDB}
                ORDER BY class.id_class, {$this->table}.ordenation"
            );    
            $materials[$k]['materials'] = $query->fetchAll();
        }

        return $materials;
        
    }
}
