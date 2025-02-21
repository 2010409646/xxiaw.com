<?php

namespace Common\Model;

use Think\Model\ViewModel;

class ActorsViewModel extends ViewModel
{
	protected $viewFields = array(
		"Actors" => array(0 => "*", "Actors_name" => "vod_actors_name"),
		"Vod"    => array(0 => "*", "_on" => "Actors.actors_id  = Vod.vod_id")
		);
}


