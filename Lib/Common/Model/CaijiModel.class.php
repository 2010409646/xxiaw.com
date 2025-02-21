<?php
namespace Common\Model;
use Think\Model;
class CaijiModel extends Model {
    private $ffdb;
    public function __construct(){
		$this->ffdb = M('Down');
    }			
	//采集入库
    public function xml_insert($down, $mustup){
		
	    if(empty($down['down_name'])){
			return '软件名称为空，不做处理!';
		}
		if(!$down['down_cid']){
			return '未匹配到对应栏目分类，不做处理!';
		}
		unset($down['list_name']);
		
		// 格式化常规字符
		$down['down_name'] =$down['down_name'];
		// 检测来源是否完全相同
		$array = M('Down')->field($field)->where(array('down_name'=>$down['down_name']))->find();
		if($array){
			//有简介时 更新该软件
		
			return $this->xml_update($down, $array, $mustup);				
						
		}
		
		// 添加下载开始
		unset($down['down_id']);		
		if(empty($down['down_hits'])){
			$down['down_hits'] = mt_rand(1,C('collect_hits'));
		}
		if(empty($down['down_up'])){
			$down['down_up'] = mt_rand(1,C('collect_updown'));
		}
		if(empty($down['down_down'])){
			$down['down_down'] = mt_rand(1,C('collect_updown'));
		}
		if( empty($down['down_gold']) ){
			$down['down_gold'] = mt_rand(1,C('collect_gold'));
		}
		if( empty($down['down_golder']) ){
			$down['down_golder'] = mt_rand(1,C('collect_golder'));
		}
		if(empty($down['down_addtime']) ){
			$down['down_addtime'] = time();
		}else{
			$down['down_addtime'] = strtotime($down['down_addtime']);
		}
		
		$img = D('Img');
		
	
		$down['down_pic']=$img->down_load($down['down_pic'],'down_pic');
		$down['down_icon']=$img->down_load($down['down_icon'],'down_icon');		
		
		
		if(!empty($down["down_content"])) {
			$down_content = gxl_news_img_array($down["down_content"], 1);
		
			if ((C("upload_http") && !empty($down_content)) || (C("upload_http_news") && !empty($down_content))) {
			
	
				if (!!$path = getarraypic($down_content)) {
					$savePath = $img->down_load($path,"down");
				
				
					foreach($savePath as $k=>$v){
						
						if(!$savePath[$k]){
							$savePath[$k]='/Public/code/img/iconds.jpg';
							
						}
						
					}
					
					$down['down_content']= str_ireplace($path, $savePath, $down_content);
				
			
				}
				else {
					$down['down_content'];
				}
			}
			else {
				$down['down_content'];
			}
		}
		else {
			$down['down_content'];
		}
			if(!empty($down["down_picall"])) {
			$down_picall = gxl_news_img_array($down["down_picall"], 1);
		
			if ((C("upload_http") && !empty($down_picall)) || (C("upload_http_news") && !empty($down_picall))) {
			
	
				if (!!$path = getarraypic($down_picall)) {
					$savePath = $img->down_load($path,"down");
				
				
					foreach($savePath as $k=>$v){
						
						if(!$savePath[$k]){
							$savePath[$k]='/Public/code/img/iconds.jpg';
							
						}
						
					}
					
					$down['down_picall']= str_ireplace($path, $savePath, $down_picall);
				
			
				}
				else {
					$down['down_picall'];
				}
			}
			else {
				$down['down_picall'];
			}
		}
		else {
			$down['down_picall'];
		}
		$down['down_addtime']=time();
	    $down_content=$down['down_content'];
	    unset($down['down_content']);
	    $down_picall=$down['down_picall'];
	    unset($down['down_picall']);
	    unset($down['down_total']);
	 
		// 入库接口	
		$id = M('Down')->data($down)->add();
		$tag = D("Tag");
	    if ($down["down_keywords"]) {
			$tag->tag_update($id,$down["down_keywords"], $down["down_cid"]);
		}
		// 关联多分类及TAG相关
		if($id){
        $downall['down_id']=$id;
        $downall['down_content']=$down_content;
        $downall['down_picall']=$down_picall;
        $downall['down_name']=$down['down_name'];

		M('DownAll')->data($downall)->add();
		$search['search_status']=1;
		$search['search_name']=$down['down_name'];
		$search['search_type']=2;
		$search['search_dec']=$down['down_remark'];
		$search['search_pic']=$down['down_pic'];
		$search['search_tid']=$id;
		M('search')->add($search);
			return '软件添加成功。';
		}
		return '软件添加失败。';
    }	
	// 更新数据
	public function xml_update($down, $down_old, $mustup=false){	
		// 检测是否站长手动锁定更新
		if('mgtv' == $down_old['down_reurl']){
			return '站长手动设置，不更新。';
		}
		
		$edit = array();
		if($down['down_down1'] == $down_old['down_down1'] and  C('imgs_collect')==0 and  $down['down_down2'] == $down_old['down_down2'] and  C('upload_icon')==0){
			return '软件内容未变化，不需要更新。';
		}
		// 组合更新条件及内容(以最后一次更新的库为检测依据)
		$edit['down_content'] = $down['down_content'];
		$edit['down_id'] = $down_old['down_id'];
		
		$edit['down_name'] = $down['down_name'];
		$edit['down_reurl'] = $down['down_reurl'];
		$edit['down_down1'] = $down['down_down1'];
		$edit['down_down2'] = $down['down_down2'];
		$edit['down_down3'] = $down['down_down3'];
		$edit['down_down4'] = $down['down_down4'];
		$edit['down_down5'] = $down['down_down5'];
		$edit['down_down6'] = $down['down_down6'];
		$edit['down_remark']= $down['down_remark'];
		$edit['down_addtime'] = time();
		$img = D('Img');
		//与旧数据比较 较新的才更新		
		// 是否为强制更新资料图片等参数
		if(C('imgs_collect')){
			
			if($down['down_pic']){
			unlink("Uploads/".$down_old['down_pic']);
			$edit['down_pic'] = $img->down_load($down['down_pic'], "down_pic");
			}
			if($down['down_icon']){
			    unlink("Uploads/".$down_old['down_icon']);
			$edit['down_icon'] = $img->down_load($down['down_icon'], "down_icon");
			}
		}
		    
		 if(C('upload_icon')){
		    
		    if($down['down_icon']){
		     unlink("Uploads/".$down_old['down_icon']);
		         
			$edit['down_icon'] = $img->down_load($down['down_icon'], "down_icon");
			
			}
		  }
		  
		
	   
			//&& C('imgs_collect')
	    if(!empty($down["down_content"])) {
			$down_content = gxl_news_img_array($down["down_content"], 1);
		
			if ((C("upload_http") && !empty($down_content)) || (C("upload_http_news") && !empty($down_content))) {
			
	
				if (!!$path = getarraypic($down_content)) {
					$savePath = $img->down_load($path,"down");
			
				
					foreach($savePath as $k=>$v){
						
						if(!$savePath[$k]){
							$savePath[$k]='/Public/code/img/iconds.jpg';
							
						}
						
					}
					
					$edit['down_content']= str_ireplace($path, $savePath, $down_content);
				
			
				}
				else {
					$edit['down_content'];
				}
			}
			else {
				$edit['down_content'];
			}
		}
		else {
			$edit['down_content'];
		}
		if(!empty($down["down_picall"])) {
			$down_picall = gxl_news_img_array($down["down_picall"], 1);
		
			if ((C("upload_http") && !empty($down_picall)) || (C("upload_http_news") && !empty($down_picall))) {
			
	
				if (!!$path = getarraypic($down_picall)) {
					$savePath = $img->down_load($path,"down");
			
				
					foreach($savePath as $k=>$v){
						
						if(!$savePath[$k]){
							$savePath[$k]='/Public/code/img/iconds.jpg';
							
						}
						
					}
					
					$edit['down_picall']= str_ireplace($path, $savePath, $down_picall);
				
			
				}
				else {
					$edit['down_picall'];
				}
			}
			else {
				$edit['down_picall'];
			}
		}
		else {
			$edit['down_picall'];
		}
		
		// 更新数据
		$down_content=$edit['down_content'];
		unset($edit['down_content']);
		$down_picall=$edit['down_picall'];
		unset($edit['down_picall']);
		
		M('Down')->where(array('down_id'=>$edit['down_id']))->data($edit)->save();
        $downall['down_content']=$down_content;
        $downall['down_picall']=$down_picall;
        $downall['down_name']=$edit['down_name'];
        M('DownAll')->where(array('down_id'=>$edit['down_id']))->data($downall)->save();
        	$search['search_name']=$edit['news_name'];
		$search['search_type']=1;
		$search['search_pic']=$edit['news_pic'];
		M('search')->where(array('search_tid'=>$edit['down_id'],'search_type'=>2))->data($search)->save();
		//删除数据缓存
		if(C('cache_page_down')){
			S('cache_page_down_'.$down_old['down_id'],NULL);
		}
		return '软件已更新。';
	}		
				
}
?>