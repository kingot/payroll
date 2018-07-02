// JavaScript Document
//copyriht rescoden.com
//date picker

$('#Date').datepicker({dateFormate: 'dd/mm/yy',showButtonPanel: true,showAnim: 'fadeIn'});
$('#toDate').datepicker({dateFormate: 'dd/mm/yy',showButtonPanel: true,showAnim: 'fadeIn'});

// setter
$( "#name" ).dialog( "option", "appendTo", "#someElem" );


$('#save').click(function(){
	$('#dialog').attr('title','saved').text('Setting were saved').dialog({ buttons:{'OK': function(){
    $(this).dialog('close');
		}}, closeOnEscape:false,draggable:false,resizable:false,show:'fade',modal:true});

 });
 
 