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
        if(isset($_SESSION['is_logged_in'])){
            $this->userEmail = $_SESSION['user_data']['Email'];
            $this->cartIdMap = ShoppingCartIdMap::getInstance();
            $this->shoppingCart = $this->cartIdMap->get($this->userEmail);
            if(is_null($this->shoppingCart)){
                $this->shoppingCart = new ShoppingCart();
            }
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
            ProductCatalog::getInstance()->addProduct($obj);
            try{
                UnitOfWork::getInstance()->registerNew($obj);
                UnitOfWork::getInstance()->commit(CatalogMapper::getInstance());
                return true;
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
            UnitOfWork::getInstance()->registerDirty($obj);
            UnitOfWork::getInstance()->commit(CatalogMapper::getInstance());
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
     * @param Product $obj
     */
    public function updateTime(Product $obj){
        ProductCatalog::getInstance()->modifyProduct($obj);
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

        foreach ($products as $item => $product) {
            foreach ($product as $item){
                if($item->__get('status') <= time()){
                    array_push($array, $item);
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
        try{
            $product = ProductCatalog::getInstance()->getProduct($type,$serialNum);
        }
        catch (Exception $exception){
            Messages::setMsg('Product Added to Cart', '');
            header('Location: ' .ROOT_URL. 'users/viewProductCatalog');
        }
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
        if(get_class($obj) == 'Transaction'){
            $this->transactionsTDG->update($obj);
        }
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
        if(get_class($obj) == 'Transaction'){
        $this->transactionsTDG->delete($obj);
        }
        switch ($obj->__get('ProductType')){
            case "Tablet":
                $this->tabletTDG->delete($obj);
                break;
            case "Laptop":
                $this->laptopTDG->delete($obj);
                break;
            case "Monitor":
                $this->monitorTDG->delete($obj);
                break;
            case "Desktop":
                $this->desktopcomputerTDG->delete($obj);
                break;
        }
    }

    /**
     * @param $product
     * @return bool
     */
    public function addToCart($product){
        try{
            ProductCatalog::getInstance()->addedToCart($product);
            $this->shoppingCart->addToCart($product);
            $this->cartIdMap->add($this->shoppingCart, $this->userEmail);
            return true;
        }catch (Exception $exception){
            Messages::setMsg($exception->getMessage(),'error');
        }
    }

    /**
     * @param $productType
     * @param $serialNumber
     * @return bool
     */
    public function removeFromCart($productType, $serialNumber){
        try{
            $productObj = $this->shoppingCart->getInCartProduct($productType,$serialNumber);
            ProductCatalog::getInstance()->removedFromCart($productObj);
            $this->shoppingCart->removeFromCart($productType, $serialNumber);
            $this->cartIdMap->add($this->shoppingCart, $this->userEmail);
            return true;
        }
        catch (Exception $exception){
            Messages::setMsg($exception->getMessage(), 'error');
        }
    }

    /**
     * @return ShoppingCart
     */
    public function viewCart(){
        try{
            return $this->shoppingCart;
        }catch (Exception $exception){
            Messages::setMsg($exception->getMessage(), 'error');
        }
    }

    /**
     * @return Transaction
     * @throws Exception
     */
    public function checkout(){
        if(is_null($this->shoppingCart->getCartProducts())){
            throw new Exception('Cannot perform transaction on an empty cart');
        }
        $transaction = new Transaction($this->userEmail);
        foreach ($this->shoppingCart->getCartProducts() as $item =>$product){
            foreach ($product as $item){
                $transaction->addToTransaction($item);
            }
        }
        return $this->addToTransactionCatalog($transaction);
    }


    /**
     * @param $transaction
     * @return Transaction;
     */
    public function addToTransactionCatalog($transaction){
        $transactionID = rand();
        $transaction->__set('transactionID', $transactionID);
        $this->transactionsCatalog->addTransaction($transaction);
        $this->UOW->registerNew($transaction);
        $this->setAsSold($transaction);
        return $transaction;
    }

    /**
     * @param Transaction $transaction
     */
   public function setAsSold($transaction){
        foreach ($transaction->getPurchasedProducts() as $product => $item){
            foreach ($item as $product){
                $product->__set('Sold', 1);
                $this->UOW->registerDirty($product);
                ProductCatalog::getInstance()->purchasedProduct($product);
            }
        }
        $this->cartIdMap->remove($this->userEmail);
        $this->UOW->commit(CatalogMapper::getInstance());
    }

    /**
     * @param $transactionID
     * @return mixed
     */
    public function returnTransaction($transactionID){
       return $this->transactionsCatalog->getTransaction($transactionID, $_SESSION['user_data']['Email']);
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getAllTransactions($email){
        return $this->transactionsTDG->find($email);
    }

    /**
     * @param $transactionID
     * @param $email
     * @return mixed
     */
    public function getTransaction($transactionID, $email){
        return $this->transactionsCatalog->getTransaction($transactionID, $email);
    }

    /**
     * @param $productType
     * @param $serialNumber
     */
    public function returnProduct($productType, $serialNumber){
        try{
            $product = ProductCatalog::getInstance()->returnedProduct($productType, $serialNumber);
            $product->__set('Sold', 0);
            ProductCatalog::getInstance()->addProduct($product);
            $this->UOW->registerDirty($product);
        }
        catch (Exception $exception){
            Messages::setMsg($exception->getMessage(), 'error');
        }
    }

    public function modifyTransaction($transactionID, $email, $productType, $serialNumber){
        $transaction = $this->transactionsCatalog->getTransaction($transactionID, $email);
        $transaction->removeFromTransaction($productType, $serialNumber);

        if($transaction->__get('totalCost')==0){
            $this->transactionsCatalog->deleteTransaction($transaction);
            $this->UOW->registerDeleted($transaction);
        }else{
            $this->transactionsCatalog->modifyTransaction($transaction);
            $this->UOW->registerDirty($transaction);
        }
        $this->UOW->commit(CatalogMapper::getInstance());
    }


}