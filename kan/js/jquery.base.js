islogin=0;
function checkcookie(){
	if(document.cookie.indexOf('auth=')>=0){
		islogin=1;
		return true;
	}
	return false;
}


