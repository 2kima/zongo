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
          <td>Nom</td>
          <td>Prenom</td>
          <td>Contact</td>
         
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($client as $client)
        <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->nom}}</td>
            <td>{{$client->prenom}}</td>
            <td>{{$client->contact}}</td>
           
            <td class="text-center">
                <a href="{{ route('client.edit', $client->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('client.destroy', $client->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
