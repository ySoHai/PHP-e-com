<?php
class Category {
    public function __construct(
        private int $id,
        private string $description,
    ) { }

    public function getID() {
        return $this->id;
    }

    public function setID(int $value) {
        $this->id = $value;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription(string $value) {
        $this->name = $value;
    }
}
?>