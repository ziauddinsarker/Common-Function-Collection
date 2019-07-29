<?php
/**
 * Compares 2 email addresses. If 1, just keep going.
 */
class mailCheck{
	public $emailaddress = "ziauddin@gmail.com";
	
	public function __construct()
	{
		
	}
	 function sameEmailAddress()
	{
		if (count($this->filteredInputArray) === 2) {  //If there are two.
			if ($this->identical($this->filteredInputArray['email1'], $this->filteredInputArray['email2'])) {
				return true;
			}

			$this->testResultsArray['email1'] = false;
			$this->testResultsArray['email2'] = false;
			$this->errorMessagesArray['email1'] = 'Does not match e-mail below.';
			$this->errorMessagesArray['email2'] = 'Does not match e-mail above.';
			return false;
		}

		if (count($this->filteredInputArray) === 1) {  //If there is only 1.
			return true;
		}

		return false;
	}

	/**
	 * Finds problems with e-mail as a whole.
	 * There is a regular expression you can do this with.
	 */
	 function consecutivePeriodTest ($emailAddress, &$errorMessage)
	{
		if (!preg_match('/\A(?!..)+?\z/', $emailAddress)) {
			return true;
		}

		$errorMessage = 'Consecutive periods are illegal!';
		return false;
	}
	/**
	 * Given an array of unique domains, check DNS MX records.
	 */
	 function mxDNSPing(array $uniqueDomains)
	{   
		$badDomains = [];

		foreach ($uniqueDomains as $key => $domain) {
			if (!checkdnsrr($domain, 'MX')) {
				$this->testResultsArray[$key] = false;
				$this->errorMessagesArray[$key] = 'No DNS MX records found.';
				$badDomains[$key] = $domain;
			}
		}

		return $badDomains;
	}

	/**
	 * Finds problems with local or domain parts.
	 * Should break up into two methods, though.
	 */
	 function emailPartProblemFinder($string, &$errorMessage)
	{
		$emailParts = $this->string->getEmailAddressParts($string); //explode() on `@`

		if (count($emailParts) !== 2) {
			$errorMessage = 'Invalid e-mail address!';
		} else {
			list($localPart, $domain) = $emailParts;

			$localLength  = mb_strlen($localPart);
			$domainLength = mb_strlen($domain);

			if ($localLength === 0) {
				$errorMessage = 'Missing local part of address.';
			} elseif ($localLength > 64) {
				$errorMessage = 'Only 64 characters are alloed before the @ symbol ('.$localLength.' given)';
			} elseif (mb_strrpos($string, '.') === ($localLength - 1)) {
				$errorMessage = 'The local part of an email address cannot end with a period (.).';
			} elseif (mb_strpos($string, '..') >= 0) {
				$errorMessage = 'The local part of an email address cannot contain consecutive periods (..).';
			} elseif ($domainLength < 4) { //x.yy, is my minimum domain format.
				$errorMessage = 'Domain part < 4 characters. ('.$domainLength.' given)';
			} elseif ($domainLength > 253) {
				$errorMessage = 'Domain part exceeds 253 characters. ('.$domainLength.' given)';
			}
		}

		return;
	}

	/**
	 * Finds problems with e-mail as a whole.
	 */
	 function emailAddressProblemFinder($string, $max, &$errorMessage)
	{
		$length = mb_strlen($string, 'UTF-8');
		$atSymbolCount = mb_substr_count($string, '@', 'UTF-8');

		if ($length === 0) {
			return false;    //The reason was already assigned to the error message inside of $this->validateInput()
		} elseif ($length > $max) {
			$errorMessage = 'Exceeds max length (' . $max . ' characters)';
		} elseif ((mb_strpos($string, '@') === 0)) {
			$errorMessage = 'Cannot start with a @';
		} elseif ((mb_strrpos($string, '@') === ($length - 1))) {
			$errorMessage = 'Cannot end with a @';
		} elseif ($atSymbolCount > 1) {
			$errorMessage = '@ appears '.$atSymbolCount.' times.';
		} elseif ((mb_strpos($string, '@') === false)) {
			$errorMessage = 'The @ symbol is missing.';
		} elseif (mb_strpos($string, '.') === 0) {
			$errorMessage = 'The local part of an email address cannot start with a period (.).';
		} else {
			$this->emailPartProblemFinder($string, $errorMessage);
		}

		return;
	}
	
	
	emailPartProblemFinder($emailaddress);
}