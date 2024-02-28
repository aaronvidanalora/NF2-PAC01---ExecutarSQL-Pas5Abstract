<?php
require("class.pdofactory.php");
require("abstract.databoundobject.php");

class Address extends DataBoundObject {

    protected $Address;
    protected $Address2;
    protected $District;
    protected $CityID;
    protected $PostalCode;
    protected $Phone;
    protected $LastUpdate;

    protected function DefineTableName() {
        return("address");
    }

    protected function DefineRelationMap() {
        return(array(
            "id" => "ID",
            "address" => "Address",
            "address2" => "Address2",
            "district" => "District",
            "city_id" => "CityID",
            "postal_code" => "PostalCode",
            "phone" => "Phone",
            "last_update" => "LastUpdate"));
    }
}

print "Running for Address table...<br />";

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "postgres", array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$objAddress = new Address($objPDO);

$objAddress->setAddress("123 Main St");
$objAddress->setAddress2("Apt 101");
$objAddress->setDistrict("Downtown");
$objAddress->setCityID(1);
$objAddress->setPostalCode("12345");
$objAddress->setPhone("555-1234");
$objAddress->setLastUpdate(date("Y-m-d H:i:s"));

print "Original Data for Address table:<br />";
print "Address: " . $objAddress->getAddress() . "<br />";
print "Address 2: " . $objAddress->getAddress2() . "<br />";
print "District: " . $objAddress->getDistrict() . "<br />";
print "City ID: " . $objAddress->getCityID() . "<br />";
print "Postal Code: " . $objAddress->getPostalCode() . "<br />";
print "Phone: " . $objAddress->getPhone() . "<br />";
print "Last Update: " . $objAddress->getLastUpdate() . "<br />";

print "Saving for Address table...<br />";
$objAddress->Save();

$id = $objAddress->getID();
print "ID in database is " . $id . "<br />";

// Cambiar todos los datos
$objAddress->setAddress("456 Elm St");
$objAddress->setAddress2("Suite 202");
$objAddress->setDistrict("Suburbia");
$objAddress->setCityID(2);
$objAddress->setPostalCode("54321");
$objAddress->setPhone("555-4321");
$objAddress->setLastUpdate(date("Y-m-d H:i:s"));

print "New Data for Address table:<br />";
print "Address: " . $objAddress->getAddress() . "<br />";
print "Address 2: " . $objAddress->getAddress2() . "<br />";
print "District: " . $objAddress->getDistrict() . "<br />";
print "City ID: " . $objAddress->getCityID() . "<br />";
print "Postal Code: " . $objAddress->getPostalCode() . "<br />";
print "Phone: " . $objAddress->getPhone() . "<br />";
print "Last Update: " . $objAddress->getLastUpdate() . "<br />";

print "Saving changes for Address table...<br />";
$objAddress->Save();

 print "Marking for deletion for Address table...<br />";
 $objAddress->MarkForDeletion();
 unset($objAddress);

?>
