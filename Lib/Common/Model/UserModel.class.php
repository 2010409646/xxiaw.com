<?php
namespace Common\Model;
use Think\Model;
class UserModel extends Model
{
	public function checkunique($where)
	{
		$rs = M("User");
		$list = $rs->where($where)->find();

		if (NULL == $list) {
			return true;
		}

		return false;
	}
	public function getGuanzhuTotal($where)
	{
		$rs = M("Guanzhu");
		$join = " inner join " . C("db_prefix") . "zbdong on  " . C("db_prefix") . "guanzhu.userid= " . C("db_prefix") . "zbdong.userid ";
		$i=$rs->where($where)->select();	
		
		}	
	public function getmember($where)
	{
		$rs = M("User");
		$member = $rs->where($where)->find();

		if (NULL == $member) {
			return NULL;
		}

		return $member;
	}

	public function getmemberdetail($where)
	{
		$detail = M("User_detail");
		$member = $detail->where($where)->find();

		if (NULL == $member) {
			return NULL;
		}

		return $member;
	}

	public function updatetmemberlogin($logininfo, $userid)
	{
		$rs = D("User");
		$rs->where(array("userid" => $userid))->setInc("loginnum");
		return $rs->where(array("userid" => $userid))->save($logininfo);
	}

	public function updatetmemberdetailinfo($memberinfo, $userid)
	{
		$detail = M("User_detail");
		$where = array("userid" => $userid);
		unset($memberinfo["nickname"]);

		if (0 < $detail->where($where)->count()) {
			return $detail->where($where)->save($memberinfo);
		}
		else {
			$memberinfo["userid"] = $userid;
			return $detail->add($memberinfo);
		}
	}

	public function getVisitlove($userid, $pager)
	{
		$rs = D("Down");
		$order = C("db_prefix") . "down.down_addtime desc";
		$join = C("db_prefix") . "favorite on " . C("db_prefix") . "favorite.down_id = " . C("db_prefix") . "down.down_id ";
		$where = C("db_prefix") . "favorite.user_id = " . $userid;
		$field = C("db_prefix") . "down.down_id," . C("db_prefix") . "down.down_name," . C("db_prefix") . "down.down_cid," . C("db_prefix") . "down.down_letter," . C("db_prefix") . "down.down_pic," . C("db_prefix") . "down.down_title," . C("db_prefix") . "down.down_addtime," . C("db_prefix") . "down.down_gold," . C("db_prefix") . "down.down_anchor," . C("db_prefix") . "favorite.down_cid as pid";
		$list = $rs->field($field)->join($join)->where($where)->order($order)->limit($pager["limit"])->page($pager["currentpage"])->select();
		return $list;
	}
    	public function isFavoriteVod($where)
	{
		$rs = M("Favorite");
		$count = $rs->where($where)->count();
		return 0 < $count ? true : false;
	}

	public function isRemindVod($where)
	{
		$rs = M("Remind");
		$count = $rs->where($where)->count();
		return 0 < $count ? true : false;
	}


	public function getRemindTotal($userid, $catalog)
	{
		$rs = D("Down");
		$join = C("db_prefix") . "remind on " . C("db_prefix") . "remind.down_id = " . C("db_prefix") . "down.down_id ";
		$where = C("db_prefix") . "remind.user_id = " . $userid;

		if (!empty($catalog)) {
			$where = $where . " and " . C("db_prefix") . "remind.down_cid = " . $catalog;
		}
		$field = C("db_prefix") . "down.down_id," . C("db_prefix") . "down.down_name," . C("db_prefix") . "down.down_cid," . C("db_prefix") . "down.down_letter," . C("db_prefix") . "down.down_pic," . C("db_prefix") . "down.down_title," . C("db_prefix") . "down.down_addtime," . C("db_prefix") . "down.down_gold," . C("db_prefix") . "down.down_anchor," . C("db_prefix") . "remind.down_cid as pid";
		$list = $rs->field($field)->join($join)->where($where)->count();
		return $list;
	}

	public function getRemindList($userid, $catalog, $pager)
	
	
	
	{
		$rs = D("Down");
		$order = C("db_prefix") . "down.down_addtime desc";
		$join = C("db_prefix") . "remind on " . C("db_prefix") . "remind.down_id = " . C("db_prefix") . "down.down_id ";
		$where = C("db_prefix") . "remind.user_id = " . $userid;

		if (!empty($catalog)) {
			$where = $where . " and " . C("db_prefix") . "remind.down_cid = " . $catalog;
		}

		$field = C("db_prefix") . "down.down_id," . C("db_prefix") . "down.down_name," . C("db_prefix") . "down.down_cid," . C("db_prefix") . "down.down_letter," . C("db_prefix") . "down.down_pic," . C("db_prefix") . "down.down_title," . C("db_prefix") . "down.down_addtime," . C("db_prefix") . "down.down_gold," . C("db_prefix") . "down.down_anchor," . C("db_prefix") . "remind.down_cdate," . C("db_prefix") . "remind.down_cid as pid";
		$list = $rs->field($field)->join($join)->where($where)->order($order)->limit($pager["limit"])->page($pager["currentpage"])->select();
		return $list;
	}

	public function getVisitRemind($userid, $pager)
	{
		$rs = D("Down");
		$order = C("db_prefix") . "remind.cdate desc";
		$join = C("db_prefix") . "remind on " . C("db_prefix") . "remind.down_id = " . C("db_prefix") . "down.down_id ";
		$where = C("db_prefix") . "remind.user_id = " . $userid;
		$field = C("db_prefix") . "down.down_id," . C("db_prefix") . "down.down_name," . C("db_prefix") . "down.down_cid," . C("db_prefix") . "down.down_letter," . C("db_prefix") . "down.down_pic," . C("db_prefix") . "down.down_title," . C("db_prefix") . "down.down_addtime," . C("db_prefix") . "down.down_gold," . C("db_prefix") . "down.down_anchor," . C("db_prefix") . "remind.down_cid as pid";
		$list = $rs->field($field)->join($join)->where($where)->order($order)->limit($pager["limit"])->page($pager["currentpage"])->select();
		return $list;
	}

	public function getCatalogs($userid)
	{
		$rs = D("List");
		$order = C("db_prefix") . "favorite.cdate desc";
		$join = " inner join " . C("db_prefix") . "favorite on " . C("db_prefix") . "favorite.down_cid = " . C("db_prefix") . "list.list_id ";
		$where = C("db_prefix") . "favorite.user_id = " . $userid;
		$field = "list_name,list_id";
		$list = $rs->field($field)->join($join)->where($where)->order($order)->select();
		$downNumArray = array();

		foreach ($list as $key => $value ) {
			if (is_array($value)) {
				$key = $value["list_id"];

				if ($downNumArray[$key]) {
					$downNumArray[$key]["count"] += 1;
				}
				else {
					$downNumArray[$key] = array("id" => $key, "name" => $value["list_name"], "count" => 1);
				}
			}
		}

		return $downNumArray;
	}
	

	public function getRemindCatalogs($userid)
	{
		$rs = D("List");
		$order = C("db_prefix") . "remind.cdate desc";
		$join = " left join " . C("db_prefix") . "remind on " . C("db_prefix") . "remind.down_cid = " . C("db_prefix") . "list.list_id ";
		$where = C("db_prefix") . "remind.user_id = " . $userid;
		$field = "list_name,list_id";
		$list = $rs->field($field)->join($join)->where($where)->order($order)->select();
		$downNumArray = array();

		foreach ($list as $key => $value ) {
			if (is_array($value)) {
				$key = $value["list_id"];

				if ($downNumArray[$key]) {
					$downNumArray[$key]["count"] += 1;
				}
				else {
					$downNumArray[$key] = array("id" => $key, "name" => $value["list_name"], "count" => 1);
				}
			}
		}

		return $downNumArray;
	}

	public function getFavoritList($userid, $catalog, $pager)
	{
		$rs = D("Down");
		$order = C("db_prefix") . "down.down_addtime desc";
		$join = C("db_prefix") . "favorite on " . C("db_prefix") . "favorite.down_id = " . C("db_prefix") . "down.down_id ";
		$where = C("db_prefix") . "favorite.user_id = " . $userid;

		if (!empty($catalog)) {
			$where = $where . " and " . C("db_prefix") . "favorite.down_cid = " . $catalog;
		}

		$field = C("db_prefix") . "down.down_id," . C("db_prefix") . "down.down_name," . C("db_prefix") . "down.down_cid," . C("db_prefix") . "down.down_letter," . C("db_prefix") . "down.down_pic," . C("db_prefix") . "down.down_title," . C("db_prefix") . "down.down_addtime," . C("db_prefix") . "down.down_gold,"  .C("db_prefix") . "favorite.down_cid as pid";
		$list = $rs->field($field)->join($join)->where($where)->order($order)->limit($pager["limit"])->page($pager["currentpage"])->select();
		return $list;
	}

		public function getUserList($userid, $catalog, $pager)
	{
		$rs = D("Jquery");
		$field='jquery_id,jquery_name,jquery_cid,jquery_letter,jquery_status,jquery_pic,jquery_title,jquery_addtime,jquery_gold,jquery_cid as pid';
		$where['jquery_input']=$userid;
		$order='jquery_addtime desc';
		$list = $rs->field($field)->where($where)->order($order)->limit($pager["limit"])->page($pager["currentpage"])->select();
		return $list;
	}
	
	
	public function getFavoritTotal($userid, $catalog)
	{
		$rs = D("Down");
		$join = C("db_prefix") . "favorite on " . C("db_prefix") . "favorite.down_id = " . C("db_prefix") . "down.down_id ";
		$where = C("db_prefix") . "favorite.user_id = " . $userid;

		if (!empty($catalog)) {
			$where = $where . " and " . C("db_prefix") . "favorite.down_cid = " . $catalog;
		}

		$field = C("db_prefix") . "down.down_id," . C("db_prefix") . "down.down_name," . C("db_prefix") . "down.down_cid," . C("db_prefix") . "down.down_letter," . C("db_prefix") . "down.down_pic," . C("db_prefix") . "down.down_title," . C("db_prefix") . "down.down_addtime," . C("db_prefix") . "down.down_gold," . C("db_prefix")."favorite.down_cid as pid";
		$list = $rs->field($field)->join($join)->where($where)->count();
		
		return $list;
	}
		public function getuser($userid, $catalog)
	{
		$rs = D("Jquery");
	
		$where= array('jquery_input'=>$userid);
		
		$list = $rs->where($where)->count();
	
		return $list;
	}
	//资讯
	public function article($userid, $catalog)
	{
		$rs = D("News");
	
		$where= array('news_input'=>$userid);
		
		$list = $rs->where($where)->count();
	
		return $list;
	}
	
		public function articleList($userid, $catalog, $pager)
	{
		$rs = D("News");
		$field='news_id,news_name,news_cid,news_letter,news_status,news_pic,news_addtime,news_gold,news_cid as pid';
		$where['news_input']=$userid;
		$order='news_addtime desc';
		$list = $rs->field($field)->where($where)->order($order)->limit($pager["limit"])->page($pager["currentpage"])->select();
		return $list;
	}
	
	
	public function getLoveDatas($userid)
	{
		$rs = D("Down");
		$order =  C("db_prefix") . "down.down_addtime desc ";
		$join = " inner join ( select b.down_id,count(b.down_id) as fnum from " . C("db_prefix") . "favorite b where not exists(select down_id from " . C("db_prefix") . "favorite c where user_id = " . $userid . " and b.down_id = c.down_id ) group by b.down_id ) a  on " . C("db_prefix") . "down.down_id = a.down_id";
		$where = C("db_prefix") . "favorite.user_id = " . $userid;
		$field = C("db_prefix") . "down.down_id," . C("db_prefix") . "down.down_name," . C("db_prefix") . "down.down_cid," . C("db_prefix") . "down.down_pic," . C("db_prefix") . "down.down_title," . C("db_prefix") . "down.down_addtime," . C("db_prefix") . "down.down_gold";
		
		$list = $rs->field($field)->order($order)->limit("10")->select();
		
		return $list;
	}

	public function getRemindDatas($userid)
	{

		$rs = D("Down");
		$order =  C("db_prefix") . "down.down_addtime desc ";
		$join = " left join ( select b.down_id,count(b.down_id) as fnum from " . C("db_prefix") . "remind b where not exists(select down_id from " . C("db_prefix") . "remind c where user_id = " . $userid . " and b.down_id = c.down_id ) group by b.down_id ) a  on " . C("db_prefix") . "down.down_id = a.down_id";
	
		$where = C("db_prefix")."remind.user_id=".$userid;
		$field = C("db_prefix") . "down.down_id," . C("db_prefix") . "down.down_name," . C("db_prefix") . "down.down_cid," . C("db_prefix") . "down.down_letter," . C("db_prefix") . "down.down_pic," . C("db_prefix") . "down.down_title," . C("db_prefix") . "down.down_addtime," . C("db_prefix") . "down.down_gold," . C("db_prefix") . "down.down_anchor" ;
		$list = $rs->order($order)->join($join)->field($field)->limit("10")->select();
		return $list;
	}

	public function getcomms($where, $pager)
	{
		$rs = D("comment");
		$order = C("db_prefix") . "comment.creat_at desc ";
		$join = " inner join " . C("db_prefix") . "down on  " . C("db_prefix") . "comment.down_id= " . C("db_prefix") . "down.down_id ";
		$field = C("db_prefix") . "comment.comment_id," . C("db_prefix") . "comment.content," . C("db_prefix") . "comment.support," . C("db_prefix") . "comment.oppose," . C("db_prefix") . "comment.ispass," . C("db_prefix") . "comment.pid," . C("db_prefix") . "comment.reply," . C("db_prefix") . "comment.creat_at," . C("db_prefix") . "down.down_id," . C("db_prefix") . "down.down_name," . C("db_prefix") . "down.down_cid," . C("db_prefix") . "down.down_letter," . C("db_prefix") . "down.down_pic," . C("db_prefix") . "down.down_title," . C("db_prefix") . "down.down_addtime," . C("db_prefix") . "down.down_gold," . C("db_prefix") . "down.down_anchor," ;
		$list = $rs->where($where)->order($order)->limit($pager["limit"])->page($pager["currentpage"])->select();
		return $list;
	}

	public function Getvisitors($uid, $limit)
	{
		$rs = M("Visitors");
		$order = C("db_prefix") . "visitors.visitorsdate desc ";
		$join = " inner join " . C("db_prefix") . "user on  " . C("db_prefix") . "user.userid= " . C("db_prefix") . "visitors.userid";
		$where = C("db_prefix") . "visitors.user_id  = " . $uid;
		$field = C("db_prefix") . "visitors.*," . C("db_prefix") . "user.userid," . C("db_prefix") . "user.nickname," . C("db_prefix") . "user.username";
		$list = $rs->field($field)->join($join)->where($where)->order($order)->limit($limit)->page($pager["currentpage"])->select();
		return $list;
	}

	public function Getuserinfo($uid)
	{
		$rs = M("User");
		$join = " left join " . C("db_prefix") . "user_detail on  " . C("db_prefix") . "user.userid= " . C("db_prefix") . "user_detail.userid";
		$where = C("db_prefix") . "user.userid  = " . $uid;
		$field = C("db_prefix") . "user_detail.*," . C("db_prefix") . "user.userid," . C("db_prefix") . "user.username," . C("db_prefix") . "user.nickname," . C("db_prefix") . "user.regdate," . C("db_prefix") . "user.lastdate," . C("db_prefix") . "user.avatar," . C("db_prefix") . "user.avatar_img";
		$list = $rs->field($field)->join($join)->where($where)->find();
		return $list;
	}

	public function getdownid($id)
	{
		$rs = M("Down");
		$where = C("db_prefix") . "down.down_id  = " . $id;
		$field = C("db_prefix") . "down.down_id," . C("db_prefix") . "down.down_letter," . C("db_prefix") . "down.down_play," . C("db_prefix") . "down.down_url," . C("db_prefix") . "down.down_name," . C("db_prefix") . "down.down_cid," . C("db_prefix") . "down.down_jumpurl";
		$list = $rs->field($field)->where($where)->find();
		return $list;
	}

	public function getemail($down_id)
	{
		$rs = M("Remind");
		$join = " left join " . C("db_prefix") . "user on  " . C("db_prefix") . "user.userid = " . C("db_prefix") . "remind.user_id ";
		$where = C("db_prefix") . "remind.down_id = " . $down_id . " and " . C("db_prefix") . "user.isRemind = 1 ";
		$field = C("db_prefix") . "user.nickname," . C("db_prefix") . "user.userid," . C("db_prefix") . "user.iemail," . C("db_prefix") . "user.email";
		$list = $rs->field($field)->join($join)->where($where)->select();
		return $list;
	}

	public function getstation($down_id)
	{
		$rs = M("Remind");
		$join = " left join " . C("db_prefix") . "user on  " . C("db_prefix") . "user.userid = " . C("db_prefix") . "remind.user_id ";
		$where = C("db_prefix") . "remind.down_id = " . $down_id . " and " . C("db_prefix") . "user.isstation = 1 ";
		$field = C("db_prefix") . "remind.*," . C("db_prefix") . "user.userid";
		$list = $rs->field($field)->join($join)->where($where)->select();
		return $list;
	}

	public function getCommsTotal($where)
	{
		$rs = D("comment");
		$join = " inner join " . C("db_prefix") . "down on  " . C("db_prefix") . "comment.down_id= " . C("db_prefix") . "down.down_id ";
		return $rs->join($join)->where($where)->count();
	}


	public function saveComment($comment)
	{

		$rs = D("comment");
				//print_r($rs);die();
		$uid = $rs->add($comment);
		//print_r($comment);
		return 0 < $uid ? true : false;
	}

	public function getPublicComments($where, $pager)
	{
		$rs = D("comment");
		$field = C("db_prefix") . "comment.comment_id," . C("db_prefix") . "comment.content," . C("db_prefix") . "comment.creat_at," . C("db_prefix") . "comment.userid," . C("db_prefix") . "comment.support," . C("db_prefix") . "comment.oppose," . C("db_prefix") . "user.avatar_img," . C("db_prefix") . "user.nickname," . C("db_prefix") . "comment.pid," . C("db_prefix") . "comment.reply";
		$join = "left join " . C("db_prefix") . "user on  " . C("db_prefix") . "comment.userid= " . C("db_prefix") . "user.uid ";
		$list = $rs->field($field)->join($join)->where($where)->order("creat_at desc ")->limit($pager["limit"])->page($pager["currentpage"])->select();
	
		return $list;
	}

	public function gethComments($pid)
	{
		$rs = D("comment");
		$order = C("db_prefix") . "comment.creat_at  desc";
		$field = C("db_prefix") . "comment.comment_id," . C("db_prefix") . "comment.content," . C("db_prefix") . "comment.creat_at," . C("db_prefix") . "comment.userid," . C("db_prefix") . "comment.support," . C("db_prefix") . "comment.oppose," . C("db_prefix") . "user.avatar," . C("db_prefix") . "user.nickname," . C("db_prefix") . "comment.pid," . C("db_prefix") . "comment.reply";
		$join = " inner join " . C("db_prefix") . "user on  " . C("db_prefix") . "comment.userid= " . C("db_prefix") . "user.userid ";
		$where = C("db_prefix") . "comment.pid  = " . $pid;
		$listt = $rs->field($field)->join($join)->where($where)->order($order)->limit($pager["limit"])->page($pager["currentpage"])->select();
		return $listt;
	}

	public function getPublicCommentTotal($where)
	{
		$rs = M("comment");
		return $rs->where($where)->count("comment_id");
	}

	public function getMark($down_id)
	{
		$rs = M("Down_mark");
		$field = "sum(F1) as F1 ,sum(F2) as F2 ,sum(F3) as F3 ,sum(F4) as F4 ,sum(F5) as F5";
		return $rs->field($field)->where(array("down_id" => $down_id))->find();
	}

	public function getMarkValue($down_id, $ip)
	{
		$rs = M("Down_mark");
		$data = $rs->field("F1,F2,F3,F4,F5")->where(array("ip" => $ip, "down_id" => $down_id))->find();
		$value = -1;

		if ($data != null) {
			if ($data["F1"] == 1) {
				$value = 1;
			}
			else if ($data["F2"] == 1) {
				$value = 2;
			}
			else if ($data["F3"] == 1) {
				$value = 3;
			}
			else if ($data["F4"] == 1) {
				$value = 4;
			}
			else if ($data["F5"] == 1) {
				$value = 5;
			}
		}

		return $value;
	}

	public function isFavoriteDown($where)
	{
		$rs = M("Favorite");
		$count = $rs->where($where)->count();
		return 0 < $count ? true : false;
	}
	public function userguanzhu($where)
	{
		$rs = M("Guanzhu");
		$count = $rs->where($where)->count();
		return 0 < $count ? true : false;
	}

	public function isRemindDown($where)
	{
		$rs = M("Remind");
		$count = $rs->where($where)->count();
		return 0 < $count ? true : false;
	}

	public function getCommentById($comment_id)
	{
		$rs = M("comment");
		$join = " left join " . C("db_prefix") . "user on  " . C("db_prefix") . "comment.userid= " . C("db_prefix") . "user.userid";
		$where = C("db_prefix") . "comment.comment_id  = " . $comment_id;
		$field = C("db_prefix") . "user.nickname," . C("db_prefix") . "user.userid," . C("db_prefix") . "comment.content";
		$list = $rs->field($field)->join($join)->where($where)->find();
		return $list;
	}

	public function getPlayLogTotal($userid)
	{
		$rs = M("Playlog");
		$join = " inner join " . C("db_prefix") . "down on  " . C("db_prefix") . "playlog.down_id= " . C("db_prefix") . "down.down_id ";
		$where = C("db_prefix") . "playlog.userid = " . $this->userid;
		$count = $rs->join($join)->where($where)->count();
		return $count;
	}

	public function getPlayLogs($where, $pager)
	{
		$rs = M("Playlog");
		$order = C("db_prefix") . "playlog.creat_time desc ";
		$join = " inner join " . C("db_prefix") . "down on  " . C("db_prefix") . "playlog.down_id= " . C("db_prefix") . "down.down_id ";
		$where = C("db_prefix") . "playlog.userid = " . $where;
		$field = C("db_prefix") . "playlog.*," . C("db_prefix") . "down.down_cid," . C("db_prefix") . "down.down_jumpurl," . C("db_prefix") . "down.down_letter";
		$list = $rs->field($field)->join($join)->where($where)->order($order)->limit($pager["limit"])->page($pager["currentpage"])->select();
		return $list;
	}

	public function apiplaylogs($where, $pager)
	{
		
		$rs = M("Playlog");
		$order = C("db_prefix") . "playlog.creat_time desc ";
		$join = " inner join " . C("db_prefix") . "down on  " . C("db_prefix") . "playlog.down_id= " . C("db_prefix") . "down.down_id ";
		$where = C("db_prefix") . "playlog.userid = " . $where;
		$field = C("db_prefix") . "playlog.*," . C("db_prefix") . "down.down_cid," . C("db_prefix") . "down.down_jumpurl," . C("db_prefix") . "down.down_pic," . C("db_prefix") . "down.down_content";
		$list = $rs->field($field)->join($join)->where($where)->order($order)->limit($pager["limit"])->select();
		
		return $list;
	}
	public function getmsgTotal($userid)
	{
		$rs = M("Private");
		$join = " inner join " . C("db_prefix") . "user on  " . C("db_prefix") . "private.user_id= " . C("db_prefix") . "user.userid ";
		$where = C("db_prefix") . "private.userid = " . $this->userid;
		$count = $rs->join($join)->where($where)->count();
		return $count;
	}
	public function getpaylogTotal($userid)
	{
		$rs = M("Money ");
		
		$count = $rs->where(array('userid'=>$userid))->count();
		return $count;
	}
	public function getgbTotal($userid, $catalog)
	{
		$rs = M("Guestbook");
		$where = C("db_prefix") . "guestbook.gb_uid = " . $userid;

		if (!empty($catalog)) {
			$where = $where . " and " . C("db_prefix") . "guestbook.gb_cid= " . $catalog;
		}

		$list = $rs->where($where)->count();
		return $list;
	}

	public function getgbList($userid, $catalog, $pager)
	{
		$rs = M("Guestbook");
		$order = C("db_prefix") . "guestbook.gb_addtime desc";
		$where = C("db_prefix") . "guestbook.gb_uid  = " . $userid;

		if (!empty($catalog)) {
			$where = $where . " and " . C("db_prefix") . "guestbook.gb_cid= " . $catalog;
		}

		$list = $rs->where($where)->order($order)->limit($pager["limit"])->page($pager["currentpage"])->select();
		return $list;
	}

	public function getmsgs($userid, $pager)
	{
		$rs = M("Private");
		$order = C("db_prefix") . "private.time desc ";
		$join = " inner join " . C("db_prefix") . "user on  " . C("db_prefix") . "private.user_id= " . C("db_prefix") . "user.userid ";
		$where = C("db_prefix") . "private.userid = " . $userid;
		$field = C("db_prefix") . "private.*," . C("db_prefix") . "user.userid," . C("db_prefix") . "user.nickname";
		$list = $rs->field($field)->join($join)->where($where)->order($order)->limit($pager["limit"])->page($pager["currentpage"])->select();
		return $list;
	}
	
		public function getpaylogs($userid, $pager)
	{
		$rs = M("Money");
		
		$list = $rs->where(array('userid'=>$userid))->order('id desc')->limit($pager["limit"])->page($pager["currentpage"])->select();
		return $list;
	}
}


