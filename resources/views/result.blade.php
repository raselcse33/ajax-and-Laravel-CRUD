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
                                <th scope="col">ref_code</th>
                                <th scope="col">count</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $list)
                              <tr>
                              <td>{{$list['ref_code']}}</td>
                              <td>{{$list['coutn']}}</td>
                              <td>
                              <button type="button" class="btn btn-primary edit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Edit</button>
                              </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
        @endsection