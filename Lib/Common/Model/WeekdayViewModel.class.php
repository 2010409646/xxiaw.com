<?php
namespace Common\Model;
use Think\Model\ViewModel;
class WeekdayViewModel extends ViewModel
{
	protected $viewFields = array(
		"Weekday" => array(0 => "*", "weekday_cid" => "vod_weekday_id"),
		"Vod"     => array(0 => "*", "_on" => "Weekday.weekday_id  = Vod.vod_id")
		);
}


