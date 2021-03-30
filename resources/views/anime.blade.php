<x-layout>
  <x-slot name="title">
    {{ $anime->title }}
  </x-slot>

  <article class="anime">
    <header>
      <div>
        <img alt="" src="/covers/{{ $anime->cover }}" />
      </div>
      <h1>{{ $anime->title }}</h1>
    </header>
    <p>{{ $anime->description }}</p>
    <div class="flow">
      <div>
        <a class="cta" href="/anime/{{ $anime->id }}/new_review">Ajouter une critique</a>
      </div>
      <p>Il n'y a pas encore de critiques</p>
    </div>
  </article>
</x-layout>
