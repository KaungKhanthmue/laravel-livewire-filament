<x-filament-panels::page>
<div>
<div class="flex flex-wrap">

@foreach($this->users as $user)
<div class="md:w-1/2 lg:w-1/4 py-4 px-2">
    <div class=" ">
        <a href="#">
            <div class=" shadow-2xl  relative  p-2 rounded-lg  hover:shadow-3xl border-2 broder-red-500">
                <img src="{{$user->cover_url? url('storage',$user->cover_url) :"https://images.unsplash.com/photo-1564497717650-489eb99e8d09?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1963&q=80"}}" class="h-32 rounded-lg  object-cover w-full">
                <div class="flex justify-center">
                    <img src="{{$user->cover_url ? url('storage',$user?->profile_url):"https://t4.ftcdn.net/jpg/04/98/72/43/360_F_498724323_FonAy8LYYfD1BUC0bcK56aoYwuLHJ2Ge.jpg"}}" class="rounded-full -mt-6 border-4 object-center object-cover border-white mr-2 h-16 w-16">
                </div>
                <div class="py-2 px-2 text-black-50 ">
                    <div class=" font-bold font-title text-center ">{{$user->name}}</div>
                    <div class="text-sm font-light text-center my-2">{{$user?->email}}</div>
                </div>
                <div class="flex justify-end gap-2">
				{{($this->viewAction)(['userId'=>$user->id])}} 
                {{($this->editAction)(['userId'=>$user->id])}} 
				{{($this->deleteAction)(['userId'=>$user->id])}} 
                </div>
            </div>
        </a>

    </div>
</div>
@endforeach

@if($showSwitch)
<div class="z-50 absolute w-[900px] top-[150px] right-[480px] h-[400px] dark:bg-gray-900 bg-gray-200 dark:bg-opacity-95 bg-opacity-95 rounded-xl">
    <form class="w-full mt-[5%] ">
        <div class="flex gap-16 w-[800px] container mx-auto">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="" id="" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="floating_email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
            </div>
        </div>
        <div class="flex gap-16 w-[800px] container mx-auto">
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm Password</label>
            </div>
        </div>
        <div class=" gap-16 w-[800px] container mx-auto">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="default_size">Cover Image</label>
            <input class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="default_size" type="file">
        </div>
        <div class=" gap-16 w-[800px] container mx-auto">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="default_size">Profile Image</label>
            <input class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="default_size" type="file">
        </div>
        <div class="flex justify-end p-4 w-[800px] container mx-auto">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </form>

</div>
@endif
</div>
</div>
<div class=" w-full h-[50px] flex justify-end">
	{{$this->users->links()}}
	</div>
</x-filament-panels::page>