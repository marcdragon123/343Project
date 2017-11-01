<?php
/**
 * Created by PhpStorm.
 * User: ahmadbiz
 * Date: 2017-10-30
 * Time: 6:36 PM
 */

abstract class ProductModel extends Model{

    protected $id;
    protected $productType;
    protected $weight;
    protected $price;
    protected $brandName;
    protected $serialNum;
    protected $productVars;
    protected $currentProduct;

    abstract public function __set($spec, $val);
    abstract public function retrieveMetas();

    public function test(){

        $this->query('SELECT * FROM '.$this->productType);

    }
    final public function __get($spec){
        return $this->$spec;
    }


    /**
     * Get all products
     *
     * @return ProductModel[]
     */
    public static function findBy() {

        // Select all products

        // Map the results in the product class
        // $products = [];
        // foreach ($results as $product)
        // $product = new ProductModel();      or        new static();
        // $product->setProp1($results[$i]['prop1']);
        // ...
        // $products[] =  $product

        // In PDO there is a hydrating method to hydrate to a specific class
        // http://php.net/manual/en/pdostatement.fetch.php   --     PDO::FETCH_CLASS
        // In that case you don't have to process the results


        return [];

    }

    public static function findById($id=null){

        if($id == null){
            //$this->query('SELECT * FROM table');
            //$this->productVars = (object) $this->resultSet();

            //$this->getMeta($id, $key);
            //$this->productVars['weight'];
        }
        else{
            //$this->query("");
        }

    }

    public function getMeta($key){

        if(empty($this->productVars)) {
            $this->loadMetas();
        }

        if(isset($this->productVars[$key])) {
            return $this->productVars[$key];
        } else {
            throw new Exception('The property does not exists');
        }

    }

    protected function loadMetas() {

        // Select all metas using $this->getID();

        // Put everything in $this->productVar


    }

    //$product1 =..find..(1);
    //$product2 =..find..(2);



    //public static function getMeta($id, $key){

    //}
}