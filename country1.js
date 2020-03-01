//<!--
// NOTE:
// This code is placed into the public domain and may be used in any manner desired.
// 
// Jim Carlock obtained the list of country names and state names from an HTML
// document at Microsoft's website.
//
// Thursday, January 13, 2005, 7:00:52 PM
// 
var gLngMaxStateLength=0;
var gLngMaxCountryLength=0;
var gLngNumberCountries=252;
var gLngNumberStates=0;
var gLngSelectedCountry=0;
var gLngSelectedState=0;
var gArCountryInfo=0;
var gArStateInfo;
// NOTE:
// Some editors may exhibit problems viewing 2803 characters...
var sCountryString = "|India|";
var aStates = new Array();

aStates[0]="";
aStates[1]="Andaman and Nicobar Islands|Andhra Pradesh|Arunachal Pradesh|Assam|Bihar|Chandigarh|Chhattisgarh|Dadra and Nagar Haveli|Daman and Diu|Delhi|Goa|Gujarat|Haryana|Himachal Pradesh|Jammu and Kashmir|Jharkhand|Karnataka|Kerala|Lakshadweep|Madhya Pradesh|Maharashtra|Manipur|Meghalaya|Mizoram|Nagaland|Orissa|Pondicherry|Punjab|Rajasthan|Sikkim|Tamil Nadu|Tripura|Uttar Pradesh|Uttaranchal|West Bengal";

gLngNumberCountries = sCountryString.split("|").length;
gArCountryInfo=sCountryString.split("|");
gArStateInfo   = new Array(gLngNumberCountries);
function fInitgArStateInfo() {
 var i=0, j=0, sStateName="", iNumberOfStates=0;
 var iMaxLength=0, iLength=0;
 var oldNumber=0;
  for (i=0;i<gLngNumberCountries;i++) {
  iNumberOfStates=aStates[i].split("|").length+1;
  gLngNumberStates=gLngNumberStates+iNumberOfStates;
  gArStateInfo[i]=new Array(iNumberOfStates);
  iMaxLength=0;
  for (j=0;j<iNumberOfStates;j++) {
   if (iLength>iMaxLength) {
    iMaxLength=iLength;
    gArStateInfo[i][j][0]=sStateName;
   }
  }
  gArCountryInfo[i][3]=parseInt(iMaxLength);
 }
 Update_Globals();
 return;
}
function xFillState() {
 var i=0;
 document.signupForm.cboState.options.length=0;
 gLngSelectedCountry=document.signupForm.cboCountry.selectedIndex;
 gLngNumberStates=gArCountryInfo[[gLngSelectedCountry][2]];
 for (i=0;i<gLngNumberStates;i++) {
  document.signupForm.cboState.options[i]=new
    Option(gArStateInfo[[gLngSelectedCountry][i][0]]);
 }
 gLngSelectedState=
  document.signupForm.cboState.options.selectedIndex;
 
 return;
}
function Fill_States() {
	var i=0, iLen=0, iNumStates=0;
 	document.signupForm.cboState.options.length=0;
	gLngSelectedCountry=document.signupForm.cboCountry.selectedIndex;
	iNumStates = aStates[gLngSelectedCountry].split("|").length;
	Update_Globals();
	document.signupForm.txtNumCountries.value=gArCountryInfo.length-1;
	document.signupForm.txtNumStates.value=iNumStates;
	for (i=0;i<iNumStates;i++) {
		document.signupForm.cboState.options[i]=new 
			Option(aStates[document.signupForm.cboCountry.selectedIndex].split("|")[i]);
	}
	updSelectState(0);
	return;
}
function Fill_Country() {
	var i=0;
	var sCountryName="";
	document.signupForm.cboCountry.options.length=0;
	for (i=0;i<gLngNumberCountries;i++) {
		gArCountryInfo[i]=new Array(4);
	}
 	for (i=0;i<gLngNumberCountries;i++) {
		document.signupForm.cboCountry.options[i]=new Option(sCountryString.split("|")[i]);
		sCountryName=document.signupForm.cboCountry.options[i];
		gArCountryInfo[i]=
			[sCountryName, 
				parseInt(sCountryName.length),
				aStates,
			0];
	}

	fInitgArStateInfo();

	return;
}

function updSelectState(lngState) {
	if (gLngSelectedCountry>0) {
		document.signupForm.cboState.selectedIndex = lngState;
		document.signupForm.txtState.value = document.signupForm.cboState.options[lngState].text;
		document.signupForm.txtSelectedState.value = lngState+1;
		document.signupForm.txtStateLength.value=document.signupForm.txtState.value.length;
	}
}
function Update_Globals() {
	gLngSelectedCountry=parseInt(document.signupForm.cboCountry.selectedIndex);
	gLngSelectedState=parseInt(document.signupForm.cboState.selectedIndex);
	document.signupForm.txtSelectedCountry.value=gLngSelectedCountry;
	document.signupForm.txtSelectedState.value=gLngSelectedState+1;
	
	document.signupForm.txtCountry.value=
		document.signupForm.cboCountry.options[gLngSelectedCountry].text;
	if (document.signupForm.txtSelectedState.value<=0) {
		document.signupForm.txtState.value="";
	}
	else {
		document.signupForm.txtState.value=
			document.signupForm.cboState.options[gLngSelectedState].text;
	}
	
	document.signupForm.txtCountryLength.value=document.signupForm.txtCountry.value.length;
	document.signupForm.txtStateLength.value=document.signupForm.txtState.value.length;

	return;
}
function Clear_Form() {
	document.signupForm.txtCountry.value="";
	document.signupForm.txtState.value="";
	document.signupForm.txtCountryLength.value="";
	document.signupForm.txtStateLength.value="";
	document.signupForm.txtNumStates.value="";
	document.signupForm.txtSelectedState.value="";
	document.signupForm.txtSelectedCountry.value="";
	document.signupForm.txtNumCountries.value="";
}

