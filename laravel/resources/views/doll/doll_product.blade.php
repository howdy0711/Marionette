@extends('layouts.master2')
@section('content')

<!--컨텐츠 타이틀-->
@section('banner')

		<header>

		</header>
		<center>
		<br>
		<a href="" class="button big">BASIC</a>
		<a href="" class="button big">MIDDLE</a>
		<a href="" class="button big">HIGH</a>
		</center>

 @endsection

<section class="tiles">
@foreach($content as $cont)
<?php $class = $randomNum = mt_rand(1, 6); ?>
	<article class="style{{$class}}">
		<span class="image">
			<img src=""style="width: 360px; height: 360px; "/>
		</span>
		<a href="">
			<h2 class="main_content_title">{{$cont->doll_name}}</h2>
			<div class="content">
				<p>{{$cont->thread_of_doll}}</p>
			</div>
		</a>
	</article>
@endforeach
</section>
@endsection


