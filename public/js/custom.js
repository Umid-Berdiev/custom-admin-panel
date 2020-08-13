document.addEventListener('DOMContentLoaded', function () {
    let curDate = new Date();
    let curDay = curDate.getDate() < 10 ? "0" + curDate.getDate() : curDate.getDate();
    let curMonth = (curDate.getMonth() + 1) < 10 ? "0" + (curDate.getMonth() + 1) : (curDate.getMonth() + 1);
    let curYear = curDate.getFullYear();
    document.getElementById('datePicker').value = `${curYear}-${curMonth}-${curDay}`;
});

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

const svgRegions = document.querySelectorAll('path');


function toggleRightDownNarrow(element) {
    let accicon = element.querySelector("i");

    if (element.ariaExpanded == "true") {
        accicon.classList.remove('fa-chevron-down');
        accicon.classList.add('fa-chevron-right');
    } else {
        accicon.classList.remove('fa-chevron-right');
        accicon.classList.add('fa-chevron-down');
    }
}
