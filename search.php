<!DOCTYPE html>
<html lang="en" class="gr__getbootstrap_com">
<head>
<title>Internet Programming - Assingment 1</title>

	<?php
	include 'style.php';
	?>

<style type="text/css">
.linksblok div {
	display: inline-block;
}
</style>
</head>
<body>

	<div class="container">
		 <?php
			include 'navi-bar.php';
        ?>
     <div class="container col-md-6 col-md-offset-3">

			<form role="form" method="post" action="searchResult.php">
				<br /> <br />
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-primary btn-lg"> <input type="radio"
						name="searchType" id="fromRadio" value="fromRadio">Select
						Departure
					</label> <label class="btn btn-primary btn-lg"> <input type="radio"
						name="searchType" id="toRadio" value="toRadio">Select Destination
					</label> <label class="btn btn-primary btn-lg"> <input type="radio"
						name="searchType" id="bothRadio" value="bothRadio">Select Both
						Cities
					</label>
				</div>
				<br /> <br /> <br /> <br />

				<!-- /form-group -->
				<div class="form-group col-md-6 col-md-offset-3">
					<label for="from">From:</label>
                    <select
						class="form-control " id="fromSelect" name="fromSelect">
					</select>
				</div>
				<br /> <br /> <br /> <br />
				<div class="form-group col-md-6 col-md-offset-3">
					<label for="to">To:</label>
					<select class="form-control " id="toSelect" name="toSelect">
					</select>
				</div>
				<br /> <br /> <br /> <br /> <br /> <br />
				<div align="center">
					<button id="searchbtn" type="submit" class='btn btn-info btn-lg col-md-4 col-md-offset-4'>Search</button>
				</div>
			</form>
		</div>
	</div>

	<?php
		include "script.php";
	?>

	<script type="text/javascript">
		$(document).ready(function() {
            $('#fromSelect, #toSelect').prop('disabled', true);
            $("#fromRadio, #toRadio, #bothRadio").prop('checked', false);
			var radioSelected = false;
			$("#fromRadio, #toRadio, #bothRadio").on("change", function(){
					radioSelected = true;
					$('#searchbtn').attr("disabled", false);
					if ($("#fromRadio").is(':checked')) {
						$('#toSelect').attr('disabled', 'disabled');
						$('#fromSelect').removeAttr('disabled');

					} else if ($("#toRadio").is(':checked')) {
						$('#fromSelect').attr('disabled', 'disabled');
						$('#toSelect').removeAttr('disabled');
					} else if ($("#bothRadio").is(":checked")) {
						$('#fromSelect').removeAttr('disabled');
						$('#toSelect').removeAttr('disabled');
					}
                    if($("#fromRadio").is(':checked')) {
                        $.ajax({
                            type: 'POST',
                            url:"connectDB_weijian.php",
                            data: {action: "getFrom"},
                            success:function(data){
                                for(var i=0; i < data.length;i++)
                                {

                                    $("#fromSelect").append("<option value='" + data[i]+"'>" + data[i] + "</option>");
                                }
                            }
                        });
                        $("#toSelect").empty();
                    } else if($("#toRadio").is(':checked')) {
                        $.ajax({
                            type: 'POST',
                            url:"connectDB_weijian.php",
                            data: {action: "getTo"},
                            success:function(data){
                                for(var i=0; i< data.length;i++)
                                {
                                    $("#toSelect").append("<option value='" + data[i]+"'>" + data[i] + "</option>");
                                }
                            }
                        });

                        $("#fromSelect").empty();
                    } else if($("#bothRadio").is(':checked')) {
                        $.ajax({
                            type: 'POST',
                            url:"connectDB_weijian.php",
                            data: {action: "getFrom"},
                            success:function(data){
                                for(var i=0; i < data.length; i++)
                                {
                                    $("#fromSelect").append("<option value='" + data[i]+"'>" + data[i] + "</option>");
                                }
                            }
                        });

                        $.ajax({
                            type: 'POST',
                            url:"connectDB_weijian.php",
                            data: {action: "bothfrom", city: $("#fromSelect option:selected").text()},
                            success:function(data){
                                $("#toSelect").empty();
                                for(var i=0;i < data.length;i++)
                                {
                                    $("#toSelect").append("<option value='" + data[i]+"'>" + data[i] + "</option>");
                                }

                            }
                        });//ajax ended

                        $("#fromSelect").change(function() {
                            $.ajax({
                                type: 'POST',
                                url:"connectDB_weijian.php",
                                data: {action: "bothfrom", city: $("#fromSelect option:selected").text()},
                                success:(function(data){
                                    $("#toSelect").empty();
                                    for(var i=0;i < data.length; i++)
                                    {
                                        $("#toSelect").append("<option value='" + data[i] +"'>" + data[i] + "</option>");
                                    }

                                })
                            });//ajax ended
                        });//select change
                    }
				});
			if(radioSelected) $('#searchbtn').attr("disabled", false);
			else $('#searchbtn').attr("disabled", true);
            });
	</script>

</body>
<span class="gr__tooltip"> <span class="gr__tooltip-content"></span> <i
	class="gr__tooltip-logo"></i> <span class="gr__triangle"></span>
</span>
</html>
