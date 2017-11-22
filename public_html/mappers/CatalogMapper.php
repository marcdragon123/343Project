<?php
/**
 * Created by PhpStorm.
 * users: leban
 * Date: 2017-11-19
 * Time: 1:44 PM
 */

class CatalogMapper extends MapperAbstract {
    private static $instance = null;
    public $CatalogTDG;
    public $monitorTDG;
    public $tabletTDG;
    public $laptopTDG;
    public $desktopcomputerTDG;

    /**
     * @return CatalogMapper|null
     */
    public static function getInstance() {
        if (self::$instance == null)
        {
            self::$instance = new CatalogMapper();
        }

        return self::$instance;
    }

    /**
     * CatalogMapper constructor.
     */
    private function __construct() {
        $this->CatalogTDG = new CatalogTDG();
        $this->$monitorTDG = new monitorTDG();                                                  
        $this->$tabletTDG = new tabletTDG();
        $this->$laptopTDG = new laptopTDG();
        $this->$desktopcomputerTDG = new desktopcomputerTDG();
    }

    /**
     * Create a new instance of the DomainObject-->Account class that this
     * mapper is responsible for. Optionally populating it
     * from a data array.
     *
     * @param array $data
     * @return Product $obj
     */
    public function create(array $data = null) {
        $obj = $this->_createProduct($data['ProductType']);
        if($data)
        {
            switch ($data['ProductType']){
                case "Laptop":
                    $obj = $this->populateLaptop($obj, $data);
                    break;
                case "Monitor":
                    $obj = $this->populateMonitor($obj, $data);
                    break;
                case "Desktop":
                    $obj = $this->populateDesktop($obj, $data);
                    break;
                case "Tablet":
                    $obj = $this->populateTablet($obj, $data);
                    break;
            }
        }
        // adding product straight to Catalog Array, which will be saved in the idmap
        try{
            ProductCatalog::getInstance()->addProduct($obj);
            try{
                UnitOfWork::getInstance()->registerNew($obj);
                UnitOfWork::getInstance()->commit(CatalogMapper::getInstance());
                return null;
            }catch (Exception $exception){
                Messages::setMsg($exception->getMessage(), 'error');
                return null;
            }
        }catch (Exception $exception){
            Messages::setMsg($exception->getMessage(), 'error');
            return null;
        }
    }

    /**
     * Delete the Product from active memory.
     * Delete the Product from persistent storage.
     *
     * @param Product $obj
     */
    public function deleteProduct($obj) {
        try{
            ProductCatalog::getInstance()->deleteProduct($obj);
            UnitOfWork::getInstance()->registerDeleted($obj);
            UnitOfWork::getInstance()->commit(CatalogMapper::getInstance());
        }
        catch (Exception $exception){
            Messages::setMsg($exception->getMessage(), 'error');
        }

    }


    public function editProduct() {

    }

    public function getMonitors() {
        
    }

    public function getDesktops() {

    }

    public function getLaptops() {

    }

    public function getTablets() {
    }
    public function viewProductsByType($type){
        ProductCatalog::getInstance()->viewByType($type);
    }

    public function showProductsByType($product){
        return $product;
    }

    public function showAllProducts(){
        $productsList = ProductCatalog::getInstance()->viewAllProducts();
        return $productList;
    }

   



    /**
     * @param Product $obj
     * @param array $data
     * @return Product $obj
     */
    public function populateDesktop($obj, array $data) {
        $obj->__set("SerialNumber", $data['SerialNumber']);
        $obj->__set("Brand", $data['Brand']);
        $obj->__set("Price", $data['Price']);
        $obj->__set("CPUType", $data['CPUType']);
        $obj->__set("Dimensions", $data['Dimensions']);
        $obj->__set("Weight", $data['Weight']);
        $obj->__set("Model", $data['Model']);
        $obj->__set("HDDSize", $data['HDDSize']);
        $obj->__set("CoreNumber", $data['CoreNumber']);
        $obj->__set("RAMSize", $data['RAMSize']);

        return $obj;

    }

    /**
     * @param Product $obj
     * @param array $data
     * @return Product $obj
     */
    public function populateTablet($obj, array $data) {
        $obj->__set("SerialNumber", $data['SerialNumber']);
        $obj->__set("Brand", $data['Brand']);
        $obj->__set("Price", $data['Price']);
        $obj->__set("CPUType", $data['CPUType']);
        $obj->__set("DisplayDimensions", $data['DisplayDimensions']);
        $obj->__set("Weight", $data['Weight']);
        $obj->__set("Model", $data['Model']);
        $obj->__set("HDDSize", $data['HDDSize']);
        $obj->__set("CoreNumber", $data['CoreNumber']);
        $obj->__set("RAMSize", $data['RAMSize']);
        $obj->__set("Battery", $data['Battery']);
        $obj->__set("DisplaySize", $data['DisplaySize']);
        $obj->__set("OS", $data['OS']);
        $obj->__set("CameraInformation", $data['CameraInformation']);

        return $obj;

    }

    /**
     * @param Product $obj
     * @param array $data
     * @return Product $obj
     */
    public function populateLaptop($obj, array $data) {
        $obj->__set("SerialNumber", $data['SerialNumber']);
        $obj->__set("Brand", $data['Brand']);
        $obj->__set("Price", $data['Price']);
        $obj->__set("CPUType", $data['CPUType']);
        $obj->__set("DisplayDimensions", $data['DisplayDimensions']);
        $obj->__set("Weight", $data['Weight']);
        $obj->__set("Model", $data['Model']);
        $obj->__set("HDDSize", $data['HDDSize']);
        $obj->__set("CoreNumber", $data['CoreNumber']);
        $obj->__set("RAMSize", $data['RAMSize']);
        $obj->__set("Battery", $data['Battery']);
        $obj->__set("DisplaySize", $data['DisplaySize']);
        $obj->__set("OS", $data['OS']);
        $obj->__set("CameraInformation", $data['CameraInformation']);
        $obj->__set("ToucheScreenToggle", $data['ToucheScreenToggle']);

        return $obj;
    }

    /**
     * @param Product $obj
     * @param array $data
     * @return Product $obj
     */
    public function populateMonitor($obj, array $data) {
        $obj->__set("SerialNumber", $data['SerialNumber']);
        $obj->__set("Brand", $data['Brand']);
        $obj->__set("Price", $data['Price']);
        $obj->__set("Weight", $data['Weight']);
        $obj->__set("Model", $data['Model']);
        $obj->__set("DisplaySize", $data['DisplaySize']);

        return $obj;
    }

    /**
     * @param $type
     * @return Product
     */
    public function _createProduct($type) {
        switch($type)
        {
            case "Laptop":
                return new Laptop();
                break;
            case "DesktopComputer":
                return new Desktop();
                break;
            case "Monitor":
                return new Monitor();
                break;
            case "Tablet":
                return new Tablet();
                break;
        }
    }


    /**
     * Create a new instance of a DomainObject
     *
     * @return DomainObject
     */
    public function _create() {
        // TODO: Implement _create() method.
    }

    /**
     * Insert the DomainObject to persistent storage
     *
     * @param DomainObject $obj
     */


    public function _insert($obj)
    {/*

        switch ($obj->__get('ProductType')){
            case "Tablet":
                $this->tabletTDG->addTablet($obj);
                break;
            case "Laptop":
                $this->laptopTDG->addLaptop($obj);
                break;
            case "Monitor":
                $this->monitorTDG->addMonitor($obj);
                break;
            case "Desktop":
                $this->desktopTDG->addDesktop($obj);
                break;
        }
    */
    }

    /**
     * Update the DomainObject in persistent storage
     *
     * @param DomainObject $obj
     */

    public function _update($obj)
    {/*

        switch ($obj->__get('ProductType')){
            case "Tablet":
                $this->tabletTDG->updateTablet($obj);
                break;
            case "Laptop":
                $this->laptopTDG->updateLaptop($obj);
                break;
            case "Monitor":
                $this->monitorTDG->updateMonitor($obj);
                break;
            case "Desktop":
                $this->desktopTDG->updateDesktop($obj);
                break;
        }
    */
    }

    /**
     * Delete the DomainObject from peristent Storage
     *
     * @param DomainObject $obj
     */

    public function _delete($obj)
    {/*
        switch ($obj->__get('ProductType')){
            case "Tablet":
                $this->tabletTDG->deleteTablet($obj);
                break;
            case "Laptop":
                $this->laptopTDG->deleteLaptop($obj);
                break;
            case "Monitor":
                $this->monitorTDG->deleteMonitor($obj);
                break;
            case "Desktop":
                $this->desktopTDG->deleteDeskop($obj);
                break;
        }
*/
    }

}