<?php
// include "Runner.php"; //already included with Competition.php
include "Competition.php";
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
    $runner1->addRace(40); // Commented this line to avoid exceeding 5 races

    $runner2->addRace(15);
    $runner2->addRace(18);
    $runner2->addRace(22);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
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