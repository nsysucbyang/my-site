<html>
<head>
	<title>高等程式設計課程錄影</title>
	<link href="advprog_css.css" rel=stylesheet type="text/css">
	<!--<meta http-equiv="Content-Type" content="text/html; charset="big5">-->
	<meta charset="UTF-8">
</head>
<body>
<h1>高等程式設計課程錄影</h1>
注意事項：播放rmvb格式影片需安裝 RealPlayer，或 Media Player Clasic。 mp4 請右鍵"另存連結為..."進行下載
<table width='680'>

<?php

/*

說明:

本程式依照讀取資料夾中的檔案建立網頁

若該節影片為 070308a.rmvb
請於 adv_comment.txt 中加入一行 070308a|Chap. 1 Introduction

若該節沒影片，可建立 070308c.txt
並於 adv_comment.txt 中加入一行 070308c|沒有影片

by Joeful6

*/
/*
2021/5/31 將 070605b.avi 放入 oldVideo，並以 070605b210528.mp4 (改名為 070605b.mp4) 取代
*/
$video_comment = array();

$fin = fopen("adv_comment.txt","r");
while ($data = fgetcsv($fin,1000, "|")) {
	//print_r($data);
	if(isset($data[1]))
		$video_comment[$data[0]] = $data[1];
}

if ($handle = opendir('.')) {
    $week = 1;
    $i = 1;
    $tmpdate = "";
    $files = array();
    while (false !== ($file = readdir($handle))) {
        if (preg_match("/\.rmvb$|\.avi$|\.mp4$|\.txt$|\.rm$/i", $file) && substr($file, 0, 2)=="07") {     // 210531 新增 \.mp4
            array_push($files, $file);
        }
    }
    sort($files);
    foreach($files as $file){
            $date = substr($file, 0, 6);
            $video_name = substr($file, 0, 7);
            if($date != $tmpdate){
                $tmpdate = $date;
                $i = 1;
                $week++;
                echo "    <tr>\n";
				echo "        <th colspan='2'></th>\n";
                //echo "        <th colspan='2'>日期：".date("Y/m/d", mktime(0,0,0,$date[2].$date[3],$date[4].$date[5],$date[0].$date[1]))."</th>\n";
                echo "        <th>檔案名稱</th>\n";
                echo "        <th>大小</th>\n";
                //echo "        <th>片長</th>\n";
                echo "    </tr>\n";
            }
            $class = ord($file[6])-96;
            if(1 <= $class && $class <= 3){
                $class = "第 ".(ord($file[6])-96)." 節";
            }else{
                $class = " - ";
            }
            if(preg_match("/\.rmvb$/i", $file)){
                $rate = 3.58;
                $comment = "";
                //$time_str = intval(filesize($file)/1024/1024/$rate)."分鐘";
                $filelink = "<a href='$file' target='_blank'>".$file."</a>";
            }else if(preg_match("/\.avi$/i", $file)){
                $rate = 1.46;
                $comment = " ";
                //$time_str = "約".intval(filesize($file)/1024/1024/$rate)."分鐘";
                $filelink = "<a href='$file' target='_blank'>".$file."</a>";
            }else if(preg_match("/\.mp4$/i", $file)){       // 210531 新增該 elif
                $rate = 1;
                $comment = " ";
                //$time_str = "約".intval(filesize($file)/1024/1024/$rate)."分鐘";
                $filelink = "<a href='$file' target='_blank'>".$file."</a>";
		//continue;
            }else if(preg_match("/\.txt$/i", $file)){
                $rate = 1;
                $comment = "";
                $time_str = " - ";
                $filelink = " - ";
            }
            echo "    <tr>\n";
            echo "        <td align='center'>$class</td>\n";
            echo "        <td> ".@$video_comment[$video_name]." </td>\n";
            echo "        <td>$filelink $comment </td>\n";
            echo "        <td align='right'>".intval(filesize($file)/1024/1024)."MB</td>\n";
            //echo "        <td>$time_str</td>\n";
            echo "    </tr>\n";
            $i++;
    }
    echo "</table>\n";
    closedir($handle);
}
?>
<br>
桌面錄影程式：<a href="http://anicam.learnbank.com.tw/new_page/index.html" target="_blank">AniCam</a>
<p>&copy 2011 pplab</p><!--Joeful6-->
</body>
</html>
