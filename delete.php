<html>

<style>
body {
  font-family: Arial, sans-serif;
  background: wheat;
  background-size: cover;
  height: 100vh;
}

h1 {
  text-align: center;
  font-family: Tahoma, Arial, sans-serif;
  color: #06D85F;
  margin: 80px 0;
}

.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}

.button {
  font-size: 1em;
  padding: 10px;
  color: #fff;
  border: 2px solid #06D85F;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #06D85F;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 30%;
  position: relative;
  transition: all 5s ease-in-out;
  box-shadow: 3rem;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}



</style>
<body>
<?php
require 'vendor/autoload.php';
$id = $_GET['id'] ?? null;
use App\TodoClass;
if($id)
{
  $todoClass = new TodoClass;
    if($todoClass->delete($id))
    {
    echo "<div class='popup'>
    <h2>Done</h2>
    <div class='content'>
        Task deleted.
    </div>
    <h5>back to <a href = '/'>todos<a/></h5>
    </div>"; 
    }
    header( "refresh:3; url=/" );
}else
{
    echo ' <div class="popup">
    <h2>Here i am</h2>
    <div class="content">
        task not found.
    </div>
    <h5>back to <a href = '/'>todos<a/></h5>
</div>';
}
?>
</body>
</html>