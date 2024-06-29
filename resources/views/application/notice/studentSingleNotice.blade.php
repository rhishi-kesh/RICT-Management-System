@extends('layout/studentIndex')
@section('content')
<div class="animate__animated p-6 bg-gray-200 dark:bg-gray-950" :class="[$store.app.animation]">
    <div class="pt-5" x-data="modal">
        <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4 w-full">
            <div class="w-full">
                <div>
                    {!! $singlenotice->notice !!}
                </div>
                <div class="my-2 text-orange-500">
                    {{ $singlenotice->created_at->diffForHumans() }}
                </div>
                <div>
                    <a href="{{ url()->previous() }}" class="mt-3 btn bg-blue-500 text-white inline-block border-none">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
