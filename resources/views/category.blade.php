@extends('master')

@section('title','Категория ' . $category->name )

@section('content')



        <h1>
           {{$category->name}} {{$category->products->count()}}
        </h1>
        <p>
            {{$category->description}}
        </p>
        <div class="row">

            @foreach($category->products as $product)
                @include('card')
            @endforeach
        </div>

@endsection
