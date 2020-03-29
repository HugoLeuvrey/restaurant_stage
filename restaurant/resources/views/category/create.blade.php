@extends('layouts.app')

@section('content')

<style type="text/css">

.titre-restaurant{
	text-align: center;
	font-size: 43px;
	font-weight: bold;
	color: rgb(0,105,165);
}

.add_categorie_plat{
	    margin-top: 120px; /* poussé de la moitié de hauteur de viewport */
 	 transform: translateY(-50%); /* tiré de la moitié de sa propre hauteur */
 	 font-size: 30px;
    vertical-align: middle;
    font-weight: bold;
}
.categorie-general
{
		text-align: center;
	font-size: 43px;
	font-weight: bold;
	color: rgb(0,105,165);
    margin-left: 25vw;

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
    border-radius: 50px;

}

.buttonback{
	  background-color:rgb(0,105,165);
      display: block;
    margin-right: auto;
    margin-left: auto;
    margin-top: 30px;
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

.lien_menu{
	color: rgb(0,105,165);
}
</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 categorie-titre ">
			<br>
			Vos Catégories
			<hr class="hrstyle">

  				@foreach($category as $category)
  							<div class="row">
  								<div class="col-lg-1 name_category"></div>

  								<div class="col-lg-2 name_category"><i class="material-icons">{{ $category ->icon }}</i></button></div>

  								<div class="col-lg-4 name_category">

  				<a href="/category/index/{{$category->id}}" class="lien_menu">{{$category->name}}</a>
  		</div>
  								<div class="col-lg-4">

  				     <form action="/category/delete/{{ $category ->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                       <a href="/category/{{ $category ->id }}"> <button type="submit"> <i class="material-icons">delete</i></button> </a> 
                      </form>
  					</div>
                      </div>
  				@endforeach
  			
		</div>
		<div class="col-lg-9 categorie-general">
			<br>
  			<div class="titre-restaurant">
  				Ajouter une catégorie

  			</div>

			<hr>
			   <form action="/category/create/{{$restaurant->id}}" method="POST" enctype="multipart/form-data">
      @csrf
                <input type="text" class="form-control style-input @error('name') is-invalid @enderror" name="name" placeholder="Nom de la catégorie">
                 <input type="hidden" name="_method" value="PATCH">
                @error('name')
                <div class="invalid-feedback">
                   Remplissez le champs
                </div>
                @enderror
<br>

<div class="row">

	<div class="col-lg-2">

	</div>

	<div class="col-lg-2">
 		<input type="radio" id="re" name="icon" value="local_dining" checked>
		<i class="material-icons">local_dining</i>
	</div>

	<div class="col-lg-2">
		
 	<input type="radio" id="re" name="icon" value="fastfood" >
	<i class="material-icons">fastfood</i>
	</div>

	<div class="col-lg-2">
	
 	<input type="radio" id="re" name="icon"  value="local_cafe">
	<i class="material-icons">local_cafe</i>
	</div>

	<div class="col-lg-2">
 	<input type="radio" id="re" name="icon" value="local_dining" >
	<i class="material-icons">local_dining</i>
	</div>

	<div class="col-lg-2">

	</div>
</div>


<div class="row">

	<div class="col-lg-2">

	</div>

	<div class="col-lg-2">
 		<input type="radio" id="re" name="icon"  value="local_pizza">
		<i class="material-icons">local_pizza</i>


	</div>

	<div class="col-lg-2">
		
 	<input type="radio" id="re" name="icon"  value="restaurant">
	<i class="material-icons">restaurant</i>
	</div>

	<div class="col-lg-2">
	
 	<input type="radio" id="re" name="icon"  value="restaurant_menu">
	<i class="material-icons">restaurant_menu</i>
	</div>

	<div class="col-lg-2">
 	<input type="radio" id="re" name="icon" value="kitchen" >
	<i class="material-icons">kitchen</i>
	</div>

	<div class="col-lg-2">

	</div>
</div>


      <button type="submit" class="btn btn-primary buttonsend">Ajouter la catégorie</button>

  </form>
      <a href="/restaurant/{{$restaurant -> id}}"><button type="submit" class="btn btn-primary buttonback">Retour</button></a>

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
