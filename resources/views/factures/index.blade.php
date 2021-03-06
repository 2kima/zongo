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
          <td>prix</td>
          <td>qte_prod</td>
          <td>montant</td>
           <td>date</td>
         
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($facture as $facture)
        <tr>
            <td>{{$facture->id}}</td>
            <td>{{$facture->prix}}</td>
            <td>{{$facture->qte_prod}}</td>
            <td>{{$facture->montant}}</td>
            <td>{{$facture->date}}</td>
           
           
            <td class="text-center">
                <a href="{{ route('facture.edit', $facture->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                <form action="{{ route('facture.destroy', $facture->id)}}" method="post" style="display: inline-block">
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
