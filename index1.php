
<HTML>
<head>

<?php
    
    
     
?>

<?php

//https://www.w3schools.com/php/php_file_upload.asp


?>

  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!DOCTYPE html>

<style>

	
	a:link {
		font-weight: bold;
	  color: green;
	  background-color: transparent;
	  text-decoration: none;
	}
	a:visited {
	  color: blue;
	  background-color: transparent;
	  text-decoration: none;
	}
	a:hover {
	  color: red;
	  background-color: transparent;
	  text-decoration: underline;
	}
	a:active {
	  color: yellow;
	  background-color: transparent;
	  text-decoration: underline;
	}
	</style>


</head>


<div id = "start"></div>



<script>
 var gCounter = 0;
 var gCounter2 = 0;
 var gDisplayCounter = 0;

 myDivs = [];


function start()
{
    document.getElementById('upload').disabled = true;
}

function createDiv() {
    var boardDiv = document.createElement("div");

    boardDiv.className = "new-div";
    boardDiv.innerText = "I am new DIV";
	boardDiv.id = "createdDiv" + gCounter;
	gCounter++;
	//alert(boardDiv);
    return boardDiv;
  }


  function createAndModifyDivs() {
    var board = document.getElementById("start1"),
      
      i = 0,
      numOfDivs = 9;

    for (i; i <numOfDivs ; i += 1) {
      myDivs.push(createDiv());
      board.prepend(myDivs[i]);
    }

    //myDivs[5].className = "modified-div";
	var j = 0;
	var var2 = 0;
	for(j; j < gCounter ; j++)
	{
		var2 = "createdDiv" + j;
		document.getElementById(var2).style.display = "none";
	}

  }
  

 var gNumber = "0";
 

 var gOnThisDiv = 38;


{

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
	
	if (this.readyState == 4 && this.status == 200) {
	
	var jsonData = JSON.parse(this.responseText);
	var answerHtml = jsonData.htmlstuff;
	
	document.getElementById("insert2").innerHTML = answerHtml;

	}
	
};


	
	xmlhttp.open("GET", "dropDown.php", true);
	xmlhttp.send();
}

function change()
{

	var varia = "A1";

	
	var title1 =  document.getElementById (varia).value;
		
		document.getElementById("start").innerHTML =  title1;
		document.getElementById("keyword").value =  title1;

}
function displayAddProductChanges2(  )
{
	

	var valu = "titleID1";

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
	
	var title2 = "A1";
	if (this.readyState == 4 && this.status == 200) {

		

		var jsonData = JSON.parse(this.responseText);
		var answerHtml = jsonData.htmlstuff;
		
		
		


		document.getElementById("start1").innerHTML =  answerHtml;
		
	}
};
var url = "a.php";
xmlhttp.open("GET", url , true);
	xmlhttp.send();
}
function displayAddProductChanges(productID, filename, bfile, btitleID, bdescID, bcostID,bquantityID,bkey1ID , bkey2ID , bkey3ID, categoryTitle)
{

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
	
	
	
	if (this.readyState == 4 && this.status == 200) {
	
		var jsonData = JSON.parse(this.responseText);
		var answerHtml1 = jsonData.htmlstuff;
		var var1 = "createdDiv" + (gCounter2);
		gCounter2++;

		document.getElementById(var1).style.display = "block";

		var x = document.getElementById(var1 ).innerHTML = answerHtml1;
		
		
		document.getElementById(btitleID).value = "";
		document.getElementById(bdescID).value = "";
		document.getElementById(bkey1ID).value = "";
		document.getElementById(bkey2ID).value = "";
		document.getElementById(bkey3ID).value = "";
		document.getElementById(bcostID).value = 0;
		document.getElementById(bquantityID).value = 0;

	}
};



	image = "Select image to upload:";
	title1 =  document.getElementById (btitleID).value;
	description = document.getElementById(bdescID).value;
	cost = document.getElementById(bcostID).value;
	quantity = document.getElementById(bquantityID).value;
	gKeyword1 = document.getElementById(bkey1ID).value;
	gKeyword2 = document.getElementById(bkey2ID).value;
	gKeyword3 = document.getElementById(bkey3ID).value;
	//file = document.getElementById(bfileID).value;
	
	var url = "displayAddProductChanges.php?" ;
	
	url = url + "title1=" + title1 + "&" + "productID=" + productID + "&" +  "btitleID=" + btitleID + "&" +  "bdescID=" + bdescID + "&" + "bcostID=" + bcostID + "&" + "bquantityID=" + bquantityID + "&"+ "bkey1ID=" + bkey1ID + "&" 
	+ "bkey2ID=" + bkey2ID + "&" + "bkey3ID=" + bkey3ID + "&" +  "gKeyword1=" + gKeyword1 + "&"  + "gKeyword2=" + gKeyword2 +
	"&" + "gKeyword3=" + gKeyword3 + "&" + "image=" + image+  "&" + "description="  + description + "&" + "cost=" +
	 cost  + "&" + "quantity=" + quantity + "&" + "category=" + categoryTitle + "&" + "filename=" + filename + "&" + "fileID=" + bfile;
	
	xmlhttp.open("GET", url , true);
	xmlhttp.send();

}

function SaveKeyWords(KeyWord1, KeyWord2, keyWord3, keywordID)
{
var xmlhttp = new XMLHttpRequest();
var PageToSendTo = "saveKeywords.php?";
//alert("here2");
var UrlToSend = PageToSendTo +  "val1=" + KeyWord1 + "&" + "val2=" + KeyWord2 + "&" + "val3=" + KeyWord3 + "&"  + "val4=" + KeyWordID ;
//alert("again");
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {

}

};

xmlhttp.open("GET", UrlToSend , true);

xmlhttp.send();

}



function deleteRecord( reduceCountFlag, mainDiv, productID)

{
	string1 = 'Deleted';
	document.getElementById(mainDiv).innerHTML = string1;

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	
	if (this.readyState == 4 && this.status == 200) {
	
	}
	
};

	
	xmlhttp.open("GET", "deleteProduct.php?val1="+ productID + "&" + "reducecountflag=" + reduceCountFlag , true);
	xmlhttp.send();


	


}




function SaveProductItems( ProductID, deleteFlag, mainDiv,fileID,  title, desc,cost,quantity, keyword1, keyword2, keyword3, filename){


	
		const element = document.getElementById("dropDown1");
		
		const checkValue = element.options[element.selectedIndex].value;
		const checkText = element.options[element.selectedIndex].text;
		
		var val13 = checkText;

		
		


	var val1 = document.getElementById(title);
	var val2 = document.getElementById(desc);
	var val3 = document.getElementById(cost);
	var val4 = document.getElementById(quantity);
    
	//ids
    //var val7 = keywordID_;
    var val5 = ProductID;
	var val8 = document.getElementById(keyword1);
    var val9 = document.getElementById(keyword2);
	var val10 = document.getElementById(keyword3);
	//var val11 = document.getElementById(fileID).attributes.value.textContent
	//var val11 = document.getElementById(fileID).value;
	var val11 = $('input[type=file]').val().replace(/C:\\fakepath\\/i, '')
	

	//var val14 = category;
	//var val15 = customerid;
	
	
		if (deleteFlag == 1)
		{
			document.getElementById(mainDiv).innerHTML = "";
		}

    var xmlhttp = new XMLHttpRequest();
	var PageToSendTo = "saveNewRecord.php?";
	
	
    
   
 	var UrlToSend = PageToSendTo  +   "val1=" + val1 + "&" + "val2=" + val2 + "&" + "val3=" + val3 + "&"  + "val4=" + val4 + "&"
        + "val8=" + val8 + "&" + "val9=" + val9 + "&" + "val10=" + val10 + "&" + "val5=" + val5 + "&" + "val13=" + val13 + "&" + "filename=" + val11 + "&" + "pdib=" + ProductID;

	
	
	xmlhttp.onreadystatechange = function() {
		


		if (this.readyState == 4 && this.status == 200) {
		
					    
 		}
	};

	
	xmlhttp.open("GET", UrlToSend , true);
	
	xmlhttp.send();
	
}


function printHTML1(keyword){ 
	
	
	const element = document.getElementById("dropDown1");
		
	//const checkValue = element.options[element.selectedIndex].value;
	const checkText = element.options[element.selectedIndex].text;
	
	var val1 = checkText;

	var xmlhttp = new XMLHttpRequest();
	
	
	var keyword1 = keyword;
	var url = "drawfirsttwoforms.php?keyword=" + keyword.value + "&" + "val1=" + val1;
	


	xmlhttp.onreadystatechange = function() {
		
	if (this.readyState == 4 && this.status == 200) {
		
		
		var jsonData = JSON.parse(this.responseText);
		var answerHtml = jsonData.htmlstuff;
		document.getElementById("codehere").innerHTML = answerHtml;

		createAndModifyDivs();


		}
	};
	
	xmlhttp.open("GET", url , true);
	
	xmlhttp.send();
	
	
}

function fillDropDown()
{
	
}

function uploadFile(productID,  deleteFlag ,mainDiv, filesID, titleID, descID, costID,quantityID, key1ID , key2ID , key3ID, filename) {
/////// 
	
	var url1 = "upload2.php?pdib="  + productID + "&" + "filename=" + filename;
	if (filename == "" )
	{
	//var file_data = $('#sortpicture').prop('files')[0]; 
    var file_data = $('#getuploadfile').prop('file')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    //alert(form_data);                             
    $.ajax({
		//this was the name of the page : upload2.php
        url: url1, // point to server-side PHP script 
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){

			//var responsedata = $.parseJSON(php_script_response);
			//alert(responsedata.flag); // display response from the PHP script, if any
			if(php_script_response != "")
			{
			alert(php_script_response);
			
			
			}
			
        }
     });
	}//if
	 
	
	 SaveProductItems(productID,  deleteFlag ,mainDiv, filesID, titleID, descID, costID,quantityID, key1ID , key2ID , key3ID, filename);

}


function upload2(fileid, displayid, filename, pdib )
{


/////
//$productID = $_GET['pdib'];
//$filename = $_GET['filename'];
//$fileid = $_GET['fileid'];
//$displayID = $_GET['displayid'];

/////

	var url = "upload2.php?" + "&fileid =" + fileid  "&displayid=" + dispalyid +   "&filename=" + filename +   "&pdib="  + pdib;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	
	if (this.readyState == 4 && this.status == 200) {
	
	var jsonData = JSON.parse(this.responseText);
	var answerHtml = jsonData.htmlstuff;
	
	//document.getElementById("insert2").innerHTML = answerHtml;
	
	if answerHtml != "")
	{
		alert("answerHtml")
		alert("got here!")
	}
	
	xmlhttp.open("GET", "url", true);
	xmlhttp.send();
}

	};


}





 function imageRefresh(filename, imageID) {

	if(imageID != null && filename != "")
	{
	var image = document.getElementById(imageID);
	image.src = "../php proj/uploads/" + filename;
	}
	
 }

/////
var1 = 0;
function test()
{
}



//	newImage = "http://localhost/image.jpg#" + new Date().getTime();

//var img = document.createElement("img");
 
//img.src = "localhost/php proj/uploads/B.gif";
//var src = document.getElementById(display);
 
//src.appendChild(newImage);
	



//////////
</script>
<body>


<center><input id = "keyword" value = "apple1" type="text" name="keyword2"  placeholder="" ></center>
<br>
<center><button onclick = "printHTML1(document.getElementById('keyword'))">Submit Keyword</button></center>


<div id = "testdiv" >testing image </div>





<p id = "insert2"></p>
<p id = "insert"></p>

<div class="jumbotron text-center">
  <h1>Cornerstone's Administration</h1>
  
  <a href="http://localhost/php proj/lookatorders.html">Goto Administrator's Order Viewer</a>
</div>
 

<div id = "codehere" >


</div>

</body>
</html>


