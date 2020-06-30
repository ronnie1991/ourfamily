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
	public function addAdminLoginUsers()
	{
		$name=$_POST['name'];
		$user_id=$_POST['admin_userid'];
		$password=$_POST['admin_confirm_password'];
		$created_by=$_SESSION['sl_no'];
		$in_time=time();
		$get_count=$this->db->query("select * from `login_table` WHERE `user_id`='$user_id'  ");
		$rowCount=$get_count->rowCount();
		if($rowCount>0)	
		{
			return "<h3 style='color:red;'>Admin Already Exist</h3>";	
		}	
		if($rowCount<1)	
		{
		$insert=$this->db->query("INSERT INTO `login_table`(`name`, `user_id`, `password`, `created_by`, `status`, `in_time`, `up_tilme`) VALUES ('$name','$user_id','$password','$created_by','1','$in_time','$in_time')");
		if($insert)
		{		
		return "<h3 style='color:green;'>Successfully a Admin Created</h3>";	
		}
	   }
	}
	public function updateLoginUsers($decodedUerId)
	{
		$status=$_POST['login_status'];
		$user_id=$_POST['mbr_userid'];
		$password=$_POST['mbr_confirm_password'];
		$created_by=$_SESSION['sl_no'];
		$in_time=time();
		$get_count=$this->db->query("select * from `login_table` WHERE `sl_no`!='$decodedUerId' AND `user_id`='$user_id' ");
		$rowCount=$get_count->rowCount();
		if($rowCount>0)	
		{
			return "<h3 style='color:red;'>Admin Already Exist</h3>";	
		}	
		if($rowCount<1)	
		{
		$insert=$this->db->query("UPDATE `login_table` SET `user_id`='$user_id',`password`='$password',`created_by`='$created_by',`status`='$status',`up_tilme`='$in_time' WHERE `sl_no`='$decodedUerId'");
		if($insert)
		{		
		return "<h3 style='color:green;'>Successfully a Admin Updated</h3>";	
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
		$username=$_POST['user_id'];
		$password=$_POST['password'];
		//$md5_password=md5($password);
		$login=$this->db->query("select * from `login_table` where `user_id`='$username' and `password`='$password' AND `status`='1' ");
		$rowcount=$login->rowCount($login); 
		$singlRc=$login->fetch();		    
		if($rowcount>0)
		{		
		$_SESSION['user_id'] = $singlRc['user_id'];
           echo "
            <script type=\"text/javascript\">           
		   window.location='dashboard';
            </script>
        ";		
		}
		else
		return "<span style='color:red;font-size: 16px;font-weight:600'>User ID Or Password is Incorrect</span>";		
	}
	public function singelAdminLoginDtls($sl_no)
	{
		$show=$this->db->query("select * from `login_table` WHERE `sl_no`='$sl_no'");
		$singel=$show->fetchAll();
		return $singel[0];
	}
	function adminLognIdValidation($empLognId)
	{		
		$get_single=$this->db->query("select user_id from `login_table`  WHERE `user_id`='$empLognId' ");
		$count=$get_single->rowCount();
			
        if($count==1)
        {
			echo "<b style='color:red;'>Employee User ID / Not Available</b>";
		}
		if($count==0)
        {
			echo "<b style='color:green;'>Employee User ID / Available</b>";
		}			
	}
	function logout()
	{		
		session_destroy();
	}
	//Function End For Login Users
	//Function Start For Title
	function title()
	{		
		echo 'Our Family';
	}

	//Function End For Title
	//Function Start For Register Member
	public function addRegisteredUsers()
	{
		$lastRow=$this->lastRowOfRMemberTable();
		$lastID=explode('-',$lastRow['access_id']);
		$incrimentID=$lastID[1]+1;
		$concatID='oufm'.'-'.$incrimentID;
		$user_level='root';
		$child_of=$_POST['sl_number'];
		$sl_no=$_POST['sl_number'];
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
		$status='1';
		$update_on=time();	
		$get_count=$this->db->query("select * from `registered_user` WHERE `sl_no`='$sl_no'  ");
		$rowCount=$get_count->rowCount();
		if($rowCount>0)	
		{
			return "<h3 style='color:red;'>Admin Already Exist</h3>";	
		}	
		if($rowCount<1)	
		{
		$insert=$this->db->query("INSERT INTO `registered_user`(`user_level`, `suprem_parent`, `child_of`, `parent_id`, `sl_no`, `access_id`, `name`, `father_spouse`, `mother_name`, `dob`, `maritial_status`, `sex`, `family_member`, `address`, `mobile_number`, `email_id`, `adhar_card_number`, `pan_card_number`, `voter_id_number`, `bank_ac_number`, `bank_ifsc_code`, `propose_name`, `cod_id_number`, `donation_amount`, `date_of_membership`, `gov_id`, `member_img`, `signature`, `created_by`, `status`, `update_on`) VALUES ('$user_level','$child_of','$child_of','$child_of','$sl_no','$access_id','$name','$father_spouse','$mother_name','$dob','$maritial_status','$sex','$family_member','$address','$mobile_number','$email_id','$adhar_card_number','$pan_card_number','$voter_id_number','$bank_ac_number','$bank_ifsc_code','$propose_name','$cod_id_number','$donation_amount','$date_of_membership','$gov_id','$member_img','$signature','$created_by','$status','$update_on')");

		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";   
        $password=substr(str_shuffle($chars),0,8);
		$insertPassword=$this->db->query("INSERT INTO `user_login`(`user_id`, `password`, `status`) VALUES ('$access_id','$password','1')");
		move_uploaded_file($_FILES['gov_id']['tmp_name'],'../common/rmbr_gov_id/'.$gov_id);
		move_uploaded_file($_FILES['membr_img']['tmp_name'],'../common/rmbr_img/'.$member_img);
		move_uploaded_file($_FILES['signature_img']['tmp_name'],'../common/rmbr_signature/'.$signature);
		if($insert)
		{		
		return "<h3 style='color:green;'>A Member Has Been 'Successfully' Registered</h3>";	
		}
	   }
	}
	public function updateRegisteredUsers($rmID)
	{
		$user_level='root';
		$child_of=$_POST['sl_number'];
		$sl_no=$_POST['sl_number'];
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
		$status='1';
		$update_on=time();
		$singelRootMbrDtls=$this->singelRootMbrDtls($rmID);
		if($gov_id !='')
		 {
			$govidNm=$gov_id;
			  unlink('../common/rmbr_gov_id/'.$singelRootMbrDtls['gov_id']); 
		   move_uploaded_file($_FILES['gov_id']['tmp_name'],'../common/rmbr_gov_id/'.$govidNm);		
		   
		 }
		 if($gov_id =='')
		 {
		    if($singelRootMbrDtls['gov_id'] !=null)
			{
				$govidNm=$singelRootMbrDtls['gov_id'];				
			}
			if($singelRootMbrDtls['gov_id']==null)
			{
				$govidNm='';
			}
		 }
		if($member_img !='')
		 {
			$memberimgNm=$member_img;
			  unlink('../common/rmbr_img/'.$singelRootMbrDtls['member_img']); 
		   move_uploaded_file($_FILES['membr_img']['tmp_name'],'../common/rmbr_img/'.$memberimgNm);
		   
		 }
		 if($member_img =='')
		 {
		    if($singelRootMbrDtls['member_img'] !=null)
			{
				$memberimgNm=$singelRootMbrDtls['member_img'];				
			}
			if($singelRootMbrDtls['member_img']==null)
			{
				$memberimgNm='';
			}
		 }
		 if($signature !='')
		 {
			$signatureNm=$signature;
			  unlink('../common/rmbr_signature/'.$singelRootMbrDtls['signature']); 
		   move_uploaded_file($_FILES['signature_img']['tmp_name'],'../common/rmbr_signature/'.$signatureNm);
		   
		 }
		 if($signature =='')
		 {
		    if($singelRootMbrDtls['signature'] !=null)
			{
				$signatureNm=$singelRootMbrDtls['signature'];				
			}
			if($singelRootMbrDtls['signature']==null)
			{
				$signatureNm='';
			}
		 }
		$insert=$this->db->query("UPDATE `registered_user` SET `user_level`='$user_level',`child_of`='$child_of',`sl_no`='$sl_no',`name`='$name',`father_spouse`='$father_spouse',`mother_name`='$mother_name',`dob`='$dob',`maritial_status`='$maritial_status',`sex`='$sex',`family_member`='$family_member',`address`='$address',`mobile_number`='$mobile_number',`email_id`='$email_id',`adhar_card_number`='$adhar_card_number',`pan_card_number`='$pan_card_number',`voter_id_number`='$voter_id_number',`bank_ac_number`='$bank_ac_number',`bank_ifsc_code`='$bank_ifsc_code',`propose_name`='$propose_name',`cod_id_number`='$cod_id_number',`donation_amount`='$donation_amount',`date_of_membership`='$date_of_membership',`gov_id`='$govidNm',`member_img`='$memberimgNm',`signature`='$signatureNm',`created_by`='$created_by',`status`='$status',`update_on`='$update_on' WHERE `sl_no`='$sl_no'");		
		
		if($insert)
		{		
		return "<h3 style='color:green;'>A Member Has Been 'Successfully' Updated</h3>";	
		}
	   
	}
	function rMemberslNoValidation($slNo)
	{		
		$get_single=$this->db->query("select `sl_no` from `registered_user`  WHERE `sl_no`='$slNo' ");
		$count=$get_single->rowCount();
			
        if($count==1)
        {
			echo "<b style='color:red;'>Sl. No. Not Available</b>";
		}
		if($count==0)
        {
			echo "<b style='color:green;'>Sl. No.  Available</b>";
		}			
	}
	 function lastRowOfRMemberTable()
	 {
	 	$show=$this->db->query("SELECT * FROM `registered_user` ORDER BY `id` DESC LIMIT 1");
		$singel=$show->fetchAll();
		return $singel[0];
	 	
	 }

	public function findAllrMembers()
	{
		$sql=$this->db->query("select * from `registered_user` ");
		return $fetch=$sql->fetchAll();
	}
	public function findAllRootMembers()
	{
		$sql=$this->db->query("select `access_id` from `registered_user` group by `suprem_parent`  ");
		return $fetch=$sql->fetchAll();
	}
	public function findRootMembersTree($supremId)
	{
		$sql=$this->db->query("select * from `registered_user` WHERE `suprem_parent`='$supremId' ");
		return $fetch=$sql->fetchAll();
	}
	public function singelRootMbrDtls($sl_no)
	{
		$show=$this->db->query("select * from `registered_user` WHERE `access_id`='$sl_no'");
		$singel=$show->fetchAll();
		return $singel[0];
	}
	public function singelRootMbrUserPassword($userId)
	{
		$show=$this->db->query("select * from `user_login` WHERE `user_id`='$userId'");
		$singel=$show->fetchAll();
		return $singel[0];
	}
	function memberVerification($accesID)
	{		

		$singelRotDtls=$this->singelRootMbrDtls($accesID);
		$mberStatus=$singelRotDtls['status'];
		$timeStmp=time();
		
			
        if($mberStatus==0)
        {
        	$activeRegistertable=$this->db->query("UPDATE `registered_user` SET `status`='1',`update_on`='$timeStmp' WHERE `access_id`='$accesID'");
        	$activeLogintable=$this->db->query("UPDATE `user_login` SET `status`='1' WHERE `user_id`='$accesID'");

			echo "<b style='color:green;font-size: 25px;'>User SucessFully Verifyed & Activated, They Can Use There Account Now</b>";
		}
		if($mberStatus==1)
        {
			$activeRegistertable=$this->db->query("UPDATE `registered_user` SET `status`='0',`update_on`='$timeStmp' WHERE `access_id`='$accesID'");
        	$activeLogintable=$this->db->query("UPDATE `user_login` SET `status`='0' WHERE `user_id`='$accesID'");

			echo "<b style='color:red;font-size: 25px;'>User SucessFully Detained & De-Activated, They Can`t Use There Account</b>";
		}			
	}

	//Function End For Register Member

	//Function Start For Disbrusment of Donation





	public function disbrusmentDonationToHirrkey($userId)
	{
		$userDtls=$this->singelRootMbrDtls($userId);
		$userSLNo=$userDtls['sl_no'];
		if(filter_var($userSLNo, FILTER_VALIDATE_INT))
		{
			$hirirch=$this->hirircheyOfDisbrusmentLevelOfOffice();

			return $hirirch;

		}
		else
		{
		if(ctype_alnum($userSLNo))
		{			
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

	    }
	}

	public function hirircheyOfDisbrusmentLevelOfOffice()
	{
		$data=array();
		$name="Office";
		$officeAccountNumber=$this->officeAccountNumber();
		$officeIfscCode=$this->officeIFSCCode();
		$amount=600;

		$data[]=array("name"=>$name,"amounfficeAccountNumber"=>$officeAccountNumber,"ifsc"=>$officeIfscCode,"amount"=>$amount);

		return $data;
		
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

	function disbrussmentTheAmountOfRootMbr($accessLevelId)
	{
		foreach ($this->disbrusmentDonationToHirrkey($accessLevelId) as $rc => $rMbrDisbrusData) {                        
        $singelRootMbrDtls=$this->singelRootMbrDtls($accessLevelId);
        $transfered_from=$accessLevelId;
        $acess_id="office";
        $name=$rMbrDisbrusData['name'];
        $account_number=$rMbrDisbrusData['amounfficeAccountNumber'];
        $ifs_code=$rMbrDisbrusData['ifsc'];
        $amount=$rMbrDisbrusData['amount'];
        $status='0';
        $update_time=time();

        }
        $get_count=$this->db->query("select * from `disbursement` WHERE `transfered_from`='$transfered_from' AND `acess_id`='$acess_id' ");
		$rowCount=$get_count->rowCount();
		if($rowCount==0)
		{
		$disbruss=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transfered_from','$acess_id','$name','$account_number','$ifs_code','$amount','$status','$update_time') ");
	    
		    
		if($disbruss)
		{
		  $url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=sucess";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";		
		}
		}
		else
		{
		$url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=fail";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";
        }	
	}

	function disbrussmentTheAmountOfPareneMbrA($accessLevelId)
	{
		foreach ($this->disbrusmentDonationToHirrkey($accessLevelId) as $rc => $rMbrDisbrusData) {
       $singelRootMbrDtls=$this->singelRootMbrDtls($rMbrDisbrusData['parentID']);   
	    $transferForm= $rMbrDisbrusData['transfer_form'];
	    $transferName= $rMbrDisbrusData['transfer_name'];
	    $officeName="Office";
	    $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
	    $officeIfsc= $rMbrDisbrusData['officeIfsc'];
	    $officeamount= $rMbrDisbrusData['officeamount'];
	    $SorojName="Soroj";
	    $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
	    $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
	    $Sorojamount= $rMbrDisbrusData['sorojAmount'];
	    $SitaramDipakName="SitaramDipak";
	    $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
	    $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
	    $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
	    $parentID=$singelRootMbrDtls['access_id'];
	    $parentName=$singelRootMbrDtls['name'];
	    $parentAccount= $singelRootMbrDtls['bank_ac_number'];
	    $parentIfsc= $singelRootMbrDtls['bank_ifsc_code'];
	    $parentamount= $rMbrDisbrusData['parentAmount'];
	    $status=0;
	    $timeStamp=time();

        }
        
        $get_count=$this->db->query("select * from `disbursement` WHERE `transfered_from`='$transferForm' ");
		$rowCount=$get_count->rowCount();
		if($rowCount==0)
		{
		$disbruss1=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$officeName','$officeName','$officeAccount','$officeIfsc','$officeamount','$status','$timeStamp') ");
		$disbruss2=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SorojName','$SorojName','$SorojAccount','$SorojIfsc','$Sorojamount','$status','$timeStamp') ");
		$disbruss3=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SitaramDipakName','$SitaramDipakName','$SitaramDipakAccount','$SitaramDipakIfsc','$SitaramDipakamount','$status','$timeStamp') ");
		$disbruss4=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$parentID','$parentName','$parentAccount','$parentIfsc','$parentamount','$status','$timeStamp') ");
		}
		

		if($disbruss4)
		{
		  $url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=sucess";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";		
		}
		else
		{
		$url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=fail";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";
        }	
	}
	function disbrussmentTheAmountOfPareneMbrB($accessLevelId)
	{
        foreach ($this->disbrusmentDonationToHirrkey($accessLevelId) as $rc => $rMbrDisbrusData) {                         
          $transferForm= $rMbrDisbrusData['transfer_form']; 
          $transferName= $rMbrDisbrusData['transfer_name'];
          $officeName="Office";
          $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
          $officeIfsc= $rMbrDisbrusData['officeIfsc'];
          $officeamount= $rMbrDisbrusData['officeamount'];
          $SorojName="Soroj";
          $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
          $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
          $Sorojamount= $rMbrDisbrusData['sorojAmount'];
          $SitaramDipakName="SitaramDipak";
          $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
          $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
          $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
          $parentName=$rMbrDisbrusData['parentName'];
          $parentSlNo=$rMbrDisbrusData['parentSlNo'];
          $parentAcessID=$rMbrDisbrusData['parentAcessID'];
          $parentAccount= $rMbrDisbrusData['parentAccount'];
          $parentIfsc= $rMbrDisbrusData['parentIFSC'];
          $parentamount= $rMbrDisbrusData['parentAmount'];
          $rootName=$rMbrDisbrusData['rootName'];
          $rootSlNo=$rMbrDisbrusData['rootSlno'];
          $rootAcessID=$rMbrDisbrusData['rootAcessID'];
          $rootAccount= $rMbrDisbrusData['rootAccount'];
          $rootIfsc= $rMbrDisbrusData['rootIFSC'];
          $rootamount= $rMbrDisbrusData['rootAmount'];
          $status=0;
	      $timeStamp=time();
        }
        
        $get_count=$this->db->query("select * from `disbursement` WHERE `transfered_from`='$transferForm' ");
		$rowCount=$get_count->rowCount();
		if($rowCount==0)
		{
		$disbruss1=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$officeName','$officeName','$officeAccount','$officeIfsc','$officeamount','$status','$timeStamp') ");
		$disbruss2=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SorojName','$SorojName','$SorojAccount','$SorojIfsc','$Sorojamount','$status','$timeStamp') ");
		$disbruss3=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SitaramDipakName','$SitaramDipakName','$SitaramDipakAccount','$SitaramDipakIfsc','$SitaramDipakamount','$status','$timeStamp') ");
		$disbruss4=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$parentAcessID','$parentName','$parentAccount','$parentIfsc','$parentamount','$status','$timeStamp') ");
		$disbruss5=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$rootAcessID','$rootName','$rootAccount','$rootIfsc','$rootamount','$status','$timeStamp') ");
		}
		

		if($disbruss5)
		{
		  $url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=sucess";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";		
		}
		else
		{
		$url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=fail";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";
        }	
	}
	function disbrussmentTheAmountOfPareneMbrC($accessLevelId)
	{
       foreach ($this->disbrusmentDonationToHirrkey($accessLevelId) as $rc => $rMbrDisbrusData) {                         
	      $transferForm= $rMbrDisbrusData['transfer_form'];
	      $transferName= $rMbrDisbrusData['transfer_name'];
	      $officeName="Office";
	      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
	      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
	      $officeamount= $rMbrDisbrusData['officeamount'];
	      $SorojName="Soroj";
	      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
	      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
	      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
	      $SitaramDipakName="SitaramDipak";
	      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
	      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
	      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
	      $parentName=$rMbrDisbrusData['parentName'];
	      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
	      $parentAcessID=$rMbrDisbrusData['parentAcessID'];
	      $parentAccount= $rMbrDisbrusData['parentAccount'];
	      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
	      $parentamount= $rMbrDisbrusData['parentAmount'];
	      $ALevelName=$rMbrDisbrusData['ALevelName'];
	      $ALevelSlNo=$rMbrDisbrusData['ALevelSlNo'];
	      $ALevelAccessID=$rMbrDisbrusData['ALevelAccessID'];
	      $ALevelAccount= $rMbrDisbrusData['ALevelAccount'];
	      $ALevelIfsc= $rMbrDisbrusData['ALevelFSC'];
	      $ALevelamount= $rMbrDisbrusData['ALevelAmount'];
	      $rootName=$rMbrDisbrusData['rootName'];
	      $rootSlNo=$rMbrDisbrusData['rootSlno'];
	      $rootAcessID=$rMbrDisbrusData['rootAcessID'];
	      $rootAccount= $rMbrDisbrusData['rootAccount'];
	      $rootIfsc= $rMbrDisbrusData['rootIFSC'];
	      $rootamount= $rMbrDisbrusData['rootAmount'];
	      $status=0;
	      $timeStamp=time();
	    }
        
        
        $get_count=$this->db->query("select * from `disbursement` WHERE `transfered_from`='$transferForm' ");
		$rowCount=$get_count->rowCount();		
		if($rowCount==0)
		{
		$disbruss1=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$officeName','$officeName','$officeAccount','$officeIfsc','$officeamount','$status','$timeStamp') ");
		$disbruss2=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SorojName','$SorojName','$SorojAccount','$SorojIfsc','$Sorojamount','$status','$timeStamp') ");
		$disbruss3=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SitaramDipakName','$SitaramDipakName','$SitaramDipakAccount','$SitaramDipakIfsc','$SitaramDipakamount','$status','$timeStamp') ");
		$disbruss4=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$parentAcessID','$parentName','$parentAccount','$parentIfsc','$parentamount','$status','$timeStamp') ");
		$disbruss5=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$ALevelAccessID','$ALevelName','$ALevelAccount','$ALevelIfsc','$ALevelamount','$status','$timeStamp') ");
		$disbruss6=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$rootAcessID','$rootName','$rootAccount','$rootIfsc','$rootamount','$status','$timeStamp') ");
		}
		

		if($disbruss6)
		{
		  $url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=sucess";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";		
		}
		else
		{
		$url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=fail";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";
        }
	}
	function disbrussmentTheAmountOfPareneMbrD($accessLevelId)
	{
      foreach ($this->disbrusmentDonationToHirrkey($accessLevelId) as $rc => $rMbrDisbrusData) {                         
              $transferForm= $rMbrDisbrusData['transfer_form'];
              $transferName= $rMbrDisbrusData['transfer_name'];
              $officeName="Office";
              $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
              $officeIfsc= $rMbrDisbrusData['officeIfsc'];
              $officeamount= $rMbrDisbrusData['officeamount'];
              $SorojName="Soroj";
              $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
              $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
              $Sorojamount= $rMbrDisbrusData['sorojAmount'];
              $SitaramDipakName="SitaramDipak";
              $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
              $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
              $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
              $parentName=$rMbrDisbrusData['parentName'];
              $parentSlNo=$rMbrDisbrusData['parentSlNo'];
              $parentAcessID=$rMbrDisbrusData['parentAcessID'];
              $parentAccount= $rMbrDisbrusData['parentAccount'];
              $parentIfsc= $rMbrDisbrusData['parentIFSC'];
              $parentamount= $rMbrDisbrusData['parentAmount'];
              $BLevelName=$rMbrDisbrusData['BLevelName'];
              $BLevelSlNo=$rMbrDisbrusData['BLevelSlNo'];
              $BLevelAccessID=$rMbrDisbrusData['BLevelAccessID'];
              $BLevelAccount= $rMbrDisbrusData['BLevelAccount'];
              $BLevelIfsc= $rMbrDisbrusData['BLevelFSC'];
              $BLevelamount= $rMbrDisbrusData['BLevelAmount'];
              $ALevelName=$rMbrDisbrusData['ALevelName'];
              $ALevelSlNo=$rMbrDisbrusData['ALevelSlNo'];
              $ALevelAccessID=$rMbrDisbrusData['ALevelAccessID'];
              $ALevelAccount= $rMbrDisbrusData['ALevelAccount'];
              $ALevelIfsc= $rMbrDisbrusData['ALevelFSC'];
              $ALevelamount= $rMbrDisbrusData['ALevelAmount'];
              $rootName=$rMbrDisbrusData['rootName'];
              $rootSlNo=$rMbrDisbrusData['rootSlno'];
              $rootAcessID=$rMbrDisbrusData['rootAcessID'];
              $rootAccount= $rMbrDisbrusData['rootAccount'];
              $rootIfsc= $rMbrDisbrusData['rootIFSC'];
              $rootamount= $rMbrDisbrusData['rootAmount'];
              $status=0;
	          $timeStamp=time();
          }            
        
        
        $get_count=$this->db->query("select * from `disbursement` WHERE `transfered_from`='$transferForm' ");
		$rowCount=$get_count->rowCount();	
		if($rowCount==0)
		{
		$disbruss1=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$officeName','$officeName','$officeAccount','$officeIfsc','$officeamount','$status','$timeStamp') ");
		$disbruss2=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SorojName','$SorojName','$SorojAccount','$SorojIfsc','$Sorojamount','$status','$timeStamp') ");
		$disbruss3=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SitaramDipakName','$SitaramDipakName','$SitaramDipakAccount','$SitaramDipakIfsc','$SitaramDipakamount','$status','$timeStamp') ");
		$disbruss4=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$parentAcessID','$parentName','$parentAccount','$parentIfsc','$parentamount','$status','$timeStamp') ");
		$disbruss5=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$BLevelAccessID','$BLevelName','$BLevelAccount','$BLevelIfsc','$BLevelamount','$status','$timeStamp') ");
		$disbrus6=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$ALevelAccessID','$ALevelName','$ALevelAccount','$ALevelIfsc','$ALevelamount','$status','$timeStamp') ");
		$disbruss7=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$rootAcessID','$rootName','$rootAccount','$rootIfsc','$rootamount','$status','$timeStamp') ");
		}
		

		if($disbruss7)
		{
		  $url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=sucess";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";		
		}
		else
		{
		$url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=fail";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";
        }
	}

	function disbrussmentTheAmountOfPareneMbrE($accessLevelId)
	{
      foreach ($this->disbrusmentDonationToHirrkey($accessLevelId) as $rc => $rMbrDisbrusData) {                         
	          $transferForm= $rMbrDisbrusData['transfer_form'];
	          $transferName= $rMbrDisbrusData['transfer_name'];
	          $officeName="Office";
	          $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
	          $officeIfsc= $rMbrDisbrusData['officeIfsc'];
	          $officeamount= $rMbrDisbrusData['officeamount'];
	          $SorojName="Soroj";
	          $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
	          $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
	          $Sorojamount= $rMbrDisbrusData['sorojAmount'];
	          $SitaramDipakName="SitaramDipak";
	          $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
	          $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
	          $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
	          $parentName=$rMbrDisbrusData['parentName'];
	          $parentSlNo=$rMbrDisbrusData['parentSlNo'];
	          $parentAcessID=$rMbrDisbrusData['parentAcessID'];
	          $parentAccount= $rMbrDisbrusData['parentAccount'];
	          $parentIfsc= $rMbrDisbrusData['parentIFSC'];
	          $parentamount= $rMbrDisbrusData['parentAmount'];
	          $CLevelName=$rMbrDisbrusData['CLevelName'];
	          $CLevelSlNo=$rMbrDisbrusData['CLevelSlNo'];
	          $CLevelAccessID=$rMbrDisbrusData['CLevelAccessID'];
	          $CLevelAccount= $rMbrDisbrusData['CLevelAccount'];
	          $CLevelIfsc= $rMbrDisbrusData['CLevelFSC'];
	          $CLevelamount= $rMbrDisbrusData['CLevelAmount'];
	          $BLevelName=$rMbrDisbrusData['BLevelName'];
	          $BLevelSlNo=$rMbrDisbrusData['BLevelSlNo'];
	          $BLevelAccessID=$rMbrDisbrusData['BLevelAccessID'];
	          $BLevelAccount= $rMbrDisbrusData['BLevelAccount'];
	          $BLevelIfsc= $rMbrDisbrusData['BLevelFSC'];
	          $BLevelamount= $rMbrDisbrusData['BLevelAmount'];
	          $ALevelName=$rMbrDisbrusData['ALevelName'];
	          $ALevelSlNo=$rMbrDisbrusData['ALevelSlNo'];
	          $ALevelAccessID=$rMbrDisbrusData['ALevelAccessID'];
	          $ALevelAccount= $rMbrDisbrusData['ALevelAccount'];
	          $ALevelIfsc= $rMbrDisbrusData['ALevelFSC'];
	          $ALevelamount= $rMbrDisbrusData['ALevelAmount'];
	          $rootName=$rMbrDisbrusData['rootName'];
	          $rootSlNo=$rMbrDisbrusData['rootSlno'];
	          $rootAcessID=$rMbrDisbrusData['rootAcessID'];
	          $rootAccount= $rMbrDisbrusData['rootAccount'];
	          $rootIfsc= $rMbrDisbrusData['rootIFSC'];
	          $rootamount= $rMbrDisbrusData['rootAmount'];
	          $status=0;
	          $timeStamp=time();
	        }          
        
        
        $get_count=$this->db->query("select * from `disbursement` WHERE `transfered_from`='$transferForm' ");
		$rowCount=$get_count->rowCount();	
		if($rowCount==0)
		{
		$disbruss1=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$officeName','$officeName','$officeAccount','$officeIfsc','$officeamount','$status','$timeStamp') ");
		$disbruss2=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SorojName','$SorojName','$SorojAccount','$SorojIfsc','$Sorojamount','$status','$timeStamp') ");
		$disbruss3=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SitaramDipakName','$SitaramDipakName','$SitaramDipakAccount','$SitaramDipakIfsc','$SitaramDipakamount','$status','$timeStamp') ");
		$disbruss4=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$parentAcessID','$parentName','$parentAccount','$parentIfsc','$parentamount','$status','$timeStamp') ");
		$disbruss5=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$CLevelAccessID','$CLevelName','$CLevelAccount','$CLevelIfsc','$CLevelamount','$status','$timeStamp') ");
		$disbruss6=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$BLevelAccessID','$BLevelName','$BLevelAccount','$BLevelIfsc','$BLevelamount','$status','$timeStamp') ");
		$disbrus7=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$ALevelAccessID','$ALevelName','$ALevelAccount','$ALevelIfsc','$ALevelamount','$status','$timeStamp') ");
		$disbruss8=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$rootAcessID','$rootName','$rootAccount','$rootIfsc','$rootamount','$status','$timeStamp') ");
		}
		

		if($disbruss8)
		{
		  $url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=sucess";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";		
		}
		else
		{
		$url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=fail";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";
        }
	}

	function disbrussmentTheAmountOfPareneMbrF($accessLevelId)
	{
      foreach ($this->disbrusmentDonationToHirrkey($accessLevelId) as $rc => $rMbrDisbrusData) {                         
              $transferForm= $rMbrDisbrusData['transfer_form'];
              $transferName= $rMbrDisbrusData['transfer_name'];
              $officeName="Office";
              $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
              $officeIfsc= $rMbrDisbrusData['officeIfsc'];
              $officeamount= $rMbrDisbrusData['officeamount'];
              $SorojName="Soroj";
              $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
              $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
              $Sorojamount= $rMbrDisbrusData['sorojAmount'];
              $SitaramDipakName="SitaramDipak";
              $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
              $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
              $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
              $parentName=$rMbrDisbrusData['parentName'];
              $parentSlNo=$rMbrDisbrusData['parentSlNo'];
              $parentAcessID=$rMbrDisbrusData['parentAcessID'];
              $parentAccount= $rMbrDisbrusData['parentAccount'];
              $parentIfsc= $rMbrDisbrusData['parentIFSC'];
              $parentamount= $rMbrDisbrusData['parentAmount'];
              $DLevelName=$rMbrDisbrusData['DLevelName'];
              $DLevelSlNo=$rMbrDisbrusData['DLevelSlNo'];
              $DLevelAccessID=$rMbrDisbrusData['DLevelAccessID'];
              $DLevelAccount= $rMbrDisbrusData['DLevelAccount'];
              $DLevelIfsc= $rMbrDisbrusData['DLevelFSC'];
              $DLevelamount= $rMbrDisbrusData['DLevelAmount'];
              $CLevelName=$rMbrDisbrusData['CLevelName'];
              $CLevelSlNo=$rMbrDisbrusData['CLevelSlNo'];
              $CLevelAccessID=$rMbrDisbrusData['CLevelAccessID'];
              $CLevelAccount= $rMbrDisbrusData['CLevelAccount'];
              $CLevelIfsc= $rMbrDisbrusData['CLevelFSC'];
              $CLevelamount= $rMbrDisbrusData['CLevelAmount'];
              $BLevelName=$rMbrDisbrusData['BLevelName'];
              $BLevelSlNo=$rMbrDisbrusData['BLevelSlNo'];
              $BLevelAccessID=$rMbrDisbrusData['BLevelAccessID'];
              $BLevelAccount= $rMbrDisbrusData['BLevelAccount'];
              $BLevelIfsc= $rMbrDisbrusData['BLevelFSC'];
              $BLevelamount= $rMbrDisbrusData['BLevelAmount'];
              $ALevelName=$rMbrDisbrusData['ALevelName'];
              $ALevelSlNo=$rMbrDisbrusData['ALevelSlNo'];
              $ALevelAccessID=$rMbrDisbrusData['ALevelAccessID'];
              $ALevelAccount= $rMbrDisbrusData['ALevelAccount'];
              $ALevelIfsc= $rMbrDisbrusData['ALevelFSC'];
              $ALevelamount= $rMbrDisbrusData['ALevelAmount'];
              $rootName=$rMbrDisbrusData['rootName'];
              $rootSlNo=$rMbrDisbrusData['rootSlno'];
              $rootAcessID=$rMbrDisbrusData['rootAcessID'];
              $rootAccount= $rMbrDisbrusData['rootAccount'];
              $rootIfsc= $rMbrDisbrusData['rootIFSC'];
              $rootamount= $rMbrDisbrusData['rootAmount'];
              $status=0;
	          $timeStamp=time();
            }        
        
        
        $get_count=$this->db->query("select * from `disbursement` WHERE `transfered_from`='$transferForm' ");
		$rowCount=$get_count->rowCount();	
		if($rowCount==0)
		{
		$disbruss1=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$officeName','$officeName','$officeAccount','$officeIfsc','$officeamount','$status','$timeStamp') ");
		$disbruss2=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SorojName','$SorojName','$SorojAccount','$SorojIfsc','$Sorojamount','$status','$timeStamp') ");
		$disbruss3=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SitaramDipakName','$SitaramDipakName','$SitaramDipakAccount','$SitaramDipakIfsc','$SitaramDipakamount','$status','$timeStamp') ");
		$disbruss4=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$parentAcessID','$parentName','$parentAccount','$parentIfsc','$parentamount','$status','$timeStamp') ");
		$disbruss5=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$DLevelAccessID','$DLevelName','$DLevelAccount','$DLevelIfsc','$DLevelamount','$status','$timeStamp') ");
		$disbruss6=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$CLevelAccessID','$CLevelName','$CLevelAccount','$CLevelIfsc','$CLevelamount','$status','$timeStamp') ");
		$disbruss7=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$BLevelAccessID','$BLevelName','$BLevelAccount','$BLevelIfsc','$BLevelamount','$status','$timeStamp') ");
		$disbrus8=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$ALevelAccessID','$ALevelName','$ALevelAccount','$ALevelIfsc','$ALevelamount','$status','$timeStamp') ");
		$disbruss9=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$rootAcessID','$rootName','$rootAccount','$rootIfsc','$rootamount','$status','$timeStamp') ");
		}
		

		if($disbruss9)
		{
		  $url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=sucess";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";		
		}
		else
		{
		$url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=fail";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";
        }
	}

	function disbrussmentTheAmountOfPareneMbrG($accessLevelId)
	{
      foreach ($this->disbrusmentDonationToHirrkey($accessLevelId) as $rc => $rMbrDisbrusData) {                         
	      $transferForm= $rMbrDisbrusData['transfer_form'];
	      $transferName= $rMbrDisbrusData['transfer_name'];
	      $officeName="Office";
	      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
	      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
	      $officeamount= $rMbrDisbrusData['officeamount'];
	      $SorojName="Soroj";
	      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
	      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
	      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
	      $SitaramDipakName="SitaramDipak";
	      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
	      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
	      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
	      $parentName=$rMbrDisbrusData['parentName'];
	      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
	      $parentAcessID=$rMbrDisbrusData['parentAcessID'];
	      $parentAccount= $rMbrDisbrusData['parentAccount'];
	      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
	      $parentamount= $rMbrDisbrusData['parentAmount'];
	      $ELevelName=$rMbrDisbrusData['ELevelName'];
	      $ELevelSlNo=$rMbrDisbrusData['ELevelSlNo'];
	      $ELevelAccessID=$rMbrDisbrusData['ELevelAccessID'];
	      $ELevelAccount= $rMbrDisbrusData['ELevelAccount'];
	      $ELevelIfsc= $rMbrDisbrusData['ELevelFSC'];
	      $ELevelamount= $rMbrDisbrusData['ELevelAmount'];
	      $DLevelName=$rMbrDisbrusData['DLevelName'];
	      $DLevelSlNo=$rMbrDisbrusData['DLevelSlNo'];
	      $DLevelAccessID=$rMbrDisbrusData['DLevelAccessID'];
	      $DLevelAccount= $rMbrDisbrusData['DLevelAccount'];
	      $DLevelIfsc= $rMbrDisbrusData['DLevelFSC'];
	      $DLevelamount= $rMbrDisbrusData['DLevelAmount'];
	      $CLevelName=$rMbrDisbrusData['CLevelName'];
	      $CLevelSlNo=$rMbrDisbrusData['CLevelSlNo'];
	      $CLevelAccessID=$rMbrDisbrusData['CLevelAccessID'];
	      $CLevelAccount= $rMbrDisbrusData['CLevelAccount'];
	      $CLevelIfsc= $rMbrDisbrusData['CLevelFSC'];
	      $CLevelamount= $rMbrDisbrusData['CLevelAmount'];
	      $BLevelName=$rMbrDisbrusData['BLevelName'];
	      $BLevelSlNo=$rMbrDisbrusData['BLevelSlNo'];
	      $BLevelAccessID=$rMbrDisbrusData['BLevelAccessID'];
	      $BLevelAccount= $rMbrDisbrusData['BLevelAccount'];
	      $BLevelIfsc= $rMbrDisbrusData['BLevelFSC'];
	      $BLevelamount= $rMbrDisbrusData['BLevelAmount'];
	      $ALevelName=$rMbrDisbrusData['ALevelName'];
	      $ALevelSlNo=$rMbrDisbrusData['ALevelSlNo'];
	      $ALevelAccessID=$rMbrDisbrusData['ALevelAccessID'];
	      $ALevelAccount= $rMbrDisbrusData['ALevelAccount'];
	      $ALevelIfsc= $rMbrDisbrusData['ALevelFSC'];
	      $ALevelamount= $rMbrDisbrusData['ALevelAmount'];
	      $status=0;
	      $timeStamp=time();
	    }
        
        
        $get_count=$this->db->query("select * from `disbursement` WHERE `transfered_from`='$transferForm' ");
		$rowCount=$get_count->rowCount();	
		if($rowCount==0)
		{
		$disbruss1=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$officeName','$officeName','$officeAccount','$officeIfsc','$officeamount','$status','$timeStamp') ");
		$disbruss2=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SorojName','$SorojName','$SorojAccount','$SorojIfsc','$Sorojamount','$status','$timeStamp') ");
		$disbruss3=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SitaramDipakName','$SitaramDipakName','$SitaramDipakAccount','$SitaramDipakIfsc','$SitaramDipakamount','$status','$timeStamp') ");
		$disbruss4=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$parentAcessID','$parentName','$parentAccount','$parentIfsc','$parentamount','$status','$timeStamp') ");
		$disbruss5=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$ELevelAccessID','$ELevelName','$ELevelAccount','$ELevelIfsc','$ELevelamount','$status','$timeStamp') ");
		$disbruss6=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$DLevelAccessID','$DLevelName','$DLevelAccount','$DLevelIfsc','$DLevelamount','$status','$timeStamp') ");
		$disbruss7=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$CLevelAccessID','$CLevelName','$CLevelAccount','$CLevelIfsc','$CLevelamount','$status','$timeStamp') ");
		$disbruss8=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$BLevelAccessID','$BLevelName','$BLevelAccount','$BLevelIfsc','$BLevelamount','$status','$timeStamp') ");
		$disbrus9=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$ALevelAccessID','$ALevelName','$ALevelAccount','$ALevelIfsc','$ALevelamount','$status','$timeStamp') ");
		}
		

		if($disbruss9)
		{
		  $url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=sucess";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";		
		}
		else
		{
		$url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=fail";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";
        }
	}
	function disbrussmentTheAmountOfPareneMbrH($accessLevelId)
	{
      foreach ($this->disbrusmentDonationToHirrkey($accessLevelId) as $rc => $rMbrDisbrusData) {                         
      $transferForm= $rMbrDisbrusData['transfer_form'];
      $transferName= $rMbrDisbrusData['transfer_name'];
      $transfer_treeLevel= $rMbrDisbrusData['transfer_treeLevel'];
      $officeName="Office";
      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
      $officeamount= $rMbrDisbrusData['officeamount'];
      $SorojName="Soroj";
      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
      $SitaramDipakName="SitaramDipak";
      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
      $parentName=$rMbrDisbrusData['parentName'];
      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
      $parentAcessID=$rMbrDisbrusData['parentAcessID'];
      $parentAccount= $rMbrDisbrusData['parentAccount'];
      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
      $parentamount= $rMbrDisbrusData['parentAmount'];
      $FLevelName=$rMbrDisbrusData['FLevelName'];
      $FLevelSlNo=$rMbrDisbrusData['FLevelSlNo'];
      $FLevelAccessID=$rMbrDisbrusData['FLevelAccessID'];
      $FLevelAccount= $rMbrDisbrusData['FLevelAccount'];
      $FLevelIfsc= $rMbrDisbrusData['FLevelFSC'];
      $FLevelamount= $rMbrDisbrusData['FLevelAmount'];
      $ELevelName=$rMbrDisbrusData['ELevelName'];
      $ELevelSlNo=$rMbrDisbrusData['ELevelSlNo'];
      $ELevelAccessID=$rMbrDisbrusData['ELevelAccessID'];
      $ELevelAccount= $rMbrDisbrusData['ELevelAccount'];
      $ELevelIfsc= $rMbrDisbrusData['ELevelFSC'];
      $ELevelamount= $rMbrDisbrusData['ELevelAmount'];
      $DLevelName=$rMbrDisbrusData['DLevelName'];
      $DLevelSlNo=$rMbrDisbrusData['DLevelSlNo'];
      $DLevelAccessID=$rMbrDisbrusData['DLevelAccessID'];
      $DLevelAccount= $rMbrDisbrusData['DLevelAccount'];
      $DLevelIfsc= $rMbrDisbrusData['DLevelFSC'];
      $DLevelamount= $rMbrDisbrusData['DLevelAmount'];
      $CLevelName=$rMbrDisbrusData['CLevelName'];
      $CLevelSlNo=$rMbrDisbrusData['CLevelSlNo'];
      $CLevelAccessID=$rMbrDisbrusData['CLevelAccessID'];
      $CLevelAccount= $rMbrDisbrusData['CLevelAccount'];
      $CLevelIfsc= $rMbrDisbrusData['CLevelFSC'];
      $CLevelamount= $rMbrDisbrusData['CLevelAmount'];
      $BLevelName=$rMbrDisbrusData['BLevelName'];
      $BLevelSlNo=$rMbrDisbrusData['BLevelSlNo'];
      $BLevelAccessID=$rMbrDisbrusData['BLevelAccessID'];
      $BLevelAccount= $rMbrDisbrusData['BLevelAccount'];
      $BLevelIfsc= $rMbrDisbrusData['BLevelFSC'];
      $BLevelamount= $rMbrDisbrusData['BLevelAmount'];
	  $status=0;
	  $timeStamp=time();
     }
        
        
        $get_count=$this->db->query("select * from `disbursement` WHERE `transfered_from`='$transferForm' ");
		$rowCount=$get_count->rowCount();	
		if($rowCount==0)
		{
		$disbruss1=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$officeName','$officeName','$officeAccount','$officeIfsc','$officeamount','$status','$timeStamp') ");
		$disbruss2=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SorojName','$SorojName','$SorojAccount','$SorojIfsc','$Sorojamount','$status','$timeStamp') ");
		$disbruss3=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SitaramDipakName','$SitaramDipakName','$SitaramDipakAccount','$SitaramDipakIfsc','$SitaramDipakamount','$status','$timeStamp') ");
		$disbruss4=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$parentAcessID','$parentName','$parentAccount','$parentIfsc','$parentamount','$status','$timeStamp') ");
		$disbruss5=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$FLevelAccessID','$FLevelName','$FLevelAccount','$FLevelIfsc','$FLevelamount','$status','$timeStamp') ");
		$disbruss6=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$ELevelAccessID','$ELevelName','$ELevelAccount','$ELevelIfsc','$ELevelamount','$status','$timeStamp') ");
		$disbruss7=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$DLevelAccessID','$DLevelName','$DLevelAccount','$DLevelIfsc','$DLevelamount','$status','$timeStamp') ");
		$disbruss8=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$CLevelAccessID','$CLevelName','$CLevelAccount','$CLevelIfsc','$CLevelamount','$status','$timeStamp') ");
		$disbruss9=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$BLevelAccessID','$BLevelName','$BLevelAccount','$BLevelIfsc','$BLevelamount','$status','$timeStamp') ");
		}
		

		if($disbruss9)
		{
		  $url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=sucess";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";		
		}
		else
		{
		$url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=fail";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";
        }
	}

	function disbrussmentTheAmountOfPareneMbrI($accessLevelId)
	{
      foreach ($this->disbrusmentDonationToHirrkey($accessLevelId) as $rc => $rMbrDisbrusData) {                         
                      $transferForm= $rMbrDisbrusData['transfer_form'];
                      $transferName= $rMbrDisbrusData['transfer_name'];
                      $transfer_treeLevel= $rMbrDisbrusData['transfer_treeLevel'];
                      $officeName="Office";
                      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
                      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
                      $officeamount= $rMbrDisbrusData['officeamount'];
                      $SorojName="Soroj";
                      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
                      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
                      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
                      $SitaramDipakName="SitaramDipak";
                      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
                      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
                      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
                      $parentName=$rMbrDisbrusData['parentName'];
                      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
                      $parentAcessID=$rMbrDisbrusData['parentAcessID'];
                      $parentAccount= $rMbrDisbrusData['parentAccount'];
                      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
                      $parentamount= $rMbrDisbrusData['parentAmount'];
                      $GLevelName=$rMbrDisbrusData['GLevelName'];
                      $GLevelSlNo=$rMbrDisbrusData['GLevelSlNo'];
                      $GLevelAccessID= $rMbrDisbrusData['GLevelAccessID'];
                      $GLevelAccount= $rMbrDisbrusData['GLevelAccount'];
                      $GLevelIfsc= $rMbrDisbrusData['GLevelFSC'];
                      $GLevelamount= $rMbrDisbrusData['GLevelAmount'];
                      $FLevelName=$rMbrDisbrusData['FLevelName'];
                      $FLevelSlNo=$rMbrDisbrusData['FLevelSlNo'];
                      $FLevelAccessID= $rMbrDisbrusData['FLevelAccessID'];
                      $FLevelAccount= $rMbrDisbrusData['FLevelAccount'];
                      $FLevelIfsc= $rMbrDisbrusData['FLevelFSC'];
                      $FLevelamount= $rMbrDisbrusData['FLevelAmount'];
                      $ELevelName=$rMbrDisbrusData['ELevelName'];
                      $ELevelSlNo=$rMbrDisbrusData['ELevelSlNo'];
                      $ELevelAccessID= $rMbrDisbrusData['ELevelAccessID'];
                      $ELevelAccount= $rMbrDisbrusData['ELevelAccount'];
                      $ELevelIfsc= $rMbrDisbrusData['ELevelFSC'];
                      $ELevelamount= $rMbrDisbrusData['ELevelAmount'];
                      $DLevelName=$rMbrDisbrusData['DLevelName'];
                      $DLevelSlNo=$rMbrDisbrusData['DLevelSlNo'];
                      $DLevelAccessID= $rMbrDisbrusData['DLevelAccessID'];
                      $DLevelAccount= $rMbrDisbrusData['DLevelAccount'];
                      $DLevelIfsc= $rMbrDisbrusData['DLevelFSC'];
                      $DLevelamount= $rMbrDisbrusData['DLevelAmount'];
                      $CLevelName=$rMbrDisbrusData['CLevelName'];
                      $CLevelSlNo=$rMbrDisbrusData['CLevelSlNo'];
                      $CLevelAccessID= $rMbrDisbrusData['CLevelAccessID'];
                      $CLevelAccount= $rMbrDisbrusData['CLevelAccount'];
                      $CLevelIfsc= $rMbrDisbrusData['CLevelFSC'];
                      $CLevelamount= $rMbrDisbrusData['CLevelAmount'];
                      $status=0;
	                  $timeStamp=time();
                    }
        
        
        $get_count=$this->db->query("select * from `disbursement` WHERE `transfered_from`='$transferForm' ");
		$rowCount=$get_count->rowCount();	
		if($rowCount==0)
		{
		$disbruss1=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$officeName','$officeName','$officeAccount','$officeIfsc','$officeamount','$status','$timeStamp') ");
		$disbruss2=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SorojName','$SorojName','$SorojAccount','$SorojIfsc','$Sorojamount','$status','$timeStamp') ");
		$disbruss3=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SitaramDipakName','$SitaramDipakName','$SitaramDipakAccount','$SitaramDipakIfsc','$SitaramDipakamount','$status','$timeStamp') ");
		$disbruss4=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$parentAcessID','$parentName','$parentAccount','$parentIfsc','$parentamount','$status','$timeStamp') ");
		$disbruss5=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$GLevelAccessID','$GLevelName','$GLevelAccount','$GLevelIfsc','$GLevelamount','$status','$timeStamp') ");
		$disbruss6=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$FLevelAccessID','$FLevelName','$FLevelAccount','$FLevelIfsc','$FLevelamount','$status','$timeStamp') ");
		$disbruss7=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$ELevelAccessID','$ELevelName','$ELevelAccount','$ELevelIfsc','$ELevelamount','$status','$timeStamp') ");
		$disbruss8=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$DLevelAccessID','$DLevelName','$DLevelAccount','$DLevelIfsc','$DLevelamount','$status','$timeStamp') ");
		$disbruss9=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$CLevelAccessID','$CLevelName','$CLevelAccount','$CLevelIfsc','$CLevelamount','$status','$timeStamp') ");
		}
		

		if($disbruss9)
		{
		  $url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=sucess";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";		
		}
		else
		{
		$url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=fail";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";
        }
	}

	function disbrussmentTheAmountOfPareneMbrJ($accessLevelId)
	{
      foreach ($this->disbrusmentDonationToHirrkey($accessLevelId) as $rc => $rMbrDisbrusData) {                         
                      $transferForm= $rMbrDisbrusData['transfer_form'];
                      $transferName= $rMbrDisbrusData['transfer_name'];
                      $transfer_treeLevel= $rMbrDisbrusData['transfer_treeLevel'];
                      $officeName="Office";
                      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
                      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
                      $officeamount= $rMbrDisbrusData['officeamount'];
                      $SorojName="Soroj";
                      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
                      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
                      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
                      $SitaramDipakName="SitaramDipak";
                      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
                      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
                      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
                      $parentName=$rMbrDisbrusData['parentName'];
                      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
                      $parentAcessID=$rMbrDisbrusData['parentAcessID'];
                      $parentAccount= $rMbrDisbrusData['parentAccount'];
                      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
                      $parentamount= $rMbrDisbrusData['parentAmount'];
                      $HLevelName=$rMbrDisbrusData['HLevelName'];
                      $HLevelSlNo=$rMbrDisbrusData['HLevelSlNo'];
                      $HLevelAccessID= $rMbrDisbrusData['HLevelAccessID'];
                      $HLevelAccount= $rMbrDisbrusData['HLevelAccount'];
                      $HLevelIfsc= $rMbrDisbrusData['HLevelFSC'];
                      $HLevelamount= $rMbrDisbrusData['HLevelAmount'];
                      $GLevelName=$rMbrDisbrusData['GLevelName'];
                      $GLevelSlNo=$rMbrDisbrusData['GLevelSlNo'];
                      $GLevelAccessID= $rMbrDisbrusData['GLevelAccessID'];
                      $GLevelAccount= $rMbrDisbrusData['GLevelAccount'];
                      $GLevelIfsc= $rMbrDisbrusData['GLevelFSC'];
                      $GLevelamount= $rMbrDisbrusData['GLevelAmount'];
                      $FLevelName=$rMbrDisbrusData['FLevelName'];
                      $FLevelSlNo=$rMbrDisbrusData['FLevelSlNo'];
                      $FLevelAccessID= $rMbrDisbrusData['FLevelAccessID'];
                      $FLevelAccount= $rMbrDisbrusData['FLevelAccount'];
                      $FLevelIfsc= $rMbrDisbrusData['FLevelFSC'];
                      $FLevelamount= $rMbrDisbrusData['FLevelAmount'];
                      $ELevelName=$rMbrDisbrusData['ELevelName'];
                      $ELevelSlNo=$rMbrDisbrusData['ELevelSlNo'];
                      $ELevelAccessID= $rMbrDisbrusData['ELevelAccessID'];
                      $ELevelAccount= $rMbrDisbrusData['ELevelAccount'];
                      $ELevelIfsc= $rMbrDisbrusData['ELevelFSC'];
                      $ELevelamount= $rMbrDisbrusData['ELevelAmount'];
                      $DLevelName=$rMbrDisbrusData['DLevelName'];
                      $DLevelSlNo=$rMbrDisbrusData['DLevelSlNo'];
                      $DLevelAccessID= $rMbrDisbrusData['DLevelAccessID'];
                      $DLevelAccount= $rMbrDisbrusData['DLevelAccount'];
                      $DLevelIfsc= $rMbrDisbrusData['DLevelFSC'];
                      $DLevelamount= $rMbrDisbrusData['DLevelAmount'];
                      $status=0;
	                  $timeStamp=time();
                    }
        
        
        $get_count=$this->db->query("select * from `disbursement` WHERE `transfered_from`='$transferForm' ");
		$rowCount=$get_count->rowCount();	
		if($rowCount==0)
		{
		$disbruss1=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$officeName','$officeName','$officeAccount','$officeIfsc','$officeamount','$status','$timeStamp') ");
		$disbruss2=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SorojName','$SorojName','$SorojAccount','$SorojIfsc','$Sorojamount','$status','$timeStamp') ");
		$disbruss3=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SitaramDipakName','$SitaramDipakName','$SitaramDipakAccount','$SitaramDipakIfsc','$SitaramDipakamount','$status','$timeStamp') ");
		$disbruss4=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$parentAcessID','$parentName','$parentAccount','$parentIfsc','$parentamount','$status','$timeStamp') ");
		$disbruss5=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$HLevelAccessID','$HLevelName','$HLevelAccount','$HLevelIfsc','$HLevelamount','$status','$timeStamp') ");
		$disbruss6=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$GLevelAccessID','$GLevelName','$GLevelAccount','$GLevelIfsc','$GLevelamount','$status','$timeStamp') ");
		$disbruss7=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$FLevelAccessID','$FLevelName','$FLevelAccount','$FLevelIfsc','$FLevelamount','$status','$timeStamp') ");
		$disbruss8=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$ELevelAccessID','$ELevelName','$ELevelAccount','$ELevelIfsc','$ELevelamount','$status','$timeStamp') ");
		$disbruss9=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$DLevelAccessID','$DLevelName','$DLevelAccount','$DLevelIfsc','$DLevelamount','$status','$timeStamp') ");
		}
		

		if($disbruss9)
		{
		  $url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=sucess";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";		
		}
		else
		{
		$url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=fail";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";
        }
	}

	function disbrussmentTheAmountOfPareneMbrK($accessLevelId)
	{
      foreach ($this->disbrusmentDonationToHirrkey($accessLevelId) as $rc => $rMbrDisbrusData) {                         
                      $transferForm= $rMbrDisbrusData['transfer_form'];
                      $transferName= $rMbrDisbrusData['transfer_name'];
                      $transfer_treeLevel= $rMbrDisbrusData['transfer_treeLevel'];
                      $officeName="Office";
                      $officeAccount= $rMbrDisbrusData['amounfficeAccountNumber'];
                      $officeIfsc= $rMbrDisbrusData['officeIfsc'];
                      $officeamount= $rMbrDisbrusData['officeamount'];
                      $SorojName="Soroj";
                      $SorojAccount= $rMbrDisbrusData['sorojAcountNo'];
                      $SorojIfsc= $rMbrDisbrusData['sorojIFSCCode'];
                      $Sorojamount= $rMbrDisbrusData['sorojAmount'];
                      $SitaramDipakName="SitaramDipak";
                      $SitaramDipakAccount= $rMbrDisbrusData['sitaramDipakAccount'];
                      $SitaramDipakIfsc= $rMbrDisbrusData['sitaRamIfsc'];
                      $SitaramDipakamount= $rMbrDisbrusData['sitaramDipakAmount'];
                      $parentName=$rMbrDisbrusData['parentName'];
                      $parentSlNo=$rMbrDisbrusData['parentSlNo'];
                      $parentAcessID=$rMbrDisbrusData['parentAcessID'];
                      $parentAccount= $rMbrDisbrusData['parentAccount'];
                      $parentIfsc= $rMbrDisbrusData['parentIFSC'];
                      $parentamount= $rMbrDisbrusData['parentAmount'];
                      $ILevelName=$rMbrDisbrusData['ILevelName'];
                      $ILevelSlNo=$rMbrDisbrusData['ILevelSlNo'];
                      $ILevelAccessID= $rMbrDisbrusData['ILevelAccessID'];
                      $ILevelAccount= $rMbrDisbrusData['ILevelAccount'];
                      $ILevelIfsc= $rMbrDisbrusData['ILevelFSC'];
                      $ILevelamount= $rMbrDisbrusData['ILevelAmount'];
                      $HLevelName=$rMbrDisbrusData['HLevelName'];
                      $HLevelSlNo=$rMbrDisbrusData['HLevelSlNo'];
                      $HLevelAccessID= $rMbrDisbrusData['HLevelAccessID'];
                      $HLevelAccount= $rMbrDisbrusData['HLevelAccount'];
                      $HLevelIfsc= $rMbrDisbrusData['HLevelFSC'];
                      $HLevelamount= $rMbrDisbrusData['HLevelAmount'];
                      $GLevelName=$rMbrDisbrusData['GLevelName'];
                      $GLevelSlNo=$rMbrDisbrusData['GLevelSlNo'];
                      $GLevelAccessID= $rMbrDisbrusData['GLevelAccessID'];
                      $GLevelAccount= $rMbrDisbrusData['GLevelAccount'];
                      $GLevelIfsc= $rMbrDisbrusData['GLevelFSC'];
                      $GLevelamount= $rMbrDisbrusData['GLevelAmount'];
                      $FLevelName=$rMbrDisbrusData['FLevelName'];
                      $FLevelSlNo=$rMbrDisbrusData['FLevelSlNo'];
                      $FLevelAccessID= $rMbrDisbrusData['FLevelAccessID'];
                      $FLevelAccount= $rMbrDisbrusData['FLevelAccount'];
                      $FLevelIfsc= $rMbrDisbrusData['FLevelFSC'];
                      $FLevelamount= $rMbrDisbrusData['FLevelAmount'];
                      $ELevelName=$rMbrDisbrusData['ELevelName'];
                      $ELevelSlNo=$rMbrDisbrusData['ELevelSlNo'];
                      $ELevelAccessID= $rMbrDisbrusData['ELevelAccessID'];
                      $ELevelAccount= $rMbrDisbrusData['ELevelAccount'];
                      $ELevelIfsc= $rMbrDisbrusData['ELevelFSC'];
                      $ELevelamount= $rMbrDisbrusData['ELevelAmount'];
                      $status=0;
	                  $timeStamp=time();
                    }
        
        
        $get_count=$this->db->query("select * from `disbursement` WHERE `transfered_from`='$transferForm' ");
		$rowCount=$get_count->rowCount();	
		if($rowCount==0)
		{
		$disbruss1=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$officeName','$officeName','$officeAccount','$officeIfsc','$officeamount','$status','$timeStamp') ");
		$disbruss2=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SorojName','$SorojName','$SorojAccount','$SorojIfsc','$Sorojamount','$status','$timeStamp') ");
		$disbruss3=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$SitaramDipakName','$SitaramDipakName','$SitaramDipakAccount','$SitaramDipakIfsc','$SitaramDipakamount','$status','$timeStamp') ");
		$disbruss4=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$parentAcessID','$parentName','$parentAccount','$parentIfsc','$parentamount','$status','$timeStamp') ");
		$disbruss5=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$ILevelAccessID','$ILevelName','$ILevelAccount','$ILevelIfsc','$ILevelamount','$status','$timeStamp') ");
		$disbruss6=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$HLevelAccessID','$HLevelName','$HLevelAccount','$HLevelIfsc','$HLevelamount','$status','$timeStamp') ");
		$disbruss7=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$GLevelAccessID','$GLevelName','$GLevelAccount','$GLevelIfsc','$GLevelamount','$status','$timeStamp') ");
		$disbruss8=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$FLevelAccessID','$FLevelName','$FLevelAccount','$FLevelIfsc','$FLevelamount','$status','$timeStamp') ");
		$disbruss9=$this->db->query("INSERT INTO `disbursement`(`transfered_from`, `acess_id`, `name`, `account_number`, `ifs_code`, `amount`, `status`, `update_time`) VALUES ('$transferForm','$ELevelAccessID','$ELevelName','$ELevelAccount','$ELevelIfsc','$ELevelamount','$status','$timeStamp') ");
		}
		

		if($disbruss9)
		{
		  $url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=sucess";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";		
		}
		else
		{
		$url="disbrusment_getway?rmID=".base64_encode($accessLevelId)."&msg=fail";
           echo "
            <script type=\"text/javascript\">           
		   window.location='$url';
            </script>
        ";
        }
	}


	//Function End For Disbrusment of Donation
	
	//Function Start For Month
	function numrcMonth($mn)
	{
		if($mn==1)
		{
			$month='January';
		}
		if($mn==2)
		{
			$month='February';
		}
		if($mn==3)
		{
			$month='March';
		}
		if($mn==4)
		{
			$month='April ';
		}
		if($mn==5)
		{
			$month='May';
		}
		if($mn==6)
		{
			$month='June';
		}
		if($mn==7)
		{
			$month='July';
		}
		if($mn==8)
		{
			$month='August';
		}
		if($mn==9)
		{
			$month='September';
		}
		if($mn==10)
		{
			$month='October';
		}
		if($mn==11)
		{
			$month='November';
		}
		if($mn==12)
		{
			$month='December ';
		}
		return $month;
		
	}
}
$object=new main();
?>