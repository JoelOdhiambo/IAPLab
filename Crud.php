<?php
interface Crud{
    
    public function save($conn);
    public function readALl();
    public function readUnique();
    public function search();
    public function update();
    public function removeOne();
    public function removeAll();

    //LAB 2

    public function validate_Form();
    public function createFormErrorSessions();

}

?>