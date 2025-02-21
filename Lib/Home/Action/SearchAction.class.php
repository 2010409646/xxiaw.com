<?php
namespace Home\Action;
use Common\Action\HomeAction;
class SearchAction extends HomeAction{

	public function ajaxsearch(){
		$wd = I('get.wd','','strip_tags,htmlspecialchars');
		if(isset($wd)){
			$where['vod_status'] = array('eq',1);
			$search['vod_name']   = array('like','%'.$wd.'%');
			$search['vod_actor']   = array('like','%'.$wd.'%');
			$search['vod_director']= array('like','%'.$wd.'%');
			$search['vod_letters']= array('like','%'.$wd.'%');	
			$search['_logic'] = 'or';
			$where['_complex']= $search;
			$rs = M('Vod');
			$count = $rs->where($where)->count();
			$list = $rs->where($where)->field('vod_id,vod_cid,vod_name,vod_title,vod_letters')->limit(10)->select();
			
			if($count<= 0){
				$r = "<ul><li><a>未匹配到相关记录</a></li></ul>";
			}else{
				$r = "<ul>";
				foreach($list as $row){
					$r .= '<li><a href="'.gxl_data_url('vod',$row['vod_id'],$row['vod_cid'],$row['vod_name'],1,"",$row['vod_letters']).'"  title="'.$row['vod_name'].'" target="_blank">'.get_hilight($row['vod_name'],$wd).'<em>/</em>'.$row['vod_title'].'</a></li>';
				}
				$r.='<li><a class="tj" href="'.UU('Home-vod/search',array('wd'=>urlencode(trim($wd))),true,false).'" target="_blank">共找到<span>'.$count.'</span>条与<span>"'.$wd.'"</span> 的相关结果,点击查看全部相关信息。</a></li>';
				$r.='</ul>';
				
				
			}
			echo $r;			
		}
	}
}
?>