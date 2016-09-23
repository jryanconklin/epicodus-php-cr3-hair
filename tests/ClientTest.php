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
    //     protected function tearDown()
    //    {
    //        Stylist::deleteAll();
    //        Client::deleteAll();
    //    }

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






// End Unit Tests
   }
?>
