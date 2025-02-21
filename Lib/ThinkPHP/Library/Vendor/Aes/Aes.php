<?php
/**
 * Created by PhpStorm.
 * User: f9410
 * Date: 2021/10/21
 * Time: 15:33
 */
 
class Aes{
 
    /**
     * @param $sstr session32
     * @param $iviv 秘钥加密盐
     * @param $iv 字符串解密盐
     * @param $encrypt 待解密字符串
     * @return string 解密后的字符串
     */
    public function decrypt($sstr, $iviv, $iv, $encrypt){
        $sPasswordKey = $this->pbkdf2($sstr, $iviv);
        return $this->opensslDecrypt($encrypt, $sPasswordKey, $iv);
    }
 
    /**
     * @param $data 待加密字符串
     * @param $sstr session32
     * @return string 加密后并拼接好的字符串
     */
    public function encrypt($data, $sstr){
 
        $sRand = '';
        for($i=0;$i<8;$i++){
            $rand = dechex(mt_rand(0x00000000, 0xffffffff) & 0xffffffff);
            $sRand .= str_pad($rand, 8, '0', STR_PAD_LEFT);
        }
 
        $iv = md5(mt_rand(0,999999999));
 
        $sPasswordKey = $this->pbkdf2($sstr, $sRand);
 
        return $sRand . $iv . $this->opensslEncrypt($data, $sPasswordKey, $iv);
    }
 
    private function opensslEncrypt($data, $key, $iv = '', $method='AES-128-CBC'){
        $iv = pack('H*',$iv);
        $key = hex2bin($key);
 
        $str = openssl_encrypt($data, $method, $key, 0, $iv);
 
        return $str;
    }
 
    private function opensslDecrypt($encrypt, $key, $iv='', $method='AES-128-CBC'){
 
        $iv = pack('H*',$iv);
        $key = hex2bin($key);
        $str = openssl_decrypt($encrypt, $method, $key, OPENSSL_ZERO_PADDING, $iv);
 
        return $str;
    }
 
    private function pbkdf2($password, $iv){
        $hasher = "sha256";
        $iterations = 1000;
        $outsize = 256;
 
        $iv = pack('H*',$iv);
 
        $key = hash_pbkdf2($hasher, $password, $iv, $iterations, 32, false);
 
        return $key;
    }
}