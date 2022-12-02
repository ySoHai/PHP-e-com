<?php

class Product {
    
    private int $id;
	private string $name;
    private string $description;
	private float $price;
	private int $quantity;
	private bool $quality;
	private int $ship_days;
	private int $category;
	private int $sellerID;
    
    public function __construct(int $id_,string $name_="",string $description_="",float $price_=0,int $quantity_=0,bool $quality_=false,int $ship_days_=0,int $category_=0,int $sellerID_=0) {
		$this->id = $id_;
		$this->name = $name_;
		$this->price = $price_;
		$this->quantity = $quantity_;
		$this->quality = $quality_;
		$this->ship_days = $ship_days_;
		$this->category = $category_;
		$this->description = $description_;
		$this->sellerID = $sellerID_;
	}

    public function getID() {
        return $this->id;
    }

    public function setID(int $value) {
        $this->id = $value;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName(string $value) {
        $this->name = $value;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function setDescription(string $value) {
        $this->description = $value;
    }
    
    public function getPrice() {
        return $this->price;
    }

    public function getPriceFormatted() {
        $formatted_price = number_format($this->price, 2);
        return $formatted_price;
    }
    
     public function setPrice(float $value) {
        $this->price = $value;
    }
    
    public function getQuantity() {
        return $this->quantity;
    }
    
     public function setQuantity(int $value) {
        $this->quantity = $value;
    }
    
    public function getQuality() {
        return $this->quality;
    }
	
	public function getQualityS() {
        if($this->quality) return "new";
		else return "used";
    }
    
    public function setQuality(bool $value) {
        $this->quality = $value;
    }
    
    public function getShip_days() {
        return $this->ship_days;
    }
    
     public function setShip_days(int $value) {
        $this->ship_days = $value;
    }
    
    public function getCategory() {
        return $this->category;
    }

    public function setCategory(int $value) {
        $this->category = $value;
    }
    
	 public function getUser() {
        return $this->sellerID;
    }

    public function setUser(int $value) {
        $this->sellerID = $value;
    }
	
}

?>