<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<script src="jquery.min.js"></script>
</head>
<body>

<!--
 
畫面左右各有一個下拉式選單，
左邊的下拉式選單若選擇  A 這項時，右邉的下拉式選單要改成 A01, A02, A03, A04, A05;
左邊的下拉式選單若改選  B 這項時，右邉的下拉式選單要改成 B01, B02, B03, B04, B05;
左邊的下拉式選單若改選  C 這項時，右邉的下拉式選單要改成 C01, C02, C03, C04, C05

-->
	<form method="post" action="http://exec.hostzi.com/echo.php">
		<select name="letter" id="letter">
			<option value="0">A</option>
			<option value="1">B</option>
			<option value="2">C</option>
		</select>
		&nbsp;|&nbsp;
		<select name="letterNumber" id="letterNumber">
			<option value="0">A01</option>
			<option value="1">B02</option>
			<option value="2">C03</option>
		</select> 
		<input id="aBtn" type="button" value="OK"/> 
	</form>

	<div id="debug"></div>
	<script>
		function setLetterNumber() {
			var selectedLetter = $("#letter option:selected");
			var serverUrl = `./getLetterNumber.php?letter=${selectedLetter.text()}`;
			$.ajax({
				type: "get",
				url: serverUrl,
				// success: function(e) {
				// 	$("#debug").text(e);
				// }
			}).then(function(e) {
				$("#letterNumber").html(e);
				// $("#debug").text(e + " v2");
			});
		}

		$(document).ready(function() {
			setLetterNumber();
		});
		// $("#letter").trigger("change"); // 也可以debug
		$("#letter").change(setLetterNumber);

		// $("#letter").change(function() {
		// 	selectedLetter = $("#letter option:selected");
		// 	var serverUrl = `./getLetterNumber.php?letter=${selectedLetter.text()}`;
		// 	$.ajax({
		// 		type: "get",
		// 		url: serverUrl,
		// 		// success: function(e) {
		// 		// 	$("#debug").text(e);
		// 		// }
		// 	}).then(function(e) {
		// 		$("#letterNumber").html(e);
		// 		// $("#debug").text(e + " v2");
		// 	});
		// 	// $("#debug").text(url);
		// })

		// $("#aBtn").click( function() {
		// 	var selectedLetter = $("#letter option:selected");
		// 	var selectedLetterNumber = $("#letterNumber option:selected");
		// 	$("#debug").text(selectedLetter.text() + " " + selectedLetterNumber.text());
		// } )

		// $("#letter").on("change", function() {
		// 	var selectedLetter = $("#letter option:selected").text();
		// 	var serverUrl = `./getLetterNumber.php?letter=${selectedLetter}`
		// 	$.ajax({
		// 		type: "get",
		// 		url: serverUrl
		// 	}).then(function(e) {
		// 		$("#letterNumber").html(e);
		// 	})
		// })

	</script>

</body>
</html>