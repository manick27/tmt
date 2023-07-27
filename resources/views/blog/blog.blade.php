@extends('layout')

@section('title')
    Blog Page |  TMT
@endsection

@section('content')

<main id="main">

    <?php
    use App\Models\User;
    use App\Models\Comment;
    ?>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>
          <ol>
            <li><a href="index.html">{{ __('Accueil') }}</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-12">

            <div class="row gy-4 posts-list">

                @if (!$blogs->count())
                    <p style="font-size: 3rem">{{ __('Pas de publication pour ce service.') }}</p>
                @endif
                @foreach ($blogs as $blog)

                <div class="col-lg-4">
                  <article class="d-flex flex-column">

                    <div class="post-img">
                      <img src="/images/{{ $blog->image }}" alt="" class="img-fluid">
                    </div>

                    <h2 class="title">
                      <a href="/blog-details/{{ $blog->id }}">{{ $blog->title }}</a>
                    </h2>
                    <?php

                      $user = User::findOrFail($blog->user_id);
                      $comments = Comment::where('blog_id', $blog->id);

                    ?>

                    <div class="meta-top">
                      <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details">{{ $user->first_name }}</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details"><time datetime="2020-01-01">{{ $blog->created_at }}</time></a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details">{{ $comments->count() }} {{ __('Commentaires') }}</a></li>
                      </ul>
                    </div>

                    <div class="content">
                      <p>
                        {{-- {{ $blog->description }} --}}
                      </p>
                    </div>

                    <div class="read-more mt-auto align-self-end">
                      <a href="/blog-details/{{ $blog->id }}">{{ __('En savoir plus') }}</a>
                    </div>

                  </article>
                </div><!-- End post list item -->

                @endforeach

            </div><!-- End blog posts list -->


          </div>

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

@endsection
