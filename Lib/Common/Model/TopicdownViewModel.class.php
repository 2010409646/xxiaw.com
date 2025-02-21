<?php
namespace Common\Model;
use Think\Model\ViewModel;
class TopicdownViewModel extends ViewModel
{
	protected $viewFields = array(
		"Topic" => array(0 => "*", "topic_did" => "down_topic_did"),
		"Down"  => array(0 => "*", "_on" => "Topic.topic_did = Down.down_id")
		);
}


