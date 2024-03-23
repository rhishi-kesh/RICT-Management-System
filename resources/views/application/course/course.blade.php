@extends('layout/index')
@section('content')
<div class="animate__animated h-screen p-6 bg-gray-200 dark:bg-gray-950" :class="[$store.app.animation]">
    <div x-data="sales">
        <livewire:Course.addCourse />
    </div>
</div>
@endsection
