@extends('layouts.app')

@section('content')

@if(session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif

<table class="table mr-2">
    <thead>
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>NRC</th>
            <th>Courses</th>
        </tr>
    </thead>

    <tbody>
        @if(
            count($students) > 0
        )
            @foreach($students as $cap => $student)
                <tr>
                    <td>{{ $cap + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->dob }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->nrc }}</td>
                    <td>{{ $student->course }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection
