<!doctype html>
<?php
//紀錄是非題，選擇題的錯的詳解array。
$yes_no_result = array();
$choice_result = array();
$mchoice_result = array();
//串接寫錯題目的html tag
$head = "<p><font size='5' color='red' face='標楷體'>";
$tail = "</font></p>";
//串接正確題目的html tag
$correct_head = "<p><font size='5' color='blue' face='標楷體'>";
$correct_tail = "</font></p>";
if(isset($_POST["action"]) && ($_POST["action"]=="add"))
{
/**********檢查是非題**********/
	$TFsum = 0;
	$Csum = 0;
	$MCsum = 0;
    //正確答案
    $yes_no_answer = array(0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 0, 1, 1); 
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
								"答案為是。論文寫作注意事項詳讀後，並誓言嚴格遵循者，請 e-mail 給：cbyang@cse.nsysu.edu.tw (楊昌彪老師)",
								"答案為否，每個數學公式或方程式之後，都應有句點或逗點。",
								"答案為否，寫...時，置於下方時請用\ldots，置於中間時請用\cdots。",
								"答案為是。",
								"答案為是。"
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
			$TFsum++;		
		}
		
	}
	/**********檢查選擇題**********/
		//正確答案
		$choice_answer = array(2, 3, 1, 3, 3, 3, 4, 2, 3, 4, 1, 2, 4, 3, 3, 2, 4, 4, 3, 1, 3, 4, 2, 3, 1, 1); 
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
									(D)一般情況下12指的應該是年，而非月",
									"答案為D，變數為斜體即可，其餘維持正常字體",
									"答案為C，需加上Proceedings of，正確應為Shrikant Kashyap, Mong Li Lee, Wynne Hsu. \"Similar Subsequence Search in Time Series Databases\". Proceedings of the 22 International Conference on Database and Expert Systems Applications, Toulouse, France, pp. 232-246, 2011.",
									"答案為C",
									"答案為B，中間應為-，且應該使用package cite來自動排序，在\documentstyle[]的中括號裡增加cite即可",
									"答案為D",
									"答案為D",
									"答案為C",
									"答案為A",
									"答案為C",
									"答案為D",
									"答案為B",
									"答案為C",
									"答案為A",
									"答案為A",
									);
									
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
				$Csum++;
			}
			
		}


/**********檢查多選題**********/
    //正確答案
    $mchoice_answer = array("1"=>array(0=>"1", 1=>"2")); 
	//詳解	
	$mchoice_explanation = array("答案為AB",
								);

	for($x = 1; $x <= count($mchoice_answer); $x++){
		$answer="";
		if(isset($_POST['optionsCheckbox'.$x])){
			$answer = implode("",$_POST['optionsCheckbox'.$x]);
		}
		$RAns=implode("",$mchoice_answer[$x]);
		// echo "pos:".$RAns."</br>";
		// echo "ans:".$answer."</br>";
		// echo "ans == pos = ".($answer === $RAns)."</br>";
		// alert("ans: " + answer);
		if($answer == $RAns){
			// echo "they are same"."</br>";
			array_push($mchoice_result, $correct_head."答對。".$correct_tail);	
			$MCsum++;
		}
		else{
			// echo "they are not same"."</br>";
			array_push($mchoice_result, $head.$mchoice_explanation[$x - 1].$tail);
		}
	}
	// for($i = 0; $i < count($choice_answer); $i++)
	// {
	//     $tag = "c".(string)($i + 1);
	// 	if ($_POST[$tag]!=$choice_answer[$i])
	// 	{
	// 		array_push($choice_result, $head.$choice_explanation[$i].$tail);
	// 	}
	// 	else
	// 	{
	// 	    array_push($choice_result, $correct_head."答對。".$correct_tail);	
	// 		$sum++;
	// 	}
		
	// }								
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
		$score = $TFsum + 3 * $Csum + 10 * $MCsum; //是非1分，選擇3分，多選10分
		echo "</br>";
		echo "<p><span class='note'>分數:</span><font size='10' color='red' face='標楷體'>".$score."</font></p>";
	?>
    <form id="myform" name="myform" method="post" action="">
	    <h2><font face='標楷體'>一. 是非題 (每題1分)</font></h2>
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
		
		<p>14. 每個數學公式或方程式之後，不需要有句點或逗點。</p>
		<input name="q14" type="radio" value=1 <?php if ($_POST["q14"]== 1) echo "checked";?>>是
		</br>
		<input name="q14" type="radio" value=0 <?php if ($_POST["q14"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[13];	
	        }
        ?>
		
		<p>15. 寫...時，置於下方時直接使用鍵盤鍵入...，置於中間時直接鍵入···即可。</p>
		<input name="q15" type="radio" value=1 <?php if ($_POST["q15"]== 1) echo "checked";?>>是
		</br>
		<input name="q15" type="radio" value=0 <?php if ($_POST["q15"]== 0) echo "checked";?>>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[14];	
	        }
        ?>

		<p>16. 出現在圖片裡的變數需要用斜體表示?</p>
		<input name="q16" type="radio" value=1>是
		</br>
		<input name="q16" type="radio" value=0>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[15];	
	        }
        ?>

		<p>17. 使用極限值函示如max min時不須斜體，且必須使用大括號{}?</p>
		<input name="q17" type="radio" value=1>是
		</br>
		<input name="q17" type="radio" value=0>否
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($yes_no_result))
	        {
				echo "<br/>";
				echo $yes_no_result[16];	
	        }
        ?>

		<h2><font face='標楷體'>二. 選擇題 (每題3分)</font></h2>
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
		
		<p>13. 請問下列序數的表達何者錯誤？</p>
		<input name="c13" type="radio" value=1 <?php if ($_POST["c13"]== 1) echo "checked";?>>(A) 5th, 6th
		</br>
		<input name="c13" type="radio" value=2 <?php if ($_POST["c13"]== 2) echo "checked";?>>(B) (<i>i</i>+1)th
		</br>
		<input name="c13" type="radio" value=3 <?php if ($_POST["c13"]== 3) echo "checked";?>>(C) 1st, 2nd, 3rd
		</br>
		<input name="c13" type="radio" value=4 <?php if ($_POST["c13"]== 4) echo "checked";?>>(D) <i>jth</i>
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[12];	
	        }
        ?>
		
		<p>14. 請問下列reference何者錯誤？</p>
		<input name="c14" type="radio" value=1 <?php if ($_POST["c14"]== 1) echo "checked";?>>(A) Jason Lines, Anthony Bagnall. "Time series classification with ensembles of elastic distance measures". Data Mining and Knowledge Discovery, Volume 29, Issue 3, pp. 565–592, May 2015.
		</br>
		<input name="c14" type="radio" value=2 <?php if ($_POST["c14"]== 2) echo "checked";?>>(B) Shunsuke Inenaga, Heikki Hyyrö. "A hardness result and new algorithm for the longest common palindromic subsequence problem". Information Processing Letters, Volume 129, pp. 11–15, 2018.
		</br>
		<input name="c14" type="radio" value=3 <?php if ($_POST["c14"]== 3) echo "checked";?>>(C) Shrikant Kashyap, Mong Li Lee, Wynne Hsu. "Similar Subsequence Search in Time Series Databases". The 22 International Conference on Database and Expert Systems Applications, Toulouse, France, pp. 232-246, 2011.
		</br>
		<input name="c14" type="radio" value=4 <?php if ($_POST["c14"]== 4) echo "checked";?>>(D) Lei Chen, Raymond Ng. "On the Marriage of Lp-norms and Edit Distance". Proceedings of the 30th International Conference on Very Large Data Bases, Volume 30, pp. 792-803, Toronto, Canada, 2004.
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[13];	
	        }
        ?>
		
		<p>15. 在論文的敘述中引用公式時，下列LaTex語法何者正確？</p>
		<input name="c15" type="radio" value=1 <?php if ($_POST["c15"]== 1) echo "checked";?>>(A) \ref{eq:weight_1}
		</br>
		<input name="c15" type="radio" value=2 <?php if ($_POST["c15"]== 2) echo "checked";?>>(B) \cite{weight_1}
		</br>
		<input name="c15" type="radio" value=3 <?php if ($_POST["c15"]== 3) echo "checked";?>>(C) \eqref{eq:weight_1}
		</br>
		<input name="c15" type="radio" value=4 <?php if ($_POST["c15"]== 4) echo "checked";?>>(D) \eqref{weight_1}
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[14];	
	        }
        ?>

		<p>16. 關於引用參考文獻的格式，請問下列何者錯誤？</p>
		<input name="c16" type="radio" value=1 <?php if ($_POST["c16"]== 1) echo "checked";?>>(A) 論文的編號應該按照順序，例如：[1, 3, 5, 7]
		</br>
		<input name="c16" type="radio" value=2 <?php if ($_POST["c16"]== 2) echo "checked";?>>(B) 對於連續的編號應該使用"~"來取代中間的數字，例如：[1, 3, 4, 5] 應該寫成 [1, 3~5]
		</br>
		<input name="c16" type="radio" value=3 <?php if ($_POST["c16"]== 3) echo "checked";?>>(C) 引用本身須視為一個單字，因此與其他單字中間須有空格，例如：LCS [1, 3, 5, 7] and LCIS [6, 9]
		</br>
		<input name="c16" type="radio" value=4 <?php if ($_POST["c16"]== 4) echo "checked";?>>(D) 引用的參考文獻是寫在bib檔中，再根據裡面給的文獻代稱來cite，例如：\cite{Hunt77, Naka82}
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[15];	
	        }
        ?>

		<!-- edit by janjp at 20210926 -->
		
		<p>17. 下列何者latex語法能夠以斜體字輸出"Hello World"？</p>
		<input name="c17" type="radio" value=1>(A) Hello World
		</br>
		<input name="c17" type="radio" value=2>(B) $Hello World$
		</br>
		<input name="c17" type="radio" value=3>(C) \it{Hello World}
		</br>
		<input name="c17" type="radio" value=4>(D) {\it Hello World}
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[16];	
	        }
        ?>
		
		<p>18. 在bib檔中引用的論文title如果想要保持與輸入的一致，請問下列何者正確?(以Human-Mouse Alignments with BLASTZ為例)</p>
		<input name="c18" type="radio" value=1>(A) title=Human-Mouse Alignments with BLASTZ
		</br>
		<input name="c18" type="radio" value=2>(B) title="Human-Mouse Alignments with BLASTZ"
		</br>
		<input name="c18" type="radio" value=3>(C) title={Human-Mouse Alignments with BLASTZ}
		</br>
		<input name="c18" type="radio" value=4>(D) title="{Human-Mouse Alignments with BLASTZ}"
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[17];	
	        }
        ?>
		
		<p>19. 在table中想要固定長度的同時能控制置左置中置右，請問下列何者正確? (以固定2cm，順序為置左置中置右)</p>
		<input name="c19" type="radio" value=1>(A) {|l|c|r|}
		</br>
		<input name="c19" type="radio" value=2>(B) {|l{2cm}|c{2cm}|r{2cm}|}
		</br>
		<input name="c19" type="radio" value=3>(C) {|>{\raggedleft}p{2cm}|>{\centering}p{2cm}|>{\raggedright \arraybackslash}p{2cm}|}
		</br>
		<input name="c19" type="radio" value=4>(D) {|>{\raggedleft}p{2cm}|>{\centering}p{2cm}|>{\raggedleft}p{2cm}|}
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[18];	
	        }
        ?>
		
		<p>20. 請問以下何者為大空格(1/3 m)</p>
		<input name="c20" type="radio" value=1>(A) a\ b
		</br>
		<input name="c20" type="radio" value=2>(B) a\;b
		</br>
		<input name="c20" type="radio" value=3>(C) a\,b
		</br>
		<input name="c20" type="radio" value=4>(D) a\!b
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[19];	
	        }
        ?>
		
		<p>21. 請問以下何者為小空格(1/6 m)</p>
		<input name="c21" type="radio" value=1>(A) a\ b
		</br>
		<input name="c21" type="radio" value=2>(B) a\;b
		</br>
		<input name="c21" type="radio" value=3>(C) a\,b
		</br>
		<input name="c21" type="radio" value=4>(D) a\!b
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[20];	
	        }
        ?>
		
		<p>22. 請問以下何者為緊貼(縮進 1/6 m)</p>
		<input name="c22" type="radio" value=1>(A) a\ b
		</br>
		<input name="c22" type="radio" value=2>(B) a\;b
		</br>
		<input name="c22" type="radio" value=3>(C) a\,b
		</br>
		<input name="c22" type="radio" value=4>(D) a\!b
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[21];	
	        }
        ?>
		
		<p>23. 請問以下何者為中空格(2/7 m)</p>
		<input name="c23" type="radio" value=1>(A) a\ b
		</br>
		<input name="c23" type="radio" value=2>(B) a\;b
		</br>
		<input name="c23" type="radio" value=3>(C) a\,b
		</br>
		<input name="c23" type="radio" value=4>(D) a\!b
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[22];	
	        }
        ?>
		
		<p>24. 以下哪項命令不可以並排顯示表格</p>
		<input name="c24" type="radio" value=1>(A) \subtable
		</br>
		<input name="c24" type="radio" value=2>(B) \minipage
		</br>
		<input name="c24" type="radio" value=3>(C) \subfigure
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[23];	
	        }
        ?>
		
		<p>25. 以下哪項命令不可以並排顯示圖片</p>
		<input name="c25" type="radio" value=1>(A) \subtable
		</br>
		<input name="c25" type="radio" value=2>(B) \minipage
		</br>
		<input name="c25" type="radio" value=3>(C) \subfigure
		</br>
		<input name="c25" type="radio" value=4>(D) \subfig
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[24];	
	        }
        ?>
		
		<p>26. 以下哪一項是圖片和表格的默認對齊方式</p>
		<input name="c26" type="radio" value=1>(A) left
		</br>
		<input name="c26" type="radio" value=2>(B) right
		</br>
		<input name="c26" type="radio" value=3>(C) center
		</br>
		<input name="c26" type="radio" value=4>(D) outer
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $choice_result[25];
	        }
        ?>

		<h2><font face='標楷體'>三. 多選題 (每題10分)</font></h2>
		<li>安裝 ulem包會導致\emph從斜體變成畫底線，請問要怎麼解決?<br>
			<label class="radio">
				<input type="checkbox" name="optionsCheckbox1[]" id="optionsRadios1" value="1">
				砍掉ulem包
			</label></br>
			<label class="radio">
				<input type="checkbox" name="optionsCheckbox1[]" id="optionsRadios2" value="2">
				內文加上\normalem
			</label></br>
			<label class="radio">
				<input type="checkbox" name="optionsCheckbox1[]" id="optionsRadios3" value="3">
				不要畢業
			</label></br>
			<label class="radio">
				<input type="checkbox" name="optionsCheckbox1[]" id="optionsRadios4" value="4">
				內文加上\allowdisplaybreaks
			</label></br>
		</li>
		<?php
		    if(isset($_POST["action"]) && ($_POST["action"]=="add")  && !empty($choice_result))
	        {
				echo "<br/>";
				echo $mchoice_result[0];
	        }
        ?>


		</br>
		</br>
		<input name="action" type="hidden" value="add">
		<input name="button" type="button" value="again" onClick="document.location.href='question201903.php'">
	</form>
</body>
</html>