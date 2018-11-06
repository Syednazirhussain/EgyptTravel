@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Blog Post
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($blogPost, ['route' => ['blogPosts.update', $blogPost->id], 'method' => 'patch']) !!}

                        @include('blog_posts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection