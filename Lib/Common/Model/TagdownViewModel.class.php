<?php
namespace Common\Model;
use Think\Model\ViewModel;
class TagdownViewModel extends ViewModel {
	//视图定义
	protected $viewFields = array (
		 'Tag'=>array('*','tag_id'=>'down_tag_id','tag_name'=>'down_tag_name'),
		 'Down'=>array('*', '_on'=>'Tag.tag_id = Down.down_id'),
	);
}
?>