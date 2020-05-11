$("#region-select").change(function () {
	var selectedOption = $(this).val();
	$(".map-highlight").css("fill", "#fff");
	$("#" + selectedOption).css("fill", "grey");
});

$("path").click(function () {
	var mySelectedArea = this.id;
	$(".map-highlight").css("fill", "#fff");
	$("#" + mySelectedArea).css("fill", "grey");
    $("#myselect").val(mySelectedArea);
});