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
            $id = null;
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
            $id = null;
            $name = "Gandalf the Grey";
            $test_client = new Client($id, $name);

            //Act
            $result = $test_client->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function test_getStylistId()
        {
            //Arrange
            $id = null;
            $name = "Bilbo Baggins";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $id = null;
            $name = "Gandalf the Grey";
            $test_client = new Client($id, $name, $stylist_id);

            //Act
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals($stylist_id, $result);
        }

        function test_setName()
        {
            //Arrange
            $id = null;
            $name = "Gandalf the Grey";
            $test_client = new Client($id, $name);
            $new_name = "Thorin Oakenshield";

            //Act
            $test_client->setName($new_name);
            $result = $test_client->getName();

            //Assert
            $this->assertEquals($new_name, $result);
        }

        function test_setStylistId()
        {
            //Arrange
            $id1 = null;
            $name1 = "Bilbo Baggins";
            $test_stylist1 = new Stylist($id1, $name1);
            $test_stylist1->save();
            $stylist_id1 = $test_stylist1->getId();

            $id2 = null;
            $name2 = "Frodo Baggins";
            $test_stylist2 = new Stylist($id2, $name2);
            $test_stylist2->save();
            $stylist_id2 = $test_stylist2->getId();

            $id = null;
            $name = "Gandalf the Grey";
            $test_client = new Client($id, $name, $stylist_id1);

            //Act
            $test_client->setStylistId($stylist_id2);
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals($stylist_id2, $result);
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

        function test_update()
        {
            //Arrange
            $id = null;
            $name = "Gandalf the Grey";
            $test_client = new Client($id, $name);
            $test_client->save();

            $new_name = "Thorin Oakenshield";

            //Act
            $test_client->update($new_name);

            //Assert
            $this->assertEquals("Thorin Oakenshield", $test_client->getName());
        }

        function test_delete()
        {
            //Arrange
            $id = null;
            $name = "Gandalf the Grey";
            $test_client = new Client($id, $name);
            $test_client->save();

            //Act
            $test_client->delete();

            //Assert
            $this->assertEquals([], Client::getAll());
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
