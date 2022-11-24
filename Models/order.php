<?php
class Order{
    private int $userId;
    private int $orderId;
    private DateTime $orderDate;
    private float $grandTotal;

    public function __construct(int $userId) {
        $this->userId = $userId;
	}

    public function getOrderId() {
        return $this->orderId;
    }

    public function getOrderDate() {
        return $this->orderDate;
    }
    public function getGrandTotal() {
        return $this->grandTotal;
    }
    
    
}




?>