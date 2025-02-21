<?php
namespace Home\Action;
use Common\Action\HomeAction;
class DownAction extends HomeAction{
    //软件搜索
    public function search(){
		//通过地址栏参数支持筛选条件,$JumpUrl传递分页及跳转参数
		$Url = gxl_param_url();
		$JumpUrl = gxl_param_jump($Url);
		$JumpUrl['p'] = '{!page!}';
		C('jumpurl',UU('Home-down/search',$JumpUrl,true,false));	
		C('currentpage',$Url['page']);
		//变量赋值
		$search = $this->Lable_Search($Url,'down');
		$this->assign($search);
		$this->display($search['search_skin']);
    }
    //软件列表
    public function show(){
		//通过地址栏参数支持筛选条件,$JumpUrl传递分页及跳转参数
		$dir = I("get.dir", "none", "strip_tags,htmlspecialchars");
		$Url = gxl_param_url();
		
		if ($dir != "none") {
			$Url["id"] = get_id_by_dir($dir);
			$Url["dir"] = getlistdir($Url["id"]);
		
		}
		$JumpUrl = gxl_param_jump($Url);
		$JumpUrl['p'] = '{!page!}';	
		
		C('jumpurl',UU('Home-down/showlist',$JumpUrl,true,false));
		C('currentpage',$Url['page']);
	
		//变量赋值
		$List = list_search(F('_gxlnews/list'),'list_id='.$Url['id']);
		
		$channel = $this->Lable_Down_List($Url,$List[0]);	
		$this->assign($channel);
		$this->display($channel['list_skin']);
    }
      //软件列表
    public function showlist(){
		//通过地址栏参数支持筛选条件,$JumpUrl传递分页及跳转参数
		$dir = I("get.dir", "none", "strip_tags,htmlspecialchars");
		$Url = gxl_param_url();
		
		if ($dir != "none") {
			$Url["id"] = get_id_by_dir($dir);
			$Url["dir"] = getlistdir($Url["id"]);
		
		}
		$JumpUrl = gxl_param_jump($Url);
		$JumpUrl['p'] = '{!page!}';	
		
		C('jumpurl',UU('Home-down/showlist',$JumpUrl,true,false));
		C('currentpage',$Url['page']);
	
		//变量赋值
		$List = list_search(F('_gxlnews/list'),'list_id='.$Url['id']);
		
		$channel = $this->Lable_Down_List($Url,$List[0]);	
		$this->assign($channel);
		$this->display($channel['list_skin']);
    }
	//软件内容页
    public function read(){
		$id = intval(I('get.id','','strip_tags,htmlspecialchars'));
		
		$array_detail = $this->get_cache_detail($id);
		
		if($array_detail){
			$this->assign($array_detail['show']);
			$this->assign($array_detail['read']);
			$this->display($array_detail['read']['down_skin_detail']);
		}else{
			$this->assign("jumpUrl",C('site_path'));
			$this->error('此条软件已经删除！');
		}
    }
	//跳转下载
	public function down(){
	    Vendor('Aes.Aes');
        $obj = new \Aes(); 
       
		$id = intval(I('get.id','','strip_tags,htmlspecialchars'));
		$type = I('get.type','','strip_tags,htmlspecialchars')?I('get.type','','strip_tags,htmlspecialchars'):1;
		$rs=M('down');
		$array_detail = $this->get_cache_detail($id);
		if($array_detail){
		$da=$rs->where(array('down_id'=>$id))->field('down_down1,down_down2,down_down3,down_down4,down_down5,down_down6')->find();
		 $da['down_down2']=strpos($da['down_down2'],'ttp')?$da['down_down2']:C('site_url').$da['down_down2'];
		 $da['down_down1']=strpos($da['down_down1'],'ttp')?$da['down_down1']:C('site_url').$da['down_down1'];
		 $da['down_down3']=strpos($da['down_down3'],'ttp')?$da['down_down3']:C('site_url').$da['down_down3'];
		 $da['down_down4']=strpos($da['down_down4'],'ttp')?$da['down_down4']:C('site_url').$da['down_down4'];
		 $da['down_down5']=strpos($da['down_down5'],'ttp')?$da['down_down5']:C('site_url').$da['down_down5'];
		 $da['down_down6']=strpos($da['down_down6'],'ttp')?$da['down_down6']:C('site_url').$da['down_down6'];
			  
		switch ($type)
		{
		case 2:
		  $url = $da['down_down2'] ;
		  break;  
		case 3:
		  $url = $da['down_down3'] ;
		  break;
		case 4:
		  $url = $da['down_down4'] ;
		  break;
		  case 5:
		  $url = $da['down_down5'] ;
		  break;
		  case 6:
		  $url = $da['down_down6'] ;
		  break;
		default:
		   $url = $da['down_down1'] ;
		}
		}
	
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $randomString = '';
        $length = 10;
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        $url=downnginx($url);
        
		$array_detail['read']['url']=$url;
		$array_detail['read']['randomString']=$randomString;
		$array_detail['read']['urls']=$ase=$obj->encrypt($url,$randomString);
	    
		$this->assign($array_detail['show']);
		$this->assign($array_detail['read']);
		$this->display('gxl_xiazai');
		//redirect($url);
		
	}
	// 从数据库获取数据
	private function get_cache_detail($down_id){
		
		if(!$down_id){ return false; }
		//优先读取缓存数据
		if(C('data_cache_down')){
			$array_detail = S('data_cache_down_'.$down_id);
			if($array_detail){
				return $array_detail;
			}
		}
		//未中缓存则从数据库读取
		$where = array();
// 		$where['down_id'] = $down_id;
// 		$where['down_status'] = array('eq',1);
        $where = C("db_prefix") . "down.down_id = " . $down_id;
        $join = C("db_prefix") . "down_all on " . C("db_prefix") . "down_all.down_id = " . C("db_prefix") . "down.down_id";
		$rs =D("Down");
		$array = $rs->where($where)->join($join)->relation('Tag')->find();
		
		//print_r($array);die();
		if($array){
			//解析标签
			$array_detail = $this->Lable_Down_Read($array,$rs);
			
			//print_r($array_detail);die();
			if( C('data_cache_down') ){
				S('data_cache_down_'.$down_id, $array_detail, intval(C('data_cache_down')));
			}
		
			return $array_detail;
		}
		return false;
	}	
	

}
	function download($path,$name){ 


	 $file_size = filesize($path);

	 header("Content-type:audio/mpeg");
	 header("Accept-Ranges:bytes");
	 header("Accept-Length:$file_size");
	 header("Content-Disposition:attachment;filename=$name");
	 readfile($path);
	 exit();
	}
?>