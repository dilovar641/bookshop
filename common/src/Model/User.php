<?php
include_once __DIR__ ."/../Service/DBconnector.php";
include_once __DIR__ ."/../Service/UserService.php";

	class User
	{
		const ROLE_USER_VALUE = 'ROLE_USER';
		
		private $id;
		private $name;
		private $phone;
		private $email;
		private $password;
		private $roles;
		
		private $conn;
		public function __construct(
		$id=null,
		$name=null,
		$phone=null,
		$email=null,
		$password=null,
		$roles=[]
	
	)
	{
		$this->conn = DBconnector::getInstance()->connect();
		$this->setid($id);
		$this->setname($name);
		$this->setphone($phone);
		$this->setemail($email);
		$this->setpassword($password);
		$this->setroles($roles);
		
		
	}
		
		
		
		
		public function getid()
		{
			return $this->id;
		}
		public function setid($id)
		{
			$this->id = $id;
		}
		
		public function getname()
		{
			return $this->name;
		}
		public function setname($name)
		{
			$this->name = $name;
		}
		public function getphone()
		{
			return $this->phone;
		}
		public function setphone($phone)
		{
			$this->phone = $phone;
		}
		
		public function getemail()
		{
			return $this->email;
		}
		public function setemail($email)
		{
			$this->email = $email;
		}
		public function getpassword()
		{
			return $this->password;
		}
		public function setpassword($password)
		{
			$this->password = UserService::encodepassword($password);
		}
		
		public function getroles()
		{
			return $this->roles;
		}
		public function setroles($roles)
		{
			$this->roles = $roles;
		}
		
		
		 public function save()
	 {
	if($this->id>0){
		$query = "UPDATE  `user` set 
		`name`='" . $this->getname() ."',
		`phone`='" .$this->getphone() ."'
		`password`='" .$this->getpassword() ."'
		`roles`='" . json_encode ($this->getroles()) ."'
		`email`='" .$this->getemail() ."'
		where id=" . $this->id  . " limit 1 ";
	}else{
		$query = "INSERT INTO `user` (`id`,`name`,`phone`,`email`,`password`,`roles`) VALUES (null,
		'" . $this->getname() ."',
		'" . $this->getphone() ."',
		'" . $this->getemail() ."',
		'" . $this->getpassword() ."',
		'" . json_encode($this->getroles() )."')";
		
		
	}
	$result = mysqli_query($this->conn,$query);
	if(!$result){
		throw new Exception(mysqli_error($this->conn),400);
	}
	}
		public function getbyid($id)
	{
	$result = mysqli_query($this->conn,"select * from `user` where  id = ". $id . " limit 1 ");
	$onep = mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	 return  reset ($onep);
	}
	
	public function getbyemail($email)
	{
	$result = mysqli_query($this->conn,"select * from `user` where  email = '". $email . "' limit 1 ");
	
	if(!$result){
		throw new Exception("user not found",404);
	}
	$onep = mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	 return  reset ($onep);
	}
	
	public function isaccess(array $roles,$controller,$action)
	
	{
		$permission = SecurityService::getpermissionnamebycontrollerandaction($controller,$action);
		$result = mysqli_query($this->conn,"select * from `rbac_access`
		where  role in  ('". implode("','",$roles)  . "') and permission = '$permission' ");
	   
	if(!$result){
		throw new Exception("permission error",400);
	}
	$accesses = mysqli_fetch_all($result,MYSQLI_ASSOC);
	
	foreach ($accesses as $access){
		if($access) return true;
	}
	throw new Exception("  not  permission ",403);
	
	}
	}
?>