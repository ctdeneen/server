<?php
/**
 * @package    Core
 * @subpackage KMC
 */
require_once ( "kalturaAction.class.php" );

/**
 * @package    Core
 * @subpackage KMC
 */
class changeSettingAction extends kalturaAction
{
	public function execute() 
	{
		// Disable layout
		$this->setLayout(false);
		$this->success = false;

		$this->type = $this->getRequestParameter('type');
		if(!$this->type)
			KExternalErrors::dieError(KExternalErrors::MISSING_PARAMETER, 'type');

		$validTypes = array('name', 'email' ,'password');
		if(! in_array($this->type, $validTypes))
			KExternalErrors::dieError('INVALID_TYPE', 'Invalid setting type');

		$ks = $this->getP ( "kmcks" );
		if(!$ks)
			KExternalErrors::dieError(KExternalErrors::MISSING_PARAMETER, 'ks');

		// Get partner & user info from KS
		$ksObj = kSessionUtils::crackKs($ks);
		$partnerId = $ksObj->partner_id;
		$userId = $ksObj->user;

		// Load the current user
		$dbUser = kuserPeer::getKuserByPartnerAndUid($partnerId, $userId);
	
		if (!$dbUser)
			KExternalErrors::dieError('INVALID_USER_ID', $userId);;

		$this->email = $dbUser->getEmail();
		$this->fname = $dbUser->getFirstName();
		$this->lname = $dbUser->getLastName();	

		// Set page title
		switch($this->type) {
			case 'password': 
				$this->pageTitle = 'Change Password';
				break;

			case 'email':
				$this->pageTitle = 'Change Email Address';
				break;

			case 'name': 
				$this->pageTitle = 'Change Username'; 
				break;
		}

		// select which action to do
		if( isset($_POST['do']) ) {
			
			switch($_POST['do']) {
				
				case "password": 
					$this->changePassword();
					break;
					
				case "email":
					$this->changeEmail();
					break;
					
				case "name": 
					$this->changeName();
					break;
			}	
		}

		sfView::SUCCESS;
	}

	private function changePassword() 
	{
		// Checks if we have empty fields
		if( ! $this->checkRequiredFields(array('cur_password', 'new_password', 'retry_new_password')) ) {
			return ;
		}
		
		if( $_POST['new_password'] !== $_POST['retry_new_password'] ) {
			$this->setError('The passwords does not match!');
			return;
		}
		
		try {
			$this->updateLoginData($this->email, $_POST['cur_password'], null, $_POST['new_password'], null, null);
			$this->setSuccess();
						
		} catch( Exception $e ){
			$this->setError($e->getMessage());
		}
	}

	private function changeEmail()
	{
		// Checks if we have empty fields
		if( ! $this->checkRequiredFields(array('email', 'password')) ) {
			return ;
		}

		try {
			$this->updateLoginData($this->email, $_POST['password'], $_POST['email'], null, null, null);
			$this->setSuccess();
						
		} catch( Exception $e ){
			$this->setError($e->getMessage());
		}	
	}

	private function changeName()
	{
		// Checks if we have empty fields
		if( ! $this->checkRequiredFields(array('fname', 'lname', 'password')) ) {
			return ;
		}

		try {
			$this->updateLoginData($this->email, $_POST['password'], null, null, $_POST['fname'], $_POST['lname']);
			$this->setSuccess();

		} catch( Exception $e ){
			$this->setError($e->getMessage());
		}
	}

	private function setSuccess() 
	{
		$this->success = true;
		$this->parent_url = $this->clean($_GET['parent']);
		if($this->type == 'password') {
			$this->msg = "close";
		} else {
			$this->msg = "reload";			
		}
	}

	private function setError($error) 
	{
		$error = str_replace("&lt;", "<", $error);
		$error = str_replace("&gt;", ">", $error);
		$this->error = $error;
	}

	private function clean($str) 
	{ 
		$str = str_replace("javascript:", "", $str);
		$str = str_replace("eval", "", $str);
		$str = str_replace("document", "", $str);
		$str = htmlspecialchars($str);
		$str = addslashes($str);
		
		return $str;
	}

	private function checkRequiredFields($fields) 
	{
		foreach($fields as $field) {
			if( empty($_POST[$field]) ) {
				$this->setError('You must fill all the fields.');
				return false;
			}
		}
		return true;
	}

	private function updateLoginData( $oldLoginId , $password , $newLoginId = "" , $newPassword = "", $newFirstName = null, $newLastName = null)
	{
		if ($newEmail != "")
		{
			if(!kString::isEmailString($newEmail))
				throw new Exception ( KalturaErrors::INVALID_FIELD_VALUE, "newEmail" );
		}

		try {
			UserLoginDataPeer::updateLoginData ( $email , $password, $newEmail, $newPassword, $newFirstName, $newLastName);
		}
		catch (kUserException $e) {
			$code = $e->getCode();
			if ($code == kUserException::LOGIN_DATA_NOT_FOUND) {
				throw new Exception(KalturaErrors::LOGIN_DATA_NOT_FOUND);
			}
			else if ($code == kUserException::WRONG_PASSWORD) {
				if($password == $newPassword)
					throw new Exception(KalturaErrors::USER_WRONG_PASSWORD);
				else
					throw new Exception(KalturaErrors::WRONG_OLD_PASSWORD);
			}
			else if ($code == kUserException::PASSWORD_STRUCTURE_INVALID) {
				$c = new Criteria(); 
				$c->add(UserLoginDataPeer::LOGIN_EMAIL, $email ); 
				$loginData = UserLoginDataPeer::doSelectOne($c);
				$invalidPasswordStructureMessage = $loginData->getInvalidPasswordStructureMessage();
				throw new Exception(KalturaErrors::PASSWORD_STRUCTURE_INVALID,$invalidPasswordStructureMessage);
			}
			else if ($code == kUserException::PASSWORD_ALREADY_USED) {
				throw new Exception(KalturaErrors::PASSWORD_ALREADY_USED);
			}
			else if ($code == kUserException::INVALID_EMAIL) {
				throw new Exception(KalturaErrors::INVALID_FIELD_VALUE, 'email');
			}
			else if ($code == kUserException::LOGIN_ID_ALREADY_USED) {
				throw new Exception(KalturaErrors::LOGIN_ID_ALREADY_USED);
			}
			throw $e;			
		}		
	}
}