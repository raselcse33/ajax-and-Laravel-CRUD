@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="row">
                    <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($lists as $list)
                              <tr>
                              <td>{{$list->name}}</td>
                              <td>{{$list->email}}</td>
                              <td>{{$list->phone}}</td>
                              <td>
                              <button type="button" data-id ="{{$list->id}}" class="btn btn-primary edit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Edit</button>
                              </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                      {!!Form::open(['method' => 'POST','id'=>'bpcreate'])!!}
                      <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Name:</label>
                      <input type="text" class="form-control"  name="name">
                      </div>
                      <div class="form-group">
                      <label for="message-text" class="col-form-label">Email:</label>
                      <input type="email" class="form-control"  name="email">
                      </div>
                      <div class="form-group">
                      <label for="message-text" class="col-form-label">phone:</label>
                      <input type="text" class="form-control"  name="phone">
                      </div>
                      <div class="form-group">
                      <input type="submit" value="submit">
                      </div>
                      {!!Form::close()!!}
                </div>
              </div>
            </div>
          </div>
    </div>
</div>

<script>
      $(document).on('click','.edit',function(e){
        e.preventDefault();
        var data = $(this).data("id");
        alert(data);
        if ($('#bpcreate').valid()) {
        $.ajax({
            url:"{{route('contact.store')}}",
            method:"POST",
            data:data,
            dataType:"json",
            success:function(data)
            {
                console.log(data);
                $('#bpcreate').trigger('reset');
                Swal.fire({
                position: 'top-end',
                type: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
                });
                
            }
            });
        }
        });
</script>
@endsection
