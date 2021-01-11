<?php

/**
 * Modela un objeto de tipo médico
 */
class MedicoModelo
{
   private $db;

   private $id;

   private $nombre;

   private $apellidos;

   private $nivel;

   private $salario;

   /**
    * Se conecta a la base de datos
    */
   public function __construct()
   {
      $this->db = DBManager::getInstance()->getConnection();
   }

   public function getId()
   {
      return $this->id;
   }

   public function setId($id)
   {
      $this->id = $id;
   }

   public function getNombre()
   {
      return $this->nombre;
   }

   public function setName($nombre)
   {
      $this->nombre = $nombre;
   }

   public function getApellidos()
   {
      return $this->apellidos;
   }

   public function setApellidos($apellidos)
   {
      $this->apellidos = $apellidos;
   }

   public function getNivel()
   {
      return $this->nivel;
   }

   public function setNivel($nivel)
   {
      $this->nivel = $nivel;
   }

   public function getSalario()
   {
      return $this->salario;
   }

   public function setSalario($salario)
   {
      $this->salario = $salario;
   }

   /**
    * Guarda una actividad nueva tomando los datos del objeto this
    *
    * @return bool
    */
   public function save()
   {
      $sql = "INSERT INTO activities (id, name, description, capacity)
                  VALUES(NULL, :name, :description, :capacity)";
      $query = $this->db->prepare($sql);

      $query->bindParam('name', $this->name);
      $query->bindParam('description', $this->description);
      $query->bindParam('capacity', $this->capacity);

      $save = $query->execute();

      return $save;
   }

   /**
    * Actualizar la actividad tomando los datos del objeto this
    *
    * @return bool
    */
    public function update()
    {
       $sql = "UPDATE activities SET name = :name, description = :description, capacity = :capacity
               WHERE id = :id";
       $query = $this->db->prepare($sql);
 
       $query->bindParam('name', $this->name);
       $query->bindParam('description', $this->description);
       $query->bindParam('capacity', $this->capacity);
       $query->bindParam('id', $this->id);
 
       $save = $query->execute();
 
       return $save;
    }
 

   /**
    * Obtiene una página de resgistros de actividades
    *
    * @param integer $pagina
    * @param integer $regsxpag
    * @return array con los datos a usar en la vista
    */
   public function getAllPag($pagina = 1, $regsxpag = 5)
   {
      $resultSet = null;

      //Definimos la variable $offset que indique la posición del registro desde el que se
      // mostrarán los registros de una página dentro de la paginación.
      $offset = ($pagina > 1) ? (($pagina-1) * $regsxpag) : 0;

      //Calculamos el número de registros obtenidos
      $totalregistros = $this->db->query("SELECT count(*) as total FROM medicos");
      $totalregistros = $totalregistros->fetch()['total'];

      $sql = "SELECT medicos.* FROM medicos ORDER BY medicos.nombre LIMIT $offset, $regsxpag";

      $registros = $this->db->query($sql);
      $resultSet= $registros->fetchAll(PDO::FETCH_CLASS,'MedicoModelo');
      
      //Determinamos el número de páginas de la que constará mi paginación
      $numpaginas = ceil($totalregistros / $regsxpag);

      return ([
         "datos" => $resultSet,
         "numpaginas" => $numpaginas,
         "regsxpag" => $regsxpag,
         "totalregistros" => $totalregistros,
         "sql" => $sql
      ]);
   }

   
}
