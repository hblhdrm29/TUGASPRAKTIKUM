<?php
class Book{

    private $code_book;
    private $qty;
    private $name;

    public function setQtyCode($code_book, $name, $qty){
        $this->code_book = $code_book;
        $this->name = $name;
        $this->qty = $qty;
    }

    public function getQtyCode(){
        if (preg_match("/^[A-Z]{2}[0-9]{2}$/", $this->code_book)){
            if($this->qty < 1){
                return "ERROR : Buku tidak tersedia/Stok habis";
            }
            else{
            return $this->code_book . "-" . $this->name . "-" . $this->qty .
            " <br><br> Buku dengan Judul '$this->name' dengan kode $this->code_book tersedia $this->qty di stok."; 
            }
        }
        
        else{
            return "ERROR : Kode Buku Salah";
        }
    }

    public function getQty(){
        return $this->qty;
    }

    public function getCode(){
        return $this->code_book;
    }
}

$book_one = new Book();
$book_one->setQtyCode('NS69', 'ShounenAbyss', 23);

echo $book_one->getQtyCode();