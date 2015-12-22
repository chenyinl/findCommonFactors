<?php
/**
 * This class finds all the factors for two odd numbers
 * It first find the largest commond factors, then 
 * find all the factors from that number.
 * 
 * author for Method getAllFactors was Jon
 */
class CommonOddFactor
{
    /**
     * The largest factors between the two give number
     */
    public $largestFactor;
    
    /**
     * Array of commond factors
     */
    public $factors;
    
    /**
     * Number 1 given
     */
    public $num1;
    
    /**
     * Number 2 given
     */
    public $num2;
    
    /**
     * Constructor
     */
    function __construct( $n, $m )
    {
        $this->num1 = $n;
        $this->num2 = $m;
    }
  
    /**
     * The main function
     */
    public function getAllCommonFactors()
    {
        $this->getLargestCommonFactor();
        $this->getALlFactors();
        return $this->factors;
    }
    
    /**
     * Retrieve all the factors from a number
     * 
     * The loop increment by 2, since we know the give number
     * is an odd number
     * 
     * This function was from http://stackoverflow.com/questions/
     * 15051592/how-to-find-prime-factors-in-a-range-in-php
     */
    public function getAllFactors()
    {
       //Record the base
        $num = $this->largestFactor;
        $base = intval($num/2);
        $pf = array(1); // factories array
        $pn = null;
        $original_num= (int)$num;
        
        // i start from 3, and increment by 2
        for($i=3;$i <= $base;$i+=2) {
            $pn[] = $i;
            while($num % $i == 0)
            {
                $pf[] = $i;
                $num = $num/$i;
            }
        }

        if( !in_array( $original_num, $pf)){
            $pf[]=$original_num;
        }
        
        $this->factors = $pf;
    }
    
    /**
     * use PHP GMP function to get the largest common factor
     */
    public function getLargestCommonFactor(  )
    {
        $gcd = gmp_gcd( $this->num1, $this->num2);
        $f = gmp_strval( $gcd );
        $this->largestFactor = (int)$f;
    }
}
