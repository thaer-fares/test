
@include('header')

<a href="/add" class="btn btn-success mx-3 my-4">Add Employee Data</a>

<div class="container mt-5">
<table class="table table-border">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Department</th>
        <th>Email</th>
    </tr>

@foreach($x as $allemployee)
    <tr>
        <td>{{$allemployee->id}}</td>
        <td>{{$allemployee->name}}</td>
        <td>{{$allemployee->age}}</td>
        <td>{{$allemployee->department}}</td>
        <td>{{$allemployee->email}}</td>
    </tr>
    @endforeach
</table>
</div>

@include('footer')