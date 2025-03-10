<?php 
    namespace App\Tests\Entity;
    use App\Entity\Personne;
    use PHPUnit\Framework\TestCase;
    class PersonneTest extends TestCase{
        public function testCat(){
            $personne=new Personne ('number1','user',16);
            $this->assertSame("mineur",$personne ->Categorie());
        }
        public function testCatt(){
            $personne=new Personne ('number2','user2',22);
            $this->assertSame("majeur",$personne ->Categorie());
        }

        public function testInvalid(){
            $p = new Personne("number3","user3",-5);
            $this -> expectException("Exception");
            $p -> Categorie();
        }
    }
?>