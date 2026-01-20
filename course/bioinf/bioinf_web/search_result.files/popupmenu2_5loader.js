// version 2.5.6 (1/23/2006) 

var PopUpMenu2_title4layer
var PopUpMenu2_inheight         // menu Height , will be calculated dep. on links count for older browsers
var PopUpMenu2_inwidth          // menu width , will be calculated dep. on longer link lenth for older browsers
var PopUpMenu2_offsetx   = 2	// show menu offset X
var PopUpMenu2_offsety   = 2	// show menu offset Y

// DEFAULT VARIABLES 

var Table_Cell_MouseOut_color_self_style ="";


var Table_Cell_MouseOver_color= { 
        def:'#F2F5F7', 
	    entrez_table:'#F2F5F7'
		};  
var Table_Cell_MouseOut_color= { 
        def:'#E1E6EB', 
        entrez_top_table:'#E1E6EB'
		};  

var PopUpMenu2_name_entrez_table='"entrez_table"';
var PopUpMenu2_name_entrez_top_table='"entrez_top_table"';
var PopUpMenu2_pageX;
var PopUpMenu2_pageY;
var PopUpMenu2_milliseconds=0;
var PopUpMenu2_doNOThide = false;

var PopUpMenu2_default_config = [ 
["ColorTheme" , "blue"],
["TitleText" , "Links"],
["ShowTitle" , "yes"],
["Help" , "none"],
["ShowCloseIcon" , "no"],
["AlignCenter" , "no"],
["AlignLR" , "right"],
["AlignTB" , "bottom"],
["FreeText" , "no"],
["TitleColor","white"],
["TitleSize","11px"],
["TitleBackgroundImage","http://www.ncbi.nlm.nih.gov/coreweb/images/popupmenu/top_bg2.gif"],
["ItemColor","Navy"],
["ItemSize","11px"],
["ItemFont","Verdana, arial, geneva, helvetica"],
["ItemBulletImage","http://www.ncbi.nlm.nih.gov/coreweb/images/popupmenu/marrow.gif"],
["SeparatorColor","#006A50"],
["BorderColor","#32787A"],
["BackgroundColor","#E1E6EB"],
["HideTime" ,300],
["ToolTip" , "no"]
];


// NEW STYLE DEFAULT GLOBAL VARIABLES
var PopUpMenu2_ColorTheme_index = 0;
var PopUpMenu2_TitleText_index  = 1;
var PopUpMenu2_ShowTitle_index = 2;
var PopUpMenu2_Help_index = 3;
var PopUpMenu2_ShowCloseIcon_index = 4;
var PopUpMenu2_AlignCenter_index = 5;
var PopUpMenu2_AlignLR_index = 6;
var PopUpMenu2_AlignTB_index =7;
var PopUpMenu2_FreeText_index = 8;
var PopUpMenu2_TitleColor_index = 9;
var PopUpMenu2_TitleSize_index = 10;
var PopUpMenu2_TitleBackgroundImage_index = 11;
var PopUpMenu2_ItemColor_index =12;
var PopUpMenu2_ItemSize_index = 13;
var PopUpMenu2_ItemFont_index = 14;
var PopUpMenu2_ItemBulletImage_index = 15;
var PopUpMenu2_SeparatorColor_index = 16;
var PopUpMenu2_BorderColor_index = 17;
var PopUpMenu2_BackgroundColor_index = 18;
var PopUpMenu2_HideTime_index = 19;
var PopUpMenu2_ToolTip_index = 20;

var PopUpMenu2_DelayTime = 300;
var PopUpMenu2_HideTime = PopUpMenu2_default_config[PopUpMenu2_HideTime_index][1];
var PopUpMenuHelpLink =PopUpMenu2_default_config[PopUpMenu2_Help_index][1];
	
var PopUpMenu2_linkArray_sum;
var PopUpMenu2_thename;
var PopUpMenu2_theobj;
var PopUpMenu2_thetext;
var PopUpMenu2_winHeight;
var PopUpMenu2_winWidth;
var PopUpMenu2_tableColor;
var PopUpMenu2_timerID;
var PopUpMenu2_first_time=false;
var PopUpMenu2_closeHTML;
var PopUpMenu2_ShowTitle=true;
var PopUpMenu2_scrollbaroff = 0;
var PopUpMenu2_center_offset=false;
var PopUpMenu2_boxposLR;
var PopUpMenu2_boxposTB;

var PopUpMenu2_ToolTipNum = 1; 
var PopUpMenu2_ToolTipText = "Nety";
var PopUpMenu2_ToolTipOnly = "no";

// Browser Check 
var PopUpMenu2_opera=PopUpMenu2_opera_6=PopUpMenu2_opera_7up=false;
var PopUpMenu2_menu_possible=false;
PopUpMenu2_ns4=(document.layers)?true:false
PopUpMenu2_mac45=(navigator.appVersion.indexOf("MSIE 4.5")!=-1)?true:false
PopUpMenu2_safari=(navigator.userAgent.indexOf("Safari")!=-1)?true:false
PopUpMenu2_ns6up=(navigator.userAgent.indexOf("Gecko")!=-1)?true:false
PopUpMenu2_ns6x=(navigator.userAgent.indexOf("Netscape6")!=-1)?true:false

if(PopUpMenu2_ns6up||PopUpMenu2_ns4)mac=false;
PopUpMenu2_icab=(navigator.userAgent.indexOf("iCab")!=-1)?true:false
PopUpMenu2_ie55=((navigator.appVersion.indexOf("MSIE 6.0")!=-1||navigator.appVersion.indexOf("MSIE 5.5")!=-1))?true:false;
PopUpMenu2_ie5mac=((navigator.appVersion.indexOf("MSIE 5")!=-1&&navigator.appVersion.indexOf("Mac")!=-1))?true:false;

// Check if browser Opera and version (Menu not possible in 6.x)
if (navigator.userAgent.indexOf("Opera")!=-1) {
PopUpMenu2_opera_6=(navigator.userAgent.indexOf("6.")!=-1)?true:false
PopUpMenu2_opera_7up=(navigator.userAgent.indexOf("7.")!=-1)||(navigator.userAgent.indexOf("8.")!=-1)||(navigator.userAgent.indexOf("9.")!=-1)?true:false
//alert (PopUpMenu2_opera_7);
PopUpMenu2_opera=true;
}

// Check if browser Icab or Opera 6.x for Mac (Menu not possible)
if ((PopUpMenu2_ie5mac&&PopUpMenu2_icab) || (PopUpMenu2_ie5mac&&PopUpMenu2_opera_6)) {PopUpMenu2_ie5mac=false;}

PopUpMenu2_iens6 = PopUpMenu2_ns6up || PopUpMenu2_ie55 || PopUpMenu2_opera_7up;

if ( PopUpMenu2_iens6 || PopUpMenu2_ns4 || PopUpMenu2_ie55 || PopUpMenu2_ie5mac || PopUpMenu2_opera_7up) { PopUpMenu2_menu_possible=true;}

if (PopUpMenu2_ns4) {
    document.captureEvents(Event.MOUSEMOVE)
}

document.onmousemove=getMouseXY


function getMouseXY(e)
{
    e = e || window.Event || window.event;
    window.pageX = e.pageX || e.clientX;
    window.pageY = e.pageY || e.clientY;
    if ((PopUpMenu2_ie55 || PopUpMenu2_ie5mac ) && (!PopUpMenu2_opera_7up))
	{
        window.pageX += document.body.scrollLeft;
        window.pageY += document.body.scrollTop;
    }
    return true
}

function PopUpMenu2_SetToolTip(PopUpMenu2_links_ids_line,PopUpMenu2_ToolTipId) {
	PopUpMenu2_ToolTipOnly = "yes"
	if  (arguments.length != 1) {
//	alert (parseInt(PopUpMenu2_ToolTipId));
	if ( parseInt(PopUpMenu2_ToolTipId) > 0 ) { PopUpMenu2_ToolTipNum  = PopUpMenu2_ToolTipId ; } else { PopUpMenu2_ToolTipText=PopUpMenu2_ToolTipId; }
	}
	PopUpMenu2_Set(PopUpMenu2_links_ids_line)
}


function BuildLinks(PopUpMenu2_links)
{

    PopUpMenu2_linkArraytmp = new Array;
    PopUpMenu2_linkArraytmp = PopUpMenu2_links;
	PopUpMenu2_linkArray_sum =" ";
    PopUpMenu2_TotalLinksCount=0;
    var PopUpMenu2_linkArrayMaxlength = 0;
	var PopUpMenu2_TotalSeparatorsCount=0;
	var PopUpMenu2_linkArray_starts = 0;
	PopUpMenu2_local_config_tmp = new Array;
	PopUpMenu2_default_config_tmp = new Array;
	for (var temp_i = 0; temp_i < PopUpMenu2_default_config.length; temp_i++) {	
	PopUpMenu2_default_config_tmp[temp_i]=PopUpMenu2_default_config[temp_i].join(',').split(',')
	}
	PopUpMenu2_center_offset=false;
	// Default Close Icon HTML 
	PopUpMenu2_closeHTML="<img src='http://www.ncbi.nlm.nih.gov/coreweb/template1/pix/pixel.gif' width='12' height='11' border='0'>";
	// Default False Hide Title
	PopUpMenu2_ShowTitle=true;
	PopUpMenuHelpLink = "none";

	if (PopUpMenu2_linkArraytmp[0][0] == "UseLocalConfig" && PopUpMenu2_linkArraytmp[0][1] != "") {
	// set local congif from PopUpMenu2_Set_local_Config array
		PopUpMenu2_local_config_tmp = eval('PopUpMenu2_LocalConfig_'+PopUpMenu2_linkArraytmp[0][1]);
	
	if (PopUpMenu2_local_config_tmp[0][0] != "UseThisLocalConfig" || PopUpMenu2_local_config_tmp[0][1] != "no") {
		for (var temp_i = 0; temp_i < PopUpMenu2_local_config_tmp.length; temp_i++) {	
			for (var temp_i2 = 0; temp_i2 < PopUpMenu2_default_config_tmp.length; temp_i2++) {	
				if (PopUpMenu2_default_config_tmp[temp_i2][0] == PopUpMenu2_local_config_tmp[temp_i][0])
				{
				PopUpMenu2_default_config_tmp[temp_i2][1] = PopUpMenu2_local_config_tmp[temp_i][1];
				}
			}
		}
	 } 
		// PopUpMenu2_default_config_tmp is config array for current menu 
		PopUpMenu2_linkArray_starts = 1;

  }
	// Set Hide Time from Local config 
	PopUpMenu2_HideTime = PopUpMenu2_default_config_tmp[PopUpMenu2_HideTime_index][1];

		for (var temp_i2 = 0; temp_i2 < PopUpMenu2_default_config_tmp.length; temp_i2++) {	
				
				PopUpMenu2_default_config_tmpKey = PopUpMenu2_default_config_tmp[temp_i2][0]
				PopUpMenu2_default_config_tmpValue = PopUpMenu2_default_config_tmp[temp_i2][1];
				
				if (PopUpMenu2_default_config_tmpKey=="ShowCloseIcon" && PopUpMenu2_default_config_tmpValue=="yes") {
				PopUpMenu2_closeHTML="<a href='#' CLASS='popmenu' onClick='javascript:PopUpMenu2_Stop(true); return false;'><img src='http://www.ncbi.nlm.nih.gov/coreweb/images/popupmenu/close.gif' width='12' height='11' alt='Close' border='0'></a>";
			} else if (PopUpMenu2_default_config_tmpKey=="TitleText" && PopUpMenu2_default_config_tmpValue !="") {
				PopUpMenu2_title4layer = PopUpMenu2_default_config_tmpValue;
				} else if (PopUpMenu2_default_config_tmpKey=="ShowTitle" && PopUpMenu2_default_config_tmpValue=="no") {
				PopUpMenu2_ShowTitle=false;
			} else if (PopUpMenu2_default_config_tmpKey=="AlignCenter"  && PopUpMenu2_default_config_tmpValue=="yes") {
				PopUpMenu2_center_offset=true;
			} else if (PopUpMenu2_default_config_tmpKey=="Help" && PopUpMenu2_default_config_tmpValue !="none") {
                PopUpMenuHelpLink = PopUpMenu2_default_config_tmpValue;
	            }	
			}

	if (PopUpMenu2_default_config_tmp[PopUpMenu2_ToolTip_index][1] != "no" || PopUpMenu2_ToolTipOnly != "no") {

	var ToolTip = "";
	if (PopUpMenu2_default_config_tmp[PopUpMenu2_ToolTip_index][1] != "no") {
	var tippars = parseInt(PopUpMenu2_default_config_tmp[PopUpMenu2_ToolTip_index][1]);
	if ( typeof(tippars) == "number") { ToolTip = PopUpMenu2_linkArraytmp[1][0]; } else { alert (tippars) ; ToolTip = PopUpMenu2_linkArraytmp[tippars][0]; }
	}
	if (PopUpMenu2_ToolTipOnly =="yes") {  
		if (PopUpMenu2_ToolTipText !="Nety") { ToolTip = PopUpMenu2_ToolTipText; } else if ( PopUpMenu2_ToolTipNum > 0 && PopUpMenu2_ToolTipNum <= PopUpMenu2_linkArraytmp.length) { ToolTip = PopUpMenu2_linkArraytmp[PopUpMenu2_ToolTipNum][0]; }
		PopUpMenu2_ToolTipOnly = "no";
	}
PopUpMenu2_linkArray_sum ='<tr><td width="1"><img src="http://www.ncbi.nlm.nih.gov/coreweb/template1/pix/pixel.gif" width="1" height="5" border="0"></td><td align="left" width="100%" nowrap><font CLASS="popmenu" style="color:'+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemColor_index][1]+'; font-family:'+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemFont_index][1]+'; font-size: '+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemSize_index][1]+';">'+ToolTip+'</font></td><td width="1"><img src="http://www.ncbi.nlm.nih.gov/coreweb/template1/pix/pixel.gif" width="1" height="5" border="0"></td></tr>';
return;
}
 if (PopUpMenu2_default_config_tmp[PopUpMenu2_FreeText_index][1] == "no" ) {

    for (var i = PopUpMenu2_linkArray_starts; i < PopUpMenu2_linkArraytmp.length; i++) {

        PopUpMenu2_linkArrayConstr  = PopUpMenu2_OnMouseOut_link = PopUpMenu2_OnMouseOver_link =  "";
		PopUpMenu2_linkArrayKey = PopUpMenu2_linkArraytmp[i][0];
		PopUpMenu2_linkArrayKey_length = PopUpMenu2_linkArraytmp[i][0].length;
		PopUpMenu2_linkArrayValue = PopUpMenu2_linkArraytmp[i][1];
		PopUpMenu2_linkArrayMOver = PopUpMenu2_linkArraytmp[i][2];
		PopUpMenu2_linkArrayMOut = PopUpMenu2_linkArraytmp[i][3];

		
        if (PopUpMenu2_linkArraytmp[i]) {
            if (PopUpMenu2_linkArrayMOver) {    
                PopUpMenu2_OnMouseOver_link='onMouseOver="javascript:'+PopUpMenu2_linkArrayMOver+' "';				
            }
            if (PopUpMenu2_linkArrayMOut) { 
                PopUpMenu2_OnMouseOut_link='onMouseOut="javascript:'+PopUpMenu2_linkArrayMOut+' "';
            }
            if (PopUpMenu2_linkArrayMaxlength < PopUpMenu2_linkArrayKey_length) {  
                PopUpMenu2_linkArrayMaxlength = PopUpMenu2_linkArrayKey_length;
            }
            
			if (PopUpMenu2_linkArrayKey=="Help") { 
				PopUpMenuHelpLink = PopUpMenu2_linkArrayValue;
			} else {

			if (PopUpMenu2_linkArrayValue!="-" && PopUpMenu2_linkArrayValue!="none") { 
                    if (PopUpMenu2_linkArrayValue.indexOf("aname#") != -1) {
                        PopUpMenu2_linkArrayConstr = '<a href="'+PopUpMenu2_linkArrayValue.substring(5,PopUpMenu2_linkArrayValue.length)+'"  CLASS="popmenu"  onClick="javascript:PopUpMenu2_Stop(true);"  '+PopUpMenu2_OnMouseOver_link+' '+PopUpMenu2_OnMouseOut_link+' style="color:'+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemColor_index][1]+'; font-family:'+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemFont_index][1]+'; font-size: '+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemSize_index][1]+';">'+PopUpMenu2_linkArrayKey+'</a>';
					} else {
					PopUpMenu2_linkArrayConstr = '<a href="javascript:'+PopUpMenu2_linkArrayValue+'"  CLASS="popmenu" style="color:'+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemColor_index][1]+'; font-family:'+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemFont_index][1]+'; font-size: '+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemSize_index][1]+';" '+PopUpMenu2_OnMouseOver_link+' '+PopUpMenu2_OnMouseOut_link+'>'+PopUpMenu2_linkArrayKey+'</a>';
                    }
                    PopUpMenu2_linkArray_sum+="<tr onMouseOver='PopUpMenu2_Table_Cell_MouseOver(this,1,"+PopUpMenu2_name_entrez_top_table+")' onMouseOut='PopUpMenu2_Table_Cell_MouseOver(this,0,"+PopUpMenu2_name_entrez_top_table+");' valign='middle'><td valign='middle' align='right' width='10' ><img src='"+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemBulletImage_index][1]+"' width='10' height='15' border='0' align='middle'></td><td nowrap align=left width='100%'><font size=2 face='Verdana, arial, geneva, helvetica' >"+PopUpMenu2_linkArrayConstr+"</font></td><td width='1'><img src='http://www.ncbi.nlm.nih.gov/coreweb/template1/pix/pixel.gif' width='1' height='5' border='0'></td></tr>";
                    PopUpMenu2_TotalLinksCount++;
	                } else { 
// separator cell	

				if (PopUpMenu2_linkArray_sum!==" ")  {
					PopUpMenu2_linkArray_sum+='<tr><td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="left"><tr><td background="http://www.ncbi.nlm.nih.gov/coreweb/images/popupmenu/separator.gif"><img src="http://www.ncbi.nlm.nih.gov/coreweb/template1/pix/pixel.gif" width="1" height="2" border="0"></td></tr></table></td></tr>';
					PopUpMenu2_TotalSeparatorsCount++;
					}
// name of new groups after separator
				if (PopUpMenu2_linkArrayKey!=="-") {
					PopUpMenu2_linkArray_sum+="<tr><td colspan='3' nowrap align=center><font size=2 face='Verdana, arial, geneva, helvetica' style='color:"+PopUpMenu2_default_config_tmp[PopUpMenu2_SeparatorColor_index][1]+"; font-family:"+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemFont_index][1]+"; font-size: "+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemSize_index][1]+";'><img src='http://www.ncbi.nlm.nih.gov/coreweb/template1/pix/pixel.gif' width='10' height='1' border='0'><b>"+PopUpMenu2_linkArrayKey+"</b></font><img src='http://www.ncbi.nlm.nih.gov/coreweb/template1/pix/pixel.gif' width='10' height='1' border='0'></td></tr>";
					PopUpMenu2_TotalLinksCount++;
	        }
		  }
  	    }
	  }
    }
	if (!PopUpMenu2_ShowTitle && PopUpMenuHelpLink != "none") {
                   PopUpMenu2_linkArray_sum+="<tr onMouseOver='PopUpMenu2_Table_Cell_MouseOver(this,1,"+PopUpMenu2_name_entrez_top_table+")' onMouseOut='PopUpMenu2_Table_Cell_MouseOver(this,0,"+PopUpMenu2_name_entrez_top_table+");' valign='middle'><td valign='middle' align='right'width='10' ><img src='"+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemBulletImage_index][1]+"' width='10' height='15' border='0' align='middle'></td><td nowrap align=left width='100%'><font size=2 face='Verdana, arial, geneva, helvetica' ><a href='javascript:PopUpMenu2_showpopuphelp();' CLASS='popmenu' style='color:"+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemColor_index][1]+"; font-family:"+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemFont_index][1]+"; font-size: "+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemSize_index][1]+";' >Help</a></font></td><td width='1'><img src='http://www.ncbi.nlm.nih.gov/coreweb/template1/pix/pixel.gif' width='1' height='5' border='0'></td></tr>";
                   PopUpMenu2_TotalLinksCount++;
	}
  } else {
 // Free Text 
PopUpMenu2_linkArray_sum ='<tr><td width="1"><img src="http://www.ncbi.nlm.nih.gov/coreweb/template1/pix/pixel.gif" width="1" height="5" border="0"></td><td align="left" width="100%" nowrap><font CLASS="popmenu" style="color:'+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemColor_index][1]+'; font-family:'+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemFont_index][1]+'; font-size: '+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemSize_index][1]+';">'+PopUpMenu2_default_config_tmp[PopUpMenu2_FreeText_index][1]+'</font></td><td width="1"><img src="http://www.ncbi.nlm.nih.gov/coreweb/template1/pix/pixel.gif" width="1" height="5" border="0"></td></tr>';
  }
    // menu Height and Width calc.

	PopUpMenu2_inheight = 18 + 17 * PopUpMenu2_TotalLinksCount;
	if (PopUpMenu2_TotalSeparatorsCount > 0) PopUpMenu2_inheight += 4 * PopUpMenu2_TotalSeparatorsCount;
    if (PopUpMenu2_linkArrayMaxlength < 15 ) {
        PopUpMenu2_inwidth = 120; 
    } else {
        PopUpMenu2_inwidth = 120 + (PopUpMenu2_linkArrayMaxlength - 14) * 7;
    }
}


function buildText() {

// !!! SINGLE QUOTES INSIDE DOUBLE QUOTES. 
PopUpMenu2_text="";
if (PopUpMenu2_ShowTitle) {
	PopUpMenu2_text="<table width='100%' border='0' cellspacing='0' cellpadding='1' background='"+PopUpMenu2_default_config_tmp[PopUpMenu2_TitleBackgroundImage_index][1]+"'>";
    PopUpMenu2_text+="<tr><td nowrap bgcolor='"+PopUpMenu2_default_config_tmp[PopUpMenu2_BorderColor_index][1]+"' background='"+PopUpMenu2_default_config_tmp[PopUpMenu2_TitleBackgroundImage_index][1]+"'>";
if (PopUpMenuHelpLink != "none") {
PopUpMenu2_text+="<a href='javascript:PopUpMenu2_showpopuphelp();' CLASS='popmenu'><img src='http://www.ncbi.nlm.nih.gov/coreweb/images/popupmenu/help.gif' width='12' height='11' alt='Help' border='0'></a>";
} else {
PopUpMenu2_text+="<img src='http://www.ncbi.nlm.nih.gov/coreweb/template1/pix/pixel.gif' width='12' height='11' alt='Help' border='0'></a>";
}
PopUpMenu2_text+="</td><td nowrap bgcolor='"+PopUpMenu2_default_config_tmp[PopUpMenu2_BorderColor_index][1]+"' background='"+PopUpMenu2_default_config_tmp[PopUpMenu2_TitleBackgroundImage_index][1]+"'><center><font  class='menutitle' style='color:"+PopUpMenu2_default_config_tmp[PopUpMenu2_TitleColor_index][1]+"; font-family:"+PopUpMenu2_default_config_tmp[PopUpMenu2_ItemFont_index][1]+"; font-size: "+PopUpMenu2_default_config_tmp[PopUpMenu2_TitleSize_index][1]+";'>&nbsp;<b>"+PopUpMenu2_title4layer+"</b>&nbsp;</font></center></td><td nowrap bgcolor='"+PopUpMenu2_default_config_tmp[PopUpMenu2_BorderColor_index][1]+"' align='right' background='"+PopUpMenu2_default_config_tmp[PopUpMenu2_TitleBackgroundImage_index][1]+"'>"+PopUpMenu2_closeHTML+"";
    PopUpMenu2_text+="</td></tr></table>";
}
    PopUpMenu2_text+="<table width='100%' border='0' cellspacing='0' cellpadding='1' bgcolor='"+PopUpMenu2_default_config_tmp[PopUpMenu2_BorderColor_index][1]+"'>";
    PopUpMenu2_text+="<tr><td>";
    PopUpMenu2_text+="<table border='0' cellspacing='0' cellpadding='0' width='100%'>";
    PopUpMenu2_text+="<tr><td bgcolor='"+PopUpMenu2_default_config_tmp[PopUpMenu2_BorderColor_index][1]+"' align='center' valign='top'>";
    PopUpMenu2_text+="<table width='100%' border='0' cellspacing='0' cellpadding='1' bgcolor='"+PopUpMenu2_default_config_tmp[PopUpMenu2_BackgroundColor_index][1]+"'>";
    PopUpMenu2_text+=PopUpMenu2_linkArray_sum;
    PopUpMenu2_text+="</table></td></tr></table></td></tr></table>";
//	document.write(PopUpMenu2_text);
    return PopUpMenu2_text;
	
}


function PopUpMenu2_doNOThideFunc() {
    PopUpMenu2_doNOThide = true;
}


function PopUpMenu2_Hide_Layer() {
    PopUpMenu2_Hide_It(PopUpMenu2_HideTime);
}


function PopUpMenu2_Hide(ms) {
	if (PopUpMenu2_timerID) {window.clearTimeout(PopUpMenu2_timerID); }
    if (!ms) { ms=PopUpMenu2_HideTime; }
    PopUpMenu2_Hide_It(ms);
}


function PopUpMenu2_Hide_It(ms) {
    PopUpMenu2_milliseconds=parseInt(ms);
    if (PopUpMenu2_milliseconds > 0) {
        PopUpMenu2_milliseconds -= PopUpMenu2_DelayTime;
        PopUpMenu2_timerID=window.setTimeout('PopUpMenu2_Hide_It(PopUpMenu2_milliseconds)',PopUpMenu2_DelayTime);
    } else {
        PopUpMenu2_Stop(false);
    }
}


function PopUpMenu2_showpopuphelp() {
	if (PopUpMenuHelpLink.indexOf("window.open(") != -1) {
	eval (PopUpMenuHelpLink);
	} else {
	eval ('window.top.location="'+PopUpMenuHelpLink + '"');
	PopUpMenu2_Stop(true);
	}

}


function PopUp2WindowOpen(url,name,attributes) {
    var PopUpWindowHandle;
    PopUpWindowHandle = window.open(url,name,attributes);
}


function PopUpMenu2_ClearTime(){
    window.clearTimeout(PopUpMenu2_timerID);
}

String.prototype.Conf2Boolean = 
function() {
	return ~"1|yes|da|si|true|on".indexOf(this.toString().toLowerCase());
}

function PopUpMenu2_Set_GlobalConfig(){
	
	if (PopUpMenu2_GlobalConfig[0][0] == "UseThisGlobalConfig" && PopUpMenu2_GlobalConfig[0][1] == "yes") {
	// set global congif from PopUpMenu2_Set_GlobalConfig array
		for (var temp_i = 1; temp_i < PopUpMenu2_GlobalConfig.length; temp_i++) {	
			for (var temp_i2 = 0; temp_i2 < PopUpMenu2_default_config.length; temp_i2++) {	
				if (PopUpMenu2_default_config[temp_i2][0] == PopUpMenu2_GlobalConfig[temp_i][0])
				{
				PopUpMenu2_default_config[temp_i2][1] = PopUpMenu2_GlobalConfig[temp_i][1];
				}
			}
		}
	} else {

	// use default global congif
	return;
	}
}


if (PopUpMenu2_menu_possible) {
	
	PopUpMenu2_Set_GlobalConfig();

	if (PopUpMenu2_iens6) {
    document.write("<div id='PopUpMenu2viewer' style='background-color:transparent;width:0;height:0;margin-left:0;visibility:hidden;position:absolute;z-index:1;overflow:hidden' onmouseover='PopUpMenu2_ClearTime();' onmouseout='PopUpMenu2_Hide_Layer()'></div><script language=JavaScript1.2 src='http://www.ncbi.nlm.nih.gov/coreweb/javascript/popupmenu2/popupmenu2_5iens6.js' type=text/javascript></script>");
	} else if (PopUpMenu2_ie5mac) {
    document.write("<script language=JavaScript1.2 src='http://www.ncbi.nlm.nih.gov/coreweb/javascript/popupmenu2/popupmenu2_5macie.js' type=text/javascript></script><div id='PopUpMenu2viewer' style='background-color:transparent;width:0;height:0;margin-left:0;visibility:hidden;position:absolute;z-index:1;overflow:hidden' onmouseover='window.clearTimeout(PopUpMenu2_timerID)'  onmouseout='PopUpMenu2_Hide_Layer()'></div>");
	} else if (PopUpMenu2_ns4){
	document.write("<script language=JavaScript1.2 src='http://www.ncbi.nlm.nih.gov/coreweb/javascript/popupmenu2/popupmenu2_5ns4.js' type=text/javascript></script>");
    document.write("<layer z-index=27 visibility=hidden id=nsviewer bgcolor=#cccccc width=0 height=0 onmouseout='PopUpMenu2_Hide_Layer()'></layer>");
    hideobj = eval("document.nsviewer");
    hideobj.visibility="hidden";
	}
}
