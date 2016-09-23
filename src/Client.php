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
        function save()
        {
            $GLOBALS['DB']->exec(
            "INSERT INTO clients (name) VALUES ('{$this->getName()}')");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }







//Static Methods
        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
            $clients = array();
            foreach($returned_clients as $client) {
                $id = $client['id'];
                $name = $client['name'];
                $new_client = new Client($id, $name);
                array_push($clients, $new_client);
            }
            return $clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients");
        }

        static function find($search_id)
        {
            $found_client = null;
            $clients = Client::getAll();
            foreach($clients as $client) {
                $client_id = $client->getId();
                if ($client_id == $search_id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }






    }
?>
