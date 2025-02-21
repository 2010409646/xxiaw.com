<?php
namespace Common\Model;
use Think\Model\ViewModel;
class McidViewModel extends ViewModel
{
	protected $viewFields = array(
		"Mcid" => array(0 => "*", "mcid_id" => "vod_mcid_id", "mcid_mid" => "vod_mcid_mid"),
		"Vod"  => array(0 => "*", "_on" => "Mcid.mcid_id  = Vod.vod_id")
		);
}


