<?php 
    namespace App\Tests\Entity;
    use App\Entity\CompteBancaire;
    use PHPUnit\Framework\TestCase;
    class CompteBancaireTest extends TestCase{
        public function testInvalid(){
            $p = new CompteBancaire("user1",50);
            $this -> expectException("Exception");
            $p -> retirer(100);
        }

        public function testRetirer(){
            $solde = new CompteBancaire("user1",50);
            $this -> assertSame(0.0,$solde -> retirer(50));
        }
    }
?>