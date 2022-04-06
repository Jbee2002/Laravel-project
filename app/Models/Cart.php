<?php
namespace App\Models;

class Cart{
    public $items = [];
    public $totalQuantity = 0;
    public $totalAmount = 0;
    function __construct(){
        $this->items = session('cart') ? session('cart') : [];
        $this->totalQuantity = $this->getQuantity();
        $this->totalAmount = $this->getAmount();

    }

    private function getQuantity() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->quantity;
        }
        return $total;
    }

    private function getAmount() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->quantity*$item->price;
        }
        return $total;
    }

    public function add($pro, $quantity = 1){
        if (isset($this->items[$pro->id])) {
            $this->items[$pro->id]->quantity += $quantity;
        } else {
            $item = new \stdClass();
            $item->id = $pro->id;
            $item->name = $pro->name;
            $item->image = $pro->image;
            $item->price = $pro->sale_price > 0 ? $pro->sale_price : $pro->price;
            $item->quantity = $quantity;
            $this->items[$pro->id] = $item;
        }
        session(['cart' => $this->items]);

    }

    public function update($id,$quantity=1){
        if (isset($this->items[$id])) {
            $this->items[$id]->quantity = $quantity;
            session(['cart' => $this->items]);
        }

    }

    public function delete($id){
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);

    }


}
?>