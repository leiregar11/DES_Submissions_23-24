<?php
include "Runner.php";
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
        try {
        if (array_key_exists($code, $this->runners)) {
            $runner = $this->runners[$code];
            $runner->addRace($time);
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
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
        return "Quickest runner: $faster<br>";
    }

    // public function getSlowRunners() {
    //     $runnersMore15s = [];

    //     foreach ($this->runners as $runner) {
    //         $slowRaces = array_filter($runner->getRaces(), function ($time) {
    //             return $time > 15;
    //         });

    //         if (count($slowRaces) > 2) {
    //             $runnersMore15s[] = $runner->getName();
    //         }
    //     }

    //     return "Runners with more than 2 races > 15 seconds: " . implode(', ', $runnersMore15s) . "<br>";
    // }

    public function getSlowRunners() {
        $runnersMore15s = [];

        foreach ($this->runners as $runner) {
            $slowRaces=0;
            foreach($runner->getRaces() as $race){
                if($race>15){
                    $slowRaces++;
                }
            }
            if ($slowRaces > 2) {
                $runnersMore15s[] = $runner->getName();
            }
        }

        return "Runners with more than 2 races > 15 seconds: " . implode(', ', $runnersMore15s) . "<br>";
    }

    public function getRunnersWithNameEndingE() {
        $runnersWithE = [];

        foreach ($this->runners as $runner) {
            $name = $runner->getName();
            if (substr($name, -1) === 'e') { // Fixed the condition here
                $runnersWithE[] = $name;
            }
        }

        return "Runners with names ending in 'e': " . implode(', ', $runnersWithE) . "<br>";
    }
}

?>
