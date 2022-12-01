<?php
class OrderItem{
    private int $orderId;
    private int $productId;
    private int $amount;
    private float $total;

    public function __construct(int $orderId, int $productId, int $amount,float $total) {
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->amount = $amount;
        $this->total = $total;
	}

    public function getOrderID() {
        return $this->orderId;
    }

    public function getProductID() {
        return $this->productId;
    }

    public function getAmount() {
        return $this->amount;
    }
    public function getTotal() {
        return $this->total;
    }
    
    public function setOrderId(int $value) {
        $this->orderId = $value;
    }

    public function setProductId(int $value) {
        $this->productId = $value;
    }

    public function setAmount(float $value) {
        $this->amount = $value;
    }

    public function setTotal(float $value) {
        $this->total = $value;
    }

    
}




?>