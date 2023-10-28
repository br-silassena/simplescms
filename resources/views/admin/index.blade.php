@extends('layouts.admin')

@section('css')

@endsection

@section('content')

<div class="row">
        
    <div class="card card-quipamentos bg-primary text-white text-center m-1 col-2">
        <blockquote class="blockquote mb-0">
            <h1>{{ $equipamentos }}</h1> 
            Equipamentos
        </blockquote>
    </div>
    
</div>


@endsection

@section('js')

<script>

    $('.card-quipamentos').mouseover(function(){
        $(this).css("cursor", "pointer");
    });
    $('.card-quipamentos').click(function(){
        window.location.replace('{{ asset("/admin/equipamentos") }}');
    });

</script>

@endsection