@extends('layouts.app')

@section('content')

    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <h1 class="mb-4 font-bold text-3xl text-center">Add a new product</h1>
            <form action="{{ route('products.create') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="product_name" class="sr-only">Product Name</label>
                    <input type="text" name="product_name" id="product_name" placeholder="Product name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('product_name') border-red-500 @enderror" value="{{ old('product_name') }}">
                    @error('product_name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="sr-only">Description</label>
                    <textarea name="description" id="description" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror" placeholder="Product description...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="category" class="sr-only">Category</label>
                    <input type="text" name="category" id="category" placeholder="Category" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('category') border-red-500 @enderror" value="{{ old('category') }}">
                    @error('category')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="price" class="sr-only">Price</label>
                    <input type="text" name="price" id="price" placeholder="Price" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('price') border-red-500 @enderror" value="{{ old('price') }}">
                    @error('price')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="sr-only">Image URL</label>
                    <input type="text" name="image" id="image" placeholder="Image URL" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('image') border-red-500 @enderror" value="{{ old('image') }}">
                    @error('image')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Add Product</button>
                </div>
            </form>
        </div>
    </div>

@endsection
