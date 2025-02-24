@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/statistic.css" />
@endsection

@section('mainContent')
    @include('/block/header_lk', ['active'=>5])

    <main class="container">
        @include('/block/navLK', ['active'=>5])

        <div class="main">
            @include('/block/list_header', [
                'topic' => $topic
            ])

            <div class="window">
                <div class="list">
                    @if(count($cards) != 0)
                        @foreach($cards as $card)
                            @include('/elements/card', $card)
                        @endforeach
                    @else
                        <h1 class="main--header">Список пуст</h1>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
