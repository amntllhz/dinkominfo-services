@props(['instansi'])
<select id="instansi" name="instansi" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-violet-700" required >
    <option value="">Pilih Instansi</option>
    @foreach ($instansi->groupBy('sector') as $sector => $instansiGroup)
        <optgroup label="{{ $sector }}">
            @foreach ($instansiGroup as $inst)
                <option value="{{ $inst->id }}">{{ $inst->name }}</option>
            @endforeach
        </optgroup>
    @endforeach
</select>