<x-layout>

    @if (session('success'))
        <div class="alert-success text-center">{{ session('success') }}</div>
    @endif

    {{-- hero section --}}
    <x-hero/>

    <!--all blogs section -->
    <x-blogs-section :blogs="$blogs" :categories="$categories"  />

    <!-- footer -->
 </x-layout>
