<?php
     class User{
     	private $json_file;
     	private $stored_data;
     	private $number_of_records;
     	private $ids = [];
     	private $usernames = [];

     	public function __construct($file_path){
         $this->json_file = $file_path;
         $this->stored_data = json_decode(file_get_contents($this->json_file),true);
         $this->number_of_records = count($this->stored_data);

         if($this->number_of_records !=0){
          foreach ($this->stored_data as $user) {
          	array_push($this->ids, $user['Id']);
          	array_push($this->usernames, $user['User_Name']);
          }
         }
     	}
     	private function setUserId($user){
     		if($this->number_of_records ==0){
     			$user['Id'] = 1;
     		}
     		else{
     			$user['Id'] = max($this->ids) + 1;
     		}
     		return $user;
     	}

     	private function storeData() {
     		file_put_contents($this->json_file, json_encode($this->stored_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);
     	}

        public function insertNewUser($new_user)
     	{
     	 $user_with_id_field = $this->setUserId($new_user)	;
     	 array_push($this->stored_data, $user_with_id_field);
     	 if($this->number_of_records==0){
     	 	$this->storeData();
     	 }
     	 else{
     	 	if(!in_array($new_user['User_Name'], $this->usernames)){
     	 		$this->storeData();
     	 	}
     	 }
     	}

     	public function updateUser($user_name, $field, $value){
     		foreach ($this->stored_data as $key => $stored_user) {
     			if($stored_user['User_Name']==$user_name){
     				$this->stored_data[$key][$field] = $value;
     			}
     		}
     		$this->storeData();
        
     	}
         
        public function deleteUser($user_id){}

        public function deleteAllUser(){}

        public function getUsers(){}


     }