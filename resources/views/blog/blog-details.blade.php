@extends('layout')

@section('title')
    Blog Details Page |  TMT
@endsection

@section('content')
<main id="main">

    <?php
    use App\Models\User;
    use App\Models\Service;
    $service = Service::findOrFail($blog->id);
    ?>
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog Details - {{ $service->title }}</h2>
          <ol>
            <li><a href="home">{{ __('Accueil') }}</a></li>
            <li><a href="blog">Blog</a></li>
            <li>{{ $blog->title }}</li>
          </ol>
        </div>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Details Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8">

            <article class="blog-details">

              <div class="post-img">
                <img src="/images/{{ $blog->image }}" alt="" class="img-fluid">
              </div>

              <h2 class="title">{{ $blog->title }}</h2>

              <?php

                $user = User::findOrFail($blog->user_id);

              ?>

              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details">{{ $user->last_name }} {{ $user->first_name }}</a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details"><time datetime="2020-01-01">{{ $blog->created_at }}</time></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details">{{ $comments->count() }} {{ __('Commentaires') }}</a></li>
                </ul>
              </div><!-- End meta top -->

              <div class="content">
                <p>{{$blog->description}}</p>

              </div><!-- End post content -->

              {{-- <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End meta bottom --> --}}

            </article><!-- End blog post -->

            {{-- <div class="post-author d-flex align-items-center">
              <img src="/assets/img/blog/blog-author.jpg" class="rounded-circle flex-shrink-0" alt="">
              <div>
                <h4>Jane Smith</h4>
                <div class="social-links">
                  <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                  <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                </div>
                <p>
                  Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                </p>
              </div>
            </div><!-- End post author --> --}}

            <div class="comments">

              <h4 class="comments-count">{{ $comments->count() }} {{ __('Commentaires') }}</h4>
              @foreach ($comments as $comment)

              <?php

                $user = User::findOrFail($comment->user_id);

              ?>

              <div id="comment-1" class="comment">
                <div class="d-flex">
                  <div class="comment-img">
                    @if ($user->image)
                    <img src="/images/{{ $user->image }}" alt="">
                    @else
                    <img src="/assets/img/john.png" alt="">
                    @endif
                </div>
                  <div>
                    <h5><a href="">{{ $user->first_name }} {{ $user->last_name }}</a></h5>
                    <time datetime="2020-01-01">{{ $comment->created_at }}</time>
                    <p>{{$comment->comment}}</p>
                  </div>
                </div>
              </div><!-- End comment #1 -->

              @endforeach

              <div class="reply-form">

                <h4>{{ __('Laissez un commentaire') }}</h4>
                <p>{{ __('Si vous êtes connecté, vous pouvez laisser un commentaire') }} </p>
                @if(session('message'))
                    <div class="alert alert-success"><b>Well done ! </b> {{ session('message') }}.</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger"><b>Danger ! </b> {{ session('error') }}.</div>
                @endif
                <form action="{{ route('comment.blog', ['id' => $blog->id]) }}" method="POST">
                    @csrf
                  <div class="row">
                    <div class="col form-group">
                      <textarea name="comment" class="form-control" placeholder="{{ __('Votre Commentaire') }}"></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">{{ __('Poster commentaire') }}</button>

                </form>

              </div>

            </div><!-- End blog comments -->

          </div>

          <div class="col-lg-4">

            <div class="sidebar"><!-- End sidebar search formn-->

              <div class="sidebar-item categories">
                <h3 class="sidebar-title">{{ __('Tous les blogs pour le même service') }}</h3>
                <ul class="mt-3">
                    @foreach ($blogs as $blog)
                    <li><a href="/blog-details/{{ $blog->id }}">{{ $blog->title }} <span></span></a></li>
                    @endforeach
                </ul>
              </div><!-- End sidebar categories-->

            </div><!-- End Blog Sidebar -->

          </div>
        </div>

      </div>
    </section><!-- End Blog Details Section -->

  </main><!-- End #main -->

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

                      <div class="meta-top">
                        <ul>
                          <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details">{{ $user->first_name }}</a></li>
                          <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details"><time datetime="2020-01-01">{{ $blog->created_at }}</time></a></li>
                          <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details">{{ $comments->count() }} {{ __('Commentaires') }}</a></li>
                        </ul>
                      </div>

                      <div class="content">
                        <p>
                          {{-- {{ $blog->r_description }} --}}
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
