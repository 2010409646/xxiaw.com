<?php
namespace Common\Model;
use Think\Model\ViewModel;
class TopicnewsViewModel extends ViewModel
{
	protected $viewFields = array(
		"Topic" => array(0 => "*", "topic_did" => "news_topic_did"),
		"News"  => array(0 => "*", "_on" => "Topic.topic_did = News.news_id")
		);
}


