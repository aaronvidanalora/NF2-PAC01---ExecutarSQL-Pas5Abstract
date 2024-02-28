<?php
require("class.pdofactory.php");
require("abstract.databoundobject.php");

class Customer extends DataBoundObject {

    protected $StoreID;
    protected $FirstName;
    protected $LastName;
    protected $Email;
    protected $AddressID;
    protected $ActiveBool;
    protected $CreateDate;
    protected $LastUpdate;
    protected $Active;

    protected function DefineTableName() {
        return("customer");
    }

    protected function DefineRelationMap() {
        return(array(
            "id" => "ID",
            "store_id" => "StoreID",
            "first_name" => "FirstName",
            "last_name" => "LastName",
            "email" => "Email",
            "address_id" => "AddressID",
            "activebool" => "ActiveBool",
            "create_date" => "CreateDate",
            "last_update" => "LastUpdate",
            "active" => "Active"
        ));
    }
}

print "Running...<br />";

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "postgres", array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$objCustomer = new Customer($objPDO);

$objCustomer->setStoreID(1);
$objCustomer->setFirstName("Juanico");
$objCustomer->setLastName("Banana");
$objCustomer->setEmail("juanico.banana@example.com");
$objCustomer->setAddressID(1);
$objCustomer->setActiveBool(true);
$objCustomer->setCreateDate(date("Y-m-d H:i:s"));
$objCustomer->setLastUpdate(date("Y-m-d H:i:s"));
$objCustomer->setActive(true);

print "Original Data:<br />";
print "First name is " . $objCustomer->getFirstName() . "<br />";
print "Last name is " . $objCustomer->getLastName() . "<br />";
print "Email is " . $objCustomer->getEmail() . "<br />";
print "Store ID is " . $objCustomer->getStoreID() . "<br />";
print "Address ID is " . $objCustomer->getAddressID() . "<br />";
print "ActiveBool is " . $objCustomer->getActiveBool() . "<br />";
print "Create Date is " . $objCustomer->getCreateDate() . "<br />";
print "Last Update is " . $objCustomer->getLastUpdate() . "<br />";
print "Active is " . $objCustomer->getActive() . "<br />";

print "Saving...<br />";
$objCustomer->Save();

$id = $objCustomer->getID();
print "ID in database is " . $id . "<br />";

// Cambiar todos los datos
$objCustomer->setFirstName("Pedro");
$objCustomer->setLastName("Martinez");
$objCustomer->setEmail("pedro.martinez@example.com");
$objCustomer->setStoreID(2);
$objCustomer->setAddressID(2);
$objCustomer->setActiveBool(true);
$objCustomer->setCreateDate(date("Y-m-d H:i:s"));
$objCustomer->setLastUpdate(date("Y-m-d H:i:s"));
$objCustomer->setActive(true);

print "New Data:<br />";
print "First name is " . $objCustomer->getFirstName() . "<br />";
print "Last name is " . $objCustomer->getLastName() . "<br />";
print "Email is " . $objCustomer->getEmail() . "<br />";
print "Store ID is " . $objCustomer->getStoreID() . "<br />";
print "Address ID is " . $objCustomer->getAddressID() . "<br />";
print "ActiveBool is " . $objCustomer->getActiveBool() . "<br />";
print "Create Date is " . $objCustomer->getCreateDate() . "<br />";
print "Last Update is " . $objCustomer->getLastUpdate() . "<br />";
print "Active is " . $objCustomer->getActive() . "<br />";

print "Saving changes...<br />";
$objCustomer->Save();

print "Marking for deletion...<br />";
$objCustomer->MarkForDeletion();
unset($objCustomer);

?>
