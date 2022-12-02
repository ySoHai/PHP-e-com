<?php
class Category {
	private int $id;
    private string $description;
	
    public function __construct(int $id_, string $description_) {
		$this->id = $id_;
		$this->description = $description_;
	}

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