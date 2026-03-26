<!doctype html>

<html>
<head>
    <meta charset="utf-8">
    <title>Question</title>
<script type="text/javascript">
/**********檢察打些題目未填寫***********/
		function reset()
		{   path=unescape(document.location.href);
			if(path.lastIndexOf("?1")<0) location.href=path+"?1";
		    //document.location = 'question.php';
			//window.location.reload(true)
		}
        function check()
        {
			var YES_No_MAX = 13;
			var CHOICE_MAX = 12;
			var flag = 1
			
			/*********檢查是非題哪些沒填寫**********/	
			var msg = "";
			for(var i = 1; i <= YES_No_MAX; i++)
			{
				if(myform.elements["q" + i].value == '')
				{
					msg += (i + ", ");
					flag = 0
				}
				
			}	
			/*********檢查選擇題哪些沒填寫**********/
			var choice_msg = "";
			for(var i = 1; i <= CHOICE_MAX; i++)
			{
				if(myform.elements["c" + i].value == '')
				{
					choice_msg += (i + ", ");
					flag = 0
				}	
			}
			if(!flag)
			{
				//印出沒寫的題號。
				if(msg.length > 0)
					alert("是非題: " + msg + "未填寫!");
				if(choice_msg.length > 0)
				    alert("選擇題: " + choice_msg + "未填寫!");
				return false;
		    }
			else
				return true;
		}
    </script>
</head>

<body bgcolor="#FFF8D7">
	</br>
	<div style="text-align:center;"><h1><font size='16' color='#DC143C' face='標楷體'>論文寫作注意事項「測驗」</font></h1></div>
    <form id="myform" name="myform" method="post" action="answer.php">
	    <h2><font face='標楷體'>一. 是非題 (每題4分)</font></h2>
	    <p>1. 在論文中一連串數學式一般使用兩個“$$〞夾住即可，例如:$A = a_1, a_2, a_3, a_5, , a_6, , a_7, a_8$。</p>
		<input name="q1" type="radio" value=1 >是
		</br>
		<input name="q1" type="radio" value=0 >否
		
		<p>2. Equation中，不同於撰寫英文句子，不需要句點結尾。</p>
		<input name="q2" type="radio" value=1>是
		</br>
		<input name="q2" type="radio" value=0>否

		
		<p>3. bib檔案中，大寫應使用大括號〝{}〞括起來。</p>
		<input name="q3" type="radio" value=1>是
		</br>
		<input name="q3" type="radio" value=0>否
		
		<p>4. 章節名稱除了冠詞，介係詞，連接詞等，每個字字首都應該大寫。(但第一個字除外)。</p>
		<input name="q4" type="radio" value=1>是
		</br>
		<input name="q4" type="radio" value=0>否

		<p>5. 連續的表示法於LaTeX中可以這樣表示:x_1, x_2, 〝...〞, x_10。</p>
		<input name="q5" type="radio" value=1>是
		</br>
		<input name="q5" type="radio" value=0>否
		
		<p>6. 符號表必需包括所有主要用的符號。</p>
		<input name="q6" type="radio" value=1>是
		</br>
		<input name="q6" type="radio" value=0>否
		
		<p>7. 集合(Set)，字串(String)，矩陣(Matrix)等集合體通常都使用大寫。</p>
		<input name="q7" type="radio" value=1>是
		</br>
		<input name="q7" type="radio" value=0>否
		
		<p>8. 變數字型可以隨意使用</p>
		<input name="q8" type="radio" value=1>是
		</br>
		<input name="q8" type="radio" value=0>否

		<p>9. 圖(Figure)，表(Table)，應置於引用該圖表的LaTeX段落「之前」，且所有的圖表在文中必需引用過。</p>
		<input name="q9" type="radio" value=1>是
		</br>
		<input name="q9" type="radio" value=0>否
		
		<p>10. 圖的說明放在圖的上方，表的說明放在表的下方。</p>
		<input name="q10" type="radio" value=1>是
		</br>
		<input name="q10" type="radio" value=0>否
		
		<p>11. 所有數學符號應是斜體字 (不包含+, -, *, /等...)。</p>
		<input name="q11" type="radio" value=1>是
		</br>
		<input name="q11" type="radio" value=0>否	
		
		<p>12. bib檔案製作文獻資料時，作者姓名之間均需加入 “and”。</p>
		<input name="q12" type="radio" value=1>是
		</br>
		<input name="q12" type="radio" value=0>否
		
		<p>13. 論文印出之後，交出之前，自己一定要再看一遍，格式是否均已正確。</p>
		<input name="q13" type="radio" value=1>是
		</br>
		<input name="q13" type="radio" value=0>否		
		
		<h2><font face='標楷體'>二. 選擇題 (每題4分)</font></h2>
		<p>1. 引用作者三個或以上要打什麼在第一位作者(Guo)之後？</p>
		<input name="c1" type="radio" value=1>(A) Guo {\it et al}   
		</br>
		<input name="c1" type="radio" value=2>(B) Guo {\it et al.}
		</br>
		<input name="c1" type="radio" value=3>(C) Guo {\em et al.}
        </br>
		<input name="c1" type="radio" value=4>(D) Guo {\em et al}
			
		<p>2. 表示vector於.tex檔中，下列何者正確？</p>
		<input name="c2" type="radio" value=1>(A) &lta,b,c&gt
		</br>
		<input name="c2" type="radio" value=2>(B) (a,b,c)
		</br>
		<input name="c2" type="radio" value=3>(C) \langle a, b, c \rangle
        </br>
		<input name="c2" type="radio" value=4>(D) {a,b,c}		

		<p>3. 關於章節標題，下列格式何者正確？</p>
		<input name="c3" type="radio" value=1>(A) Image Compression Based on Fractal with Classification by Vector Quantization 
		</br>
		<input name="c3" type="radio" value=2>(B) Image Compression based on Fractal with Classification by vector quantization 
		</br>
		<input name="c3" type="radio" value=3>(C) image Compression based on Fractal with Classification by vector quantization 
		</br>
		<input name="c3" type="radio" value=4>(D) IMAGE COMPRESSION BASED ON FRACTAL WITH CLASSIFICATION BY VECTOR QUANTIZATION 

		<p>4. 關於引用Table的寫法 其標籤為：\label{table:mytable}，下列何者正確？</p>
		<input name="c4" type="radio" value=1>(A) table mytable
		</br>
		<input name="c4" type="radio" value=2>(B) Table mytable
		</br>
		<input name="c4" type="radio" value=3>(C) Table \ref{table:mytable}
        </br>
		<input name="c4" type="radio" value=4>(D) \ref{table:mytable}	

		<p>5. 下列名詞何者使用正確？</p>
		<input name="c5" type="radio" value=1>(A) 提審：thesis、論文：thesis
		</br>
		<input name="c5" type="radio" value=2>(B) 提審：thesis、論文：proposal
		</br>
		<input name="c5" type="radio" value=3>(C) 提審：proposal、論文：thesis
        </br>
		<input name="c5" type="radio" value=4>(D) 提審：proposal、論文：proposal

		<p>6. 第一次使用到的專有名詞應該如何表示？</p>
		<input name="c6" type="radio" value=1>(A) Longest common subsequence (LCS)
		</br>
		<input name="c6" type="radio" value=2>(B) \emph{Longest common subsequence (LCS)}
		</br>
		<input name="c6" type="radio" value=3>(C) \emph{Longest common subsequence} (LCS)
        </br>
		<input name="c6" type="radio" value=4>(D) Longest common subsequence \emph{(LCS)}

		<p>7. Figure及Table應該放置於何處？</p>
		<input name="c7" type="radio" value=1>(A) 隨意放置。
		</br>
		<input name="c7" type="radio" value=2>(B) 使用到該Figure或Table之「章節後方」。
		</br>
		<input name="c7" type="radio" value=3>(C) 使用到該Figure或Table之「段落前方」。
        </br>
		<input name="c7" type="radio" value=4>(D) 使用到該Figure或Table之「段落後方」。

		<p>8. Figure及Table之caption該如何撰寫？</p>
		<input name="c8" type="radio" value=1>(A) 僅以句子描述。例如：This figure show an example of LCS. LCS(A, B) = atgcc.
		</br>
		<input name="c8" type="radio" value=2>(B) 以名詞描述，若該名詞無法完全解釋，在該名詞之後(句點)之後，可以用完整句字解釋。例如：An example of LCS. LCS(A, B) = atgcc.
		</br>
		<input name="c8" type="radio" value=3>(C) 以動詞和名詞描述。例如：This is an example of LCS with LCS(A, B) = atgcc.
		</br>
		<input name="c8" type="radio" value=4>(D) 以上皆是
		
		<p>9. 關於論文寫作細節，下列哪一位三國人物說的是正確的？</p>
		<p>劉備:論文中出現的表格(table)，前面應該加定冠詞"The"</p>
		<p>孫權:圖表說明以名詞為主，每個單字第一個字母為大寫，其餘為小寫。例如:The Prediction Model.</p>
		<p>曹操:論文圖表置於文中之大小應適當，若不適當，可將其調整 (width= xx pt)</p>
		<p>諸葛亮:在LaTeX中，\emph與$$都能夠使字型產生斜體效果，因此，數學變數也可以這樣使用\emph{a}</p>
		<input name="c9" type="radio" value=1>(A) 劉備
		</br>
		<input name="c9" type="radio" value=2>(B) 孫權
		</br>
		<input name="c9" type="radio" value=3>(C) 曹操
		</br>
		<input name="c9" type="radio" value=4>(D) 諸葛亮
		
		
		<p>10. 關於下列注意事項何者錯誤？</p>
		<input name="c10" type="radio" value=1>(A) 所有專有名詞第一次出現應是斜體字，往後則不需斜體字
		</br>
		<input name="c10" type="radio" value=2>(B) 專有名詞第一次出現時，需寫明其全名，例如DNA (deoxyribonucleic acid)
		</br>
		<input name="c10" type="radio" value=3>(C)「Image Compression Based on Fractal with Classification by Vector Quantization」符合英文題目之規定
		</br>
		<input name="c10" type="radio" value=4>(D) 參考文獻中，論文名稱有規範需要全部大寫（如 DNA）時，不需另外標記
		
		<p>11. 關於論文中文與英文題目的訂定，下列何者正確？</p>
		<input name="c11" type="radio" value=1>(A) 英文題目可以使用全部單字為大寫的格式，例如:ESTABLISHMENT OF A SECURE ENVIRONMENT OF AD HOC NETWORKS
		</br>
		<input name="c11" type="radio" value=2>(B) 中文題目可以使用「之研究」等相關字眼
		</br>
		<input name="c11" type="radio" value=3>(C) 中文題目可以以動詞作為開頭
		</br>
		<input name="c11" type="radio" value=4>(D) 若冠詞，連接詞，介係詞等，放在英文題目的第一個字時，仍應維持小寫原則
		
		<p>12. 請問關於下列參考文獻的注意事項何者正確？</p>
		<input name="c12" type="radio" value=1>(A) 參考文獻中每一篇論文之資料必需非常完整，另外，期刊名稱或會議名稱可以簡寫
		</br>
		<input name="c12" type="radio" value=2>(B) 所有參考文獻均按照第一位作者姓氏之順序排列
		</br>
		<input name="c12" type="radio" value=3>(C) 所有參考文獻均按照第一位作者姓氏之順序排列。以第一位作者前三個英文字母加上其出版年份後兩碼，共計五碼為該文獻代稱
		</br>
		<input name="c12" type="radio" value=4>(D) thesis_lajih12.tex代表12月更新的檔案
		
		</br>
		</br>
		<input name="action" type="hidden" value="add">
		<input name="submit" type="submit" value="submit" onClick="return check()">
	</form>
</body>
</html>