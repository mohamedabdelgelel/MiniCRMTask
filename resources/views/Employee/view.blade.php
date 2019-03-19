@extends('layouts.app')

@section('content')

<div class="container">
    <h3>employees</h3>
    <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm  edit" cellspacing="0" width="100%">
        <thead>
            <th class="th-sm">Name
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Email
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Phone
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Company
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Detail
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Update
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
            <th class="th-sm">Delete
                <i class="fa fa-sort float-right" aria-hidden="true"></i>
            </th>
        </thead>
        <tbody>
            <div class="employee">
                @foreach($employees as $employee)
                    <tr>
                        <td>
                            {{$employee->firstName}} {{$employee->lastName}}
                                                        
                        </td>
                        <td>                                
                            {{$employee->email}}
                        </td>
                        <td>
                            {{$employee->phone}}
                        </td>
                        @if($employee->company_id)
                            <td>
                                {{$employee->Company->name}}
                            </td>
                        @else
                            <td>
                                
                            </td>           
                        @endif
                        <td>
                            <a href="../showEmployee/{{$employee->id}}">Detail</a>
                        </td>
                        <td>
                            <a href="../editEmployee/{{$employee->id}}">Update</a>
                        </td>
                        <td>
                            <a href="../destroyEmployee/{{$employee->id}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </div>
            {{ $employees->links() }}
        </tbody>
    </table>
</div>
@endsection
