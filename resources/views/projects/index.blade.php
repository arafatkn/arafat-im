@extends('layouts.master')

@section('title', 'Projects')

@section('content')

<!-- section works -->
<section id="works">

	<div class="container">
		
		<!-- section title -->
		<h2 class="section-title wow fadeInUp">Recent works</h2>

		<div class="spacer" data-height="60"></div>

		<!-- portfolio filter (desktop) -->
		<ul class="portfolio-filter list-inline wow fadeInUp">
			<li class="current list-inline-item" data-filter="*">Everything</li>
		@foreach($filters as $item)
			<li class="list-inline-item" data-filter=".{{ $item }}">{{ $item }}</li>
		@endforeach
		</ul>
		
		<!-- portfolio filter (mobile) -->
		<div class="pf-filter-wrapper">
			<select class="portfolio-filter-mobile">
				<option value="*">Everything</option>
			@foreach($filters as $item)
				<option value=".{{ $item }}">{{ $item }}</option>
			@endforeach
			</select>
		</div>
		
		<!-- portolio wrapper -->
		<div class="row portfolio-wrapper">
		@foreach ($projects as $item)
			<!-- portfolio item -->
			<div class="col-md-5 col-sm-6 grid-item {{ str_replace(',',' ', $item->tags) }}">
			@if($item->url)
				<a href="#small-dialog-{{ $item->id }}" class="work-content">
			@elseif($item->images!=Null)
				<a href="#gallery-{{ $item->id }}" class="gallery-link">
			@else
				<a href="{{ $item->getThumbUrl() }}" class="work-image">
			@endif
					<div class="portfolio-item rounded shadow-dark">
						<div class="details">
							<span class="term">{{ $item->tags }}</span>
							<h4 class="title">{{ $item->title }}</h4>
							<span class="more-button"><i class="icon-options"></i></span>
						</div>
						<div class="thumb">
							<img src="{{ $item->getThumbUrl() }}" alt="{{ $item->title }}" />
							<div class="mask"></div>
						</div>
					</div>
				</a>
			@if($item->url)
				<div id="small-dialog-{{ $item->id }}" class="white-popup zoom-anim-dialog mfp-hide">
					<img src="{{ $item->getThumbUrl() }}" alt="{{ $item->title }}" />
					<h2>{{ $item->title }}</h2>
					<p>Tags: {{ $item->tags }}</p>
					<p>{{ $item->details }}</p>
				@if($item->video_url)
					<a href="{{ $item->video_url }}" class="btn btn-info" target="_blank">Play Video</a>
				@endif
					<a href="{{ $item->url }}" class="btn btn-default" target="_blank">View Details</a>
				</div>
			@elseif($item->images!=Null)
				<div id="gallery-{{ $item->id }}" class="gallery mfp-hide">
				@foreach($item->images as $image)
					<a href="{{ $image }}"></a>
				@endforeach
				</div>
			@endif
			</div>
		@endforeach

		</div>
		
		<!-- more button -->
		<div class="load-more text-center mt-4">
			<a href="javascript:" class="btn btn-default"><i class="fas fa-spinner"></i> Load more</a>
			<!-- numbered pagination (hidden for infinite scroll) -->
			<ul class="portfolio-pagination list-inline d-none">
				<li class="list-inline-item">1</li>
				<li class="list-inline-item"><a href="works-2.html">2</a></li>
			</ul>
		</div>

	</div>

</section>

@endsection