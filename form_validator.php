<?php 

	class FormValidator
	{
		private $data;
		private $errors = [];
		private static $rightAnswers = ['yes', 'no'];
		private static $fields = ['username', 'email', 'url', 'message'];
		
		public function __construct($post_data){
			$this->data = $post_data;
		}
		
		public function validateForm(){	
			foreach(self::$fields as $field){
				if(!array_key_exists($field, $this->data)){
					trigger_error("$field is not present in data");
					return;
				}					
			}
		
			$this->validateUsername();
			$this->validateEmail();
			$this->validateUrl();
			$this->validateMessage();
			$this->validateQuestion();
			return $this->errors;
		}

		private function validateUsername(){
			
			$val = $this->test_input($this->data['username']);
			
			if(empty($val)){
				$this->addError('username', 'Username cannot be empty');
			} else {
				if(!preg_match('/^[A-Za-z ]{2,16}$/', $val)){
					$this->addError('username', 'Username must be 2-16 chars on Latin');
				}
			}			
		}

		private function validateEmail(){
			
			$val = $this->test_input($this->data['email']);
					
			if(empty($val)){
				$this->addError('email', 'Email cannot be empty');
			} else {
				if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
					$this->addError('email', 'Invalid email format');
				}
			}
		}
		
		private function validateUrl(){
			
			$val = $this->test_input($this->data['url']);
				
			if(!empty($val)){		
				if(!filter_var($val, FILTER_VALIDATE_URL)){
					$this->addError('url', 'Invalid URL');
				}
			}
		}
		
		private function validateMessage(){
			
			$val = $this->test_input($this->data['message']);
			
			if(empty($val)){
				$this->addError('message', 'Message cannot be empty');
			} else {
				if(strlen($val)>24){
					$this->addError('message', 'Message must be 2-24 chars');
				}
			}			
		}
		
		private function validateQuestion(){
			
		 	if(!array_key_exists('question', $this->data)){				
				$this->addError('question', 'You have to make a choise');
				return;			
			} else {	
				$answers = $this->data['question'];
				if(array_diff(self::$rightAnswers,$answers))
					$this->addError('question', 'Wrong answers (yes, no)');
			}
		}
		
		function test_input($data){
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		
		private function addError($key, $val){
			$this->errors[$key] = $val;
		}
	}

?>