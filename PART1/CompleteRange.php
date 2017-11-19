<?php 

class CompleteRange
{
    
    public function build($range)
    {
        if (!count($range))
            return [];

        return range($range[0], $range[(count($range) - 1)]); 
        
    }

}

$completeRange = new CompleteRange();

echo "[1, 2, 4, 5]<br>";
var_dump("<br>", $completeRange->build([1, 2, 4, 5])); 
echo "<br>========<br>";
echo "[2, 4, 9]<br>";
var_dump("<br>", $completeRange->build([2, 4, 9])); 
echo "<br>========<br>";
echo "[55, 58, 60]<br>";
var_dump("<br>", $completeRange->build([55, 58, 60])); 

?>