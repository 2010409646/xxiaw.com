<?php
namespace Plus\Action;
use Common\Action\HomeAction;
class SearchAction extends HomeAction{
	public function vod(){
		$wd = trim($_GET['q']);
		$where = array();
		$search['vod_name'] = array('like','%'.$wd.'%');
		$search['vod_actor']   = array('like','%'.$wd.'%');
		$search['vod_director']= array('like','%'.$wd.'%');
		$search['vod_letters']= array('like',$wd.'%');	
		$search['_logic'] = 'or';
		$where['_complex'] = $search;	
		$rs = D('Vod');
		//搜索跳转
        $list = $rs->field('vod_name,vod_id,vod_cid,vod_jumpurl,vod_title,vod_letters')->where($where)->limit(10)->order('vod_hits_month desc')->select();
		$count = $rs->where($where)->count('vod_id');
		if($list){
			$lists['info']   =   "ok";
            $lists['status'] =   1;
			foreach($list as $key=>$val){
			   $lists['data'][$key]['vod_name'] =$val['vod_name'].'<em>/</em>'.$val['vod_title'] ;
	           $lists['data'][$key]['vod_url'] = ff_data_url('vod',$val['vod_id'],$val['vod_cid'],$val['vod_name'],1,"",$val['vod_letters']);
			}
			$this->ajaxReturn($lists);
		}else{
			$lists['info']   =   "ok";
            $lists['status'] =   0;
			$this->ajaxReturn($lists);
		}
	}
}
?>