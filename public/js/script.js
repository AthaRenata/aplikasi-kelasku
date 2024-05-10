$(document).ready(function(){
    $('.usernavtabs').on('click',function(){
        $('#'+$(this).attr('id')).tab('show');
    });
});