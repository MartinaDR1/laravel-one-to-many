@extends('layouts.admin')


@section('content')


<h1 class="text-muted display-5 py-3">Types Page</h1>

@include('partials.session_message')
<div class="row">
    
    <div class="col-6">
        <form action="{{route('admin.types.store')}}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="Button" name="name" id="name">
                <button class="btn btn-outline-secondary" type="submit">Add</button>
            </div>

        </form>
    </div>

    <div class="col-6">
        <div class="table-responsive-md">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($types as $type)
                    <tr class="">
                        <td scope="row">{{$type->id}}</td>
                        <td>{{$type->name}}</td>
                        <td>{{$type->slug}}</td>
                        <td>
                            <form action="{{route('admin.types.destroy', $type)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash fa-sm fa-fw"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr class="">
                        <td scope="row"> Add type </td>
                    </tr>

                    @endforelse


                </tbody>
            </table>
        </div>


    </div>

</div>



@endsection