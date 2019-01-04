// From tutorial of L5.5 and Ajax (Language Barrier)
// Connected to TagsController

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});




/* for read data in database */
$(document).ready(function(){
  $.get('/admin/tags-read',function(data){
    /* console.log(data);  */
    $.each(data, function(key,val){
      /* console.log(val); */
      $('#data')
      .append(
        "<tr>"+
            "<td>"+
            "<button class='btn btn-outline btn-rounded btn-info' data-toggle='tooltip' title='Edit' ><i class='fa fa-pencil'></i></button>"+
            "<button class='btn btn-outline btn-rounded btn-danger' data-toggle='tooltip' title='Delete' ><i class='fa fa-trash'></i></button>"+
            "</td>"+ 
            "<td>"+val.id        +"</td>"+
            "<td>"+val.tag       +"</td>"+
            "<td>"+val.status    +"</td>"+
            "<td>"+val.created_at+"</td>"+
            
        /* 
        "<td>"++"</td>"+ 
        */
        +"</tr>");
    });
  });



  $tag = $('#name').val();
  $status = $('#status').val();

  $.post('/admin/tags-store', {tag:$tag, status:$status},)


});
