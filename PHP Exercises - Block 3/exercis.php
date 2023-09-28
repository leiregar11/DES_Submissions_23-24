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
            throw new Exception("Runner already has 5 races.<br>");
        }

        if ($time < 5) {
            throw new Exception("Race time must be at least 5 seconds.<br>");
        }

        $this->races[] = $time;
    }
}

class Competition{
    private $runners;

    public function __construct() {
        $this->runners = [];
    }

    public function addRunner($runner) {
        $code = $runner->getCode();
        $this->runners[$code] = $runner;
    }

    public function addRaceToRunner($code, $time) {
        if (array_key_exists($code, $this->runners)) {
            $runner = $this->runners[$code];
            $runner->addRace($time);
        }
    }

    public function getAvrFirstRace() {

        $sumRaces = 0;
        $contRaces = 0;
        foreach ($this->runners as $runner) {
            $runnerRaces = $runner->getRaces();
            if (count($runnerRaces) >= 1) {
                $sumRaces += $runnerRaces[0];
                $contRaces++;
            }
        }
    
        if ($contRaces > 0) {
            return "Average time of the 1st race: " . ($sumRaces / $contRaces) . " seconds<br>";
        } else {
            return "No runners have completed a race.<br>";
        }
    }
    
    public function getQuickestRace() {
        $quickestRace = 10000;
        $faster = "";
        foreach ($this->runners as $runner) {
            $runnerRaces = $runner->getRaces();
            if (count($runnerRaces) >= 1) {
                foreach ($runnerRaces as $race) {
                    if ($race < $quickestRace) {
                        $quickestRace = $race;
                        $faster = $runner->getName();
                    }
                }
            }
        }
        return "Quickest runner: $faster<br>";
    }
    
    public function getSlowRunners() {
        $runnersMore15s = [];
    
        foreach ($this->runners as $runner) {
            $slowRaces = array_filter($runner->getRaces(), function ($time) {
                return $time > 15;
            });
    
            if (count($slowRaces) > 2) {
                $runnersMore15s[] = $runner->getName();
            }
        }
    
        return "Runners with more than 2 races > 15 seconds: " . implode(', ', $runnersMore15s) . "<br>";
    }
    
    public function getRunnersWithNameEndingE() {
        $runnersWithE = [];
    
        foreach ($this->runners as $runner) {
            $name = $runner->getName();
            if (substr($name, -1) === 'e') {
                $runnersWithE[] = $name;
            }
        }
    
        return "Runners with names ending in 'e': " . implode(', ', $runnersWithE) . "<br>";
    }
}
$competition = new Competition();

$runner1 = new Runner('Alice', 'A123');
$runner2 = new Runner('Bob', 'B456');
$runner3 = new Runner('Charlie', 'C789');

$competition->addRunner($runner1);
$competition->addRunner($runner2);
$competition->addRunner($runner3);

try {
    // Agregar carreras a los corredores
    $runner1->addRace(10);
    $runner1->addRace(20);
    $runner1->addRace(30);
    // $runner1->addRace(5);
    // $runner1->addRace(40); // Esto generará una excepción

    $runner2->addRace(15);
    $runner2->addRace(18);
    $runner2->addRace(22);

    $runner3->addRace(10);
    $runner3->addRace(12);
    $runner3->addRace(8);
    // $runner3->addRace(9);
    // $runner3->addRace(14);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

// Agregar más carreras a los corredores
$competition->addRaceToRunner('A123', 12);
$competition->addRaceToRunner('B456', 19);
$competition->addRaceToRunner('C789', 13);

// Mostrar resultados de las pruebas
echo $competition->getAvrFirstRace();
echo $competition->getQuickestRace();
echo $competition->getSlowRunners();
echo $competition->getRunnersWithNameEndingE();
?>
                   