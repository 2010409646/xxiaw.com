<?php
namespace Admin\Action;
use Common\Action\BaseAction;
class SlideAction extends BaseAction{	
	// 显示幻灯
    public function show(){
	    $rs = D("Slide");
		//更新前台缓存
		$field = C('db_prefix').'news.news_id,'.C('db_prefix').'news.news_name,'.C('db_prefix').'news.news_cid,'.C('db_prefix').'news.news_letters,'.C('db_prefix').'news.news_pic,'.C('db_prefix').'news.news_title,'.C('db_prefix').'news.news_addtime,'.C('db_prefix').'news.news_continu,'.C('db_prefix').'news.news_jumpurl,'.C('db_prefix').'news.news_diantai,'.C('db_prefix').'news.news_tvcont,'.C('db_prefix').'news.news_content,'.C('db_prefix').'news.news_actor,'.C('db_prefix').'news.news_year,'.C('db_prefix').'slide.*' ;
		$news = 'left join '.C('db_prefix').'news on '. C('db_prefix').'slide.slide_vid = '.C('db_prefix').'news.news_id' ;
		$list = $rs->field($field)->where('slide_status = 1')->join($news)->order('slide_oid asc')->select();
		if($list){
			foreach($list as $key=>$val){
				$list[$key]['slide_pic'] = gxl_img_url($list[$key]['slide_pic']);
				if(!empty($list[$key]['news_id'])){
				$list[$key]['news_url'] = gxl_data_url('news',$list[$key]['news_id'],$list[$key]['news_cid'],$list[$key]['news_name'],1,$list[$key]['news_jumpurl'],$list[$key]['news_letters']);
			    $list[$key]['news_picurl'] = gxl_img_url($list[$key]['news_pic']);
			  }
			}
			F('_gxlnews/slide',$list);
		}
		//后台展示
		$list = $rs->order('slide_cid asc,slide_oid asc')->select();
		foreach($list as $key=>$val){
			$list[$key]['slide_pic'] = gxl_img_url($list[$key]['slide_pic']);	
		}
		$this->assign('list_slide',$list);
		$this->display('./Public/system/slide_show.html');
    }
	// 添加与编辑幻灯
    public function add(){
		$id = intval($_GET['id']);
	    $rs = D("Slide");
		if ($id>0) {
            $where['slide_id'] = $id;
			$list = $rs->where($where)->find();
			$list['tpltitle'] = '编辑';
		}else{
		    $list['slide_oid'] = $rs->max('slide_oid')+1;
			$list['slide_status'] = 1;
			$list['tpltitle'] = '添加';
		}
		$this->assign($list);
		$this->display('./Public/system/slide_add.html');
    }
	// 添加幻灯片并写入数据库
	public function insert(){
		$rs = D("Slide");
		if ($rs->create()) {
			if ( false !==  $rs->add() ) {
				redirect('?s=Admin-Slide-Show');
			}else{
				$this->error('添加幻灯失败');
			}
		}else{
		    $this->error($rs->getError());
		}		
	}	
	// 更新幻灯片
	public function update(){
		$rs = D("Slide");
		if ($rs->create()) {
			$list = $rs->save();
			if ($list !== false) {
			    redirect('?s=Admin-Slide-Show');
			}else{
				$this->error("更新幻灯失败！");
			}
		}else{
			$this->error($rs->getError());
		}
	}
	// 隐藏与显示幻灯
    public function status(){
		$where['slide_id'] = $_GET['id'];
		$rs = D("Slide");
		if (intval($_GET['sid'])) {
			$rs->where($where)->setField('slide_status',1);
		}else{
			$rs->where($where)->setField('slide_status',0);
		}
		$this->redirect('Admin-Slide/Show');
    }
	// 删除幻灯片
    public function del(){
		$rs = D("Slide");
		$where['slide_id'] = $_GET['id'];
		$rs->where($where)->delete();
		$this->redirect('Admin-Slide/Show');
    }								
}
?>