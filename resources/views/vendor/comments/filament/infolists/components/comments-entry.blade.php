<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div>
        <livewire:comments :model="$getRecord()" :key="'comments-entry-'.$getRecord()->getKey()" />
    </div>
</x-dynamic-component>
