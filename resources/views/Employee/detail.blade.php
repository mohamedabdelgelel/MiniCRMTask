@extends('layouts.app')

@section('content')

<div class="container">
    <h3>employee</h3>
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
        </thead>
        <tbody>
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
                <td>
                    {{$employee->Company->name}}
                </td>                                   
            </tr>
        </tbody>
    </table>
</div>
@endsection