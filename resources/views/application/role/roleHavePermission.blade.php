@extends('layout/index')
@section('content')
<div class="animate__animated p-6 bg-gray-200 dark:bg-gray-950" :class="[$store.app.animation]">
    <div  >
        <livewire:role.role-have-permission :id="$id" />
    </div>
</div>
@endsection
