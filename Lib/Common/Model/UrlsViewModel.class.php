<?php
namespace Common\Model;
use Think\Model\ViewModel;
class UrlsViewModel extends ViewModel
{
	protected $viewFields = array(
		"Urls" => array(0 => "*", "vod_id" => "urls_vod_id"),
		"Vod"  => array(0 => "*", "_on" => "Urls.vod_id  = Vod.vod_id")
		);
}


