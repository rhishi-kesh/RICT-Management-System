@extends('layout/studentIndex')
@section('content')
<div class="animate__animated p-5 bg-gray-200 dark:bg-gray-950" :class="[$store.app.animation]">
    <div>
        <livewire:message.message :id="$id"/>
    </div>
</div>
@endsection
