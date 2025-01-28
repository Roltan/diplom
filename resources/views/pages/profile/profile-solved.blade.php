@extends('/block/pattern')

@section('links')
    <link rel="stylesheet" href="/css/statistic.css" />
@endsection

@section('mainContent')
    @include('/block/header_lk', ['active'=>4])

    <figure class="background"></figure>

    <main class="container row">
        @include('/block/navLK', ['active'=>4])

        <div class="main">
            @include('/block/list_header', ['tests'=>$tests])

            <div class="window">
                <div class="list">
                    @foreach($cards as $card)
                        @include('/elements/card', $card)
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
