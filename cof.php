<?php
/**
 * check if GMP extension is installed
 */
if( !function_exists ( "gmp_gcd" )){
    echo "GMP function missing! Please enable php gmp extension first!\n";
    exit();
}

/**
 * include the library
 */
require_once('src/CommonOddFactor.php');

/**
 * Start the script
 */
echo "Please enter two odd numbers to find the commond factories, separated by space. For example 12345 8873.\n";

/**
 * Get the command line input
 */
$handle = fopen ("php://stdin","r");
$line = trim(fgets($handle));
$numbers = explode( " ", $line);

/**
 * Check if all the numbers are odd 
 */
checkIsOdd( $numbers );

/**
 * initial main object and call the method
 */
$obj = new CommonOddFactor(  $numbers[0], $numbers[1] );
$ary = $obj->getAllCommonFactors();

/**
 * Echo out the result
 */
echo "The common factories are: \n";
foreach ($ary as $n){
    echo $n."\n";
}


/**
 * utility functions: check both numbers
 */
function checkIsOdd( $ary ){
    foreach ( $ary as $n ){
        if( !isOdd( $n )){
            echo "One of the number you entered is not an valid odd number!\n";
            echo "Please restart and try again.\n\n";
            exit();
        }
    }
}

/**
 * check if the number is an odd number
 */
function isOdd( $n )
{
    if ($n & 1 ){
        return true;
    }else{
        return false;
    }
}
