@extends('layouts.app')

@section('content')

<style type="text/css">

.titre-restaurant{
  text-align: center;
  font-size: 43px;
  font-weight: bold;
  color: rgb(0,105,165);
}

.categorie-general
{
    text-align: center;
  font-size: 43px;
  font-weight: bold;
  color: rgb(0,105,165);
    margin-left: 25vw;

}
.add_categorie_plat{
      margin-top: 120px; /* poussé de la moitié de hauteur de viewport */
   transform: translateY(-50%); /* tiré de la moitié de sa propre hauteur */
   font-size: 30px;
    vertical-align: middle;
    font-weight: bold;
}

.categorie-titre{
  text-align: center;
  font-size: 26px;
  font-weight: bold;
  color: rgb(0,105,165);
  min-height: 95vh;
  box-shadow: 10px 5px 5px rgb(230,230,230);
position: fixed;
}
.buttonsend{
  background-color:rgb(0,105,165);
      display: block;
    margin-right: auto;
    margin-left: auto;
    margin-top: 80px;
    margin-bottom: 50px;
    border-radius: 50px;

}

.heightbloc{
  margin-top: 12vh;
      border-radius: 50px;
    height: 250px;
    background-color:rgb(235,195,40);
}
hr{
  margin-top: 0px;
  height: 3px;
  background-color: rgb(235,195,40);
  width: 25px;
}


.hrstyle{
    margin-top: 0px;
  height: 3px;
  background-color: rgb(235,195,40);
  width: 25px;
  margin-bottom: 50px;
}
body{
  background-color: rgb(252,252,252);
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

.style-input{
  width: 60% !important;
  display: block;
  margin-right: auto;
  margin-left: auto;
}

button{
    background-color: transparent;
    border:1px solid transparent;
}

.name_category{
  text-align: left;
  font-size: 20px;
}

.styleslect{
  font-size: 16px;
  opacity: 0.5;
}

.optioncenter{
  text-align: center;
}

select {
  text-align: center;
  text-align-last: center;
    display: block;
  width: 100%;
  height: calc(1.6em + 0.75rem + 2px);
  padding: 0.375rem 0.75rem;
  font-size: 0.9rem;
  font-weight: 400;
  line-height: 1.6;
  background-color: white;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}


label{
  font-size: 16px;
}
i{
  margin-top: 5px;
}

.style-input{
  width: 60% !important;
  display: block;
  margin-right: auto;
  margin-left: auto;
}

.restaurant_lien{
  color: rgb(0,105,165);
  
}
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 categorie-titre">
      <br>
      Vos Restaurants
      <hr class="hrstyle">

          @foreach($restaurants as $restaurants)
                <div class="row">

                  <div class="col-lg-1"></div>

                  <div class="col-lg-7 name_category">

         <a class="restaurant_lien" href="/restaurant/{{ $restaurants ->id }}">{{$restaurants->name}}</a>
      </div>
                  <div class="col-lg-4">
                      <form action="/restaurant/delete/{{ $restaurants ->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                       <a href="/restaurant/{{ $restaurants ->id }}"> <button type="submit"> <i class="material-icons">delete</i></button> </a> 
                      </form>
            </div>
                      </div>
          @endforeach
        
    </div>
    <div class="col-lg-9 categorie-general">
      <br>
        <div class="titre-restaurant">
          Ajouter un restaurant
   <form action="/home" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="row">
        <div class="col-lg-12 center">

                <hr>
                <input type="text" class="form-control style-input @error('name') is-invalid @enderror" name="name" placeholder="Nom du restaurant">
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


  </div>
</div>

<script>
  var allRadios = document.getElementsByID('icon');
var booRadio;
var x = 0;
for(x = 0; x < allRadios.length; x++){

        allRadios[x].onclick = function(){

            if(booRadio == this){
                this.checked = false;
        booRadio = null;
            }else{
            booRadio = this;
        }
        };

}
</script>
@endsection
