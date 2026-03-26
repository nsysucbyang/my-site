<!DOCTYPE html>
<html>
<head>
<title>CPE 程式碼撰寫標準</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<h1>CPE 程式碼撰寫標準</h1>
Coding Standards</BR>
1.空白的使用</BR>
</BR>
運算元 ，標點符號，旁邊用一個空白隔開</BR>
int a, b; </BR>
a = 8 + 4; </BR>
b = (6 + 7) * 8;</BR>
</BR>
邏輯判斷符號 (等於，不等於，或) 也用一個空白隔開</BR>
if (expression == true) </BR>
</BR>
for迴圈內的分號後用空白隔開 </BR>
for (int val = 1; val <=10; val++) </BR>
</BR>
2.括弧，縮排的使用 </BR>
</BR>
每層內縮都應該縮進 4 個空白，"左大括號跟著上一行，而右大括號自成一行"。 </BR>
 if (something) { </BR>
&nbsp&nbsp&nbsp&nbsp.... </BR>
} </BR>
</BR>
3.變數的宣告使用 </BR>

程式中若使用常其名稱使用大寫表示 </BR>
const int PI = 3.14159; </BR>
int MAX = 1000; <font color="#FF0000">//錯誤</font></BR>
</BR>
</BR>
區域變數使用駝峰式命名法，第一個單字以小寫字母開始；第二個單字的首字母大寫</BR>
string name = “lucifer”; <font color="#FF0000">//一個單字使用小寫命名</font></BR> 
string secondName =“michael”; <font color="#FF0000">//若有二個或多個單字連結在一起，第二個單字的首字母大寫，利用駝峰式命名法來表示，可以增加變數和函式的可讀性。</font></BR> 
</BR>
若要使用指標請在變數前面加上一個小寫p</BR>
String *pName= new String;</BR>
</BR>
4."(&nbsp)"的使用</BR>
</BR>
關鍵字後(keyword)後應該使用一個空白在接括號()</BR>
if (condition)  <font color="#FF0000">//正確，if後有一個空白</font></BR>
while (condition)  <font color="#FF0000">//正確，while後有一個空白</font></BR>
for(condition)  <font color="#FF0000">//錯誤，for後面無空白，會使for看起來像一個函式</font></BR>
</BR>
函式(finction)後不使用空白</BR>
printf("i like monster-strike!"); <font color="#FF0000">//正確，printf為函式後面不接空白</font></BR>
</BR>
5.if，while，for等關鍵字後只有一個判斷式，統一不使用括號</BR>
if (condition)</BR>
&nbsp&nbsp&nbsp&nbspsomevalue = 2;</BR>
</BR>
for (condition)</BR>
&nbsp&nbsp&nbsp&nbspcontinue;</BR>
</BR>
參考 :</BR>
C++ Coding Standard　:　http://www.possibility.com/Cpp/CppCodingStandard.html</BR>


</body>

</html>
<!--
<div class="container">
<h1>Source code</h1>
<script src="/google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
</div>
-->
