<?php
interface BasePiece
{
    public function getPrice();
    public function getDescription();
}
 
 

class PhysicalChange implements BasePiece
{
    public function getPrice()
    {
        return 1000;
    }
    public function getDescription()
    {
        return "Physical Change";
    }
}
 

class CustomDesign implements BasePiece
{
    protected $furn;
    public function __construct(BasePiece $furn)
    {
        $this->furn = $furn;
    }
    public function getPrice()
    {
        return 2000 + $this->furn->getPrice();
    }
    public function getDescription()
    {
        return $this->furn->getDescription() . ",\n    and a completely custom design, designed by an in-house designer";
    }
}
 
class Colors implements BasePiece
{
    protected $furn;
    public function __construct(BasePiece $furn)
    {
        $this->furn = $furn;
    }
    public function getPrice()
    {
        return 750 + $this->furn->getPrice();
    }
    public function getDescription()
    {
        return $this->furn->getDescription() . ",\n   Colors";
    }
}
 
class SpecialPattern implements BasePiece
{
    protected $furn;
    public function __construct(BasePiece $furn)
    {
        $this->furn = $furn;
    }
    public function getPrice()
    {
        return 150 + $this->furn->getPrice();
    }
    public function getDescription()
    {
        return $this->furn->getDescription() . ",\n   special pattern";
    }
}
 
$Base_Piece = new BasePiece();
echo "price:". $Base_Piece -> getPrice() 

 ?>