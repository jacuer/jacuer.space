<?php
//require_once("Model.php");
class AlumnosModel extends Model{
  
 private $alumno;
 
    public function set( $al_data = array() ){
        foreach ($al_data as $key => $value) {  
            $$key = $value;
        }
        
        $this->query = "REPLACE INTO alumnos (pass_token, voto_alumno) VALUES ('$pass_token',$voto_alumno)";
        $this->set_query();
    }
 
    public function get($pass_token =''){
        $this->query = ($pass_token !='')
                        ?"SELECT * FROM alumnos WHERE pass_token = '$pass_token'"
                        :"SELECT * FROM alumnos";
                        
        $this->get_query();
        $nus_rows = count($this->rows);
        $data = array();

        foreach ($this->rows as $key => $value) {
                array_push($data, $value);
              //$data[$key] = $value;
        }
        //var_dump($this->rows);

        return $data;
    }

//3
  
//4
    public function del( $pass_token = ''){

        $this->query = "DELETE FROM alumnos WHERE pass_token = '$pass_token'";
        $this->set_query();
    }
//5
public function __destruct(){
    unset($this->alumno);
}
    


}

?>