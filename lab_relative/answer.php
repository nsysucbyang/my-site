<!doctype html>
<?php
//紀錄是非題，選擇題的錯的詳解array。
$yes_no_result = array();
$choice_result = array();
//串接寫錯題目的html tag
$head = "<p><font size='5' color='red' face='標楷體'>";
$tail = "</font></p>";
//串接正確題目的html tag
$correct_head = "<p><font size='5' color='blue' face='標楷體'>";
$correct_tail = "</font></p>";
if(isset($_POST["action"]) && ($_POST["action"]=="add"))
{
/**********檢查是非題**********/
	$sum = 0;
    //正確答案
    $yes_no_answer = array(0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 1, 1, 1); 
	//詳解
	$yes_no_explanation = array("答案為否，應該自己斷開，否則式子太長會超出右邊界。",
	                            "答案為否，equation也是句子，一樣要句點結尾。",
								"答案為是。",
								"答案為是。論文題目以及各章節抬頭(title)，
								每個英文字的第一個字母均需大寫，唯冠詞(如a, an, the...)
								或介詞(如on, in, and….)不要大寫。",
								"答案為否，應改為:x1, x2, \cdot, x10",
								"答案為是，符號表\"必需\"包含所有的符號。",
								"答案為是。",
								"答案為否，要使用 Time New Roman 或 Roman",
								"答案為否，圖表應置於引用該圖表的段落之前\"",
								"答案為否，圖的說明放在圖的\"下方\"，表的說明放在表的\"上方\"",
								"答案為是。",
								"答案為是。",
								"答案為是。論文寫作注意事項詳讀後，並誓言嚴格遵循者，請 e-mail 給：cbyang@cse.nsysu.edu.tw (楊昌彪老師)"
								);
								
	for($i = 0; $i < count($yes_no_answer); $i++)
	{
	    $tag = "q".(string)($i + 1);
		if ($_POST[$tag]!=$yes_no_answer[$i])
		{
			array_push($yes_no_result, $head.$yes_no_explanation[$i].$tail);
		}
		else
		{
		    array_push($yes_no_result, $correct_head."答對。".$correct_tail);
			$sum++;		
		}
		
	}
/**********檢查選擇題**********/
    //正確答案
    $choice_answer = array(2, 3, 1, 3, 3, 3, 4, 2, 3, 4, 1, 2); 
	//詳解	
	$choice_explanation = array("答案為B，若作者太多（超過兩人）時，則以第一個作者姓，加上 et al. (有句點)",
								"答案為C，論文中，向量必需使用LaTeX的指令打出角括號，不可自己打",
								"答案為A，論文中，章節(title)，每個英文字的第一個字母均需大寫，唯冠詞，介係詞不要大寫",
								"答案為C，引用表格時，必需使用LaTeX的指令\\ref",
								"答案為C，提審應用：proposal、論文應用：thesis ",
								"答案為C，所有專有名詞第一次出現應是斜體字",
								"答案為D，Figure以及Table必需說明後才可放入，且放在該說明段落之「後方」",
								"答案為B，caption整個說明文字以名詞為主，若該名詞無法完全解釋，在該名詞之後(句點)之後，可以用完整句字解釋",
								"答案為C，
								(A)提到Figure或Table就是首字大寫且不加冠詞、因為這是非常明確且唯一的規定\n
								(B)整個說明文字以名詞為主，第一個字母為大寫，其餘為小寫
								(D)雖然效果相同、但請勿混用，emph是用以強調顯示之用、大部份時候會以斜體表示、但偶爾在不同格式下就不是這樣。此時應該用數學變數的表示法、即是直接加\$\$即可",
								"答案為D，參考文獻中，論文名稱有特別規範需要全部大寫(如 DNA)時，需加上大刮號，如 {DNA}",
								"答案為A
								(B)論文題目應簡潔，避免冗長，不需要有「之研究」等相關字眼\n
								(C)題目應是一個「名詞」\n
								(D)若冠詞，連接詞，介係詞等，放在整個題目的第一個字時，應大寫表示",
								"答案為B
								(A)期刊名稱或會議名稱應寫全稱，不要簡寫\n
								(C)應為六碼，以第一位作者前四個英文字母加上其出版年份後兩碼\n
								(D)一般情況下12指的應該是年，而非月");
								
	for($i = 0; $i < count($choice_answer); $i++)
	{
	    $tag = "c".(string)($i + 1);
		if ($_POST[$tag]!=$choice_answer[$i])
		{
			array_push($choice_result, $head.$choice_explanation[$i].$tail);
		}
		else
		{
		    array_push($choice_result, $correct_head."答對。".$correct_tail);	
			$sum++;
		}
		
	}								
}

?>

<html>
<head>
    <meta charset="utf-8">
    <title>Answer</title>
	<style>
	    .note {font-size:50px; font-family:標楷體}
	</style>
</head>

<body bgcolor="#FFF8D7">
	</br>
	<div style="text-align:center;"><h1><font size='16' color='	#DC143C' face='標楷體'>論文寫作注意事項「測驗」</font></h1></div>
		<?php
		$score = 4 * $sum; //每題四分，乘上答對題數
		echo "</br>";
		echo "<p><span class='note'>分數:</span><font size='10' color='red' face='標楷體'>".$score."</font></p>";
	?>
    <form id="myform" name="myform" method="post" action="">
	    <h2><font face='標楷體'>一. 是非題 (每題4分)</font></h2>
	    <p>1. 在論文中一連串數學式一般使用兩個“$$〞夾住即可，例如:$A = a_1, a_2, a_3, a_5, , a_6, , a_7, a_8$。</p>
		<input name="q1" type="radio" value=1 <?php if ($_POST["q1"]== 1) echo "checked";?>>是
		</br>
		<input name="q1" type="radio" value=0 <?php if ($_POST["q1"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[0];

	        }
        ?>
		<p>2. Equation中，不同於撰寫英文句子，不需要句點結尾。</p>
		<input name="q2" type="radio" value=1 <?php if ($_POST["q2"]== 1) echo "checked";?>>是
		</br>
		<input name="q2" type="radio" value=0 <?php if ($_POST["q2"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[1];	
	        }
        ?>
		
		<p>3. bib檔案中，大寫應使用大括號〝{}〞括起來。</p>
		<input name="q3" type="radio" value=1 <?php if ($_POST["q3"]== 1) echo "checked";?>>是
		</br>
		<input name="q3" type="radio" value=0 <?php if ($_POST["q3"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[2];	
	        }
        ?>
		
		<p>4. 章節名稱除了冠詞，介係詞，連接詞等，每個字字首都應該大寫。(但第一個字除外)。</p>
		<input name="q4" type="radio" value=1 <?php if ($_POST["q4"]== 1) echo "checked";?>>是
		</br>
		<input name="q4" type="radio" value=0 <?php if ($_POST["q4"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[3];	
	        }
        ?>
		
		<p>5. 連續的表示法於LaTeX中可以這樣表示:x_1, x_2, 〝...〞, x_10。</p>
		<input name="q5" type="radio" value=1 <?php if ($_POST["q5"]== 1) echo "checked";?>>是
		</br>
		<input name="q5" type="radio" value=0 <?php if ($_POST["q5"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[4];	
	        }
        ?>
		
		<p>6. 符號表必需包括所有主要用的符號。</p>
		<input name="q6" type="radio" value=1 <?php if ($_POST["q6"]== 1) echo "checked";?>>是
		</br>
		<input name="q6" type="radio" value=0 <?php if ($_POST["q6"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[5];	
	        }
        ?>
		
		<p>7. 集合(Set)，字串(String)，矩陣(Matrix)等集合體通常都使用大寫。</p>
		<input name="q7" type="radio" value=1 <?php if ($_POST["q7"]== 1) echo "checked";?>>是
		</br>
		<input name="q7" type="radio" value=0 <?php if ($_POST["q7"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[6];	
	        }
        ?>
		
		<p>8. 變數字型可以隨意使用。</p>
		<input name="q8" type="radio" value=1 <?php if ($_POST["q8"]== 1) echo "checked";?>>是
		</br>
		<input name="q8" type="radio" value=0 <?php if ($_POST["q8"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[7];	
	        }
        ?>
		
		
		<p>9. 圖(Figure)，表(Table)，應置於引用該圖表的LaTeX段落「之前」，且所有的圖表在文中必需引用過。</p>
		<input name="q9" type="radio" value=1 <?php if ($_POST["q9"]== 1) echo "checked";?>>是
		</br>
		<input name="q9" type="radio" value=0 <?php if ($_POST["q9"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[8];	
	        }
        ?>
		<p>10. 圖的說明放在圖的上方，表的說明放在表的下方。</p>
		<input name="q10" type="radio" value=1 <?php if ($_POST["q10"]== 1) echo "checked";?>>是
		</br>
		<input name="q10" type="radio" value=0 <?php if ($_POST["q10"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[9];	
	        }
        ?>		
		<p>11. 所有數學符號應是斜體字 (不包含+, -, *, /等...)。</p>
		<input name="q11" type="radio" value=1 <?php if ($_POST["q11"]== 1) echo "checked";?>>是
		</br>
		<input name="q11" type="radio" value=0 <?php if ($_POST["q11"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[10];	
	        }
        ?>		
		
		<p>12. bib檔案製作文獻資料時，作者姓名之間均需加入 “and”。</p>
		<input name="q12" type="radio" value=1 <?php if ($_POST["q12"]== 1) echo "checked";?>>是
		</br>
		<input name="q12" type="radio" value=0 <?php if ($_POST["q12"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[11];	
	        }
        ?>
		<p>13. 論文印出之後，交出之前，自己一定要再看一遍，格式是否均已正確</p>
		<input name="q13" type="radio" value=1 <?php if ($_POST["q13"]== 1) echo "checked";?>>是
		</br>
		<input name="q13" type="radio" value=0 <?php if ($_POST["q13"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[12];	
	        }
        ?>				

		<h2><font face='標楷體'>二. 選擇題 (每題4分)</font></h2>
		<p>1. 引用作者超過兩個要打什麼在第一位作者(Guo)之後？</p>
		<input name="c1" type="radio" value=1 <?php if ($_POST["c1"]== 1) echo "checked";?>>(A) Guo {\it et al}   
		</br>
		<input name="c1" type="radio" value=2 <?php if ($_POST["c1"]== 2) echo "checked";?>>(B) Guo {\it et al.}
		</br>
		<input name="c1" type="radio" value=3 <?php if ($_POST["c1"]== 3) echo "checked";?>>(C) Guo {\em et al.}
        </br>
		<input name="c1" type="radio" value=4 <?php if ($_POST["c1"]== 4) echo "checked";?>>(D) Guo {\em et al}
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[0];	
	        }
        ?>		
		
		<p>2. 表示vector於.tex檔中，下列何者正確？</p>
		<input name="c2" type="radio" value=1 <?php if ($_POST["c2"]== 1) echo "checked";?>>(A) &lta,b,c&gt
		</br>
		<input name="c2" type="radio" value=2 <?php if ($_POST["c2"]== 2) echo "checked";?>>(B) (a,b,c)
		</br>
		<input name="c2" type="radio" value=3 <?php if ($_POST["c2"]== 3) echo "checked";?>>(C) \langle a, b, c \rangle
        </br>
		<input name="c2" type="radio" value=4 <?php if ($_POST["c2"]== 4) echo "checked";?>>(D) {a,b,c}
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[1];	
	        }
        ?>			

		<p>3. 關於章節標題，下列格式何者正確？</p>
		<input name="c3" type="radio" value=1 <?php if ($_POST["c3"]== 1) echo "checked";?>>(A) Image Compression Based on Fractal with Classification by Vector Quantization 
		</br>
		<input name="c3" type="radio" value=2 <?php if ($_POST["c3"]== 2) echo "checked";?>>(B) Image Compression based on Fractal with Classification by vector quantization 
		</br>
		<input name="c3" type="radio" value=3 <?php if ($_POST["c3"]== 3) echo "checked";?>>(C) image Compression based on Fractal with Classification by vector quantization 
		</br>
		<input name="c3" type="radio" value=4 <?php if ($_POST["c3"]== 4) echo "checked";?>>(D) IMAGE COMPRESSION BASED ON FRACTAL WITH CLASSIFICATION BY VECTOR QUANTIZATION 
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[2];	
	        }
        ?>	
		<p>4. 關於引用Table的寫法 其標籤為：\label{table:mytable}，下列何者正確？</p>
		<input name="c4" type="radio" value=1 <?php if ($_POST["c4"]== 1) echo "checked";?>>(A) table mytable
		</br>
		<input name="c4" type="radio" value=2 <?php if ($_POST["c4"]== 2) echo "checked";?>>(B) Table mytable
		</br>
		<input name="c4" type="radio" value=3 <?php if ($_POST["c4"]== 3) echo "checked";?>>(C) Table \ref{table:mytable}
        </br>
		<input name="c4" type="radio" value=4 <?php if ($_POST["c4"]== 4) echo "checked";?>>(D) \ref{table:mytable}	
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[3];	
	        }
        ?>
		<p>5. 下列名詞何者使用正確？</p>
		<input name="c5" type="radio" value=1 <?php if ($_POST["c5"]== 1) echo "checked";?>>(A) 提審：thesis、論文：thesis
		</br>
		<input name="c5" type="radio" value=2 <?php if ($_POST["c5"]== 2) echo "checked";?>>(B) 提審：thesis、論文：proposal
		</br>
		<input name="c5" type="radio" value=3 <?php if ($_POST["c5"]== 3) echo "checked";?>>(C) 提審：proposal、論文：thesis
        </br>
		<input name="c5" type="radio" value=4 <?php if ($_POST["c5"]== 4) echo "checked";?>>(D) 提審：proposal、論文：proposal
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[4];	
	        }
        ?>

		<p>6. 第一次使用到的專有名詞應該如何表示？</p>
		<input name="c6" type="radio" value=1 <?php if ($_POST["c6"]== 1) echo "checked";?>>(A) Longest common subsequence (LCS)
		</br>
		<input name="c6" type="radio" value=2 <?php if ($_POST["c6"]== 2) echo "checked";?>>(B) \emph{Longest common subsequence (LCS)}
		</br>
		<input name="c6" type="radio" value=3 <?php if ($_POST["c6"]== 3) echo "checked";?>>(C) \emph{Longest common subsequence} (LCS)
        </br>
		<input name="c6" type="radio" value=4 <?php if ($_POST["c6"]== 4) echo "checked";?>>(D) Longest common subsequence \emph{(LCS)}
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[5];	
	        }
        ?>	

		<p>7. Figure及Table應該放置於何處？</p>
		<input name="c7" type="radio" value=1 <?php if ($_POST["c7"]== 1) echo "checked";?>>(A) 隨意放置。
		</br>
		<input name="c7" type="radio" value=2 <?php if ($_POST["c7"]== 2) echo "checked";?>>(B) 使用到該Figure或Table之「章節後方」。
		</br>
		<input name="c7" type="radio" value=3 <?php if ($_POST["c7"]== 3) echo "checked";?>>(C) 使用到該Figure或Table之「段落前方」。
        </br>
		<input name="c7" type="radio" value=4 <?php if ($_POST["c7"]== 4) echo "checked";?>>(D) 使用到該Figure或Table之「段落後方」。
		
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[6];	
	        }
        ?>	

		<p>8. Figure及Table之caption該如何撰寫？</p>
		<input name="c8" type="radio" value=1 <?php if ($_POST["c8"]== 1) echo "checked";?>>(A) 僅以句子描述。例如：This figure show an example of LCS. LCS(A, B) = atgcc.
		</br>
		<input name="c8" type="radio" value=2 <?php if ($_POST["c8"]== 2) echo "checked";?>>(B) 以名詞描述，若該名詞無法完全解釋，在該名詞之後(句點)之後，可以用完整句字解釋。例如：An example of LCS. LCS(A, B) = atgcc.
		</br>
		<input name="c8" type="radio" value=3 <?php if ($_POST["c8"]== 3) echo "checked";?>>(C) 以動詞和名詞描述。例如：This is an example of LCS with LCS(A, B) = atgcc.
		</br>
		<input name="c8" type="radio" value=4 <?php if ($_POST["c8"]== 4) echo "checked";?>>(D) 以上皆是
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[7];	
	        }
        ?>

		<p>9. 關於論文寫作細節，下列哪一位三國人物說的是正確的？</p>
		<b>劉備:論文中出現的表格(table)，前面應該加定冠詞"The"</p>
		<p>孫權:圖表說明以名詞為主，每個單字第一個字母為大寫，其餘為小寫。例如:The Prediction Model.</p>
		<p>曹操:論文圖表置於文中之大小應適當，若不適當，可將其調整 (width= xx pt)</p>
		<p>諸葛亮:在LaTeX中，\emph與$$都能夠使字型產生斜體效果，因此，數學變數也可以這樣使用\emph{a}</p>
		<input name="c9" type="radio" value=1 <?php if ($_POST["c9"]== 1) echo "checked";?>>(A) 劉備
		</br>
		<input name="c9" type="radio" value=2 <?php if ($_POST["c9"]== 2) echo "checked";?>>(B) 孫權
		</br>
		<input name="c9" type="radio" value=3 <?php if ($_POST["c9"]== 3) echo "checked";?>>(C) 曹操
		</br>
		<input name="c9" type="radio" value=4 <?php if ($_POST["c9"]== 4) echo "checked";?>>(D) 諸葛亮
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[8];	
	        }
        ?>		
		
		<p>10. 關於下列注意事項何者錯誤？</p>
		<input name="c10" type="radio" value=1 <?php if ($_POST["c10"]== 1) echo "checked";?>>(A) 所有專有名詞第一次出現應是斜體字，往後則不需斜體字
		</br>
		<input name="c10" type="radio" value=2 <?php if ($_POST["c10"]== 2) echo "checked";?>>(B) 專有名詞第一次出現時，需寫明其全名，例如DNA (deoxyribonucleic acid)
		</br>
		<input name="c10" type="radio" value=3 <?php if ($_POST["c10"]== 3) echo "checked";?>>(C)「Image Compression Based on Fractal with Classification by Vector Quantization」符合英文題目之規定
		</br>
		<input name="c10" type="radio" value=4 <?php if ($_POST["c10"]== 4) echo "checked";?>>(D) 參考文獻中，論文名稱有規範需要全部大寫（如 DNA）時，不需另外標記
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[9];	
	        }
        ?>		
		<p>11. 關於論文中文與英文題目的訂定，下列何者正確？</p>
		<input name="c11" type="radio" value=1 <?php if ($_POST["c11"]== 1) echo "checked";?>>(A) 英文題目可以使用全部單字為大寫的格式，例如:ESTABLISHMENT OF A SECURE ENVIRONMENT OF AD HOC NETWORKS
		</br>
		<input name="c11" type="radio" value=2 <?php if ($_POST["c11"]== 2) echo "checked";?>>(B) 中文題目可以使用「之研究」等相關字眼
		</br>
		<input name="c11" type="radio" value=3 <?php if ($_POST["c11"]== 3) echo "checked";?>>(C) 中文題目可以以動詞作為開頭
		</br>
		<input name="c11" type="radio" value=4 <?php if ($_POST["c11"]== 4) echo "checked";?>>(D) 若冠詞，連接詞，介係詞等，放在英文題目的第一個字時，仍應維持小寫原則
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[10];	
	        }
        ?>		
		
		<p>12. 請問關於下列參考文獻的注意事項何者正確？</p>
		<input name="c12" type="radio" value=1 <?php if ($_POST["c12"]== 1) echo "checked";?>>(A) 參考文獻中每一篇論文之資料必需非常完整，另外，期刊名稱或會議名稱可以簡寫
		</br>
		<input name="c12" type="radio" value=2 <?php if ($_POST["c12"]== 2) echo "checked";?>>(B) 所有參考文獻均按照第一位作者姓氏之順序排列
		</br>
		<input name="c12" type="radio" value=3 <?php if ($_POST["c12"]== 3) echo "checked";?>>(C) 所有參考文獻均按照第一位作者姓氏之順序排列。以第一位作者前三個英文字母加上其出版年份後兩碼，共計五碼為該文獻代稱
		</br>
		<input name="c12" type="radio" value=4 <?php if ($_POST["c12"]== 4) echo "checked";?>>(D) thesis_lajih12.tex代表12月更新的檔案
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[11];	
	        }
        ?>

		
		</br>
		</br>
		<input name="action" type="hidden" value="add">
		<input name="button" type="button" value="again" onClick="document.location.href='question1.php'">
	</form>
</body>
</html>