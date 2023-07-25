<?php
require_once 'MachineACafe.php';
// Start the session (if not already started)
session_start();

// Include the MachineACafe class


// Function to create or retrieve the MachineACafe instance from the session
function getMachineInstance() {
    if (!isset($_SESSION['machine'])) {
        $_SESSION['machine'] = new MachineACafe("Senseo");
    }
    return $_SESSION['machine'];
}

// Get the action and optional value from the AJAX request
$action = $_GET['action'];
$value = isset($_GET['value']) ? $_GET['value'] : null;

// Perform the requested action and return the response
switch ($action) {
    case 'allumage':
        $machine = getMachineInstance();
        $machine->allumage($value === 'true');
        break;

    case 'mettreDosette':
        $machine = getMachineInstance();
        $machine->mettreUneDosette();
        break;

    case 'faireDuCafe':
        $machine = getMachineInstance();
        $machine->faireDuCafe();
        break;

    case 'eteindreMachine':
        $machine = getMachineInstance();
        $machine->eteindreMachine();
        break;

    case 'mettreDuSucre':
        $machine = getMachineInstance();
        $machine->mettreDuSucre((int) $value);
        break;

    case 'payerLeCafe':
        $machine = getMachineInstance();
        $machine->payerLeCafe((int) $value);
        break;

    default:
        // Invalid action
        echo 'Action not recognized.';
}

// Save the updated MachineACafe instance back to the session
$_SESSION['machine'] = $machine;
?>
