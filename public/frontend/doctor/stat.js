//var currenturl = document.location.href;
//var preurl=document.referrer;
//var title = document.title ;
var typeid = $('#typeid').val();
var aid = $('#aid').val();
$.post('/ajax/clickcount.php', {typeid:typeid,aid:aid},function(ret){});