@extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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


.heightbloc{
	margin-top: 12vh;
    height: 250px;
    background-color:rgb(0,105,165);
    color: white;
	    border-radius: 50px;
    box-shadow: 50px;
}
hr{
  margin-top: 0px;
  height: 3px;
  background-color: rgb(235,195,40);
  width: 25px;
}

body{
	background-color: rgb(252,252,252);
}


.hrstyle{
	  margin-top: 0px;
  height: 3px;
  background-color: rgb(235,195,40);
  width: 25px;
  margin-bottom: 50px;
}
button{
    background-color: transparent;
    border:1px solid transparent;
}
label{
	font-size: 16px;
}
i{
	margin-top: 5px;
}
.name_category{
	text-align: left;
	font-size: 20px;
}

.name_categor_list{
	font-size: 16px;
		margin-bottom: 20px;

}
.lien_menu{
	color: rgb(0,105,165);
}

.leftbloc{
	margin-left: 3vw;
}

.ee{
background-color: red; 
}

.contenu-plat{
	margin-top: 100px;
}

.text{
		margin-top: 12vh;
    height: 250px;
    color: white;
}
.ee{
			margin-top: 6vh;
  background-color:rgb(0,105,165);

}

.tailleicon{
	width: 80px;
	font-size: 60px;
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

.checkbox{
	margin-left: 30px;
}
</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 categorie-titre">
			<br>
			Vos Catégories
			<hr class="hrstyle">

  				@foreach($category as $category)
  							<div class="row">
  								<div class="col-lg-1 name_category"></div>

  								<div class="col-lg-2 name_category"><i class="material-icons">{{ $category ->icon }}</i></button></div>

  								<div class="col-lg-4 name_category">

  				<a class="lien_menu" href="/category/index/{{$category->id}}">{{$category->name}}</a>
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
  			<div class="titre-restaurant">Ajouter un plat</div>		
			<hr>

<div class="container-fluid">
  <form action="/dish/create/{{$category ->id_restaurant}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
         <div class="col-lg-6">
            <label>Nom du plat</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="name">
                   <input type="hidden" name="_method" value="PATCH">
            @error('name')
            <div class="invalid-feedback">
               Remplissez le champs
            </div>
            @enderror
         </div>
         <div class="col-lg-6">
            <label>Description</label>
            <textarea type="text" class="form-control description @error('description') is-invalid @enderror" name="description" placeholder="description"></textarea>
            @error('description')
            <div class="invalid-feedback">
               Remplissez le champs
            </div>
            @enderror
         </div>
      </div>
      <div class="row">
         <div class="col-lg-6">
            <label>Prix</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="price">
            @error('price')
            <div class="invalid-feedback">
               Remplissez le champs
            </div>
            @enderror
         </div>
         <div class="col-lg-6">
            <label>Ajouter une image</label>
            <div class="custom-file">
               <input type="file" class="custom-file-input" id="customFile" name="image">
               <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
         </div>
</div>
            <label>Catégorie</label>
            <hr>
<div class="name_categor_list">
  				@foreach($categorylist as $categorylist)
  				 <input type="hidden" name="_method" value="PATCH">
  					<input type="checkbox"  name="categorybox[]"  value="{{$categorylist->id}}" class="checkbox">	{{$categorylist->name}}	
  					 <input type="hidden" name="_method" value="PATCH">	
  				@endforeach
  				</div>
      <button type="submit" class="btn btn-primary buttonsend">Ajouter le plat</button>

</form>
		</div>

	</div>
</div>


<script>
   $(() => {
       $('input[type="file"]').on('change', (e) => {
           let that = e.currentTarget
           if (that.files && that.files[0]) {
               $(that).next('.custom-file-label').html(that.files[0].name)
               let reader = new FileReader()
               reader.onload = (e) => {
                   $('#preview').attr('src', e.target.result)
               }
               reader.readAsDataURL(that.files[0])
           }
       })
   })
</script>
@endsection
