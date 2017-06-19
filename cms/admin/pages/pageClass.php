<?php
if (!defined('pageclassconst')){die('You cannot access this file directly!');}
require_once( dirname( __FILE__ ) . '/../functions/connectionClass.php' );
require_once( dirname( __FILE__ ) . '/../messages/alertClass.php' );

class pagesClass extends connectionClass{
    
    public function addPage($data){
        $message=new alertClass();
        $data["PageDetails"]=$this->real_escape_string($data["PageDetails"]);
        $data["URL"]=$this->slug($data["URL"]);
        if($this->dulicatePage($data["URL"])<1){
        $keys=array_keys($data);
        $values=array_values($data);
        date_default_timezone_set ("Asia/Kolkata");
        $table="webpages";
        $query='INSERT INTO '.$table.' ('.implode(', ', $keys).') VALUES ("'.implode('","', $values).'")';
        $result=  $this->query($query) or die($this->error);
        if($result){
            unset($_POST);
            return $message->getAlert("Page is added ", "success");
        }
        else
        {
            return $message->getAlert("Error while adding page", "error");
        }
        }
        else
        {
            return $message->getAlert("Already Exists", "error");
        }
    }
    
    
    public function dulicatePage($name){
        $check="select * from webpages where URL='$name'";
        $result=  $this->query($check);
        $count=  $result->num_rows;
        if($count < 1){return 0;}else{return $count;}
    }
    
  private function slug($string){
       $string = strtolower(trim($string));
    $string = str_replace("'", '', $string);
    $string = preg_replace('#[^a-z\-]+#', '-', $string);
    $string = preg_replace('#_{2,}#', '_', $string);
    $string = preg_replace('#_-_#', '-', $string);
    $string = preg_replace('#(^_+|_+$)#D', '', $string);
    return preg_replace('#(^-+|-+$)#D', '', $string);
}

    public function listPages(){
        $list="select * from webpages Order By Id ";
        date_default_timezone_set ("Asia/Kolkata");
        $result=  $this->query($list);
        $count=  $result->num_rows;
        if($count < 1){}else{
            while($row= $result->fetch_array(3)){
                $arr[]= $row;
            }
            return $arr;
        }
    }
    
   
    public function particularPage($id) {
        if(is_numeric($id)){
        $list="select * from webpages where id='$id'";
        $result=  $this->query($list);
        $count=  $result->num_rows;
        if($count < 1){}else{
            while($row= $result->fetch_array(3)){
                return $row;
            }
        }
        }
    }
    
    public function particularPageSlug($id) {
        $list="select * from webpages where URL='$id'";
        $result=  $this->query($list);
        $count=  $result->num_rows;
        if($count < 1){}else{
            while($row= $result->fetch_array(3)){
                return $row;
            }
        }
    }
    
public function updatePage($data,$id){
    $message=new alertClass();
    $data["PageDetails"]=$this->real_escape_string($data["PageDetails"]);
    $data["URL"]=$this->slug($data["URL"]);
    foreach ($data as $key => $value) {
        $value="'$value'";
        $updates[]="$key=$value";
    }
    $imploadAray=  implode(",", $updates);
    $query="Update webpages Set $imploadAray Where id='$id'";
    $result=  $this->query($query) or die($this->error);
        if($result){
            return $message->getAlert("Page is updated", "success");
        }
        else
        {
            return $message->getAlert("Error while updating page", "error");
        }  
}

public function deletePage($id){
    $delete="Delete from webpages where id='$id'";
    $result=  $this->query($delete);
    $message=new alertClass();
        if($result){
            return $message->getAlert("Page is deleted", "success");
        }
        else
        {
            return $message->getAlert("Error while deleting page", "error");
        }  
}
}
