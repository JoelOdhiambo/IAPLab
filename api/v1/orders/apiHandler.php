<?php
include_once './DBConnector.php';

class ApiHandler{
    private $meal_name;
    private $meal_units;
    private $unit_price;
    private $status;
    private $user_api_key;

    


    
    


    /**
     * Get the value of meal_name
     */ 
    public function getMealName()
    {
        return $this->meal_name;
    }

    /**
     * Set the value of meal_name
     *
     * @return  self
     */ 
    public function setMealName($meal_name)
    {
        $this->meal_name = $meal_name;

        return $this;
    }

    /**
     * Get the value of meal_units
     */ 
    public function getMealUnits()
    {
        return $this->meal_units;
    }

    /**
     * Set the value of meal_units
     *
     * @return  self
     */ 
    public function setMealUnits($meal_units)
    {
        $this->meal_units = $meal_units;

        return $this;
    }

    /**
     * Get the value of unit_price
     */ 
    public function getUnitPrice()
    {
        return $this->unit_price;
    }

    /**
     * Set the value of unit_price
     *
     * @return  self
     */ 
    public function setUnitPrice($unit_price)
    {
        $this->unit_price = $unit_price;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of user_api_key
     */ 
    public function getUserApiKey()
    {
        return $this->user_api_key;
    }

    /**
     * Set the value of user_api_key
     *
     * @return  self
     */ 
    public function setUser_api_key($key)
    {
        $this->user_api_key = $key;

        return $this;
    }
 
    public function createOrder()
    {
        $con=new DBConnector();
        $res=mysqli_query($con->conn,"INSERT INTO orders(order_name,unit_price,order_status)VALUES ('$this->meal_name','$this->meal_units','$this->unit_price','$this->status')")or die("Error:");
        return $res;
    }

    public function checkOrderStatus()
    {
        
    }

    public function fetchAllOrders()
    {
        
    }

    public function checkApiKey()
    {
        return true;
    }

    public function checkContentType()
    {
        
    }
}

?>