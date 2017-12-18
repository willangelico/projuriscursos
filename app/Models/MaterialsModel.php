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
        foreach ($materials as $k => $m) {
            $query = $this->db->query(
                "SELECT DISTINCT materials.dt_material as material_data
                FROM {$this->table}, class, students_class
                WHERE {$this->table}.id_class = class.id_class 
                and class.id_class = students_class.id_class
                and students_class.id_student = {$idStudent}
                {$sttsDB}
                ORDER BY materials.dt_material DESC, {$this->table}.ordenation"
            );       
            $datam = $query->fetchAll();
            foreach($datam as $key => $mat){                  
                $query = $this->db->query(
                    "SELECT materials.label as material_name, materials.file as material_file
                    FROM {$this->table} 
                    WHERE {$this->table}.id_class = {$materials[$k]['id_class']}
                    and dt_material = '{$mat['material_data']}'
                    {$sttsDB}
                    ORDER BY materials.dt_material DESC, {$this->table}.ordenation"
                );    
                $matsByDate = $query->fetchAll();      
                if( $matsByDate){
                    $materials[$k]['data'][$key] = $mat;
                    
                    $materials[$k]['data'][$key]['material'] = $matsByDate;
                }
            }
        }
        return $materials;        
    }

    public function getAllClassWithCourses()
    {
        $queryCourses = $this->db->query(
            "SELECT * FROM courses 
            ORDER BY ordenation ASC, name ASC"
        );
        $courses = $queryCourses->fetchAll();
        foreach ($courses as $key => $course) {
            $queryClass = $this->db->query(
                "SELECT * FROM class
                WHERE id_course = {$course['id_course']} 
                ORDER BY name ASC"
            );
            $classes = $queryClass->fetchAll();
            $courses[$key]['classes'] = $classes;
        }
        return $courses;
    }

    public function getAllByClass($idClass)
    {
        $queryCourse = $this->db->query(
            "SELECT courses.name as course_name, class.name as class_name, class.id_class as id_class 
            FROM courses, class
            WHERE class.id_class = {$idClass}
            AND class.id_course = courses.id_course"
        );
        $materials = $queryCourse->fetch();
        $queryMaterials = $this->db->query(
            "SELECT DISTINCT dt_material as material_data
            FROM {$this->table}
            WHERE id_class = {$idClass}
            ORDER BY dt_material DESC, ordenation"
        );
        $datam = $queryMaterials->fetchAll();
        foreach($datam as $key => $mat){                  
            $query = $this->db->query(
                "SELECT materials.id_material as id_material, materials.label as material_name, materials.file as material_file, materials.status as status
                FROM {$this->table} 
                WHERE id_class = {$idClass}
                and dt_material = '{$mat['material_data']}'
                ORDER BY dt_material DESC, ordenation"
            );    
            $matsByDate = $query->fetchAll();      
            if( $matsByDate){
                $materials['data'][$key] = $mat;
                
                $materials['data'][$key]['material'] = $matsByDate;
            }
        }
        return $materials;
    }
}
