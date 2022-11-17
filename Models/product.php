<? php

class Product {
    
    private int $id;
    
    public function __construct(
        private string $name,
        private string $description,
        private float $price,
        private int $quantity,
        private bool $quality,
        private int $ship_days,
        private Category $category,
    ) { }

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

    public function setCategory(Category $value) {
        $this->category = $value;
    }
    
}

?>