<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__."/../inc/ConnectionTest.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
       {
            Stylist::deleteAll();
            Client::deleteAll();
       }

//Test Getters and Setters
        function test_getId()
        {
            //Arrange
            $id = 1;
            $name = "Gandalf the Grey";
            $test_client = new Client($id, $name);

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals($id, $result);
        }

        function test_getName()
        {
            //Arrange
            $id = 1;
            $name = "Gandalf the Grey";
            $test_client = new Client($id, $name);

            //Act
            $result = $test_client->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_setName()
        {
            //Arrange
            $id = 1;
            $name = "Gandalf the Grey";
            $test_client = new Client($id, $name);
            $new_name = "Thorin Oakenshield";

            //Act
            $test_client->setName($new_name);
            $result = $test_client->getName();

            //Assert
            $this->assertEquals($new_name, $result);
        }


//Test Methods
        function test_save()
        {
            //Arrange
            $id = null;
            $name = "Gandalf the Grey";
            $test_client = new Client($id, $name);
            $test_client->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals($test_client, $result[0]);
        }



//Test Static Methods
        function test_getAll()
        {
            //Arrange
            $id1 = null;
            $name1 = "Gandalf the Grey";
            $test_client1 = new Client($id1, $name1);
            $test_client1->save();
            $id2 = null;
            $name2 = "Thorin Oakenshield";
            $test_client2 = new Client($id2, $name2);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client1, $test_client2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $id1 = null;
            $name1 = "Gandalf the Grey";
            $test_client1 = new Client($id1, $name1);
            $test_client1->save();
            $id2 = null;
            $name2 = "Thorin Oakenshield";
            $test_client2 = new Client($id2, $name2);
            $test_client2->save();

            //Act
            Client::deleteAll();
            $result = Client::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $id1 = null;
            $name1 = "Gandalf the Grey";
            $test_client1 = new Client($id1, $name1);
            $test_client1->save();
            $id2 = null;
            $name2 = "Thorin Oakenshield";
            $test_client2 = new Client($id2, $name2);
            $test_client2->save();

            //Act
            $result = Client::find($test_client1->getId());

            //Assert
            $this->assertEquals($test_client1, $result);
        }




// End Unit Tests
   }
?>
