<?php
class Order{
    private int $userId;
    private int $orderId;
    private string $orderDate;
    private float $grandTotal;
    //private array $array =[];

    public function __construct(int $orderId, int $userId, string $order_date, float $grandTotal) {
        $this->orderId = $orderId;
        $this->userId = $userId;
        $this->orderDate = $order_date;
        $this->grandTotal = $grandTotal;
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