<?php 
class main
{
	protected $name='our_family';
	protected $localhost='localhost';
	protected $root='root';
	protected $password='';
	protected $connect;
	public $db;
	
	 function __construct()
	 {
		 $this->connect();
	 }
	
	public function connect()
	{
		$this->db=new PDO("mysql:host=$this->localhost;dbname=$this->name",$this->root,$this->password);
	}
	//Function Start For Login Users
	public function addLoginUsers()
	{
		$cmb_id=$_POST['cmb_id'];
		$admin_level=$_POST['admin_level'];
		$user_id=$_POST['user_id'];
		$password=$_POST['password'];
		$access_level=$_POST['access_level'];
		$in_time=time();
		$get_count=$this->db->query("select * from `login_table` WHERE cmb_id='$cmb_id' ");
		$rowCount=$get_count->rowCount();
		if($rowCount>0)	
		{
			return "<h5 style='color:red;'>Admin Already Exist</h5>";	
		}	
		if($rowCount<1)	
		{
		$insert=$this->db->query("INSERT INTO `login_table`(`cmb_id`, `admin_level`, `user_id`, `password`, `access_level`, `in_time`, `up_tilme`) VALUES ('$cmb_id','$admin_level','$user_id','$password','$access_level','$in_time','$in_time')");
		if($insert)
		{		
		return "<h5 style='color:green;'>Successfully Added</h5>";	
		}
	   }
	}
	public function findAllAdminLoginUsers()
	{
		$sql=$this->db->query("select * from `login_table` ");
		return $fetch=$sql->fetchAll();
	}
	function adminLogin()
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		//$md5_password=md5($password);
		$login=$this->db->query("select * from `user_login` where `user_id`='$username' and `password`='$password' AND `status`='1' ");
		$rowcount=$login->rowCount($login); 
		$singlRc=$login->fetchAll();		    
		if($rowcount>0)
		{
		$fetch_singel=$singlRc[0];   		
		$_SESSION['sl_no'] = $fetch_singel['user_id'];
           echo "
            <script type=\"text/javascript\">           
		   window.location='dashboard';
            </script>
        ";		
		}
		else
		return "<span style='color:red;font-size: 16px;font-weight:600'>User ID Or Password is Incorrect</span>";		
	}
	
	function logout()
	{		
		session_destroy();
	}
	//Function End For Login Users

	//Function Start For Registered Parent Member

	public function addRegisteredParentUsers()
	{
		$lastRow=$this->lastRowOfRMemberTable();
		$lastID=explode('-',$lastRow['access_id']);
		$incrimentID=$lastID[1]+1;
		$concatID='oufm'.'-'.$incrimentID;
		$acessId=$_SESSION['sl_no'];
		$detlDta=$this->singelRegisteredParentUsersByAccessLevelId($acessId);
		$user_level='parent';		
		$child_of=$detlDta['sl_no'];		
		$parent_id=$detlDta['access_id'];
		$sl_no=$_POST['sl_number'];
		$aNSortr = preg_split("/(,?\s+)|((?<=[a-z])(?=\d))|((?<=\d)(?=[a-z]))/i", $sl_no);
		$suprem_parent=$aNSortr[0];
		$access_id=$concatID;	
		$name=$_POST['name'];
		$father_spouse=$_POST['father_spouse_name'];
		$mother_name=$_POST['mother_name'];
		$dob=$_POST['dob'];
		$maritial_status=$_POST['marital_status'];
		$sex=$_POST['sex'];
		$family_member=$_POST['family_member'];
		$address=$_POST['address'];
		$mobile_number=$_POST['mobile_number'];
		$email_id=$_POST['email_id'];
		$adhar_card_number=$_POST['adhar_card_number'];
		$pan_card_number=$_POST['pan_card_number'];
		$voter_id_number=$_POST['voter_id'];
		$bank_ac_number=$_POST['bank_ac_no'];
		$bank_ifsc_code=$_POST['ifsc'];
		$propose_name=$_POST['proposer_name'];
		$cod_id_number=$_POST['code_id'];	
		$donation_amount=$_POST['donation_amount'];
		$date_of_membership=$_POST['date_membership'];
		$gov_id=$_FILES['gov_id']['name'];
		$member_img=$_FILES['membr_img']['name'];
		$signature=$_FILES['signature_img']['name'];
		$created_by=$_SESSION['sl_no'];
		$status='0';
		$update_on=time();		
		$get_count=$this->db->query("select * from `registered_user` WHERE `sl_no`='$sl_no' AND `parent_id`='$created_by' ");
		$rowCount=$get_count->rowCount();
		if($rowCount>0)	
		{
			return "<h3 style='color:red;'>Admin Already Exist</h3>";	
		}	
		if($rowCount<1)	
		{
		$insert=$this->db->query("INSERT INTO `registered_user`(`user_level`, `suprem_parent`, `child_of`, `parent_id`, `sl_no`, `access_id`, `name`, `father_spouse`, `mother_name`, `dob`, `maritial_status`, `sex`, `family_member`, `address`, `mobile_number`, `email_id`, `adhar_card_number`, `pan_card_number`, `voter_id_number`, `bank_ac_number`, `bank_ifsc_code`, `propose_name`, `cod_id_number`, `donation_amount`, `date_of_membership`, `gov_id`, `member_img`, `signature`, `created_by`, `status`, `update_on`) VALUES ('$user_level','$suprem_parent','$child_of','$parent_id','$sl_no','$access_id','$name','$father_spouse','$mother_name','$dob','$maritial_status','$sex','$family_member','$address','$mobile_number','$email_id','$adhar_card_number','$pan_card_number','$voter_id_number','$bank_ac_number','$bank_ifsc_code','$propose_name','$cod_id_number','$donation_amount','$date_of_membership','$gov_id','$member_img','$signature','$created_by','$status','$update_on')");

		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";   
        $password=substr(str_shuffle($chars),0,8);
		$insertPassword=$this->db->query("INSERT INTO `user_login`(`user_id`, `password`, `status`) VALUES ('$access_id','$password','0')");
		move_uploaded_file($_FILES['gov_id']['tmp_name'],'../common/rmbr_gov_id/'.$gov_id);
		move_uploaded_file($_FILES['membr_img']['tmp_name'],'../common/rmbr_img/'.$member_img);
		move_uploaded_file($_FILES['signature_img']['tmp_name'],'../common/rmbr_signature/'.$signature);
		if($insert)
		{		
		return "<h5 style='color:green;'>A Member Has Been 'Successfully' Registered</h5>";	
		}
	   }
	}

	function lastRowOfRMemberTable()
	 {
	 	$show=$this->db->query("SELECT * FROM `registered_user` ORDER BY `id` DESC LIMIT 1");
		$singel=$show->fetchAll();
		return $singel[0];
	 	
	 }

	public function singelRegisteredParentUsers($sl_no)
	{
		$acessId=$_SESSION['sl_no'];
		$detlDta=$this->singelRegisteredParentUsersByAccessLevelId($acessId);
		$parentId=$detlDta['sl_no'];
		$show=$this->db->query("select * from `registered_user` WHERE `sl_no`='$sl_no' AND `child_of`='$parentId' ");
		$singel=$show->fetchAll();
		return $singel[0];
	}
	public function singelRegisteredParentUsersByAccessLevelId($sl_no)
	{
		$parentId=$_SESSION['sl_no'];
		$show=$this->db->query("select * from `registered_user` WHERE `access_id`='$sl_no' ");
		$singel=$show->fetchAll();
		return $singel[0];
	}
	public function findAllSupremRootUsers($supremRoot)
	{
		$sql=$this->db->query("select * from `registered_user` WHERE `suprem_parent`='$supremRoot' ");
		return $fetch=$sql->fetchAll();
	}
	public function findAllParentUsers($parentId)
	{
		$sql=$this->db->query("select * from `registered_user` WHERE `parent_id`='$parentId' ");
		return $fetch=$sql->fetchAll();
	}
	public function findAllDonationDisbusmentBySpecAcessID($acess_id)
	{
		$sql=$this->db->query("select * from `disbursement` WHERE `acess_id`='$acess_id' ");
		return $fetch=$sql->fetchAll();
	}
	public function findAllEnrolMemberBySpecAcessID($acess_id)
	{
		$sql=$this->db->query("select * from `disbursement` WHERE `acess_id`='$acess_id' ");
		 $rowCount=$sql->rowCount();
		 return $rowCount;
	}
	public function findAlltotalAmountInWalletBySpecAcessID($acess_id)
	{
		$sql=$this->db->query("select SUM(amount) AS allWaletAmount from `disbursement` WHERE `acess_id`='$acess_id'");
		$ft=$sql->fetch(PDO::FETCH_ASSOC);		
		return $ft['allWaletAmount'];
	}
	public function singelRootMbrDtls($sl_no)
	{
		$show=$this->db->query("select * from `registered_user` WHERE `access_id`='$sl_no'");
		$singel=$show->fetchAll();
		return $singel[0];
	}

	//Function End For Registered Parent Member

	//Function Start For Multilabel User Tree

	public function createMultilabelUserId()
	{
		$acessId=$_SESSION['sl_no'];
		$detlDta=$this->singelRegisteredParentUsersByAccessLevelId($acessId);
		$parentId=$detlDta['sl_no'];

		if(filter_var($parentId, FILTER_VALIDATE_INT))
		{
			$container=array();
			for ($i=1; $i < 5; $i++) { 
				$container[]=$parentId."A".$i;
			}
			return $container;	
			

		}
		else
		{

		if(ctype_alnum($parentId))
		{
			$rootId=$parentId[0];
			$ownIdAlphabet=$parentId[1];
			if($ownIdAlphabet<='J') 
			{
			$childIdAlphabet=++$ownIdAlphabet;

			$container=array();
			for ($i=1; $i < 5; $i++) { 
				$container[]=$rootId.$childIdAlphabet.$i;
			}
			return $container;	
			}		

		}
	  }

	}

	//Function End For Multilabel User Tree

	//Function Start For Disbrusment of Donation

	public function disbrusmentDonationToHirrkey($userId)
	{
		$userDtls=$this->singelRootMbrDtls($userId);
		$userSLNo=$userDtls['sl_no'];		
					
			$aNSortr = preg_split("/(,?\s+)|((?<=[a-z])(?=\d))|((?<=\d)(?=[a-z]))/i", $userSLNo);
			$split1=$aNSortr[0];
			$split2=$aNSortr[1];
			$split3=$aNSortr[2];
			if($split2=='A')
			{
				$hirirch=$this->hirircheyOfDisbrusmentLevelA($userId);
				return $hirirch;

			}
			if($split2=='B')
			{
				$hirirch=$this->hirircheyOfDisbrusmentLevelB($userId); 
				return $hirirch;

			}
			if($split2=='C')
			{
				$hirirch=$this->hirircheyOfDisbrusmentLevelC($userId); 
				return $hirirch;

			}

			if($split2=='D')
			{
				$hirirch=$this->hirircheyOfDisbrusmentLevelD($userId); 
				return $hirirch;

			}
			if($split2=='E')
			{
				$hirirch=$this->hirircheyOfDisbrusmentLevelE($userId); 
				return $hirirch;

			}
			if($split2=='F')
			{
				$hirirch=$this->hirircheyOfDisbrusmentLevelF($userId); 
				return $hirirch;

			}
			if($split2=='G')
			{
				$hirirch=$this->hirircheyOfDisbrusmentLevelG($userId); 
				return $hirirch;

			}
			if($split2=='H')
			{
				$hirirch=$this->hirircheyOfDisbrusmentLevelH($userId); 
				return $hirirch;

			}
			if($split2=='I')
			{
				$hirirch=$this->hirircheyOfDisbrusmentLevelI($userId); 
				return $hirirch;

			}
			if($split2=='J')
			{
				$hirirch=$this->hirircheyOfDisbrusmentLevelJ($userId); 
				return $hirirch;

			}
			if($split2=='K')
			{
				$hirirch=$this->hirircheyOfDisbrusmentLevelK($userId); 
				return $hirirch;

			}
	}


	public function officeAccountNumber()
	{
		
		$officeAccountNumber="488125";
		return $officeAccountNumber;
		
	}
	public function officeIFSCCode()
	{
		
		$officeIfscCode="AbI52S";
		return $officeIfscCode;
		
	}
	public function sorojAccountNumber()
	{
		
		$sorojAccountNumber="7777245125";
		return $sorojAccountNumber;
		
	}
	public function sorojIFSCCode()
	{
		
		$sorojIfscCode="SoI52Ifsc";
		return $sorojIfscCode;
		
	}
	public function sitaramDipakAccount()
	{
		
		$sitaramDipakAccount="894158858858125";
		return $sitaramDipakAccount;
		
	}
	public function sitaramIFSCCode()
	{
		
		$sitaramIfscCode="SItARAmI52Ifsc";
		return $sitaramIfscCode;
		
	}

	public function hirircheyOfDisbrusmentLevelA($userId)
	{
		$data=array();
		$officeAccountNumber=$this->officeAccountNumber();
		$officeAmount=150;
		$sorojAccountNumber=$this->sorojAccountNumber();
		$sorojAmount=150;
		$sitaramDipakAccount=$this->sitaramDipakAccount();
		$sitaramDipakAmount=150;
		$parentAmount=150;
		$spcMbrDtls=$this->singelRootMbrDtls($userId);
		$officeIfscCode=$this->officeIFSCCode();
		$sorojIfsc=$this->sorojIFSCCode();
		$sitaRamIfsc=$this->sitaramIFSCCode();

		$data[]=array("transfer_form"=>$spcMbrDtls['access_id'],"transfer_name"=>$spcMbrDtls['name'],
			"amounfficeAccountNumber"=>$officeAccountNumber,"officeIfsc"=>$officeIfscCode,
			"officeamount"=>$officeAmount,"sorojAcountNo"=>$sorojAccountNumber,
			 "sorojIFSCCode"=>$sorojIfsc,"sorojAmount"=>$sorojAmount,
			"sitaramDipakAccount"=>$sitaramDipakAccount,"sitaRamIfsc"=>$sitaRamIfsc,"sitaramDipakAmount"=>$sitaramDipakAmount,
			"parentID"=>$spcMbrDtls['parent_id'],"parentAmount"=>$parentAmount);

		return $data;
		
	}
	public function hirircheyOfDisbrusmentLevelB($userId)
	{
		$data=array();
		$officeAccountNumber=$this->officeAccountNumber();
		$officeAmount=150;
		$sorojAccountNumber=$this->sorojAccountNumber();
		$sorojAmount=100;
		$sitaramDipakAccount=$this->sitaramDipakAccount();
		$sitaramDipakAmount=100;		
		$singelMbrSpcMbrDtls=$this->singelRootMbrDtls($userId);		
		$parentSpcMbrDtls=$this->singelRootMbrDtls($singelMbrSpcMbrDtls['parent_id']);
		$parentAmount=150;
		$rootSpcMbrDtls=$this->singelRootMbrDtls($parentSpcMbrDtls['parent_id']);
		$rootAmount=100;
		$officeIfscCode=$this->officeIFSCCode();
		$sorojIfsc=$this->sorojIFSCCode();
		$sitaRamIfsc=$this->sitaramIFSCCode();
		

		$data[]=array("transfer_form"=>$singelMbrSpcMbrDtls['access_id'],"transfer_name"=>$singelMbrSpcMbrDtls['name'],
			"amounfficeAccountNumber"=>$officeAccountNumber,"officeIfsc"=>$officeIfscCode,
			"officeamount"=>$officeAmount,"sorojAcountNo"=>$sorojAccountNumber,
			 "sorojIFSCCode"=>$sorojIfsc,"sorojAmount"=>$sorojAmount,
			"sitaramDipakAccount"=>$sitaramDipakAccount,"sitaRamIfsc"=>$sitaRamIfsc,"sitaramDipakAmount"=>$sitaramDipakAmount,
			"parentSlNo"=>$parentSpcMbrDtls['sl_no'],"parentName"=>$parentSpcMbrDtls['name'],"parentAccount"=>$parentSpcMbrDtls['bank_ac_number'],"parentIFSC"=>$parentSpcMbrDtls['bank_ifsc_code'],"parentAmount"=>$parentAmount,"parentAcessID"=>$parentSpcMbrDtls['access_id'],"rootName"=>$rootSpcMbrDtls['name'],"rootAccount"=>$rootSpcMbrDtls['bank_ac_number'],"rootIFSC"=>$rootSpcMbrDtls['bank_ifsc_code'],"rootSlno"=>$rootSpcMbrDtls['sl_no'],"rootAmount"=>$rootAmount,"rootAcessID"=>$rootSpcMbrDtls['access_id']);

		return $data;
		
	}
	public function hirircheyOfDisbrusmentLevelC($userId)
	{
		$data=array();
		$officeAccountNumber=$this->officeAccountNumber();
		$officeAmount=100;
		$sorojAccountNumber=$this->sorojAccountNumber();
		$sorojAmount=50;
		$sitaramDipakAccount=$this->sitaramDipakAccount();
		$sitaramDipakAmount=100;
		$singelMbrSpcMbrDtls=$this->singelRootMbrDtls($userId);		
		$parentSpcMbrDtls=$this->singelRootMbrDtls($singelMbrSpcMbrDtls['parent_id']);
		$parentAmount=150;
		$levelASpcMbrDtls=$this->singelRootMbrDtls($parentSpcMbrDtls['parent_id']);
		$ALevelAmount=100;
		$rootSpcMbrDtls=$this->singelRootMbrDtls($levelASpcMbrDtls['parent_id']);
		$rootAmount=100;
		$officeIfscCode=$this->officeIFSCCode();
		$sorojIfsc=$this->sorojIFSCCode();
		$sitaRamIfsc=$this->sitaramIFSCCode();	

		$data[]=array("transfer_form"=>$singelMbrSpcMbrDtls['access_id'],"transfer_name"=>$singelMbrSpcMbrDtls['name'],
			"amounfficeAccountNumber"=>$officeAccountNumber,"officeIfsc"=>$officeIfscCode,
			"officeamount"=>$officeAmount,"sorojAcountNo"=>$sorojAccountNumber,
			 "sorojIFSCCode"=>$sorojIfsc,"sorojAmount"=>$sorojAmount,
			"sitaramDipakAccount"=>$sitaramDipakAccount,"sitaRamIfsc"=>$sitaRamIfsc,"sitaramDipakAmount"=>$sitaramDipakAmount,
			"parentSlNo"=>$parentSpcMbrDtls['sl_no'],"parentName"=>$parentSpcMbrDtls['name'],"parentAccount"=>$parentSpcMbrDtls['bank_ac_number'],"parentIFSC"=>$parentSpcMbrDtls['bank_ifsc_code'],"parentAmount"=>$parentAmount,"parentAcessID"=>$parentSpcMbrDtls['access_id'],"rootName"=>$rootSpcMbrDtls['name'],"rootAccount"=>$rootSpcMbrDtls['bank_ac_number'],"ALevelAccessID"=>$levelASpcMbrDtls['access_id'],"ALevelAmount"=>$ALevelAmount,"ALevelSlNo"=>$levelASpcMbrDtls['sl_no'],"ALevelName"=>$levelASpcMbrDtls['name'],"ALevelAccount"=>$levelASpcMbrDtls['bank_ac_number'],"ALevelFSC"=>$levelASpcMbrDtls['bank_ifsc_code'],"rootIFSC"=>$rootSpcMbrDtls['bank_ifsc_code'],"rootSlno"=>$rootSpcMbrDtls['sl_no'],"rootAmount"=>$rootAmount,"rootAcessID"=>$rootSpcMbrDtls['access_id']);

		return $data;
		
	}

	public function hirircheyOfDisbrusmentLevelD($userId)
	{
		$data=array();
		$officeAccountNumber=$this->officeAccountNumber();
		$officeAmount=100;
		$sorojAccountNumber=$this->sorojAccountNumber();
		$sorojAmount=50;
		$sitaramDipakAccount=$this->sitaramDipakAccount();
		$sitaramDipakAmount=50;
		$singelMbrSpcMbrDtls=$this->singelRootMbrDtls($userId);	
		$parentSpcMbrDtls=$this->singelRootMbrDtls($singelMbrSpcMbrDtls['parent_id']);
		$parentAmount=150;
		$levelBSpcMbrDtls=$this->singelRootMbrDtls($parentSpcMbrDtls['parent_id']);
		$BLevelAmount=100;
		$levelASpcMbrDtls=$this->singelRootMbrDtls($levelBSpcMbrDtls['parent_id']);
		$ALevelAmount=100;
		$rootSpcMbrDtls=$this->singelRootMbrDtls($levelASpcMbrDtls['parent_id']);
		$rootAmount=50;
		$officeIfscCode=$this->officeIFSCCode();
		$sorojIfsc=$this->sorojIFSCCode();
		$sitaRamIfsc=$this->sitaramIFSCCode();

		$data[]=array("transfer_form"=>$singelMbrSpcMbrDtls['access_id'],"transfer_name"=>$singelMbrSpcMbrDtls['name'],
			"amounfficeAccountNumber"=>$officeAccountNumber,"officeIfsc"=>$officeIfscCode,
			"officeamount"=>$officeAmount,"sorojAcountNo"=>$sorojAccountNumber,
			 "sorojIFSCCode"=>$sorojIfsc,"sorojAmount"=>$sorojAmount,
			"sitaramDipakAccount"=>$sitaramDipakAccount,"sitaRamIfsc"=>$sitaRamIfsc,"sitaramDipakAmount"=>$sitaramDipakAmount,
			"parentSlNo"=>$parentSpcMbrDtls['sl_no'],"parentName"=>$parentSpcMbrDtls['name'],"parentAccount"=>$parentSpcMbrDtls['bank_ac_number'],"parentIFSC"=>$parentSpcMbrDtls['bank_ifsc_code'],"parentAmount"=>$parentAmount,"parentAcessID"=>$parentSpcMbrDtls['access_id'],"rootName"=>$rootSpcMbrDtls['name'],"rootAccount"=>$rootSpcMbrDtls['bank_ac_number'],"BLevelAccessID"=>$levelBSpcMbrDtls['access_id'],"BLevelAmount"=>$BLevelAmount,"BLevelSlNo"=>$levelBSpcMbrDtls['sl_no'],"BLevelName"=>$levelBSpcMbrDtls['name'],"BLevelAccount"=>$levelBSpcMbrDtls['bank_ac_number'],"BLevelFSC"=>$levelBSpcMbrDtls['bank_ifsc_code'],"ALevelAccessID"=>$levelASpcMbrDtls['access_id'],"ALevelSlNo"=>$levelASpcMbrDtls['sl_no'],"ALevelName"=>$levelASpcMbrDtls['name'],"ALevelAccount"=>$levelASpcMbrDtls['bank_ac_number'],"ALevelFSC"=>$levelASpcMbrDtls['bank_ifsc_code'],"ALevelAmount"=>$ALevelAmount,"rootIFSC"=>$rootSpcMbrDtls['bank_ifsc_code'],"rootSlno"=>$rootSpcMbrDtls['sl_no'],"rootAmount"=>$rootAmount,"rootAcessID"=>$rootSpcMbrDtls['access_id']);

		return $data;
		
	}
	public function hirircheyOfDisbrusmentLevelE($userId)
	{
		$data=array();
		$officeAccountNumber=$this->officeAccountNumber();
		$officeAmount=100;
		$sorojAccountNumber=$this->sorojAccountNumber();
		$sorojAmount=25;
		$sitaramDipakAccount=$this->sitaramDipakAccount();
		$sitaramDipakAmount=25;	
		$singelMbrSpcMbrDtls=$this->singelRootMbrDtls($userId);		
		$parentSpcMbrDtls=$this->singelRootMbrDtls($singelMbrSpcMbrDtls['parent_id']);
		$parentAmount=150;
		$levelCSpcMbrDtls=$this->singelRootMbrDtls($parentSpcMbrDtls['parent_id']);
		$CLevelAmount=100;
		$levelBSpcMbrDtls=$this->singelRootMbrDtls($levelCSpcMbrDtls['parent_id']);
		$BLevelAmount=100;
		$levelASpcMbrDtls=$this->singelRootMbrDtls($levelBSpcMbrDtls['parent_id']);
		$ALevelAmount=50;
		$rootSpcMbrDtls=$this->singelRootMbrDtls($levelASpcMbrDtls['parent_id']);
		$rootAmount=50;	
		$officeIfscCode=$this->officeIFSCCode();
		$sorojIfsc=$this->sorojIFSCCode();
		$sitaRamIfsc=$this->sitaramIFSCCode();

		$data[]=array("transfer_form"=>$singelMbrSpcMbrDtls['access_id'],"transfer_name"=>$singelMbrSpcMbrDtls['name'],
			"amounfficeAccountNumber"=>$officeAccountNumber,"officeIfsc"=>$officeIfscCode,
			"officeamount"=>$officeAmount,"sorojAcountNo"=>$sorojAccountNumber,
			 "sorojIFSCCode"=>$sorojIfsc,"sorojAmount"=>$sorojAmount,
			"sitaramDipakAccount"=>$sitaramDipakAccount,"sitaRamIfsc"=>$sitaRamIfsc,"sitaramDipakAmount"=>$sitaramDipakAmount,
			"parentSlNo"=>$parentSpcMbrDtls['sl_no'],"parentName"=>$parentSpcMbrDtls['name'],"parentAccount"=>$parentSpcMbrDtls['bank_ac_number'],"parentIFSC"=>$parentSpcMbrDtls['bank_ifsc_code'],"parentAmount"=>$parentAmount,"parentAcessID"=>$parentSpcMbrDtls['access_id'],"rootName"=>$rootSpcMbrDtls['name'],"rootAccount"=>$rootSpcMbrDtls['bank_ac_number'],"CLevelAccessID"=>$levelCSpcMbrDtls['access_id'],"CLevelAmount"=>$CLevelAmount,"CLevelSlNo"=>$levelCSpcMbrDtls['sl_no'],"CLevelName"=>$levelCSpcMbrDtls['name'],"CLevelAccount"=>$levelCSpcMbrDtls['bank_ac_number'],"CLevelFSC"=>$levelCSpcMbrDtls['bank_ifsc_code'],
			 "BLevelAccessID"=>$levelBSpcMbrDtls['access_id'],"BLevelAmount"=>$BLevelAmount,"BLevelSlNo"=>$levelBSpcMbrDtls['sl_no'],"BLevelName"=>$levelBSpcMbrDtls['name'],"BLevelAccount"=>$levelBSpcMbrDtls['bank_ac_number'],"BLevelFSC"=>$levelBSpcMbrDtls['bank_ifsc_code'],"ALevelAccessID"=>$levelASpcMbrDtls['access_id'],"ALevelSlNo"=>$levelASpcMbrDtls['sl_no'],"ALevelName"=>$levelASpcMbrDtls['name'],"ALevelAccount"=>$levelASpcMbrDtls['bank_ac_number'],"ALevelFSC"=>$levelASpcMbrDtls['bank_ifsc_code'],"ALevelAmount"=>$ALevelAmount,"rootIFSC"=>$rootSpcMbrDtls['bank_ifsc_code'],"rootSlno"=>$rootSpcMbrDtls['sl_no'],"rootAmount"=>$rootAmount,"rootAcessID"=>$rootSpcMbrDtls['access_id']);

		return $data;
		
	}
	public function hirircheyOfDisbrusmentLevelF($userId)
	{
		$data=array();
		$officeAccountNumber=$this->officeAccountNumber();
		$officeAmount=100;
		$sorojAccountNumber=$this->sorojAccountNumber();
		$sorojAmount=25;
		$sitaramDipakAccount=$this->sitaramDipakAccount();
		$sitaramDipakAmount=25;	
		$singelMbrSpcMbrDtls=$this->singelRootMbrDtls($userId);		
		$parentSpcMbrDtls=$this->singelRootMbrDtls($singelMbrSpcMbrDtls['parent_id']);
		$parentAmount=150;
		$levelDSpcMbrDtls=$this->singelRootMbrDtls($parentSpcMbrDtls['parent_id']);
		$DLevelAmount=100;
		$levelCSpcMbrDtls=$this->singelRootMbrDtls($levelDSpcMbrDtls['parent_id']);
		$CLevelAmount=100;
		$levelBSpcMbrDtls=$this->singelRootMbrDtls($levelCSpcMbrDtls['parent_id']);
		$BLevelAmount=50;
		$levelASpcMbrDtls=$this->singelRootMbrDtls($levelBSpcMbrDtls['parent_id']);
		$ALevelAmount=25;
		$rootSpcMbrDtls=$this->singelRootMbrDtls($levelASpcMbrDtls['parent_id']);
		$rootAmount=25;
		$officeIfscCode=$this->officeIFSCCode();
		$sorojIfsc=$this->sorojIFSCCode();
		$sitaRamIfsc=$this->sitaramIFSCCode();


		$data[]=array("transfer_form"=>$singelMbrSpcMbrDtls['access_id'],"transfer_name"=>$singelMbrSpcMbrDtls['name'],
			"amounfficeAccountNumber"=>$officeAccountNumber,"officeIfsc"=>$officeIfscCode,
			"officeamount"=>$officeAmount,"sorojAcountNo"=>$sorojAccountNumber,
			 "sorojIFSCCode"=>$sorojIfsc,"sorojAmount"=>$sorojAmount,
			"sitaramDipakAccount"=>$sitaramDipakAccount,"sitaRamIfsc"=>$sitaRamIfsc,"sitaramDipakAmount"=>$sitaramDipakAmount,
			"parentSlNo"=>$parentSpcMbrDtls['sl_no'],"parentName"=>$parentSpcMbrDtls['name'],"parentAccount"=>$parentSpcMbrDtls['bank_ac_number'],"parentIFSC"=>$parentSpcMbrDtls['bank_ifsc_code'],"parentAmount"=>$parentAmount,"parentAcessID"=>$parentSpcMbrDtls['access_id'],"rootName"=>$rootSpcMbrDtls['name'],"rootAccount"=>$rootSpcMbrDtls['bank_ac_number'],
			"DLevelAccessID"=>$levelDSpcMbrDtls['access_id'],"DLevelAmount"=>$DLevelAmount,"DLevelSlNo"=>$levelDSpcMbrDtls['sl_no'],"DLevelName"=>$levelDSpcMbrDtls['name'],"DLevelAccount"=>$levelDSpcMbrDtls['bank_ac_number'],"DLevelFSC"=>$levelDSpcMbrDtls['bank_ifsc_code'],
			"CLevelAccessID"=>$levelCSpcMbrDtls['access_id'],"CLevelAmount"=>$CLevelAmount,"CLevelSlNo"=>$levelCSpcMbrDtls['sl_no'],"CLevelName"=>$levelCSpcMbrDtls['name'],"CLevelAccount"=>$levelCSpcMbrDtls['bank_ac_number'],"CLevelFSC"=>$levelCSpcMbrDtls['bank_ifsc_code'],
			 "BLevelAccessID"=>$levelBSpcMbrDtls['access_id'],"BLevelAmount"=>$BLevelAmount,"BLevelSlNo"=>$levelBSpcMbrDtls['sl_no'],"BLevelName"=>$levelBSpcMbrDtls['name'],"BLevelAccount"=>$levelBSpcMbrDtls['bank_ac_number'],"BLevelFSC"=>$levelBSpcMbrDtls['bank_ifsc_code'],"ALevelAccessID"=>$levelASpcMbrDtls['access_id'],"ALevelSlNo"=>$levelASpcMbrDtls['sl_no'],"ALevelName"=>$levelASpcMbrDtls['name'],"ALevelAccount"=>$levelASpcMbrDtls['bank_ac_number'],"ALevelFSC"=>$levelASpcMbrDtls['bank_ifsc_code'],"ALevelAmount"=>$ALevelAmount,"rootIFSC"=>$rootSpcMbrDtls['bank_ifsc_code'],"rootSlno"=>$rootSpcMbrDtls['sl_no'],"rootAmount"=>$rootAmount,"rootAcessID"=>$rootSpcMbrDtls['access_id']);	

		return $data;
		
	}

	public function hirircheyOfDisbrusmentLevelG($userId)
	{
		$data=array();
		$officeAccountNumber=$this->officeAccountNumber();
		$officeAmount=100;
		$sorojAccountNumber=$this->sorojAccountNumber();
		$sorojAmount=25;
		$sitaramDipakAccount=$this->sitaramDipakAccount();
		$sitaramDipakAmount=25;		
		$singelMbrSpcMbrDtls=$this->singelRootMbrDtls($userId);
		$parentSpcMbrDtls=$this->singelRootMbrDtls($singelMbrSpcMbrDtls['parent_id']);
		$parentAmount=150;
		$levelESpcMbrDtls=$this->singelRootMbrDtls($parentSpcMbrDtls['parent_id']);
		$ELevelAmount=100;
		$levelDSpcMbrDtls=$this->singelRootMbrDtls($levelESpcMbrDtls['parent_id']);
		$DLevelAmount=100;
		$levelCSpcMbrDtls=$this->singelRootMbrDtls($levelDSpcMbrDtls['parent_id']);
		$CLevelAmount=50;
		$levelBSpcMbrDtls=$this->singelRootMbrDtls($levelCSpcMbrDtls['parent_id']);
		$BLevelAmount=25;
		$levelASpcMbrDtls=$this->singelRootMbrDtls($levelBSpcMbrDtls['parent_id']);
		$ALevelAmount=25;
		$officeIfscCode=$this->officeIFSCCode();
		$sorojIfsc=$this->sorojIFSCCode();
		$sitaRamIfsc=$this->sitaramIFSCCode();


		$data[]=array("transfer_form"=>$singelMbrSpcMbrDtls['access_id'],"transfer_name"=>$singelMbrSpcMbrDtls['name'],"transfer_treeLevel"=>$singelMbrSpcMbrDtls['sl_no'],
			"amounfficeAccountNumber"=>$officeAccountNumber,"officeIfsc"=>$officeIfscCode,
			"officeamount"=>$officeAmount,"sorojAcountNo"=>$sorojAccountNumber,
			 "sorojIFSCCode"=>$sorojIfsc,"sorojAmount"=>$sorojAmount,
			"sitaramDipakAccount"=>$sitaramDipakAccount,"sitaRamIfsc"=>$sitaRamIfsc,"sitaramDipakAmount"=>$sitaramDipakAmount,
			"parentSlNo"=>$parentSpcMbrDtls['sl_no'],"parentName"=>$parentSpcMbrDtls['name'],"parentAccount"=>$parentSpcMbrDtls['bank_ac_number'],"parentIFSC"=>$parentSpcMbrDtls['bank_ifsc_code'],"parentAmount"=>$parentAmount,"parentAcessID"=>$parentSpcMbrDtls['access_id'],
			"ELevelAccessID"=>$levelESpcMbrDtls['access_id'],"ELevelAmount"=>$ELevelAmount,"ELevelSlNo"=>$levelESpcMbrDtls['sl_no'],"ELevelName"=>$levelESpcMbrDtls['name'],"ELevelAccount"=>$levelESpcMbrDtls['bank_ac_number'],"ELevelFSC"=>$levelESpcMbrDtls['bank_ifsc_code'],
			"DLevelAccessID"=>$levelDSpcMbrDtls['access_id'],"DLevelAmount"=>$DLevelAmount,"DLevelSlNo"=>$levelDSpcMbrDtls['sl_no'],"DLevelName"=>$levelDSpcMbrDtls['name'],"DLevelAccount"=>$levelDSpcMbrDtls['bank_ac_number'],"DLevelFSC"=>$levelDSpcMbrDtls['bank_ifsc_code'],
			"CLevelAccessID"=>$levelCSpcMbrDtls['access_id'],"CLevelAmount"=>$CLevelAmount,"CLevelSlNo"=>$levelCSpcMbrDtls['sl_no'],"CLevelName"=>$levelCSpcMbrDtls['name'],"CLevelAccount"=>$levelCSpcMbrDtls['bank_ac_number'],"CLevelFSC"=>$levelCSpcMbrDtls['bank_ifsc_code'],
			 "BLevelAccessID"=>$levelBSpcMbrDtls['access_id'],"BLevelAmount"=>$BLevelAmount,"BLevelSlNo"=>$levelBSpcMbrDtls['sl_no'],"BLevelName"=>$levelBSpcMbrDtls['name'],"BLevelAccount"=>$levelBSpcMbrDtls['bank_ac_number'],"BLevelFSC"=>$levelBSpcMbrDtls['bank_ifsc_code'],"ALevelAccessID"=>$levelASpcMbrDtls['access_id'],"ALevelSlNo"=>$levelASpcMbrDtls['sl_no'],"ALevelName"=>$levelASpcMbrDtls['name'],"ALevelAccount"=>$levelASpcMbrDtls['bank_ac_number'],"ALevelFSC"=>$levelASpcMbrDtls['bank_ifsc_code'],"ALevelAmount"=>$ALevelAmount);
		

		
		return $data;
		
	}
	public function hirircheyOfDisbrusmentLevelH($userId)
	{
		$data=array();
		$officeAccountNumber=$this->officeAccountNumber();
		$officeAmount=100;
		$sorojAccountNumber=$this->sorojAccountNumber();
		$sorojAmount=25;
		$sitaramDipakAccount=$this->sitaramDipakAccount();
		$sitaramDipakAmount=25;		
		$singelMbrSpcMbrDtls=$this->singelRootMbrDtls($userId);
		$parentSpcMbrDtls=$this->singelRootMbrDtls($singelMbrSpcMbrDtls['parent_id']);
		$parentAmount=150;
		$levelFSpcMbrDtls=$this->singelRootMbrDtls($parentSpcMbrDtls['parent_id']);
		$FLevelAmount=100;
		$levelESpcMbrDtls=$this->singelRootMbrDtls($levelFSpcMbrDtls['parent_id']);
		$ELevelAmount=100;
		$levelDSpcMbrDtls=$this->singelRootMbrDtls($levelESpcMbrDtls['parent_id']);
		$DLevelAmount=50;
		$levelCSpcMbrDtls=$this->singelRootMbrDtls($levelDSpcMbrDtls['parent_id']);
		$CLevelAmount=25;
		$levelBSpcMbrDtls=$this->singelRootMbrDtls($levelCSpcMbrDtls['parent_id']);
		$BLevelAmount=25;
		$officeIfscCode=$this->officeIFSCCode();
		$sorojIfsc=$this->sorojIFSCCode();
		$sitaRamIfsc=$this->sitaramIFSCCode();

		$data[]=array("transfer_form"=>$singelMbrSpcMbrDtls['access_id'],"transfer_name"=>$singelMbrSpcMbrDtls['name'],"transfer_treeLevel"=>$singelMbrSpcMbrDtls['sl_no'],
			"amounfficeAccountNumber"=>$officeAccountNumber,"officeIfsc"=>$officeIfscCode,
			"officeamount"=>$officeAmount,"sorojAcountNo"=>$sorojAccountNumber,
			 "sorojIFSCCode"=>$sorojIfsc,"sorojAmount"=>$sorojAmount,
			"sitaramDipakAccount"=>$sitaramDipakAccount,"sitaRamIfsc"=>$sitaRamIfsc,"sitaramDipakAmount"=>$sitaramDipakAmount,
			"parentSlNo"=>$parentSpcMbrDtls['sl_no'],"parentName"=>$parentSpcMbrDtls['name'],"parentAccount"=>$parentSpcMbrDtls['bank_ac_number'],"parentIFSC"=>$parentSpcMbrDtls['bank_ifsc_code'],"parentAmount"=>$parentAmount,"parentAcessID"=>$parentSpcMbrDtls['access_id'],
			"FLevelAccessID"=>$levelFSpcMbrDtls['access_id'],"FLevelAmount"=>$FLevelAmount,"FLevelSlNo"=>$levelFSpcMbrDtls['sl_no'],"FLevelName"=>$levelFSpcMbrDtls['name'],"FLevelAccount"=>$levelFSpcMbrDtls['bank_ac_number'],"FLevelFSC"=>$levelFSpcMbrDtls['bank_ifsc_code'],
			"ELevelAccessID"=>$levelESpcMbrDtls['access_id'],"ELevelAmount"=>$ELevelAmount,"ELevelSlNo"=>$levelESpcMbrDtls['sl_no'],"ELevelName"=>$levelESpcMbrDtls['name'],"ELevelAccount"=>$levelESpcMbrDtls['bank_ac_number'],"ELevelFSC"=>$levelESpcMbrDtls['bank_ifsc_code'],
			"DLevelAccessID"=>$levelDSpcMbrDtls['access_id'],"DLevelAmount"=>$DLevelAmount,"DLevelSlNo"=>$levelDSpcMbrDtls['sl_no'],"DLevelName"=>$levelDSpcMbrDtls['name'],"DLevelAccount"=>$levelDSpcMbrDtls['bank_ac_number'],"DLevelFSC"=>$levelDSpcMbrDtls['bank_ifsc_code'],
			"CLevelAccessID"=>$levelCSpcMbrDtls['access_id'],"CLevelAmount"=>$CLevelAmount,"CLevelSlNo"=>$levelCSpcMbrDtls['sl_no'],"CLevelName"=>$levelCSpcMbrDtls['name'],"CLevelAccount"=>$levelCSpcMbrDtls['bank_ac_number'],"CLevelFSC"=>$levelCSpcMbrDtls['bank_ifsc_code'],
			 "BLevelAccessID"=>$levelBSpcMbrDtls['access_id'],"BLevelAmount"=>$BLevelAmount,"BLevelSlNo"=>$levelBSpcMbrDtls['sl_no'],"BLevelName"=>$levelBSpcMbrDtls['name'],"BLevelAccount"=>$levelBSpcMbrDtls['bank_ac_number'],"BLevelFSC"=>$levelBSpcMbrDtls['bank_ifsc_code']);

		return $data;
		
	}
	public function hirircheyOfDisbrusmentLevelI($userId)
	{
		$data=array();
		$officeAccountNumber=$this->officeAccountNumber();
		$officeAmount=100;
		$sorojAccountNumber=$this->sorojAccountNumber();
		$sorojAmount=25;
		$sitaramDipakAccount=$this->sitaramDipakAccount();
		$sitaramDipakAmount=25;				
		$singelMbrSpcMbrDtls=$this->singelRootMbrDtls($userId);
		$parentSpcMbrDtls=$this->singelRootMbrDtls($singelMbrSpcMbrDtls['parent_id']);
		$parentAmount=150;
		$levelGSpcMbrDtls=$this->singelRootMbrDtls($parentSpcMbrDtls['parent_id']);
		$GLevelAmount=100;
		$levelFSpcMbrDtls=$this->singelRootMbrDtls($levelGSpcMbrDtls['parent_id']);
		$FLevelAmount=100;
		$levelESpcMbrDtls=$this->singelRootMbrDtls($levelFSpcMbrDtls['parent_id']);
		$ELevelAmount=50;
		$levelDSpcMbrDtls=$this->singelRootMbrDtls($levelESpcMbrDtls['parent_id']);
		$DLevelAmount=25;
		$levelCSpcMbrDtls=$this->singelRootMbrDtls($levelDSpcMbrDtls['parent_id']);
		$CLevelAmount=25;
		$officeIfscCode=$this->officeIFSCCode();
		$sorojIfsc=$this->sorojIFSCCode();
		$sitaRamIfsc=$this->sitaramIFSCCode();

		$data[]=array("transfer_form"=>$singelMbrSpcMbrDtls['access_id'],"transfer_name"=>$singelMbrSpcMbrDtls['name'],"transfer_treeLevel"=>$singelMbrSpcMbrDtls['sl_no'],
			"amounfficeAccountNumber"=>$officeAccountNumber,"officeIfsc"=>$officeIfscCode,
			"officeamount"=>$officeAmount,"sorojAcountNo"=>$sorojAccountNumber,
			 "sorojIFSCCode"=>$sorojIfsc,"sorojAmount"=>$sorojAmount,
			"sitaramDipakAccount"=>$sitaramDipakAccount,"sitaRamIfsc"=>$sitaRamIfsc,"sitaramDipakAmount"=>$sitaramDipakAmount,
			"parentSlNo"=>$parentSpcMbrDtls['sl_no'],"parentName"=>$parentSpcMbrDtls['name'],"parentAccount"=>$parentSpcMbrDtls['bank_ac_number'],"parentIFSC"=>$parentSpcMbrDtls['bank_ifsc_code'],"parentAmount"=>$parentAmount,"parentAcessID"=>$parentSpcMbrDtls['access_id'],
			"GLevelAccessID"=>$levelGSpcMbrDtls['access_id'],"GLevelAmount"=>$GLevelAmount,"GLevelSlNo"=>$levelGSpcMbrDtls['sl_no'],"GLevelName"=>$levelGSpcMbrDtls['name'],"GLevelAccount"=>$levelGSpcMbrDtls['bank_ac_number'],"GLevelFSC"=>$levelGSpcMbrDtls['bank_ifsc_code'],
			"FLevelAccessID"=>$levelFSpcMbrDtls['access_id'],"FLevelAmount"=>$FLevelAmount,"FLevelSlNo"=>$levelFSpcMbrDtls['sl_no'],"FLevelName"=>$levelFSpcMbrDtls['name'],"FLevelAccount"=>$levelFSpcMbrDtls['bank_ac_number'],"FLevelFSC"=>$levelFSpcMbrDtls['bank_ifsc_code'],
			"ELevelAccessID"=>$levelESpcMbrDtls['access_id'],"ELevelAmount"=>$ELevelAmount,"ELevelSlNo"=>$levelESpcMbrDtls['sl_no'],"ELevelName"=>$levelESpcMbrDtls['name'],"ELevelAccount"=>$levelESpcMbrDtls['bank_ac_number'],"ELevelFSC"=>$levelESpcMbrDtls['bank_ifsc_code'],
			"DLevelAccessID"=>$levelDSpcMbrDtls['access_id'],"DLevelAmount"=>$DLevelAmount,"DLevelSlNo"=>$levelDSpcMbrDtls['sl_no'],"DLevelName"=>$levelDSpcMbrDtls['name'],"DLevelAccount"=>$levelDSpcMbrDtls['bank_ac_number'],"DLevelFSC"=>$levelDSpcMbrDtls['bank_ifsc_code'],
			"CLevelAccessID"=>$levelCSpcMbrDtls['access_id'],"CLevelAmount"=>$CLevelAmount,"CLevelSlNo"=>$levelCSpcMbrDtls['sl_no'],"CLevelName"=>$levelCSpcMbrDtls['name'],"CLevelAccount"=>$levelCSpcMbrDtls['bank_ac_number'],"CLevelFSC"=>$levelCSpcMbrDtls['bank_ifsc_code']);

		return $data;
		
	}

	public function hirircheyOfDisbrusmentLevelJ($userId)
	{
		$data=array();
		$officeAccountNumber=$this->officeAccountNumber();
		$officeAmount=100;
		$sorojAccountNumber=$this->sorojAccountNumber();
		$sorojAmount=25;
		$sitaramDipakAccount=$this->sitaramDipakAccount();
		$sitaramDipakAmount=25;				
		$singelMbrSpcMbrDtls=$this->singelRootMbrDtls($userId);
		$parentSpcMbrDtls=$this->singelRootMbrDtls($singelMbrSpcMbrDtls['parent_id']);
		$parentAmount=150;
		$levelHSpcMbrDtls=$this->singelRootMbrDtls($parentSpcMbrDtls['parent_id']);
		$HLevelAmount=100;
		$levelGSpcMbrDtls=$this->singelRootMbrDtls($levelHSpcMbrDtls['parent_id']);
		$GLevelAmount=100;
		$levelFSpcMbrDtls=$this->singelRootMbrDtls($levelGSpcMbrDtls['parent_id']);
		$FLevelAmount=50;
		$levelESpcMbrDtls=$this->singelRootMbrDtls($levelFSpcMbrDtls['parent_id']);
		$ELevelAmount=25;
		$levelDSpcMbrDtls=$this->singelRootMbrDtls($levelESpcMbrDtls['parent_id']);
		$DLevelAmount=25;
		$officeIfscCode=$this->officeIFSCCode();
		$sorojIfsc=$this->sorojIFSCCode();
		$sitaRamIfsc=$this->sitaramIFSCCode();

		$data[]=array("transfer_form"=>$singelMbrSpcMbrDtls['access_id'],"transfer_name"=>$singelMbrSpcMbrDtls['name'],"transfer_treeLevel"=>$singelMbrSpcMbrDtls['sl_no'],
			"amounfficeAccountNumber"=>$officeAccountNumber,"officeIfsc"=>$officeIfscCode,
			"officeamount"=>$officeAmount,"sorojAcountNo"=>$sorojAccountNumber,
			 "sorojIFSCCode"=>$sorojIfsc,"sorojAmount"=>$sorojAmount,
			"sitaramDipakAccount"=>$sitaramDipakAccount,"sitaRamIfsc"=>$sitaRamIfsc,"sitaramDipakAmount"=>$sitaramDipakAmount,
			"parentSlNo"=>$parentSpcMbrDtls['sl_no'],"parentName"=>$parentSpcMbrDtls['name'],"parentAccount"=>$parentSpcMbrDtls['bank_ac_number'],"parentIFSC"=>$parentSpcMbrDtls['bank_ifsc_code'],"parentAmount"=>$parentAmount,"parentAcessID"=>$parentSpcMbrDtls['access_id'],
			"HLevelAccessID"=>$levelHSpcMbrDtls['access_id'],"HLevelAmount"=>$HLevelAmount,"HLevelSlNo"=>$levelHSpcMbrDtls['sl_no'],"HLevelName"=>$levelHSpcMbrDtls['name'],"HLevelAccount"=>$levelHSpcMbrDtls['bank_ac_number'],"HLevelFSC"=>$levelHSpcMbrDtls['bank_ifsc_code'],
			"GLevelAccessID"=>$levelGSpcMbrDtls['access_id'],"GLevelAmount"=>$GLevelAmount,"GLevelSlNo"=>$levelGSpcMbrDtls['sl_no'],"GLevelName"=>$levelGSpcMbrDtls['name'],"GLevelAccount"=>$levelGSpcMbrDtls['bank_ac_number'],"GLevelFSC"=>$levelGSpcMbrDtls['bank_ifsc_code'],
			"FLevelAccessID"=>$levelFSpcMbrDtls['access_id'],"FLevelAmount"=>$FLevelAmount,"FLevelSlNo"=>$levelFSpcMbrDtls['sl_no'],"FLevelName"=>$levelFSpcMbrDtls['name'],"FLevelAccount"=>$levelFSpcMbrDtls['bank_ac_number'],"FLevelFSC"=>$levelFSpcMbrDtls['bank_ifsc_code'],
			"ELevelAccessID"=>$levelESpcMbrDtls['access_id'],"ELevelAmount"=>$ELevelAmount,"ELevelSlNo"=>$levelESpcMbrDtls['sl_no'],"ELevelName"=>$levelESpcMbrDtls['name'],"ELevelAccount"=>$levelESpcMbrDtls['bank_ac_number'],"ELevelFSC"=>$levelESpcMbrDtls['bank_ifsc_code'],
			"DLevelAccessID"=>$levelDSpcMbrDtls['access_id'],"DLevelAmount"=>$DLevelAmount,"DLevelSlNo"=>$levelDSpcMbrDtls['sl_no'],"DLevelName"=>$levelDSpcMbrDtls['name'],"DLevelAccount"=>$levelDSpcMbrDtls['bank_ac_number'],"DLevelFSC"=>$levelDSpcMbrDtls['bank_ifsc_code']);		

		

		return $data;
		
	}
	public function hirircheyOfDisbrusmentLevelK($userId)
	{
		$data=array();
		$officeAccountNumber=$this->officeAccountNumber();
		$officeAmount=150;			
		$officeAmount=100;
		$sorojAccountNumber=$this->sorojAccountNumber();
		$sorojAmount=25;
		$sitaramDipakAccount=$this->sitaramDipakAccount();
		$sitaramDipakAmount=25;				
		$singelMbrSpcMbrDtls=$this->singelRootMbrDtls($userId);
		$parentSpcMbrDtls=$this->singelRootMbrDtls($singelMbrSpcMbrDtls['parent_id']);
		$parentAmount=150;
		$levelISpcMbrDtls=$this->singelRootMbrDtls($parentSpcMbrDtls['parent_id']);
		$ILevelAmount=100;
		$levelHSpcMbrDtls=$this->singelRootMbrDtls($levelISpcMbrDtls['parent_id']);
		$HLevelAmount=100;
		$levelGSpcMbrDtls=$this->singelRootMbrDtls($levelHSpcMbrDtls['parent_id']);
		$GLevelAmount=50;
		$levelFSpcMbrDtls=$this->singelRootMbrDtls($levelGSpcMbrDtls['parent_id']);
		$FLevelAmount=25;
		$levelESpcMbrDtls=$this->singelRootMbrDtls($levelFSpcMbrDtls['parent_id']);
		$ELevelAmount=25;	
		$officeIfscCode=$this->officeIFSCCode();
		$sorojIfsc=$this->sorojIFSCCode();
		$sitaRamIfsc=$this->sitaramIFSCCode();

		$data[]=array("transfer_form"=>$singelMbrSpcMbrDtls['access_id'],"transfer_name"=>$singelMbrSpcMbrDtls['name'],"transfer_treeLevel"=>$singelMbrSpcMbrDtls['sl_no'],
			"amounfficeAccountNumber"=>$officeAccountNumber,"officeIfsc"=>$officeIfscCode,
			"officeamount"=>$officeAmount,"sorojAcountNo"=>$sorojAccountNumber,
			 "sorojIFSCCode"=>$sorojIfsc,"sorojAmount"=>$sorojAmount,
			"sitaramDipakAccount"=>$sitaramDipakAccount,"sitaRamIfsc"=>$sitaRamIfsc,"sitaramDipakAmount"=>$sitaramDipakAmount,
			"parentSlNo"=>$parentSpcMbrDtls['sl_no'],"parentName"=>$parentSpcMbrDtls['name'],"parentAccount"=>$parentSpcMbrDtls['bank_ac_number'],"parentIFSC"=>$parentSpcMbrDtls['bank_ifsc_code'],"parentAmount"=>$parentAmount,"parentAcessID"=>$parentSpcMbrDtls['access_id'],
			"ILevelAccessID"=>$levelISpcMbrDtls['access_id'],"ILevelAmount"=>$ILevelAmount,"ILevelSlNo"=>$levelISpcMbrDtls['sl_no'],"ILevelName"=>$levelISpcMbrDtls['name'],"ILevelAccount"=>$levelISpcMbrDtls['bank_ac_number'],"ILevelFSC"=>$levelISpcMbrDtls['bank_ifsc_code'],
			"HLevelAccessID"=>$levelHSpcMbrDtls['access_id'],"HLevelAmount"=>$HLevelAmount,"HLevelSlNo"=>$levelHSpcMbrDtls['sl_no'],"HLevelName"=>$levelHSpcMbrDtls['name'],"HLevelAccount"=>$levelHSpcMbrDtls['bank_ac_number'],"HLevelFSC"=>$levelHSpcMbrDtls['bank_ifsc_code'],
			"GLevelAccessID"=>$levelGSpcMbrDtls['access_id'],"GLevelAmount"=>$GLevelAmount,"GLevelSlNo"=>$levelGSpcMbrDtls['sl_no'],"GLevelName"=>$levelGSpcMbrDtls['name'],"GLevelAccount"=>$levelGSpcMbrDtls['bank_ac_number'],"GLevelFSC"=>$levelGSpcMbrDtls['bank_ifsc_code'],
			"FLevelAccessID"=>$levelFSpcMbrDtls['access_id'],"FLevelAmount"=>$FLevelAmount,"FLevelSlNo"=>$levelFSpcMbrDtls['sl_no'],"FLevelName"=>$levelFSpcMbrDtls['name'],"FLevelAccount"=>$levelFSpcMbrDtls['bank_ac_number'],"FLevelFSC"=>$levelFSpcMbrDtls['bank_ifsc_code'],
			"ELevelAccessID"=>$levelESpcMbrDtls['access_id'],"ELevelAmount"=>$ELevelAmount,"ELevelSlNo"=>$levelESpcMbrDtls['sl_no'],"ELevelName"=>$levelESpcMbrDtls['name'],"ELevelAccount"=>$levelESpcMbrDtls['bank_ac_number'],"ELevelFSC"=>$levelESpcMbrDtls['bank_ifsc_code']);

		return $data;
		
	}
	//Function End For Disbrusment of Donation	 
   
}

$object=new main();
?>