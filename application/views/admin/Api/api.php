<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST,GET,OPTIONS');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('content-type:application/json');
$request = $_SERVER['REQUEST_METHOD'];
$connection = mysqli_connect('localhost','findbash_hrms','smuhammad457A','findbash_hrms');
switch($request){
	case 'GET' :
	amazing();
	break;
	case 'POST' :
	$data = json_decode(file_get_contents('php://input'),true);
	keno($data);
	break;
	case 'PUT' :
	echo '{"name":"hum"}';
	break;
	case 'PATCH' :
	echo '{"name":"hum"}';
	break;
	case 'DELETE' :
	echo '{"name":"hum"}';
	break;
	default :
	echo '{"name":"hum"}';
    break;	
}
function amazing(){
	$connection = mysqli_connect('localhost','findbash_hrms','smuhammad457A','findbash_hrms');
	$query = mysqli_query($connection,"SELECT * FROM user");
	$all_data = array();
    while($hum = mysqli_fetch_assoc($query)){
	 
	$all_data[] = $hum;
		
	}
	echo json_encode(array('hum' => $all_data));
		
	
	
	
	
	
}
function keno($data){
	$connection = mysqli_connect('localhost','findbash_hrms','smuhammad457A','findbash_hrms');
	$system = $this->Xin_model->read_setting_info(1);
			
    $sys_arr = explode(',',$system[0]->system_ip_address);
	$firstname = $data['firstname'];
	$lastname = $data['lastname'];
	$email = $data['email'];
	$password = $data['password'];
	if($firstname == ""){
		echo json_encode("put firstname");
	}
	else{
	    $query = mysqli_query($connection,"INSERT INTO user(firstname,lastname,email,password,status) VALUES('$firstname','$lastname','$email','$password','3')");
	}
	
	if($query){
		echo json_encode($sys_arr);
	}
	
	
}
?>

