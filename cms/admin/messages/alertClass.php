<?php
class alertClass {
    public function getAlert($message,$type){
        switch ($type) {
            case "error":
                return $this->alertBox("mdi-close", $message, "alert-danger","Error");
                break;
            case "success":
                return $this->alertBox("mdi-check", $message, "alert-success","Success");
                break;
            case "warning":
                return $this->alertBox("mdi-alert-triangle", $message, "alert-warning","Warning");
                break;
            case "info":
                return $this->alertBox("mdi-info-outline", $message, "alert-primary","Info");
                break;
        }
    }
    
    public function alertBox($icon,$message,$type,$name){
        return '<div role="alert" class="alert '.$type.' alert-icon alert-icon-border alert-dismissible">
                    <div class="icon"><span class="mdi '.$icon.'"></span></div>
                    <div class="message">
                      <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                      <span aria-hidden="true" class="mdi mdi-close"></span></button><strong>'.$name.'! </strong>'.$message.'
                    </div>
                  </div>';
    }
}