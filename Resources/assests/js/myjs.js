		function password(field1, field2, field3)
		{
			var Password1 = document.getElementById(field1).value;
			var Password2 = document.getElementById(field2).value;
			if(Password1 != Password2)
			{
				document.getElementById(field3).setAttribute("class","glyphicon glyphicon-remove");
				document.getElementById(field3).style.color = "red";
				document.getElementById(field2).value = '';
			}
			else{
				document.getElementById(field3).setAttribute("class","glyphicon glyphicon-ok");
				document.getElementById(field3).style.color = "green";
			}
		}

		// validate the old email
		function oldPassword(field1,field2,field3) {
			var realOld = document.getElementById(field1).value;	
			var EnteredOld = document.getElementById(field2).value;

			if (realOld == EnteredOld && EnteredOld == '') {
				document.getElementById(field3).setAttribute("class","glyphicon glyphicon-ok");
				document.getElementById(field3).style.color = "green";
			}else{
				document.getElementById(field3).setAttribute("class","glyphicon glyphicon-remove");
				document.getElementById(field3).style.color = "red";
				document.getElementById(field2).value='';
			}
		}

		//validate email
		function validate_email(field1,field2)
		{
			var emailID = document.getElementById(field1).value;
			atpos = emailID.indexOf("@");
			dotpos = emailID.lastIndexOf(".");
			if (atpos < 1 || ( dotpos - atpos < 2 )) 
			{
				document.getElementById(field2).setAttribute("class","glyphicon glyphicon-remove");
				document.getElementById(field2).style.color = "red";
				document.getElementById(field1).value='';
			}
			else{
				document.getElementById(field2).setAttribute("class","glyphicon glyphicon-ok");
				document.getElementById(field2).style.color = "green";
			}
		}

		//validate phonenumber
		function validate_telephone(field1, field2)
		{
			var numb=document.getElementById(field1).value;
			if(isNaN(numb) || numb.charAt(0)!=0 || numb.charAt(1)<7 || numb.charAt(2)>1 || numb.length!=11 )//atleast one has to b true(0 or 1=1)
			{
				document.getElementById(field2).setAttribute("class","glyphicon glyphicon-remove");
				document.getElementById(field2).style.color = "red";
				document.getElementById(field1).value='';
			}else{
				document.getElementById(field2).setAttribute("class","glyphicon glyphicon-ok");
				document.getElementById(field2).style.color = "green";
			}
		}
		//validate number
		function number(field)
		{
			var number=document.getElementById(field).value;
			if(isNaN(number))
			{
				alert("this field can only accept numbers");
				document.getElementById(field).value='';
			}	 
		}
		//validate username
		function username(field1, field2)
		{
			var name=document.getElementById(field1).value;
			var name_reg= /^\s*[A-Za-z]+\d*\s*$/;
			if(!(name.match(name_reg))){
				document.getElementById(field2).setAttribute("class","glyphicon glyphicon-remove");
				document.getElementById(field2).style.color = "red";
				document.getElementById(field1).value='';
			}
			else{
				document.getElementById(field2).setAttribute("class","glyphicon glyphicon-ok");
				document.getElementById(field2).style.color = "green";
			}
		}
