function Process(bookID)
{
  var fg = document.forms['frmGo'];
  var f = document.forms['frmSearch'];

  fg.term.value = f.__term.value;
  fg.doptcmdl.value="Books";
  fg.db.value = "Books";

  if( f.__sbook[0].checked == true ) {
  	 fg.term.value += " AND " + bookID + "[book]";
         fg.doptcmdl.value="TOCView";
  }
  if( f.__sbook[2].checked == true ) {
  	 
     fg.db.value = "PubMed";
  }
  fg.submit();
  return false;
}

function KeyPress(bookID,e)
{
 var nav = ( navigator.appName == "Netscape" ) ? true : false;
 var msie = ( navigator.appName.indexOf("Microsoft") != -1 ) ? true : false;
 var k = 0;
 if( nav ) { k = e.which; }
 else if( msie ) { k = e.keyCode; }
 if( k==13 ) Process(bookID);
}

function BVShow(url)
{
  location = '/books/bv.fcgi?rid=' + url;
}
