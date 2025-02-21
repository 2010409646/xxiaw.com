<?php
//前台公用类库
namespace Common\Action;
use Common\Action\AllAction;
class ApiAction extends AllAction{
    public function _initialize(){
	parent::_initialize();
	header('Access-Control-Allow-Origin:*');
	header('Content-type: application/json');
   /*   if(!IS_POST){
		
		redirect('/');
	}
	
	if(C('site_email')!=$_POST['key'] ||$_POST['key']==null){
		 echo json_encode(array('state'=>'03','info'=>'接口获取失败'));
		 exit;
	} */
    }
}
?>