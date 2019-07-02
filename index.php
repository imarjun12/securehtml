<?php
if(isset($_REQUEST['data']))
{
$data = $_REQUEST['data'];
$data = '<script type="text/javascript">
function disableSelection(e){if(typeof e.onselectstart!="undefined")e.onselectstart=function(){return false};else if(typeof e.style.MozUserSelect!="undefined")e.style.MozUserSelect="none";else e.onmousedown=function(){return false};e.style.cursor="default"}window.onload=function(){disableSelection(document.body)}
</script>

<script type="text/javascript">
document.oncontextmenu=function(e){var t=e||window.event;var n=t.target||t.srcElement;if(n.nodeName!="A")return false};
document.ondragstart=function(){return false};
</script>

<script type="text/javascript">
window.addEventListener("keydown",function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==67||e.which==70||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){e.preventDefault()}});document.keypress=function(e){if(e.ctrlKey&&(e.which==65||e.which==66||e.which==70||e.which==67||e.which==73||e.which==80||e.which==83||e.which==85||e.which==86)){}return false}
</script>

<script type="text/javascript">
document.onkeydown=function(e){e=e||window.event;if(e.keyCode==123||e.keyCode==18){return false}}
</script>'.$data;
$data = trim(preg_replace('/[\t\n\r\s]+/', ' ', $data));
$data = strToHex($data);
$data = "<Script Language='Javascript'>
<!--
document.write(unescape('$data'));
//-->
</script>";
}

function strToHex($string){
    $hex = '';
    for ($i=0; $i<strlen($string); $i++){
        $ord = ord($string[$i]);
        $hexCode = dechex($ord);
        $hex .= "%".substr('0'.$hexCode, -2);
		//$hex .= " ";
    }
    return strToUpper($hex);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>SecureHTML</title>
  </head>
  <body>
  <div class="container">
   <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">SecureHTML</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="https://github.com/imarjun12/securehtml/blob/master/README.md">Features</a>
        <a class="p-2 text-dark" href="https://github.com/imarjun12/securehtml">GitHub</a>
      </nav>
    </div>
	<?php if(!isset($_REQUEST['data']))
{ ?>
<form  action="index.php" method="post">
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Full Code Here</label>
    <textarea name="data" class="form-control" rows="10" required></textarea>
  </div>
  
	<center><button class="btn btn-primary">Generate Code</button></center>
</form>
<?php } else {?>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Encrypted Code</label>
    <textarea name="data" class="form-control" rows="10"><?php echo $data;?></textarea>
  </div>
	<center><a href="index.php" class="btn btn-primary">Back</a></center>
<?php } ?>

</div>
  </body>
</html>
