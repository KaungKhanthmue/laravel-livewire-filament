<x-filament-panels::page>
<!-- component -->
<div class="flex flex-wrap">

        @foreach($this->allUsers as $user)
			<div class="md:w-1/2 lg:w-1/3 py-4 px-4" >
				<div class=" ">
					<a href="#">
						<div class=" shadow-2xl  relative  p-2 rounded-lg  hover:shadow-3xl border-2 broder-red-500">
							<div class="right-0 mt-4 rounded-l-full absolute text-center font-bold text-xs text-white px-2 py-1 bg-orange-500">
0								Follower
							</div>
							<img src="{{$user->cover_url? url('storage',$user->cover_url) :"https://images.unsplash.com/photo-1564497717650-489eb99e8d09?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1963&q=80"}}" class="h-32 rounded-lg  object-cover" style="width:200px">
							<div class="flex justify-center">
								<img src="{{$user->cover_url ? url('storage',$user?->profile_url):"https://images.unsplash.com/photo-1599566150163-29194dcaad36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"}}" class="rounded-full -mt-6 border-4 object-center object-cover border-white mr-2 h-16 w-16">
							</div>
							<div class="py-2 px-2 text-black-50 ">
								<div class=" font-bold font-title text-center ">{{$user->name}}</div>

								<div class="text-sm font-light text-center my-2">{{$user?->email}}</div>
							</div>
						</div>
					</a>

				</div>
			</div>	
        @endforeach

		</div>
</x-filament-panels::page>
