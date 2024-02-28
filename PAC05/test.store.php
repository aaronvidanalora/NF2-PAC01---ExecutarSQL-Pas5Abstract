<?php
require("class.pdofactory.php");
require("abstract.databoundobject.php");

class Store extends DataBoundObject {

    protected $ID;
    protected $Address;
    protected $AddressID;
    protected $LastUpdate;

    protected function DefineTableName() {
        return("store");
    }

    protected function DefineRelationMap() {
        return(array(
            "id" => "ID",
            "manager_staff_id" => "Address",
            "address_id" => "AddressID",
            "last_update" => "LastUpdate"
        ));
    }
}

print "Running for Store table...<br />";

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "postgres", array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$objStore = new Store($objPDO,1);

// $objStore->setAddress(1);
// $objStore->setAddressID(1);
// $objStore->setLastUpdate(date("Y-m-d H:i:s"));

// print "Original Data for Store table:<br />";
// print "Address: " . $objStore->getAddress() . "<br />";
// print "Address ID: " . $objStore->getAddressID() . "<br />";
// print "Last Update: " . $objStore->getLastUpdate() . "<br />";

// print "Saving for Store table...<br />";
// $objStore->Save();

// $id = $objStore->getID();
// print "ID in database is " . $id . "<br />";

// // Cambiar todos los datos
// $objStore->setAddress(2);
// $objStore->setAddressID(2);
// $objStore->setLastUpdate(date("Y-m-d H:i:s"));

// print "New Data for Store table:<br />";
// print "Address: " . $objStore->getAddress() . "<br />";
// print "Address ID: " . $objStore->getAddressID() . "<br />";
// print "Last Update: " . $objStore->getLastUpdate() . "<br />";

// print "Saving changes for Store table...<br />";
// $objStore->Save();

 print "Marking for deletion for Store table...<br />";
 $objStore->MarkForDeletion();
 unset($objStore);

?>
