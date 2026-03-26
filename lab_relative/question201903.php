<!doctype html>

<html>
<head>
    <meta charset="utf-8">
    <title>Question</title>
<script type="text/javascript">
/**********檢查哪些題目未填寫***********/
		function reset()
		{   path=unescape(document.location.href);
			if(path.lastIndexOf("?1")<0) location.href=path+"?1";
		    //document.location = 'question.php';
			//window.location.reload(true)
		}
        function check()
        {
			var YES_No_MAX = 17;
			var CHOICE_MAX = 26;
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
    <form id="myform" name="myform" method="post" action="answer201903.php">
	    <h2><font face='標楷體'>一. 是非題 (每題1分)</font></h2>
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
		
		<p>14. 每個數學公式或方程式之後，不需要有句點或逗點。</p>
		<input name="q14" type="radio" value=1>是
		</br>
		<input name="q14" type="radio" value=0>否
		
		<p>15. 寫...時，置於下方時直接使用鍵盤鍵入...，置於中間時直接鍵入···即可。</p>
		<input name="q15" type="radio" value=1>是
		</br>
		<input name="q15" type="radio" value=0>否
		<!-- edit by janjp at 20210926 -->
		<p>16. 出現在圖片裡的變數需要用斜體表示?</p>
		<input name="q16" type="radio" value=1>是
		</br>
		<input name="q16" type="radio" value=0>否

		<p>17. 使用極限值函示如max min時不須斜體，且必須使用大括號{}?</p>
		<input name="q17" type="radio" value=1>是
		</br>
		<input name="q17" type="radio" value=0>否
		
		<h2><font face='標楷體'>二. 選擇題 (每題3分)</font></h2>
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
		
		<p>13. 請問下列序數的表達何者錯誤？</p>
		<input name="c13" type="radio" value=1>(A) 5th, 6th
		</br>
		<input name="c13" type="radio" value=2>(B) (<i>i</i>+1)th
		</br>
		<input name="c13" type="radio" value=3>(C) 1st, 2nd, 3rd
		</br>
		<input name="c13" type="radio" value=4>(D) <i>jth</i>
		
		<p>14. 請問下列reference何者錯誤？</p>
		<input name="c14" type="radio" value=1>(A) Jason Lines, Anthony Bagnall. "Time series classification with ensembles of elastic distance measures". Data Mining and Knowledge Discovery, Volume 29, Issue 3, pp. 565–592, May 2015.
		</br>
		<input name="c14" type="radio" value=2>(B) Shunsuke Inenaga, Heikki Hyyrö. "A hardness result and new algorithm for the longest common palindromic subsequence problem". Information Processing Letters, Volume 129, pp. 11–15, 2018.
		</br>
		<input name="c14" type="radio" value=3>(C) Shrikant Kashyap, Mong Li Lee, Wynne Hsu. "Similar Subsequence Search in Time Series Databases". The 22th International Conference on Database and Expert Systems Applications, Toulouse, France, pp. 232-246, 2011.
		</br>
		<input name="c14" type="radio" value=4>(D) Lei Chen, Raymond Ng. "On the Marriage of Lp-norms and Edit Distance". Proceedings of the 30th International Conference on Very Large Data Bases, Volume 30, pp. 792-803, Toronto, Canada, 2004.

		<p>15. 在論文的敘述中引用公式時，下列LaTex語法何者正確？</p>
		<input name="c15" type="radio" value=1>(A) \ref{eq:weight_1}
		</br>
		<input name="c15" type="radio" value=2>(B) \cite{weight_1}
		</br>
		<input name="c15" type="radio" value=3>(C) \eqref{eq:weight_1}
		</br>
		<input name="c15" type="radio" value=4>(D) \eqref{weight_1}
		
		<p>16. 關於引用參考文獻的格式，請問下列何者錯誤？</p>
		<input name="c16" type="radio" value=1>(A) 論文的編號應該按照順序，例如：[1, 3, 5, 7]
		</br>
		<input name="c16" type="radio" value=2>(B) 對於連續的編號應該使用"~"來取代中間的數字，例如：[1, 3, 4, 5] 應該寫成 [1, 3~5]
		</br>
		<input name="c16" type="radio" value=3>(C) 引用本身須視為一個單字，因此與其他單字中間須有空格，例如：LCS [1, 3, 5, 7] and LCIS [6, 9]
		</br>
		<input name="c16" type="radio" value=4>(D) 引用的參考文獻是寫在bib檔中，再根據裡面給的文獻代稱來cite，例如：\cite{Hunt77, Naka82}

		<!-- edit by janjp at 20210926 -->
		
		<p>17. 下列何者latex語法能夠以斜體字輸出"Hello World"？</p>
		<input name="c17" type="radio" value=1>(A) Hello World
		</br>
		<input name="c17" type="radio" value=2>(B) $Hello World$
		</br>
		<input name="c17" type="radio" value=3>(C) \it{Hello World}
		</br>
		<input name="c17" type="radio" value=4>(D) {\it Hello World}
		
		<p>18. 在bib檔中引用的論文title如果想要保持與輸入的一致，請問下列何者正確?(以Human-Mouse Alignments with BLASTZ為例)</p>
		<input name="c18" type="radio" value=1>(A) title=Human-Mouse Alignments with BLASTZ
		</br>
		<input name="c18" type="radio" value=2>(B) title="Human-Mouse Alignments with BLASTZ"
		</br>
		<input name="c18" type="radio" value=3>(C) title={Human-Mouse Alignments with BLASTZ}
		</br>
		<input name="c18" type="radio" value=4>(D) title="{Human-Mouse Alignments with BLASTZ}"
		
		<p>19. 在table中想要固定長度的同時能控制置左置中置右，請問下列何者正確? (以固定2cm，順序為置左置中置右)</p>
		<input name="c19" type="radio" value=1>(A) {|l|c|r|}
		</br>
		<input name="c19" type="radio" value=2>(B) {|l{2cm}|c{2cm}|r{2cm}|}
		</br>
		<input name="c19" type="radio" value=3>(C) {|>{\raggedleft}p{2cm}|>{\centering}p{2cm}|>{\raggedright \arraybackslash}p{2cm}|}
		</br>
		<input name="c19" type="radio" value=4>(D) {|>{\raggedleft}p{2cm}|>{\centering}p{2cm}|>{\raggedleft}p{2cm}|}
		
		<p>20. 請問以下何者為大空格(1/3 m)</p>
		<input name="c20" type="radio" value=1>(A) a\ b
		</br>
		<input name="c20" type="radio" value=2>(B) a\;b
		</br>
		<input name="c20" type="radio" value=3>(C) a\,b
		</br>
		<input name="c20" type="radio" value=4>(D) a\!b
		
		<p>21. 請問以下何者為小空格(1/6 m)</p>
		<input name="c21" type="radio" value=1>(A) a\ b
		</br>
		<input name="c21" type="radio" value=2>(B) a\;b
		</br>
		<input name="c21" type="radio" value=3>(C) a\,b
		</br>
		<input name="c21" type="radio" value=4>(D) a\!b
		
		<p>22. 請問以下何者為緊貼(縮進 1/6 m)</p>
		<input name="c22" type="radio" value=1>(A) a\ b
		</br>
		<input name="c22" type="radio" value=2>(B) a\;b
		</br>
		<input name="c22" type="radio" value=3>(C) a\,b
		</br>
		<input name="c22" type="radio" value=4>(D) a\!b
		
		<p>23. 請問以下何者為中空格(2/7 m)</p>
		<input name="c23" type="radio" value=1>(A) a\ b
		</br>
		<input name="c23" type="radio" value=2>(B) a\;b
		</br>
		<input name="c23" type="radio" value=3>(C) a\,b
		</br>
		<input name="c23" type="radio" value=4>(D) a\!b
		
		<p>24. 以下哪項命令不可以並排顯示表格</p>
		<input name="c24" type="radio" value=1>(A) \subtable
		</br>
		<input name="c24" type="radio" value=2>(B) \minipage
		</br>
		<input name="c24" type="radio" value=3>(C) \subfigure
		
		<p>25. 以下哪項命令不可以並排顯示圖片</p>
		<input name="c25" type="radio" value=1>(A) \subtable
		</br>
		<input name="c25" type="radio" value=2>(B) \minipage
		</br>
		<input name="c25" type="radio" value=3>(C) \subfigure
		</br>
		<input name="c25" type="radio" value=4>(D) \subfig
		
		<p>26. 以下哪一項是圖片和表格的默認對齊方式</p>
		<input name="c26" type="radio" value=1>(A) left
		</br>
		<input name="c26" type="radio" value=2>(B) right
		</br>
		<input name="c26" type="radio" value=3>(C) center
		</br>
		<input name="c26" type="radio" value=4>(D) outer

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

		</br>
		</br>
		<input name="action" type="hidden" value="add">
		<input name="submit" type="submit" value="submit" onClick="return check()">
	</form>
</body>
</html>