<?php

namespace Common\Model;
use Think\Model\ViewModel;
class ActorViewModel extends ViewModel
{
	protected $viewFields = array(
		"Actor" => array(0 => "*", "Actor_id" => "vod_actor_id", "actor_vid" => "vod_actor_vid"),
		"Vod"   => array(0 => "*", "_on" => "Actor.actor_vid  = Vod.vod_id")
		);
}


