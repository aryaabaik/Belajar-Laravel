@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <fieldset>
        <legend>Data Posts</legend>  
        <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary" style="float-right">Tambah Data</a>
        <div class="table-responsive py-2">
             <table class="table" border="1" >
                <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Tittle</th>
                <th>Content</th>
                <th>Action</th>
            </tr> 
                </thead>
            @foreach ($post as $data)
                <tr>
                    <th>{{ $loop->iteration}}</th>
                    <th>{{ $data->tittle}}</th>
                    <th>{{Str::limit($data->content, 100)}}</th>
                    <th>
                        <form action="{{ route('post.delete', $data->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('post.edit', $data->id) }}" class="btn btn-sm btn-success">
                                Edit
                            </a> |
                       
                        <button type="submit" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-sm btn-danger">
                            Delete
                        </button> 
                    </form>
                    </th>
                </tr>
            @endforeach
        </table>
        </div>
       
    </fieldset>
            </div>
        </div>
    </div>
    <div class="container py-5" >
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span class="text-muted">Arya Adhitya XI RPL 3 </span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#twitter"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#instagram"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#facebook"></use>
                        </svg></a></li>
            </ul>
        </footer>
    </div>

@endsection