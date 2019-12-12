In Magento 2, You can generate a random number or random string using core Magento\Framework\Math\Random class.

Using Random.php class you can generate a random string and random number with Magento Best Coding Practice and you don’t need to depend on PHP core function.

I have created a Block PHP file to add function( ) for a demo,

<?php

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Math\Random;

class GenerateDemo extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        Context $context,
        Random $mathRandom,
        array $data = []
    ) {
        $this->mathRandom = $mathRandom;
        parent::__construct(
            $context,
            $data
        );
    }
 
    // Return a random number in the specified range
    public function getRandomNumber($min = 0, $max = null)
    {
        return $this->mathRandom->getRandomNumber($min, $max);
    }
 
    // Generate Random string
    public function getRandomString($length,  $chars = null)
    {
        return $this->mathRandom->getRandomString($length, $chars);
    }
}
?>

To generate random string Magento native uses a character,
const CHARS_LOWERS = ‘abcdefghijklmnopqrstuvwxyz’;
const CHARS_UPPERS = ‘ABCDEFGHIJKLMNOPQRSTUVWXYZ’;
const CHARS_DIGITS = ‘0123456789’;

To Get Random digit number you need to pass range value in a function,

echo $this->getRandomNumber(1,7); // generate random digit between 1 to 7
echo $this->getRandomString(5); // generate 5 character long string from (A-Za-z0-9)