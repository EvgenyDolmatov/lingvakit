<div class="sidebar-content w-100 h-100">
    <div id="list-group">
        <ul class="friend-list list-group w-100 friends-scroll auto-scroll">
            <li class="heading">Чаты</li>
            @if($currentUser->chats->count())
                @foreach($currentUser->chats as $chat)
                    <li class="list-group-item">
                        <a class="d-block" href="{{route('chat.room', $chat)}}">
                            <div class="media">
                                <div class="media-body align-self-center">
                                    <h4>{{$chat->members->except($currentUser->id)->first()->getFullName()}}</h4>
                                    <p>{{$chat->messages->sortByDesc('date')->first()->content}}</p>
                                </div>
                                <div class="media-right align-self-center">
                                    <span class="date-send">14:21</span>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            @else
                <li class="list-group-item">
                    <div class="media">
                        <div class="media-body align-self-center">
                            <h4>У вас пока нет чатов</h4>
                        </div>
                    </div>
                </li>
            @endif
            <li class="heading">Контакты</li>
            @if( isset($contacts) && $contacts->count())
                @foreach($contacts as $user)
                    <li class="list-group-item contacts">
                        <a href="@if(isset($chat) && $chat->members->contains($user->id)){{route('chat.room', $chat)}}@else{{route('chat.create', $user)}}@endif">
                            <div class="media">
                                <div class="media-body align-self-center">
                                    <h4>{{$user->getFullName()}}</h4>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            @else
                <li class="list-group-item contacts">
                    <div class="media">
                        <div class="media-body align-self-center">
                            <h4>У вас пока нет контактов</h4>
                        </div>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</div>