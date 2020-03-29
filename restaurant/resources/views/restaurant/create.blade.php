@extends('layouts.app')

@section('content')

<style type="text/css">

  label{
    font-weight: bold;
    font-size: 28px;
    color: rgb(0,105,165);
    margin-top: 50px;
  }

  .card{
    width: 60%;
    display: block;
    margin-right: auto;
    margin-left: auto;
    background-color: white;
    margin-top: 40vh; /* poussé de la moitié de hauteur de viewport */
  transform: translateY(-50%); /* tiré de la moitié de sa propre hauteur */
    border-radius: 50px;
  }

.center{
  text-align: center;
    display: block;
    margin-right: auto;
    margin-left: auto;
}

.buttonsend{
    background-color:rgb(0,105,165);
      display: block;
    margin-right: auto;
    margin-left: auto;
    margin-top: 30px;
    margin-bottom: 50px;
    border-radius: 50px;

}

hr{
  margin-top: 0px;
  height: 3px;
  background-color: rgb(235,195,40);
  width: 25px;
}

::-webkit-input-placeholder {
   text-align: center;
}

:-moz-placeholder { 
   text-align: center;  
}

::-moz-placeholder {  
   text-align: center;  
}

:-ms-input-placeholder {  
   text-align: center; 
}
</style>

<div class="container">
  <div class="card">
   <form action="/home" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="row">
        <div class="col-lg-8 center">

                <label>Ajouter un restaurant</label>
                <hr>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nom du restaurant">
                 <input type="hidden" name="_method" value="PATCH">
                @error('name')
                <div class="invalid-feedback">
                   Remplissez le champs
                </div>
                @enderror

        </div>
    </div>
      <button type="submit" class="btn btn-primary buttonsend">Ajouter le restaurant</button>

   </form>
</div>
</div>
@endsection
