@if(isset($code))
    <title>{{ $menuRepository->menuByCode($code)->seo_title }}</title>
    <meta name="keywords" content="{{ $menuRepository->menuByCode($code)->meta_keywords }}">
    <meta name="description" content="{{ $menuRepository->menuByCode($code)->meta_description }}">
@elseif($blog ?? false)
    <title>{{$blog->title}}</title>
    <meta name="keywords" content="{{$blog->meta_keywords}}">
    <meta name="description" content="{{$blog->meta_description}}">
@elseif($service ?? false)
    <title>{{$blog->title}}</title>
    <meta name="keywords" content="{{$blog->meta_keywords}}">
    <meta name="description" content="{{$blog->meta_description}}">
@else

@endif
