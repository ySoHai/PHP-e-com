<?php
class Category {
	private int $id;
        private string $description;
    public function __construct(
        int $id_
    ) {
		$this->id = $id_;
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