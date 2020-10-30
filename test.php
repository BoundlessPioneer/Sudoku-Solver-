<?php
echo('Sudoku Solver V0.1');

// variable declaration
$puzzleInput = array();
$currentPuzzle = array();
$puzzleSolved = array();
$puzzlePossibilities = array();


//input of puzzle

$puzzleInput = array(
            array(0,0,1,0,7,0,0,8,9),
            array(4,0,0,8,0,0,7,5,2),
            array(2,8,0,0,0,0,0,1,0),
            array(0,4,0,0,5,0,2,3,8),
            array(0,0,0,2,8,0,0,9,0),
            array(0,0,0,0,0,0,0,4,0),
            array(0,9,0,0,0,0,0,7,0),
            array(0,0,0,0,0,3,0,2,4),
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


function calc_possible_simple($currentPuzzle, $puzzlePossibilities, $puzzleSolved){
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
                    
                    if ($x < 3){
    
                        $gridx = 0;
                    
                    }       elseif ($x > 2 && $x < 6){
                    
                                $gridx = 3;
                        
                                    } elseif ($x > 5){
                    
                                        $gridx = 6;
                    
                                    }
                    
                    if ($y < 3){
    
                        $gridy = 0;
                                    
                    }       elseif ($y > 2 && $y < 6){
                                    
                                $gridy = 3;
                                        
                                    } elseif ($y > 5){
                                    
                                        $gridy = 6;
                                    
                                    }
                   

                    
                    
                    
                    
                    $gridTrackerX = 0;
                    $gridTrackerY = 0;
                    $sx = $gridx;
                    $sy = $gridy;


                    do {
                        
                        do {
                            foreach ($answers as $key => $value){
                                if($value == $currentPuzzle[$sy][$sx]){
                            
                                unset($answers[$key]);
                                }
                            }
                            $sx++;
                            $gridTrackerX++;
                        } while ($gridTrackerX < 3);
                
                        $sx = $gridx;
                        $gridTrackerX = 0;
                        $sy++;        
                        $gridTrackerY++;
                    } while ($gridTrackerY < 3);
                
                //echo("\n3x3 Grid Starting at " . $gridx . " X " . $gridy . "for cell " . $x . " X " . $y);
                //echo("\nAfter Grid search Remaing answers for cell " . $x . " X " . $y . " are ");
                //print_r($answers);    
                //check column for numbers already solved
                    
                    $sy = 0;
                    $sx = 0;

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
            
            
                 
            } elseif ($value == true){
                $answers = "Solved";
            }

            $puzzlePossibilities[$y][$x] = $answers;
            $answers = array(1,2,3,4,5,6,7,8,9);    
        
        }
     
    }
    //print_r($answers);
    //$results = array($currentPuzzle);
    return $puzzlePossibilities;
    //print_r($puzzlePossibilities);

}


function calc_possible_doubles($currentPuzzle, $puzzlePossibilities,  $puzzleSolved){
    $columnCount = 0;
    $rowCount = 0;
    $doubleLocation = array();
    $doubleCount = 0;
    $y3 = 0;

    foreach ($puzzlePossibilities as $y => $row){
    
        foreach ($puzzlePossibilities[$y] as $x => $value){
            
            

            if (is_array($value) == true ){

                
                
                if (count($value) == 2){
                    
                    //echo("\nDouble Found!");

                    foreach ($puzzlePossibilities as $y2 => $row2){

                        foreach ($puzzlePossibilities[$y2] as $x2 => $value2){

                                if (is_array($value2) == true){

                                    //echo("\nValue2 is an Array!");


                                    if ($value == $value2){

                                        if ($y2 == $y && $x2 == $x){

                                           // echo("\nSame Cell skiping");
                                        } else{

                                            $doubleLocation[$y3]['cell_1'] = array("y" => $y , "x" => $x);
                                            $doubleLocation[$y3]['cell_2'] = array("y" => $y2 , "x" => $x2);
                                            $doubleLocation[$y3]['values'] = $value;
                                                
                                                    
                                             



                                            
                                            //echo("\nArray Double Match");
                                            $y3++;
                                            //print_r($value);
                                            //echo("\n");
                                            //print_r($value2);
                                        }
                                    }
                                }

                        }
                    }


                }
            }
     
        }
    


    }
    //print_r($puzzlePossibilities);
    //echo("\nDouble Count is: " . $doubleCount);
    return $doubleLocation;
}


function double_array_check ($doubleLocation){
    foreach ($doubleLocation as $match => $key){

        //echo("\nMatch: " . $match . " and data: ");
        //print_r($key);

        if ($doubleLocation[$match]['cell_1']['y'] != $doubleLocation[$match]['cell_2']['y'] && $doubleLocation[$match]['cell_1']['x'] != $doubleLocation[$match]['cell_2']['x']){

            //echo("\n Match " . $match . " cells are not in the same column or row\n\n");
            
            $y = $doubleLocation[$match]['cell_1']['y'];
            $x = $doubleLocation[$match]['cell_1']['x'];
            
            $y2 = $doubleLocation[$match]['cell_2']['y'];
            $x2 = $doubleLocation[$match]['cell_2']['x'];

            $gridStart1 = determine_grid($y, $x);
            $gridStart2 = determine_grid($y2, $x2);

            if ($grdStart1 != $gridStart2){

                //echo("\n Match " . $match . " cells are not in the Same 3x3 Grid\n\n");

                unset($doubleLocation[$match]);
            }
    

            
        }
    }

    //remove duplicate entries in array
    foreach ($doubleLocation as $match => $key){
        
        foreach ($doubleLocation as $match2 => $key2){
            
            if ($doubleLocation[$match]['cell_1']['y'] == $doubleLocation[$match2]['cell_2']['y'] && $doubleLocation[$match]['cell_1']['x'] == $doubleLocation[$match2]['cell_2']['x']){
                
                //echo("\n Duplicate found.");
                unset($doubleLocation[$match]);
            }

        }


        
        
        
        //if ($doubleLocation[$match]['cell_1']['y'] == $doubleLocation[$match2]['cell_2']['y'] && $doubleLocation[$match]['cell_1']['x'] == $doubleLocation[$match2]['cell_2']['x']){
            
            //echo("\n Duplicate found.");

        //   unset($doubleLocation[$match]);
        //}
    }
    
//print_r($doubleLocation);
}

//check which ones do not conflict

function determine_grid($y, $x){
   
    if ($x < 3){
    
        $gridx = 0;
    
    }       elseif ($x > 2 && $x < 6){
    
                $gridx = 3;
        
                    } elseif ($x > 5){
    
                        $gridx = 6;
    
                    }
    
    if ($y < 3){

        $gridy = 0;
                    
    }       elseif ($y > 2 && $y < 6){
                    
                $gridy = 3;
                        
                    } elseif ($y > 5){
                    
                        $gridy = 6;
                    
                    }
 return $gridStart = Array('y'=> $y, 'X' => $x);
}


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

$puzzlePossibilities = calc_possible_simple( $currentPuzzle, $puzzlePossibilities,  $puzzleSolved);

$doubleLocation = calc_possible_doubles($currentPuzzle, $puzzlePossibilities, $puzzleSolved);


double_array_check($doubleLocation);

//print_r($puzzlePossibilities);
//print_puzzle($currentPuzzle);

//print_r($puzzlePossibilities);
print_puzzle($puzzleSolved);
//print_r($doubleLocation);

?>