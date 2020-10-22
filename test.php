<?php
echo('Sudoku Solver V0.1');

// variable declaration
$puzzleInput = array();
$currentPuzzle = array();
$puzzleSolved = array();
$puzzlePossibilities = array();


//input of puzzle

$puzzleInput = array(
            array(0,0,1,0,7,0,0,0,9),
            array(4,0,0,8,0,0,7,0,2),
            array(2,8,0,0,0,0,0,1,0),
            array(0,4,0,0,5,0,2,0,8),
            array(0,0,0,2,8,0,0,9,0),
            array(0,0,0,0,0,0,0,0,0),
            array(0,9,0,0,0,0,0,7,0),
            array(0,0,0,0,0,3,0,0,4),
            array(7,0,0,0,2,0,1,6,0)
);

$puzzleSolved = array(
            array(false, false, false, false, false, false, false, false, false, ),
            array(false, false, false, false, false, false, false, false, false, ),
            array(false, false, false, false, false, false, false, false, false, ),
            array(false, false, false, false, false, false, false, false, false, ),
            array(false, false, false, false, false, false, false, false, false, ),
            array(false, false, false, false, false, false, false, false, false, ),
            array(false, false, false, false, false, false, false, false, false, ),
            array(false, false, false, false, false, false, false, false, false, ),
            array(false, false, false, false, false, false, false, false, false, ),

);

$puzzlePossibilities = array(
            array(0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0),
);


$currentPuzzle = $puzzleInput;

//convert input array into x and y multideminsonal array
function convert_input($input) {
 print_r($input);
}



//detect which cells are solved
function solve_check($input, $puzzleSolved){
    $x = 0;
    $y = 0;

    foreach ($input as $y => $row){
        
        foreach ($input[$y] as $x => $value){
            
            if ($input[$y][$x] > 0){
                $puzzleSolved[$y][$x] = true;
                //echo("cell " . $x . "x" . $y . " has a value\n");
            };
        }    
    
    }
   
return $puzzleSolved;
}


//calculate possible numbers for each cell
function calc_possible($currentPuzzle, $puzzlePossibilities, $puzzleSolved){
    $x = 0;
    $y = 0;
    $sx = 0;
    $sy = 0;
    $answers = array(1,2,3,4,5,6,7,8,9);
    $gridx = 0;
    $gridy = 0;
    
    foreach ($puzzleSolved as $y => $row){
        
        foreach ($puzzleSolved[$y] as $x => $value){
            
                if ($value == false){
                    
                    //check 3x3 grid for numbers already solved
                    
                    switch ($x) {
                        
                        case ($x <= 2);
                        $gridx = 0;
                        break;

                        case ($x >= 3 and $x <= 5);
                        $gridx = 3;
                        break;

                        case ($x >= 6);
                        $gridx = 6;
                        break;

                    }

                    switch ($y) {
                        
                        case ($y <= 2);
                        $gridy = 0;
                        break;

                        case ($y >= 3 and $y<= 5);
                        $gridy = 3;
                        break;

                        case ($x >= 6);
                        $gridy = 6;
                        break;

                    }
                    $gridTracker = 0;

                    do {
                        
                         if( == $currentPuzzle[$y][$sx]){
                                
                                unset($answers[$key]);
                            }
                        

                    $gridTracker++;
                    } while ($gridTracker <= 2);

                    //check column for numbers already solved
                    $sy = 0;

                    do {

                        foreach ($answers as $key => $value){
                            if ($value == $currentPuzzle[$sy][$x]){
                                
                                unset($answers[$key]);
                            }
                        }
                    $sy++;
                    } while ($sy <= 8);
                    
                    //check row for numbers already solved
                    $sx = 0;
                    
                    do {
                        
                        foreach ($answers as $key => $value){
                            if ($value == $currentPuzzle[$y][$sx]){
                                
                                unset($answers[$key]);
                            }
                        }

                    $sx++;
                    } while ($sx <= 8);

                    //check column for numbers already solved
                    $sy = 0;

                    do {

                        foreach ($answers as $key => $value){
                            if ($value == $currentPuzzle[$sy][$x]){
                                
                                unset($answers[$key]);
                            }
                        }
                    $sy++;
                    } while ($sy <= 8);
                    

                    
                    $








                
        
            $puzzlePossibilities[$y][$x] = $answers;
            $answers = array(1,2,3,4,5,6,7,8,9);    
            }
        }    
    

    }
   

    //print_r($answers);
    //$results = array($currentPuzzle);
    //return $results;
    print_r($puzzlePossibilities);
}



//check which ones do not conflict



function print_puzzle($p) {

    echo("\n");
    $cellValue = 0;
    $x = 0;
    $y = 0;

    foreach ($p as $y => $row){
        
        echo("\n");

        foreach ($p[$y] as $x => $value){
            
            if ($value == false){
                echo('|' . 0 . '|');
                
                } else {
                    echo('|' . $p[$y][$x] . '|');
                }
        }    
    
    }

    echo("\n\n");
}


// call Functions

$puzzleSolved = solve_check($currentPuzzle, $puzzleSolved);
//print_r($puzzleSolved);

calc_possible($currentPuzzle, $puzzlePossibilities, $puzzleSolved);

print_puzzle($currentPuzzle);

//print_r($puzzlePossibilities);
//print_puzzle($puzzleSolved);


?>