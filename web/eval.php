<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

class viewhelper{

public $title = "";
public $base = "";
public $username = "";
public $userid = "";


	function render(){
	eval(file_get_contents(__FILE__,null,null,__COMPILER_HALT_OFFSET__));
	
	
}}

//database logic goes here
$row=array(
'loggedin'=>true,
'modcp'=>true,
'admincp'=>false,
'username'=>'Ultimater',
'userid'=>1234
);
//database logic goes here

//controller logic goes here

$filesize=0;
if (file_exists ("AutoItImage2.png")) {
	 $filesize=filesize("AutoItImage2.png");	
}



if(isset($_POST['filesize']) && $_POST['filesize']!=$filesize) {
	echo $filesize;
  	  
}



if(!isset($_POST['action'])){
  
  $view=new viewhelper;
  $view->filesize=$filesize;
  $view->title="Test -> Ultimater's MVC example";
  $view->base="http://".$_SERVER['HTTP_HOST'];
  $view->username=$row['username'];
  $view->userid=$row['userid'];
  $view->loggedin=$row['loggedin'];
  $view->modcp=$row['modcp'];
  $view->admincp=$row['admincp'];
  $view->render();

}



//controller logic goes here

__halt_compiler();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=htmlentities($this->title)?></title>
<style type="text/css">
a{color:#3333ff;text-decoration:none;}
a:hover{color:#0380fc;}
</style>
</head>
<body>


<script>
var my_file_size=<?php echo($this->filesize) ?>

setInterval(function()
{ 
$.ajax({
      url: 'eval.php',
      type: 'post',
      data: {'action': 'follow', 'filesize': my_file_size},
      success: function(data, status) {
       	if(data > 0 && data !== my_file_size) {
		console.log(my_file_size + "-local server-" + data);
		my_file_size = data;
	//imageload();
	imagereload();
        }
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call
}, 1200);

var img=document.createElement("img");

function imageload()
{ /* js code here*/ 
	img.src="AutoItImage2.png";
	img.style.display="block";
	console.log('hello');
	document.getElementById("imagecontainer").appendChild(img);
};
 
function imagereload()
{
	var image = document.getElementById('img');
	var dummy = '?dummy=';
	image.src=(document.getElementById('img').src).split(dummy)[0] + dummy + (new Date()).getTime();
	console.log(image.src); 
};


</script>




<style type="text/css">
td {
    border-collapse:collapse;
    border: 1px black solid;
}
tr:nth-of-type(5) td:nth-of-type(1) {
    visibility: hidden;
}
#rotate {
     -moz-transform: rotate(90.0deg);  /* FF3.5+ */
     -o-transform: rotate(90.0deg);  /* Opera 10.5 */
     -webkit-transform: rotate(90.0deg);  /* Saf3.1+, Chrome */
     filter:  progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083);  /* IE6,IE7 */
     -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)"; /* IE8 */
     position: absolute;
//    right: -150px;
//    top: 100px;
      left: -120px;
      bottom: 123px;
    width: 1150px;
    height: 824px;
    border: 0px solid #73AD21;
    padding: 0px;
    font-family: 'Times New Roman', Times, serif; /* Гарнитура текста */ 
    font-size: 250%; /* Размер шрифта в процентах */ 
}
#image {
     position: relative;
//    right: -150px;
      top: -120px;
      left: 0px;
      
/ 
}
</style>


<div id='rotate'>


	<div id="imagecontainer">
	<img id="img" src="AutoItImage2.png"></img>
	</div>
</div>


</body>
</html>

</html>