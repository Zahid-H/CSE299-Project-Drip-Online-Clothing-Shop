@extends('admin.layout.layout')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>S no.</th>
            <th>category Name</th>
            <th>Parent category Name</th>
            <th> Create Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $categories as $key=>$categorie )
        <tr>
            <td>{{ $key+1}}</td>
            <td>{{ $categorie->name }}</td>
            
            <td>
                @if($categorie->category_id )
                {{ $categorie->parent->name }}
                @else
                No parent category
                @endif
            </td>
            <td>{{ $categorie->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection