<?php
require 'vendor/autoload.php';  // Include Composer's autoloader
use PhpOffice\PhpSpreadsheet\IOFactory;
// function readExcelFile($filePath) {
//     // Load the Excel file
//     $spreadsheet = IOFactory::load($filePath);

//     // Get the first sheet
//     $sheet = $spreadsheet->getActiveSheet();

//     // Loop through each row and display the contents
//     echo "<table border='1'>";
//     foreach ($sheet->getRowIterator() as $row) {
//         echo "if";

//         // Get each cell in the row
//         $cellIterator = $row->getCellIterator();
//         $cellIterator->setIterateOnlyExistingCells(false); // Include all cells

//         foreach ($cellIterator as $cell) {
//             echo "return" . $cell->getFormattedValue() . "</td>";
//         }

//         echo "</tr>";
//     }
//     echo "</table>";


//     function (){
//         foreach ($sheet->getRowIterator() as $row) {
//             echo "tr";
    
//             // Get each cell in the row
//             $cellIterator = $row->getCellIterator();
//             $cellIterator->setIterateOnlyExistingCells(false); // Include all cells
    
//             foreach ($cellIterator as $cell) {
//                 echo "return" . $cell->getFormattedValue() . "</td>";
//             }
    
//             echo "</tr>";
//         }
//     }
    
// }

function readExcelFile($filePath, $villageIdToFind) {
    // Load the Excel file
    $spreadsheet = IOFactory::load($filePath);

    // Get the first sheet
    $sheet = $spreadsheet->getActiveSheet();

    // Loop through each row and check for the village ID
    foreach ($sheet->getRowIterator() as $row) {
        // Get each cell in the row
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false); // Include all cells

        $rowData = [];
        foreach ($cellIterator as $cell) {
            $rowData[] = $cell->getFormattedValue();
        }

        // Assuming the village ID is in the first column and village name in the second
        $villageId = $rowData[0]; // First column: Village ID
        $villageName = $rowData[1]; // Second column: Village Name
        
        // Check if the current row's village ID matches the ID you're looking for
        if ($villageId == $villageIdToFind) {
            return $villageName; // Return the village name if IDs match
        }
    }

    return null; // If no matching village is found
}

// // Example usage
// $villageIdToFind = 11010102; // Village ID you're looking for
// $filePath = 'path_to_your_excel_file.xlsx'; // Replace with the actual path to the Excel file

// $villageName = readExcelFile($filePath, $villageIdToFind);

// if ($villageName) {
//     echo "The village name for ID {$villageIdToFind} is: {$villageName}";
// } else {
//     echo "Village with ID {$villageIdToFind} not found!";
// }

// Example usage: specify the path to your Excel file
$filePath = 'villages_2022.xlsx';  // Replace with the correct file path
readExcelFile($filePath);
?>

