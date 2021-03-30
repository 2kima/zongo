@extends('layout')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>ID</td>
          <td>nom</td>
          <td>prix</td>
          <td>qte_stock</td>
          <td>images</td>
          
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($poisson as $poisson)
        <tr>
            <td>{{$poisson->id}}</td>
             <td>{{$poisson->title}}</td>
            <td>{{$poisson->prix}}</td>
            <td>{{$poisson->qte_stock}}</td>
             <td><img src="{{asset('images/')}}/{{$poisson->images}}" width="100" height="80"/></td>
            
            <td class="text-center">
                <a href="{{ route('poisson.edit', $poisson->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('poisson.destroy', $poisson->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
