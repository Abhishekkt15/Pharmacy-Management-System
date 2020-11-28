function validateForm()
{

//for alphabet characters only
var str=document.form1.first_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("Name Cannot Contain Numerical Values");
	document.form1.first_name.value="";
	document.form1.first_name.focus();
	return false;
	}}
	
if(document.form1.first_name.value=="")
{
alert("Name Field is Empty");
return false;
}

//for alphabet characters only
var str=document.form1.last_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//comparing user input with the characters one by one
	for(i=0;i<str.length;i++)
	{
	//charAt(i) returns the position of character at specific index(i)
	//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("Name Cannot Contain Numerical Values");
	document.form1.last_name.value="";
	document.form1.last_name.focus();
	return false;
	}}
	

if(document.form1.last_name.value=="")
{
alert("Name Field is Empty");
return false;
}

if(document.form1.email.value=="")
{
alert("Email Field is Empty");
return false;
}
var reg= /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
// /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/ is regular expresion for email id
var address= document.form1.email.value;
// the test() mathod tests for a match in a string. this method returs true if it finds a match, otherwise it returns false
if (reg.test(address)==false){
alert("Invalid Email Address");
return false;
} 

if(document.form1.age.value==""){
alert("Age Field is Empty");
document.form1.age.focus();
return false;
}
var str= document.form1.age.value;
	var valid="0123456789";
	for(i=0;i<str.length;i++)
	{
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("Age can only contain Numerals");
	document.form1.age.value="";
	document.form1.age.focus();
	return false;
	}
	}
//setting age limit
if(document.form1.age.value<18 || document.form1.age.value>60)
{
alert("Please Give age in the range of 18 to 60");
document.form1.age.focus();
return false;
}
//Validating Gender to be selected by radio 
if(document.form1.gender[0].checked==false && document.form1.gender[0].checked==false ){
alert("Please Select Gender");
document.form1.gender.focus();
return false;
}
//validating langauge that is selected by a check box
if(document.form1.langauge1.checked==false && document.form1.langauge2.checked==false && document.form1.langauge.checked==false  ){
alert("Please Select Langauge of your choice");
return false;
}

	
if(document.form1.country.value=="")
{
alert("Please Choose the country");
document.form1.country.focus();
return false;
}
	
if(document.form1.username.value=="")
{
alert("Username Field is Empty");
document.form1.username.focus();
return false;
}
	
if(document.form1.password.value=="")
{
alert("Password Field is Empty ");
document.form1.password.focus();
return false;
}
	
if(document.form1.password.length<6)
{
alert("Password must be atleast 6 characters long");
document.form1.password.focus();
return false;
}
if(document.form1.retype_password.value=="")
{
alert("Retype Password ");
document.form1.retype_password.focus();
return false;
}

if((document.form1.password.value)!=(document.form1.retype_password.value))
{
alert("Password Does Not match ");
document.form1.retype_password.value="";
document.form1.retype_password.focus();
return false;
}}