<div style="margin-top: 20px">
    <div class="ltn__page-details-area ltn__blog-details-area mb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ltn__blog-details-wrap">
                        <div class="ltn__page-details-inner ltn__blog-details-inner">
                            <img src="{{ url('storage', $article->image) }}" alt="{{ $article->title }}" />

                            <br><br>
                            <h2 class="ltn__blog-title">
                                {{ $article->title }}
                            </h2>
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><img src="{{ url('storage', $article->writer->profile_photo_path) }}"
                                                alt="{{ $article->writer->name }}" />By: {{ $article->writer->name }}</a>
                                    </li>
                                    <li class="ltn__blog-date">
                                        <i class="far fa-calendar-alt"></i>{{ $article->created_at }}
                                    </li>
                                </ul>
                            </div>
                            <p>
                                {{ $article->content }}
                            </p>
                            <hr />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
