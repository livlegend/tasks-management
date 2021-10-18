$('.task-form').on('submit',(e)=>{
    $('#btn-submit').prop('disabled',true);
    let date = new Date( $('#task_date').val() ); 
    let today_date=new Date();
    if( date < today_date){
        $('.error-msg').fadeIn();
        return false;
    }
    let month=parseInt(date.getMonth())+1;
    if(month<10) month='0'+month;
    let date_time=date.getFullYear()+ '-'+ month + '-'+ date.getDate()+' '+ $('#time').val();
    $('#task-time').val(date_time);
    return true;
});
