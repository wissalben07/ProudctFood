<?php 
 namespace App\Tests\Entity;

 use App\Entity\Product;
 use PHPUnit\Framework\TestCase;
 
 class ProductTest extends TestCase
 {
     public function testDefault()
     {
         $product = new Product('pomme', 'food', 1);
         $this->assertSame(0.055, $product->computeTVA());
     }
 
     public function testFr()
     {
         $product = new Product('banana', 'fruit', 1);
         $this->assertSame(0.196, $product->computeTVA());
     }
 
     public function testInvalid()
     {
         $this->expectException(\Exception::class);  // Expecting an Exception
         $this->expectExceptionMessage("Price cannot be negative.");  // Optionally, check the message
 
         // Create product with invalid (negative) price
         $p = new Product('pomme', 'fruit', -5);  // Negative price
 
         // This should throw an exception, so the following line won't be executed
         $p->computeTVA();
     }
 
     /**
      * @dataProvider pricesForFood
      */
     public function testMultiPrices($prix, $TVA)
     {
         $p = new Product("produit", "food", $prix);
         $this->assertSame($TVA, $p->computeTVA());
     }
 
     public function pricesForFood()
     {
         return [
             [0, 0.0],
             [1.0, 0.055],
             [10.0, 0.55],
             [20.0, 1.1]
         ];
     }
 }
 
?>