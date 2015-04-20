<?php
/**
 * Happy numbers challenge
 * @author Emilio Borraz Ortega <emilioborraz@gmail.com>
 */
class NumberChallenge {
	/**
	 * Calculates the Nth happy number
	 * @param  integer $n The n happy number
	 * @return integer Happy number
	 */	
	public function happyNthNumber( $n = 0){
		if($n == 0)
			return 0;
		$happyNumbersFound = 0;
		for ($i=1; $i < 999; $i++) { 
			$isHappy = $this->isHappy($i, 0);
			if($isHappy && ($happyNumbersFound == ($n-1)) )
				return $i;
			if($isHappy)
				$happyNumbersFound++;
		}
	}
	/**
	 * Calculates if a number is happy or not
	 * @param integer  $number
	 * @param integer $iterLimit Current iteration
	 * @return boolean True if the number is happy =D false if is not ='(
	 */
	public function isHappy($number, $iterLimit = 0){
		$number = (string)$number;
		$digits = str_split($number);
		array_walk($digits, function(&$element){
			$element = $element*$element;
		});

		/* is happy ? */
		if(array_sum($digits) === 1)
			return true;
		
		$iterLimit++;

		/* Recursive limit */
		if($iterLimit === 8)
			return false;

		return $this->isHappy(array_sum($digits) , $iterLimit);
	}
}

$number = new NumberChallenge();
$n = (!empty($argv[1])) ? $argv[1] : 140;
echo 'The ' . $n . '-th happy number is: ' . $number->happyNthNumber($n);


