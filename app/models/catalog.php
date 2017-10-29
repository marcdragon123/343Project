<?php

class CatalogModel extends Model{

    public function Index(){
        $this->query('SELECT * FROM account_tbl ORDER BY ID DESC'); //query goes here
        $rows = $this->resultSet();
        return $rows;
    }

    public function addProduct(){
        return;
    }

    public function addLaptop(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['laptop']){
            // Insert into MySQL
            $this->query('INSERT INTO product_tbl (productType, serialNum) VALUES(:laptop, :serialNum)');
            $this->bind(':laptop', 'laptop');
            $this->bind(':serialNum', $post['serialNum']);
            $this->execute();
            //$this->query('INSERT INTO ')
            // Verify
            $productID = $this->lastInsertId();

            $this->query('INSERT INTO laptop_tbl (productID, specKey, specValue) VALUES(:productID, :displaySize, :display)');
            $this->bind(':productID', $productID);
            $this->bind(':displaySize', 'displaySize');
            $this->bind(':display',$post['display']);
            $this->execute();
            $this->query('INSERT INTO laptop_tbl (productID, specKey, specValue) VALUES(:productID, :productWeight, :weight)');
            $this->bind(':productID', $productID);
            $this->bind(':productWeight', 'weight');
            $this->bind(':weight',$post['weight']);
            $this->execute();
            $this->query('INSERT INTO laptop_tbl (productID, specKey, specValue) VALUES(:productID, :brand, :brandName)');
            $this->bind(':productID', $productID);
            $this->bind(':brand', 'brand');
            $this->bind(':brandName',$post['brandName']);
            $this->execute();
            $this->query('INSERT INTO laptop_tbl (productID, specKey, specValue) VALUES(:productID, :productPrice, :price)');
            $this->bind(':productID', $productID);
            $this->bind(':productPrice', 'price');
            $this->bind(':price',$post['price']);
            $this->execute();
            $this->query('INSERT INTO laptop_tbl (productID, specKey, specValue) VALUES(:productID, :processorType, :processor)');
            $this->bind(':productID', $productID);
            $this->bind(':processorType', 'processorType');
            $this->bind(':processor',$post['processor']);
            $this->execute();
            $this->query('INSERT INTO laptop_tbl (productID, specKey, specValue) VALUES(:productID, :ramSize, :ram)');
            $this->bind(':productID', $productID);
            $this->bind(':ramSize', 'ramSize');
            $this->bind(':ram',$post['ram']);
            $this->execute();
            $this->query('INSERT INTO laptop_tbl (productID, specKey, specValue) VALUES(:productID, :numCPU, :cpu)');
            $this->bind(':productID', $productID);
            $this->bind(':numCPU', 'numCPU');
            $this->bind(':cpu',$post['cpu']);
            $this->execute();
            $this->query('INSERT INTO laptop_tbl (productID, specKey, specValue) VALUES(:productID, :batteryLife, :battery)');
            $this->bind(':productID', $productID);
            $this->bind(':batteryLife', 'batteryLife');
            $this->bind(':battery',$post['battery']);
            $this->execute();
            $this->query('INSERT INTO laptop_tbl (productID, specKey, specValue) VALUES(:productID, :operatingSystem, :os)');
            $this->bind(':productID', $productID);
            $this->bind(':operatingSystem', 'operatingSystem');
            $this->bind(':os',$post['os']);
            $this->execute();
            $this->query('INSERT INTO laptop_tbl (productID, specKey, specValue) VALUES(:productID, :hardDriveSize, :hardDrive)');
            $this->bind(':productID', $productID);
            $this->bind(':hardDriveSize', 'hardDriveSize');
            $this->bind(':hardDrive',$post['hardDrive']);
            $this->execute();
            $this->query('INSERT INTO laptop_tbl (productID, specKey, specValue) VALUES(:productID, :camera, :hasCamera)');
            $this->bind(':productID', $productID);
            $this->bind(':camera', 'hasCamera');
            $this->bind(':hasCamera',$post['hasCamera']);
            $this->execute();
            $this->query('INSERT INTO laptop_tbl (productID, specKey, specValue) VALUES(:productID, :isTouchScreen, :touchScreen)');
            $this->bind(':productID', $productID);
            $this->bind(':isTouchScreen', 'isTouchScreen');
            $this->bind(':touchScreen',$post['touchScreen']);
            $this->execute();

            if($this->lastInsertId()){
                // Redirect
                header('Location: '.ROOT_URL.'catalog/addProduct');
            }
        }
        return;

    }

    public function addMonitor(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if($post['monitor']){
            // Insert into MySQL
            $this->query('INSERT INTO product_tbl (productType, serialNum) VALUES(:monitor, :serialNum)');
            $this->bind(':monitor', 'monitor');
            $this->bind(':serialNum', $post['serialNum']);
            $this->execute();
            //$this->query('INSERT INTO ')
            // Verify
            $productID = $this->lastInsertId();

            $this->query('INSERT INTO monitor_tbl (productID, specKey, specValue) VALUES(:productID, :displaySize, :display)');
            $this->bind(':productID', $productID);
            $this->bind(':displaySize', 'displaySize');
            $this->bind(':display',$post['display']);
            $this->execute();
            $this->query('INSERT INTO monitor_tbl (productID, specKey, specValue) VALUES(:productID, :productWeight, :weight)');
            $this->bind(':productID', $productID);
            $this->bind(':productWeight', 'weight');
            $this->bind(':weight',$post['weight']);
            $this->execute();
            $this->query('INSERT INTO monitor_tbl (productID, specKey, specValue) VALUES(:productID, :brand, :brandName)');
            $this->bind(':productID', $productID);
            $this->bind(':brand', 'brand');
            $this->bind(':brandName',$post['brandName']);
            $this->execute();
            $this->query('INSERT INTO monitor_tbl (productID, specKey, specValue) VALUES(:productID, :productPrice, :price)');
            $this->bind(':productID', $productID);
            $this->bind(':productPrice', 'price');
            $this->bind(':price',$post['price']);
            $this->execute();

            if($this->lastInsertId()){
                // Redirect
                header('Location: '.ROOT_URL.'catalog/addProduct');
            }
        }
        return;

    }

    public function addTablet(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if($post['tablet']){
            // Insert into MySQL
            $this->query('INSERT INTO product_tbl (productType, serialNum) VALUES(:tablet, :serialNum)');
            $this->bind(':tablet', 'tablet');
            $this->bind(':serialNum', $post['serialNum']);
            $this->execute();
            //$this->query('INSERT INTO ')
            // Verify
            $productID = $this->lastInsertId();

            $this->query('INSERT INTO tablet_tbl (productID, specKey, specValue) VALUES(:productID, :displaySize, :display)');
            $this->bind(':productID', $productID);
            $this->bind(':displaySize', 'displaySize');
            $this->bind(':display',$post['display']);
            $this->execute();
            $this->query('INSERT INTO tablet_tbl (productID, specKey, specValue) VALUES(:productID, :productWeight, :weight)');
            $this->bind(':productID', $productID);
            $this->bind(':productWeight', 'weight');
            $this->bind(':weight',$post['weight']);
            $this->execute();
            $this->query('INSERT INTO tablet_tbl (productID, specKey, specValue) VALUES(:productID, :brand, :brandName)');
            $this->bind(':productID', $productID);
            $this->bind(':brand', 'brand');
            $this->bind(':brandName',$post['brandName']);
            $this->execute();
            $this->query('INSERT INTO tablet_tbl (productID, specKey, specValue) VALUES(:productID, :productPrice, :price)');
            $this->bind(':productID', $productID);
            $this->bind(':productPrice', 'price');
            $this->bind(':price',$post['price']);
            $this->execute();
            $this->query('INSERT INTO tablet_tbl (productID, specKey, specValue) VALUES(:productID, :processorType, :processor)');
            $this->bind(':productID', $productID);
            $this->bind(':processorType', 'processorType');
            $this->bind(':processor',$post['processor']);
            $this->execute();
            $this->query('INSERT INTO tablet_tbl (productID, specKey, specValue) VALUES(:productID, :ramSize, :ram)');
            $this->bind(':productID', $productID);
            $this->bind(':ramSize', 'ramSize');
            $this->bind(':ram',$post['ram']);
            $this->execute();
            $this->query('INSERT INTO tablet_tbl (productID, specKey, specValue) VALUES(:productID, :numCPU, :cpu)');
            $this->bind(':productID', $productID);
            $this->bind(':numCPU', 'numCPU');
            $this->bind(':cpu',$post['cpu']);
            $this->execute();
            $this->query('INSERT INTO tablet_tbl (productID, specKey, specValue) VALUES(:productID, :batteryLife, :battery)');
            $this->bind(':productID', $productID);
            $this->bind(':batteryLife', 'batteryLife');
            $this->bind(':battery',$post['battery']);
            $this->execute();
            $this->query('INSERT INTO tablet_tbl (productID, specKey, specValue) VALUES(:productID, :operatingSystem, :os)');
            $this->bind(':productID', $productID);
            $this->bind(':operatingSystem', 'operatingSystem');
            $this->bind(':os',$post['os']);
            $this->execute();
            $this->query('INSERT INTO tablet_tbl (productID, specKey, specValue) VALUES(:productID, :hardDriveSize, :hardDrive)');
            $this->bind(':productID', $productID);
            $this->bind(':hardDriveSize', 'hardDriveSize');
            $this->bind(':hardDrive',$post['hardDrive']);
            $this->execute();
            $this->query('INSERT INTO tablet_tbl (productID, specKey, specValue) VALUES(:productID, :length_cm, :lengthCM)');
            $this->bind(':productID', $productID);
            $this->bind(':length_cm', 'length');
            $this->bind(':lengthCM',$post['lengthCM']);
            $this->execute();
            $this->query('INSERT INTO tablet_tbl (productID, specKey, specValue) VALUES(:productID, :width_cm, :widthCM)');
            $this->bind(':productID', $productID);
            $this->bind(':width_cm', 'width');
            $this->bind(':widthCM',$post['widthCM']);
            $this->execute();
            $this->query('INSERT INTO tablet_tbl (productID, specKey, specValue) VALUES(:productID, :height_cm, :heightCM)');
            $this->bind(':productID', $productID);
            $this->bind(':height_cm', 'height');
            $this->bind(':heightCM',$post['heightCM']);
            $this->execute();
            $this->query('INSERT INTO tablet_tbl (productID, specKey, specValue) VALUES(:productID, :camera, :cam)');
            $this->bind(':productID', $productID);
            $this->bind(':camera', 'camera');
            $this->bind(':cam',$post['cam']);
            $this->execute();

            if($this->lastInsertId()){
                // Redirect
                header('Location: '.ROOT_URL.'catalog/addProduct');
            }
        }
        return;

    }

    public function addDesktop(){
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

         if($post['desktop']){
            // Insert into MySQL
            $this->query('INSERT INTO product_tbl (productType, serialNum) VALUES(:desktop, :serialNum)');
            $this->bind(':desktop', 'desktop');
            $this->bind(':serialNum', $post['serialNum']);
            $this->execute();
            //$this->query('INSERT INTO ')
            // Verify
            $productID = $this->lastInsertId();

            $this->query('INSERT INTO desktop_tbl (productID, specKey, specValue) VALUES(:productID, :productWeight, :weight)');
            $this->bind(':productID', $productID);
            $this->bind(':productWeight', 'weight');
            $this->bind(':weight',$post['weight']);
            $this->execute();
            $this->query('INSERT INTO desktop_tbl (productID, specKey, specValue) VALUES(:productID, :brand, :brandName)');
            $this->bind(':productID', $productID);
            $this->bind(':brand', 'brand');
            $this->bind(':brandName',$post['brandName']);
            $this->execute();
            $this->query('INSERT INTO desktop_tbl (productID, specKey, specValue) VALUES(:productID, :productPrice, :price)');
            $this->bind(':productID', $productID);
            $this->bind(':productPrice', 'price');
            $this->bind(':price',$post['price']);
            $this->execute();
            $this->query('INSERT INTO desktop_tbl (productID, specKey, specValue) VALUES(:productID, :processorType, :processor)');
            $this->bind(':productID', $productID);
            $this->bind(':processorType', 'processorType');
            $this->bind(':processor',$post['processor']);
            $this->execute();
            $this->query('INSERT INTO desktop_tbl (productID, specKey, specValue) VALUES(:productID, :ramSize, :ram)');
            $this->bind(':productID', $productID);
            $this->bind(':ramSize', 'ramSize');
            $this->bind(':ram',$post['ram']);
            $this->execute();
            $this->query('INSERT INTO desktop_tbl (productID, specKey, specValue) VALUES(:productID, :numCPU, :cpu)');
            $this->bind(':productID', $productID);
            $this->bind(':numCPU', 'numCPU');
            $this->bind(':cpu',$post['cpu']);
            $this->execute();
            $this->query('INSERT INTO desktop_tbl (productID, specKey, specValue) VALUES(:productID, :hardDriveSize, :hardDrive)');
            $this->bind(':productID', $productID);
            $this->bind(':hardDriveSize', 'hardDriveSize');
            $this->bind(':hardDrive',$post['hardDrive']);
            $this->execute();
            $this->query('INSERT INTO desktop_tbl (productID, specKey, specValue) VALUES(:productID, :length_cm, :lengthCM)');
            $this->bind(':productID', $productID);
            $this->bind(':length_cm', 'length');
            $this->bind(':lengthCM',$post['lengthCM']);
            $this->execute();
            $this->query('INSERT INTO desktop_tbl (productID, specKey, specValue) VALUES(:productID, :width_cm, :widthCM)');
            $this->bind(':productID', $productID);
            $this->bind(':width_cm', 'width');
            $this->bind(':widthCM',$post['widthCM']);
            $this->execute();
            $this->query('INSERT INTO desktop_tbl (productID, specKey, specValue) VALUES(:productID, :height_cm, :heightCM)');
            $this->bind(':productID', $productID);
            $this->bind(':height_cm', 'height');
            $this->bind(':heightCM',$post['heightCM']);
            $this->execute();

            if($this->lastInsertId()){
                // Redirect
                header('Location: '.ROOT_URL.'catalog/addProduct');
            }
        }
        return;

    }


    public function editProduct(){

    }

    public function removeProduct(){

    }

    public function viewProductDDetails(){

    }

}
