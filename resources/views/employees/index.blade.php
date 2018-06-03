@extends('layouts.app')

@section('content')

     <div class="container">
          <div class="mb-4">
               <a href="{{ route('employees.create') }}" class="btn btn-success">Add New Employee</a>
          </div>
          <div class="row">
               <div class="mb-3">
                    <h4>Employees</h4>
               </div>
               <table class="table text-center">
                    <thead>
                         <tr>
                              <th scope="col">Employee ID</th>
                              <th scope="col">Name</th>
                              <th scope="col">Login Status</th>
                              <th scope="col">Action</th>
                         </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $key => $employee)
                         <tr>
                              <td><a href="{{ route('employees.show', $employee->id) }}">{{ $employee->employee_id }}</a></td>
                              <td>{{ $employee->meta('first_name') }} {{ $employee->meta('last_name') }}</td>
                              <td>
                                   @if($employee->meta('login_status') == 0)
                                        Currently logged off
                                   @else
                                        Logged in
                                   @endif
                              </td>
                              <td>
                                   <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                   <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                        @csrf @method('delete')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                   </form>
                              </td>
                         </tr>
                    @endforeach
                    </tbody>
               </table>
          </div>
     </div>

@endsection