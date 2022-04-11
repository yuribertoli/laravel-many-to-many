@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{route('admin.posts.create')}}" class="btn btn-success mb-3">Crea un post</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Contenuto</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{$tag->id}}</td>
                                <td>{{$tag->name}}</td>
                                <td>{{$tag->slug}}</td>


                                <td>
                                    <a href="{{route('admin.tags.show', $tag->id)}}" class="btn btn-primary">Vedi</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
