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
            Client::deleteAll();
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

        function test_getClients()
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

            $id1 = null;
            $name1 = "Gandalf the Grey";
            $test_client1 = new Client($id1, $name1, $stylist_id1);
            $test_client1->save();

            $id2 = null;
            $name2 = "Thorin Oakenshield";
            $test_client2 = new Client($id2, $name2, $stylist_id1);
            $test_client2->save();

            $id3 = null;
            $name3 = "Aragorn";
            $test_client3 = new Client($id3, $name3, $stylist_id2);
            $test_client3->save();


            //Act
            $result = $test_stylist1->getClients();

            //Assert
            $this->assertEquals([$test_client1, $test_client2], $result);
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
