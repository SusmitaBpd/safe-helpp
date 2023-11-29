<?php 
class Includepath
{
    public $path;

    function __construct(){
        $base_path = 'http://localhost/safe-helpp/admin/';
        $this->path = $base_path;

    }

    public function adminpath($admin_path){
        $path =  $this->path.$admin_path;
        return $path;

    }
    public function templatepath($template_path){
        $path = $this->path.'views/'.$template_path;
        return $path;
    }
    public function assetspath($assets_path){
        $path = $this->path.'assets/'.$assets_path;
        return $path ;
    }

    public function authpath($auth_path){
        $path = $this->path.'auth/'.$auth_path ;
        return $path;
    }



}





?>