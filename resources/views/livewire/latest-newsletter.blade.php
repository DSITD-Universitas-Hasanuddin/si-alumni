<div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">
    @foreach($dataNewsletters as $items)
    <div class="group relative cursor-pointer h-80 w-56 rounded-md justify-center overflow-hidden transition-shadow hover:shadow-[4.0px_8.0px_8.0px_rgba(0,0,0,0.38)]">
        <div class="">
            <img
                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-125"
                src="https://lh3.googleusercontent.com/d/{{$items->docs_url}}?authuser=0"
                alt="sosok alumni" />
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black group-hover:from-black/40 group-hover:via-black/50 group-hover:to-black/30 group-hover:backdrop-blur-sm"></div>
        <div class="absolute inset-0 flex h-full translate-y-[65%] flex-col text-left items-center justify-center px-9 transition-all duration-500 group-hover:translate-y-0">
            <div class="self-start">
                <h1 class="mb-0.5 font-dmserif text-xl font-bold text-white">{{ $items->series_acr }}</h1>
                <span class="font-dmserif text-normal font-bold text-white">{{ \Carbon\Carbon::parse($items->published_date)->translatedFormat('F Y') }}</span>
                <p class="mt-1 font-dmserif text-sm font-semibold text-white opacity-0 transition-opacity duration-300  group-hover:opacity-100">{{ $items->cover_alumni }} </p>
            </div>
            <p class="mt-3 h-32 w-full text-sm italic text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                {{ $items->title }}
            </p>
            <a
                class="rounded-full bg-neutral-900 py-2 px-3.5 font-com text-sm capitalize text-white shadow shadow-black/60"
                href="https://drive.google.com/file/d/{{$items->docs_url}}/view"
                target="_blank">
                Buka
            </a>
        </div>
    </div>
    @endforeach
</div>
