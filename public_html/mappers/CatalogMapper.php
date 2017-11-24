<?php

class CatalogMapper extends MapperAbstract {
    private static $instance = null;
    protected $CatalogTDG;
    protected $monitorTDG;
    protected $tabletTDG;
    protected $laptopTDG;
    protected $desktopcomputerTDG;

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
        $this->monitorTDG = new monitorTDG();
        $this->tabletTDG = new tabletTDG();
        $this->laptopTDG = new laptopTDG();
        $this->desktopcomputerTDG = new desktopcomputerTDG();
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
        $obj = $this->_create($data['ProductType']);
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
            //ProductCatalog::getInstance()->addProduct($obj);
            try{
                $this->_insert($obj);
                //UnitOfWork::getInstance()->registerNew($obj);
                //UnitOfWork::getInstance()->commit(CatalogMapper::getInstance());
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

    /**
     * @param Product $obj
     * @return boolean
     */
    public function modifyProduct(Product $obj){
        try{
            ProductCatalog::getInstance()->modifyProduct($obj);

        }catch (Exception $exception){
                Messages::setMsg($exception->getMessage(), 'error');
        }
        try{
            $this->_update($obj);
            //UnitOfWork::getInstance()->registerNew($obj);
            //UnitOfWork::getInstance()->commit(CatalogMapper::getInstance());
            //return true;
        }catch (Exception $exception){
                Messages::setMsg($exception->getMessage(), 'error');
        }
    }

    public function setTimer(Product $obj){
        $obj->__set("status", time()+LOCKED_TIME);
        CatalogMapper::getInstance()->modifyProduct($obj);
    }

    /**
     * @param $type
     * @return ArrayObject
     */
    public function viewProductsByType($type){
        $products = ProductCatalog::getInstance()->viewByType($type);

        return ($products);
    }

    /**
     * returns array of product objects
     * @return Product
     */

    public function getAllProducts(){
        $products = ProductCatalog::getInstance()->viewAllProducts();
        return ($products);
    }

    /**
     * @return mixed
     */
    public function getAllProductsAvailable(){
        $products = ProductCatalog::getInstance()->viewAllProducts();

        return $this->availableList($products);
    }


    /**
     * @param $products
     * @return array
     */
    public function availableList($products){
        $array = array();

        foreach($products as $key => $value) {
            foreach ($products[$key] as $item => $product) {
                if($product->__get('status') <= time()) {
                    array_push($array, $products[$key]);
                }
            }
        }

        return $array;
    }

    public function isAvailable(Product $product){
        return ($product->__get('status') <= time());
    }

    /**
     * @param $type
     * @param $serialNum
     * @return Product
     */
    public function getProductSpecification($type, $serialNum){
        $product = ProductCatalog::getInstance()->getProduct($type,$serialNum);
        return $product;
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
        $obj->__set("ModelNumber", $data['ModelNumber']);
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
        $obj->__set("ModelNumber", $data['ModelNumber']);
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
        $obj->__set("ModelNumber", $data['ModelNumber']);
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
        $obj->__set("ModelNumber", $data['ModelNumber']);
        $obj->__set("DisplayDimensions", $data['DisplayDimensions']);

        return $obj;
    }

    /**
     * Create a new instance of a DomainObject
     * @param $type
     * @return Product
     */
    public function _create($type = null) {
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
     * Insert the DomainObject to persistent storage
     *
     * @param Product $obj
     */
    public function _insert($obj)
    {

        switch ($obj->__get('ProductType')){
            case "Tablet":
                $this->tabletTDG->insert($obj);
                break;
            case "Laptop":
                $this->laptopTDG->insert($obj);
                break;
            case "Monitor":
                $this->monitorTDG->insert($obj);
                break;
            case "Desktop":
                $this->desktopcomputerTDG->insert($obj);
                break;
        }
    
    }

    /**
     * Update the DomainObject in persistent storage
     *
     * @param Product $obj
     */
    public function _update($obj)
    {

        switch ($obj->__get('ProductType')){
            case "Tablet":
                $this->tabletTDG->update($obj);
                break;
            case "Laptop":
                $this->laptopTDG->update($obj);
                break;
            case "Monitor":
                $this->monitorTDG->update($obj);
                break;
            case "Desktop":
                $this->desktopcomputerTDG->update($obj);
                break;
        }

    }

    /**
     * Delete the DomainObject from peristent Storage
     *
     * @param Product $obj
     */
    public function _delete($obj)
    {
        switch ($obj->__get('ProductType')){
            case "Tablet":
                $this->tabletTDG->update($obj);
                break;
            case "Laptop":
                $this->laptopTDG->update($obj);
                break;
            case "Monitor":
                $this->monitorTDG->update($obj);
                break;
            case "Desktop":
                $this->desktopcomputerTDG->update($obj);
                break;
        }
    }

}