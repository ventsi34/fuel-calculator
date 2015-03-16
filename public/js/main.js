$(function() {
    $('.submit-on-change').change(function() {
        $(this).closest('form').submit();
    });
    var ctx = document.getElementById("chart").getContext("2d");
});