@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="container-alphabetbar">  
        <h1>{{ "- $collection->name -" }}</h1>
      </div>
    </div>
  </div>  
</div>  

<div class="container">
  <div class="row">
    <div class="col-lg-9 col-image">
        <div class="container-borderforImagAndText">
          <img src="{{ asset('images/collections/main/' .$index.'/'. $collection->main_image) }}" class="img-fluid" style="width:100%;max-height:100%"/>
        </div>  
      </div>  
      
      <div class="col-lg-3 col-text">
        <div class="container-borderforImagAndText">  
          <h1>Noget test</h1>
          @if ( Auth::check() && Auth::user()->isAdmin() )
            <a href="{{ action('CollectionController@edit',[$collection->id]) }}" class="btn btn-info" role="button">Edit</a>
          @endif
        </div>  
      </div> 

    </div>
  
  </div>  



  

<!-- <div class="container">
  <?php echo nl2br($collection->description); ?>
</div> -->

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      @foreach ($collection->comics as $comic)
        <?php $userHasComic = $comic->userHasIt(Auth::id()); ?> 
    
        <div class="container-borderDefault container-width" style="display:inline-block;">
        
        @if ( $userHasComic  )
        <div class="container-header"><h4>{{ 'Nr. '.$comic->serienumber. '  -  '.$comic->subtitle  }}</h4> 
          <div style="position:relative;top:-30px;float:right;z-index:1;">
            <img src="{{ asset('images/icons/check.png') }}" width="32" height="25" alt="ok">
          </div>
        </div>
        <div class="container-body">
          <div style="margin:5px;float:left">
            <a href="{{ action('ComicController@show',[$comic->id]) }}">
              <img src="{{ asset('images/frontpages/' .$index.'/'. $comic->frontpage) }}" class="img-fluid" style="height:200px;"/></a>
          </div>
          <div><h6 style="width:65px;display:inline-block">{{ 'Forfatter' }}</h6><h6 style="display:inline-block">{{  $comic->writer}}</h6></div>
          <div><h6 style="width:65px;display:inline-block">{{ 'Tegner' }}</h6><h6 style="display:inline-block">{{  $comic->artist}}</h6></div>
          <div><h6 style="width:65px;display:inline-block">{{ 'Forlag' }}</h6><h6 style="display:inline-block">{{  $comic->publisher}}</h6></div>
          <div><h6 style="width:65px;display:inline-block">{{ 'Udgivet' }}</h6><h6 style="display:inline-block">{{  $comic->publishing_year.' , '. $comic->major_release.' udgave , '. $comic->minor_release.' oplag'}}</h6></div>
          <div><h6 style="width:65px;display:inline-block">{{ 'Format' }}</h6><h6 style="display:inline-block">{{  $comic->size.' , '.$comic->pages.' sider , '. $comic->cover }}</h6></div>
        </div> 
        <div class="container-footer">
          <div>
            <h6 style="width:155px;display:inline-block">{{ 'Stand:' }}</h6>
            <h6 style="width:150px;display:inline-block">{{ 'Anmeldelser:' }}</h6>
            <h6 style="width:180px;display:inline-block">{{ 'Samlet anmeldelse:' }}</h6>
          </div>  
        </div>    

        @else
        <div class="container-header"><h4>{{ 'Nr. '.$comic->serienumber. '  -  '.$comic->subtitle  }}</h4>  
          <div style="position:relative;top:-30px;float:right;z-index:1;">
            <img src="{{ asset('images/icons/missing.png') }}" width="25" height="25" alt="missing">
          </div>
        </div>

        <div class="container-body">
          <div style="margin:5px;float:left">
            <div style="width:150px;height:200px;clear"  
              <a href="{{ action('ComicController@show',[$comic->id]) }}">
                <img src="{{ asset('images/frontpages/' .$index.'/'. $comic->frontpage) }}" class="img-fluid" style="position:absolute;border:1px solid black;opacity:0.3;height:200px;"></a>
                  <div style="position:relative;top:100px;left:10px"><h3>MANGLER</h3></div>  
            </div>
          </div>  
          <div><h6 style="width:65px;display:inline-block">{{ 'Forfatter' }}</h6><h6 style="display:inline-block">{{  $comic->writer}}</h6></div>
          <div><h6 style="width:65px;display:inline-block">{{ 'Tegner' }}</h6><h6 style="display:inline-block">{{  $comic->artist}}</h6></div>
          <div><h6 style="width:65px;display:inline-block">{{ 'Forlag' }}</h6><h6 style="display:inline-block">{{  $comic->publisher}}</h6></div>
          <div><h6 style="width:65px;display:inline-block">{{ 'Udgivet' }}</h6><h6 style="display:inline-block">{{  $comic->publishing_year.' , '. $comic->major_release.' udgave , '. $comic->minor_release.' oplag'}}</h6></div>
          <div><h6 style="width:65px;display:inline-block">{{ 'Format' }}</h6><h6 style="display:inline-block">{{  $comic->size.' , '.$comic->pages.' sider , '. $comic->cover }}</h6></div>
            
          
        </div>
        <div class="container-footer">
        <div>
            <h6 style="width:155px;display:inline-block">{{ 'Stand:' }}</h6>
            <h6 style="width:150px;display:inline-block">{{ 'Anmeldelser:' }}</h6>
            <h6 style="width:180px;display:inline-block">{{ 'Samlet anmeldelse:' }}</h6>
          </div>
        </div>    
      @endif     
        
     
          @if ( Auth::check() && Auth::user()->isAdmin() ) 
            <a href="{{ action('ComicController@edit',[$comic->id]) }}" style="margin:5px;margin-top:6px;float:right" class="btn btn-info" role="button">Edit</a>
          @elseif ( $userHasComic )
            <a href="{{ action('ComicController@show',[$comic->id]) }}" style="margin:5px;margin-top:6px;float:right" class="btn btn-info" role="button">Mere Info</a>
            <a href="{{ action('ComicController@show',[$comic->id]) }}" style="margin:5px;margin-top:6px;float:right" class="btn btn-info" role="button">Anmeld</a>
            <a href="{{ action('UserComicController@edit',[$comic->id]) }}" style="margin:5px;margin-top:6px;float:right" class="btn btn-info" role="button">Rediger</a>
            

          @else
            <a href="{{ action('ComicController@show',[$comic->id]) }}" style="margin:5px;margin-top:6px;float:right" class="btn btn-info" role="button">Mere Info</a>
            <a href="{{ action('ComicController@show',[$comic->id]) }}" style="margin:5px;margin-top:6px;float:right" class="btn btn-info" role="button">Anmeld</a>
            <a href="{{ action('UserComicController@edit',[$comic->id]) }}" style="margin:5px;margin-top:6px;float:right" class="btn btn-info" role="button">Rediger</a>
          @endif   
         
         
          


         
      </div>   
      @endforeach
    </div>  
  </div>
</div>
  
      

</div>
@endsection
