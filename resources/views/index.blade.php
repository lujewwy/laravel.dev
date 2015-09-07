@extends('master')
@section('title', 'Home')
@section('stylesheets')
<link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />
@append

@section('content')
<div class="container">
@if(isset($imagesArray) AND is_array($imagesArray) AND count($imagesArray) > 0)
    <?php $imagesPerRow = 3; ?>
    <?php $rowIterator = 1; ?>

    @foreach($imagesArray as $key => $image)

    @if($rowIterator == 1)
    <div class="images-row">
    @endif

        <a class="item">
            <div class="image-block">
                <img src="{{ URL::asset('images/'.$image) }}" />
            </div>
        </a>

    @if($rowIterator == $imagesPerRow OR $key+1 == count($imagesArray))
    </div>
    <?php $rowIterator = 1; ?>
    @else
    <?php $rowIterator++; ?>
    @endif

    @endforeach
@endif
</div>

<script type="text/javascript" language="JavaScript">
    $(document).ready(function() {
        $('.images-row a').mouseenter(function() {
            $(this).append('<?php echo View::make("imageDarken"); ?>');
        });

        $('.images-row a').mouseleave(function() {
            $(".darkenImage").remove();
        });
    });
</script>
@endsection
