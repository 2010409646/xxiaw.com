<?php
namespace Home\Action;
use Common\Action\HomeAction;
class TagAction extends HomeAction{
    public function vod(){
		$this->tagall('vod');
		$this->display('gxl_vodtag');
    }
    public function news(){
		$this->tagall('news');
		$this->display('gxl_newstag');
    }
	public function tagall($sidname = 'vod'){
		//通过地址栏参数支持筛选条件,$JumpUrl传递分页及跳转参数
		$Url = gxl_param_url();
		$JumpUrl = gxl_param_jump($Url);
		$sidname=$JumpUrl['type'];
	
		$JumpUrl['p'] = '{!page!}';
		C('jumpurl',UU('Home-tag/'.$sidname,$JumpUrl,true,false));	
		C('currentpage',$Url['page']);
		//变量赋值
		$tag_list = $this->Lable_Tags($Url);
		
		$this->assign($tag_list);	
	}
	    public function show(){
		//通过地址栏参数支持筛选条件,$JumpUrl传递分页及跳转参数
		$dir = I("get.", "none", "strip_tags,htmlspecialchars");
		$Url = gxl_param_url();
		$JumpUrl = gxl_param_jump($Url);
	    $JumpUrl['tag_name']=$JumpUrl['name'];
	    $JumpUrl['p'] = '{!page!}';
	    $JumpUrl['mcid']=$JumpUrl['mcid']?$JumpUrl['mcid']:0;
	    $urls=UU('Home-tag/show',array('type'=>$JumpUrl['type'],'name'=>urlencode($JumpUrl['name']),'mcid'=>$JumpUrl['mcid'],'p'=>'{!page!}'),'',true,false);
	  
	    C('jumpurl',$urls);
	    C('currentpage',$Url['page']);
		$this->assign($JumpUrl);
		$this->display('gxl_tag_'.$JumpUrl['type'].'list');
    }
}
?>