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
        protected function tearDown()
       {
            Stylist::deleteAll();
            // SecondClass::deleteAll();
       }

//Test Getters and Setters
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

       function test_getName()
       {
           //Arrange
           $id = 1;
           $name = "Bilbo Baggins";
           $test_stylist = new Stylist($id, $name);

           //Act
           $result = $test_stylist->getName();

           //Assert
           $this->assertEquals($name, $result);
       }

       function test_setName()
       {
           //Arrange
           $id = 1;
           $name = "Bilbo Baggins";
           $test_stylist = new Stylist($id, $name);
           $new_name = "Frodo Baggins";

           //Act
           $test_stylist->setName($new_name);
           $result = $test_stylist->getName();

           //Assert
           $this->assertEquals($new_name, $result);
       }

//Test Methods
        function test_save()
        {
            //Arrange
            $id = null;
            $name = "Bilbo Baggins";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals($test_stylist, $result[0]);
        }

        function test_update()
        {
            //Arrange
            $id = null;
            $name = "Bilbo Baggins";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            $new_name = "Frodo Baggins";

            //Act
            $test_stylist->update($new_name);

            //Assert
            $this->assertEquals("Frodo Baggins", $test_stylist->getName());
        }

        function test_delete()
        {
            //Arrange
            $id = null;
            $name = "Bilbo Baggins";
            $test_stylist = new Stylist($id, $name);
            $test_stylist->save();

            //Act
            $test_stylist->delete();

            //Assert
            $this->assertEquals([], Stylist::getAll());
        }

//Test Static Methods
        function test_getAll()
        {
            //Arrange
            $id1 = null;
            $name1 = "Bilbo Baggins";
            $test_stylist1 = new Stylist($id1, $name1);
            $test_stylist1->save();
            $id2 = null;
            $name2 = "Frodo Baggins";
            $test_stylist2 = new Stylist($id2, $name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist1, $test_stylist2], $result);
        }

        function test_deleteAll()
        {
            //Arrange
            $id1 = null;
            $name1 = "Bilbo Baggins";
            $test_stylist1 = new Stylist($id1, $name1);
            $test_stylist1->save();
            $id2 = null;
            $name2 = "Frodo Baggins";
            $test_stylist2 = new Stylist($id2, $name2);
            $test_stylist2->save();

            //Act
            Stylist::deleteAll();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function test_find()
        {
            //Arrange
            $id1 = null;
            $name1 = "Bilbo Baggins";
            $test_stylist1 = new Stylist($id1, $name1);
            $test_stylist1->save();
            $id2 = null;
            $name2 = "Frodo Baggins";
            $test_stylist2 = new Stylist($id2, $name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::find($test_stylist1->getId());

            //Assert
            $this->assertEquals($test_stylist1, $result);

        }

//End Unit Test
   }
?>
