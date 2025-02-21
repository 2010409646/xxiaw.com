<?php
namespace Home\Action;
use Common\Action\HomeAction;
class AjaxAction extends HomeAction
{
	public function index()
	{
// 禁用 PHP 输出缓冲区
if (ob_get_level()) {
    ob_end_clean();  // 清除当前缓冲区
}
ob_implicit_flush(true); // 开启隐式刷新

$apiUrl = 'https://api.deepseek.com/chat/completions';
$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer sk-6e64277dc7554ac3b92d25fc318ec03f' // 替换为实际API密钥
];

$postData = [
    "model" => "deepseek-chat",
    "messages" => [
        ["role" => "system", "content" => "You are a helpful assistant."],
        ["role" => "user", "content" => "你好!"]
    ],
    "stream" => true
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);

// 处理流式数据
$handleStream = function ($ch, $data) {
    static $buffer = '';
    $buffer .= $data;
    // 按换行符分割处理每一行
    while (($pos = strpos($buffer, "\n")) !== false) {
        $line = substr($buffer, 0, $pos);
        $buffer = substr($buffer, $pos + 1);
        if (trim($line) === '') continue;
        
        // 去除多余的 "data:"，只保留一个
        $line = preg_replace('/^data:\s*/', '', $line);
        
        // 确保每条数据都被发送
        echo "data: $line\n\n"; // 发送数据
        ob_flush();  // 强制清空输出缓冲区
        flush();     // 强制刷新缓冲区，立即发送到浏览器
    }
    return strlen($data);
};
curl_setopt($ch, CURLOPT_WRITEFUNCTION, $handleStream);

// 设置SSE头
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Connection: keep-alive');

// CORS 头部支持跨域（如果有跨域需求）
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// 执行请求
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo "data: " . json_encode(['error' => curl_error($ch)]) . "\n\n";
    ob_flush();  // 确保错误也能被刷新到浏览器
    flush();     // 强制刷新错误数据
}
curl_close($ch);

// 调试输出响应内容（可选）
//var_dump($response);

	}

}


