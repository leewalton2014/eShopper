@props(['product' => $product])
<div class="mb-4 bg-gray-100 px-2 py-2 rounded-lg shadow">
    <article class="flex items-start space-x-6 p-6">
    <img src="{{ $product->image }}" alt="Image of product" width="60" height="88" class="flex-none rounded-md bg-slate-100" />
    <div class="min-w-0 relative flex-auto">
        <h2 class="font-semibold text-slate-900 truncate pr-20 text-2xl">{{ $product->product_name }}</h2>
        <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">
        <div class="absolute top-0 right-0 flex items-center space-x-1">
            <dt class="text-sky-500">
            <span class="sr-only">Price</span>
            £
            </dt>
            <dd>{{ $product->price }}</dd>
        </div>
        <div>
            <dt class="sr-only">Posted</dt>
            <dd class="px-1.5 ring-1 ring-slate-200 rounded">{{ $product->created_at->diffForHumans() }}</dd>
        </div>
        <div class="ml-2">
            <dt class="sr-only">Category</dt>
            <dd>{{ $product->category }}</dd>
        </div>
        <div>
            <dt class="sr-only">Posted By</dt>
            <dd class="flex items-center">
            <svg width="2" height="2" fill="currentColor" class="mx-2 text-slate-300" aria-hidden="true">
                <circle cx="1" cy="1" r="1" />
            </svg>
            {{ $product->user->name }}
            </dd>
        </div>
        <div class="flex-none w-full mt-2 font-normal">
            <dt class="sr-only">Description</dt>
            <dd class="text-slate-400">{{ $product->description }}</dd>
        </div>
        <div>
            <dt class="sr-only">Favourites</dt>
            <dd class="px-1.5 ring-1 ring-slate-200 rounded">{{ $product->favourites->count() }} {{ Str::plural('Favourite', $product->favourites->count()) }}</dd>
        </div>
        @auth
        <div class="text-lg ml-4">
            <dt class="sr-only">Favorite</dt>
            @if (!$product->favouriteBy(auth()->user()))
                <dd>
                    <form action="{{ route('products.favourite', $product) }}" method="post" class="mr-2">
                        @csrf
                        <button type="submit" class="text-blue-500">Favorite</button>
                    </form>
                </dd>
            @else
                <dd>
                    <form action="{{ route('products.favourite', $product) }}" method="post" class="mr-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-500">Unfavourite</button>
                    </form>
                </dd>
            @endif
        </div>
        @endauth

        @can('delete', $product)
        <div class="text-lg">
            <dt class="sr-only">Delete</dt>
            <dd class="flex items-center">
            <svg width="2" height="2" fill="currentColor" class="mx-2 text-slate-300" aria-hidden="true">
                <circle cx="1" cy="1" r="1" />
            </svg>
            <form action="{{ route('products.destroy', $product) }}" method="post" class="mr-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">Delete</button>
            </form>
            </dd>
        </div>
        @endcan

        </dl>
    </div>
    </article>
</div>



