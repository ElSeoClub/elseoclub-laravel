<div class="p-6 bg-gray-100 flex gap-3">
    <table class="bg-white text-2xl">
        <thead>
        <tr>
            <th class="px-8"></th>
            @foreach($votations as $votation)
                @if($votation->label_1)
                    <th class="px-8">{{$votation->label_1}}</th>
                @endif
                @if($votation->label_2)
                    <th class="px-8">{{$votation->label_2}}</th>
                @endif
                    @if($votation->label_3)
                        <th class="px-8">{{$votation->label_3}}</th>
                    @endif

                    @if($votation->label_4)
                        <th class="px-8">{{$votation->label_4}}</th>
                    @endif

                    @if($votation->label_5)
                        <th class="px-8">{{$votation->label_5}}</th>
                    @endif

                    @if($votation->label_6)
                        <th class="px-8">{{$votation->label_6}}</th>
                    @endif

                    @if($votation->label_7)
                        <th class="px-8">{{$votation->label_7}}</th>
                    @endif

                    @if($votation->label_8)
                        <th class="px-8">{{$votation->label_8}}</th>
                    @endif

                    @if($votation->label_9)
                        <th class="px-8">{{$votation->label_9}}</th>
                    @endif

                    @if($votation->label_10)
                        <th class="px-8">{{$votation->label_10}}</th>
                    @endif

                @php break; @endphp
            @endforeach
        </tr>
        </thead>
        <tbody>
            @foreach($event->locations as $location)
            <tr>
                <td class="px-8">
                {{$location->name}}
                </td>
                    @foreach($votations as $votation)
                        @if($votation->location_id == $location->id)
                        @if($votation->label_1)
                            <td class="px-8">
                                {{$votation->value_1}}
                            </td>
                        @endif
                        @if($votation->label_2)
                            <td class="px-8">
                                {{$votation->value_2}}
                            </td>
                        @endif
                            @if($votation->label_3)
                                <td class="px-8">
                                    {{$votation->value_3}}
                                </td>
                            @endif
                            @if($votation->label_4)
                                <td class="px-8">
                                    {{$votation->value_4}}
                                </td>
                            @endif

                            @if($votation->label_5)
                                <td class="px-8">
                                    {{$votation->value_5}}
                                </td>
                            @endif

                            @if($votation->label_6)
                                <td class="px-8">
                                    {{$votation->value_6}}
                                </td>
                            @endif

                            @if($votation->label_7)
                                <td class="px-8">
                                    {{$votation->value_7}}
                                </td>
                            @endif
                            @if($votation->label_8)
                                <td class="px-8">
                                    {{$votation->value_8}}
                                </td>
                            @endif
                            @if($votation->label_9)
                                <td class="px-8">
                                    {{$votation->value_9}}
                                </td>
                            @endif
                            @if($votation->label_10)
                                <td class="px-8">
                                    {{$votation->value_10}}
                                </td>
                            @endif
                        @endif
                  @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <h1 class="text-center text-5xl">
        {{$subscreen}}
        </h1>
        <div class="text-center">
        </div>
    </div>
</div>
