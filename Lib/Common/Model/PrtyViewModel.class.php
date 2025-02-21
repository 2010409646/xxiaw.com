<?php
namespace Common\Model;
use Think\Model\ViewModel;
class PrtyViewModel extends ViewModel
{
	protected $viewFields = array(
		"Prty" => array(0 => "*", "prty_cid" => "vod_prty_id"),
		"Vod"  => array(0 => "*", "_on" => "Prty.prty_id  = Vod.vod_id")
		);
}


