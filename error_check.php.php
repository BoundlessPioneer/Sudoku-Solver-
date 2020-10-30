<?
$a = array(1,2);
$b = array(1,3);

if ($a == $b){
    echo ("\nA and B are the same");
} else {
    echo ("\nA and B are different");
}

//if ($x < 3){
//    $gridx = 0;
//}  else if ($x < 2 && $x )
/*function calc_possible($currentPuzzle, $puzzlePossibilities, $puzzleSolved){
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





















                
            }
            
            $puzzlePossibilities[$y][$x] = $answers;
            $answers = array(1,2,3,4,5,6,7,8,9);    
        
        }
    }
    //print_r($answers);
    //$results = array($currentPuzzle);
    //return $results;
    print_r($puzzlePossibilities);

}*/

?>