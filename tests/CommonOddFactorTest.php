<?php
require_once(__DIR__.'/../src/CommonOddFactor.php');

class CommonOddFactorTest extends PHPUnit_Framework_TestCase
{
    public function setUp(){ }
    public function tearDown(){ }

    /**
     * test largest common factor
     */
    public function testLargestCommonFactor1()
    {
      $obj = new CommonOddFactor( 399, 63 );
      $obj->getLargestCommonFactor();
      $this->assertTrue( $obj->largestFactor == 21 );
    }
  
    /**
     * test largest common factor
     */
    public function testLargestCommonFactor2()
    {
        $obj = new CommonOddFactor( 3, 5 );
        $obj->getLargestCommonFactor();
        $this->assertTrue( $obj->largestFactor == 1);
    }
  
    /**
     * test common factories
     */
    public function testfactories1()
    {
        $obj = new CommonOddFactor( 399, 63);
        $obj->getAllCommonFactors();
        $this->assertEmpty( 
            array_diff( $obj->factors, array(1, 3, 7, 21))
        );
    }
  
    /**
     * test common factories
     */
    public function testfactories2()
    {
        $obj = new CommonOddFactor( 133, 21);
        $obj->getAllCommonFactors();
        $this->assertEmpty(
            array_diff( $obj->factors, array(1, 7))
        );
    }
}
