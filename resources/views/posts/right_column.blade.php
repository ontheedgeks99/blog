
     <!-- カテゴリー -->
        <div class="card mt-3">
            <div class="card-header">
                <p class="card-header-text arrow">
                    Category
                </p>
            </div>
            <ul class="list-group list-group-flush">
                @forelse( $category_list as $category )
                <li class="list-group-item border-top">
                    <a href="{{ route('front_index_other', ['category_id' => $category->category_id]) }}" class="link">
                        {{ $category->name }}
                    </a>
                </li>
                @empty
                    <p>カテゴリーがありません</p>
                @endforelse
            </ul>
        </div>

    <!-- 月別アーカイブ -->
        <div class="card mt-3">
            <div class="card-header">
                <p class="card-header-text arrow">
                    Archive
                </p>
            </div>
            <ul class="list-group list-group-flush">
            @forelse( $month_list as $value)
                <li class="list-group-item border-top">
                    <a href="{{ route('front_index_other', ['year' => $value->year, 'month' => $value->month]) }}" class="link">
                    {{ $value->year_month }}
                    </a>
                </li>
            @empty
                <li>まだ記事はありません</li>
            @endforelse
            </ul>
        </div>

    <!-- プロフィール -->
        <div class="card mt-3">
            <div class="card-header">
                <p class="card-header-text arrow">
                    Profile
                </p>
            </div>
            <ul class="list-group list-group-flush">
                @forelse( $profile_list as $profile )

                <li class="list-group-item border-top">
                    <div class="text-center"> 
                        <img src="../storage/photos/{{ $profile->image }}" alt="プロフィール写真" class="rounded-circle profile_img">
                    </div>
                    <br>
                    <p class="text-center">
                        Koya Sawaguchi
                    </p>
                    <p class="text-left">
                        名古屋のフリーランスエンジニア。Java、PHP、MySQL、Oracleあたりを使ったWeb系開発が主戦場です。<br>
                        テックアシストという屋号でソフトウェア開発を行っております。
                    </p>
                    <div class="arrow">
                        <a href="/profile/index" class="link">
                            詳しいプロフィール
                        </a>
                    </div>
                </li>

                @empty
                    <li>プロフィールはありません</li>
                @endforelse

            </ul>
        </div>

 <script src="/js/main.js"></script>


