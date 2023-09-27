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
            throw new Exception("Runner already has 5 races.\n");
        }

        if ($time < 5) {
            throw new Exception("Race time must be at least 5 seconds.\n");
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
            return "Average time of the 1st race: " . ($sumRaces / $contRaces) . " seconds\n";
        } else {
            return "No runners have completed a race.\n";
        }
    }

    function getQuickestRace() {
        $quickestRace = 10000;
        $faster = "";
        foreach ($this->runners as $runner) {
            $runnerRaces = $runner->getRaces();
            if (count($runnerRaces) >= 1) { // Fixed the condition here
                foreach ($runnerRaces as $race) {
                    if ($race < $quickestRace) {
                        $quickestRace = $race;
                        $faster = $runner->getName();
                    }
                }
            }
        }
        return "Quickest runner: $faster\n";
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

        return "Runners with more than 2 races > 15 seconds: " . implode(', ', $runnersMore15s) . "\n";
    }

    public function getRunnersWithNameEndingE() {
        $runnersWithE = [];

        foreach ($this->runners as $runner) {
            $name = $runner->getName();
            if (substr($name, -1) === 'e') { // Fixed the condition here
                $runnersWithE[] = $name;
            }
        }

        return "Runners with names ending in 'e': " . implode(', ', $runnersWithE) . "\n";
    }
}

$competition = new Competition();

$runner1 = new Runner('Alice', 'A123');
$runner2 = new Runner('Bob', 'B456');

$competition->addRunner($runner1);
$competition->addRunner($runner2);

try {
    $runner1->addRace(10);
    $runner1->addRace(20);
    $runner1->addRace(30);
    $runner1->addRace(5);
    // Uncommented this line (will throw an exception due to < 5 seconds)
    // $runner1->addRace(40); // Commented this line to avoid exceeding 5 races

    $runner2->addRace(15);
    $runner2->addRace(18);
    $runner2->addRace(22);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

$competition->addRaceToRunner('A123', 12);
$competition->addRaceToRunner('B456', 19);

$averageTime = $competition->getAvrFirstRace();
echo $averageTime;

$quickestRunner = $competition->getQuickestRace();
echo $quickestRunner;

$slowRunners = $competition->getSlowRunners();
echo $slowRunners;

$runnersWithE = $competition->getRunnersWithNameEndingE();
echo $runnersWithE;
?>
