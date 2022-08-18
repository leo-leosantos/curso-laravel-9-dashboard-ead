@include('admin.includes.alerts')
@csrf
<div class="">
    <label class="block text-sm text-gray-600" for="name">Nome*</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text"
        placeholder="Seu Nome" aria-label="Name" value="{{ $course->name ??  old('name') }}">
</div>

<div class="py-2">
    <label class="block text-sm text-gray-600" for="available">
    <input name="available" type="checkbox"  aria-label="available" name="available" value="1"  {{  ($course->available == 1 ? ' checked' : '') }} >
    Status*
</label>
</div>
<div class="mt2">
    <label class="block text-sm text-gray-600" for="image">Imagem</label>
    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="file" name="image" type="file">
</div>
<div class="mt-6">
    <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Enviar</button>
</div>
