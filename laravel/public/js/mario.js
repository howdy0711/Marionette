function checkLogin(){
	if(document.loginForm.user_id.value==""){
		alert("아이디를 입력해 주세요.");
		document.loginForm.user_id.focus();
		return;
	}
	if(document.loginForm.user_password.value==""){
		alert("비밀번호를 입력해 주세요.");
		document.loginForm.user_password.focus();
		return;
	}

	document.loginForm.submit();
}



function checkRegister(){
	if(document.registerForm.user_id.value==""){
		alert("아이디를 입력해 주세요.");
		document.registerForm.user_id.focus();
		return;
	}
	if(document.registerForm.user_password.value==""){
		alert("비밀번호를 입력해 주세요.");
		document.registerForm.user_password.focus();
		return;
	}
		if(document.registerForm.user_name.value==""){
		alert("이름을 입력해 주세요.");
		document.registerForm.user_name.focus();
		return;
	}
	document.registerForm.submit();
}



function purchaseAlert(){
	document.purchaseForm.submit();
}



function cont_Down(){
	document.cont_down.submit();
}


function cont_Aprove() {
	document.cont_aprove.submit();
}


function cont_SELL(){
	document.cont_sellApply.submit();
}


function pro_DEL(){
	document.delFORM.submit();
}


function deleteUserAlert(){ /////마리오네트 컨텐츠 유저 삭제
	$("#t").hide();
}

/////////////////////////////////////////
function user_pro_del(){
	$("#del_form").submit();
}
/////////////////////////////////////////
function cont_DEL() {
		alert("이름을 입력해 주세요.");
	document.cont_DEL.submit();
}


function prevPage(){
  history.back();
}
