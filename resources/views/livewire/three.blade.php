<div @child-update="$refresh">
    <div class="flex flex-row gap-x-2">
        @if($hasChildren)
            <svg wire:click="open" class="dark:fill-gray-200" xmlns="http://www.w3.org/2000/svg"
                 style="margin-top: 5px; @if($opened) transform: rotate(0deg); @else transform: rotate(-30deg); @endif"
                 fill="black" width="12" height="12" viewBox="0 0 12 12">
                <path d="M12 11h-12l6-10z"/>
            </svg>
        @endif
        <span class="dark:text-gray-200">{{ $node->name }}</span>
        <span wire:click.prevent="plus">+</span>
        <span wire:click.prevent="minus">-</span>
    </div>


    @if($hasChildren && $opened)
        @foreach($children as $childNode)
            <div :key="{{ $childNode->id }}">
                <p>|</p>
                <div class="flex gap-x-2">
                    {{--<div class="w-10 border-b border-l border-black border-solid"></div>--}}
                    <span>——————</span>
                    <livewire:three :node="$childNode"/>
                </div>
            </div>
        @endforeach
    @endif
</div>
