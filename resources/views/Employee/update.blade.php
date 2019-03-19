@extends('layouts.app')

@section('content')

    <div class="container">
        <h3 class="hh" >Update Compny</h3> <hr>
        <form class="form-horizontal" role="form" name="form"  action="/updateEmployee/{{$employee->id}}" method="POST">
            {{csrf_field()}}
            <div class="form-group">
                <label class="col-md-4 control-label ">firstName</label>
                <div class="col-md-4 ">
                    <input class="form-control" type="text" name="firstName" value="{{$employee->firstName}}" required>
                </div>    
            </div>
                        
            <div class="form-group">
                <label class="col-md-4 control-label ">lastName</label>
                <div class="col-md-4 ">
                    <input class="form-control" type="text" name="lastName" value="{{$employee->lastName}}" required>
               </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label ">Email</label>
                <div class="col-md-4 ">
                    <input class="form-control" type="email" name="email" value="{{$employee->email}}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">phone</label>
                <div class="col-md-4 ">
                    <input class="form-control" type="number" name="phone" value="{{$employee->phone}}">
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-4 control-label">companies</label>
                <div class="col-md-4 edit">
                    <select class="form-control" name="company_id">
                        <option value="0">Select</option>
                        @foreach($companies as $c)
                            <option value="{{ $c->id }}">
                                {{ $c->name }}
                            </option>
                        @endforeach
                    </select>
                </div>                           
            </div>
                        
            <br><br>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" value="update" />
            </div>
        </form>
    </div>
@endsection