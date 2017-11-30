<?php

class CatalogMapper extends MapperAbstract {
    private static $instance = null;
    protected $CatalogTDG;
    protected $monitorTDG;
    protected $tabletTDG;
    protected $laptopTDG;
    protected $desktopcomputerTDG;
    protected $transactionsTDG;
    protected $transactionsCatalog;
    protected $shoppingCart;
    protected $cartIdMap;
    protected $userEmail;
    protected $UOW;

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
        $this->UOW = UnitOfWork::getInstance();
        $this->monitorTDG = new monitorTDG();
        $this->tabletTDG = new tabletTDG();
        $this->laptopTDG = new laptopTDG();
        $this->desktopcomputerTDG = new desktopcomputerTDG();
        $this->transactionsTDG = new transactionTDG();
        $this->transactionsCatalog = TransactionsCatalog::getInstance();
        $this->userEmail = $_SESSION['user_data']['Email'];
        $this->cartIdMap = ShoppingCartIdMap::getInstance();
        $this->shoppingCart = $this->cartIdMap->get($this->userEmail);
        if(is_null($this->shoppingCart)){
            $this->shoppingCart = new ShoppingCart();
        }
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
        try{
            //ProductCatalog::getInstance()->addProduct($obj);
            try{
                //$this->_insert($obj);
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
            UnitOfWork::getInstance()->registerNew($obj);
            UnitOfWork::getInstance()->commit(CatalogMapper::getInstance());
            return true;
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
     * @param DomainObject $obj
     */
    public function _insert($obj)
    {
        if(get_class($obj) == 'Transaction'){
            $this->transactionsTDG->insert($obj);
        }
        else {
            switch ($obj->__get('ProductType')) {
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

    public function addToCart($product){
        try{
            ProductCatalog::getInstance()->addedToCart($product);
            $this->shoppingCart->addToCart($product);
            $this->cartIdMap->add($this->shoppingCart, $this->userEmail);
            //var_dump($this->shoppingCart);
            return ;
        }catch (Exception $exception){
            Messages::setMsg($exception->getMessage(),'error');
        }
    }

    public function removeFromCart($productType, $serialNumber){
        try{
            $productObj = $this->shoppingCart->getInCartProduct($productType,$serialNumber);
            ProductCatalog::getInstance()->removedFromCart($productObj);
            $this->shoppingCart->removeFromCart($productType, $serialNumber);
            $this->cartIdMap->add($this->shoppingCart, $this->userEmail);
        }
        catch (Exception $exception){
            Messages::setMsg($exception->getMessage(), 'error');
        }
    }

    public function viewCart(){
        try{
            return $this->shoppingCart;
        }catch (Exception $exception){
            Messages::setMsg($exception->getMessage(), 'error');
        }
    }


    public function checkout(){
        $transaction = new Transaction($this->userEmail);
        $myCartProducts = $this->viewCart()->getCartProducts();
        $transaction->setPurchasedProducts($myCartProducts);
        $transaction->setProducts();
        $transaction->__set('totalCost', $this->shoppingCart->getTotal());
        $this->addToTransactionCatalog($transaction);
        $this->UOW->registerNew($transaction);
        $this->UOW->commit(CatalogMapper::getInstance());
    }


    /**
     * @param Transaction $transaction
     */
    public function addToTransactionCatalog($transaction){
        $transactionID = rand();
        $transaction->__set('transactionID', $transactionID);
        $this->transactionsCatalog->addTransaction($transaction);
        $this->setAsSold($transaction);
        //$this->cartIdMap->remove($this->userEmail);

    }

    /**
     * @param Transaction $transaction
     */
    public function setAsSold($transaction){
        foreach ($transaction->getPurchasedProducts() as $product => $item){
            foreach ($item as $product){
                $product->__set('Sold', true);
                $this->UOW->registerDirty($product);
            }
        }
        //$this->UOW->commit(CatalogMapper::getInstance());
    }


}