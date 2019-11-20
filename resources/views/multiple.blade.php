@extends('layouts.app')

@section('content')

<body>  
    <div class="container">  
         <br />  
         <br />  
         <h2 align="center">Dynamically Add or Remove input fields in PHP with JQuery</h2>  
         <div class="form-group">  
            {!!Form::open(['method' => 'POST','id'=>'store'])!!}
            <div class="wrapper">
                    <div><input type="text" name="name[]" placeholder="Input Text Here" /></div>
                    <div><input type="text" name="des[]" placeholder="Input Text Here" /></div>
                    </div>
                    <p><button class="add_fields">Add More Fields</button></p>
                    <input type="submit" value="Submit" /> 
                   {!!Form::close()!!}
         </div>  
    </div>  
</body>  
</html>  
<script>  
$(document).ready(function() {
    var max_fields = 10; //Maximum allowed input fields 
    var wrapper    = $(".wrapper"); //Input fields wrapper
    var add_button = $(".add_fields"); //Add button class or ID
    var x = 1; //Initial input field is set to 1
 
 //When user click on add input button
 $(add_button).click(function(e){
        e.preventDefault();
 //Check maximum allowed input fields
        if(x < max_fields){ 
            x++; //input field increment
 //add input field
            $(wrapper).append('<div><input type="text" name="name[]" placeholder="Input Text Here" /> <br><input type="text" name="des[]" placeholder="Input Text Here" /> <a href="javascript:void(0);" class="remove_field">Remove</a></div>');
        }
    });
 
    //when user click on remove button
    $(wrapper).on("click",".remove_field", function(e){ 
        e.preventDefault();
 $(this).parent('div').remove(); //remove inout field
 x--; //inout field decrement
    })
});

$(document).on('submit','#store',function(e){
e.preventDefault();
$.ajax({
       
        url: "{{ route('insert.store') }}",
        method: "post",
        dataType: "json",
        data: $(this).serialize(),
        success: function(data){
             console.log(data)
        }
      
    });
});
</script>


@endsection