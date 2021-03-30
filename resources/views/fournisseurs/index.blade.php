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
        @foreach($fournisseur as $fournisseur)
        <tr>
            <td>{{$fournisseur->id}}</td>
            <td>{{$fournisseur->nom}}</td>
            <td>{{$fournisseur->prenom}}</td>
            <td>{{$fournisseur->contact}}</td>
           
            <td class="text-center">
                <a href="{{ route('fournisseur.edit', $fournisseur->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('fournisseur.destroy', $fournisseur->id)}}" method="post" style="display: inline-block">
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
