
<HTML>
<head>

<?php
    
    //    $fileToUpload = $_POST['fileToUpload'];
    //    upload( $fileToUpload);
     
?>

<?php

//https://www.w3schools.com/php/php_file_upload.asp
if(isset($_POST['submit'])){

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}


}
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
function displayAddProductChanges(productID, filename, btitleID, bdescID, bcostID,bquantityID,bkey1ID , bkey2ID , bkey3ID, categoryTitle)
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

	
	var url = "displayAddProductChanges.php?" ;
	
	url = url + "title1=" + title1 + "&" + "productID=" + productID + "&" +  "btitleID=" + btitleID + "&" +  "bdescID=" + bdescID + "&" + "bcostID=" + bcostID + "&" + "bquantityID=" + bquantityID + "&"+ "bkey1ID=" + bkey1ID + "&" 
	+ "bkey2ID=" + bkey2ID + "&" + "bkey3ID=" + bkey3ID + "&" +  "gKeyword1=" + gKeyword1 + "&"  + "gKeyword2=" + gKeyword2 +
	"&" + "gKeyword3=" + gKeyword3 + "&" + "image=" + image+  "&" + "description="  + description + "&" + "cost=" +
	 cost  + "&" + "quantity=" + quantity + "&" + "category=" + categoryTitle + "&" + "filename=" + filename;
	
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




function SaveProductItems(filename, deleteFlag, mainDiv, ProductID, title, desc,cost,quantity, keyword1, keyword2, keyword3){


	
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
	//var val14 = category;
	//var val15 = customerid;
	
	
		if (deleteFlag == 1)
		{
			document.getElementById(mainDiv).innerHTML = "";
		}

    var xmlhttp = new XMLHttpRequest();
	var PageToSendTo = "saveNewRecord.php?";
	
	
    
   
 	var UrlToSend = PageToSendTo  +   "val1=" + val1 + "&" + "val2=" + val2 + "&" + "val3=" + val3 + "&"  + "val4=" + val4 + "&"
        + "val8=" + val8 + "&" + "val9=" + val9 + "&" + "val10=" + val10 + "&" + "val5=" + val5 + "&" + "val13=" + val13 + "&" + "filename=" + filename;

	
	
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

function uploadFile() {
/////// 



var fd = new FormData(ProdID);
	var files = $('#file2')[0].files;
	
	var url1= "upload2.php?prodid=" + prodID;
	// Check file selected or not
	if(files.length > 0 ){
	   fd.append('file',files[0]);

	   $.ajax({
		  url: url1,
		  type: 'post',
		  data: fd,
		  contentType: false,
		  processData: false,
		  success: function(response){
			 if(response != 0){

				var1 = response;
				document.getElementById("putimageloghere").innerHTML = var1;




				
			 }else{
				alert('file not uploaded');
			 }
		  },
	   });
	}else{
	   alert("Please select a file.");
	}


///////
}



/////////

$(document).ready(function(){

$("#testit").click(function(){

	var fd = new FormData();
	var files = $('#file')[0].files;
	
	// Check file selected or not
	if(files.length > 0 ){
	   fd.append('file',files[0]);

	   $.ajax({
		  url: 'upload2.php',
		  type: 'post',
		  data: fd,
		  contentType: false,
		  processData: false,
		  success: function(response){
			 if(response != 0){

				var1 = response;
				document.getElementById("putimageloghere").innerHTML = var1;
				//var x = document.getElementById("putimageloghere" ) = response;
				//$("#img").attr("src",response); 
				//$(".preview img").show(); // Display image element
				alert ("here");
			 }else{
				alert('file not uploaded');
			 }
		  },
	   });
	}else{
	   alert("Please select a file.");
	}
});
});




//////////
</script>


<body>

<input id="file" type="file" name="fileupload" >
<button id  = "testit"> U </button>
<img src="" id="img" width="100" height="100">

<center><input id = "keyword" value = "apple1" type="text" name="keyword2"  placeholder="" ></center>

<br>

 <center><button onclick = "printHTML1(document.getElementById('keyword'))">Submit Keyword</button></center>
  
 
 




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


