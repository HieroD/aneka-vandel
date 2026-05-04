@props(['product'])

<div class="p-5 rounded-xl bg-white flex flex-col items-center shadow-lg transition duration-100 hover:-translate-y-1.5 hover:shadow-2xl hover:cursor-pointer lg:w-[calc((100%-60px)/4)]">
    {{-- Image --}}
    <img src="{{ asset($product->img_path) }}" alt="{{ $product->name }}" class="h-64 w-full object-cover rounded-md mb-4">
    
    {{-- Name  --}}
    <h3 class="mb-0 text-lg text-gray-800 font-semibold">{{ $product->name }}</h3>
    
     {{-- Description --}}
    <p class="mb-0 w-full h-24 text-gray-500 text-sm text-left">{{ $product->description }}</p>
    
    {{-- Price --}}
    <p class="m-0 mr-auto text-gray-800 text-lg font-medium">Rp. {{ number_format($product->price, 0, ',', '.') }} / Pcs</p>

    <button class="mt-5 h-10 w-full text-lg rounded-lg cursor-pointer text-white font-normal bg-primary transition-colors hover:bg-primary-hover">Pesan Sekarang</button>
</div>