<?php
class Runner{
    private $name;
    private $code;
    private $races;

    public function __construct($name, $code) {
        $this->name = $name;
        $this->code = $code;
        $this->races = [];
    }

    public function getName() {
        return $this->name;
    }

    public function getCode() {
        return $this->code;
    }

    public function getRaces() {
        return $this->races;
    }

    public function addRace($time) {
        if (count($this->races) >= 5) {
            throw new Exception("Runner ".( $this->name)." already has 5 races.<br>");
        }

        if ($time < 5) {
            throw new Exception("Race time must be at least 5 seconds.<br>");
        }

        $this->races[] = $time;
    }
    
}
?>