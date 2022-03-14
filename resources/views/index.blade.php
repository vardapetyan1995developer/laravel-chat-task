@extends('layouts.chat.index')

@section('title', 'Chat')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 m-auto">
                <h1>Laravel Chat</h1>

                <div id="messages"></div>

                <form id="messageForm" class="mt-4">
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <textarea name="message" id="message" class="form-control" placeholder="Message..."></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="sendBtn">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
