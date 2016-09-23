<?php

    class Client
    {
//Properties
        private $id;
        private $name;

//Constructor
        function __construct($id = null, $name)
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







//Static Methods







    }
?>
