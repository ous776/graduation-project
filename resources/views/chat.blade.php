@include('header')

@include('left_sidebar')

@include('navbar')

<div id="content-page" class="content-page">
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body chat-page p-0">
                            <div class="chat-data-block">
                                <message :auser="{{Auth::user()}}" :users="{{$users}}"></message>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@include('footer')
