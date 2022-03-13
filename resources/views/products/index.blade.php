@extends('layouts.app')

@section('content')

    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">

            @auth
            <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded font-medium mt-4 mb-4">Sell a product</a>
            @endauth

            <div class="mt-4">
                @if($products->count())
                @foreach ($products as $product)
                    <x-product :product="$product"/>
                @endforeach

                {{ $products->links('pagination::tailwind') }}
                @else
                    <p>There are no products.</p>
                @endif
            </div>

        </div>
    </div>

@endsection
