<?php 

class ClearPar
{
    
    private $textSearch = "()";

    public function build($text)
    {
        $count = substr_count($text, $this->textSearch);
        return str_repeat($this->textSearch, $count);
    }

}

$clearPar = new ClearPar();

echo "()())()  <=====> " . $clearPar->build("()())()");
echo "<br>";
echo "()(()  <=====> " . $clearPar->build("()(()");
echo "<br>";
echo ")(  <=====> " . $clearPar->build(")(");
echo "<br>";
echo "((()  <=====> " . $clearPar->build("((()");
?>