@extends('layouts.app')


@section('content')
<table class="table table-striped table-hover">
<thead>
    <tr>
    <th scope="col">No</th>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Email</th>
    <th scope="col">Gender</th>
    <th scope="col">IP Address</th>
    <th scope="col"></th>
    </tr>
</thead>
<tbody>
    @foreach($data as $index => $row)
    <tr>
    <td scope="row">{{ $row[0] ?? '' }}</td>
    <td>{{ $row[1] ?? '' }}</td>
    <td>{{ $row[2] ?? '' }}</td>
    <td>{{ $row[3] ?? '' }}</td>
    <td>{{ $row[4] ?? '' }}</td>
    <td>{{ $row[5] ?? '' }}</td>
    <td>
        <a  data-toggle="modal" 
            data-target="#editModal" style="cursor:pointer;" 
            data-no="{{ $row[0] ?? '' }}" 
            data-firstname="{{ $row[1] ?? '' }}" 
            data-lastname="{{ $row[2] ?? '' }}" 
            data-email="{{ $row[3] ?? '' }}" 
            data-gender="{{ $row[4] ?? '' }}" 
            data-ip="{{ $row[5] ?? '' }}"
            data-range_start="{{ $row['rangeStart'] ?? '' }}"
            data-range_end="{{ $row['rangeEnd'] ?? '' }}"
            data-row_index="{{ $row['rowIndex'] ?? '' }}">
            <i class="bi bi-pencil-square p-3"></i>
        </a>
        <a  data-toggle="modal" 
            data-target="#deleteModal" style="cursor:pointer;" 
            data-no="{{ $row[0] ?? '' }}" 
            data-firstname="{{ $row[1] ?? '' }}" 
            data-lastname="{{ $row[2] ?? '' }}" 
            data-email="{{ $row[3] ?? '' }}" 
            data-gender="{{ $row[4] ?? '' }}" 
            data-ip="{{ $row[5] ?? '' }}"
            data-range_start="{{ $row['rangeStart'] ?? ''  }}"
            data-range_end="{{ $row['rangeEnd'] ?? '' }}"
            data-row_index="{{ $row['rowIndex'] ?? '' }}">
            <i class="bi bi-trash"></i>
        </a>
    </td>
    </tr>
    @endforeach

    @if(count($data) == 0)
    <tr class="bg-light p-5 text-center">
        <td colspan="6" class="p-5">
            No Records Found
        </td>
    </tr>
    @endif
</tbody>
</table>
@endsection