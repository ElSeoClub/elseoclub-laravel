<div>
    <div class="w-full h-14 flex bg-white flex justify-center">
        <div class="w-full flex max-w-[480px] justify-center">
            <a  class="w-[33.33%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400  border-red-400"><img src="{{asset('svg/info.png')}}" width="26" alt=""></a>
            <a href="{{route('subjects.subject.attachments',$subject)}}" class="w-[33.33%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400"><img src="{{asset('svg/files.png')}}" width="26" alt=""></a>
            <a href="{{route('subjects.subject.tasks',$subject)}}" class="w-[33.33%] h-14 flex items-center justify-center cursor-pointer hover:bg-gray-50 border-b-4 border-white hover:border-red-400 relative"><img src="{{asset('svg/wall-clock.png')}}" width="26" alt=""> <div class="px-1 bg-red-600 absolute text-xs rounded-full font-bold text-white top-2 right-4"></div></a>
        </div>
    </div>
    <x-content>
        <x-card title="Información General">
            <x-container>
                <x-box class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    <div>
                        Nombre o número de expediente
                        <x-input-text wire:model.defer="subject.name"></x-input-text>
                    </div>
                    <div>
                        Materia
                        <div>{{$subject->matter->name}}</div>
                    </div>
                    <div>
                        Abogado a cargo
                        <div>
                            <select wire:model.defer="subject.user_id" class="w-full">
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </x-box>
    
                @foreach($subject->matter->blocks()->where('status','publish')->orderBy('position','asc')->get() as $block)
                        <x-box class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <div>
                                @if($block->column_1 != null and unserialize($block->column_1)['status'] == 'publish')
                                    {{unserialize($block->column_1)['name']}}
                                    @if(unserialize($block->column_1)['type'] == 'text')
                                        <x-input-text wire:model.defer="metadata.{{$block->id}}.1"></x-input-text>
                                    @elseif(unserialize($block->column_1)['type'] == 'number')
                                        <x-input-number wire:model.defer="metadata.{{$block->id}}.1"></x-input-number>
                                    @elseif(unserialize($block->column_1)['type'] == 'date')
                                        <x-input-date wire:model.defer="metadata.{{$block->id}}.1"></x-input-date>
                                    @elseif(unserialize($block->column_1)['type'] == 'datetime-local')
                                        <x-input-datetime wire:model.defer="metadata.{{$block->id}}.1"></x-input-datetime>
                                    @elseif(unserialize($block->column_1)['type'] == 'select')
                                        <x-select wire:model.defer="metadata.{{$block->id}}.1">
                                            @foreach(preg_split('/[\r\n]+/', unserialize($block->column_1)['options'], -1, PREG_SPLIT_NO_EMPTY) as $option)
                                                <option value="{{$option}}">{{$option}}</option>
                                            @endforeach
                                        </x-select>
                                    @elseif(unserialize($block->column_1)['type'] == 'checkbox')
                                        <x-input-checkbox wire:model.defer="metadata.{{$block->id}}.1"></x-input-checkbox>
                                    @endif
                                @endif
                            </div>
                            <div>
                                @if($block->column_2 != null and unserialize($block->column_2)['status'] == 'publish')
                                    {{unserialize($block->column_2)['name']}}
                                    @if(unserialize($block->column_2)['type'] == 'text')
                                        <x-input-text wire:model.defer="metadata.{{$block->id}}.2"></x-input-text>
                                    @elseif(unserialize($block->column_2)['type'] == 'number')
                                        <x-input-number wire:model.defer="metadata.{{$block->id}}.2"></x-input-number>
                                    @elseif(unserialize($block->column_2)['type'] == 'date')
                                        <x-input-date wire:model.defer="metadata.{{$block->id}}.2"></x-input-date>
                                    @elseif(unserialize($block->column_2)['type'] == 'datetime-local')
                                        <x-input-datetime wire:model.defer="metadata.{{$block->id}}.2"></x-input-datetime>
                                    @elseif(unserialize($block->column_2)['type'] == 'select')
                                        <x-select wire:model.defer="metadata.{{$block->id}}.2">
                                            @foreach(preg_split('/[\r\n]+/', unserialize($block->column_2)['options'], -1, PREG_SPLIT_NO_EMPTY) as $option)
                                                <option value="{{$option}}">{{$option}}</option>
                                            @endforeach
                                        </x-select>
                                    @elseif(unserialize($block->column_2)['type'] == 'checkbox')
                                        <x-input-checkbox wire:model.defer="metadata.{{$block->id}}.2"></x-input-checkbox>
                                    @endif
                                @endif
                            </div>
                            <div>
                                @if($block->column_3 != null and unserialize($block->column_3)['status'] == 'publish')
                                    {{unserialize($block->column_3)['name']}}
                                    @if(unserialize($block->column_3)['type'] == 'text')
                                        <x-input-text wire:model.defer="metadata.{{$block->id}}.3"></x-input-text>
                                    @elseif(unserialize($block->column_3)['type'] == 'number')
                                        <x-input-number wire:model.defer="metadata.{{$block->id}}.3"></x-input-number>
                                    @elseif(unserialize($block->column_3)['type'] == 'date')
                                        <x-input-date wire:model.defer="metadata.{{$block->id}}.3"></x-input-date>
                                    @elseif(unserialize($block->column_3)['type'] == 'datetime-local')
                                        <x-input-datetime wire:model.defer="metadata.{{$block->id}}.3"></x-input-datetime>
                                    @elseif(unserialize($block->column_3)['type'] == 'select')
                                        <x-select wire:model.defer="metadata.{{$block->id}}.3">
                                            @foreach(preg_split('/[\r\n]+/', unserialize($block->column_3)['options'], -1, PREG_SPLIT_NO_EMPTY) as $option)
                                                <option value="{{$option}}">{{$option}}</option>
                                            @endforeach
                                        </x-select>
                                    @elseif(unserialize($block->column_3)['type'] == 'checkbox')
                                        <x-input-checkbox wire:model.defer="metadata.{{$block->id}}.3"></x-input-checkbox>
                                    @endif
                                @endif
                            </div>
                        </x-box>
                @endforeach
                <x-box>
                    Descripción del asunto
                    <textarea class="w-full resize-none" wire:model.defer="subject.comments"></textarea>
                </x-box>
            </x-container>
            <x-slot name="footer">
                <x-button icon="fas fa-save" click="test">Guardar cambios</x-button>
            </x-slot>
        </x-card>
    </x-content>
</div>
