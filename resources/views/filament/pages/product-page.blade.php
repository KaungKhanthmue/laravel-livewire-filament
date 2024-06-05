<x-filament-panels::page>
<!-- component -->
<div class="bg-gradient-to-bl from-blue-50 to-violet-50 flex items-center justify-center lg:h-screen">
      <div class="container mx-auto mx-auto p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
          <!-- Replace this with your grid items -->
          @foreach($this->allProducts as $product )   
          <div class="bg-white rounded-lg border p-4">
            <img src="https://placehold.co/300x200/d1d4ff/352cb5.png" alt="Placeholder Image" class="w-full h-48 rounded-md object-cover">
            <div class="px-1 py-4">
              <div class="font-bold text-xl mb-2">{{ $product->name }}</div>
              <p class="text-gray-700 text-base">
                 {{ $product->description }}
              </p>
              <p class="text-gray-700 text-bold">
                Price : {{ $product->price }}ks
              </p>
            </div>
            <div class="px-1 py-4">
              <a href="#" class="text-blue-500 hover:underline">Read More</a>
            </div>
          </div>
        @endforeach
          <!-- Add more items as needed -->
        </div>
      </div>
    </div>
</x-filament-panels::page>
