<x-layout>

    {{-- hero section --}}
    <x-hero/>

    <!--all blogs section -->
    <x-blogs-section :blogs="$blogs" :categories="$categories"  />

    <!-- subscribe new blogs -->
   <x-subscribe />

    <!-- footer -->
 </x-layout>
