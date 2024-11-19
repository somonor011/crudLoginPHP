<?php 

    class crud{
        public static function connect(){
            try {
                $con = new PDO('mysql:localhost=host; dbname=db_crudform','root','');
                return $con;
            } catch (PDOException $error1) {
                echo 'Something went wrong. It was not possible connect to database '.$error1->getMessage();
            } catch (Exception $error2) {
                echo 'Generic error'.$error2->getMessage();
            }
        }
    }