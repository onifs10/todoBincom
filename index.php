<html>
    <head>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
            body {
	background: white;
}
.tilesWrap {
	padding: 0;
	margin: 50px auto;
	list-style: none;
	text-align: center;
}
.tilesWrap li {
	display: inline-block;
	width: 20%;
	min-width: 200px;
	max-width: 230px;
	padding: 80px 20px 40px;
	position: relative;
	vertical-align: top;
	margin: 10px;
	font-family: 'helvetica', san-serif;
	min-height: 25vh;
	background: #262a2b;
	border: 1px solid #252727;
	text-align: left;
}
.tilesWrap li h2 {
	font-size: 114px;
	margin: 0;
	position: absolute;
	opacity: 0.2;
	top: 50px;
	right: 10px;
	transition: all 0.3s ease-in-out;
}
.tilesWrap li h3 {
	font-size: 20px;
	color: #b7b7b7;
	margin-bottom: 5px;
}
.tilesWrap li p {
	font-size: 16px;
	line-height: 18px;
	color: #b7b7b7;
	margin-top: 5px;
}
.tilesWrap li button {
	background: transparent;
	border: 1px solid #b7b7b7;
	padding: 10px 20px;
	color: #b7b7b7;
	border-radius: 3px;
	position: relative;
	transition: all 0.3s ease-in-out;
	transform: translateY(-40px);
	opacity: 0;
	cursor: pointer;
	overflow: hidden;
}
.tilesWrap li button:before {
	content: '';
	position: absolute;
	height: 100%;
	width: 120%;
	background: #b7b7b7;
	top: 0;
	opacity: 0;
	left: -140px;
	border-radius: 0 20px 20px 0;
	z-index: -1;
	transition: all 0.3s ease-in-out;
	
}
.tilesWrap li:hover button {
	transform: translateY(5px);
	opacity: 1;
}
.tilesWrap li button:hover {
	color: #262a2b;
}
.tilesWrap li button:hover:before {
	left: 0;
	opacity: 1;
}
.tilesWrap li:hover h2 {
	top: 0px;
	opacity: 0.6;
}

.tilesWrap li:before {
	content: '';
	position: absolute;
	top: -2px;
	left: -2px;
	right: -2px;
	bottom: -2px;
	z-index: -1;
	background: #fff;
	transform: skew(2deg, 2deg);
}
.tilesWrap li:after {
	content: '';
	position: absolute;
	width: 40%;
	height: 100%;
	left: 0;
	top: 0;
	background: rgba(255, 255, 255, 0.02);
}
.tilesWrap li:nth-child(1):before {
	background: #C9FFBF;
background: -webkit-linear-gradient(to right, #FFAFBD, #C9FFBF);
background: linear-gradient(to right, #FFAFBD, #C9FFBF);
}
.tilesWrap li:nth-child(2):before {
	background: #f2709c;
background: -webkit-linear-gradient(to right, #ff9472, #f2709c);
background: linear-gradient(to right, #ff9472, #f2709c);
}
.tilesWrap li:nth-child(3):before {
	background: #c21500;
background: -webkit-linear-gradient(to right, #ffc500, #c21500);
background: linear-gradient(to right, #ffc500, #c21500);
}
.tilesWrap li:before {
	background: #FC354C;
background: -webkit-linear-gradient(to right, #0ABFBC, #FC354C);
background: linear-gradient(to right, #0ABFBC, #FC354C);
}
h2 {
    color: white;
}
</style>
    </head>
    <body>
    <div class="container p-4 m-4" >
    <h1>Input Todo</h1>
<form  class="form-user" action="/create.php" method="post">
<div class="form-group">
<input class="form-control" type="text" name='title' placeholder="Task Title">
<textarea class="form-control" type="t" name='body' placeholder="Task body"></textarea>
</div>
<input class="btn" type="submit">
</form>
</div>
    <ul class="tilesWrap">
    <h1 style="color:teal"> Todos </h1>
<?php
require 'vendor/autoload.php';
use App\TodoClass;
$todoClass = new TodoClass();
 $todos  = $todoClass->index();

 foreach($todos as $key => $todo)
 {
    if($todo['done'])
    {
        echo "<li style='background:grey;        !important'>";
    }else{
        echo "<li>";
    }

    echo "
    
		<h2> ".($key+1)."</h2>
		<h3>".$todo['title']."</h3>
		<p>
            ".$todo['body'];
    if($todo['done'])
    {
        $button = '<button href>done</button>';
    }else{
        $button = "<button style='z-index:9!important' onclick=\"location.href ='/done.php?id=" .($todo['id'])."'\" >check</button>";
    };
    echo $button. "
        </p>
        <button style='z-index:9' onclick=\"location.href ='/delete.php?id=" .($todo['id'])."'\">delete</button>
	</li>";
 }

?>

</div>
</div>

</ul>


</body>
</html>