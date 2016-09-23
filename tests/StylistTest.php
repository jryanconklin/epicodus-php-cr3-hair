<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__."/../inc/ConnectionTest.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

    class StylistTest extends PHPUnit_Framework_TestCase
    {
    //     protected function tearDown()
    //    {
    //        FirstClass::deleteAll();
    //        SecondClass::deleteAll();
    //    }

       function test_getId()
       {
           //Arrange
           $id = 1;
           $name = "Bilbo Baggins";
           $test_stylist = new Stylist($id, $name);

           //Act
           $result = $test_stylist->getId();

           //Assert
           $this->assertEquals($id, $result);
       }



   }
?>
