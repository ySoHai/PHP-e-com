<?php
class Order{
    private int $userId;
    private int $orderId;
    private string $orderDate;
    private float $grandTotal;

    public function __construct(int $orderId_, int $userId_, string $orderDate_, float $grandTotal_) {
        $this->orderId = $orderId_;
        $this->userId = $userId_;
        $this->orderDate = $orderDate_;
        $this->grandTotal = $grandTotal_;
	}

    public function getOrderId() {
        return $this->orderId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getOrderDate() {
        return $this->orderDate;
    }
    public function getGrandTotal() {
        return $this->grandTotal;
    }
    
    public function setOrderId(int $value) {
        $this->orderId = $value;
    }

    public function setUserId(int $value) {
        $this->orderId = $value;
    }

    public function setOrderDate(string $value) {
        $this->orderDate = $value;
    }

    public function setGrandTotal(float $value) {
        $this->grandTotal = $value;
    }   
}
?>