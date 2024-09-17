<!DOCTYPE html>
<html lang="en">

<head>
    @include('inc.style')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat- {{ $seller->name }}</title>
    <style>
        .chat-online {
            color: #34ce57
        }

        .chat-offline {
            color: #e4606d
        }

        .chat-messages {
            display: flex;
            flex-direction: column;
            max-height: 400px;
            overflow-y: scroll
        }

        .chat-message-left,
        .chat-message-right {
            display: flex;
            flex-shrink: 0
        }

        .chat-message-left {
            margin-right: auto
        }

        .chat-message-right {
            flex-direction: row-reverse;
            margin-left: auto
        }

        .py-3 {
            padding-top: 1rem !important;
            padding-bottom: 1rem !important;
        }

        .px-4 {
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important;
        }

        .flex-grow-0 {
            flex-grow: 0 !important;
        }

        .border-top {
            border-top: 1px solid #dee2e6 !important;
        }
    </style>
</head>

<body>
    @include('userfront.header')
    @if (session('message'))
        <div class="alert alert-success flash-message border-0 text-light" style="background: #6AB716" role="alert">
            {{ session('message') }}
        </div>
    @elseif (session('loginfailedmessage'))
        <div class="alert alert-success flash-message border-0 text-light" style="background: #ee0909" role="alert">
            {{ session('loginfailedmessage') }}
        </div>
    @elseif (session('formerrors'))
        <div class="alert alert-success flash-message border-0 text-light" style="background: #ee0909" role="alert">
            @if (Session::has('formerrors'))
                <ul>
                    @foreach (Session::get('formerrors') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif
    <section class="section">
        <main class="content">
            <div class="container p-0">
                <div class="card" style="margin-top:30px;" >
                    <div class="row g-0">
                        <div class="col-12 ">
                            <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                <div class="d-flex align-items-center py-1">
                                    <div class="position-relative">
                                        <img src="{{ url('public/assets/images/avatar3.jpeg') }}"
                                            class="rounded-circle mr-1" alt="Sharon Lessman" width="40"
                                            height="40">
                                    </div>
                                    <div class="flex-grow-1 pl-3">
                                        <strong>{{ $seller->name }}</strong>
                                    </div>

                                </div>
                            </div>
                            <div class="position-relative">
                                <div class="chat-messages p-4">
                                    @foreach($messages as $message)
                                    @if($message->sentby == 's')
                                        <!-- Seller message -->
                                        <div class="chat-message-left pb-4">
                                            <div>
                                                <img src="{{ url('public/assets/images/avatar3.jpeg') }}" class="rounded-circle mr-1" alt="Seller" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">{{ $message->created_at->format('h:i a') }}</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                {{ $message->message }}
                                            </div>
                                        </div>
                                    @else
                                        <!-- User message -->
                                        <div class="chat-message-right pb-4">
                                            <div>
                                                <img src="{{ url('public/assets/images/avatar1.png') }}" class="rounded-circle mr-1" alt="User" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">{{ $message->created_at->format('h:i a') }}</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                {{ $message->message }}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                </div>
                            </div>
                            <form action="{{ url('user/sendmessagetoseller') }}" method="post">
                                @csrf
                                <div class="flex-grow-0 py-3 px-4 border-top">
                                    <div class="input-group">
                                        <input type="hidden" name="seller_id" value="{{ $seller->id }}">
                                        <input type="hidden" name="sentby" value="u">
                                        <input type="text" class="form-control" name="message"
                                            placeholder="Type your message">
                                        <button type="submit" class="btn btn-primary">Send</button>

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>

    {{-- modals here --}}
    @include('userfront.modals.becomeaseller')
    @include('userfront.footer')
</body>
@include('inc.scripts')

</html>
