<?php

    class Stylist
    {
//Properties
        private $id;
        private $name;

//Constructor
        function __construct($id, $name)
        {
            $this->id = $id;
            $this->name = $name;
        }


//Getter and Setter Methods
        function getId()
        {
            return $this->id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = $new_name;
        }

//Regular Methods
        function save()
        {
            $GLOBALS['DB']->exec(
            "INSERT INTO stylists (name) VALUES ('{$this->getName()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }


//Static Methods
        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists;");
            $stylists = array();
            foreach($returned_stylists as $stylist) {
                $id = $stylist['id'];
                $name = $stylist['name'];
                $new_stylist = new Stylist($id, $name);
                array_push($stylists, $new_stylist);
            }
            return $stylists;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists");
        }




    }
?>
