$(".new_Apply_btn").click(function(){
  $(".new_Application").slideToggle('fast',function(){
    
   

}); 
});
$('#savebtn').click(function(){
   
    var package = $('#package').val();
    var name = $('#name').val();
    var price = $('#price').val();
    var day = $('#day').val();
    var travel_By = $('#travel_By').val();
    

    var extension = $('#package').val().split('.').pop().toLowerCase();
    if (jQuery.inArray(extension,['png','jpg','jpeg']) == -1) {
      alert("invalid file format for image");
    }



    if(package == '')
    {
      alert('plz enter package image.');
       // alert(1);
    }
    else if(name == '')
    {
      alert('plz enter name of a image.');
    }
    else if(price == '')
    {
      alert('plz enter price.');
    }
    else if(day == '')
    {
      alert('plz enter day.');
    }
    else if(travel_By == '')
    {
      alert('plz enter travel_By.');
    }
    else
    {

      var formdata = new FormData();
      formdata.append('package',$('input[name=pkg]')[0].files[0]);
      formdata.append('name',name);
      formdata.append('price',price);
      formdata.append('day',day);
      formdata.append('travel_By',travel_By);
      

      // alert(package);
      $.ajax({
        type : "POST",
        url : 'ajax/admin_action.php',
        // dataType: "json",
        contentType : false,
        processData : false,
        data : formdata,
        success:function(response) {
          alert(response);
        console.log(response);
        if (response['n'] = 1) {
   
swal(
  'Good job!',
  'You clicked the button!',
  'success'
)
       // alert(" image successfully uploaded");
       window.location.href ="admin.php";
        }


        }

      });    
      return false;
    }
		

	});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    $('.hide').removeClass();
    reader.onload = function (e) {
      $('#blah')
      .attr('src', e.target.result)
      .width(300)
      .height(200);

    };

    reader.readAsDataURL(input.files[0]);
  }
}