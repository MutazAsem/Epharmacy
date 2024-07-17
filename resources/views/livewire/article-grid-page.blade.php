<div style="margin-top: 40px">
    <div class="ltn__blog-area ltn__blog-item-3-normal mb-100">
        <div class="container">
            <div class="row">
                <!-- Blog Item -->
                @foreach ($articles as $article)
                <div class="col-lg-4 col-sm-6 col-12" wire:key="{{ $article->id }}">
                    <div class="ltn__blog-item ltn__blog-item-3">
                        <div class="ltn__blog-img">
                            <a href="#"><img src="{{ url('storage', $article->image) }}" alt="{{ $article->title }}" width="350px" height="450px"></a>
                        </div>
                        <div class="ltn__blog-brief">
                            <div class="ltn__blog-meta">
                                <ul>
                                    <li class="ltn__blog-author">
                                        <a href="#"><i class="far fa-user"></i>by: {{ $article->writer->name }}</a>
                                    </li>
                                </ul>
                            </div>
                            <h3 class="ltn__blog-title"><a href="#">{{ $article->title }}</a></h3>
                            <div class="ltn__blog-meta-btn">
                                <div class="ltn__blog-meta">
                                    <ul>
                                        <li class="ltn__blog-date"><i class="far fa-calendar-alt"></i>{{ $article->created_at }}</li>
                                    </ul>
                                </div>
                                <div class="ltn__blog-btn">
                                    <a href="{{ route('articleDetails', ['id' => $article->id]) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!--  -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__pagination-area text-center">
                        {{$articles->links('pagination::bootstrap-5')}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
