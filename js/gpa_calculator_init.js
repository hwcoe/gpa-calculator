jQuery(document).ready(function($){
	$("input[name='units']").bind('change', ComputeRow);
	$("input[name='gradePre']").bind('change', ComputeRow);
	$("input[name='gradePost']").bind('change', ComputeRow);
	$("input[name='calculate']").bind('click', ComputeRow);
	$("input[name='reset']").bind('click', ClearRow);
});