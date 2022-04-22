<ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
    @foreach($turbines as $turbine)
        <li class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
            <div class="w-full flex items-center justify-between p-6 space-x-6">
                <div class="flex-1 truncate">
                    <div class="flex items-center space-x-3">
                        <h3 class="text-gray-900 text-sm font-medium truncate">#{{$turbine->uuid}}</h3>
                        <span
                            class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium
                            bg-green-100 rounded-full">{{$turbine->type}}</span>
                        <span
                            class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium
                            bg-green-100 rounded-full">{{$turbine->grade}}</span>
                    </div>
                    <p class="mt-1 text-gray-500 text-sm truncate">Loc: {{$turbine->latitude}},
                        {{$turbine->longitude}}</p>
                    @foreach($turbine->components as $component)
                        <span
                            class="flex-shrink-0 inline-block px-2 py-0.5 text-green-800 text-xs font-medium
                            bg-green-100 rounded-full">{{$component->name}}</span>
                    @endforeach
                </div>
                <div class="w-20 h-20 rounded-full flex-shrink-0">
                    <div class="turbine">
                        <div class="pilot">
                            <div class="prop-container" style="@if($turbine->grade==1)  animation: propeller 2.5s
                                infinite linear;@elseif($turbine->grade==2)  animation: propeller 5.5s infinite
                                linear; @elseif($turbine->grade==3)  animation: propeller 9.5s infinite
                                linear; @elseif($turbine->grade==4)  animation: propeller 15.5s infinite
                                linear; @elseif($turbine->grade==5)  animation: propeller 25.5s infinite
                                linear; @endif">

                                <div class="prop"></div>
                                <div class="prop"></div>
                                <div class="prop"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </li>

    @endforeach

</ul>
