<?php 

class ChangeString
{

    private $letters = array(
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "ñ", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
    );
    
    public function build($text)
    {        
        $newText = '';
        for ($i=0; $i < strlen($text); $i++) { 
            $newText .= $this->obtainLetter(substr($text, $i, 1)); 
        }  
        return $newText;
    }

    private function obtainLetter($letter)
    {
        if (!in_array(strtolower($letter), $this->letters)) 
            return $letter;

        $index = array_search(strtolower($letter), $this->letters);
        $newIndex = ($index == (count($this->letters) - 1)) ? 0: ($index + 1);

        $newLetter = ($letter == strtoupper($letter)) ? strtoupper($this->letters[$newIndex]): $this->letters[$newIndex];

        return $newLetter;
    }

}

$changeString = new ChangeString();

echo "123 abcd *3  <=====> " . $changeString->build("123 abcd *3");
echo "<br>";
echo "**Casa 52  <=====> " . $changeString->build("**Casa 52");
echo "<br>";
echo "**Casa 52Z  <=====> " . $changeString->build("**Casa 52Z");
?>