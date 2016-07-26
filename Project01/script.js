$(document).ready(function() {
    $(".button-collapse").sideNav();
});

$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
});

$(document).ready(function() {
    $('select').material_select();
});

$(document).ready(function() {
    $('input#input_text, textarea#textarea1').characterCounter();
});

$('#textarea1').val('New Text');
$('#textarea1').trigger('autoresize');

$(document).ready(function() {
    Materialize.updateTextFields();
});

$(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
});
