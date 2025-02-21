<?php
namespace Admin\Action;
use Common\Action\BaseAction;
class GetAction extends BaseAction
{
	public function mingxing()
	{
		$co = new \Org\Net\Curl();
		$url = $_POST["url"];
		$urlarray = explode(",", C("api_jiekou"));
		$c = count($urlarray) - 1;
		$i = rand(0, $c);
		$u = $urlarray[$i] . "/jiekou/minxing.php";
		$data = $co->get($u, array("url" => $url));
		$d = json_decode($data, true);
		$info["letter"] = trim(getfirstchar($d["name"]));
		$info["pyname"] = trim(starletters($d["name"]));
		$info["im"] = trim($d["im"]);
		$info["name"] = trim($d["name"]);
		$info["xb"] = trim($d["xb"]);
		$info["area"] = trim($d["area"]);
		$info["xx"] = trim($d["xx"]);
		$info["zy"] = trim($d["zy"]);
		$info["sg"] = trim($d["sg"]);
		$info["xz"] = trim($d["xz"]);
		$info["cstime"] = trim($d["cstime"]);
		$info["csd"] = trim($d["csd"]);
		$info["content"] = trim($d["content"]);
		echo json_encode($info);
	}

	public function seo()
	{
		$co = new \Org\Net\Curl();
		$name = $_POST["name"];
		$k = C("keywords_p");
		$urlarray = explode(",", C("api_jiekou"));
		$c = count($urlarray) - 1;
		$i = rand(0, $c);
		$u = $urlarray[$i] . "/jiekou/seo.php";
		$data = $co->get($u, array("name" => $name, "k" => $k));
		$d = json_decode($data, true);

		if (!empty($d)) {
			echo json_encode($d);
		}
		else {
			return false;
		}
	}

	public function juqing()
	{
		$co = new \Org\Net\Curl();
	  $u = 'http://v.baidu.com/tv_intro/?dtype=tvEpisodeIntro&service=json&id='.$_POST["url"];
	  $get = $co->get($u);
		$array = object_array(json_decode($get));
    $i = 0;
    $data = array_chunk(array_multi2single($array),5);
    $vod['cont'] = '0';
    $vod['title'] = 'µÚ'.count($data).'¼¯';
    $vod['page'] = count($data);
    $vod['status'] = count($data);
    //$info = array();
    for($i=0; $i<count($data); $i++){
	     $info[$i] = str_replace($data[$i][0], '', $data[$i][1]).'@@@@'.$data[$i][3];
    }
    $vod['info'] = implode("||", $info);
    //print_r($vod);
    echo json_encode($vod);
	}
}


